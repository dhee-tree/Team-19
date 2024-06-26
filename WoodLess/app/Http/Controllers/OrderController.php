<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\Warehouse;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class OrderController extends Controller
{
    // Store an order in the database.
    function store(Request $request)
    {   
        // If decryption is successful it'll continue...
        // Decryption key is only known by laravel (using APP_KEY).
        try {
            // Compares to see if they are the same, erases key from session
            if(!(Hash::check(Crypt::decryptString(session()->pull('checkout_key')), $request->input('checkout')))){
                abort(403);
            }
        } catch (Exception $e) {
            abort(403);
        }

        $user = auth()->user();
        $basket = $user->basket;
        $basket->loadMissing('products');

        // Check if $request->session()->get('address_id') is empty
        if (empty($request->session()->get('address_id'))) {
            return redirect()->route('checkout')->with([
                'status' => 'danger',
                'message' => 'Please select a address.'
            ]);
        } else {
            // Check if there is at least one product in the basket
            if ($basket->products->count() > 0) {
                // Create order item and attach products to it
                $order = Order::create([
                    'user_id' => $user->id,
                    $address_id = $request->session()->get('address_id'),
                    'address_id' => $address_id,
                    'status_id' => OrderStatus::where('status', 'Processing')->first()->id,
                    'details' => 'Order placed by user',
                    'order_cost' => $basket->totalCost(),
                ]);
                // Remove the address_id from the session
                $request->session()->forget('address_id');
        
                foreach ($basket->products as $product) {
                    if ($product->discount > 0){
                        $product_cost = round($product->cost - ($product->cost * ($product->discount / 100)), 2);
                    } else {
                        $product_cost = $product->cost;
                    }
    
                    $order->products()->attach($product->id, [
                        'amount' => $product->pivot->amount,
                        'attributes' => $product->pivot->attributes,
                        'warehouse_id' => $product->warehouses->first()->id,
                        'status_id' => OrderStatus::where('status', 'Processing')->first()->id,
                        'product_cost' => $product_cost,
                    ]);
                }
        
                $basket->products()->detach();
        
                // Send an email to the user with the order confirmation.
                Mail::to($user->email)->send(new OrderConfirmation($order));
                return view('order-confirmation', [
                    'order' => $order,
                ]);
            } else {
                return redirect()->route('basket')->with([
                    'status' => 'danger',
                    'message' => 'Cannot place an order with an empty basket.',
                ]);
            }
        }
    }

    // Show order of a user
    function show()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->get();
        return view('purchases-user', [
            'user' => $user,
            'orders' => $orders,
        ]);
    }

    // Show order products
    function showOrderProducts($id)
    {
        $user = auth()->user();
        $order = Order::find($id);
        if ($order->products->count() > 0) {
            $address = Address::find($order->address_id);
            $attributes = $order->products->first()->pivot->attributes;
            return view('order-products', [
                'user' => $user,
                'order' => $order,
                'address' => $address,
                'attributes' => $attributes,
            ]);
        } else {
            return back()->with([
                'status' => 'danger',
                'message' => 'Order has no products.',
            ]);
        }
    }

    // Return an order
    function returnOrderItem($id, $product_id)
    {
        $order_status = Order::find($id)->status->status;

        if ($order_status != 'Complete') {
            return back()->with([
                'status' => 'danger',
                'message' => 'Cannot return item, order still processing.'
            ]);
        } else {
            $order = Order::find($id);
            $order->products()->updateExistingPivot($product_id, ['status_id' => OrderStatus::where('status', 'Requested Return')->first()->id]);
            $order->save();
            $order->touch();
            return back()->with([
                'status' => 'success',
                'message' => 'Return request sent. Please wait for confirmation.'
            ]);
        }
    }

    // Cancel a return request
    function cancelReturnOrderItem($id, $product_id)
    {
        $order = Order::find($id);
        if ($order->products->find($product_id)->orderProductStatus->first()->status == 'Requested Return') {
            $order->products()->updateExistingPivot($product_id, ['status_id' => OrderStatus::where('status', 'Complete')->first()->id]);
            $order->save();
            $order->touch();
            return back()->with([
                'status' => 'success',
                'message' => 'Return request cancelled.'
            ]);
        } else {
            return back()->with([
                'status' => 'error',
                'message' => 'Cannot cancel return request, return already processed.'
            ]);
        }
    }

    public function OrderAccept($id)
    {
        $order = Order::findOrFail($id);
        $status = OrderStatus::findOrFail(2);

        // Assuming $order is an instance of your Order model
        $orderProducts = $order->products()->withPivot('amount', 'warehouse_id')->get();


        $stock = 0;
        // Iterate over each product to get the amount and set stock amount
        foreach ($orderProducts as $product) {
            $amount = $product->pivot->amount;
            $warehouseId = $product->pivot->warehouse_id;

            $newAmount = $product->stockAmount($warehouseId) - $amount;

            $product->setStockAmount($warehouseId, $newAmount);

            $order->products()->updateExistingPivot($product->id, ['status_id' => $status->id]);

            // Set the status_id of the product to $status->id

            $product->save();
            // Now $amount contains the amount for the current product
            $stock++;
        }


        $order->status_id = $status->id;

        $order->save();

        return redirect()->back()->with('success', 'Successfully changed order ' . $id . ' status to in transit and changed stock level by: ' . $stock);
    }

    public function ProcessReturn($id, $productIds)
    {
        $order = Order::findOrFail($id);
        $actionValue = request('action');

        if ($actionValue == 'accept') {
            $status = OrderStatus::findOrFail(5);
        } elseif ($actionValue == 'cancel') {
            $status = OrderStatus::findOrFail(6);
        }

        // Iterate over each product to set the status
        if (is_array($productIds)) {
            foreach ($productIds as $pID) {
                $order->products()->updateExistingPivot($pID, ['status_id' => $status->id]);
            }
        } else {
            // Handle the case where $productIds is not an array
            $order->products()->updateExistingPivot($productIds, ['status_id' => $status->id]);
        }


        $order->status_id = $status->id;

        $order->save();

        return redirect()->back()->with('success', 'Successfully changed order ' . $id . ' status to ' . $status->status);
    }

    public function CancelReturn($id, $productIds)
    {
        $order = Order::findOrFail($id);
        $status = OrderStatus::findOrFail(4);

        // Iterate over each product to get the amount and set the status
        foreach ($productIds as $pID) {
            $order->products()->updateExistingPivot($pID, ['status_id' => $status->id]);
        }


        $order->status_id = $status->id;

        $order->save();

        return redirect()->back()->with('success', 'Successfully changed order ' . $id . ' status to returning');
    }
}
