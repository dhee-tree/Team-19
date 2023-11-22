@extends('layouts.base')
@section('title', 'WoodLess - '. $product->title)
@section('style')
    <link rel="stylesheet" href="{{ asset('css/product-display.css') }}">
@endsection

@php
    /*
        These variables are declared in ProductController and are used here.

        $attributes - The product's attributes decoded from JSON
        $categories - The product's categories stored in a String array
        $productImages - The file path of each image used for the product, stored in a String array
    */
@endphp

@section('content')
    <div class="row m-0 px-1 pb-2 pt-3" id="product-main">
        <div class="col-md-6 mb-3" id="gallery">
            <div id="productGallery" class="carousel carousel-dark slide .carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @php $count = 0; @endphp                  
                    @foreach ($productImages as $image)
                        <div class="carousel-item @if($count++ == 0) active @endif">
                            <img src="{{asset('images/'.$image)}}" class="d-block w-100" alt="product-image">
                        </div>
                    @endforeach
                </div>
                
                <button class="carousel-control-prev" type="button" data-bs-target="#productGallery" data-bs-slide="prev">
                    <i class="fa-solid fa-arrow-left-long fa-2xl" style="color: #000000;"></i>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productGallery" data-bs-slide="next">
                    <i class="fa-solid fa-arrow-right-long fa-2xl" style="color: #000000;"></i>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="col d-none d-md-block d-lg-none" id="gallery-select-md">
                <hr>
                <div id="productGallerySelect-md" class="carousel carousel-dark slide" data-bs-interval="false">
                    <div class="carousel-inner">
                        @php
                            $count = 0;
                            $pageLimit = 3;
                        @endphp

                        @while ($count < count($productImages))
                            <div class="carousel-item @if ($count == 0) active @endif">
                                <div class="d-flex justify-content-center" role="group">
                                    @for ($ii = 0; $ii < $pageLimit; $ii++)
                                        @if ($count < count($productImages))
                                            <button class="btn p-0" type="button" data-bs-target="#productGallery" data-bs-slide-to="{{$count}}" aria-current="true" aria-label="Slide {{$count+1}}">
                                                <img class="" width="100" src="{{asset('images/'.$productImages[($count++)])}}" alt="">
                                            </button>
                                            
                                        @else
                                            <div class="">
                                            </div>
                                        @endif  
                                    @endfor
                                </div>
                            </div>
                        @endwhile
                    </div>

                    <button class="carousel-control-prev mx-1" type="button" data-bs-target="#productGallerySelect-md" data-bs-slide="prev">
                        <i class="fa-solid fa-arrow-left-long fa-xl" style="color: #000000;"></i>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next mx-1" type="button" data-bs-target="#productGallerySelect-md" data-bs-slide="next">
                        <i class="fa-solid fa-arrow-right-long fa-xl" style="color: #000000;"></i>
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

            <div class="d-flex flex-row justify-content-between" id="price">
                <div class="">
                    <h3>
                        @if ($product->discount)
                            <span class="text-decoration-line-through fw-lighter">£{{$product->cost}}</span>
                            £{{round(($product->cost)-($product->cost) * ($product->discount/100),2)}}
                            <span class="badge p-1 ms-2 mt-1 position-absolute bg-danger fs-6">{{$product->discount}}% Off</span> 
                        @else  
                            £{{$product->cost}}
                        @endif   
                    </h3>        
                </div>
            </div>

            <hr class="mt-1">

            <form class="row" action="" enctype="multipart/form-data">
                @csrf
                @if ($product->amount > 0)
                    <div class="d-flex flex-row mb-2 ms-1 align-items-center" id="attributes">
                        @foreach ($attributes as $attribute => $values)
                            @if ($attribute == 'colour')
                                @php $i=1; @endphp

                                @foreach (explode(',', $values) as $value)
                                    <div class="form-check form-check-inline me-2 m-0" id="attribute-color">
                                        <input style="color:{{$value}};" class="form-check-input" type="radio" name="attribute-color" id="inlineRadio{{$i}}" value="{{$value}}">
                                        <label class="form-check-label" for="inlineRadio{{$i++}}"></label>
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
                            <button class="btn btn-dark btn py-1 w-100" type="submit" name="submit" value="Add To Basket">
                                <i class="fa-solid fa-basket-shopping fa-xs" style="color: #ffffff;"></i> Add to Basket
                            </button>
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

            <div class="row my-0" id="about-product">
                <div class="w-100"></div>
                <div class="col m-0">
                    <p class="">{{$product->description}}</p>
                </div>
            </div>

            <hr class="mt-1 d-none d-xl-block">

            <div class="row mt-0" id="gallery-select-lg">
                <div class="row d-none d-xxl-block w-100 mb-1">
                    <div class="col">
                        <h3 class="">Gallery <span class="fs-4">({{$count}})</span></h3>
                    </div>
                </div>
    
                <div class="col d-none d-xl-block">
                    <div id="productGallerySelect-lg" class="carousel carousel-dark slide" data-bs-interval="false">
                        <div class="carousel-inner">
                            @php
                            $count = 0;
                            $pageLimit = 4;
                            @endphp

                            @while ($count < count($productImages))
                                <div class="carousel-item @if ($count == 0) active @endif">
                                    <div class="d-flex justify-content-between" role="group">
                                        @for ($ii = 0; $ii < $pageLimit; $ii++)
                                            @if ($count < count($productImages))
                                                <button class="btn p-0" type="button" data-bs-target="#productGallery" data-bs-slide-to="{{$count}}" aria-current="true" aria-label="Slide {{$count+1}}">
                                                    <img class="" width="125" src="{{asset('images/'.$productImages[($count++)])}}" alt="">
                                                </button>
                                            @endif  
                                        @endfor
                                    </div>
                                </div>
                            @endwhile
                        </div>
                        
                        
                        <button class="carousel-control-prev" type="button" data-bs-target="#productGallerySelect-lg" data-bs-slide="prev">
                            <i class="fa-solid fa-arrow-left-long fa-2xl" style="color: #000000;"></i>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        
    
                        <button class="carousel-control-next" type="button" data-bs-target="#productGallerySelect-lg" data-bs-slide="next">
                            <i class="fa-solid fa-arrow-right-long fa-2xl" style="color: #000000;"></i>
                            <span class="visually-hidden">Next</span>
                        </button>
                        
                        <!--
                        <div class="carousel-indicators p-0 m-0">
                            <button type="button" data-bs-target="#productGallerySelect-lg" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#productGallerySelect-lg" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#productGallerySelect-lg" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        -->
                    </div>
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

