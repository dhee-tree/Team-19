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
    public function show(Product $product)
    {

        $product->loadMissing('categories', 'reviews');

        $similarProducts = Product::all()->where('id', 6)->take(6);

        $reviews = $product->reviews()->orderBy(
            request('sort') ?? 'created_at',
            request('order') ?? 'desc'
        )->paginate(5)->withQueryString()->fragment('reviews');

        return view('product-display', [
            'product' => $product,
            'attributes' => ["5" => 2, "3" => 2],
            'categories' => $product->categories()->get(),
            'productImages' => explode(',', $product->images),
            'reviews' => $reviews,
            'similarProducts' => $similarProducts,
            'finalCost' => sprintf("%0.2f", round(($product->cost) - (($product->cost) * ($product->discount / 100)), 2)),
        ])->render();
    }
    //quries all the products
    public function index()
    {
        $products = Product::latest()->get();
        return view('product-list', ['products' => $products]);
    }

    //Gets products then filters for them
    public function filter()
    {

        //return view('product-list', ['products' => $products]);

        //Get search paramaters
        $filters = collect(request()->query());
        //break them apart from filters array or auto sets to null if no cateogry was passed
        $finish = $filters['finish'] ?? null;
        $size = $filters['size'] ?? null;
        $color = $filters['color'] ?? null;
        $minCost = $filters['minCost'] ?? 0;
        $maxCost = $filters['maxCost'] ?? 500000000;

        //compiles all the data recieved and puts them in arrays if needed
        $data = [
            'finish' => json_decode($finish),
            'size' => json_decode($size),
            'color' => json_decode($color),
            'minCost' => (float)$minCost,
            'maxCost' => (float)$maxCost
        ];

        //gets the products with filtered criteria
        $products = Product::latest()->filter($data)->get();
        //displays filtered products
        return view('product-list', ['products' => $products]);
    }
}
