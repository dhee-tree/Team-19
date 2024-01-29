@extends('layouts.base')
@section('title', 'WoodLess - Admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css')}}">
@endsection

@section('content')
<body class="main_body">
    <nav class="sidebar">
        <div class="sidebar_logo d-flex justify-content-between">
            <a href="#">Admin Panel</a>
        </div>
        <ul id="sidebar_menu">
            <li class>
                <a href="#" aria-expanded="false">
                    <div class="nav_icon">
                        <i class="fa-solid fa-house pe-2"></i>
                    </div>
                    <div class="nav_title">
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <li class>
                <a href="{{url('/admin-panel/orders')}}" aria-expanded="false">
                    <div class="nav_icon">
                        <i class="fa-solid fa-list pe-2"></i>
                    </div>
                    <div class="nav_title">
                        <span>Orders</span>
                    </div>
                </a>
            </li>
            <li class>
                <a href="#" aria-expanded="false">
                    <div class="nav_icon">
                        <i class="fa-solid fa-user pe-2"></i>
                    </div>
                    <div class="nav_title">
                        <span>Users</span>
                    </div>
                </a>
            </li>
            <li class>
                <a href="#" aria-expanded="false">
                    <div class="nav_icon">
                        <i class="fa-regular fa-store pe-2"></i>
                    </div>
                    <div class="nav_title">
                        <span>Inventory</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
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
</body> -->
@endsection
