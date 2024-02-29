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
            <li><a href="{{ url('/admin-panel/inventory') }}"><i class="fa-solid fa-warehouse"></i>Inventory</a></li>
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
                                <p>SOLVED TICKETS</p>
                                <h3>
                                    {{ $countTickets->where('status', 3)->count() }}
                                </h3>
                            </a>
                        @else
                            <p>SOLVED TICKETS</p>
                            <h3>
                                Get to solving!
                            </h3>
                        @endif
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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    scope="col">Ticket ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    scope="col">Ticket title</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    scope="col">Message</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    scope="col">Date</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    scope="col">User</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    scope="col">Admin</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    scope="col">Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    scope="col">Information</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    scope="col">Resolve</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr class="tickets-row" scope="row">
                                    <td class="id text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        scope="col">{{ $ticket->id }}</td>
                                    <td class="title text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        scope="col">{{ $ticket->title }}</td>
                                    <td class="information text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        scope="col">{{ $ticket->truncateInformation(5) }}...</td>
                                    <td class="created text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        scope="col">{{ $ticket->created_at }}</td>
                                    <td class="user text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        scope="col"><button type="button" class="btn btn-primary openModalButton"
                                            onclick="openUserInfoModal({{ $ticket->user_id }})"
                                            id="openModalButton">{{ $ticket->user_id }}</button>
                                    </td>
                                    <td class="admin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        scope="col">
                                        @if ($ticket->admin_id)
                                            <button type="button" class="btn btn-primary openModalButton"
                                                onclick="openUserInfoModal({{ $ticket->admin_id }})"
                                                id="openModalButton">Claimed: {{ $ticket->admin_id }}</button>
                                        @else
                                            <a href="{{ route('Ticket.claim', ['id' => $ticket->id]) }}"
                                                class="btn btn-secondary openModalButton" id="openModalButton">
                                                Claim?
                                            </a>
                                        @endif
                                    </td>
                                    <td class="status text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        scope="col">
                                        @if ($ticket->status == 1)
                                            Open
                                        @elseif ($ticket->status == 2)
                                            In Progress
                                        @elseif ($ticket->status == 3)
                                            Resolved
                                        @endif
                                    </td>

                                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        scope="col"><button type="button" class="btn btn-primary openModalButton"
                                            onclick="openInfoModal({{ $ticket->id }})" id="openModalButton"><i
                                                class="fa-solid fa-up-right-from-square"></i></button>
                                    </td>
                                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        scope="col">
                                        @if ($ticket->admin_id == auth()->user()->id)
                                            <button type="button" class="btn btn-secondary openModalButton"
                                                onclick="openResolveModal({{ $ticket->id }})"
                                                id="openModalButton">Resolve</button>
                                        @elseif ($ticket->admin_id)
                                            Claimed
                                        @else
                                            Unclaimed
                                        @endif
                                    </td>
                                    <!-- Button to trigger modal -->
                                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        scope="col">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal" id="openModalButton"
                                            onclick="DeleteItemId({{ $ticket->id }})">Delete</button>
                                    </td>
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
    </div>
</main>

    <!-- Delete Product Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form id="deleteForm" action="{{ route('product-delete', ['id' => ':product_id']) }}"
                        method="POST">
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
