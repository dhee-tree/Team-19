<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Address;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    // Store an order in the database.
    function store(Request $request)
    {
        $user = auth()->user();
        $basket = $user->basket;
        $basket->loadMissing('products');

        // We need to create an address for the user if they fill in the form.
        // Possibly a callable function to create an address if certian parameters are passed from the view/form.

        // $address = Address::create([
        //     'user_id' => $user->id,
        //     'address' => $request->input('address'),
        //     'city' => $request->input('city'),
        //     'postcode' => $request->input('postcode'),
        // ]);

        // create order item for each product in the basket
        $order = Order::create([
            'user_id' => $user->id,
            'address_id' => 1, // Needs to be changed to the address id associated with the user and the order.
            'status_id' => OrderStatus::where('status', 'Processing')->first()->id,
            'details' => 'Order placed by user',
            // 'status_id' => 1,
        ]);


        foreach ($basket->products as $product) {
            $order->products()->attach($product->id, [
                'amount' => $product->pivot->amount,
                'attributes' => $product->pivot->attributes,
                'warehouse_id' => $product->warehouses->first()->id,
                'status_id' => OrderStatus::where('status', 'Processing')->first()->id,
            ]);
        }

        $basket->products()->detach();

        // Send an email to the user with the order confirmation.
        // Mail::to($user->email)->send(new OrderConfirmation($basket));
        return view('order-confirmation', [
            'basket' => $basket,
        ]);
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
        $address = Address::find($order->address_id);
        $attributes = $order->products->first()->pivot->attributes;
        return view('order-products', [
            'user' => $user,
            'order' => $order,
            'address' => $address,
            'attributes' => $attributes,
        ]);
    }

    // Return an order
    function returnOrderItem($id, $product_id)
    {
        $order_status = Order::find($id)->status->status;

        if ($order_status != 'Complete') {
            return back()->with([
                'status' => 'error',
                'message' => 'Cannot return item, order still processing.'
            ]);
        } else {
            $order = Order::find($id);
            $order->products()->updateExistingPivot($product_id, ['status_id' => OrderStatus::where('status', 'Processing Return')->first()->id]);
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
        if ($order->products->find($product_id)->orderProductStatus->first()->status == 'Processing Return') {
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
            $status = OrderStatus::findOrFail(4);
        } elseif ($actionValue == 'cancel') {
            $status = OrderStatus::findOrFail(3);
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
