@extends('layouts.user-panel-base')
@section('title', 'Change Password')


@section('main')

    @section('banner')
        <div class="banner">
            <h2>{{ $user->first_name }} Changing Password</h2>  
        </div> 
    @endsection

    @section('page-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-5">
                <div class="card">
                    <form method="POST" action="{{ route('password.change') }}">
                            @csrf
                            <div class="row mb-3 pt-2">
                                <label for="current_password" class="col-md-4 col-form-label text-md-end">Current Password: </label>

                                <div class="col-md-6">
                                    <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current_password">

                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">New Password: </label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="confirmed" class="col-md-4 col-form-label text-md-end">Confirm New Password: </label>

                                <div class="col-md-6">
                                    <input id="confirmed" type="password" class="form-control @error('confirmed') is-invalid @enderror" name="confirmed" required autocomplete="confirmed">

                                    @error('confirmed')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="password-change-button">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
@endsection
