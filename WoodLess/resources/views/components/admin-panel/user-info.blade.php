<div id="infoModals">
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <!-- Is responsible for expanding the fields for the item in the inventory management system -->

        <div class="modal-dialog modal-dialog-centered resizable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ExtraModalTitle">User Details</h5>
                    <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <!-- Assuming $user->image is a URL to the image -->
                        @if ($user->image)
                            <img src="{{ $user->image }}" alt="User Image">
                        @else
                            <!-- Default image if no user image available -->
                            <img src="https://placehold.co/300x350" alt="Default User Image">
                        @endif
                        <!-- Display the user ID underneath the image with margin -->
                        <p class="mt-3 mb-0">User ID: {{ $user->id }}</p>
                        <!-- Display the role underneath the image without a title -->
                        <h5><strong>
                                {{ $user->access_level == 1
                                    ? 'Customer'
                                    : ($user->access_level == 2
                                        ? 'Moderator'
                                        : ($user->access_level == 3
                                            ? 'Admin'
                                            : ($user->access_level == 4
                                                ? 'Super Admin'
                                                : 'Unknown'))) }}
                            </strong></h5>
                        <!-- Thin line -->
                        <hr>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <p><strong>First name</strong><br>{{ $user->first_name }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Last Name</strong><br>{{ $user->last_name }}</p>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <p><strong>Email</strong><br>{{ $user->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Email verified</strong><br>
                                @if ($user->email_verified_at)
                                    <span style="color: green;">&#10004;</span>
                                @else
                                    <span style="color: red;">&#10008;</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row text-center">

                        <div class="col-md-6">
                            <p><strong>Phone number</strong><br>{{ $user->phone_number }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>City</strong><br>{{ $user->addresses->isEmpty() ? 'N/A' : $user->addresses->first()->city }}
                            </p>
                        </div>

                    </div>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <p><strong>Addresses: </strong><br> <button class="btn btn-warning"
                                    data-bs-target="#AddressesModal" data-bs-toggle="modal"
                                    data-bs-dismiss="modal">Address</button></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Cards: </strong><br><button class="btn btn-warning" data-bs-target="#CardsModal"
                                    data-bs-toggle="modal" data-bs-dismiss="modal">Card</button></p>
                        </div>
                    </div>
                    <br>
                    <p class="text-center"><strong>Created</strong> {{ date('F j, Y', strtotime($user->created_at)) }}
                    </p>
                </div>
                <div class="modal-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col justify-content-left">
                                <button class="btn btn-primary" data-bs-target="#editModal" data-bs-toggle="modal"
                                    data-bs-dismiss="modal">Edit</button>
                                <button type="button" class="btn btn-danger openModalButton" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal" onclick="DeleteItemId({{ $user->id }})"
                                    id="btn-close" data-bs-dismiss="modal">Delete</button>
                            </div>
                            <div class="col-auto order-lg-last">
                                <button id="btn-close" type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="CardsModal" aria-hidden="true" aria-labelledby="CardsModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CardsModal">
                        @if (count($user->cards) > 1)
                            Cards
                        @else
                            Card
                        @endif
                    </h5>
                </div>
                <div class="modal-body">
                    @foreach ($user->cards as $index => $cards)
                        <h5><strong>Card ({{ $index + 1 }})</strong></h5>
                        <p>
                            <strong>Card number</strong>
                            @foreach (array_chunk(str_split($cards->card_number), 4) as $chunk)
                                {{ implode('', $chunk) }}
                            @endforeach
                            <br>
                            <strong>Expiry date</strong>
                            {{ $cards->expiry_date }}
                        </p>
                        <p class="fs-6">{{ $cards->house_number }} {{ $cards->street_name }}<br>
                            {{ $cards->city }}, {{ $cards->postcode }}
                        </p>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#infoModal" data-bs-toggle="modal"
                        data-bs-dismiss="modal">Back to details</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="AddressesModal" aria-hidden="true" aria-labelledby="AddressesModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddressesModal">
                        @if (count($user->addresses) > 1)
                            Delivery addresses
                        @else
                            Delivery address
                        @endif
                    </h5>
                </div>
                <div class="modal-body">
                    @foreach ($user->addresses as $index => $address)
                        <h5><strong>Address ({{ $index + 1 }})</strong></h5>
                        <p class="fs-6">{{ $address->house_number }} {{ $address->street_name }}<br>
                            {{ $address->city }}, {{ $address->postcode }}
                        </p>
                    @endforeach
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#infoModal" data-bs-toggle="modal"
                        data-bs-dismiss="modal">Back to details</button>
                </div>
            </div>
        </div>
    </div>

    <!-- User update modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit User: {{ $user->id }} Details </h1>
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
                            value="{{ old('phone_number', $user->phone_number) }}" maxlength="15"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>

                        <div class="form-check pt-3">
                        
                       
                        <label for="access_level">Select Role:</label>
                        <select class="form-control" id="access_level" name="access_level">
                            <option value="1" {{ $user->access_level == 1 ? 'selected' : '' }}>User</option>
                            <option value="2" {{ $user->access_level == 2 ? 'selected' : '' }}>Moderator</option>
                            @if (Auth::user()->access_level == 4)
                            <option value="3" {{ $user->access_level == 3 ? 'selected' : '' }}>Admin</option>
                            <option value="4" {{ $user->access_level == 4 ? 'selected' : '' }}>Super Admin</option>
                            @endif
                        </select>
                        </select>
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
                                <div class="address-fields" id="addressFields_{{ $address->id }}"
                                    style="display: none;">
                                    <div class="form-group">
                                        <label for="house_number">House Number:</label>
                                        <input type="text" name="addresses[{{ $address->id }}][house_number]"
                                            class="form-control" value="{{ $address->house_number }}"
                                            maxlength="5">
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
                        <button type="button" class="btn btn-primary" data-bs-target="#infoModal"
                            data-bs-toggle="modal" data-bs-dismiss="modal">Back to details</button>

                        <button type="submit" class="btn btn-primary" form="editUserForm">Save</button>
                    </div>
                </form>

            </div>
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
