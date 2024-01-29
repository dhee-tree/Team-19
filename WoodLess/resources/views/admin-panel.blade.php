@extends('layouts.base')
@section('title', 'WoodLess - Admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css')}}">
@endsection

@section('content')
<body>
    <div class="container">
        <!-- sidebar -->
        <div class="sidebar bg-dark">
            <a href="#" class="logo">
                <div class="logo-name"><span>Admin</span>Panel</div>
            </a>
            <ul class="side-menu">
                <li><a href="#"><i class="fa-solid fa-house"></i></i>Dashboard</a></li>
                <li><a href="#"><i class="fa-solid fa-warehouse"></i></i>Shop</a></li>
                <li class="active"><a href="#"><i class="fa-solid fa-truck-moving"></i>Orders</a></li>
                <li><a href="#"><i class="fa-solid fa-message"></i>Tickets</a></li>
                <li><a href="#"><i class="fa-solid fa-user"></i>Users</a></li>
                <li><a href="#"><i class="fa-solid fa-gear"></i>Settings</a></li>
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
        <!-- end of sidebar -->

        <!-- main content -->
        <div class="content">
            <nav>
                <i class="fa-solid fa-bars"></i>
                <form action="#">
                    <div class="form-input">
                        <input type="search" placeholder="Search...">
                        <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                    </div>
                </form>
                <a href="#" class="notif">
                    <i class="fa-solid fa-bell"></i>
                    <span class="count">12</span>
                </a>
            </nav>
        </div>
        <!-- end of content -->
    </div>
</body>
@endsection
