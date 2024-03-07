{{-- resources/views/user-details.blade.php --}}
@extends('layouts.user-panel-base')
@section('title', 'User Details')

@section('main')
    <div class="banner">
        <h2>{{ $user->first_name }}'s Details</h2> 
    </div>

    <section class="py-5 py-xl-8">
        <div class="container-fluid justify-content-center">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Your Details</h5>
                            <hr>
                            <p><strong>First Name:</strong> {{ $user->first_name }}</p>
                            <p><strong>Last Name:</strong> {{ $user->last_name }}</p>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>Phone:</strong> {{ $user->phone_number }}</p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateUserModal">
                                <i class="fa-solid fa-file-pen"></i> Edit Details
                            </button>
                        </div>
                    </div>
                    @include('components.user-edit-modal')
                </div>
            </div>
        </div>
    </section>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Your Addresses</h5>
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addAddressModal">Add New Address</button>
            <hr>
            @foreach ($user->addresses as $address)
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                    <p>{{ $address->house_number }} {{ $address->street_name }}, {{ $address->postcode }}, {{ $address->city }}</p>
                    <div><button class="btn btn-info btn-sm" onclick="populateEditAddressModal({{ $address->toJson() }})" data-bs-toggle="modal" data-bs-target="#editAddressModal">Edit</button>
                        <form action="{{ route('address.destroy', $address->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <form action="{{ route('address.set_default', $address->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-sm">Set as Default</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('components.add-address-modal')
    @include('components.edit-address-modal')
@endsection

@section('js')
<script>
function populateEditAddressModal(address) {
    // There's no need to parse the JSON again since Laravel does it already
    // Set the form action
    var editForm = document.getElementById('editAddressForm');
    editForm.action = `/addresses/${address.id}`;
    // Fill the form fields with the address data
    document.getElementById('edit_house_number').value = address.house_number;
    document.getElementById('edit_street_name').value = address.street_name;
    document.getElementById('edit_postcode').value = address.postcode;
    document.getElementById('edit_city').value = address.city;

    // Show the modal
    var editModal = new bootstrap.Modal(document.getElementById('editAddressModal'));
    editModal.show();
}
</script>


@endsection
