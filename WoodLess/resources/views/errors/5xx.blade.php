@extends('layouts.base')

@section('title', 'WoodLess - {{$exception->getStatusCode()}}')
@section('content')
<div id="maincontent" class="container">
    <h1>{{$exception->getStatusCode()}}: {{(empty($exception->getMessage())) ? 'Something went wrong' : $exception->getMessage()}}.</h1>
    <p>Back to <a href="{{url('/products')}}">products</a></p>
</div>
@endsection