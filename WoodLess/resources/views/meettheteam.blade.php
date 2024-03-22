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
                                          
                                            <!--  - Text-->
                                            <p class="mb-4">Iggy, a founder at Woodless, merges frontend development expertise with a deep commitment to sustainability. 
                                                Specializing in HTML, CSS, and JavaScript, he crafts engaging web interfaces while championing eco-friendly practices. 
                                                Iggy's mission is to integrate sustainability into Woodless' digital presence, optimizing performance and reducing
                                                 environmental impact. When not coding, he explores nature trails and sketches design ideas, reflecting his passion 
                                                 for technology and the environment.</p>
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
                                            
                                            <!--  - Text-->
                                            <p class="mb-4">Hamid, a founder at Woodless, adeptly combines his role as a fullstack developer 
                                                with a profound commitment to sustainability. With expertise spanning various coding languages
                                                 such as JavaScript, Python, and Ruby, he designs captivating and environmentally-conscious web
                                                  interfaces. Hamid's primary objective is to embed sustainability into Woodless' digital ecosystem,
                                                   optimizing performance and minimizing ecological impact. Outside of coding, he finds solace in
                                                    exploring nature trails and nurturing his creativity through design, embodying his passion 
                                                    for both technology and environmental stewardship.</p>
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
                                            <!--  - Text-->
                                            <p class="mb-4">Ismaeel, another founder at Woodless, excels as a backend developer, 
                                                blending his technical prowess with a strong commitment to the company's mission.
                                                 Specializing in languages such as Python, Java, and PHP, he architects robust 
                                                 and efficient backend systems. Ismaeel's primary focus is on optimizing performance 
                                                 and ensuring data security for Woodless' digital infrastructure. Beyond coding, 
                                                 he enjoys delving into nature's wonders and finding inspiration for innovative
                                                  backend solutions, reflecting his dedication to merging technology with environmental 
                                                  responsibility.</p>
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
                                            <!--  - Text-->
                                            <p class="mb-4">Lewis, another founder at WoodLess, brings his expertise as a 
                                                fullstack developer to the forefront, seamlessly integrating technology with sustainability.
                                                 Proficient in a diverse array of coding languages including JavaScript, Python, and Ruby,
                                                  he crafts dynamic and user-friendly web interfaces. Lewis is dedicated to imbuing WoodLess'
                                                   digital platforms with sustainability, prioritizing performance optimization and eco-friendly
                                                    practices. When he's not immersed in coding, Lewis can be found exploring nature's beauty and 
                                                    drawing inspiration for innovative fullstack solutions, embodying his commitment to marrying 
                                                    technology with environmental consciousness.</p>
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
                                            <!--  - Text-->
                                            <p class="mb-4">Umer, another founder at Woodless, is instrumental as a backend developer, 
                                                channeling his technical expertise into advancing the company's objectives. 
                                                Proficient in languages like Python, Java, and SQL, he engineers resilient and streamlined 
                                                backend systems. Umer is deeply committed to enhancing performance and fortifying data security
                                                 across Woodless' digital framework. Outside his coding realm, he finds solace in exploring nature's
                                                  marvels, drawing creative insights that fuel his innovative backend solutions. This dedication 
                                                  underscores Umer's commitment to harmonizing technology with environmental consciousness 
                                                  at Woodless.</p>
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
                                           
                                            <!--  - Text-->
                                            <p class="mb-4">Zaakir, a founder at Woodless, plays a pivotal role as a front end developer,
                                                 melding his creative flair with technical expertise. Proficient in languages like HTML, 
                                                 CSS, and JavaScript, he crafts visually appealing and user-centric web interfaces. Zaakir 
                                                 is deeply committed to integrating sustainability into Woodless' digital presence, ensuring
                                                  each design aligns with the company's eco-friendly ethos. Beyond coding, he finds inspiration 
                                                  in nature's beauty, channeling this passion into innovative frontend solutions that resonate
                                                   with users. Zaakir's dedication to blending technology with environmental consciousness 
                                                   underscores Woodless' commitment to sustainability.</p>
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
                                            <!--  - Text-->
                                            <p class="mb-4">Matteo, a founder at Woodless, brings his visionary leadership to the role of a fullstack developer, 
                                                combining technical prowess with innovative thinking. Proficient in a diverse range of coding languages such as
                                                 JavaScript, Python, and PHP, he crafts dynamic and versatile web solutions. Matteo is deeply committed to embedding
                                                  sustainability into Woodless' digital footprint, ensuring every aspect of the platform reflects the company's
                                                   eco-conscious values. When he's not immersed in coding, Matteo draws inspiration from nature's beauty, 
                                                   infusing his work with creative solutions that bridge technology and environmental responsibility.
                                                    His dedication underscores Woodless' 
                                                commitment to sustainable innovation in every aspect of its operations.</p>
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
                                            <!--  - Text-->
                                            <p class="mb-4">Ndumiso, another visionary founder at Woodless, contributes his expertise as a front end 
                                                developer, blending creativity with technical proficiency. 
                                                Proficient in languages like HTML, CSS, and JavaScript, he crafts captivating
                                                 and user-friendly web interfaces. Ndumiso is deeply committed to infusing Woodless' 
                                                 digital presence with sustainability, ensuring that every design choice reflects the company's 
                                                 eco-conscious values. Beyond coding, he finds inspiration in nature's beauty, drawing from its 
                                                 tranquility to create innovative frontend solutions that resonate with users. Ndumiso's dedication
                                                  to merging technology with environmental consciousness underscores Woodless' commitment to sustainable
                                                   innovation in every aspect of its operations.</p>
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
