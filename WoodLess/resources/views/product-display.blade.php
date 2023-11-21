@extends('layouts.base')
@section('title', 'WoodLess - '. $product->title)

@php
    /*
        These variables are declared in ProductController and are used here.

        $attributes - The product's attributes decoded from JSON
        $categories - The product's categories stored in a String array
        $productImages - The file path of each image used for the product, stored in a String array
    */
    $firstImage = array_shift($productImages);
@endphp

@section('content')
    <div class="row m-0 px-1 pb-2 pt-3" id="product-main">
        <div class="col-md-6 mb-3" id="gallery">
            <div id="productGallery" class="carousel carousel-dark slide lightbox" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <!-- First image in gallery -->
                    <img src="{{asset('images/'.$firstImage)}}" class="d-block w-100" alt="first-product-image">
                  </div>
                  <!-- All other images -->
                  @foreach ($productImages as $image)
                    <div class="carousel-item">
                        <img src="{{asset('images/'.$image)}}" class="d-block w-100" alt="product-image">
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

            <div class="col d-none d-md-block d-lg-none" id="gallery-select-md">
                <hr>
                <div id="productGallerySelect" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php
                            $pageLimit = 3;
                            $slideNumber = 0;
                        @endphp
                        
                        <!-- First carousel page -->
                        <div class="carousel-item active">
                            <div>
                                <button class="btn p-0" type="button" data-bs-target="#productGallery" data-bs-slide-to="{{$slideNumber++}}" aria-current="true" aria-label="Slide 1">
                                    <img class="" width="105" src="{{asset('images/'.$firstImage)}}" alt="">
                                </button>
                            </div>
                        </div>

                        <!-- All other pages -->
                        @for ($i; $i < count )
                            <div class="carousel-item">
                                <div class="btn-group d-flex justify-content-center" role="group">
                                    <button class="btn p-0" type="button" data-bs-target="#productGallery" data-bs-slide-to="{{$slideNumber++}}" aria-current="true" aria-label="Slide 1">
                                        <img class="" width="105" src="{{asset('images/'.$image)}}" alt="">
                                    </button>
                                </div>
                            </div>
                        @endfor
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#productGallerySelect" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#productGallerySelect" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-6" id="product-information">
            <div class="row" id="product-title">
                <div class="col-1">
                    <h1 class="mb-0 ms-0 p-0">
                        <b>{{$product->title}}</b>
                    </h1>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="d-flex flex-row" id="product-categories">
                @foreach ($categories as $category)
                    <div class="me-2" id="category">
                        <span class="lead">
                            {{$category}}@if($category != $categories[count($categories)-1]),@endif
                        </span>  
                    </div>
                @endforeach
            </div>

            <div class="row" id="price">
                <div class="col">
                    <h3>£{{$product->cost}}</h3>              
                </div>
            </div>

            <hr class="mt-1">

            <form class="row" action="{{url()->current()}}" enctype="multipart/form-data">
                @csrf
                @if ($product->amount != 0)
                    <div class="d-flex flex-row mb-2 ms-1 align-items-center" id="attributes">
                        @foreach ($attributes as $attribute => $values)
                            @if ($attribute == 'colour')
                                @php
                                $i=1;
                                @endphp

                                @foreach (explode(',', $values) as $value)
                                    <div class="form-check form-check-inline me-2 m-0" id="attribute-color">
                                        <input style="box-shadow: black; transform:scale(1.5); background-color:{{$value}};border-color:color-mix(in srgb, {{$value}} 70%, black);" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio{{$i}}" value="{{$value}}">
                                        <label class="form-check-label" for="inlineRadio{{$i}}"></label>
                                    </div>
                                @endforeach

                            @else
                                <div class="me-2" id="attribute">
                                    <select class="form-select py-0" name="attribute-{{$attribute}}" id="attribute-default">
                                        <label for="attribute-{{$attribute}}" selected>{{ucfirst($attribute)}}</option>
                                        @foreach (explode(',', $values) as $value)
                                            <option value="{{$value}}">{{$value}}</option>
                                        @endforeach
                                    </select>   
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="d-flex my-1 align-items-center" id="submit">
                        <div class="me-2">
                            <select class="form-select py-1" name="quantity" id="quantity">
                                @for ($i = 0; $i < $product->amount; $i++)
                                    <option value="{{$i+1}}">{{$i+1}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="py-0 mb-0 flex-fill">
                            <input class="btn btn-dark btn py-1 w-100" type="submit" name="submit" value="Add To Basket">
                        </div>
                    </div>
                @else
                    <div class="d-flex flex-row mb-0 align-items-center" id="submit">
                        <div class="">
                            <input class="btn btn-dark py-1" type="submit" name="submit" disabled value="Out of Stock">
                        </div>
                    </div>
                @endif
            </form>

            <hr>

            <div class="row mt-0" id="about-product">
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

