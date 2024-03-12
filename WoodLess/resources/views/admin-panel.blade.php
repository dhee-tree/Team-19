@extends('layouts.base')
@section('title', 'WoodLess - Admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css') }}">
@endsection

@section('content')

    <body>
        <!-- sidebar -->
        <div class="sidebar">
            <a href="#" class="logo">
                <!-- Still looking for a logo which links to WoodLess, picked the L because of the favicon -->
                <i class="fa-solid fa-l"></i>
                <div class="logo-name"><span>Wood</span>Less</div>
            </a>
            <ul class="side-menu">
                <li class="active"><a href="#"><i class="fa-solid fa-house"></i>Dashboard</a></li>
                <li><a href="{{ url('/admin-panel/inventory') }}"><i class="fa-solid fa-store"></i>Inventory</a></li>
                <li><a href="{{ url('/admin-panel/orders') }}"><i class="fa-solid fa-truck-moving"></i>Orders</a></li>
                <li><a href="{{ url('/admin-panel/tickets') }}"><i class="fa-solid fa-message"></i>Tickets</a></li>
                <li><a href="{{ url('/admin-panel/users') }}"><i class="fa-solid fa-user"></i>Users</a></li>
                <li><a href="{{ url('/user-panel') }}"><i class="fa-solid fa-user"></i>User Panel</a></li>
                <li><a href="{{ url('/admin-panel/warehouse') }}"><i class="fa-solid fa-warehouse"></i>Warehouse</a></li>
            </ul>
            <ul class="side-menu">
                <li>
                    <a href="#" class="logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <!-- End of sidebar -->

        <!-- Main content -->
        <div class="content">
            <!-- Navbar -->
            <nav>
                <i class="fa-solid fa-bars"></i>
                <!--Commented out while there is no functionality, left to keep space open -->
                <form action="#">
                    <div class="form-input">
                        <!--<input type="search" placeholder="Search...">
                                                                                                                                                                                                                                                                                                                                            <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>-->
                    </div>
                </form>
                <a href="#" class="notif">
                    <i class="fa-solid fa-bell"></i>
                    <span class="count">12</span>
                </a>
                <a href="" class="profile">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                    </svg>
                </a>
            </nav>
            <!-- End of Navbar -->

            <main>
                <div class="header">
                    <div class="left">
                        <h1>Welcome Admin!</h1>
                    </div>
                </div>
                <!-- Insights -->
                <ul class="insights">
                    <li>
                        <i class="fa-solid fa-clipboard-check"></i>
                        <span class="info">
                            <h3>
                                {{ $orderCount }}
                            </h3>
                            <p>Paid Orders</p>
                        </span>
                    </li>
                    <li><i class="fa-solid fa-user"></i>
                        <span class="info">
                            <h3>
                                {{ $users->count() }}
                            </h3>
                            <p>Users</p>
                        </span>
                    </li>
                    <li><i class="fa-solid fa-comments"></i>
                        <span class="info">
                            <h3>
                                {{ count($tickets) }}
                            </h3>
                            <p>Tickets</p>
                        </span>
                    </li>
                    <li><i class="fa-solid fa-money-bill-wave"></i>
                        <span class="info">
                            <h3>
                                {{ $totalCost }}
                            </h3>
                            <p>Total Sales</p>
                        </span>
                    </li>
                </ul>


                <!-- End of Insights -->

                <!-- Recent orders table -->
                <!-- Recent orders table -->
                <div class="bottom-data">
                    <div class="orders">
                        <div class="header">
                            <h3>Dashboard</h3>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Choose Graph
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" onclick="productsChart()">Products</a>
                                    <a class="dropdown-item" onclick="usersChart()">Users</a>
                                    <a class="dropdown-item" onclick="ticketsChart()">Tickets</a>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-3 d-flex flex-column align-items-center justify-content-center">

                                    <div class="btn-group-vertical">
                                        <button id="yearButtonNegative" class="btn btn-primary"
                                            onclick="changeYearTickets(-1)">Previous Year</button>
                                        <button id="refreshButton" class="btn btn-secondary"
                                            onclick="changeYearTickets('refresh')">Current Year</button>
                                        <button id="yearButtonPositive" class="btn btn-primary"
                                            onclick="changeYearTickets(1)">Next Year</button>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <canvas id="myChart" width="1000" height="800"></canvas>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
@endsection

@section('js')

    <script>
        // Encode the Laravel array into JSON format
        const users = @json($users);
        const products = @json($products);
        const tickets = @json($tickets);

        console.log(users);
        console.log(products);
    </script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="{{ asset('js/admin-panel.js') }}"></script>
    <script src="{{ asset('js/admin-panel/dashboard.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTable.js"></script>
@endsection
