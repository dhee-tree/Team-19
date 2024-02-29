@extends('layouts.base')
@section('title', 'WoodLess - Home')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/category-card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/interactive/flame-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/interactive/categories-house.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-display.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-card.css') }}">
    <link rel="stylesheet"
        href="https://unpkg.com/bs-brain@2.0.2/components/testimonials/testimonial-3/assets/css/testimonial-3.css" />

@endsection

@section('content')
    <section id="title">
        <div id="title-desktop">

            <div class="img-1" id="img-1">

            </div>
            <div class="img-2">

            </div>
            <div id="bg">
            </div>
            <p id="title-making" class="text display-2">Making a </p>

            <p id="title-greener" class="text d3text display-2">Greener</p>

            <p id="title-and" class="text d3text display-2">&</p>

            <p id="title-bluer" class="text d3text display-2">Bluer</p>

            <p id="title-earth" class="text d3text display-2">Earth</p>
            <a href="{{ route('about-us') }}">

                <button id="learn-button" class="text display-2">Learn More</button>
            </a>
        </div>

    </section>

    <div class="container" id="maincontent">
        <section id="Hot Sellers/Top Discounts">

            <div class="row">

                <div class="col-md-8 pt-3">

                    <div class="container homeproducts">
                        <!-- Hot Sellers section -->
                        <div id="hotSellers" class="hot-sellers">
                            <h2 class="mb-2 text-center title-text">Hot Sellers</h2>
                            <hr class="w-25 mx-auto mb-3 mb-xl-5">
                            <div class="row row-cols-1 row-cols-md-2">
                                <!-- Product cards -->
                                @foreach ($products->shuffle()->take(2) as $key => $product)
                                    <div class="col pt-3">
                                        <!-- Product card -->
                                        <div class="expand-hover shadow-sm card position-relative">
                                            <!-- Sale badge -->
                                            @if ($product->discount)
                                                <div class="badge bg-dark text-white position-absolute"
                                                    style="top: 0.5rem; right: 0.5rem">Sale</div>
                                            @endif
                                            <!-- Product content -->
                                            <div class="card-content h-100">
                                                <!-- Product image -->
                                                <img width="10" class="card-img-top"
                                                    src="{{ Storage::url(explode(',', $product->images)[0]) }}"
                                                    alt="{{ $product->title }}" />
                                                <!-- Product details -->
                                                <div class="card-details d-flex justify-content-between">
                                                    <div class="start">
                                                        <!-- Product title -->
                                                        <div class="title">
                                                            <span class="">{{ $product->title }}</span>
                                                        </div>
                                                        <!-- Product price and discount -->
                                                        <div class="price-and-discount">
                                                            <div class="price-wrapper">
                                                                <span class="regular-price">
                                                                    <!-- Decreased font size for discount price -->
                                                                    @if ($product->discount)
                                                                        £{{ sprintf('%0.2f', round($product->cost - $product->cost * ($product->discount / 100), 2)) }}
                                                                </span>
                                @endif
                                <span class="discount-price"> <!-- Increased font size for regular price -->
                                    <span class="text-secondary"><strike>£{{ $product->cost }}</strike></span>
                                    <!-- Increased font size for regular price -->
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="end">
                        <!-- Text -->
                        <div class="text-discount-number">-{{ $product->discount }}%</div>
                        <!-- Fire animation -->
                        <div class="fire position-absolute top-0 start-0">
                            <div class="fire-left">
                                <div class="main-fire"></div>
                                <div class="particle-fire"></div>
                            </div>
                            <div class="fire-center">
                                <div class="main-fire"></div>
                                <div class="particle-fire"></div>
                            </div>
                            <div class="fire-right">
                                <div class="main-fire"></div>
                                <div class="particle-fire"></div>
                            </div>
                            <div class="fire-bottom">
                                <div class="main-fire"></div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
    </div>
    </div>
    @endforeach
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-4">

        <!-- Top Discounts section -->
        <div id="topDiscounts" class="topDiscounts">

            <h2 class="mb-2 text-center title-text">Top Discount</h2>
            <hr class="w-50 mx-auto mb-4 mb-xl-5 border-dark">
            @foreach ($products->shuffle()->take(1) as $product)
                <div id="product" class="col pt-3 discount">
                    <!-- Product card -->
                    <div class="expand-hover shadow-sm card">
                        <!-- Sale badge -->
                        @if ($product->discount)
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                            </div>
                        @endif
                        <!-- Product content -->
                        <div class="card-content h-100">
                            <!-- Product image -->
                            <img width="10" class="card-img-top"
                                src="{{ Storage::url(explode(',', $product->images)[0]) }}" alt="{{ $product->title }}" />
                            <!-- Product details -->
                            <div class="card-details d-flex justify-content-between">
                                <div class="start">
                                    <!-- Product title -->
                                    <div class="title">
                                        <span class="">{{ $product->title }}</span>
                                    </div>
                                    <!-- Product price and discount -->
                                    <div class="price-and-discount">
                                        <div class="price-wrapper">
                                            <span class="regular-price"> <!-- Decreased font size for discount price -->
                                                @if ($product->discount)
                                                    £{{ sprintf('%0.2f', round($product->cost - $product->cost * ($product->discount / 100), 2)) }}
                                            </span>
            @endif
            <span class="discount-price"> <!-- Increased font size for regular price -->
                <span class="text-secondary"><strike>£{{ $product->cost }}</strike></span>
                <!-- Increased font size for regular price -->
            </span>
        </div>
    </div>
    </div>
    <div class="end">
        <!-- Text -->
        <div class="discount">-{{ $product->discount }}%</div>
        <!-- Fire animation -->
        <div class="fire">
            <div class="fire-left">
                <div class="main-fire"></div>
                <div class="particle-fire"></div>
            </div>
            <div class="fire-center">
                <div class="main-fire"></div>
                <div class="particle-fire"></div>
            </div>
            <div class="fire-right">
                <div class="main-fire"></div>
                <div class="particle-fire"></div>
            </div>
            <div class="fire-bottom">
                <div class="main-fire"></div>
            </div>
        </div>
    </div>


    </div>
    </div>
    </div>
    </div>
    @endforeach
    </div>
    </div>

    </div>



    <section id="categories" class="">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">Categories</h2>
                <hr class="w-50 mx-auto mb-4 mb-xl-5 border-dark">
            </div>
        </div>
        <div class="container" id="house-container">
            <div id="house">
                <button class="button" id="bedroom">
                    <h3>
                        Bedroom
                    </h3>

                    <p class="info-text">Browse</p>
                </button>
                <button class="button" id="dining-room">
                    <h3>
                        Dining Room
                    </h3>
                    <p class="info-text">Browse</p>

                </button>
                <button class="button" id="garden">
                    <h3>
                        Garden
                    </h3>
                    <p class="info-text">Browse</p>

                </button>
                <button class="button" id="bathroom">
                    <h3>
                        Bathroom
                    </h3>
                    <p class="info-text">Browse</p>

                </button>
                <button class="polygon button" id="living-room">
                    <h3>
                        Living Room
                    </h3>
                    <p class="info-text">Browse</p>

                </button>
                <button class="button" id="office">
                    <h3>
                        Office
                    </h3>
                    <p class="info-text">Browse</p>

                </button>
                <button class="button" id="kitchen">
                    <h3>
                        Kitchen
                    </h3>
                    <p class="info-text">Browse</p>

                </button>
            </div>

        </div>
    </section>


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
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <div class="card h-100 position-relative">
                        <!-- Card body -->
                        <div class="card-body p-4 p-xxl-5">
                            <figure>
                                <img class="img-fluid rounded rounded-circle mb-4" loading="lazy"
                                    src="./assets/img/testimonial-img-1.jpg" alt="">
                                <figcaption>
                                    <div class="bsb-ratings text-warning mb-3" data-bsb-star="5" data-bsb-star-off="0">
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
                <div class="col">
                    <div class="card h-100 position-relative">
                        <!-- Card body -->
                        <div class="card-body p-4 p-xxl-5">
                            <figure>
                                <img class="img-fluid rounded rounded-circle mb-4" loading="lazy"
                                    src="./assets/img/testimonial-img-2.jpg" alt="">
                                <figcaption>
                                    <div class="bsb-ratings text-warning mb-3" data-bsb-star="4" data-bsb-star-off="1">
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
                <div class="col">
                    <div class="card h-100 position-relative">
                        <!-- Card body -->
                        <div class="card-body p-4 p-xxl-5">
                            <figure>
                                <img class="img-fluid rounded rounded-circle mb-4" loading="lazy"
                                    src="./assets/img/testimonial-img-4.jpg" alt="">
                                <figcaption>
                                    <div class="bsb-ratings text-warning mb-3" data-bsb-star="5" data-bsb-star-off="0">
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

@endsection


@section('js')
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/interactive/categories-house.js') }}"></script>
@endsection
