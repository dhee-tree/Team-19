<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BasketController extends Controller
{
    /**
     * Store a product in a basket.
     */
    function store(Request $request, Product $product){

        //$user = auth()->user()->basket;

        //Currently stores in first basket in db.
        $basket = User::where("id", 1)->first()->basket;

        $attributes = [];

        $rules = [
            'attributes' => 'required',
            'amount' => 'required',
        ];

        if($request->has('attribute-colours')){
            $rules['attribute-colours'] = 'required|not_in:0';
            $request->validate($rules);

            $pairs = explode(':', $request['attribute-colours']);
            $attributes[$pairs[0]] = $pairs[1];
        };

        $request->validate($rules);

        foreach($request['attributes'] as $attribute){
            $pairs = explode(':', $attribute);
            $attributes[$pairs[0]] = $pairs[1];
        };

        //Currently no checks/methods to update amount, or check for duplicates.
        $basket->products()->attach($product->id,[
            'amount' => $request['amount'],
            'attributes' => json_encode($attributes),
        ]);

        return back()->with('message', 'Item(s) added to basket.');
    }
}
