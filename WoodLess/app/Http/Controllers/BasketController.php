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
        $basket->loadMissing('products');

        $attributes = [];

        $rules = [
            'amount' => 'required',
            'attributes' => 'required',
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

        $data = [
            'amount' => $request['amount'],
            'attributes' => json_encode($attributes),
        ];

        foreach($basket->products as $basketItem){
            $itemId = $basketItem->pivot->product_id;
            $itemAmount = $basketItem->pivot->amount;
            $itemAttributes = $basketItem->pivot->attributes;

            if($itemAttributes == $data['attributes']){
                $basket->products()->updateExistingPivot($itemId, [
                    'amount' => $itemAmount + $data['amount'],
                ]);
                return back()->with('message', 'Item(s) added to basket.');
            }
        };
        
        $basket->products()->attach($product, $data);

        return back()->with('message', 'Item(s) added to basket.');
    }
}
