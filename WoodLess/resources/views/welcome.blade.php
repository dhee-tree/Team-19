@extends('layouts.base')
@section('title', 'WoodLess - Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Welcome to WoodLess</h1>
                <ul>
                    <li>
                        <a href="{{ url('about') }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ url('categories') }}">Categories</a>
                    </li>
                    <li>
                        <a href="{{ url('contact') }}">Contact Us</a>
                    </li>
                    <li>
                        <a href="{{ url('products-view') }}">Products Details</a>
                    </li>
                    <li>
                        <a href="{{ url('products') }}">Products List</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection