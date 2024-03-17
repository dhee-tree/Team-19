@extends('layouts.base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/forgot.css') }}">
    <style>
        .login-container .form-container .form-group .col-md-6 input[type="email"] {
            width: 150%; /* Adjust the width as needed */
            max-width: 500px /* Maximum width */
        }
    </style>
@endsection

@section('content')
<div class="login-container">
    <div class="form-container sign-in">
        @if(session('status'))
            <div class="alert alert-success pt-2">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <h1>{{ __('Forgot Your Password?') }}</h1>
            <!-- Email -->
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Enter your details to resume your shopping experience!</p>
            </div>
        </div>
    </div>
</div>
@endsection
