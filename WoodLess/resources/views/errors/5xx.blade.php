@extends('layouts.base')

@section('title', 'WoodLess - Error')
@section('content')
<div id="maincontent" class="container">
    <h1>{{$exception->getStatusCode()}}: {{$exception->getMessage()}}</h1>
    <p>Back to <a href="{{url('/products')}}">products</a></p>
</div>
@endsection