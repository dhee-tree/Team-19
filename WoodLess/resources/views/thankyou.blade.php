@extends('layouts.base')
@section('title', 'WoodLess - Thank you')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endsection 


   



@section('content')
<div class="confirmation-container">
    <div class="confirmation-card">
        <h2>Thank You</h2>
        <p>Thank you for your feedback it is greatly appreciated</p>
   
        <div> <a href="{{ route('home') }}" class="gradient-button">Return Home</a> </div>
 

    </div>
    <div class="col-md-4"></div>
</div>
@endsection 