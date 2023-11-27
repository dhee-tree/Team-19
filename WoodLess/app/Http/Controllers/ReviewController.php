<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{   
    //Delete single review
    public function destroy(Review $review){
        $review->delete();
        return back()->with('message', 'Review deleted successfully.');
    }
}
