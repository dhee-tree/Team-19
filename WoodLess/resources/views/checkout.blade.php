@extends('layouts.base')
@section('title', 'WoodLess - Checkout')

@section('style')
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endsection 

@section('content')
<div class="container">
    <h2>Checkout</h2>

    <form action="{{ route('charge') }}" method="post">
        <div class="row">
            <div class="col-md-4">
                <h3>Summary: </h3>
                @foreach($basket->products as $product)
                    <div class="checkout-card">
                        <div class="checkout-item">
                            {{ $product->pivot->amount }} x
                            <a class="" href="/product/{{ $product->id }}">{{ $product->title }}</a>
                            <img src="{{ Storage::url(explode(',', $product->images)[0]) }}" alt="product image" width="60" height="60">
                        </div>
                        <div class="checkout-item">
                            @foreach(json_decode($product->pivot->attributes) as $key => $value)
                                @if ($key == "colour") 
                                    <i style="color: {{ $value }}" class="fa-solid fa-circle"></i>
                                @else
                                    <span>{{ $key }}: {{ $value }}</span>
                                @endif
                            @endforeach
                        </div>
                        <div class="checkout-item">
                            @if($product->discount > 0)
                                <span class><s>£{{ $product->cost }}</s> - </span>
                                <?php $discountPrice = round($product->cost - ($product->cost * ($product->discount / 100)), 2) ?>
                                <span>£{{ $discountPrice }}</span>
                                <hr>
                                <p>Total: £{{ $product->pivot->amount * $discountPrice }}</p>
                            @else
                                <p>£{{ $product->cost }}</p>
                                Total: £{{ $product->pivot->amount * $product->cost }}
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-4">
                <h3>Delivery Address: </h3>
                <p>Select one of your addresses.</p>
                    @foreach($addresses as $address)
                        <input type="radio" id="{{ $address->id }}" name="delivery_address" value="{{ $address->id }}" checked onclick="getSelectedValue()">
                        <label for="{{ $address->id }}" onclick="getSelectedValue()">{{ $address->house_number }}, {{ $address->street_name }}, {{ $address->city }}, {{ $address->postcode }}</label><br>
                    @endforeach
                <hr>
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addAddressModal" onclick="preventFormSubmission(event)">Add New Address</button>
            </div>
        </div>
        
        @include('layouts.payment-choice')
        @include('components.add-address-modal')

    </form>

</div>

@endsection

@section('js')
<script  rel= "jssheet" src="{{ asset('js/checkout.js') }}"></script>
@endsection