<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Retrieve a single product.
     */
    public function show(Product $product){
        return view('product-display', [
            'product' => $product,
            'attributes' => json_decode($product->attributes, true),
            'categories' => $product->categories()->get(),
            'productImages' => $product->images(),
            
            'reviews' => $product->reviews()->orderBy(
                request('sort') ?? 'created_at', 
                request('order') ?? 'asc'
            )->paginate(5)->withQueryString(),
        ]);
    }
}
