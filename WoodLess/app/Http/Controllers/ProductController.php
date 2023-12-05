<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{   

    protected $reviews;

    /**
     * Retrieve a single product.
     */
    public function show(Request $request, Product $product){

        $product->loadMissing('categories', 'reviews');
        
        $reviews = $product->reviews()->orderBy(
            request('sort') ?? 'created_at',
            request('order') ?? 'desc'
        )->paginate(5)->withQueryString()->fragment('reviews');

        if ($request->ajax()) {
            return view('reviews.load', ['product' =>$product, 'reviews' => $reviews])->render();  
        }

        return view('product-display', [
            'product' => $product,
            'attributes' => json_decode($product->attributes, true),
            'categories' => $product->categories()->get(),
            'productImages' => explode(',', $product->images),
            'reviews' => $reviews,
            'finalCost' => sprintf("%0.2f",round(($product->cost)-(($product->cost) * ($product->discount/100)),2)),
        ])->render();
    }
}
