<!-- User update modal -->
<div class="modal fade" id="extraModal" tabindex="-1" aria-labelledby="extraModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="extraModalLabel">Create User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addUserForm" action="{{ route('user-store', ['id' => -1]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="first_name">First Name (up to 60 characters):</label>
                    <input type="text" name="first_name" id="first_name"
                        class="pb-2 form-control @error('first_name') is-invalid @enderror" value="Input First Name"
                        maxlength="60" required autofocus>

                    <label for="last_name" class="pt-3">Last Name (up to 60 characters):</label>
                    <input type="text" name="last_name" id="last_name"
                        class="form-control @error('last_name') is-invalid @enderror" value="Input Last Name"
                        maxlength="60" required>

                    <label for="email" class="pt-3">Email (up to 255 characters):</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" value="Input email address"
                        maxlength="255" required>

                    <label for="phone_number" class="pt-3">Phone Number (up to 15 digits):</label>
                    <input type="tel" name="phone_number" id="phone_number"
                        class="form-control @error('phone_number') is-invalid @enderror" value="Input phone Number"
                        maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>

                    <label for="password" class="pt-3">password (up to 255 characters):</label>
                    <input type="text" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" value="Input temperory Paassword"
                        maxlength="255" required>

                    <div class="form-check pt-3">
                        <input type="checkbox" name="is_admin" id="is_admin" class="form-check-input">
                        <label for="is_admin" class="form-check-label">Set as Admin</label>
                    </div>

                    <label for="addresses" class="pt-3">Addresses:</label>
                    <select name="address_selector" id="addresses" class="form-control">
                        <option value="" selected>Select Address</option>

                    </select>
                    <div id="addressInputs">

                    </div>

                    <button type="button" class="btn btn-primary mt-3" id="addAddressBtn">Add Address</button>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" form="addUserForm">Save</button>
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

<script>
    // JavaScript to handle adding address dynamically
    document.getElementById("addAddressBtn").addEventListener("click", function() {
        var addressSelector = document.getElementById("addresses");
        var addressInputs = document.getElementById("addressInputs");

        // Create new address fields
        var newAddressId = Date.now(); // Unique ID for the new address
        var newAddressFields = `
            <div class="address-fields" id="addressFields_${newAddressId}">
                <div class="form-group">
                    <label for="house_number">House Number:</label>
                    <input type="text" name="addresses[${newAddressId}][house_number]"
                        class="form-control" maxlength="5">
                </div>
                <div class="form-group">
                    <label for="street_name">Street Name:</label>
                    <input type="text" name="addresses[${newAddressId}][street_name]"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="postcode">Postcode:</label>
                    <input type="text" name="addresses[${newAddressId}][postcode]"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" name="addresses[${newAddressId}][city]"
                        class="form-control" maxlength="60">
                </div>
            </div>`;

        // Append new address fields to the addressInputs div
        addressInputs.insertAdjacentHTML("beforeend", newAddressFields);

        // Add new address option to the addressSelector dropdown
        var newOption = document.createElement("option");
        newOption.value = newAddressId;
        newOption.textContent = "New Address";
        addressSelector.appendChild(newOption);
    });
</script>
