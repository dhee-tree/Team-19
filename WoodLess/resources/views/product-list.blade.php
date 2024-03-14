@extends('layouts.base')
@section('title', 'WoodLess - Products')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/item-filter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-list-page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/interactive/flame-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-card.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css" rel="stylesheet">
@endsection

@php
    $queryParameters = request()->query();
@endphp

@section('js')
    <script src="{{ asset('js/filter.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>
@endsection

@section('content')
    <div class="container" id="maincontent">
        <div class="row">
            <div class="col col-md-3">
                <div class="filter">
                    @if (!$products->isEmpty() && !empty($queryParameters))
                        @php
                            $minCost = $queryParameters['minCost'] ?? null;
                            $maxCost = $queryParameters['maxCost'] ?? null;
                        @endphp
                        @if (!($minCost == 0 && $maxCost == 10000 && count($queryParameters) == 2))
                            <div class="alert alert-info fade show" id="resultsAlert" role="alert">
                                Showing results for:
                                <div> {{-- Changed ul to div --}}
                                    @foreach ($queryParameters as $key => $value)
                                        @if ($key != 'sort_by' || ($key == 'sort_by' && $value != 'Select...'))
                                            @if (!($key == 'minCost' && $value == 0) && !($key == 'maxCost' && $value == 10000))
                                                <li> {{-- Wrap in conditional --}}
                                                    @if ($key == 'sort_by')
                                                    
                                                    @elseif ($key == 'minCost')
                                                        Minimum Cost:
                                                    @elseif ($key == 'maxCost')
                                                        Maximum Cost:
                                                    @elseif ($key == 'ratings')
                                                        Ratings:
                                                        @foreach ($value as $rating)
                                                            {{ $rating }} <i class="fa-solid fa-star"></i>
                                                        @endforeach
                                                    @else
                                                        {{ $key }}:
                                                    @endif
                                                    @if (is_array($value) && $key != 'ratings')
                                                        {{ implode(', ', $value) }}
                                                    @elseif (!is_array($value))
                                                        {{ $value }}
                                                    @endif
                                                </li> {{-- Wrap in conditional --}}
                                            @endif
                                        @endif
                                    @endforeach
                                </div> {{-- Changed /ul to /div --}}
                            </div>
                        @endif
                    @endif

                    @include('includes.item-filter')
                </div>
            </div>
            <div class="col col-md-9">
                @if ($products->isEmpty())
                    <div class="alert alert-info fade show text-center" role="alert" style="min-height: 100vh;">
                        @if (count($queryParameters) > 0)
                            <p>No products found in:</p>
                            <div> {{-- Changed ul to div --}}
                                @foreach ($queryParameters as $key => $value)
                                    @if ($key != 'sort_by' || ($key == 'sort_by' && $value != 'Select...'))
                                        <li> {{-- Wrap in conditional --}}
                                            @if ($key == 'sort_by')
                                            
                                            @elseif ($key == 'minCost')
                                                Minimum Cost:
                                            @elseif ($key == 'maxCost')
                                                Maximum Cost:
                                            @elseif ($key == 'ratings')
                                                Ratings:
                                                @foreach ($value as $rating)
                                                    {{ $rating }} <i class="fa-solid fa-star"></i>
                                                @endforeach
                                            @else
                                                {{ $key }}:
                                            @endif
                                            @if (is_array($value) && $key != 'ratings')
                                                {{ implode(', ', $value) }}
                                            @elseif (!is_array($value))
                                                {{ $value }}
                                            @endif
                                        </li> {{-- Wrap in conditional --}}
                                    @endif
                                @endforeach
                            </div> {{-- Changed /ul to /div --}}
                        @else
                            <p>No products found</p>
                        @endif
                    </div>
                @endif

                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                    @foreach ($products as $product)
                        <div class="col pt-4">
                            <!-- Product card -->
                            <div id="product"
                                class="card shadow expand-hover {{ $product->discount > 40 ? 'discount' : 'normal' }}">
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
                <div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
