<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\BasketProduct;
use App\Models\Basket;
use Illuminate\Support\Facades\Mail;
use App\Models\Address;


class CheckoutController extends Controller
{
    function show(){
        $basket = auth()->user()->basket;
        // Update total cost of basket on the database before loading it.
        $basket->total_cost = $basket->totalCost();
        $basket->save();
        
        $basket->loadMissing('products');
        
        if($basket->products->isEmpty()){
            return redirect()->route('basket')->with([
                'status' => 'danger',
                'message' => 'Your basket is empty!'
            ]);
        } else {
            // Get the user's addresses
            $addresses = auth()->user()->addresses;
            return view('checkout', [
                'basket' => $basket,
                'addresses' => $addresses
            ]);
        }
    }
}
