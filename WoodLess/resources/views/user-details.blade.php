@extends('layouts.user-panel-base')
@section('title', 'User Details')

@section('main')
    @section('banner')
        <!-- Code for banner -->
        <div class="banner">
            <h2>{{ $user->first_name }}'s Details</h2> 
        </div> 
    @endsection

    @section('page-content')
    <section id="" class="py-5 py-xl-8">
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
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateUserModal"><i class="fa-solid fa-file-pen"></i> Edit Details</button>
                        </div>

                        <!-- This include user panel modal -->
                        @include('components.user-edit-modal')
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="address" class="py-5 py-xl-8">
        
        {{-- Add Address Form --}}
        <form method="POST" action="{{ route('address.store') }}">
            @csrf
            <div class="form-group">
                <label for="house_number">House Number:</label>
                <input type="text" class="form-control" id="house_number" name="house_number" required>
            </div>
            <div class="form-group">
                <label for="street_name">Street Name:</label>
                <input type="text" class="form-control" id="street_name" name="street_name" required>
            </div>
            <div class="form-group">
                <label for="postcode">Postcode:</label>
                <input type="text" class="form-control" id="postcode" name="postcode" required>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Add Address</button>
        </form>

        {{-- Display existing addresses --}}
        @foreach ($addresses as $address)
            <div class="address-item mt-4">
                <p>{{ $address->house_number }} {{ $address->street_name }},
                    {{ $address->postcode }}, {{ $address->city }}</p>
                {{-- Include edit and delete buttons if needed --}}
                <a href="{{ route('address.edit', $address) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('address.destroy', $address) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endforeach
       
    </section>

@endsection