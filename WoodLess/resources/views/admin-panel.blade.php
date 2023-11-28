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
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#users" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-solid fa-user pe-2"></i>
                            Users
                        </a>
                        <ul id="users" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="" class="sidebar-link">Page 1</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="" class="sidebar-link">Page 2</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#factories" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-solid fa-city pe-2"></i>
                            Factories
                        </a>
                        <ul id="factories" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="" class="sidebar-link">Post 1</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="" class="sidebar-link">Post 2</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-solid fa-sliders pe-2"></i>
                            Auth
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Login</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Register</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Forgot Password</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="" class="avatar img-fluid" alt="Profile photo">
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</body>
@endsection
