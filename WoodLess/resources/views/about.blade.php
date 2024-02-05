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
<h1 class="page-section-heading text-center text-uppercase ">About WoodLess Ismaeel</h1>
                <h2>Our Story</h2>
WoodLess was founded by a group of dedicated students in a university classroom who shared a common vision: to transform the furniture industry through sustainable practices. Our journey began with a commitment to crafting furniture using 100% recyclable materials, setting the stage for a company rooted in environmental responsibility.

<h2>Mission Statement</h2>
At WoodLess, our mission is to merge functionality and sustainability seamlessly. We strive to create high-quality furniture pieces that not only enhance your living spaces but also contribute to a more eco-friendly future.
                
                

</div>      
<div id="FAQtext">
<h1 class="page-section-heading text-center text-uppercase ">FAQ</h1>
               <h2> What materials do you use?</h2>
WoodLess exclusively uses 100% recyclable materials in crafting our furniture. We prioritize sustainability without compromising on quality or design.

<h2>How do you ensure sustainability?</h2>
Our commitment to sustainability extends throughout our entire production process. From material sourcing to manufacturing and delivery, we employ eco-friendly practices to minimize our environmental impact.
                
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
<div id="meettheteamtext">
                
                
                
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
               
                <h1 class="page-section-heading text-center text-uppercase ">Meet the Team</h1>

              
                <div class="row justify-content-center">
                    <!-- IGGY 1-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('images\Iggy.png') }}" alt="..." />
                        </div>
                    </div>
                    <!-- Hamid 2-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal2">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('images\Hamid.png') }}" alt="..." />
                        </div>
                    </div>
                    <!-- Ismaeel 3-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal3">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('images\ismaeel.png') }}" alt="..." />
                        </div>
                    </div>
                    <!-- Lewis  4-->
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal4">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('images\Lewis.png') }}" alt="..." />
                        </div>
                    </div>
                    <!-- Umer 5-->
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal5">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('images\Umer.png') }}" alt="..." />
                        </div>
                    </div>
                     <!-- Zaakir 6-->
                     <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal6">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('images\zaakir.png') }}" alt="..." />
                        </div>
                    </div>
                    
                    <!-- Matteo 7-->
                    <div class="col-md-6 col-lg-4 mb-5 mb-md-0">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal7">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('images\Matteo.png') }}" alt="..." />
                        </div>
                    </div>
                    <!-- Ndumsiso 8-->
                    <div class="col-md-6 col-lg-4">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal8">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('images\Ndumiso.png') }}" alt="..." />
                        </div>
                    </div>
                </div>
            </div>
</div>
        </section>

                
                   
                
            </div>
        </div>
    </div>



       
        <!-- Iggy 1 Text-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!--  Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Iggy</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!--  - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/cabin.png" alt="..." />
                                    <!--  - Text-->
                                    <p class="mb-4">Iggy is one of the founders at Woodless and is currently working as a Front end developer</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hamid 2 Text -->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" aria-labelledby="portfolioModal2" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!--  Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Hamid</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/cake.png" alt="..." />
                                    <!--  - Text-->
                                    <p class="mb-4">Hamid is a founder at Woodless and is currently working as a fullstack developer</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ismaeel 3 Text -->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" aria-labelledby="portfolioModal3" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Ismaeel</h2>
                                    <!-- Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!--  - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/circus.png" alt="..." />
                                    <!--  - Text-->
                                    <p class="mb-4">Ismaeel is another founder at Woodless and is currently working as a backend developer</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Lewis 4 Text -->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" aria-labelledby="portfolioModal4" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!--  - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Lewis</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!--  - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/game.png" alt="..." />
                                    <!--  - Text-->
                                    <p class="mb-4">Lewis is another founder at WoodLess and is currently working as a fullstack developer</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Umer 5 text -->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" aria-labelledby="portfolioModal5" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!--  - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Umer</h2>
                                    <!-- Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!--  - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/safe.png" alt="..." />
                                    <!--  - Text-->
                                    <p class="mb-4">Umer is another founder at Woodless and is currently working as a back end developer</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Zaakir 6 text -->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" aria-labelledby="portfolioModal6" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!--  - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Zaakir </h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!--  - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/safe.png" alt="..." />
                                    <!--  - Text-->
                                    <p class="mb-4">Zaakir is a founder at woodless and is currently working as a front end developer</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Matteo 7 Text -->
        <div class="portfolio-modal modal fade" id="portfolioModal7" tabindex="-1" aria-labelledby="portfolioModal7" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!--  - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Matteo</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!--  - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/safe.png" alt="..." />
                                    <!--  - Text-->
                                    <p class="mb-4">Matteo is a founder at woodless and is currently working as a fullstack developer</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ndumiso 8 Text-->
        <div class="portfolio-modal modal fade" id="portfolioModal8" tabindex="-1" aria-labelledby="portfolioModal8" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!--  - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Ndumiso</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!--  - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/submarine.png" alt="..." />
                                    <!--  - Text-->
                                    <p class="mb-4">Ndumiso is another founder at woodless and is currently working as a front end developer</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

@endsection

@section('js')
<script  rel= "jssheet" src="{{ asset('js/about.js') }}"></script>
<script  rel= "jssheet" src="{{ asset('js/meet.js') }}"></script>
@endsection