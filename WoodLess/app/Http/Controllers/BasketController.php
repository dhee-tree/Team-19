<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\BasketProduct;
use Exception;
use Illuminate\Database\QueryException;
use PHPUnit\Util\Xml\XmlException;

class BasketController extends Controller
{
    /**
     * Store a product in a basket.
     * @param Request $request The HTTP request data.
     * @param int $product_id The id of the product to store.
     */
    function store(Request $request, int $product_id){
        try{
            $product = Product::getCached($product_id);
            if($product->stockAmount() > 0){
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

                $basket = auth()->user()->basket;
                $basket->loadMissing('products');
                
                $productInBasket = $basket->products()
                ->wherePivot('product_id', $product_id)
                ->wherePivot('attributes', $data['attributes'])
                ->first();

                if(isset($productInBasket)){
                    $productInBasket->pivot->update([
                        'amount' => $productInBasket->pivot->amount + $data['amount'],
                    ]);
                }

                else{
                    $basket->products()->attach($product_id, $data);
                }

                return back()->with([
                    'status' => 'success',
                    'message' => 'Added to basket.'
                ]);
            }

            $product->wipeCache();
            return back()->with([
                'status' => 'danger',
                'message' => 'Product is unavailable.'
            ]);
        }

        catch(QueryException $e){
            return back()->with([
                'status' => 'danger',
                'message' => 'Failed to update basket.',
                'error' => $e
            ]);
        }
    }

    /**
     * Show the basket of the authenticated user.
     */
    function show()
    {
        $basket = auth()->user()->basket;
        $basket->loadMissing('products');

        return view('basket', [
            'basket' => $basket,
        ]);
    }

    /**
     * Delete a product from the basket.
     * @param Request $request The HTTP request data.
     * @param Basket $basket The basket to delete the product from.
     */
    function destroy(Request $request, Basket $basket){
        $basket->loadMissing('products');
        $basket->products()->wherePivot('id', $request->input('id'))->first()->pivot->delete();

        return back()->with([
            'status' => 'success',
            'message' => 'Product removed from basket.',
        ]);
    }

    /**
     * Update a product in the basket.
     * @param Request $request The HTTP request data.
     * @param Basket $basket The basket to update.
     */
    function update(Request $request, Basket $basket){
        $basket->loadMissing('products');
        $product = $basket->products()->wherePivot('id', $request->input('id'))->first();
        $product->pivot->update(['amount' => $request->input('amount')]);

        return back()->with([
            'status' => 'success',
            'message' => 'Basket updated.',
        ]);
    }
     
}
