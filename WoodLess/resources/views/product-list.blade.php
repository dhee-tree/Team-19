@extends('layouts.base')
@section('title', 'WoodLess - Products')
@section('style')
<link rel="stylesheet" href="{{ asset('css/item-filter.css') }}">
<link rel="stylesheet" href="{{ asset('css/product-list-page.css') }}">
@endsection

@section('content')

<div class="container-fluid">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">Products</h2>
                <hr class="w-50 mx-auto mb-4 mb-xl-5 border-dark">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">

            <?php include(app_path().'/includes/item-filter.php'); ?>
        </div>
        <div class="col-md-9">
            <div class="container-fluid">

                <div class="row">
                    <div class="container px-4 px-lg-5 mt-5">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Sale badge-->
                                    <div class="badge bg-dark text-white position-absolute"
                                        style="top: 0.5rem; right: 0.5rem">Sale</div>
                                    <!-- Product image-->
                                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                        alt="..." />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">Fancy Product</h5>
                                            <!-- Product price-->
                                            $40.00 - $80.00
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View
                                                options</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection