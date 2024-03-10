@extends('layouts.base')

@section('title', 'WoodLess - 403')
@section('content')
    <div id="maincontent" class="container">
        <h1>403: Forbidden.</h1>
        <p>Back to <a href="{{url('/products')}}">products</a></p>
    </div>
@endsection