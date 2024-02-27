@extends('layouts.base')
@section('title', 'Admin - Tickets')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css')}}">
@endsection

@section('content')
    <!-- sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
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
@endsection
