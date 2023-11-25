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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid" style="max-width: 100vw;">
                <a class="navbar-brand" href="#">WoodLess</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/Team-19/WoodLess/public/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="categories">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="products">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="contact">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="about">About us</a>
                        </li>
                    </ul>
                    <li class="d-flex">
                        <a href="#"><i class="fa-solid fa-basket-shopping fa-xl" style="color: #000000;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="#"><i class="fa-solid fa-user fa-xl" style="color: #000000;"></i></a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer>
            <div class="container">
                <footer class="row row-cols-5 py-5 my-5 border-top">
                    <div class="col">
                        <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                            <svg class="bi me-2" width="40" height="32">
                                <use xlink:href="#Bootstrap"></use>
                            </svg>
                        </a>
                        <p class="text-muted">© 2023</p>
                    </div>

                    <div class="col">

                    </div>

                    <div class="col">
                        <h5>Site Map</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="/Team-19/WoodLess/public/" class="nav-link p-0 text-muted">Home</a></li>
                            <li class="nav-item mb-2"><a href="products" class="nav-link p-0 text-muted">Products</a></li>
                            <li class="nav-item mb-2"><a href="basket" class="nav-link p-0 text-muted">Basket</a></li>
                            <li class="nav-item mb-2"><a href="team" class="nav-link p-0 text-muted">Meet the Team</a></li>
                        </ul>
                    </div>

                    <div class="col">
                        <h5>‎</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="contact" class="nav-link p-0 text-muted">Contact Us</a></li>
                            <li class="nav-item mb-2"><a href="about" class="nav-link p-0 text-muted">About Us</a></li>
                            <li class="nav-item mb-2"><a href="register" class="nav-link p-0 text-muted">Register</a></li>
                            <li class="nav-item mb-2"><a href="login" class="nav-link p-0 text-muted">Login</a></li>
                        </ul>
                    </div>

                    <div class="col">
                        <h5>Our Socials</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><i class="fa-brands fa-instagram fa-xl"></i></a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><i class="fa-brands fa-x-twitter fa-xl"></i></a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><i class="fa-brands fa-square-facebook fa-xl"></i></a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><i class="fa-brands fa-linkedin fa-xl"></i></a></li>
                        </ul>
                    </div>
                </footer>
            </div>

            <!-- bootstrap 5.3 -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

            @yield('js')
</body>

</html>