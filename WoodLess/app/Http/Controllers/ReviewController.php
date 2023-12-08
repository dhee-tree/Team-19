<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{   

    //Store single review
    public function store(Request $request, Product $product){
        //$user = auth()->user();
        $product->loadMissing('reviews');
        $user = auth()->user();

        $request->validate([
            'user_id' => 'unique',
            'rating' => 'required|min:1',
            'description' => 'required|min:25'
        ]);

        $product->reviews()->create([
            'user_id' => $user->id,
            'rating' => $request->input('rating'),
            'description' => $request->input('description')    
        ]);

        return back()->with([
            'status' => 'success',
            'message' => 'Review uploaded successfully.'
        ]);
    }

    //Delete single review
    public function destroy(Review $review){
        $review->delete();
        return back()->with([
            'status' => 'success',
            'message' => 'Review deleted successfully.'
        ]);
    }
}
