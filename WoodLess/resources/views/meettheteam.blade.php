@extends('layouts.base')

@section('title', 'WoodLess - Meet the Team')
@section('style')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection
@section('content')
<style>
    #back-button {
  position: absolute;
  top: 80px;
  left: 20px;
  z-index: 1000; /* Ensure it's above other content */
  padding: 10px 20px;
  background-color: #007bff; /* Change color as needed */
  color: white;
  border: none;
  border-radius: 5px;
  text-decoration: none;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}  
/* .buttoncontainer {
  width: 100%;
  text-align: center;
}

.buttoncontainer h7:active {
  background-color: rgb(115, 113, 113); 
}

.text h1{
margin-top: 20px;
}
    .aboutbutton,.Faqbutton,.ourcommitmentsbutton,.meetteambutton{
   
    display: inline-block;
    margin-right: 20px;
   margin-left: 20px;
   margin-top: 20px;
   cursor: pointer;
}


.portfolio .portfolio-item {
    cursor: pointer;
    position: relative;
    display: block;
    max-width: 25rem;
    border-radius: 0.5rem;
    overflow: hidden;
  }
  .portfolio .portfolio-item .portfolio-item-caption {
    position: absolute;
    top: 0;
    left: 0;
    transition: all 0.2s ease-in-out;
    opacity: 0;
    background-color: rgba(26, 188, 156, 0.9);
  }
  .portfolio .portfolio-item .portfolio-item-caption:hover {
    opacity: 1;
  }
  .portfolio .portfolio-item .portfolio-item-caption .portfolio-item-caption-content {
    font-size: 1.5rem;
  }
  
  .portfolio-modal .btn-close {
    color: #1abc9c;
    font-size: 2rem;
    padding: 1rem;
  }
  .portfolio-modal .portfolio-modal-title {
    font-size: 2.25rem;
    line-height: 2rem;
  }
  @media (min-width: 992px) {
    .portfolio-modal .portfolio-modal-title {
      font-size: 3rem;
      line-height: 2.5rem;
    }
  } */

    </style>
  
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
@section('js')
<script  rel= "jssheet" src="{{ asset('js/about.js') }}"></script>
<script  rel= "jssheet" src="{{ asset('js/meet.js') }}"></script>
@endsection
@endsection
