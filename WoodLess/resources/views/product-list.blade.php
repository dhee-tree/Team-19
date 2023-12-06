@extends('layouts.base')
@section('title', 'WoodLess - Products')
@section('style')
<link rel="stylesheet" href="{{ asset('css/item-filter.css') }}">
<link rel="stylesheet" href="{{ asset('css/product-list-page.css') }}">
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/product-list.css')}}">
@endsection

@section('content')
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                <div class="product"><img src="{{asset('images/no-image.svg')}}" alt="">
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                        <li class="icon mx-3"><span class="fa-regular fa-heart"></span></li>
                        <li class="icon"><span class="fa-solid fa-basket-shopping"></span></li>
                    </ul>
                </div>
                <div class="title pt-4 pb-1">Product name</div>
                <div class="d-flex-align-content-center justify-content-center"><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span></div>
                <div class="price">£499.99</div>
            </div>
            <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                <div class="product"><img src="{{asset('images/no-image.svg')}}" alt="">
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                        <li class="icon mx-3"><span class="fa-regular fa-heart"></span></li>
                        <li class="icon"><span class="fa-solid fa-basket-shopping"></span></li>
                    </ul>
                </div>
                <div class="title pt-4 pb-1">Product name</div>
                <div class="d-flex-align-content-center justify-content-center"><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span></div>
                <div class="price">£499.99</div>
            </div>
            <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                <div class="product"><img src="{{asset('images/no-image.svg')}}" alt="">
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                        <li class="icon mx-3"><span class="fa-regular fa-heart"></span></li>
                        <li class="icon"><span class="fa-solid fa-basket-shopping"></span></li>
                    </ul>
                </div>
                <div class="title pt-4 pb-1">Product name</div>
                <div class="d-flex-align-content-center justify-content-center"><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span></div>
                <div class="price">£499.99</div>
            </div>
            <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                <div class="product"><img src="{{asset('images/no-image.svg')}}" alt="">
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                        <li class="icon mx-3"><span class="fa-regular fa-heart"></span></li>
                        <li class="icon"><span class="fa-solid fa-basket-shopping"></span></li>
                    </ul>
                </div>
                <div class="title pt-4 pb-1">Product name</div>
                <div class="d-flex-align-content-center justify-content-center"><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span></div>
                <div class="price">£499.99</div>
<div class="container-fluid">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">Products</h2>
                <hr class="w-50 mx-auto mb-4 mb-xl-5 border-dark">
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                <div class="product"><img src="{{asset('images/no-image.svg')}}" alt="">
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                        <li class="icon mx-3"><span class="fa-regular fa-heart"></span></li>
                        <li class="icon"><span class="fa-solid fa-shopping-bag"></span></li>
                    </ul>
                </div>
                <div class="title pt-4 pb-1">Product name</div>
                <div class="d-flex-align-content-center justify-content-center"><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span></div>
                <div class="price">£499.99</div>
            </div>
            <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                <div class="product"><img src="{{asset('images/no-image.svg')}}" alt="">
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                        <li class="icon mx-3"><span class="fa-regular fa-heart"></span></li>
                        <li class="icon"><span class="fa-solid fa-shopping-bag"></span></li>
                    </ul>
                </div>
                <div class="title pt-4 pb-1">Product name</div>
                <div class="d-flex-align-content-center justify-content-center"><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span></div>
                <div class="price">£499.99</div>
            </div>
            <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                <div class="product"><img src="{{asset('images/no-image.svg')}}" alt="">
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                        <li class="icon mx-3"><span class="fa-regular fa-heart"></span></li>
                        <li class="icon"><span class="fa-solid fa-shopping-bag"></span></li>
                    </ul>
                </div>
                <div class="title pt-4 pb-1">Product name</div>
                <div class="d-flex-align-content-center justify-content-center"><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span></div>
                <div class="price">£499.99</div>
            </div>
            <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                <div class="product"><img src="{{asset('images/no-image.svg')}}" alt="">
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                        <li class="icon mx-3"><span class="fa-regular fa-heart"></span></li>
                        <li class="icon"><span class="fa-solid fa-shopping-bag"></span></li>
                    </ul>
                </div>
                <div class="title pt-4 pb-1">Product name</div>
                <div class="d-flex-align-content-center justify-content-center"><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span></div>
                <div class="price">£499.99</div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                <div class="product"><img src="{{asset('images/no-image.svg')}}" alt="">
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                        <li class="icon mx-3"><span class="fa-regular fa-heart"></span></li>
                        <li class="icon"><span class="fa-solid fa-shopping-bag"></span></li>
                    </ul>
                </div>
                <div class="title pt-4 pb-1">Product name</div>
                <div class="d-flex-align-content-center justify-content-center"><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span></div>
                <div class="price">£499.99</div>
            </div>
            <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                <div class="product"><img src="{{asset('images/no-image.svg')}}" alt="">
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                        <li class="icon mx-3"><span class="fa-regular fa-heart"></span></li>
                        <li class="icon"><span class="fa-solid fa-shopping-bag"></span></li>
                    </ul>
                </div>
                <div class="title pt-4 pb-1">Product name</div>
                <div class="d-flex-align-content-center justify-content-center"><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span></div>
                <div class="price">£499.99</div>
            </div>
            <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                <div class="product"><img src="{{asset('images/no-image.svg')}}" alt="">
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                        <li class="icon mx-3"><span class="fa-regular fa-heart"></span></li>
                        <li class="icon"><span class="fa-solid fa-shopping-bag"></span></li>
                    </ul>
                </div>
                <div class="title pt-4 pb-1">Product name</div>
                <div class="d-flex-align-content-center justify-content-center"><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span></div>
                <div class="price">£499.99</div>
            </div>
            <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                <div class="product"><img src="{{asset('images/no-image.svg')}}" alt="">
                    <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                        <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                        <li class="icon mx-3"><span class="fa-regular fa-heart"></span></li>
                        <li class="icon"><span class="fa-solid fa-shopping-bag"></span></li>
                    </ul>
                </div>
                <div class="title pt-4 pb-1">Product name</div>
                <div class="d-flex-align-content-center justify-content-center"><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span></div>
                <div class="price">£499.99</div>
            </div>
        </div> -->
    </div>
@endsection
    <div class="row">
        <div class="col-md-3">

            <?php include(app_path().'/includes/item-filter.php'); ?>
        </div>
        <div class="col-md-9">
            <div class="container-fluid">

                <div class="row">
                    <div class="container px-4 px-lg-5 mt-5">
                        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center">
                            @foreach ($products as $product)
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Sale badge-->
                                    <div class="badge bg-dark text-white position-absolute"
                                        style="top: 0.5rem; right: 0.5rem">Sale</div>
                                    <!-- Product image-->
                                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                        alt="..." />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{ $product->title }}</h5>
                                            <!-- Product price-->
                                            £{{ $product->cost }}
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="row text-center">
                                            <div class="col"><a class="btn btn-outline-dark" href="/product/{{ $product->id }}">View Product</a></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
