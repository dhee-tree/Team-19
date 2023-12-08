@extends('layouts.base')
@section('title', 'WoodLess - User Panel')

@section('style')
<link rel="stylesheet" href="{{ asset('css/user-panel.css')}}">
@endsection

@section('content')
    <!-- Code for sidebar -->
    @if (session()->has('success'))
        <div class="alert alert-success">
            <i class="fa-regular fa-circle-check fa-fade"></i> <span>{{ session('success') }}</span>
        </div>
    @endif
    <div class="wrapper">

        <aside id="sidebar">
            <div class="sidebar-list">
                <div class="heading">
                    <p>Hi, {{ $user->first_name }}. Welcome back to your account.</p>
                </div>
                <ul class="sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            My Purchases
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            Tickets
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('password.change.form') }}" class="sidebar-link">
                            <i class="fa-solid fa-lock" style="color: #e8e8e8;"></i>
                            Change Password
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('logout') }}" class="sidebar-link"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-arrow-right-from-bracket" style="color:#e8e8e8; margin-right:10px;"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main content -->
        <div class="main content">
            <!-- Code for banner -->
            <div class="banner">
                <h1>Banner Heading</h1>
                <p>Description or tagline</p>
            </div> 

            <!-- Code for customers also bought carrousel -->
            <section id="CustomersAlsoBought" class="py-5 py-xl-8">
                <div class="container-fluid">
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                            <h1 class="fs-2 text-secondary mb-2 text-uppercase text-center">Customers also bought</h1>
                        </div>
                    </div>
                </div>

                <div class="container-fluid justify-content-center">
                    <div id="carouselCustomersAlsoBought" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselCustomersAlsoBought"
                                    data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                            </button>
                            <button type="button" data-bs-target="#carouselCustomersAlsoBought" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselCustomersAlsoBought" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/images/PictureToBeAdded.png" class="d-block w-100" alt="IMAGE">
                            </div>
                            <div class="carousel-item">
                                <img src="/images/PictureToBeAdded.png" class="d-block w-100" alt="IMAGE">
                            </div>
                            <div class="carousel-item">
                                <img src="/images/PictureToBeAdded.png" class="d-block w-100" alt="IMAGE">
                            </div>
                        </div>
                    
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCustomersAlsoBought"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselCustomersAlsoBought"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </section>

            <!-- Recent purchase -->
            <section id ="RecentPurchase" class="recent-purchase-section">
                <div class="container">
                    <h2 class="recent-purchase-heading">Your Recent purchase</h2>
                    <div class="purchase-card">
                        <div class="purchase-image-container">
                            <img src="/images/PictureToBeAdded.png" alt="IMAGE-1" class="purchase-image">
                            <img src="/images/PictureToBeAdded.png" alt="IMAGE-2" class="purchase-image">
                            <img src="/images/PictureToBeAdded.png" alt="IMAGE-3" class="purchase-image">
                        </div>
                        <div class="purchase-details">
                            <h3 class="purchase-title">Product Name</h3>
                            <p class="purchase-description">Product description</p>
                            <span class="purchase date">Purchase date</span>
                        </div>
                    </div>
                    <div class="view-more-container">
                        <a href="#" class="view-more-button">View More</a>
                    </div>
                </div>
            </section>



        </div>
    </div>
@endsection