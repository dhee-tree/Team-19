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
        <div class="main">
            <div class="container-fluid px-5 py-4">
                <div class="row pb-3">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <p class="text-sm mb-0 text-uppercase">ALL TICKETS</p>
                                <h4 class="font-weight-bolder">
                                    <!-- store number of tickets here, will hardcode a value for now -->
                                    230
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <p class="text-sm mb-0 text-uppercase">SOLVED TICKETS</p>
                                <h4 class="font-weight-bolder">
                                    <!-- store number of tickets here, will hardcode a value for now -->
                                    60
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <p class="text-sm mb-0 text-uppercase">PENDING TICKETS</p>
                                <h4 class="font-weight-bolder">
                                    <!-- store number of tickets here, will hardcode a value for now -->
                                    170
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="user_length">
                            <label>
                                Show
                                <select name="user_length" id="user_length" aria-controls="example" class="form-select form-select-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_filter" id="user_filter">
                            <label>
                                Search:
                                <input type="search" class="form-control form-control-sm" placeholder aria-controls="search">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="datatable table-responsive datatable-inner ps">
                            <table class="table datatable-table align-items-center mb-0">
                                <thead class="datatable">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Ticket ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Ticket title</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Message</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Date</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">User</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Status</th>
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
@endsection
