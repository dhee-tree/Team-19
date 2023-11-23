<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Retrives a Single Product.
     */
    public function show(Product $product){
        return view('product-display', [
            'product' => $product,
            'attributes' => json_decode($product->attributes, true),
            'categories' => $product->categories()->get(),
            'productImages' => explode(',',$product->images),
            'reviews' => $product->reviews()->simplePaginate(5),
        ]);
    }
}
