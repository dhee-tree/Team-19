@extends('layouts.base')
@section('title', 'WoodLess - Home')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/category-card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hot-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-display.css') }}">
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
                <!-- Hot Sellers section -->
                <div id="hotSellers">
                    <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">Hot Sellers</h2>
                    <hr class="w-50 mx-auto mb-4 mb-xl-5 border-dark">
                    <div class="row">
                        @foreach ($products->shuffle()->take(2) as $key => $product)
                            <div class="col-6">
                                <!-- Product card -->
                                <div class="expand-hover shadow-sm card">
                                    <!-- Sale badge -->
                                    @if ($product->discount)
                                        <div class="badge bg-dark text-white position-absolute"
                                            style="top: 0.5rem; right: 0.5rem">Sale</div>
                                    @endif
                                    <!-- Product image -->
                                    <img width="10" class="card-img-top p-3"
                                        src="{{ Storage::url(explode(',', $product->images)[0]) }}"
                                        alt="{{ $product->title }}" />
                                    <!-- Product details -->
                                    <div class="card-body p-0 mb-3">
                                        <div class="d-flex flex-row justify-content-center">
                                            <div class="text-center d-none d-xl-block">
                                                <!-- Product name -->
                                                <span class="fs-5 fw-bolder">{{ $product->title }}</span>
                                            </div>
                                            <div class="vr mx-2 d-none d-xl-block"></div>
                                            <div class="text-center">
                                                <!-- Product price -->
                                                <span class="fs-5">
                                                    @if ($product->discount)
                                                        £{{ sprintf('%0.2f', round($product->cost - $product->cost * ($product->discount / 100), 2)) }}
                                                    @else
                                                        £{{ $product->cost }}
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row justify-content-center m-0 p-0">
                                            <div class="text-center text-secondary">
                                                <!-- Original product price -->
                                                <span class="fs-6">
                                                    @if ($product->discount)
                                                        <strike>£{{ $product->cost }}</strike>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Top Discounts section -->
                <div id="topDiscounts">

                    <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">Top Discounts</h2>
                    <hr class="w-50 mx-auto mb-4 mb-xl-5 border-dark">
                    @foreach ($products->shuffle()->take(1) as $product)
                        <!-- Product card -->
                        <div class="expand-hover shadow-sm card">
                            <!-- Sale badge -->
                            @if ($product->discount)
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                    Sale
                                </div>
                            @endif
                            <!-- Product image -->
                            <img width="10" class="card-img-top p-3"
                                src="{{ Storage::url(explode(',', $product->images)[0]) }}" alt="{{ $product->title }}" />
                            <!-- Product details -->
                            <div class="card-body p-0 mb-3">
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="text-center d-none d-xl-block">
                                        <!-- Product name -->
                                        <span class="fs-5 fw-bolder">{{ $product->title }}</span>
                                    </div>
                                    <div class="vr mx-2 d-none d-xl-block"></div>
                                    <div class="text-center">
                                        <!-- Product price -->
                                        <span class="fs-5">
                                            @if ($product->discount)
                                                £{{ sprintf('%0.2f', round($product->cost - $product->cost * ($product->discount / 100), 2)) }}
                                            @else
                                                £{{ $product->cost }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-center m-0 p-0">
                                    <div class="text-center text-secondary">
                                        <!-- Original product price -->
                                        <span class="fs-6">
                                            @if ($product->discount)
                                                <strike>£{{ $product->cost }}</strike>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                <div class="container px-4 px-lg-4 mt-2">
                    <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-3 justify-content-center">
                        @foreach ($categories->shuffle()->take(3) as $category)
                            <div class="col mb-5">
                                <div class="card category-card h-100">
                                    <!-- Category image-->
                                    <img class="card-img" src="{{ asset($category->images) }}" height="100%"
                                        width="100%" alt="..." />
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
                <div class="row gy-4 gy-md-0 gx-xxl-5">
                    <div class="col-12 col-md-4">
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
                    <div class="col-12 col-md-4">
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
                    <div class="col-12 col-md-4">
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
    </div>
@endsection


@section('js')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
