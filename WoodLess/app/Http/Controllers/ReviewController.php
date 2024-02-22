<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ReviewController extends Controller
{   

    /**
     * Store a single review.
     */
    public function store(Request $request, Product $product){
        try {
            $product->loadMissing('reviews');
            $reviews = $product->reviews();
            $user = auth()->user();
    
            $request->validate([
                'user_id' => 'unique',
                'rating' => 'required|min:1',
                'description' => 'required|min:25'
            ]);
    
            $reviews->create([
                'user_id' => $user->id,
                'rating' => $request->input('rating'),
                'description' => $request->input('description')    
            ]);
    
            return back()->with([
                'status' => 'success',
                'message' => 'Review uploaded successfully.'
            ]);

        } catch (QueryException $e) {
            return back()->with([
                'status' => 'danger',
                'message' => 'Failed to upload review.',
                'error' => $e
            ]);
        }
    }

    /**
     * Delete a single review.
     */
    public function destroy(Review $review){
        try {
            $review->delete();
            return back()->with([
                'status' => 'success',
                'message' => 'Review deleted successfully.'
            ]);
        } catch (QueryException $e) {
            return back()->with([
                'status' => 'danger',
                'message' => 'Failed to delete review.',
                'error' => $e
            ]);
        }

    }
}
