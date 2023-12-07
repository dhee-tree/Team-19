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
            'attributes' => json_decode($product->attributes, true),
            'categories' => $product->categories()->get(),
            'productImages' => explode(',', $product->images),
            'reviews' => $reviews,
            'similarProducts' => $similarProducts,
            'finalCost' => sprintf("%0.2f", round(($product->cost) - (($product->cost) * ($product->discount / 100)), 2)),
        ])->render();
    }
    public function index()
    {
    }

    //quries all the products
    public function getAll()
    {
        $products = Product::all();
        return view('product-list', ['products' => $products]);
    }


    public function attributes($attribute)
    {


        return json_decode($attribute, true);
    }

    //Gets products then filters for them
    public function filter(Request $request)
    {


        //Get search paramaters
        $filters = collect($request->query());
        //break them apart into filters or auto sets to null if no cateogry was passed
        $categories = $filters['categories'] ?? null;
        $finish = $filters['finish'] ?? null;
        $size = $filters['size'] ?? null;
        $rating = $filters['rating'] ?? null;
        $minPrice = $filters['price'] ?? null;
        $maxPrice = $filters['price'] ?? null;
        $color = $filters['color'] ?? null;


        $products = Product::whereJsonContains('attributes->categories', $categories)
            ->whereJsonContains('attributes->finish', $finish)
            ->whereJsonContains('attributes->size', $size)
            ->whereJsonContains('attributes->rating', $rating)
            ->whereJsonContains('attributes->color', $color)
            ->where('price', '>', $minPrice)
            ->where('price', '<', $maxPrice)
            ->get();



        $filteredProducts = "";
        //return view('product-list', ['products' => $filteredProducts]);

        dd($products);
    }
}
