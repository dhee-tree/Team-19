@extends('layouts.base')
@section('title', 'WoodLess - Products')
@section('style')
<link rel="stylesheet" href="{{ asset('css/item-filter.css') }}">
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">

            <?php include(app_path().'/includes/item-filter.php'); ?>
        </div>
        <div class="col-md-9">
            <div class="container-fluid">
                <h1>Products</h1>
                <div class="row">
                    <div class="col min-vh-100 py-3">
                        <!-- toggler -->
                        <button class="btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
                            <i class="fa-solid fa-arrow-right fs-3" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvas"></i>
                        </button>
                        Content..
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection