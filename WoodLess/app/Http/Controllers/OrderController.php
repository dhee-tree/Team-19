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
    function store(Request $request){
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
        
        
        foreach($basket->products as $product){
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
    function show(){
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->get();
        return view('purchases-user', [
            'user' => $user,
            'orders' => $orders,
        ]);
    }

    // Show order products
    function showOrderProducts($id){
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
    function returnOrder($id, $product_id){
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
