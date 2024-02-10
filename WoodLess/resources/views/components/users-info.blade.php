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
                        <img src="{{$user->image}}" alt="User Image" height="350" width="300">
                    @else
                        <!-- Default image if no user image available -->
                        <img src="https://placehold.co/300x350.png" alt="Default User Image" height="350" width="300">
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
                        <p><strong>Email:</strong><br>{{$user->email}}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Email verified:</strong> 
                            @if($user->email_verified_at)
                                <span style="color: green;">&#10004;</span>
                            @else
                                <span style="color: red;">&#10008;</span>
                            @endif
                        </p>
                    </div>
                </div>
                <p class="text-center"><strong>Created</strong> {{date('F j, Y', strtotime($user->created_at))}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
