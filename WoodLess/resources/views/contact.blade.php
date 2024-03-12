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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5030.018166849232!2d-1.8964055861414886!3d52.48606534618825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870bc9ae45f3209%3A0x3c1b51db7d2bbf2d!2sBirmingham%20B4%207ET!5e0!3m2!1sen!2suk!4v1710248811495!5m2!1sen!2suk" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="col-md-6">
                @if (session()->has('success'))
                    <div class="sent-success">
                        <i class="fa-regular fa-circle-check fa-fade"></i> <span>{{ session('success') }}</span>
                    </div>
                @endif
                <div class="contact-card">
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