@extends('site')
@section('content')


<main id="main">
    <!-- Slider Section -->
    <article class="slider">
        <div class="owl-slider owl-carousel">
            <div class="item" style="background-image:url({{asset('siteassets/images/slider/1.jpg')}})">
                <div class="container h-100">
                    <div class="slider-details h-100 flex-column">
                        <h4 class="slider-pre-title">
                            <img src="{{asset('siteassets/images/slider/icon.svg')}}" alt="icon">
                            <span> {{__('Dunia Al-Oyoun Hospital - Your Vision, Your Trust')}}!</span>
                        </h4>
                        <h2 class="slider-title">
                                {{__('The latest ophthalmology techniques')}}  <br> {{__('Your hands are with outstanding experts.')}}
                        </h2>
                        <p class="slider-desc">
                            {{__('We provide comprehensive and specialized ophthalmology services with a team of consultants.')}}   <br> وأحدث الأجهزة لتوفير رعاية طبية عالية الجودة لعينيك
                        </p>
                    </div>
                </div>
            </div>				
            <div class="item" style="background-image:url({{asset('siteassets/images/slider/2.jpg')}})">
                <div class="container h-100">
                    <div class="slider-details h-100 flex-column">
                        <h4 class="slider-pre-title">
                            <img src="{{asset('siteassets/images/slider/icon.svg')}}" alt="icon">
                            <span>     {{__('Your vision is your future, and Dunia Al-Oyoun is your place.')}}</span>
                        </h4>
                        <h2 class="slider-title">
                            {{__("Global standards in disease treatment.")}}     <br> {{__("Eyes in the hands of experts.")}}
                        </h2>
                        <p class="slider-desc">
                           {{__("Whether you're looking for solutions for cataracts, retina issues, or vision correction.")}}  <br> {{__("Dunia Al-Oyoun Hospital provides you with comprehensive medical care around the clock.")}}
                        </p>
                    </div>
                </div>
            </div>				
            <div class="item" style="background-image:url({{asset('siteassets/images/slider/3.jpg')}})">
                <div class="container h-100">
                    <div class="slider-details h-100 flex-column">
                        <h4 class="slider-pre-title">
                            <img src="{{asset('siteassets/images/slider/icon.svg')}}" alt="icon">
                            <span>{{__("Your eyes deserve the best, and we are here to make it happen.")}} </span>
                        </h4>
                        <h2 class="slider-title">
                                {{__("The best ophthalmology team with the latest technology.")}}<br>   {{__("Advanced surgical techniques.")}}
                        </h2>
                        <p class="slider-desc">
                            {{__("From consultants to the latest equipment, we offer a distinguished medical experience at Dunia Al-Oyoun.")}}  <br>  {{__("Aligned with the highest quality standards and personalized care for every case.")}}
                        </p>
                    </div>
                </div>
            </div>				
            <div class="item" style="background-image:url({{asset('siteassets/images/slider/4.jpg')}})">
                <div class="container h-100">
                    <div class="slider-details h-100 flex-column">
                        <h4 class="slider-pre-title">
                            <img src="{{asset('siteassets/images/slider/icon.svg')}}" alt="icon">
                            <span>{{__("Your vision care is our priority at Dunia Al-Oyoun.")}}</span>
                        </h4>
                        <h2 class="slider-title">
                            {{__("More than one million medical examinations.")}}<br>{{__("Serving your vision with excellence.")}}
                        </h2>
                        <p class="slider-desc">
                            {{__("Dunia Al-Oyoun Hospital provides specialized and comprehensive eye care.")}}<br>   {{__("To meet your needs with precision and the highest possible quality.")}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-numbers">04-01</div>
        <div class="owl-thumbnails"></div> <!-- Custom Dots Container -->
    </article>
    <!-- Slider Section -->

    <!-- Achievement Section -->
    <article class="achievement text-center pd">
        <div class="container">
            <span class="pre-title site-color">{{__('Our achievements speak for our leadership in the field of ophthalmology.')}}</span>
            <h2 class="main-title">{{__('Amazing statistics prove our position as pioneers in medical eye care services.')}}</h2>
            <p class="main-para">{{__('Since its establishment in 2004, Dunya Eye Hospital has achieved record-breaking milestones in the field of ophthalmology. We constantly strive for excellence through thousands of successful surgeries and medical examinations. These achievements reflect our commitment to providing top-quality medical services and making a positive impact on our patients\' lives.')}}</p>

            <!-- Counter -->
            <section class="counter flex-center pdt">
                <div class="col-3 col-sm-6 col-xs-12">
                    <div class="counter-box">
                        <strong class="number">1000+</strong>
                        <p class="value">{{__("Successful surgical procedure.")}}</p>
                    </div>
                </div>				

                <div class="col-3 col-sm-6 col-xs-12">
                    <div class="counter-box">
                        <strong class="number">5000+</strong>
                        <p class="value"> {{__("Cataract surgery with utmost precision.")}}</p>
                    </div>
                </div>				

                <div class="col-3 col-sm-6 col-xs-12">
                    <div class="counter-box">
                        <strong class="number">748+</strong>
                        <p class="value">{{__("LASIK surgery for vision correction.")}}</p>
                    </div>
                </div>				

                <div class="col-3 col-sm-6 col-xs-12">
                    <div class="counter-box">
                        <strong class="number">1+</strong>
                        <p class="value">{{__("One million comprehensive medical examinations.")}}</p>
                    </div>
                </div>
            </section>
            <!-- Counter -->

            <!-- About  -->
            <section class="about flex-start  text-right align-center">
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="about-desc">
                        <span class="pre-title site-color">{{$about->title}}</span>
                        <h2 class="main-title">{{$about->sub_title}}</h2>
                        <p class="main-para">
                                 {{$about->desc}}
                        </p>
                    </div>	
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <figure class="about-image">
                        <img src="{{asset('siteassets/images/about.svg')}}" alt="">
                    </figure>
                </div>
            </section>
            <!-- About  -->

        </div>
    </article>
    <!-- Achievement Section -->

    <!-- Service Section -->
    <article class="services pd">
        <div class="bk" style="background-image:url({{asset('siteassets/images/services.svg')}})"></div>
        <div class="container">
            <h2 class="main-title site-color">خدمات  TOP CARE </h2>
            <div class="flex-start pdb align-center">
                <div class="col-6 col-md-12">
                    <p class="main-para pdl">
                       {{__("Medical services provided by Dunia Al-Oyoun Hospital, specialized in ophthalmology and eye surgery, offering healthcare for eye patients in diagnostic and therapeutic care, LASIK and laser treatments, and surgical procedures related to eye health and vision.")}}
                    </p>
                </div>
                <div class="col-6 col-md-12">
                    <p class="main-para pdr">
                     {{__("It includes a distinguished group of professors and consultants specializing in various ophthalmic fields, such as cataracts, glaucoma, corneal and strabismus surgery, retinal diseases, tear duct and eyelid conditions, cosmetic surgeries, eye tumors, and pediatric retinal tumors (Retinoblastoma).")}}
                    </p>
                </div>
            </div>
            <h4 class="h4">
                 {{__("In addition to the mentioned ophthalmology services, other services include:")}}
            </h4>
            <ul class="list-unstyled flex-start services-list">
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    {{__("Cosmetic surgeries for the face and head.")}}
                </li>					
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    {{__("Oral and maxillofacial surgeries")}}
                </li>					
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    {{__("Dermatology and laser services")}}
                </li>					
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    {{__("Nutrition services")}}
                </li>					
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    {{__("Laboratory services")}}
                </li>
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    {{__("Pharmacy services")}}
                </li>
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    {{__("Accommodation services")}}
                </li>
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    {{__("Other services")}}
                </li>
                
            </ul>
        </div>
    </article>
    <!-- Service Section -->

    <!-- Discover Section -->
    <article class="discover pd">
        <div class="container">
            <span class="pre-title site-color">{{__("Explore various medical specialties to meet your healthcare needs.")}}</span>
            <h2 class="main-title">{{__("Choose the right medical specialty for your health needs from our diverse specialties.")}}</h2>
            <p class="main-para">{{__("Description: We offer you a wide range of medical specialties, including ophthalmology, dentistry, dermatology, surgery, and more. Receive comprehensive healthcare from experienced specialists to help you maintain your health and well-being.")}}</p>
    
            <div class="flex-center discover-row pdt">
                <div class="col-4 col-sm-6 col-xs-12">
                    <div class="discover-box" style="background-image:url({{asset('siteassets/images/discover/1.svg')}})">
                        <div class="discover-box-content">
                            <span>{{__("Ophthalmology and Eye Surgery")}}</span>
                            <p>{{__("Your vision matters! We provide comprehensive eye care, from vision tests and correction to advanced eye surgeries, ensuring you clearer sight and a more comfortable life.")}}</p>
                            <a href="#">{{__("Learn more")}}</a>
                        </div>
                    </div>
                </div>				
    
                <div class="col-4 col-sm-6 col-xs-12">
                    <div class="discover-box" style="background-image:url({{asset('siteassets/images/discover/2.svg')}})">
                        <div class="discover-box-content">
                            <span>{{__("Dermatology")}}</span>
                            <p>{{__("Achieve healthy and radiant skin with specialized dermatologists. We provide the latest treatments for acne, pigmentation, hair loss, and skin diseases, using advanced techniques to ensure the best results for your skin.")}}</p>
                            <a href="#">{{__("Learn more")}}</a>
                        </div>
                    </div>
                </div>				
    
                <div class="col-4 col-sm-6 col-xs-12">
                    <div class="discover-box" style="background-image:url({{asset('siteassets/images/discover/3.svg')}})">
                        <div class="discover-box-content">
                            <span>{{__("Dentistry")}}</span>
                            <p>{{__("A healthy smile starts with strong teeth! We offer all dental care services, from cleaning and whitening to implants and orthodontics, ensuring optimal oral health and a long-lasting bright smile.")}}</p>
                            <a href="#">{{__("Learn more")}}</a>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </article>
    
    <!-- Discover Section -->

    <!-- Discover two Section -->
    <article class="discover pd">
        <div class="container">
            <div class="flex-between pdb">
                <div>
                    <span class="pre-title site-color">{{__("Explore our key achievements and participation in medical events and conferences.")}}</span>
                    <h2 class="main-title">{{__("Our outstanding contributions and achievements in major medical")}}<br>{{__("and scientific events and conferences.")}}</h2>
                </div>
                <a href="#" class="site-color">
                    {{__("View more events")}}
                </a>
            </div>
            <p class="main-para">{{__("We take pride in our participation in medical events and conferences, where we showcase the latest technologies")}}<br>{{__("and share our expertise with the medical community. Our goal is to exchange knowledge and highlight our leadership")}}<br>{{__("in ophthalmology and eye surgery through these distinguished events.")}}</p>
    
            <div class="flex-center discover-row pdt">
                <div class="col-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="discover-box discover-box-2" style="background-image:url({{asset('siteassets/images/discover/4.svg')}})">
                        <div class="discover-box-details">
                            <h3>{{__("Modern Technology in Eye Surgery Conference 2024")}}</h3>
                            <p>{{__("We showcased the latest eye surgery techniques")}}<br>{{__("with the participation of elite doctors and experts.")}}</p>
                            <a href="#">
                                {{__("Read more")}}
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                </div>				
                <div class="col-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="discover-box discover-box-2" style="background-image:url({{asset('siteassets/images/discover/5.svg')}})">
                        <div class="discover-box-details">
                            <h3>{{__("The Arab Forum for the Development of Retinal Disease Treatments")}}</h3>
                            <p>{{__("Specialized training on the latest laser techniques")}}<br>{{__("for vision correction and treatment.")}}</p>
                            <a href="#">
                                {{__("Read more")}}
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                </div>				
                <div class="col-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="discover-box discover-box-2" style="background-image:url({{asset('siteassets/images/discover/6.svg')}})">
                        <div class="discover-box-details">
                            <h3>{{__("Free medical campaign for eye disease screening")}}</h3>
                            <p>{{__("We provided free check-ups and treatment")}}<br>{{__("in collaboration with local and international charities.")}}</p>
                            <a href="#">
                                {{__("Read more")}}
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                </div>				
                <div class="col-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="discover-box discover-box-2" style="background-image:url({{asset('siteassets/images/discover/7.svg')}})">
                        <div class="discover-box-details">
                            <h3>{{__("International Conference on the Treatment of Premature Infants’ Diseases")}}</h3>
                            <p>{{__("We participated with the latest solutions for treating pediatric retinal diseases")}}<br>{{__("to ensure a better visual future.")}}</p>
                            <a href="#">
                                {{__("Read more")}}
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                </div>				
            </div>
        </div>
    </article>
    

    <!-- Discover two Section -->

    <!-- Experience Section -->
    <article class="experience pd">
        <div class="container flex-center align-center">
            <div class="col-6 col-md-6 col-sm-12">
                <figure class="experience-image">
                    <img src="{{asset('siteassets/images/experience/main.svg')}}" alt="" >
                </figure> 
            </div>
            <div class="col-6 col-md-6 col-sm-12">
                <div class="experience-details">
                    <span class="pre-title site-color">{{__('app 1')}}</span>
                    <h2 class="main-title"> {{__('app 2')}}</h2>
                    <p class="main-para">{{__('app 3')}}</p>

                    <div class="btns flex-start align-center">
                        <a href="#" class="section-btn">
                            <img src="{{asset('siteassets/images/experience/badge.svg')}}">
                        </a>						
                        <a href="#" class="section-btn">
                            <img src="{{asset('siteassets/images/experience/app.svg')}}">
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </article>
    <!-- Experience Section -->

    <!-- Faq Section -->
    <article class="faq pd">
        <div class="container">
            <div class="flex-between pdb">
                <div>
                    <span class="pre-title site-color">{{__('quetion 1')}}</span>
                    <h2 class="main-title">{{__('quetion 2')}}</h2>
                </div>
                <a href="#" class="site-color">
                   {{__("View more FAQs")}}
                </a>
            </div>
            <p class="main-para">{{__('quetion 3')}}</p>

            <div class="questions pdt flex-start">

                @foreach ($quetions as $quetion)
                <div class="col-4 col-md-6 col-sm-12">
                    <div class="qbox">
                        <h3>
                            <i class="fa-solid fa-chevron-left"></i>
                             {{$quetion->quetion}}
                        </h3>
                        <p>
                            {{$quetion->answer}}
                        </p>
                    </div>
                </div>		
                @endforeach

            </div>
        </div>
    </article>
    <!-- Faq Section -->

    <!-- Parteners Section -->
    <article class="parteners pd">
        <div class="container">
            <div class="flex-between pdb">
                <div>
                    <span class="pre-title site-color">{{__('Our trusted partners')}}</span>
                    <h2 class="main-title"> {{__('Insurance Partners: Renowned')}}</h2>
                </div>
                <a href="#" class="site-color">
                   {{__("View more partners")}}
                </a>
            </div>
            <p class="main-para">{{__('Our company takes')}}</p>

            <div class="flex-between align-center pdt">
                <img src="{{asset('siteassets/images/parteners/1.svg')}}" alt="">
                <img src="{{asset('siteassets/images/parteners/2.svg')}}" alt="">
                <img src="{{asset('siteassets/images/parteners/3.svg')}}" alt="">
                <img src="{{asset('siteassets/images/parteners/4.svg')}}" alt="">
                <img src="{{asset('siteassets/images/parteners/5.svg')}}" alt="">
                <img src="{{asset('siteassets/images/parteners/6.svg')}}" alt="">
            </div>

        </div>
    </article>
    <!-- Parteners Section -->

    <!-- Contact us Section -->
     @include('components.contact-us')
    <!-- Contact us Section -->

</main>

@endsection