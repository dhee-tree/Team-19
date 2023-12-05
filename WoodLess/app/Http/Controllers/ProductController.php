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
    public function show(Product $product){

        $product->loadMissing('categories', 'reviews');

        $similarProducts = Product::all()->where('id', 6)->take(6);
        
        $reviews = $product->reviews()->orderBy(
            request('sort') ?? 'created_at',
            request('order') ?? 'desc'
        )->paginate(5)->withQueryString()->fragment('reviews');

        return view('product-display', [
            'product' => $product,
            'attributes' => json_decode($product->attributes, true),
            'categories' => $product->categories()->get(),
            'productImages' => explode(',', $product->images),
            'reviews' => $reviews,
            'similarProducts' => $similarProducts,
            'finalCost' => sprintf("%0.2f",round(($product->cost)-(($product->cost) * ($product->discount/100)),2)),
        ])->render();
    }
}
