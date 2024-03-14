@extends('layouts.admin-panel-base')
@section('title', 'Admin - Tickets')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css') }}">
@endsection

@section('main-content')
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
            <!--
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
            -->

            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class="fa-solid fa-ticket"></i>
                        <h3>Tickets</h3>
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
