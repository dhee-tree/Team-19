<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{   

    protected $reviews;

    //Delete single review
    public function destroy(Review $review){
        $review->delete();
        return back()->with('message', 'Review deleted successfully.');
    }
}
