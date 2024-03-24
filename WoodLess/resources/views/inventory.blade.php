@extends('layouts.admin-panel-base')
@section('title', 'Admin - Inventory')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css') }}">
@endsection

@section('main-content')
    <div class="header">
        <div class="left">
            <h1>Inventory</h1>
        </div>
    </div>

    <div class="bottom-data">
        <div class="orders">
            <div class="header">
                <i class="fa-solid fa-user"></i>
                <h3>Products</h3>
                <button type="button" class="btn btn-primary openModalButton" onclick="openAddModal()"
                    id="openModalButton">Create Product <i class="fa-solid fa-plus"></i></button>
            </div>
            <div class="table_filters">
                <div class="dataTables_length" id="length_dropdown">
                    <label>
                        Show:
                        <select name="length" id="length" aria-controls="example" class="form-select form-select-sm">
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
                        <th>Product ID</th>
                        <th>Product title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Categories</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="product-row">
                            <td class="id">{{ $product->id }}</td>
                            <td class="title">{{ $product->title }}</td>
                            <td class="description">{{ $product->truncateDescription(5) }}...</td>
                            <td>{{ $product->stockAmount() }}...</td>
                            <td>
                                @if ($product->categories->isNotEmpty())
                                    {{ $product->categories->first()->category }}...
                                @else
                                    No category found
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if ($products->hasPages())
        <!-- Pagination Links -->
        {{ $products->links() }}
    @else
        <p>No extra found.</p>
    @endif

    <!-- Delete Product Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
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
                    <form id="deleteForm" action="{{ route('product-delete', ['id' => ':product_id']) }}" method="POST">
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
    <script src="{{ asset('js/admin-panel.js') }}"></script>
    <script src="{{ asset('js/admin-panel/inventory.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTable.js"></script>
@endsection
