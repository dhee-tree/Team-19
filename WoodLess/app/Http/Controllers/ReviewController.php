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
                return redirect('/')->with([
                    'status' => 'danger',
                    'message' => 'Product no longer exists.'
                ]);
            }
            
            $reviews = $product->getCachedRelation('reviews');
            $user = auth()->user();

            if($reviews->contains('user_id', $user->id)){
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
                'description.min' => 'Description must be longer than 25 characters.',
                'description.required' => 'Please provide a description.'
            ]);
            
            if($validator->fails()) {
                return back()->with([
                    'status' => 'warning',
                    'message' => $validator->errors()->first()
                ]);
            }
            
            $product->loadMissing('reviews');
            $product->reviews()->create([
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

    /**
     * Update an existing review's description.
     */
    public function update(Request $request, Review $review){
        
        try {
            if($review->description == $request->input('description')){
                return back()->with([
                    'status' => 'warning',
                    'message' => 'No changes were made.'
                ]);
            }

            $validator = Validator::make($request->all(), [
                'description' => 'required|min:25'
            ],
        
            [
                'description.min' => 'Description must be longer than 25 characters.',
                'description.required' => 'Please provide a description.'
            ]);
    
            if($validator->fails()) {
                return back()->with([
                    'status' => 'warning',
                    'message' => $validator->errors()->first()
                ]);
            }
    
            $review->update([
                'description' => $request->input('description')
            ]);
    
            return back()->with([
                'status' => 'success',
                'message' => 'Review updated.'
            ]);
        } 
        
        catch (QueryException $e) {
            return back()->with([
                'status' => 'danger',
                'message' => 'Failed to update review.',
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
                'message' => 'Review deleted.'
            ]);
        } 
        
        catch (QueryException $e) {
            return back()->with([
                'status' => 'danger',
                'message' => 'Failed to delete review.',
                'error' => $e
            ]);
        }
    }
}
