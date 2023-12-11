<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // getscategories for categories page
    public function getCategories(){
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }   
   
}
