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

        return back()->with('message', 'Item added to basket.');
    }
}
