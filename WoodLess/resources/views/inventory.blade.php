@extends('layouts.base')
@section('title', 'Admin - Inventory')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css') }}">
@endsection

@php
    // Convert the $products array into a JSON string
    $productsJson = json_encode($products);
@endphp


@section('content')

    <body>
        <div class="wrapper">
            <aside id="sidebar">
                <!-- Content for sidebar -->
                <div class="h-100">
                    <div class="sidebar-logo">
                        <a href="#">Admin Panel</a>
                    </div>
                    <ul class="sidebar-nav">
                        <li class="sidebar-item">
                            <a href="{{ url('admin-panel') }}" class="sidebar-link">
                                <i class="fa-solid fa-house pe-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('/admin-panel/orders') }}" class="sidebar-link">
                                <i class="fa-solid fa-list pe-2"></i>
                                Orders
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#customers"
                                data-bs-toggle="collapse" aria-expanded="false">
                                <i class="fa-solid fa-user pe-2"></i>
                                Customers
                            </a>
                            <ul id="customers" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="{{ url('/admin-panel/users') }}" class="sidebar-link">User display</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('/admin-panel/tickets') }}" class="sidebar-link">Support tickets</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('/admin-panel/inventory') }}" class="sidebar-link">
                                <i class="fa-regular fa-store pe-2"></i>
                                Inventory
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            <div class="main">
                <div class="navbar navbar-expand px-3">
                    <ul class="navbar-nav">
                        <nav-item class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"><i
                                    class="fa-solid fa-plus"></i></a>
                        </nav-item>
                    </ul>
                </div>
                <div class="container-fluid py-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="user_length">
                                <label>
                                    Show
                                    <select name="user_length" id="user_length" aria-controls="example"
                                        class="form-select form-select-sm">
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
                                    <input type="search" class="form-control form-control-sm" placeholder
                                        aria-controls="search">
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
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">Product ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">Product title</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">Description</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">Quantity</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">Categories</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">Expand</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">Edit</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class="datatable-body">
                                        @foreach ($products as $product)
                                            <tr scope="row">
                                                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                    scope="col">{{ $product->id }}</td>
                                                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                    scope="col">{{ $product->title }}</td>
                                                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                    scope="col">{{ $product->truncateDescription(5) }}...</td>
                                                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                    scope="col">{{ $product->stockAmount() }}...</td>
                                                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                    scope="col">{{ $product->categories->first()->category }}...</td>
                                                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                    scope="col"><button type="button" class="btn btn-primary openInfoModalButton"
                                                        onclick="openInfoModal({{ $product->id }})"
                                                        id="openInfoModalButton"><i
                                                            class="fa-solid fa-up-right-from-square"></i></button></td>
                                                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                    scope="col"><button type="button" class="btn btn-secondary openEditModalButton"
                                                        onclick="openEditModal({{ $product->id }})"
                                                        id="openEditModalButton">Edit</button>
                                                </td>
                                                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                    scope="col"><button type="button"
                                                        class="btn btn-danger">Delete</button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>
@endsection

@section('js')

    <!-- JavaScript to handle modal opening -->
    <script>
        function openInfoModal(productId) {
            // Disable all buttons with the specified class to disable multiple spam
            var buttons = document.querySelectorAll(".openInfoModalButton");
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].disabled = true;
            }

            $.get('/admin-panel/info/' + productId, function(data) {
                $('body').append(data);
                var modal = $('#productModal');
                modal.modal('show'); // Show the modal after content is appended

                // Remove the modal from the DOM when it's closed
                modal.on('hidden.bs.modal', function() {
                    // Re-enable all buttons with the specified class when the modal is closed
                    var buttons = document.querySelectorAll(".openInfoModalButton");
                    for (var i = 0; i < buttons.length; i++) {
                        buttons[i].disabled = false;
                    }

                    modal.remove();
                });
            });
        }
    </script>

    <!-- JavaScript to handle modal opening -->
    <script>
        function openEditModal(productId) {

            // Disable all buttons with the specified class to disable multiple spam
            var buttons = document.getElementsByClassName("openEditModalButton");
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].disabled = true;
            }

            $.get('/admin-panel/edit/' + productId, function(data) {
                $('body').append(data);
                var modal = $('#productModal');
                modal.modal('show'); // Show the modal after content is appended

                // Remove the modal from the DOM when it's closed
                modal.on('hidden.bs.modal', function() {
                    // Re-enable all buttons with the specified class when the modal is closed
                    var buttons = document.getElementsByClassName("openEditModalButton");
                    for (var i = 0; i < buttons.length; i++) {
                        buttons[i].disabled = false;
                    }
                    modal.remove();
                });
            });
        }
    </script>
@endsection
