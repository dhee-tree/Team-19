{{-- resources/views/components/add-address-modal.blade.php --}}

<div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addAddressForm" action="{{ route('address.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addAddressModalLabel">Add New Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Form fields for new address details --}}
                    <div class="mb-3">
                        <label for="new_house_number" class="form-label">House Number:</label>
                        <input type="text" class="form-control" id="new_house_number" name="house_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_street_name" class="form-label">Street Name:</label>
                        <input type="text" class="form-control" id="new_street_name" name="street_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_postcode" class="form-label">Postcode:</label>
                        <input type="text" class="form-control" id="new_postcode" name="postcode" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_city" class="form-label">City:</label>
                        <input type="text" class="form-control" id="new_city" name="city" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Address</button>
                </div>
            </form>
        </div>
    </div>
</div>
