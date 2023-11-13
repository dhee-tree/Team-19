<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Single Product. Retrieves product from database using id and loads page
    public function show(Product $product){
        return view('product-display', [
            'product' => $product
        ]);
    }
}
