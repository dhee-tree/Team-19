<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{

    public function charge(Request $request)
    {
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
                'success_url'      => route('checkout.store'),
                'cancel_url'       => route('checkout'),
             ]);
     
             // Get the address id from the request
             $address_id = $request->delivery_address;
             // Store the address id in session
             $request->session()->put('address_id', $address_id);
     
             return redirect()->away($session->url);
        }
    }

}
