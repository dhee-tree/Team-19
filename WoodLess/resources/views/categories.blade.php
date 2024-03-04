@extends('layouts.base')
@section('title', 'WoodLess - Categories')
@section('style')

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/category-card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
@endsection

@section('content')

    <div id="maincontent" class="container">
        <section id="categories">


            <div class="container">
                <!-- Hot Sellers section -->
                <h2 class="text-center title-text">Categories</h2>
                <hr class="w-100 mx-auto">
                <div class="container">
                    <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-3 justify-content-center">
                        @foreach ($categories as $category)
                            <div class="col pt-2">
                                <div class="card category-card h-100">
                                    <!-- Category image-->
                                    <img class="card-img" src="{{ asset($category->images) }}" height="100%" width="100%"
                                        alt="..." />
                                    <!-- Category details-->
                                    <div class="card-img-overlay d-flex flex-column align-items-center">
                                        <!-- Category actions-->
                                        <a class="btn mt-auto stretched-link shadow border border-info"
                                            href="/products?categories%5B%5D={{ ucfirst($category->category) }}">{{ $category->category }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <hr class="w-100 mx-auto mb-3">
            </div>
        </section>
    </div>

@endsection
