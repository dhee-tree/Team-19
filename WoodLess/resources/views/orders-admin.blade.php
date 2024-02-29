@extends('layouts.base')
@section('title', 'Admin - Orders')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css">
@endsection

@section('content')
<body>
    <!-- sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <div class="logo-name"><span>Wood</span>Less</div>
        </a>
        <ul class="side-menu">
            <li><a href="{{url('/admin-panel')}}"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="{{url('/admin-panel/inventory')}}"><i class="fa-solid fa-warehouse"></i>Inventory</a></li>
            <li class="active"><a href="{{url('/admin-panel/orders')}}"><i class="fa-solid fa-truck-moving"></i>Orders</a></li>
            <li><a href="{{url('/admin-panel/tickets')}}"><i class="fa-solid fa-message"></i>Tickets</a></li>
            <li><a href="{{url('/admin-panel/users')}}"><i class="fa-solid fa-user"></i>Users</a></li>
            <li><a href="{{url('/admin-panel/warehouse')}}"><i class="fa-solid fa-warehouse"></i>Warehouse</a></li>
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
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>
            </a>
        </nav>
        <!-- End of Navbar -->

        <main>
            <div class="container">
                <div class="content">
                    <h1 class="page-title">Orders</h1>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="user_length">
                            <label>
                                Show
                                <select name="user_length" id="user_length" aria-controls="example" class="form-select form-select-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                    entries
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_filter" id="user_filter">
                            <label>
                                Search:
                                <input type="search" class="form-control form-control-sm" placeholder aria-controls="search">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="datatable table-responsive datatable-inner ps">
                            <table class="table datatable-table align-items-center mb-0">
                                <thead class="datatable">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Order Number</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Product</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Time</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Estimated Delivery</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">User</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Warehouse</th>
                                    </tr>
                                </thead>
                                <tbody class="datatable-body">
                                    <tr scope="row">

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
@endsection

@section('script')
    <script src="{{asset('js/admin-panel.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTable.js"></script>
@endsection
