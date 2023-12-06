@extends('layouts.base')
@section('title', 'WoodLess - Admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css')}}">
@endsection

@section('content')
<body>
    <div class="wrapper">

    </div><aside id="sidebar">
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
                    <a href="{{asset('views/orders-admin.blade.php')}}" class="sidebar-link">
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
                            <a href="" class="sidebar-link">User display</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="" class="sidebar-link">Support tickets</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa-regular fa-store pe-2"></i>
                        Inventory
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</body>
@endsection
