@extends('layouts.base')
@section('title', 'Admin - Inventory')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css') }}">
@endsection

@php
    // Convert the $products array into a JSON string
    $productsJson = json_encode($products);
    // Convert the $products array into a JSON string
    $productsJson = json_encode($products);
@endphp


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
                    <h1 class="page-title">Products</h1>
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
                    <div class="col-sm-12 col-md-3">
                        <button type="button" class="btn btn-primary openModalButton" onclick="openAddModal()"
                            id="openModalButton">Create Product <i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="datatable table-responsive datatable-inner ps">
                            <table class="table datatable-table align-items-center mb-0">
                                <thead class="datatable">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">Product ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">Product title</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">Description</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">Quantity</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">Categories</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">Expand</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">Edit</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="datatable-body">
                                    @foreach ($products as $product)
                                        <tr class="product-row" scope="row">
                                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">{{ $product->id }}</td>
                                            <td class="title text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">{{ $product->title }}</td>
                                            <td class="description text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">{{ $product->truncateDescription(5) }}...</td>
                                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">{{ $product->stockAmount() }}...</td>
                                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">
                                                @if ($product->categories->isNotEmpty())
                                                    {{ $product->categories->first()->category }}...
                                                @else
                                                    No category found
                                                @endif
                                            </td>
                                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col"><button type="button"
                                                    class="btn btn-primary openModalButton"
                                                    onclick="openInfoModal({{ $product->id }})" id="openModalButton"><i
                                                        class="fa-solid fa-up-right-from-square"></i></button></td>
                                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col"><button type="button"
                                                    class="btn btn-secondary openModalButton"
                                                    onclick="openEditModal({{ $product->id }})"
                                                    id="openModalButton">Edit</button>
                                            </td>
                                            <!-- Button to trigger modal -->
                                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                scope="col">
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#confirmDeleteModal"
                                                    onclick="DeleteItemId({{ $product->id }})">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                @if ($products->hasPages())
                    <!-- Pagination Links -->
                    {{ $products->links() }}
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
    <script src="{{ asset('js/admin-panel/inventory.js') }}"></script>
@endsection
