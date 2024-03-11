<!-- Edit Address Modal -->
<div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAddressModalLabel">Edit Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form will be dynamically populated by JavaScript function populateEditAddressModal -->
                <form id="editAddressForm" action="" method="POST">
                    @csrf
                    @method('PUT')

                    <label for="edit_house_number">House Number:</label>
                    <input type="text" id="edit_house_number" name="house_number" class="pb-2 form-control" required>

                    <label for="edit_street_name" class="pt-3">Street Name:</label>
                    <input type="text" id="edit_street_name" name="street_name" class="form-control" required>

                    <label for="edit_postcode" class="pt-3">Postcode:</label>
                    <input type="text" id="edit_postcode" name="postcode" class="form-control" required>

                    <label for="edit_city" class="pt-3">City:</label>
                    <input type="text" id="edit_city" name="city" class="form-control" required>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

