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
            <div class="col-md-6">
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
                    <form>
                        <label for="name" class="form-label">Name: </label>
                        <input type="text" class="form-control" id="name" placeholder="John Doe">

                        <label for="email" class="form-label">Email: </label>
                        <input type="email" class="form-control" id="email" placeholder="john.doe@example.com">

                        <label for="phone" class="form-label">Phone: </label>
                        <input type="tel" class="form-control" id="phone" placeholder="+44 0000 000000">

                        <label for="message" class="form-label">Message: </label>
                        <textarea class="form-control" id="message" rows="7" placeholder="Your message here..."></textarea>

                        <button type="submit" class="btn contact-btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection