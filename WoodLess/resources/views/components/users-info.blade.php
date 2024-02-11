<div class="modal fade" id="ExtraModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <!-- Is responsible for expanding the fields for the item in the inventory management system -->

    <div class="modal-dialog modal-dialog-centered resizable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ExtraModalTitle">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <!-- Assuming $user->image is a URL to the image -->
                    @if($user->image)
                    <img src="{{$user->image}}" alt="User Image">
                    @else
                    <!-- Default image if no user image available -->
                    <img src="https://placehold.co/300x350" alt="Default User Image">
                    @endif
                    <!-- Display the user ID underneath the image with margin -->
                    <p class="mt-3 mb-0">User ID: {{$user->id}}</p>
                    <!-- Display the role underneath the image without a title -->
                    <p><strong>{{$user->is_admin ? 'Admin' : 'Customer'}}</strong></p>
                    <!-- Thin line -->
                    <hr>
                </div>
                <div class="row text-center">
                    <div class="col-md-6">
                        <p><strong>First name</strong><br>{{$user->first_name}}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Last Name</strong><br>{{$user->last_name}}</p>

                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-6">
                        <p><strong>Email</strong><br>{{$user->email}}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Email verified</strong><br>
                            @if($user->email_verified_at)
                            <span style="color: green;">&#10004;</span>
                            @else
                            <span style="color: red;">&#10008;</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Phone number</strong><br>{{$user->phone_number}}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Phone number</strong><br>{{$user->phone_number}}</p>
                    </div>
                    <div class="">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary me-3" data-bs-target="#cardsModal" data-bs-toggle="modal" data-bs-dismiss="modal">Cards</button>
                            <button class="btn btn-primary ms-3" data-bs-target="#addressesModal" data-bs-toggle="modal" data-bs-dismiss="modal">Addresses</button>
                        </div>
                    </div>

                </div>
                <br>
                <p class="text-center"><strong>Created</strong> {{date('F j, Y', strtotime($user->created_at))}}</p>
            </div>
            <div class="modal-footer">
                <div class="col-auto">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="cardsModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Hide this modal and show the first with the button below.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#ExtraModal" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-primary" data-bs-toggle="modal" href="#ExtraModal" role="button">Return</a>



<div class="modal fade" id="cardsModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Hide this modal and show the first with the button below.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#ExtraModal" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-primary" data-bs-toggle="modal" href="#ExtraModal" role="button">Return</a>