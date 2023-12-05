<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\BasketProduct;
use App\Models\Basket;


class CheckoutController extends Controller
{
    function show(){
        $basket = Basket::where('user_id', 1)->first();
        // $basket->loadMissing('products');
        return view('checkout', [
            'basket' => $basket,]);
    }
}
