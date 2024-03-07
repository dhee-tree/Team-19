<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\EmailVerificationCode;

class VerificationEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if ($request->user()) {
            // Check if the user has an associated EmailVerificationCode record
            $verificationCode = EmailVerificationCode::where('user_id', $request->user()->id)->first();

            // If the verification code record is found and is verified
            if (!$verificationCode) {
                // Check if the request is for basket or order-related routes
                if ($request->is('basket') || $request->is('checkout')) {
                    // Prevent unverified users from accessing basket and order-related routes
                    return redirect()->route('verification.notice')->with('danger', 'Please verify your email to access baskets and orders.');
                }
                // Proceed with the request
                return $next($request);
            } else {
                // If the verification code record is not found or not verified, redirect to the email verification screen
                return redirect()->route('verification.notice')->with('danger', 'Please verify your email to continue.');
            }
        }
    }
}
