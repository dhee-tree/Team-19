@extends('layouts.user-panel-base')
@section('title', 'User Details')

@section('page-content')
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

@endsection
