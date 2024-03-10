@extends('layouts.base')

@section('title', 'WoodLess - 404')
@section('content')
    <div id="maincontent" class="container">
        <h1>404: Page Not Found.</h1>
        <p>Back to <a href="{{url('/products')}}">products</a></p>
    </div>
@endsection