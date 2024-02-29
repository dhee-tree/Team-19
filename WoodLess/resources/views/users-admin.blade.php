@extends('layouts.base')
@section('title', 'Admin - Users')

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
            <li><a href="{{url('/admin-panel')}}"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="{{url('/admin-panel/inventory')}}"><i class="fa-solid fa-warehouse"></i>Inventory</a></li>
            <li><a href="{{url('/admin-panel/orders')}}"><i class="fa-solid fa-truck-moving"></i>Orders</a></li>
            <li><a href="{{url('/admin-panel/tickets')}}"><i class="fa-solid fa-message"></i>Tickets</a></li>
            <li class="active"><a href="{{url('/admin-panel/users')}}"><i class="fa-solid fa-user"></i>Users</a></li>
            <li><a href="{{url('/admin-panel/warehouse')}}"><i class="fa-solid fa-warehouse"></i>Warehouse</a></li>
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
            <div class="container-fluid px-5 py-4">
                <div class="content">
                    <h1 class="page-title">Users</h1>
                </div>
                <div class="row">
                    <div class="col-md-3">
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
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="dataTables_filter" id="filter">
                            <label>
                                Search:
                                <input type="search" id="search" class="form-control form-control-sm" placeholder
                                    aria-controls="search">
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary openModalButton" onclick="openAddModal()"
                            id="openModalButton">Create User <i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="datatable table-responsive datatable-inner ps">
                            <table class="table datatable-table align-items-center mb-0">
                                <thead class="datatable">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">First Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">Last Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">Phone Number</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">Information</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">Edit</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="datatable-body">
                                    @foreach ($users as $user)
                                        <tr class="user-row" scope="row">
                                            <td class="id text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">{{ $user->id }}</td>
                                            <td class="first text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">{{ $user->first_name }}</td>
                                            <td class="last text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">{{ $user->last_name }}</td>
                                            <td class="email text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">{{ $user->email }}</td>
                                            <td class="phone text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">{{ $user->phone_number }}</td>
                                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col"><button type="button"
                                                    class="btn btn-primary openModalButton"
                                                    onclick="openInfoModal({{ $user->id }})" id="openModalButton"><i
                                                        class="fa-solid fa-up-right-from-square"></i></button></td>
                                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col"><button type="button"
                                                    class="btn btn-secondary openModalButton"
                                                    onclick="openEditModal({{ $user->id }})"
                                                    id="openModalButton">Edit</button></td>
                                            <!-- Button to trigger modal -->
                                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#confirmDeleteModal"
                                                    onclick="DeleteItemId({{ $user->id }})">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @if ($users->hasPages())
                    <!-- Pagination Links -->
                    {{ $users->links() }}
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
                    <form id="deleteForm" action="{{ route('user-delete', ['id' => ':user_id']) }}" method="POST">
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
    <!-- JavaScript for the user panels -->
    <script src="{{ asset('js/admin-panel/users.js') }}"></script>

@endsection
