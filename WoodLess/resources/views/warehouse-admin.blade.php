@extends('layouts.base')
@section('title', 'Admin - Warehouse')

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
                <li><a href="{{ url('/admin-panel') }}"><i class="fa-solid fa-house"></i>Dashboard</a></li>
                <li><a href="{{ url('/admin-panel/inventory') }}"><i class="fa-solid fa-store"></i>Inventory</a></li>
                <li><a href="{{ url('/admin-panel/orders') }}"><i class="fa-solid fa-truck-moving"></i>Orders</a></li>
                <li><a href="{{ url('/admin-panel/tickets') }}"><i class="fa-solid fa-message"></i>Tickets</a></li>
                <li><a href="{{ url('/admin-panel/users') }}"><i class="fa-solid fa-user"></i>Users</a></li>
                <li class="active"><a href="#"><i class="fa-solid fa-warehouse"></i>Warehouse</a></li>
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
                        <h1>Warehouses</h1>
                    </div>
                </div>

                <!-- Warehouses table -->
                <div class="bottom-data">
                    <div class="orders">
                        <div class="header">
                            <i class='bx bx-receipt'></i>
                            <h3>Warehouses</h3>
                            <i class='fa-solid fa-filter'></i>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Address</th>
                                    <th>Postcode</th>
                                    <th>City</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($warehouses as $warehouse)
                                    <tr class="warehouse-row">
                                        <td>{{ $warehouse->id }}</td>
                                        <td>{{ $warehouse->address }}</td>
                                        <td>{{ $warehouse->postcode }}</td>
                                        <td>{{ $warehouse->city }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="header">
                    <div class="left">
                        <h1>Categories</h1>
                    </div>
                </div>

                <!-- Warehouses table -->
                <div class="bottom-data">
                    <div class="orders">
                        <div class="header">
                            <i class='bx bx-receipt'></i>
                            <h3>Categories</h3>
                            <i class='fa-solid fa-filter'></i>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr class="category-row">
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->category }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>

        <!-- Delete Product Modal -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
            aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form id="deleteForm" action="{{ route('product-delete', ['id' => ':product_id']) }}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="id_input" id="id_input" value="">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('js')
    <script src="{{ asset('js/admin-panel.js') }}"></script>
    <script src="{{ asset('js/admin-panel/warehousecategories.js') }}"></script>

@endsection
