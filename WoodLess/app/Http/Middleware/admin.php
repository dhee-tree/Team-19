<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,int $level)
    {

        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with(['status' => 'danger', 'message' => 'You need to be logged in to access this page.', 'error' => 401]);
        }
        if (Auth::user()->access_level >= $level) {
            // Allow the request to proceed for admin users
            return $next($request);
         }
         else {
            return redirect()->route('home')->with([
                'status' => 'danger', 
                'message' => 'You do not have permission to access this page.', 
                'error' => 403
            ]);
        }
    }
}