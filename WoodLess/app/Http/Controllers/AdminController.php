<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;

class AdminController extends Controller
{

    protected $reviews;

    public function AdditionalInfo($id)
    {
        $product = Product::findOrFail($id);

        return view('components.products-info', compact('product'));
    }

    public function EditProduct($id)
    {
        $product = Product::findOrFail($id);

        return view('components.products-edit', compact('product'));
    }

    //returns the view for inventory on the admin controller.
    public function inventory()
    {

        $products = Product::latest()->get();

        $products = $products->sortBy('id');

        return view('inventory', ['products' => $products]);
    }

    public function users()
    {

        $users = User::latest()->get();

        $users = $users->sortBy('id');

        return view('users-admin', ['users' => $users]);
    }
}
