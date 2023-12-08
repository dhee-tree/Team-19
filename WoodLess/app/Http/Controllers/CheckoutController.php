<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\BasketProduct;
use App\Models\Basket;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;


class CheckoutController extends Controller
{
    function show(){
        $basket = auth()->user()->basket;
        // Update total cost of basket on the database before loading it.
        $basket->total_cost = $basket->totalCost();
        $basket->save();
        
        $basket->loadMissing('products');
        
        return view('checkout', [
            'basket' => $basket,
            // 'address' => auth()->user()->address,
        ]);
    }

    function store(Request $request){
        $basket = auth()->user()->basket;
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new OrderConfirmation($basket));
        return view('order-confirmation', [
            'basket' => $basket,
        ]);
    }

    function proccessOrder(){
        $basket = auth()->user()->basket;
        $basket->loadMissing('products');
        $basket->products->each(function($product){
            $product->stock -= $product->pivot->amount;
            $product->save();
        });
        $basket->products()->detach();
        return redirect()->route('home');
    }
}
