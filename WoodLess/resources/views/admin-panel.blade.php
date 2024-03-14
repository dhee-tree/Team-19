@extends('layouts.admin-panel-base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css') }}">
@endsection

@section('main-content')
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
