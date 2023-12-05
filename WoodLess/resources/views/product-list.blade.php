@extends('layouts.base')
@section('title', 'WoodLess - Products')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Products</h1>
                @foreach ($products as $product)
    <p>{{ $product->title }}-{{ $product->description }}-{{ $product->cost }} </p>
@endforeach
            </div>
        </div>
    </div>
@endsection