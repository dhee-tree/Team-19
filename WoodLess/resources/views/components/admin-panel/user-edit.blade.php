<!-- User update modal -->
<div class="modal fade" id="extraModal" tabindex="-1" aria-labelledby="extraModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="extraModalLabel">Edit User: {{ $user->id }} Details </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editUserForm" action="{{ route('user-store', ['id' => $user->id]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="first_name">First Name (up to 60 characters):</label>
                    <input type="text" name="first_name" id="first_name"
                        class="pb-2 form-control @error('first_name') is-invalid @enderror"
                        value="{{ old('first_name', $user->first_name) }}" maxlength="60" required autofocus>

                    <label for="last_name" class="pt-3">Last Name (up to 60 characters):</label>
                    <input type="text" name="last_name" id="last_name"
                        class="form-control @error('last_name') is-invalid @enderror"
                        value="{{ old('last_name', $user->last_name) }}" maxlength="60" required>

                    <label for="email" class="pt-3">Email (up to 255 characters):</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}" maxlength="255" required>

                    <label for="phone_number" class="pt-3">Phone Number (up to 15 digits):</label>
                    <input type="tel" name="phone_number" id="phone_number"
                        class="form-control @error('phone_number') is-invalid @enderror"
                        value="{{ old('phone_number', $user->phone_number) }}" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>

                    <div class="form-check pt-3">
                        <input type="checkbox" name="is_admin" id="is_admin" class="form-check-input"
                            {{ $user->is_admin ? 'checked' : '' }}>
                        <label for="is_admin" class="form-check-label">Set as Admin</label>
                    </div>

                    <label for="addresses" class="pt-3">Addresses:</label>
                    <select name="address_selector" id="addresses" class="form-control">
                        <option value="" selected>Select Address</option>
                        @foreach ($user->addresses as $address)
                            <option value="{{ $address->id }}">
                                {{ $address->house_number . ' ' . $address->street_name }}</option>
                        @endforeach
                    </select>
                    <div id="addressInputs">
                        <!-- Address fields will be dynamically added here -->
                        @foreach ($user->addresses as $address)
                            <div class="address-fields" id="addressFields_{{ $address->id }}" style="display: none;">
                                <div class="form-group">
                                    <label for="house_number">House Number:</label>
                                    <input type="text" name="addresses[{{ $address->id }}][house_number]"
                                        class="form-control" value="{{ $address->house_number }}" maxlength="5">
                                </div>
                                <div class="form-group">
                                    <label for="street_name">Street Name:</label>
                                    <input type="text" name="addresses[{{ $address->id }}][street_name]"
                                        class="form-control" value="{{ $address->street_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="postcode">Postcode:</label>
                                    <input type="text" name="addresses[{{ $address->id }}][postcode]"
                                        class="form-control" value="{{ $address->postcode }}">
                                </div>
                                <div class="form-group">
                                    <label for="city">City:</label>
                                    <input type="text" name="addresses[{{ $address->id }}][city]"
                                        class="form-control" value="{{ $address->city }}" maxlength="60">
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" form="editUserForm">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    document.getElementById('addresses').addEventListener('change', function() {
        var addressId = this.value;
        var addressInputs = document.getElementById('addressInputs');
        if (addressId) {
            // Hide all previous address fields
            var previousAddressFields = document.querySelectorAll('.address-fields');
            previousAddressFields.forEach(function(field) {
                field.style.display = 'none';
            });

            // Show the selected address fields
            var selectedAddressFields = document.getElementById('addressFields_' + addressId);
            if (selectedAddressFields) {
                selectedAddressFields.style.display = 'block';
            }
        } else {
            // If no address is selected, hide all address fields
            var allAddressFields = document.querySelectorAll('.address-fields');
            allAddressFields.forEach(function(field) {
                field.style.display = 'none';
            });
        }
    });
</script>
