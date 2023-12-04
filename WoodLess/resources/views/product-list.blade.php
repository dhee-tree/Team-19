@extends('layouts.base')
@section('title', 'WoodLess - Products')

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
                        <li class="icon"><span class="fa-solid fa-cart-shopping"></span></li>
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
                        <li class="icon"><span class="fa-solid fa-cart-shopping"></span></li>
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
                        <li class="icon"><span class="fa-solid fa-cart-shopping"></span></li>
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
                        <li class="icon"><span class="fa-solid fa-cart-shopping"></span></li>
                    </ul>
                </div>
                <div class="title pt-4 pb-1">Product name</div>
                <div class="d-flex-align-content-center justify-content-center"><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span><span class="fa-solid fa-star"></span></div>
                <div class="price">£499.99</div>
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
