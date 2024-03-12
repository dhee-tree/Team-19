@extends('layouts.user-panel-base')

@section('main')
    @section('banner')
        <!-- Code for banner -->
        <div class="banner">
            <h1>Banner Heading</h1>
            <?php if (Auth()->check() && !Auth()->user()->isVerified()) : ?>
                <p>Verify your email to access basket and checkout. Did not receive the email? <a href="{{ route('verification.resend') }}">Resend</a></p>
            <?php endif; ?>
        </div> 
    @endsection

    @section('page-content')
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
                        <div class=" carousel-item">
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
    @endsection
@endsection