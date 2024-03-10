<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class admin
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
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with(['status' => 'danger', 'message' => 'You need to be logged in to access this page.', 'error' => 401]);
        }
        
        // Check if the user is an admin
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('home')->with(['status' => 'danger', 'message' => 'You do not have permission to access this page.', 'error' => 403]);
        }

        // Allow the request to proceed
        return $next($request);
    }
}
