<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\CategoryController;

class ProductController extends Controller
{

    protected $reviews;

    /**
     * Retrieve a single product.
     */
    public function show(int $product_id)
    {   
        $product = Product::getCached($product_id);
        $categories = $product->getCachedRelation('categories');

        $product->loadMissing('reviews');

        $similarProducts = $categories->pluck('products')->flatten()->unique('id')->reject(function ($p) use ($product) {
            return $p->id == $product->id;
        })->shuffle()->take(8);

        $reviews = $product->reviews()->orderBy(
            request('sort') ?? 'created_at',
            request('order') ?? 'desc'
        )->paginate(5)->withQueryString()->fragment('reviews');

        //ddd('test');

        return view('products.show', [
            'product' => $product,
            'amount'=> $product->stockAmount(),
            'attributes' => json_decode($product->attributes, true),
            'categories' => $categories,
            'productImages' => explode(',', $product->images),
            'reviews' => $reviews,
            'similarProducts' => $similarProducts,
            'finalCost' => sprintf("%0.2f", round(($product->cost) - (($product->cost) * ($product->discount / 100)), 2)),
        ])->render();
    }
    public function search(){
        $search_text =$_GET['search'];
        $products= Product::where('title','LIKE','%'.$search_text.'%');
        $products->orWhere('tags', 'LIKE', '%' . $search_text . '%');

        $products = $products->get();
    
      
        
        return view('product-list', ['products' => $products, 'search_text' => $search_text]);

     
    }
    //Queries the products, and returns if we searched for something or not.
    public function index()
    {
        //Get search paramaters
        $filters = collect(request()->query());
        $search_text = request('search', null);

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
        return view('product-list', ['products' => $products,'search_text' => $search_text]);

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