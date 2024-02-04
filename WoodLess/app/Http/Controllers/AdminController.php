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

        $products = $products->sortBy('id');

        return view('inventory', ['products' => $products]);
    }
}
