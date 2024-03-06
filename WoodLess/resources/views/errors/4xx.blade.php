@extends('layouts.base')

@section('title', 'WoodLess - Something Went Wrong')
@section('content')
<div id="maincontent" class="container">
    <h1>Something went wrong</h1>
    <p>Back to <a href="{{url('/products')}}">products</a></p>
</div>
@endsection