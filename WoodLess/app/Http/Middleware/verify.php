<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\EmailVerificationCode;

class Verify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {//Check if user is logged in 
        if(!Auth::check()) {
            return redirect()->route('login')->with(['status'=>'danger','message'=>'You need to be logged in to access the page.','error'=>401]);
        }

        //check if user is verified
        if (Auth::user()) {
            //get the user's email verification code
            $emailVerificationCode = EmailVerificationCode::where('user_id', Auth::user()->id)->first();
            //check if their is_verified is false
            if ($emailVerificationCode->is_verified==false) {
                return redirect()->route('home')->with(['status'=>'danger','message'=>'You need to be verified to access basket and checkout.','error'=>403]);
            }

        }
    


      return $next($request);
    }
   
}

