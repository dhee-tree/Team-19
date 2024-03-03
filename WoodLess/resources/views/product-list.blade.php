@extends('layouts.base')
@section('title', 'WoodLess - Products')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/item-filter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-list-page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/interactive/flame-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-card.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/filter.js') }}"></script>
@endsection

@section('content')
    <div class="container" id="maincontent">

        <div class="row">
            <div class="col col-md-3">
                @include('includes.item-filter')
            </div>
            <div class="col col-md-9">
                <div class="justify-content-center">
                        @if (trim($search_text) !== '')
                            @if ($products->isEmpty())
                                <div class="alert alert-info" role="alert">
                                    No products found for "{{ $search_text }}"
                                </div>
                            @else
                                <div class="alert alert-info" role="alert">
                                    Showing results for "{{ $search_text }}"
                                </div>
                            @endif
                        @endif
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                    @foreach ($products as $product)

                        <div class="col pt-4">
                            <!-- Product card -->
                            <div id="product" class="card shadow expand-hover {{ $product->discount > 40 ? 'discount' : 'normal' }}">
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
        </div>
    </div>
@endsection
