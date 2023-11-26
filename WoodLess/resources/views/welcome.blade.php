@extends('layouts.base')
@section('title', 'WoodLess - Home')
@section('style')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/category-card.css') }}">
@endsection

@section('content')

<div class="container-fluid">

    <section id="LogoSlogan">
        <header>

            <div class="logo"> <!-- Logo + Slogan -->

                <img src="{{ asset('images/logo_plain.png') }}" width="50%" alt="Woodless Logo">

                <p style="font-size:2rem;">

                    Making a greener and bluer earth

                </p>

            </div>

        </header>

    </section>

    <section id="Hot Sellers">
        <div class="container"> <!-- Carousel hot sellers -->
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
        </div>
    </section>

    <section id="categories">
        <div class="container"> <!-- Carousel hot sellers -->
            <h1>

                Categories

            </h1>
            <!-- TODO ADD CODE THAT SENDS TO THE FILTER PAGE WITH THE CATEGORY PICKED FILTER. -->
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Category image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Category details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Category name-->
                                    <h5 class="fw-bolder">Kitchen Category</h5>
                                    <!-- Category price-->
                                    Stuff Here
                                </div>
                            </div>
                            <!-- Category actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View Products</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Category image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Category details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Category name-->
                                    <h5 class="fw-bolder">Kitchen Category</h5>
                                    <!-- Category price-->
                                    Stuff Here
                                </div>
                            </div>
                            <!-- Category actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View Products</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Category image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Category details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Category name-->
                                    <h5 class="fw-bolder">Kitchen Category</h5>
                                    <!-- Category price-->
                                    Stuff Here
                                </div>
                            </div>
                            <!-- Category actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View Products</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Category image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Category details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Category name-->
                                    <h5 class="fw-bolder">Kitchen Category</h5>
                                    <!-- Category price-->
                                    Stuff Here
                                </div>
                            </div>
                            <!-- Category actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View Products</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Category image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Category details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Category name-->
                                    <h5 class="fw-bolder">Kitchen Category</h5>
                                    <!-- Category price-->
                                    Stuff Here
                                </div>
                            </div>
                            <!-- Category actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View Products</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Category image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Category details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Category name-->
                                    <h5 class="fw-bolder">Kitchen Category</h5>
                                    <!-- Category price-->
                                    Stuff Here
                                </div>
                            </div>
                            <!-- Category actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View Products</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Category image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Category details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Category name-->
                                    <h5 class="fw-bolder">Kitchen Category</h5>
                                    <!-- Category price-->
                                    Stuff Here
                                </div>
                            </div>
                            <!-- Category actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View Products</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Category image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Category details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Category name-->
                                    <h5 class="fw-bolder">Kitchen Category</h5>
                                    <!-- Category price-->
                                    Stuff Here
                                </div>
                            </div>
                            <!-- Category actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View Products</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section>

    </section>
</div>

@endsection