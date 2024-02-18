<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailVerificationCode;

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
                return redirect('home')->with('message', "Your email has been verified successfully!");
            } else {
                return redirect('login')->with('message', "Your email has been verified successfully!");
            }
        } else {
            // If the verification code record is not found, redirect back with an error message
            return redirect()->back()->with('error', 'Invalid verification code.');
        }
    }
}
