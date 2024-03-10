@extends('layouts.base')
@section('title', 'WoodLess - Home')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/category-card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/interactive/flame-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/interactive/categories-house.css') }}">
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
            <div class="container homeproducts">

                <div class="row">

                    <div class="col-md-8">

                        <!-- Hot Sellers section -->
                        <h2 class="text-center title-text">Hot Sellers</h2>
                        <hr class="w-100 mx-auto mb-2">
                        <div class="row row-cols-1 row-cols-md-2">

                            <!-- Product cards -->
                            @foreach ($products->shuffle()->take(2) as $key => $product)
                                <div class="col pt-4">
                                    <!-- Product card -->
                                    <div id="product" class="card hot shadow expand-hover">
                                        <!-- Sale badge -->
                                        @if ($product->discount)
                                            <div class="badge bg-dark text-white position-absolute"
                                                style="top: 0.5rem; right: 0.5rem">-{{ $product->discount }}%
                                            </div>
                                        @endif
                                        <!-- Product content -->
                                        <div class="card-content h-100">
                                            <!-- Product image -->
                                            <img width="10" class="card-img-top"
                                                src="{{ Storage::url(explode(',', $product->images)[0]) }}"
                                                alt="{{ $product->title }}" />
                                            <!-- Product details -->
                                            <div class="card-details">
                                                <div class="start">
                                                    <!-- Product title -->
                                                    <div class="name">
                                                        {{ $product->title }}
                                                    </div>
                                                    <!-- Product price and discount -->
                                                    <div class="price-and-discount">
                                                        <div class="price-wrapper">

                                                            <span class="showcase-price">
                                                                <!-- Decreased font size for discount price -->
                                                                @if ($product->discount)
                                                                    £{{ sprintf('%0.2f', round($product->cost - $product->cost * ($product->discount / 100), 2)) }}
                                                                @else
                                                                    £{{ $product->cost }}
                                                                @endif
                                                            </span>
                                                            @if ($product->discount)
                                                                <span class="discount-price">
                                                                    <!-- Increased font size for regular price -->
                                                                    <span
                                                                        class="text-secondary"><strike>£{{ $product->cost }}</strike></span>
                                                                    <!-- Increased font size for regular price -->
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="end">
                                                    <!-- Text -->
                                                    <div class="discount-number">-{{ $product->discount }}%</div>
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
                                        <a href="/product/{{ $product->id }}" class="stretched-link"></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="col-md-4">

                        <!-- Top Discounts section -->
                        <h2 class="text-center title-text">Top Discount</h2>
                        <hr class="w-100 mx-auto mb-2 border-dark">
                        @php
                            $discProduct = $products->sortByDesc('discount')->first();
                        @endphp
                        @if($discProduct)
                        <div class="col pt-4">
                            <!-- Product card -->
                            <div id="product" class="card discount shadow expand-hover">
                                <!-- Sale badge -->
                                @if ($discProduct->discount)
                                    <div class="badge bg-dark text-white position-absolute"
                                        style="top: 0.5rem; right: 0.5rem">-{{ $discProduct->discount }}%
                                    </div>
                                @endif
                                <!-- Product content -->
                                <div class="card-content h-100">
                                    <!-- Product image -->
                                    <img width="10" class="card-img-top"
                                        src="{{ Storage::url(explode(',', $discProduct->images)[0]) }}"
                                        alt="{{ $discProduct->title }}" />
                                    <!-- Product details -->
                                    <div class="card-details">
                                        <div class="start">
                                            <!-- Product title -->
                                            <div class="name">
                                                {{ $discProduct->title }}
                                            </div>
                                            <!-- Product price and discount -->
                                            <div class="price-and-discount">
                                                <div class="price-wrapper">

                                                    <span class="showcase-price">
                                                        <!-- Increased font size for regular price -->
                                                        @if ($product->discount)
                                                            £{{ sprintf('%0.2f', round($discProduct->cost - $discProduct->cost * ($discProduct->discount / 100), 2)) }}
                                                        @else
                                                            £{{ $discProduct->cost }}
                                                        @endif
                                                    </span>
                                                    @if ($discProduct->discount)
                                                        <span class="discount-price">
                                                            <!-- Decreased font size for discount price -->
                                                            <span
                                                                class="text-secondary"><strike>£{{ $discProduct->cost }}</strike></span>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="end">
                                            <!-- Text -->
                                            <div class="discount-number">-{{ $discProduct->discount }}%</div>
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
                                <a href="/product/{{ $discProduct->id }}" class="stretched-link"></a>

                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>


        <section id="categories">
            <div class="container">
                <h2 class="text-center title-text">Categories</h2>
                <hr class="w-100 mx-auto mb-2 border-dark">

                <div id="house-container">
                    <div id="house">
                        <div class="bg">
                        </div>
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
            </div>
        </section>


        <!-- Testimonial 3 - Bootstrap Brain Component -->
        <section id="testimonials">
            <div class="container">
                <h2 class="text-center title-text">Testimonials</h2>
                <hr class="w-100 mx-auto mb-2 border-dark">
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col">
                        <div class="card h-100 position-relative">
                            <!-- Card body -->
                            <div class="card-body p-4 p-xxl-5">
                                <figure>
                                    <img class="img-fluid rounded rounded-circle mb-4" loading="lazy"
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
                    <div class="col">
                        <div class="card h-100 position-relative">
                            <!-- Card body -->
                            <div class="card-body p-4 p-xxl-5">
                                <figure>
                                    <img class="img-fluid rounded rounded-circle mb-4" loading="lazy"
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
                    <div class="col">
                        <div class="card h-100 position-relative">
                            <!-- Card body -->
                            <div class="card-body p-4 p-xxl-5">
                                <figure>
                                    <img class="img-fluid rounded rounded-circle mb-4" loading="lazy"
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

    @endsection


    @section('js')
        <script src="{{ asset('js/home.js') }}"></script>
        <script src="{{ asset('js/interactive/categories-house.js') }}"></script>
    @endsection
