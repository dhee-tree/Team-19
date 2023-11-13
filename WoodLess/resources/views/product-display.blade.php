@extends('layouts.base')
@section('title', 'WoodLess - '. $product->title)

@php
    $attributes = json_decode($product->attributes, true)
@endphp

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{$product->title}}</h1>
                <h2>About Product</h2>
                <p>{{$product->description}}</p>
                @foreach ($attributes as $attribute => $values)
                    <p>{{'Attribute: '. $attribute . ' Value: '.$values}}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection