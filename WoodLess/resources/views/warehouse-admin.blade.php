@extends('layouts.admin-panel-base')
@section('title', 'Admin - Warehouse')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-panel.css') }}">
@endsection

@section('main-content')

                <div class="header">
                    <div class="left">
                        <h1>Warehouses</h1>
                    </div>
                </div>

                <!-- Warehouses table -->
                <div class="bottom-data">
                    <div class="orders">
                        <div class="header">
                            <i class='bx bx-receipt'></i>
                            <h3>Warehouses</h3>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#createWarehouseModal">Create Warehouse</button>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Address</th>
                                    <th>Postcode</th>
                                    <th>City</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($warehouses as $warehouse)
                                    <tr class="warehouse-row">
                                        <td>{{ $warehouse->id }}</td>
                                        <td>{{ $warehouse->address }}</td>
                                        <td>{{ $warehouse->postcode }}</td>
                                        <td>{{ $warehouse->city }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="header">
                    <div class="left">
                        <h1>Categories</h1>
                    </div>
                </div>

                <!-- Warehouses table -->
                <div class="bottom-data">
                    <div class="orders">
                        <div class="header">
                            <i class='bx bx-receipt'></i>
                            <h3>Categories</h3>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#createCategoryModal">Create Category</button>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr class="category-row">
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->category }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>

        <div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog"
            aria-labelledby="createCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="createCategoryForm" action="{{ route('admin.category-create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="createCategoryModalLabel">Create Category</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="category" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="category" name="category" required>
                            </div>
                            <div class="mb-3">
                                <label for="images" class="form-label">Images</label>
                                <input type="file" class="form-control" id="images" name="images"
                                    accept="image/*" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                            <input type="hidden" name="id_input" id="id_input" value="">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="modal fade" id="createWarehouseModal" tabindex="-1" role="dialog"
            aria-labelledby="createWarehouseModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="createCategoryForm" action="{{ route('admin.warehouse-create') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createWarehouseModalLabel">Confirm Warehouse</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="mb-3">
                                <label for="address_2" class="form-label">Address 2</label>
                                <input type="text" class="form-control" id="address_2" name="address_2">
                            </div>
                            <div class="mb-3">
                                <label for="postcode" class="form-label">Postcode</label>
                                <input type="text" class="form-control" id="postcode" name="postcode" required>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <input type="hidden" name="id_input" id="id_input" value="">
                            <button type="submit" class="btn btn-primary">Create</button>

                        </div>
                    </div>
                </form>
            </div>
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
                        <form id="deleteForm" action="" method="POST">
                            @csrf
                            <input type="hidden" name="id_input" id="id_input" value="">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('js')
    <script src="{{ asset('js/admin-panel.js') }}"></script>
    <script src="{{ asset('js/admin-panel/warehousecategories.js') }}"></script>

@endsection
