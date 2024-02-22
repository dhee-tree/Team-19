<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WoodLess">
    <meta name="author" content="Ighomena Odebala, Lewis Neiland, Zaakir Mohammad, Ismaeel Noor, Ndumiso Mbangeleli, Abdulhamid Mustapha, Umer Mohammed, Matteo Crozat">
    <meta name="keywords" content="team project, birmingham, aston university">

    <title>@yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <!-- bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/c5cd4f3e40.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('style')

</head>

<body class="antialiased">
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" style="margin-left:4px" href="#"><img class="logo" src="{{ asset('images\logo.png') }}" alt="Woodless Logo" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="{{ url('/categories') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('products') ? 'active' : '' }}" href="{{ url('/products') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About us</a>
                        </li>
                    </ul>
                    <form method="GET" action=" {{route('products.filter')}}" class="d-flex" role="search">
                        <input class="form-control me-1" name="search" type="search" placeholder="search" aria-label="search">
                        <button class="btn btn-outline-success" style="margin-right: 25px;" type="submit">Search</button>
                    </form>
                    <li class="d-flex">
                        <a class="nav-link" href="{{ url('basket') }}"><i class="fa-solid fa-basket-shopping fa-xl" style="color:#e8e8e8; margin-right:20px;"></i></a>
                    </li>
                    <li class="d-flex">
                        @guest
                        <a class="nav-link" href="{{ url('login') }}"><i class="fa-solid fa-unlock fa-flip-horizontal fa-xl" style="color: #e8e8e8; margin-right:10px;"></i></a>
                        @else
                        <a class="nav-link" href="{{ url('user-panel') }}"> <i class="fa-solid fa-user fa-xl" style="color:#e8e8e8; margin-right:10px;"></i></a>
                        @endguest
                    </li>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>


        <footer class="text-center text-white bg-dark">
            <!-- Grid container -->
            <div class="container pt-4">
                <!-- Three columns -->
                <div class="row my-3">
                    <!-- About column -->
                    <div class="col-md-4">
                        <div class="border border-secondary px-2 pt-3 rounded mb-4">
                            <h5><strong>WoodLess</strong></h5>
                            <p>Stylish furniture crafted from ocean plastic, where sustainability meets sophistication in every piece of furniture.</p>
                        </div>
                    </div>
                    <!-- Site Map column -->
                    <div class="col-md-4">
                        <h5><strong>Site Links</strong></h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('categories') }}" class="nav-link p-0">Categories</a></li>
                            <li><a href="{{ url('products') }}" class="nav-link p-0">Products</a></li>
                            <li><a href="{{ url('contact') }}" class="nav-link p-0">Contact Us</a></li>
                            <li><a href="{{ url('about') }}" class="nav-link p-0">About Us</a></li>
                        </ul>
                    </div>
                    <!-- Second Site Map column -->
                    <div class="col-md-4">
                        <h5><strong>Account</strong></h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('register') }}" class="nav-link p-0">Register</a></li>
                            <li><a href="{{ url('login') }}" class="nav-link p-0">Login</a></li>
                            <li><a href="{{ url('basket') }}" class="nav-link p-0">Basket</a></li>
                            <li><a href="{{ url('/') }}" class="nav-link p-0">T&Cs</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Three columns -->
                <hr>
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Social media buttons -->
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" href="https://www.facebook.com" role="button"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" href="https://www.twitter.com" role="button"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" href="https://www.whatsapp.com" role="button"><i class="fab fa-whatsapp"></i></a>
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" href="https://www.instagram.com" role="button"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" href="https://www.linkedin.com" role="button"><i class="fab fa-linkedin"></i></a>
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" href="https://www.github.com" role="button"><i class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright text -->
            <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2024 Copyright:
                <a class="text-white" href="{{ url('/') }}">WoodLess</a>
            </div>
            <!-- Copyright text -->
        </footer>





        <!-- bootstrap 5.3 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        @yield('js')
    </div>
</body>

</html>