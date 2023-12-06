@extends('layouts.base')
@section('title', 'Admin - Users')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css')}}">
@endsection

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
                        <a href="{{url('admin-panel')}}" class="sidebar-link">
                            <i class="fa-solid fa-house pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/admin-panel/orders')}}" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Orders
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#customers" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-solid fa-user pe-2"></i>
                            Customers
                        </a>
                        <ul id="customers" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{url('/admin-panel/users')}}" class="sidebar-link">User display</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{url('/admin-panel/tickets')}}" class="sidebar-link">Support tickets</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/admin-panel/inventory')}}" class="sidebar-link">
                            <i class="fa-regular fa-store pe-2"></i>
                            Inventory
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <form roles="search" class="d-flex">
                            <input type="search" class="form-control me-2" placeholder="Search" aria-label="Search">
                            <buttton class="btn btn-outline-success" type=submit>Search</buttton>
                        </form>
                    </ul>
                </div>
            </nav>
            <div class="container">
                <div class="card mb-4">
                    <div class="card-header pb-0 font-weight-bolder">
                        <h6>Orders</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="datatable table-responsive datatable-inner ps">
                            <table class="table datatable-table align-items-center mb-0">
                                <thead class="datatable">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">First Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Last Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Phone Number</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Role</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Action</th>
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
        </div>
    </div>
</body>
@endsection
