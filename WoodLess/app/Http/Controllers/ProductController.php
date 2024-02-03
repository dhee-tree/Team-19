<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;

class ProductController extends Controller
{

    protected $reviews;

    /**
     * Retrieve a single product.
     */
    public function show(Product $product)
    {
        $product->loadMissing('categories', 'reviews');

        $similarProducts = $product->categories()->first()->products()->take(8)->get();

        $reviews = $product->reviews()->orderBy(
            request('sort') ?? 'created_at',
            request('order') ?? 'desc'
        )->paginate(5)->withQueryString()->fragment('reviews');

        return view('products.show', [
            'product' => $product,
            'amount'=> $product->stockAmount(),
            'attributes' => json_decode($product->attributes, true),
            'categories' => $product->categories()->get(),
            'productImages' => explode(',', $product->images),
            'reviews' => $reviews,
            'similarProducts' => $similarProducts,
            'finalCost' => sprintf("%0.2f", round(($product->cost) - (($product->cost) * ($product->discount / 100)), 2)),
        ])->render();

    }
    //Queries the products, and returns if we searched for something or not.
    public function index()
    {
        //Get search paramaters
        $filters = collect(request()->query());

        //get categories    

        //break them apart from filters array or auto sets to null if no cateogry was passed
        $finish = $filters['finish'] ?? null;
        // Get an array of values for the 'category' key
        // Extract values for the 'category' key and put them into an array
        $categories = $filters['categories'] ?? [];
        //dd($categories);
        $ratings = $filters['ratings'] ?? [];
        $color = $filters['color'] ?? null;
        $minCost = $filters['minCost'] ?? 0;
        $maxCost = $filters['maxCost'] ?? 500000000;

        //compiles all the data recieved and puts them in arrays if needed

        $data = [
            'finish' => json_decode($finish),
            'categories' => $categories,
            'ratings' => $ratings,
            'color' => json_decode($color),
            'minCost' => (float)$minCost,
            'maxCost' => (float)$maxCost
        ];

        $products = Product::latest()->filter($data)->get();
        return view('product-list', ['products' => $products]);
    }
    //gets three random categories and products  for home page
    public function getThreeRandom()
    {
        $products = Product::all();
        $categories = Category::all(); 
    
        return view('welcome', [
            'products' => $products,
            'categories' => $categories,  
        ]);
    }
}
