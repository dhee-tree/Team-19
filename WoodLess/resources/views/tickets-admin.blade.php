@extends('layouts.base')
@section('title', 'Admin - Tickets')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css')}}">
@endsection

@section('content')
    <!-- sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class="fa-solid fa-bars"></i>
            <div class="logo-name"><span>Wood</span>Less</div>
        </a>
        <ul class="side-menu">
            <li><a href="{{url('/admin-panel')}}"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="{{url('/admin-panel/inventory')}}"><i class="fa-solid fa-warehouse"></i>Inventory</a></li>
            <li><a href="{{url('/admin-panel/orders')}}"><i class="fa-solid fa-truck-moving"></i>Orders</a></li>
            <li class="active"><a href="{{url('/admin-panel/tickets')}}"><i class="fa-solid fa-message"></i>Tickets</a></li>
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
                    <h1>Support tickets</h1>
                </div>
            </div>
            <ul class="insights">
                <li>
                    <span class="info">
                        <h3>270</h3>
                        <p>All Tickets</p>
                    </span>
                </li>
                <li>
                    <span class="info">
                        <h3>60</h3>
                        <p>Unresolved tickets</p>
                    </span>
                </li>
                <li>
                    <span class="info">
                        <h3>170</h3>
                        <p>Solved tickets</p>
                    </span>
                </li>
            </ul>
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class="fa-solid fa-ticket"></i>
                        <h3>Recent Tickets</h3>
                        <i class="fa-solid fa-filter"></i>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Ticket ID</th>
                                <th>Ticket Title</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>User ID</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>T001</td>
                                <td><p>Sign-in issue</p></td>
                                <td><p>I can't sign in. How do I get my account back</p></td>
                                <td><p>14-08-2023</p></td>
                                <td><p>John Doe</p></td>
                                <td><p><span class="status completed">Completed</span></p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/admin-panel.js')}}"></script>
@endsection
