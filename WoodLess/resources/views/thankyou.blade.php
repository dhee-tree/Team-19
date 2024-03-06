@extends('layouts.base')
@section('title', 'WoodLess - Order Confirmed')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endsection 

@section('content')
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 mt-5">
        <h2>Thank You</h2>
        <p>Thank you for your feedback it is greatly appreciated</p>
   
        <p>Click <a href="{{ route('home') }}">here</a> to return to the home page.</p>
 

    </div>
    <div class="col-md-4"></div>
</div>
@endsection