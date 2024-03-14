@extends('layouts.user-panel-base')

@section('main')
@section('banner')
<!-- Code for banner -->
<div class="banner">
    <h1>{{ $user->first_name }}'s Dashboard</h1>
    <?php if (Auth()->check() && !Auth()->user()->isVerified()) : ?>
    <p>Verify your email to access basket and checkout. Did not receive the email? <a
            href="{{ route('verification.resend') }}">Resend</a></p>
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
                <button type="button" data-bs-target="#carouselCustomersAlsoBought" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1">
                </button>
                <button type="button" data-bs-target="#carouselCustomersAlsoBought" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselCustomersAlsoBought" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div id="productCarousel" class="mb-3 carousel carousel-dark carousel-fade" data-bs-interval="false">
                    <div class="carousel-inner">
                        @php
                        $pageLimit = 2;
                        @endphp

                        @for ($i = 0; $i < count($similarProducts); $i +=$pageLimit) <div
                            class="carousel-item @if ($i == 0) active @endif">
                            <div class="row">
                                @for ($ii = $i; $ii < $i + $pageLimit && $ii < count($similarProducts); $ii++) @php
                                    $similarProduct=$similarProducts[$ii]; $similarProductImages=explode(',',
                                    $similarProduct->images);
                                    @endphp
                                    <div class="col-6">
                                        <a href="/product/{{ $similarProduct->id }}">
                                            <div class="expand-hover shadow-sm card mt-3">
                                                <!-- Sale badge-->
                                                @if(($similarProduct->discount))
                                                <div class="badge bg-dark text-white position-absolute"
                                                    style="top: 0.5rem; right: 0.5rem">Sale
                                                </div>
                                                @endif
                                                <!-- Product image-->
                                                <img width="10" class="card-img-top p-3"
                                                    src="{{ Storage::url($similarProductImages[0]) }}"
                                                    alt="{{ $similarProduct->title }}" />
                                                <!-- Product details-->
                                                <div class="card-body p-0 mb-3">
                                                    <div class="d-flex flex-row justify-content-center">
                                                        <div class="text-center d-none d-xl-block">
                                                            <!-- Product name-->
                                                            <span class="fs-5 fw-bolder">{{ $similarProduct->title }}
                                                                </h5>
                                                        </div>
                                                        <div class="vr mx-2 d-none d-xl-block"></div>
                                                        <div class="text-center">
                                                            <!-- Product price-->
                                                            <span class="fs-5">
                                                                @if(($similarProduct->discount))
                                                                £{{sprintf("%0.2f", round(($similarProduct->cost) -
                                                                (($similarProduct->cost) * ($similarProduct->discount /
                                                                100)), 2))}}
                                                                @else
                                                                £{{$similarProduct->cost}}
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex flex-row justify-content-center m-0 p-0">
                                                        <div class="text-center text-secondary">
                                                            <!-- Original product price-->
                                                            <span class="fs-6">
                                                                @if(($similarProduct->discount))
                                                                <strike>£{{$similarProduct->cost}}</strike>
                                                                @else
                                                                ⠀
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endfor
                            </div>
                    </div>
                    @endfor
                </div>
</section>

<!-- Recent purchase -->
<section id="RecentPurchase" class="recent-purchase-section">
    <div class="container">
        @if($recent)
        <h2 class="recent-purchase-heading">Your Recent purchase</h2>
        <div class="purchase-card">
            <table>
                <thead>
                    <tr>
                        <th>Items</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>View Order</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{ $recent->products->sum('pivot.amount') }}</td>
                        @if ($recent->status->status == 'Processing')
                        <td class="order-status order-status-processing">{{ $recent->status->status }}</td>
                        @elseif ($recent->status->status == 'Transit')
                        <td class="order-status order-status-transit">{{ $recent->status->status }}</td>
                        @else
                        <td class="order-status order-status-completed">{{ $recent->status->status }}</td>
                        @endif
                        <td>{{ $recent->created_at }}</td>
                        <td><a href="{{ route('user.view-purchase', $recent->id) }}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

        @else
        <h2 class="recent-purchase-heading">Browse all of our products</h2>
        @endif

    </div>
</section>
</div>
@endsection