@extends('layouts.base')
@section('title', 'WoodLess - Contact Us')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection 

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Us</h1>
                <h3>We would love to hear from you!</h2>
            </div>
        </div>

        <div class="row contact-main">
            <div class="col-md-6 contact-text-container">
                <div class="contact-icons">
                    <i class="fa-regular fa-envelope"></i> <span>email@address.com</span>
                </div>
                <div class="contact-icons">
                    <i class="fa-solid fa-phone"></i> <a href="tel: +44 0000 000000">+44 0000 000000</a>
                </div>
                <div class="contact-icons">
                    <i class="fa-solid fa-location-dot"></i> <span>Birmingham, England. B4 7ET</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="contact-card">
                    @if (session()->has('success'))
                        <div class="text-sm font-medium ml-3">Success!.</div>
                        <div class="text-sm tracking-wide text-gray-500 dark:text-white mt-4 sm:mt-0 sm:ml-4"> {{ session('success') }}</div>
                    @endif
                    <form action="{{ route('contact.send') }}" method="post">
                        @csrf
                        <label for="name" class="form-label">Name: </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="John Doe">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="email" class="form-label">Email: </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="john.doe@example.com">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="phone" class="form-label">Phone: </label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="+44 0000 000000">
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="message" class="form-label">Message: </label>
                        <textarea class="form-control" id="message" name="message" rows="7" placeholder="Your message here..."></textarea>
                        @error('message')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn contact-btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection