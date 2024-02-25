@extends('layouts.base')
@section('title', 'Admin - Users')

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
                <div class="content">
                    <h1 class="page-title">Users</h1>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="dataTables_length" id="user_length">
                            <label>
                                Show
                                <select name="user_length" id="user_length" aria-controls="example"
                                    class="form-select form-select-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="dataTables_filter" id="user_filter">
                            <label>
                                Search:
                                <input type="search" class="form-control form-control-sm" placeholder
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
                                        <tr scope="row">
                                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">{{ $user->id }}</td>
                                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">{{ $user->first_name }}</td>
                                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">{{ $user->last_name }}</td>
                                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">{{ $user->email }}</td>
                                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
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
