<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{   

    /**
     * Store a single review.
     */
    public function store(Request $request, int $product_id){
        try {
            $product = Product::findCached($product_id);

            if (is_null($product)){
                return back()->with([
                    'status' => 'danger',
                    'message' => 'Product no longer exists.'
                ]);
            }
            
            $product->loadMissing('reviews');
            $reviews = $product->reviews();
            $user = auth()->user();

            if($reviews->where('user_id', $user->id)->exists()){
                return back()->with([
                    'status' => 'danger',
                    'message' => 'Review already exists.'
                ]);
            };

            $validator = Validator::make($request->all(), [
                'rating' => 'required|min:1',
                'description' => 'required|min:25'
            ],

            [
                'rating.required' => 'Please provide a rating.',
                'description.min' => 'Your description must be longer than 25 characters.',
                'description.required' => 'Your review is missing a description.'
            ]);
            
            if($validator->fails()) {
                return back()->with([
                    'status' => 'warning',
                    'message' => $validator->errors()->first()
                ]);
            }
    
            $reviews->create([
                'user_id' => $user->id,
                'rating' => $request->input('rating'),
                'description' => $request->input('description')    
            ]);
    
            return back()->with([
                'status' => 'success',
                'message' => 'Review uploaded.'
            ]);

        } catch (QueryException $e) {
            return back()->with([
                'status' => 'danger',
                'message' => 'Failed to upload review.',
                'error' => $e
            ]);
        }
    }

    public function update(){
        return back()->with([
            'status' => 'warning',
            'message' => 'This feature is in development.'
        ]);
    }

    /**
     * Delete a single review.
     */
    public function destroy(Review $review){
        try {
            $review->delete();
            return back()->with([
                'status' => 'success',
                'message' => 'Review deleted.'
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
