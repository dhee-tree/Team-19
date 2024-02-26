@extends('layouts.base')
@section('title', 'Admin - Tickets')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css') }}">
@endsection

@section('content')

    <div class="wrapper">
        <aside id="sidebar">
            <!-- Content for sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">Admin Panel</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="{{ url('admin-panel') }}" class="sidebar-link">
                            <i class="fa-solid fa-house pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ url('/admin-panel/orders') }}" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Orders
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#customers"
                            data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-solid fa-user pe-2"></i>
                            Customers
                        </a>
                        <ul id="customers" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{ url('/admin-panel/users') }}" class="sidebar-link">User display</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ url('/admin-panel/tickets') }}" class="sidebar-link">Support tickets</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ url('/admin-panel/inventory') }}" class="sidebar-link">
                            <i class="fa-regular fa-store pe-2"></i>
                            Inventory
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
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
                    <div class="col-sm-12 col-md-5">
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
                                entries
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="dataTables_filter" id="filter">
                            <label>
                                Search:
                                <input type="search" id="search" class="form-control form-control-sm" placeholder
                                    aria-controls="search">
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
                                <tbody class="datatable-body">
                                    <tr scope="row">
                                        @foreach ($tickets as $ticket)
                                    <tr class="product-row" scope="row">
                                        <td class="id text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">{{ $ticket->id }}</td>
                                        <td class="title text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">{{ $ticket->title }}</td>
                                        <td class="description text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">{{ $ticket->truncateInformation(5) }}...</td>
                                        <td class="contact text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">{{ $ticket->created_at }}</td>
                                        <td class="contact text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col"><button type="button" class="btn btn-primary openModalButton"
                                                onclick="openUserInfoModal({{ $ticket->user_id }})"
                                                id="openModalButton">{{ $ticket->user_id }}</button>
                                        </td>
                                        <td class="contact text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
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
                                            @if ($ticket->status == '1')
                                                Open
                                            @elseif ($ticket->status->status == '2')
                                                In Progress
                                            @else
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
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @if ($tickets->hasPages())
                    <!-- Pagination Links -->
                    {{ $tickets->links() }}
                @else
                    <p>No extra found.</p>
                @endif
            </div>
        </div>
    </div>

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
