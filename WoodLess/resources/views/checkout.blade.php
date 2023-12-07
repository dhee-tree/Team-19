@extends('layouts.base')
@section('title', 'WoodLess - Checkout')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endsection 

@section('content')
    <div class="container">
        <div class="row">
            <h2>Checkout</h2>
            <div class="col-md-12">
                <h3>Items in this order: </h3>
                <hr>
                @foreach($basket->products as $product)
                    {{ $product->title }}
                    {{ $product->pivot->amount }}
                    {{ $product->pivot->attributes }}
                    <hr>
                @endforeach
            </div>

            <div class="col-md-12">
                <h3>Delivery address:</h3>
            </div>

            <div class="col-md-12">
                <h3>Payment method:</h3>
                <form action="" method="post">
                    @csrf
                    <div class="payment-option">
                        <label for="paypal">PayPal</label>
                        <input type="radio" name="payment" id="paypal" value="paypal" onClick="paymentChoice('paypal');">
                    </div>

                    <div class="payment-option">
                        <label for="credit_card">Credit/Debit Card</label>
                        <input type="radio" name="payment" id="credit_card" value="credit_card" onClick="paymentChoice('card');">
                    </div>

                    <div id="payment-choice">
                        @include('layouts.payment-choice')
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script  rel= "jssheet" src="{{ asset('js/checkout.js') }}"></script>
@endsection