<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{

    public function charge(Request $request)
    {
       \Stripe\Stripe::setApiKey(config('stripe.sk'));

       $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'gbp',
                        'product_data' => [
                            'name' => 'Woodless Test',
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

        return redirect()->away($session->url);
    }

}
