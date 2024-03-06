@extends('layouts.base')
@section('title', 'WoodLess - Order Confirmed')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endsection 

@section('content')
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 mt-5">
        <h2>Order Confirmed</h2>
        <p>Thank you for your order. Your order number is: {{ $basket->id }}</p>
        <p>You will receive an email confirmation shortly.</p>
        <p>Click <a href="{{ route('home') }}">here</a> to return to the home page.</p>
        <P> We would greatly appreciate some feedback</p>
        <p>Click <a href="/testemonial">here</a> to leave feedback.</p>

    </div>
    <div class="col-md-4"></div>
</div>
@endsection