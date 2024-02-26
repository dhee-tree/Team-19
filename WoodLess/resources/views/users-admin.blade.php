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
        <div class="main">
            <div class="container-fluid px-5 py-4">
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
