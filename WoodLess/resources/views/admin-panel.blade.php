@extends('layouts.base')
@section('title', 'WoodLess - Admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css')}}">
@endsection

@section('content')
<body>
    <!-- sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class="fa-solid fa-shop"></i>
            <div class="logo-name"><span>Wood</span>Less</div>
        </a>
        <ul class="side-menu">
            <li class="active"><a href="#"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="{{url('/admin-panel/inventory')}}"><i class="fa-solid fa-warehouse"></i>Inventory</a></li>
            <li><a href="{{url('/admin-panel/orders')}}"><i class="fa-solid fa-truck-moving"></i>Orders</a></li>
            <li><a href="{{url('/admin-panel/tickets')}}"><i class="fa-solid fa-message"></i>Tickets</a></li>
            <li><a href="{{url('/admin-panel/users')}}"><i class="fa-solid fa-user"></i>Users</a></li>
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
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>
            </a>
        </nav>
        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Welcome Admin!</h1>
                </div>
            </div>
            <!-- Insights -->
            <ul class="insights">
                <li>
                    <i class="fa-solid fa-clipboard-check"></i>
                    <span class="info">
                        <h3>
                            1,074
                        </h3>
                        <p>Paid Orders</p>
                    </span>
                </li>
                <li><i class="fa-solid fa-user"></i>
                    <span class="info">
                        <h3>
                            3,944
                        </h3>
                        <p>Users</p>
                    </span>
                </li>
                <li><i class="fa-solid fa-comments"></i>
                    <span class="info">
                        <h3>
                            14,721
                        </h3>
                        <p>Tickets</p>
                    </span>
                </li>
                <li><i class="fa-solid fa-money-bill-wave"></i>
                    <span class="info">
                        <h3>
                            £6,742
                        </h3>
                        <p>Total Sales</p>
                    </span>
                </li>
            </ul>
            <!-- End of Insights -->

            <!-- Recent orders table -->
            <!-- Recent orders table -->
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Recent Orders</h3>
                        <i class='fa-solid fa-filter'></i>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Order Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p>John Doe</p>
                                </td>
                                <td>14-08-2023</td>
                                <td><span class="status completed">Completed</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <p>John Doe</p>
                                </td>
                                <td>14-08-2023</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <p>John Doe</p>
                                </td>
                                <td>14-08-2023</td>
                                <td><span class="status process">Processing</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
@endsection

@section('js')
    <script src="{{ asset('js/admin-panel.js')}}"></script>
@endsection
