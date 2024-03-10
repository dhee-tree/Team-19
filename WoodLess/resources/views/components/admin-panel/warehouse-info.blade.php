<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="extraModalLabel" aria-hidden="true">
    <!-- Is responsible for expanding the fields for the item in the inventory managment system -->

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="extraModalLabel">Warehouse Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">

                    <p class="mt-3 mb-0">Warehouse ID: {{ $warehouse->id }}</p>
                    <!-- Display the role underneath the image without a title -->
                    <h5><strong>Warehouse City: {{ $warehouse->city }}</strong></h5>
                    <!-- Thin line -->
                    <hr>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <p><strong>address 1: </strong><br>{{ $warehouse->address }}</p>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-md-12">
                        <p><strong>address 2: </strong><br>{{ $warehouse->address_2 }}</p>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-md-6">
                        <p><strong>Postcode: </strong><br>{{ $warehouse->postcode }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>City: </strong><br>{{ $warehouse->city }}</p>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-md-6">
                        <p><strong>Created At: </strong><br>{{ $warehouse->created_at }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Updated At: </strong><br>{{ $warehouse->updated_at }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <div class="row">
                        <div class="col justify-content-left">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteModal"
                                onclick="DeleteItemId({{ $warehouse->id }}, 'warehouse')
                            "
                                data-bs-dismiss="modal">Delete</button>
                        </div>
                        <div class="col-auto order-lg-last">
                            <button type="button" id="btn-close" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
