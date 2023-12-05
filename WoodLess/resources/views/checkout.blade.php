@extends('layouts.base')
@section('title', 'WoodLess - Checkout')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endsection 

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Checkout</h2>
                <hr>
                @foreach($basket->products as $product)
                    {{ $product->title }}
                    {{ $product->pivot->amount }}
                    {{ $product->pivot->attributes }}
                @endforeach
            </div>
        </div>
    </div>

@endsection

@section('js')
<!-- <script  rel= "jssheet" src="{{ asset('js/checkout.js') }}"></script> -->
@endsection