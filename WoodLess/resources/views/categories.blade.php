@extends('layouts.base')
@section('title', 'WoodLess - Categories')
@section('style')

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/category-card.css') }}">
<link rel="stylesheet" href="{{ asset('css/categories.css') }}">
@endsection

@section('content')
   

<section id="categories" class="py-5 py-xl-8">
    
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 id= "title" class="fs-6 text-secondary mb-2 text-uppercase text-center">Welcome To Our Categories</h2>
                    <hr class="w-50 mx-auto mb-4 mb-xl-5 border-dark">
                </div>
            </div>
        </div>
        <div class="container"> 
            <div class="container px-4 px-lg-4 mt-2">
                <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-3 justify-content-center">
                    <div class="col mb-5">
                        <div class="card category-card h-100">
                            <!-- Category image-->
                            <img class="card-img"
                                src="/images/Kitchen.png"
                                height="100%" width="100%" alt="..." />
                            <!-- Category details-->
                            <div class="card-img-overlay d-flex flex-column align-items-center">
                                <!-- Category actions-->
                                <a class="btn mt-auto stretched-link shadow border border-info" href="#">Kitchen
                                    Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card category-card h-100">
                            <!-- Category image-->
                            <img class="card-img"
                                src="/images/Dining-room.png"
                                height="100%" width="100%" alt="..." />
                            <!-- Category details-->
                            <div class="card-img-overlay d-flex flex-column align-items-center">
                                <!-- Category actions-->
                                <a class="btn mt-auto stretched-link shadow border border-info" href="#">Dining Room</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card category-card h-100">
                            <!-- Category image-->
                            <img class="card-img"
                                src="/images/Bedroom.png"
                                height="100%" width="100%" alt="..." />
                            <!-- Category details-->
                            <div class="card-img-overlay d-flex flex-column align-items-center">
                                <!-- Category actions-->
                                <a class="btn mt-auto stretched-link shadow border border-info" href="#">Bedroom</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card category-card h-100">
                            <!-- Category image-->
                            <img class="card-img"
                                src="/images/Bathroom.png"
                                height="100%" width="100%" alt="..." />
                            <!-- Category details-->
                            <div class="card-img-overlay d-flex flex-column align-items-center">
                                <!-- Category actions-->
                                <a class="btn mt-auto stretched-link shadow border border-info" href="#">Bathroom</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card category-card h-100">
                            <!-- Category image-->
                            <img class="card-img"
                                src="/images/Office.png"
                                height="100%" width="100%" alt="..." />
                            <!-- Category details-->
                            <div class="card-img-overlay d-flex flex-column align-items-center">
                                <!-- Category actions-->
                                <a class="btn mt-auto stretched-link shadow border border-info" href="#">Office</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card category-card h-100">
                            <!-- Category image-->
                            <img class="card-img"
                                src="/images/Garden.png"
                                height="100%" width="100%" alt="..." />
                            <!-- Category details-->
                            <div class="card-img-overlay d-flex flex-column align-items-center">
                                <!-- Category actions-->
                                <a class="btn mt-auto stretched-link shadow border border-info" href="#">Garden</a>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
    </section>


@endsection