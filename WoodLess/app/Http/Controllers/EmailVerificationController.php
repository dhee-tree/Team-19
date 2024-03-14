<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailVerificationCode;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;

class EmailVerificationController extends Controller
{
    public function verifyUserEmail($code) {
        // Find the EmailVerificationCode record by code
        $verificationCode = EmailVerificationCode::where('code', $code)->first();

        // If the verification code record is found
        if ($verificationCode) {
            // Update the is_verified field to true
            $verificationCode->is_verified = true;
            $verificationCode->save();
            
            // Redirect to the login or home page with a success message
            if (auth()->check()) {
                return redirect('home')->with(['status'=>'success', 'message'=>"Your email has been verified successfully!"]);
            } else {
                return redirect('login')->with(['status'=>'success', 'message'=>"Your email has been verified successfully!"]);
            }
        } else {
            // If the verification code record is not found, redirect back with an error message
            return redirect()->back()->with(['status'=>'danger', 'message'=>'Invalid verification code.']);
        }
    }

    public function resendVerificationEmail() {
        // Get the user's email verification code
        $emailVerificationCode = EmailVerificationCode::where('user_id', auth()->user()->id)->first();

        // If the user's email verification code is found
        if ($emailVerificationCode) {
            // Send the verification email
            Mail::to(auth()->user()->email)->send(new VerificationMail($emailVerificationCode->code, auth()->user()->first_name));
            // Redirect back with a success message
            return redirect()->back()->with(['status'=>'success', 'message'=>'Verification email has been resent.']);
        } else {
            // If the user's email verification code is not found, redirect back with an error message
            return redirect()->back()->with(['status'=>'success', 'message'=>'No email verification code found.']);
        }
    }
}
