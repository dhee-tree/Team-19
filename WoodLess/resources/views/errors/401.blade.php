@extends('layouts.base')

@section('title', 'WoodLess - 401')
@section('content')
    <div id="maincontent" class="container">
        <h1>401: Unauthorized.</h1>
        <p>Please <a href="{{url('/login')}}">login</a> first.</p>
    </div>
@endsection