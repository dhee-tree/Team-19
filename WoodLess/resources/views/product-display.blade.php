@extends('layouts.base')
@section('title', 'WoodLess - '. $product->title)

@php
    $attributes = json_decode($product->attributes, true);
    $tags = explode(',', $product->tags);
@endphp

@section('content')
    <div class="container" id="product">
        <div class="row" id="gallery">

        </div>

        <div class="row" id="about">
            <div class="col-12">
                <h1>{{$product->title}}</h1>
                <div class="row">
                    <p>
                        @foreach ($tags as $tag)
                            {{$tag}}
                        @endforeach
                    </p>
                </div>
                <h3>£{{$product->cost}}</h3>

                <form action="/" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        @if ($product->amount == 0)
                            <input type="submit" name="submit" disabled value="Out of Stock">
                        @else
                            @foreach ($attributes as $attribute => $values)
                                <label for="attribute-{{$attribute}}">{{ucfirst($attribute).':'}}</label>
                                <select name="attribute-{{$attribute}}" id="attribute-{{$attribute}}">
                                    @foreach (explode(',', $values) as $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                    @endforeach
                                </select>   
                            @endforeach
                
                            <br>

                            <label for="quantity">Qty:</label>
                            <select name="quantity" id="quantity">
                                @for ($i = 1; $i < $product->amount; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            
                            <input type="submit" name="submit" value="Add To Basket">
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="row" id="description">
            <h2>About Product</h2>
            <p>{{$product->description}}</p>
        </div>
    </div>

    <div class="container" id="similar-products">

    </div>

    <div class="container" id="create-review">
        <div class="row">
            <div class="col-12">
                <h1>Add a Review</h1>
            </div>
        </div>
    </div>

    <div class="container" id="reviews">
        <div class="col-12">
            <h1>Reviews</h1>
        </div>
    </div>
@endsection