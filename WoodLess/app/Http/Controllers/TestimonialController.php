<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'opinion' => 'required|string|max:255', // Max 255 characters for opinion
    ]);

    // Check if the opinion is empty or too long
    if (empty($request->opinion) || strlen($request->opinion) > 255) {
        // Redirect back with error message
        return redirect()->back()->with('error', 'Please provide a valid opinion (max 255 characters) before submitting.');
    }

    // Create a new testimonial
    $testimonial = new Testimonial();
    $testimonial->rating = $request->rating;
    $testimonial->description = $request->opinion;
    $testimonial->user_id = auth()->id(); 
    $testimonial->save();

    // Redirect to thank you page
    return redirect('/thankyou');
}
}