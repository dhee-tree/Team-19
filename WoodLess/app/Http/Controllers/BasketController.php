<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Store item from basket.
     */
    function store(Request $request, Product $product){

        $formFields = $request->validate([
            'attribute-color' => 'required',
        ]);

        //Attach(product id, [amount of items, attributes])

        /*$user->basket->products()->attach(1,[
            'amount' => 10,
            //'attributes' => //JSON Here
        ]);*/

        return back()->with('message', 'Item added to basket.');
    }
}
