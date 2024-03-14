@extends('layouts.admin-panel-base')
@section('title', 'Admin - Orders')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css">
@endsection

@section('main-content')

            <div class="header">
                <div class="left">
                    <h1>Orders</h1>
                </div>
            </div>
            <div class="row">
                <!--
                <div class="col-md-6">
                    <div class="dataTables_length" id="length_dropdown">
                        <label>
                            Show
                            <select name="length" id="length" aria-controls="example"
                                class="form-select form-select-sm">
                                <option value="0">Select Value</option>
                                <option value="5" {{ request()->input('length') == 5 ? 'selected' : '' }}>5
                                </option>
                                <option value="10" {{ request()->input('length') == 10 ? 'selected' : '' }}>10
                                </option>
                                <option value="25" {{ request()->input('length') == 25 ? 'selected' : '' }}>25
                                </option>
                                <option value="50" {{ request()->input('length') == 50 ? 'selected' : '' }}>50
                                </option>
                                <option value="100" {{ request()->input('length') == 100 ? 'selected' : '' }}>100
                                </option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="dataTables_filter" id="filter">
                        <label>
                            Search:
                            <input type="search" id="search" class="form-control form-control-sm" placeholder
                                aria-controls="search">
                        </label>
                    </div>
                </div>
                -->
            </div>

            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class="fa-solid fa-user"></i>
                        <h3>Orders</h3>
                    </div>
                    <div class="table_filters">
                        <div class="dataTables_length" id="length_dropdown">
                            <label>
                                Show:
                                <select name="length" id="length" aria-controls="example"
                                    class="form-select form-select-sm">
                                    <option value="0">Select Value</option>
                                    <option value="5" {{ request()->input('length') == 5 ? 'selected' : '' }}>5
                                    </option>
                                    <option value="10" {{ request()->input('length') == 10 ? 'selected' : '' }}>10
                                    </option>
                                    <option value="25" {{ request()->input('length') == 25 ? 'selected' : '' }}>25
                                    </option>
                                    <option value="50" {{ request()->input('length') == 50 ? 'selected' : '' }}>50
                                    </option>
                                    <option value="100" {{ request()->input('length') == 100 ? 'selected' : '' }}>100
                                    </option>
                                </select>
                            </label>
                        </div>
                        <div class="dataTables_filter" id="filter">
                            <label>
                                Search:
                                <input type="search" id="search" class="form-control form-control-sm" placeholder
                                    aria-controls="search">
                            </label>
                        </div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Order Date</th>
                                <th>Cost</th>
                                <th>Estimated Delivery</th>
                                <th>User</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="order-row" scope="row">
                                    <td class="id">{{ $order->id }}</td>
                                    <td class="id">{{ $order->created_at }}</td>
                                    <td class="id">{{ $order->products->sum('cost') }}</td>
                                    <td>
                                        @if ($order->status->id == 3)
                                            {{ $order->created_at->addDays(14)->format('Y-m-d') }}
                                            ({{ now()->diffInDays($order->created_at->addDays(14)) }} days)
                                        @elseif ($order->status->id == 4)
                                            {{ $order->updated_at->addDays(14)->format('Y-m-d') }}
                                            ({{ now()->diffInDays($order->updated_at->addDays(14)) }} days)
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $order->user->id }}</td>
                                    <td>{{ $order->status->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin-panel/orders.js') }}"></script>
    <script src="{{ asset('js/admin-panel.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTable.js"></script>
@endsection
