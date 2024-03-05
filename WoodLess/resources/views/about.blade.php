@extends('layouts.base')

@section('title', 'WoodLess - About Us')
@section('style')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">

@endsection



@section('content')


    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class = buttoncontainer>
                
                <div class ="aboutbutton">
                    <h7 id = "about"> About WoodLess </h7> 

                     <div class ="Faqbutton">
                    <h7 id = "faq"> FAQ </h7> 
</div>
<div class ="ourcommitmentsbutton">
                    <h7 id = "ourcommitments">Commitments & Values</h7>
</div>
<div class ="meetteambutton">
</div>
                    <h7 id = "meetteam"> Meet The Team </h7> 
</div>
</div >
<div class = "text">
<div id="aboutustext">
<h1 class="page-section-heading text-center text-uppercase ">About WoodLess </h1>
                <h2>Our Story</h2>
WoodLess was founded by a group of dedicated students in a university classroom who shared a common vision: to transform the furniture industry through sustainable practices. Our journey began with a commitment to crafting furniture using 100% recyclable materials, setting the stage for a company rooted in environmental responsibility.

<h2>Mission Statement</h2>
At WoodLess, our mission is to merge functionality and sustainability seamlessly. We strive to create high-quality furniture pieces that not only enhance your living spaces but also contribute to a more eco-friendly future.
                
                

</div>      
<div id="FAQtext">
</div> 
<div id="ourcommitmentstext">
<h1 class="page-section-heading text-center text-uppercase ">Commitments & Values</h1>
                
                <h2>Sustainable Innovation</h2>
WoodLess is dedicated to continuous innovation. We explore cutting-edge solutions to design and manufacture furniture that meets the highest standards of craftsmanship while remaining environmentally conscious.

<h2>Community Engagement</h2>
We actively engage with local initiatives to promote sustainable practices. WoodLess believes in the power of community collaboration to create a positive impact on the environment.

<h2>Quality Craftsmanship</h2>
Our team of skilled artisans merges traditional craftsmanship with modern design principles. Each piece reflects our commitment to quality, durability, and timeless style.

<h2>Environmental Stewardship</h2>
WoodLess is more than a furniture company; we are stewards of the environment. Our goal is to inspire others to adopt sustainable practices and join us on the journey towards a greener, healthier planet.
</div>        

@endsection

@section('js')
<script  rel= "jssheet" src="{{ asset('js/about.js') }}"></script>
<script  rel= "jssheet" src="{{ asset('js/meet.js') }}"></script>
@endsection