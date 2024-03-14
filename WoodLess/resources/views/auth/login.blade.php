@extends('layouts.base')

@section('title', 'WoodLess - Login')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login-container">
    <div class="form-container sign-in">
        @if(session('message'))
            <div class="alert alert-success pt-2">
                {{ session('message') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Sign In</h1>
            <!-- Email -->
            <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <!-- Password -->
            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <!-- Remember me -->
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif

            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

            <p>Don't have an account? <a href="{{ route('register') }}">Sign up here</a></p>
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
