@extends('layouts.base')
@section('title', 'WoodLess - Checkout')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endsection 

@section('content')
    <div class="container">
        <div class="row">
            <h2>Checkout</h2>
            <div class="col-md-4">
                <h3>Items in this order: </h3>
                @foreach($basket->products as $product)
                    <div class="checkout-card">
                        <div class="checkout-item">
                            {{ $product->pivot->amount }} x
                            <a class="" href="/product/{{ $product->id }}">{{ $product->title }}</a>
                            @foreach(json_decode($product->pivot->attributes) as $key => $value)
                                @if ($key == "colour") 
                                    <span class="colour-square" style="background-color: {{ $value }};"></span>
                        </div>
                        <div class="checkout-item">
                                @elseif ($key == "size")
                                    <p>Size: {{ $value }}</p>
                                @endif
                                
                            @endforeach
                        </div>
                        <div class="checkout-item">
                            @if($product->discount > 0)
                                <?php $discountPrice = round($product->cost - ($product->cost * ($product->discount / 100)), 2) ?>
                                <p>£{{ $discountPrice }}</p>
                            @else
                                <p>£{{ $product->cost }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-8">
                <h3>Delivery address:</h3>
            </div>

            <div class="col-md-12" id="payment-option">
                <h3>Payment:</h3>
                <h4>Total cost: £{{ $basket->totalCost() }}</h4>
                <form action="{{ route('checkout.store') }}" method="post">
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
                        <div id="payment-card">
                            @include('layouts.payment-choice')
                            <h6 class="mt-2 p-10">By clicking Place Order you agree that we charge you £{{ $basket->totalCost() }} on your selected payment method.</h6>
                            <button type="submit" class="btn btn-success">Place Order</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script  rel= "jssheet" src="{{ asset('js/checkout.js') }}"></script>
@endsection