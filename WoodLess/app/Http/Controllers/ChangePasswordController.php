<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        $user = auth()->user();
        return view('auth.change-password', [
            'user' => $user,
        ]);
    }

    public function changePassword(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|min:8',
            'confirmed' => 'required|same:password',
        ]);

        $validator->after(function ($validator) use ($request, $user) {
            if (!Hash::check($request->current_password, $user->password)) {
                $validator->errors()->add('current_password', 'The current password is incorrect.');
            }
        });

        if ($validator->fails()) {
            return redirect()
                ->route('password.change.form')
                ->withErrors($validator)
                ->withInput();
        }

        // Update the user's password
        $user->update(['password' => Hash::make($request->password)]);

        return redirect()
            ->route('user-panel')
            ->with('success', 'Password changed successfully.');
    }
}
