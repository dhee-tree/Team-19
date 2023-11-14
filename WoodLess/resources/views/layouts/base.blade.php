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

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @yield('style')

    </head>
    <body class="antialiased">
        <div class="container">
            <nav>
                <!-- Navbar goes here -->
                <a href="{{ url('/') }}">Home</a>
                <hr>
            </nav>

            <main>
                @yield('content')
            </main>
            
            <footer>
                <!-- Footer goes here -->
            </footer>
        </div>
    </body>
</html>
