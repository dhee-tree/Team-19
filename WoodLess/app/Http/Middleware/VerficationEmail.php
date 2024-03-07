<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class VerificationEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and their email is not verified
        if ($request->user() && !$request->user()->hasVerifiedEmail()) {
            // Redirect the user to the email verification screen
            return redirect()->route('verification.notice');
        }

        // Check if the user ID exists in the database
        $userId = $request->user()->id;
        $userExists = User::where('id', $userId)->exists();

        if (!$userExists) {
            // If user ID doesn't exist in the database, handle accordingly
            // For example, log the incident and return a response
            \Log::warning('User ID not found in the database: ' . $userId);
            abort(404, 'User not found');
        }

        // Proceed with the request if the email is verified and user ID exists in the database
        return $next($request);
    }
}
