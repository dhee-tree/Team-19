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
            $user = Auth::user();
            
            if($user->accessLevel() >= 2){
                return $next($request);
            }
            //get the user's email verification code
            $isVerified = EmailVerificationCode::where('user_id', $user->id)->first()->is_verified ?? false;
            //check if their is_verified is false
            if ($isVerified == false) {
                return redirect()->back()->with(['status'=>'danger','message'=>'Please verify your email to access this feature.','error'=>403]);
            }

        }
    


      return $next($request);
    }
   
}

