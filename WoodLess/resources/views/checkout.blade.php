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
        </div>
        
        @include('layouts.payment-choice')

    </div>

@endsection

@section('js')
<script  rel= "jssheet" src="{{ asset('js/checkout.js') }}"></script>
@endsection