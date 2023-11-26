@extends('layouts.base')
@section('title', 'WoodLess - '. $product->title)
@section('style')
    <link rel="stylesheet" href="{{ asset('css/product-display.css') }}">
@endsection

@php
    if ($product->id == 1){
        //Test code to give a product a category ('1' being the first category the the category table)
        //$product->categories()->attach(1);
    }
    /*
        These variables are declared in ProductController and are used here.

        $product - A row from the 'products' table, Eloquent model (?)
        $attributes - The product's attributes decoded from JSON
        $categories - The product's categories stored in the pivot table 'categories_product'
        $productImages - The file path of each image used for the product, stored in a String array
        $reviews - Rows from the 'reviews' table that match this product's id, stored in an Eloquent model (?) array, currently paginated by 5
    */
@endphp

@section('content')
    <div class="container">
        @if(session('message'))
        <hr class="mt-4">

        <div class="row m-0 px-0">
            <div class="col">
                <p><i class="fa-solid fa-xs fa-check" style="color: #ffffff;"></i> {{session('message')}}</p>
            </div>
        </div>

        <hr class="mt-0">
        @endif

        <div class="row m-0 mt-3 px-1 pt-3" id="product-main">
            <div class="col-md-6 mb-3" id="gallery">
                <div id="productGallery" class="carousel carousel-dark slide .carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">                  
                        <div class="carousel-inner">
                            @foreach ($productImages as $image)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <img src="{{ asset('images/' . $image) }}" class="d-block w-100" alt="product-image">
                                </div>
                            @endforeach
                        </div>
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
                            $pageLimit = 3;
                            @endphp
                            
                            @for ($i = 0; $i < count($productImages); $i += $pageLimit)
                                <div class="carousel-item @if ($i == 0) active @endif">
                                    <div class="d-flex justify-content-center" role="group">
                                        @for ($ii = $i; $ii < $i + $pageLimit && $ii < count($productImages); $ii++)
                                            <button class="btn p-0" type="button" data-bs-target="#productGallery" data-bs-slide-to="{{$ii}}" aria-current="true" aria-label="Slide">
                                                <img onmouseover="click()" class="" width="100" src="{{asset('images/'.$productImages[$ii])}}" alt="">
                                            </button>
                                        @endfor
                                    </div>
                                </div>
                            @endfor
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
                <div class="d-flex flex-row justify-content-between" id="product-title">
                    <div class="flex-shrink-1">
                        <h1 class="mb-0 ms-0 p-0">
                            <b>{{$product->title}}</b>
                        </h1>
                    </div>

                    <div class="align-items-end">
                        <h4>
                            <i class="fa-regular fa-star"></i>
                            <a href="#reviews" class="link-light link-offset-1 link-underline-opacity-25 link-underline-opacity-100-hover">
                                {{round($product->reviews()->avg('rating'), 2)}}/5
                            </a>
                        </h4>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="d-flex flex-row" id="product-categories">
                    @foreach ($categories as $category)
                        <div class="me-2" id="category">
                            <span class="lead">
                                {{$category->category}}@if($category != $categories[count($categories)-1]),@endif
                            </span>  
                        </div>
                    @endforeach
                </div>

                <div class="d-flex flex-row justify-content-between" id="product-price">
                    <div class="">
                        <h3>
                            @if ($product->discount)
                                <del>£{{$product->cost}}</del>
                                £{{sprintf("%0.2f",round(($product->cost)-($product->cost) * ($product->discount/100),2))}}
                                <span class="product-badge badge py-1 px-2 ms-1 ">{{$product->discount}}% Off</span> 
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
                                @switch($attribute)
                                    @case('colour')
                                        @php $i=1; @endphp
                                        @foreach (explode(',', $values) as $value)
                                            <div class="form-check form-check-inline me-2 m-0">
                                                <input style="color:{{$value}};" class="form-check-input attribute-color shadow-none" type="radio" name="attribute-color" id="inlineRadio{{$i}}" value="{{$value}}">
                                                <label class="form-check-label" for="inlineRadio{{$i++}}"></label>
                                            </div>
                                        @endforeach
                                        @break

                                    @default
                                        <div class="me-2" id="attribute">
                                            <select class="form-select py-0" name="attribute-{{$attribute}}" id="attribute-default">
                                                <label for="attribute-{{$attribute}}" selected>{{ucfirst($attribute)}}</option>
                                                @foreach (explode(',', $values) as $value)
                                                    <option value="{{$value}}">{{$value}}</option>
                                                @endforeach
                                            </select>   
                                        </div>
                                    @break
                                @endswitch
    
                            @endforeach
                        </div>

                        <div class="d-flex my-1 align-items-center" id="product-submit">
                            <div class="me-2">
                                <select class="form-select py-1" name="quantity">
                                    @for ($i = 0; $i < $product->amount; $i++)
                                        <option value="{{$i+1}}">{{$i+1}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="py-0 mb-0 flex-fill">
                                <button class="btn btn-dark btn py-1 w-100 submit" type="submit" name="product-submit" value="Add To Basket">
                                    <i class="fa-solid fa-basket-shopping fa-xs" style="color: #ffffff;"></i> Add to Basket
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="d-flex flex-row mb-0 align-items-center" id="product-submit">
                            <div class="">
                                <button class="btn btn-dark py-1" type="submit" name="product-submit" disabled>Out of Stock</button>
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

                <hr class="mt-0 d-none d-xl-block">

                <div class="row" id="gallery-select-lg">
                    <div class="col d-none d-xl-block">
                        <div id="productGallerySelect-lg" class="carousel carousel-dark slide" data-bs-interval="false">
                            <div class="carousel-inner">
                                @php
                                $pageLimit = 4;
                                @endphp
                                
                                @for ($i = 0; $i < count($productImages); $i += $pageLimit)
                                <div class="carousel-item @if ($i == 0) active @endif">
                                    <div class="d-flex justify-content-between" role="group">
                                        @for ($ii = $i; $ii < $i + $pageLimit && $ii < count($productImages); $ii++)
                                            <button class="btn p-0" type="button" data-bs-target="#productGallery" data-bs-slide-to="{{$ii}}" aria-current="true" aria-label="Slide">
                                                <img onmouseover="click()" class="" width="125" src="{{asset('images/'.$productImages[$ii])}}" alt="">
                                            </button>
                                        @endfor
                                    </div>
                                </div>
                            @endfor
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

                <hr class="mt-3 mb-0 d-none d-xl-block">
            </div>
        </div>

        <div class="row d-none" id="similar-products">
        </div>

        <div class="row d-none" id="create-review">
            <div class="col">
                <h3>Add a Review</h3>
            </div>

            <form action="">

            </form>
        </div>

        <hr class="mb-1">

        @if (count($reviews) > 0)
        <div class="row m-0 px-1 py-2" id="reviews">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="">
                    <h2 class="p-0 m-0">Reviews</h2>
                </div>

                <div class="dropstart">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{request()->fullUrlWithQuery(['sort'=>'created_at', 'order'=>'asc'])}}#reviews">Most Recent</a></li>
                        <li><a class="dropdown-item" href="{{request()->fullUrlWithQuery(['sort'=>'rating', 'order'=>'desc'])}}#reviews">Rating (High to Low)</a></li>
                        <li><a class="dropdown-item" href="{{request()->fullUrlWithQuery(['sort'=>'rating', 'order'=>'asc'])}}#reviews">Rating (Low to High)</a></li>

                    </ul>
                </div>
            </div>

            @foreach ($reviews as $review)
            @php
                $user = $review->user;
            @endphp
            <div class="container">
                <div class="row card mb-3 p-0 mx-0">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="">
                                <img src="{{asset('images/'.$user->image)}}" width="60" alt="">
                            </div>

                            <div class="vr mx-2"></div>

                            <div class="">
                                <h5 class="card-title">{{$user->first_name}} {{$user->last_name}}</h5>
                                <h6 class="card-subtitle">
                                    <i class="fa-solid fa-star" style="color: #000000;"></i> 
                                    {{$review->rating}}/5
                                </h6>
                            </div>
                        </div>
                        
                        <hr>

                        <p class="card-text">{{$review->description}}</p>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="">
                                <p class="card-text"><small class="text-body-secondary">{{$review->created_at->diffInDays()}} Days Ago</small></p>
                            </div>
                            <div class="">
                                <form method="POST" action="/review/{{$review->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn p-0">
                                        <small><i class="fa-solid fa-small fa-trash"></i> Delete</small>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col">
                {{$reviews->fragment('reviews')->links()}}
            </div>
        </div>
        @endif
    </div>
@endsection

