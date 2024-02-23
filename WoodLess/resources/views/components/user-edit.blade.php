<!-- User update modal -->
<div class="modal fade" id="extraModal" tabindex="-1" aria-labelledby="extraModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="extraModalLabel">Edit User: {{ $user->id }} Details </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user-store', ['id' => $user->id]) }}" method="POST">
                @csrf
                <div class="modal-body">



                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" id="first_name"
                        class="pb-2 form-control @error('first_name') is-invalid @enderror"
                        value="{{ old('first_name', $user->first_name) }}" required autofocus>

                    <label for="last_name" class="pt-3">Last Name:</label>
                    <input type="text" name="last_name" id="last_name"
                        class="form-control @error('last_name') is-invalid @enderror"
                        value="{{ old('last_name', $user->last_name) }}" required>

                    <label for="email" class="pt-3">Email:</label>
                    <input type="text" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}" required>

                    <label for="phone_number" class="pt-3">Phone Number:</label>
                    <input type="text" name="phone_number" id="phone_number"
                        class="form-control @error('phone_number') is-invalid @enderror"
                        value="{{ old('phone_number', $user->phone_number) }}" required>

                    <div class="form-check pt-3">
                        <input type="checkbox" name="is_admin" id="is_admin" class="form-check-input"
                            {{ $user->is_admin ? 'checked' : '' }}>
                        <label for="is_admin" class="form-check-label">Set as Admin</label>
                    </div>

                    <label for="address" class="pt-3">Address:</label>
                    <select name="address" id="address" class="form-control">
                        <option value="">Select Address
                        </option>

                        @foreach ($user->addresses as $address)
                            <option value="{{ $address->id }}">
                                {{ $address->house_number . ' ' . $address->street_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
