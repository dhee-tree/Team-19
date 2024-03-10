@extends('layouts.base')
@section('title', 'Admin - Tickets')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css') }}">
@endsection

@section('content')
    <!-- sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <div class="logo-name"><span>Wood</span>Less</div>
        </a>
        <ul class="side-menu">
            <li><a href="{{ url('/admin-panel') }}"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin-panel/inventory') }}"><i class="fa-solid fa-store"></i>Inventory</a></li>
            <li><a href="{{ url('/admin-panel/orders') }}"><i class="fa-solid fa-truck-moving"></i>Orders</a></li>
            <li class="active"><a href="{{ url('/admin-panel/tickets') }}"><i class="fa-solid fa-message"></i>Tickets</a>
            </li>
            <li><a href="{{ url('/admin-panel/users') }}"><i class="fa-solid fa-user"></i>Users</a></li>
            <li><a href="{{ url('/admin-panel/warehouse') }}"><i class="fa-solid fa-warehouse"></i>Warehouse</a></li>
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
                <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                </svg>
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
                        <a href="{{ route('admin-panel.tickets', ['filter' => 'all']) }}" class="text-decoration-none">
                            <h3> {{ $countTickets->count() }}</h3>
                            <p>All Tickets</p>
                        </a>
                    </span>
                </li>
                <li>
                    <span class="info">
                        <a href="{{ route('admin-panel.tickets', ['filter' => 'current']) }}" class="text-decoration-none">
                            <h3> {{ $countTickets->where('admin_id', auth()->user()->id)->count() }}
                            </h3>
                            <p>Unresolved tickets</p>
                        </a>
                    </span>
                </li>
                <li>
                    @php
                        $hasSolvedTickets = $tickets->contains('status', 3);
                    @endphp
                    <span class="info">
                        @if ($hasSolvedTickets)
                            <a href="{{ route('admin-panel.tickets', ['filter' => 'solved']) }}"
                                class="text-decoration-none">
                                <h3>
                                    {{ $countTickets->where('status', 3)->count() }}
                                </h3>
                            </a>
                        @else
                            <h3>
                                Get to solving!
                            </h3>
                        @endif

                        <p>Solved tickets</p>
                    </span>
                </li>
            </ul>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="length_dropdown">
                        <label>
                            Show
                            <select name="length" id="length" aria-controls="example"
                                class="form-select form-select-sm">
                                <option value="1000">Select Value</option>
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
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_filter" id="filter">
                        <label>
                            Search:
                            <input type="search" id="search" class="form-control form-control-sm" placeholder
                                aria-controls="search">
                        </label>
                    </div>
                </div>

            </div>
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class="fa-solid fa-ticket"></i>
                        <h3>Tickets</h3>
                        <i class="fa-solid fa-filter"></i>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    scope="col">Ticket ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    scope="col">Ticket title</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    scope="col">Message</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    scope="col">Date</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    scope="col">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr class="ticket-row" scope="row">
                                    <td class="id">{{ $ticket->id }}</td>
                                    <td class="title">{{ $ticket->title }}</td>
                                    <td class="information">{{ $ticket->truncateInformation(5) }}...</td>
                                    <td class="created">{{ $ticket->created_at }}</td>
                                    <td class="status">
                                        @if ($ticket->status == 1)
                                            Open
                                        @elseif ($ticket->status == 2)
                                            In Progress
                                        @elseif ($ticket->status == 3)
                                            Resolved
                                        @endif
                                    </td>
                                    <td class="admin" style="display:none">{{ $ticket->admin_id }}</td>
                                    <td class="user" style="display:none">{{ $ticket->user_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @if (!$tickets->isEmpty())
                <!-- Pagination Links -->
                @if ($tickets->hasPages())
                    {{ $tickets->links() }}
                @endif
            @else
                <p>No tickets found.</p>
            @endif
        </main>

    </div>

    <!-- Delete Product Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" action="{{ route('ticket-delete', ['id' => ':ticket_id']) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_input" id="id_input" value="">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin-panel/tickets.js') }}"></script>
@endsection
