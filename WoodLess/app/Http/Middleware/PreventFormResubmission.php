<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventFormResubmission
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('form_submission_in_progress')) {
            // Submission is already in progress, cancel this request
            return redirect()->back()->with(['status' => 'danger', 'message' => 'Submission in progress. Please wait.']);
        }

        // Set the flag to indicate submission is in progress
        $request->session()->put('form_submission_in_progress', true);

        $response = $next($request);

        // Clear the flag after submission is complete
        $request->session()->forget('form_submission_in_progress');

        return $response;
    }
}
