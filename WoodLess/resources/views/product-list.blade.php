@extends('layouts.base')
@section('title', 'WoodLess - Products')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/item-filter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-list-page.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/filter.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">

            @include('includes.item-filter')
        </div>
        <div class="col-md-9">
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-md-12">
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
                </div>

                <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center">
                    @foreach ($products as $product)
                        @php
                            // Extract the first image path from the comma-separated list of images
                            $imagePaths = explode(',', $product->images);
                            $firstImagePath = count($imagePaths) > 0 ? $imagePaths[0] : null;

                            // Generate the URL for the first image
                            $imageUrl = $firstImagePath ? asset('storage/images/' . $firstImagePath) : null;
                        @endphp
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Sale badge-->
                                @if ($product->discount > 0)
                                    <div class="badge bg-dark text-white position-absolute"
                                        style="top: 0.5rem; right: 0.5rem">
                                        Sale {{ $product->discount }}% Off</div>
                                @endif
                                <!-- Product image-->
                                <img class="card-img-top" src="{{ $imageUrl }}" alt="..." width="450"
                                    height="350" />
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
                                        <div class="col"><a class="btn btn-outline-dark"
                                                href="/product/{{ $product->id }}">View
                                                Product</a></div>

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
