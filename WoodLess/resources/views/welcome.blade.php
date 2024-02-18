@extends('layouts.base')
@section('title', 'WoodLess - Home')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/category-card.css') }}">
    <link rel="stylesheet"
        href="https://unpkg.com/bs-brain@2.0.2/components/testimonials/testimonial-3/assets/css/testimonial-3.css" />

@endsection

@section('content')
    <div class="container-fluid">        
        <section id="Slogan">
            <header>
                <div class="container-fluid" style="margin-top:2.5rem;">
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                            @if(session('message'))
                                <div class="alert alert-success pt-2">
                                    {{ session('message') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <p class="display-2 mb-2 mb-md-3 text-center">Making a bluer and greener earth</p>
                        </div>
                    </div>
                </div>
            </header>

        </section>

        <section id="Hot Sellers" class="py-5 py-xl-8">

            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                        <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">Hot Sellers</h2>
                        <p class="display-5 mb-2 mb-md-3 text-center">Take a look at our top products</p>
                        <hr class="w-50 mx-auto mb-4 mb-xl-5 border-dark">
                    </div>
                </div>
            </div>

            <div class="container-fluid justify-content-center"> <!-- Carousel hot sellers -->
                <div id="carouselHotSellers" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php
                            $active = true;
                        @endphp
                        @foreach ($products->shuffle()->take(3) as $key => $product)
                            <a href="/product/{{ $product->id }}">
                                <div class="carousel-item {{ $active ? 'active' : '' }}">
                                    @php
                                        $active = false;
                                    @endphp
                                    <img src="{{ asset('images/' . explode(',', $product->images)[0]) }}" class="d-block"
                                        alt="Product image">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{ $product->title }}</h5>
                                        <p>{{ $product->description }}</p>
                                        <div class="row text-center mt-3">
                                            <div class="col"><a class="btn btn-outline-dark"
                                                    href="/product/{{ $product->id }}">View Product</a></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        <div class="carousel-indicators"> <button type="button" data-bs-target="#carouselHotSellers"
                                data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                            </button>
                            <button type="button" data-bs-target="#carouselHotSellers" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselHotSellers" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                    </div>
                </div>

                <div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselHotSellers"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselHotSellers"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

        <section id="categories" class="py-5 py-xl-8">
            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                        <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">Categories</h2>
                        <p class="display-5 mb-2 mb-md-3 text-center">Come browse our wares</p>
                        <hr class="w-50 mx-auto mb-4 mb-xl-5 border-dark">
                    </div>
                </div>
            </div>
            <div class="container"> <!-- Carousel hot sellers -->
                <!-- TODO ADD CODE THAT SENDS TO THE FILTER PAGE WITH THE CATEGORY PICKED FILTER. -->
                <div class="container px-4 px-lg-4 mt-2">
                    <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-3 justify-content-center">
                        @foreach ($categories->shuffle()->take(3) as $category)
                            <div class="col mb-5">
                                <div class="card category-card h-100">
                                    <!-- Category image-->
                                    <img class="card-img" src="{{ asset($category->images) }}" height="100%" width="100%"
                                        alt="..." />
                                    <!-- Category details-->
                                    <div class="card-img-overlay d-flex flex-column align-items-center">
                                        <!-- Category actions-->
                                        <a class="btn mt-auto stretched-link shadow border border-info"
                                            href="/products?categories%5B%5D={{ ucfirst($category->category) }}">{{ $category->category }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>



            <!-- Testimonial 3 - Bootstrap Brain Component -->
            <section id="testimonials" class="py-5 py-xl-8">
                <div class="container-fluid">
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                            <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">Happy Customers</h2>
                            <p class="display-5 mb-2 mb-md-3 text-center">We deliver what we promise</p>
                            <hr class="w-50 mx-auto mb-4 mb-xl-5 border-dark">
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row gy-4 gy-md-0 gx-xxl-5">
                        <div class="col-12 col-md-4">
                            <div class="card h-100">
                                <div class="card-body p-4 p-xxl-5">
                                    <figure>
                                        <img class="img-fluid rounded rounded-circle mb-4 border border-5" loading="lazy"
                                            src="./assets/img/testimonial-img-1.jpg" alt="">
                                        <figcaption>
                                            <div class="bsb-ratings text-warning mb-3" data-bsb-star="5"
                                                data-bsb-star-off="0">
                                            </div>
                                            <blockquote class="bsb-blockquote-icon mb-4">Thrilled to support this furniture
                                                company for its stylish, quality pieces made from recycled ocean plastic. A
                                                win-win, combining excellent design with a meaningful contribution to
                                                tackling
                                                plastic pollution.</blockquote>
                                            <h4 class="mb-2">Luna John</h4>
                                            <h5 class="fs-6 text-secondary mb-0">Eco-Conscious Customer</h5>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card h-100">
                                <div class="card-body p-4 p-xxl-5">
                                    <figure>
                                        <img class="img-fluid rounded rounded-circle mb-4 border border-5" loading="lazy"
                                            src="./assets/img/testimonial-img-2.jpg" alt="">
                                        <figcaption>
                                            <div class="bsb-ratings text-warning mb-3" data-bsb-star="4"
                                                data-bsb-star-off="1">
                                            </div>
                                            <blockquote class="bsb-blockquote-icon mb-4">Exceeded my expectations with
                                                modern,
                                                chic designs that seamlessly blend into my decor. Proud to showcase these
                                                eco-friendly pieces that tell a unique story of recycled ocean plastic.
                                            </blockquote>
                                            <h4 class="mb-2">Mark Smith</h4>
                                            <h5 class="fs-6 text-secondary mb-0">Style Enthusiast</h5>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card h-100">
                                <div class="card-body p-4 p-xxl-5">
                                    <figure>
                                        <img class="img-fluid rounded rounded-circle mb-4 border border-5" loading="lazy"
                                            src="./assets/img/testimonial-img-4.jpg" alt="">
                                        <figcaption>
                                            <div class="bsb-ratings text-warning mb-3" data-bsb-star="5"
                                                data-bsb-star-off="0">
                                            </div>
                                            <blockquote class="bsb-blockquote-icon mb-4">Woodless's minimalist design with
                                                sleek,
                                                durable pieces made from recycled ocean plastic. Furnishing my space
                                                responsibly
                                                has never been easier, thanks to this company's commitment to reducing
                                                plastic
                                                waste.</blockquote>
                                            <h4 class="mb-2">Luke Reeves</h4>
                                            <h5 class="fs-6 text-secondary mb-0">Minimalist Trendsetter</h5>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    </div>

@endsection
