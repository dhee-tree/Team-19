@extends('layouts.base')
@section('title', 'Order Confirmed')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endsection 

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="confirmation-container">
                <div class="confirmation-card">
                    <h2>Order Confirmed</h2>
                    <p>Thank you for your order. Your order number is: <strong>{{ $order->id }}</strong></p>
                    <p>You will receive an email confirmation shortly.</p>
                    <div> <a href="{{ route('home') }}" class="gradient-button">Return Home</a> </div>
                    <div class="pt-5">
                        <p>We would greatly appreciate some feedback.</p>
                        <a href="/testimonial" class="gradient-button">Leave Feedback</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
