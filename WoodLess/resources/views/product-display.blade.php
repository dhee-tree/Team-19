@extends('layouts.base')
@section('title', 'WoodLess - '. $product->title)

@php
    $attributes = json_decode($product->attributes, true);
    $tags = explode(',', $product->tags);
    $productImages = explode(',',$product->images);
@endphp

@section('content')
    <div class="row mb-1 pt-2" id="product-main">
        <div class="col-md-6 mb-2" id="gallery">
            <div id="productGallery" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{asset('images/'.array_shift($productImages))}}" class="d-block w-100" alt="image-1">
                  </div>
                  @foreach ($productImages as $image)
                    <div class="carousel-item">
                        <img src="{{asset('images/'.$image)}}" class="d-block w-100" alt="...">
                    </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#productGallery" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productGallery" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>

        <div class="col-md-6" id="product-information">
            <div class="row" id="product-title">
                <div class="col-1">
                    <h1 class="mb-0 ms-0">{{$product->title}}</h1>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="d-flex flex-row" id="product-tags">
                @foreach ($tags as $tag)
                    <div class="me-2">
                        <span>
                            {{$tag}}
                        </span>  
                    </div>
                @endforeach
            </div>

            <div class="row" id="price">
                <div class="col">
                    <h3>£{{$product->cost}}</h3>              
                </div>
            </div>

            <form action="{{url()->current()}}" enctype="multipart/form-data">
                @csrf
                @if ($product->amount != 0)
                    <div class="d-flex flex-row mb-2" id="attributes">
                        @foreach ($attributes as $attribute => $values)
                        <div class="me-2" id="attribute">
                            <label for="attribute-{{$attribute}}">{{ucfirst($attribute).':'}}</label>
                            <select name="attribute-{{$attribute}}" id="attribute-{{$attribute}}">
                                @foreach (explode(',', $values) as $value)
                                    <option value="{{$value}}">{{$value}}</option>
                                @endforeach
                            </select>   
                        </div>
                        @endforeach
                    </div>

                    <div class="d-flex flex-row mb-2" id="submit">
                        <div class="me-2">
                            <label for="quantity">Qty:</label>
                            <select name="quantity" id="quantity">
                                @for ($i = 0; $i < $product->amount; $i++)
                                    <option value="{{$i+1}}">{{$i+1}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="me-2">
                            <input type="submit" name="submit" value="Add To Basket">
                        </div>
                    </div>
                @else
                    <div class="d-flex flex-row mb-2" id="submit">
                        <div class="me-2">
                            <input type="submit" name="submit" disabled value="Out of Stock">
                        </div>
                    </div>
                @endif
            </form>

            <div class="row mt-0" id="about">
                <div class="col">
                    <h4 class="mb-0 mt-1">About Product</h4>
                </div>
                <div class="w-100"></div>
                <div class="col m-0">
                    <p>{{$product->description}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="similar-products">

    </div>

    <div class="row" id="create-review">
        <div class="col">
            <h3>Add a Review</h3>
        </div>

        <form action="">

        </form>
    </div>

    <div class="row" id="reviews">
        <div class="col">
            <h3>Reviews</h3>
        </div>
    </div>
@endsection

