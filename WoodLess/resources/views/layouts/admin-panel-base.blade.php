@extends('layouts.base')
@section('title', 'WoodLess - Admin')

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
                <li class="{{ request()->is('admin-panel') ? 'active' : '' }}"><a href="{{ url('/admin-panel') }}"><i class="fa-solid fa-house"></i>Dashboard</a></li>
                <li class="{{ request()->is('admin-panel/inventory') ? 'active' : '' }}"><a href="{{ url('/admin-panel/inventory') }}"><i class="fa-solid fa-store"></i>Inventory</a></li>
                <li class="{{ request()->is('admin-panel/orders') ? 'active' : '' }}"><a href="{{ url('/admin-panel/orders') }}"><i class="fa-solid fa-truck-moving"></i>Orders</a></li>
                <li class="{{ request()->is('admin-panel/tickets') ? 'active' : '' }}"><a href="{{ url('/admin-panel/tickets') }}"><i class="fa-solid fa-message"></i>Tickets</a></li>
                <li class="{{ request()->is('admin-panel/users') ? 'active' : '' }}"><a href="{{ url('/admin-panel/users') }}"><i class="fa-solid fa-users"></i>Users</a></li>
                <li><a href="{{ url('/user-panel') }}"><i class="fa-solid fa-user"></i>User Panel</a></li>
                <li class="{{ request()->is('admin-panel/warehouse') ? 'active' : '' }}"><a href="{{ url('/admin-panel/warehouse') }}"><i class="fa-solid fa-warehouse"></i>Warehouse</a></li>
            </ul>
            <ul class="side-menu">
                <li>
                    <a href="{{ route('logout') }}" class="logout"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="logout">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <!-- End of sidebar -->

        <!-- Main content -->
        <div class="content">
            <!-- Navbar -->
            <nav>
                <i class="fa-solid fa-bars"></i>
            </nav>
            <!-- End of Navbar -->

            <main>
                @yield('main-content')
            </main>
        </div>

    </body>
@endsection
