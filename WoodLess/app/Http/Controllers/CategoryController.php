<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Returns the categories page.
     */
    public function index(){
        $categories = Category::getAllCached();
        return view('categories', ['categories' => $categories]);
    }   
   
}
