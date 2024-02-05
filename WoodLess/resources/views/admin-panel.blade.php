@extends('layouts.base')
@section('title', 'WoodLess - Admin')

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
                        <a href="#" class="sidebar-link">
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
            <div class="container">
                <div class="row">
                    <div class="section-header">
                        <span><h2>Recent Orders</h2></span>
                    </div>
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Order number</th>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">Item</th>
                                        <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Shipping address</th>
                                        <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-xs mb-0">910928302</p>
                                        </td>
                                        <td><p class="text-xs mb-0">Product name</p></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="section-header">
                        <span><h2>Support tickets</h2></span>
                    </div>
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Ticket ID</th>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Ticket title</th>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">Message</th>
                                        <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-xs mb-0">00042</p>
                                        </td>
                                        <td><p class="text-xs mb-0">Sign-in issue</p></td>
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
