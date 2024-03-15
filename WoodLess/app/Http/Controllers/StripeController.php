<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class StripeController extends Controller
{
    public function charge(Request $request)
    {   
        $key = openssl_random_pseudo_bytes(16 * 2);
        // Check if address is empty
        if (empty($request->delivery_address)) {
            return back()->with([
                'status' => 'danger',
                'message' => 'Please select a address.'
            ]);
        } else {
            \Stripe\Stripe::setApiKey(config('stripe.sk'));
            
            $session = \Stripe\Checkout\Session::create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'gbp',
                            'product_data' => [
                                'name' => 'Woodless Order Payment',
                            ],
                            'unit_amount' => $request->amount * 100,
                        ],
                        'quantity' => 1,
                    ],
                 ],
                'mode' => 'payment',
                'success_url'      => route('checkout.store', ['checkout' => Hash::make($key)]), //Hashed version of key as its in request
                'cancel_url'       => route('checkout'),
             ]);
     
             // Get the address id from the request
             $address_id = $request->delivery_address;
             // Store the address id in session
             $request->session()->put('address_id', $address_id);
             // Copy of the key in memory (will be compared in success controller)
             $request->session()->put('checkout_key', Crypt::encryptString($key));
             return redirect()->away($session->url);
            }
    }

}
