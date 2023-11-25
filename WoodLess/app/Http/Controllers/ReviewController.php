<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{   
    //Delete single review
    public function destroy(Review $review){
        $review->delete();
        return redirect(url()->previous())->with('message', 'Review deleted successfully.');
    }
}
