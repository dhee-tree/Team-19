<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function sendEmail()
    {
        $data = request()->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required|min:5|max:1000',
        ]);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactUsMail($data));
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
