<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestemonialController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'opinion' => 'required|string|max:255',
        ]);

        // Create a new testimonial
        $testimonial = new Testimonial();
        $testimonial->rating = $request->rating;
        $testimonial->description = $request->opinion;
        $testimonial->user_id = auth()->id(); 
        $testimonial->save();

       
        return redirect()->back()->with('success', 'Thank you for your review!');
    }
    //
}
