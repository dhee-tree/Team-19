@extends('layouts.base')
@section('title', 'WoodLess - Home')
@section('style')
<link rel="stylesheet" href="{{ asset('css/home.css') }}"> 
@endsection 

@php
    /*
        Declared variables in categories controller

        $attributes - The product's attributes decoded from JSON
        $categories - The product's categories stored in a String array
        $productImages - The file path of each image used for the product, stored in a String array
    */
@endphp

@section('content')
<div class="container">

    <section id="LogoSlogan">
        <div class="container"> <!-- Logo + Slogan -->
            <center>
                <img src="{{ asset('images/logo_plain.png') }}" height="" width="75%" alt="Woodless Logo">

                <h2>

                    Making a greener and bluer earth

                </h2>
            </center>
        </div>
    </section>

    <section id="Hot Sellers">
        <div class="container"> <!-- Carousel hot sellers -->
            <center>
                <h1>

                    Hot Sellers

                </h1>
                <div id="carouselHotSellers" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators"> <button type="button" data-bs-target="#carouselHotSellers" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                        </button>
                        <button type="button" data-bs-target="#carouselHotSellers" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselHotSellers" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://cdn-cemal.nitrocdn.com/iwTMUnSsYeigzDpMWgwdBZhpcIeWwszq/assets/images/optimized/rev-4075e7a/www.aaronfaber.com/wp-content/uploads/2017/03/product-placeholder-wp-95907_800x675.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn-cemal.nitrocdn.com/iwTMUnSsYeigzDpMWgwdBZhpcIeWwszq/assets/images/optimized/rev-4075e7a/www.aaronfaber.com/wp-content/uploads/2017/03/product-placeholder-wp-95907_800x675.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn-cemal.nitrocdn.com/iwTMUnSsYeigzDpMWgwdBZhpcIeWwszq/assets/images/optimized/rev-4075e7a/www.aaronfaber.com/wp-content/uploads/2017/03/product-placeholder-wp-95907_800x675.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselHotSellers" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselHotSellers" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </center>
        </div>
    </section>

    <section id="categories">
        <div class="container"> <!-- Carousel hot sellers -->
            <!-- TODO ADD CODE TO INCLUDE EACH CATAGORY, EACH CARD  AND AHVE A CAROSUEL FEATURE -->
            <div id="categoriesCarousel" class="carousel carousel-dark slide" data-bs-ride="false">

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card-group">                
                            <div class="card">
                                <img src="https://cb2.scene7.com/is/image/CB2/DondraQueenBedSHS21_1x1/$web_pdp_main_carousel_md$/210203123041/dondra-teak-queen-bed.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title float-start">Beds</h5>
                                    <a href="#" class="btn btn-primary stretched-link float-end">Search</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="card-group">
                            <div class="card">
                                <img src="https://m.media-amazon.com/images/I/61ZURR13z8L._AC_UF1000,1000_QL80_.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title float-start">Waredrobes</h5>
                                    <a href="#" class="btn btn-primary stretched-link float-end">Search</a>
                                </div>
                            </div>
                            <div class="card">
                                <img src="https://www.at-home.co.in/cdn/shop/files/Rebecca3strLS.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title float-start">Couches</h5>
                                    <a href="#" class="btn btn-primary stretched-link float-end">Search</a>
                                </div>
                            </div>
                            <div class="card">
                                <img src="https://deskelly.ie/wp-content/uploads/2022/02/Chateau-bedroom-203dwr-chest-5.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Drawers</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="card-group">
                            <div class="card">
                                <img src="https://www.houseofoak.co.uk/media/catalog/category/chatsworth-bedroom-lifestyle-square.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Bedroom Furniture</h5>
                                </div>
                            </div>
                            <div class="card">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Garden_chairs_and_table%2C_Birkenhead_-_DSC09774.JPG" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Garden Furniture</h5>
                                </div>
                            </div>
                            <div class="card">
                                <img src="https://global-uploads.webflow.com/5e93308b2af0f955a9a2e796/623594797d9ec23d257090f1_best-dining-tables.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Kitchen Furniture</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#categoriesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#categoriesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <section>

    </section>
</div>

@endsection