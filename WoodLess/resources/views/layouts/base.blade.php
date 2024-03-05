<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WoodLess">
    <meta name="author"
        content="Ighomena Odebala, Lewis Neiland, Zaakir Mohammad, Ismaeel Noor, Ndumiso Mbangeleli, Abdulhamid Mustapha, Umer Mohammed, Matteo Crozat">
    <meta name="keywords" content="team project, birmingham, aston university">
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <title>@yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <!-- bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/c5cd4f3e40.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/wavyanimation-footer.css') }}">

    @yield('style')

</head>

<body class="antialiased">
    <nav id="navbar" class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand ms-2" href="/"><img class="logo" src="{{ asset('images/logo_plain.svg') }}"
                    width="120" alt="Woodless Logo" /></a>


            <li id="iconsnavbar" class="d-flex ms-1">


                <a type="button" data-bs-toggle="offcanvas" data-bs-target="#basket-offcanvas"
                    aria-controls="basket-offcanvas" role="button" class="nav-link position-relative">
                    <button class="ms-1 btn btn-outline-light rounded-pill position-relative z-index-1" type="submit"
                        data-mdb-ripple-init>
                        <!-- Basket Icon -->
                        <i class="fa-solid fa-shopping-basket"></i>
                    </button>
                    <!-- Red Small Icon (only shown if user has items in the basket) -->
                    <?php if (Auth()->check() && Auth()->user()->basket()->first()->productAmount() > 0) : ?>
                    <small class="badge position-absolute translate-middle badge-notification bg-danger rounded-pill">
                        {{ Auth()->user()->basket()->first()->productAmount() }}
                    </small>
                    <?php endif; ?>
                </a>

                @guest
                    <a type="button" href="{{ url('login') }}" class="ms-2 btn btn-outline-light rounded-pill"
                        type="submit" data-mdb-ripple-init>
                        <i class="fa-solid fa-unlock"></i>
                    </a>
                @else
                    <a type="button" href="{{ url('user-panel') }}" class="ms-2 btn btn-outline-light rounded-pill"
                        type="submit" data-mdb-ripple-init>
                        <i class="fa-solid fa-user"></i>
                    </a>
                @endguest

                <button id="navbartoggler" class="d-lg-none btn btn-outline-light rounded-pill ms-2" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </li>

            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                            href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}"
                            href="{{ url('/categories') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('products') ? 'active' : '' }}"
                            href="{{ url('/products') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}"
                            href="{{ url('/contact') }}">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'active' : '' }}"
                            href="{{ url('/about') }}">About us</a>
                    </li>
                </ul>

                <form method="GET" action="{{ route('products.filter') }}"
                    class="d-flex justify-content-lg-end justify-content-sm-center" role="search">
                    <input type="search" name="search" placeholder="Search Products..."
                        class="rounded-pill form-control search-input" />
                    <button class="ms-2 btn btn-outline-light rounded-pill" type="submit" data-mdb-ripple-init>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>



            </div>



        </div>
    </nav>

    <div class="col" id="basket-offcanvas-div" tabindex="-1">
        <div class="shadow-lg offcanvas offcanvas-end scrollable" id="basket-offcanvas"
            aria-labelledby="basket-offcanvas">
            <div class="offcanvas-header text-light mb-0 py-3">
                <span class="fs-5 offcanvas-title" id="basket-offcanvas">Your Basket</span>
                <button type="button" class="btn text-light" data-bs-dismiss="offcanvas" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="offcanvas-body">
                @guest
                    <div class="">
                        <a class="link-dark" href="{{ url('basket') }}">Sign in</a> to view your basket.
                    </div>
                @endguest
                @auth
                    <div class="col h-100">
                        @php
                            $user = Auth()->user();
                            $basketItems = $user->basket()->first()->products()->get();
                            $totalBasketCost = $user->basket()->first()->totalCost();
                        @endphp
                        @foreach ($basketItems as $item)
                            @php $itemAttributes = json_decode($item->pivot->attributes, true); @endphp
                            <a href="/product/{{ $item->id }}" style="text-decoration: none;">
                                <div class="card expand-hover shadow-sm mb-3">
                                    <div class="row g-0">
                                        <div class="col-3">
                                            <img src="{{ asset($item->getImages()[0]) }}"
                                                class="p-2 img-fluid rounded-start" alt="...">
                                        </div>

                                        <div class="vr shadow-none bg-secondary"></div>

                                        <div class="col-6">
                                            <div class="card-body ms-0 ps-2 pt-2">
                                                <h6 class="fw-bold mb-0 card-title">{{ $item->title }}</h6>
                                                <p class="card-text">
                                                    £{{ sprintf('%0.2f', round($item->cost - $item->cost * ($item->discount / 100), 2)) }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="">
                                            <small class="position-absolute bottom-0 start-0 pb-1 ps-2">
                                                <span class="fw-bold">{{ $item->pivot->amount }}x</span>
                                                @if ($itemAttributes['colour'])
                                                    <i style="color: {{ $itemAttributes['colour'] }}"
                                                        class="fa-solid fa-circle"></i>
                                                @endif
                                            </small>
                                            <small class="position-absolute bottom-0 end-0 pb-1 pe-2">
                                                @foreach ($itemAttributes as $itemAttribute => $key)
                                                    @php
                                                        if ($itemAttribute == 'colour') {
                                                            continue;
                                                        }
                                                    @endphp
                                                    <span class="fw-bold">{{ ucFirst($itemAttribute) }}:</span>
                                                    <span class="">{{ $itemAttributes[$itemAttribute] }}</span>
                                                @endforeach
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="col bg-white pt-2 sticky-bottom">
                        <div class="row-100 mb-0">
                            <h5 class="fw-bold">Total: £{{ sprintf('%0.2f', $totalBasketCost) }}</h5>
                        </div>
                        <div class="d-flex justify-content-around">
                            <a style="background-color: #1d1912" class="flex-fill btn text-light me-2" role="button"
                                href="{{ asset('basket') }}">
                                Edit Basket
                                <span class="ms-1 fw-light badge rounded-pill badge-notification">
                                    {{ $user->basket()->first()->productAmount() }}
                                </span>
                            </a>

                            @if (!$basketItems->isEmpty())
                                <a style="background-color: #1d1912" class="flex-fill btn btn-dark ms-2" role="button"
                                    href="{{ asset('checkout') }}">Checkout</a>
                            @endif
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <div class="card-body-s">
        <div>
            <span class="close">&times;</span>
            <p class="chat-message">We are here to help do not hesitate to get in touch</p>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sticky sticky-bottom z-1 end-0" data-bs-toggle="modal"
        data-bs-target="#staticBackdrop">
        <i class="fa-solid fa-message"></i>
    </button>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Create a support ticket</h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card card-danger direct-chat direct-chat-danger">
                        <div class="card-header">
                            <h3 class="card-title">Direct Chat</h3>
                            <div class="card-tools">
                                <span data-toggle="tooltip" title="3 New Messages" class="badge badge-light">3</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                                    data-widget="chat-pane-toggle">
                                    <i class="fas fa-comments"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                                        <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="/docs/3.2/assets/img/user1-128x128.jpg"
                                        alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        Is this template really for free? That's unbelievable!
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->
                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                                        <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="/docs/3.2/assets/img/user3-128x128.jpg"
                                        alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        You better believe it!
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                                        <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="/docs/3.2/assets/img/user1-128x128.jpg"
                                        alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        Working with AdminLTE on a great new app! Wanna join?
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->
                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                                        <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="/docs/3.2/assets/img/user3-128x128.jpg"
                                        alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        I would love to.
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->
                            </div>
                            <!--/.direct-chat-messages-->
                            <!-- Contacts are loaded here -->
                            <div class="direct-chat-contacts">
                                <ul class="contacts-list">
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img"
                                                src="/docs/3.2/assets/img/user1-128x128.jpg">
                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Count Dracula
                                                    <small class="contacts-list-date float-right">2/28/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">How have you been? I was...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img"
                                                src="/docs/3.2/assets/img/user7-128x128.jpg">
                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Sarah Doe
                                                    <small class="contacts-list-date float-right">2/23/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">I will be waiting for...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img"
                                                src="/docs/3.2/assets/img/user3-128x128.jpg">
                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Nadia Jolie
                                                    <small class="contacts-list-date float-right">2/20/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">I'll call you back at...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img"
                                                src="/docs/3.2/assets/img/user5-128x128.jpg">
                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Nora S. Vans
                                                    <small class="contacts-list-date float-right">2/10/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">Where is your new...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img"
                                                src="/docs/3.2/assets/img/user6-128x128.jpg">
                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    John K.
                                                    <small class="contacts-list-date float-right">1/27/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">Can I take a look at...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img"
                                                src="/docs/3.2/assets/img/user8-128x128.jpg">
                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Kenneth M.
                                                    <small class="contacts-list-date float-right">1/4/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">Never mind I found...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                </ul>
                                <!-- /.contacts-list -->
                            </div>
                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..."
                                        class="form-control">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-primary">Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!--/.direct-chat -->
                    <!-- form for creating a ticket -->
                    <!-- <form action="{{ route('user.tickets.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">

                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>

                            <label for="information">Information</label>
                            <textarea name="information" id="information" class="form-control" required style="resize: none;"></textarea>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create Ticket</button>
                        </div>
                    </form> -->

                </div>
            </div>
        </div>
    </div>

    <main>
        <!-- include('layouts.alert') !-->
        @yield('content')


    </main>

    <footer class="text-center">


        <!-- Grid container -->
        <div class="container pt-4">
            <!-- Three columns -->
            <div class="row my-3">
                <!-- About column -->
                <div class="col-md-4">
                    <div class="border border-secondary px-2 pt-3 rounded mb-4">
                        <h5><strong>WoodLess</strong></h5>
                        <p>Stylish furniture crafted from ocean plastic, where sustainability meets sophistication
                            in every piece of furniture.</p>
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
            <section id="footericons" class="mb-4">
                <!-- Social media buttons -->
                <a class="btn btn-link btn-floating btn-lg m-1" href="https://www.facebook.com" role="button"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-link btn-floating btn-lg m-1" href="https://www.twitter.com" role="button"><i
                        class="fab fa-twitter"></i></a>
                <a class="btn btn-link btn-floating btn-lg m-1" href="https://www.whatsapp.com" role="button"><i
                        class="fab fa-whatsapp"></i></a>
                <a class="btn btn-link btn-floating btn-lg m-1" href="https://www.instagram.com" role="button"><i
                        class="fab fa-instagram"></i></a>
                <a class="btn btn-link btn-floating btn-lg m-1" href="https://www.linkedin.com" role="button"><i
                        class="fab fa-linkedin"></i></a>
                <a class="btn btn-link btn-floating btn-lg m-1" href="https://www.github.com" role="button"><i
                        class="fab fa-github"></i></a>
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


    @if (session('success'))
        <div id="successAlert"
            class="alert fade show alert-success shadow-sm text-center position-fixed translate-middle bottom-0 start-50 mb-2 py-2"
            role="alert" style="display: none;">

            {{ session('success') }}
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
    @endif

    @if (session('status'))
        <div id="successAlert"
            class="alert z-3 alert-{{ session('status') ?? 'info' }} fade show position-fixed bottom-0 end-0 mb-3 me-3 py-2"
            role="alert">
            @switch(session('status'))
                @case('success')
                    <i class="fa-solid fa-xs fa-check"></i>
                @break

                @case('warning')
                    <i class="fa-solid fa-xs fa-warning"></i>
                @break

                @case('danger')
                    <i class="fa-solid fa-xs fa-xmark"></i>
                @break

                @case('info')
                    <i class="fa-solid fa-xs fa-circle-info"></i>
                @break

                @default
                    <i class="fa-solid fa-xs fa-circle-info"></i>
                @break
            @endswitch
            {{ session('message') }}
            <!--<button type="button" class="btn-close btn-sm py-0" data-bs-dismiss="alert" aria-label="Close"></button>!-->
        </div>
    @endif
    <!-- bootstrap 5.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>


    @yield('js')

</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var closeButton = document.querySelector('.card-body-s .close');
        var cardBody = document.querySelector('.card-body-s');
        closeButton.addEventListener('click', function() {
            cardBody.style.display = 'none';


        });
    });
</script>


</html>