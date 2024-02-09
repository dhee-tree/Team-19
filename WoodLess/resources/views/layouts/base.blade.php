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
                    <form  method="GET" action="{{ url('/products/search') }}" class="d-flex" role="search">
                        <input class="form-control me-1" name ="search" type="search" placeholder="Search" aria-label="Search">
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

        <footer class="border-top bg-dark">
            <div class="container-fluid">
                <div class="row row-cols-5 py-5">
                    <div class="col">
                        <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                            <img src="{{ asset('images/logo_plain.svg') }}" class="bi me-2" width="400" height="100">
                        </a>
                        <p class="ps-4" style="color: #a9a9a9;">© 2023</p>
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                        <h5 class="fw-bold" style="color: #e8e8e8">Site Map</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="{{ url('/') }}" class="nav-link p-0" style="color: #ffffff;">Home</a></li>
                            <li class="nav-item mb-2"><a href="products" class="nav-link p-0" style="color: #ffffff;">Products</a></li>
                            <li class="nav-item mb-2"><a href="{{ url('basket') }}" class="nav-link p-0" style="color: #ffffff;">Basket</a></li>
                            <li class="nav-item mb-2"><a href="team" class="nav-link p-0" style="color: #ffffff;">Meet the Team</a></li>
                        </ul>
                    </div>

                    <div class="col">
                        <h5>‎</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="contact" class="nav-link p-0" style="color: #ffffff;">Contact Us</a></li>
                            <li class="nav-item mb-2"><a href="about" class="nav-link p-0" style="color: #ffffff;">About Us</a></li>
                            <li class="nav-item mb-2"><a href="register" class="nav-link p-0" style="color: #ffffff;">Register</a></li>
                            <li class="nav-item mb-2"><a href="login" class="nav-link p-0" style="color: #ffffff;">Login</a></li>
                        </ul>
                    </div>

                    <div class="col">
                        <h5 class="fw-bold"></h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-3 ps-5"><a href="https://www.instagram.com" class="nav-link p-0" style="color: #ffffff;"><i class="fa-brands fa-instagram fa-xl"></i></a></li>
                            <li class="nav-item mb-3 ps-5"><a href="https://www.twitter.com" class="nav-link p-0" style="color: #ffffff;"><i class="fa-brands fa-x-twitter fa-xl"></i></a></li>
                            <li class="nav-item mb-3 ps-5"><a href="https://www.facebook.com" class="nav-link p-0" style="color: #ffffff;"><i class="fa-brands fa-square-facebook fa-xl"></i></a></li>
                            <li class="nav-item mb-3 ps-5"><a href="https://www.whatsapp.com" class="nav-link p-0" style="color: #ffffff;"><i class="fa-brands fa-whatsapp fa-xl"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <!-- bootstrap 5.3 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        @yield('js')
    </div>
</body>

</html>