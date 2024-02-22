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
                                @else
                                    <span>{{ $key }}: {{ $value }}</span>
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
                <div id="deliveryForm">
                    <form method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="address_line1" class="form-label">Address Line 1</label>
                            <input type="text" class="form-control" id="address_line1" required>
                        </div>
                        <div class="mb-3">
                            <label for="address_line2" class="form-label">Address Line 2</label>
                            <input type="text" class="form-control" id="address_line2">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" required>
                        </div>
                        <div class="mb-3">
                            <label for="postcode" class="form-label">Post Code</label>
                            <input type="text" class="form-control" id="postcode" required>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="confirmDeliveryAddress()">Confirm Delivery Address</button>
                    </form>
                </div>

                <div id="confirmedAddressMessage">
                    <span id="addressToDeliver" class="text-success">Delivery address confirmed!</span> <a href="#" id="changeDeliveryAddress" onClick="changeAddress('delivery')">Change Delivery Address</a>
                </div>

                <h2 class="mt-3">Billing Address</h2>
                <div id="deliveryConfirmation" class="mt-3 d-none">
                    <div class="form-check">
                        <label for="sameAsDelivery">Same as Delivery Address</label>
                        <input class="form-check-input" type="checkbox" id="sameAsDelivery"> 
                    </div>
                </div>
                <div id="billingForm" class="mt-3">
                    <form method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="billing-address_line1" class="form-label">Address Line 1</label>
                            <input type="text" class="form-control" id="billing-address_line1" required>
                        </div>
                        <div class="mb-3">
                            <label for="billing-address_line2" class="form-label">Address Line 2</label>
                            <input type="text" class="form-control" id="billing-address_line2">
                        </div>
                        <div class="mb-3">
                            <label for="billing-city" class="form-label">City</label>
                            <input type="text" class="form-control" id="billing-city" required>
                        </div>
                        <div class="mb-3">
                            <label for="billing-postcode" class="form-label">Post Code</label>
                            <input type="text" class="form-control" id="billing-postcode" required>
                        </div>
                        <div class="mb-3">
                            <label for="billing-country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="billing-country" required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="confirmBillingAddress()">Confirm Billing Address</button>
                    </form>
                </div>

                <div id="billingConfirmation" class="mt-3 d-none">
                    <span class="text-success">Billing address added successfully!</span> <a href="#" id="changeBillingAddress" onClick="changeAddress('billing')">Change Billing Address</a>
                </div>

                <div id="deliveryDetails" class="mt-3">
                    <h3>Delivery Details:</h3>
                    <p id="deliveryAddress"></p>
                </div>
            </div>

            <div class="col-md-12" id="payment-option">
                <h3>Payment:</h3>
                <h4>Total cost: £{{ $basket->totalCost() }}</h4>
                <form action="{{ route('checkout.store') }}" method="post" enctype="multipart/form-data">
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