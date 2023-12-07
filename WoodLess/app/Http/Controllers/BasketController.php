<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\BasketProduct;
use App\Models\Basket;

class BasketController extends Controller
{
    /**
     * Store a product in a basket.
     */
    function store(Request $request, Product $product){

        //Currently stores in first basket in db.
        $basket = auth()->user()->basket;
        $basket->loadMissing('products');

        $attributes = [];

        $rules = [
            'amount' => 'required|numeric|not_in:0',
            'attributes' => 'required|array',
        ];

        if($request->has('attribute-colours')){
            $rules['attribute-colours'] = 'required|not_in:0';
            $request->validate($rules);

            $pairs = explode(':', $request->input('attribute-colours'));
            $attributes[$pairs[0]] = $pairs[1];
        };

        $request->validate($rules);

        foreach($request->input('attributes') as $attribute){
            $pairs = explode(':', $attribute);
            $attributes[$pairs[0]] = $pairs[1];
        };

        $data = [
            'amount' => $request->input('amount'),
            'attributes' => json_encode($attributes),
        ];

        foreach($basket->products->where('id', $product->id) as $basketItem){
            $basketItem = $basketItem->pivot;
            
            if($basketItem->attributes == $data['attributes']){
                $basketItem->update([
                    'amount' => $basketItem->amount + $data['amount'],
                ]);
                return back()->with([
                    'status' => 'success',
                    'message' => 'Item(s) added to basket.'
                ]);
            }
        };
        
        $basket->products()->attach($product, $data);

        return back()->with([
            'status' => 'success',
            'message' => 'Item(s) added to basket.'
        ]);
    }

    // Show the basket of the authenticated user.
    function show()
    {
        $basket = auth()->user()->basket;
        $basket->loadMissing('products');

        return view('basket', [
            'basket' => $basket,
        ]);
    }

    // Delete a product from the basket.
    function destroy(Request $request, Basket $basket){
        $basket->loadMissing('products');
        $basket->products()->wherePivot('id', $request->input('id'))->first()->pivot->delete();

        return back()->with('message', 'Item removed from basket.');
    }
}
