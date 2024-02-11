@extends('layouts.base')
@section('title', 'Admin - Users')

@section('style')
<link rel="stylesheet" href="{{ asset('css/admin-panel.css') }}">
@endsection



@section('content')

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <!-- Content for sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">Admin Panel</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="{{url('admin-panel')}}" class="sidebar-link">
                            <i class="fa-solid fa-house pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/admin-panel/orders')}}" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Orders
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#customers" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-solid fa-user pe-2"></i>
                            Customers
                        </a>
                        <ul id="customers" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{url('/admin-panel/users')}}" class="sidebar-link">User display</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{url('/admin-panel/tickets')}}" class="sidebar-link">Support tickets</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/admin-panel/inventory')}}" class="sidebar-link">
                            <i class="fa-regular fa-store pe-2"></i>
                            Inventory
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <div class="container-fluid ">
                <div class="content">
                    <h1 class="page-title">Users</h1>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="user_length">
                            <label>
                                Show
                                <select name="user_length" id="user_length" aria-controls="example" class="form-select form-select-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_filter" id="user_filter">
                            <label>
                                Search:
                                <input type="search" class="form-control form-control-sm" placeholder aria-controls="search">
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">First Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Last Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Phone Number</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Information</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Edit</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="datatable-body">
                                    @foreach ($users as $user)
                                    <tr scope="row">
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">{{ $user->id }}</td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">{{ $user->first_name }}</td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">{{ $user->last_name }}</td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">{{ $user->email }}</td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">{{ $user->phone_number }}</td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col"><button type="button" class="btn btn-primary openModalButton" onclick="openInfoModal({{ $user->id }})" id="openModalButton"><i class="fa-solid fa-up-right-from-square"></i></button></td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col"><button type="button" class="btn btn-secondary openModalButton" onclick="openEditModal({{ $user->id }})" id="openModalButton">Edit</button></td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col"><button type="button" class="btn btn-danger">Delete</button></td>
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
</body>
@endsection


@section('js')
<!-- JavaScript to handle modal opening -->
<script>
    function openInfoModal(userId) {
        // Disable all buttons with the specified class to disable multiple spam
        var buttons = document.querySelectorAll(".openModalButton");
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].disabled = true;
        }

        $.get('/admin-panel/user-info/' + userId, function(data) {
            $('body').append(data);
            var modal = $('#ExtraModal');
            var container = $('#ExtraModals');
            modal.modal('show'); // Show the modal after content is appended

            // Flag to determine if the ExtraModal was explicitly closed by the user
            var extraModalClosed = false;


            // Set the flag when the close button on the ExtraModal is clicked
            modal.find('#btn-close').on('click', function() {
                // Re-enable all buttons with the specified class when the modal is closed
                var buttons = document.querySelectorAll(".openModalButton");
                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].disabled = false;
                }

                container.remove();

                // Get the modal backdrop element
                var backdrop = document.querySelector('.modal-backdrop');

                // Check if the backdrop element exists
                if (backdrop) {
                    // Remove the backdrop element from the DOM
                    backdrop.parentNode.removeChild(backdrop);
                }
            });

            // Event listener for clicking outside the modal
            container.on('click', function(e) {
                // Check if the click is outside the modal and not on any elements within the modal

                if ($(e.target).hasClass('modal')) {
                    // Re-enable all buttons with the specified class when the modal is closed
                    var buttons = document.querySelectorAll(".openModalButton");
                    for (var i = 0; i < buttons.length; i++) {
                        buttons[i].disabled = false;
                    }

                    container.remove();
                    // Get the modal backdrop element
                    var backdrop = document.querySelector('.modal-backdrop');

                    // Check if the backdrop element exists
                    if (backdrop) {
                        // Remove the backdrop element from the DOM
                        backdrop.parentNode.removeChild(backdrop);
                    }
                }
            });
        });


    }
</script>
@endsection