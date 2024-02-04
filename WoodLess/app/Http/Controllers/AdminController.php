<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;

class AdminController extends Controller
{

    protected $reviews;


    //returns the view for inventory on the admin controller.
    public function inventory()
    {

        $products = Product::latest()->get();

        // Loop through each product
        foreach ($products as $product) {
            // Concatenate category names into a single string
            $categoriesText = $product->categories->pluck('category')->implode(', ');

            // Add the categoriesText field to the product object
            $product->categoriesText = $categoriesText;
        }

        return view('inventory', ['products' => $products]);
    }
}
