<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="extraModalLabel" aria-hidden="true">
    <!-- Is responsible for expanding the fields for the item in the inventory managment system -->

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="extraModalLabel">Category {{ $category->category }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-footer">
                <div class="container">
                    <div class="row">
                        <div class="col justify-content-left">

                            <!-- Button to trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteModal"
                                onclick="DeleteItemId({{ $category->id }}, 'category')
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
