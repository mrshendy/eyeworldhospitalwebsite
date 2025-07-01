@extends('site')
@section('content')

@section('styles')
   <style>
    .answer {
        display: block;
        margin-top: 5px;
    }

    .d-none {
    display: none !important;
}

    .toggle-answer-link {
        color: #007bff;
        text-decoration: underline;
        cursor: pointer;
        display: inline-block;
        margin-top: 5px;
    }
</style>
@endsection
<main id="main">
    <!-- Slider Section -->
    <article class="slider">
        <div class="owl-slider owl-carousel">
            @foreach ($sliders as $slider)
                <div class="item" style="background-image:url({{asset('uploads/sliders/' . $slider->img)}})">
                    <div class="container h-100">
                        <div class="slider-details h-100 flex-column">
                            <h4 class="slider-pre-title">
                                <img src="{{asset('siteassets/images/slider/icon.svg')}}" alt="icon">
                                <span>{{ $slider->title }} !</span>
                            </h4>
                            <h2 class="slider-title">
                                    {{ $slider->sub_title }}
                            </h2>
                            <p class="slider-desc">
                                {{ $slider->description }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="owl-numbers">0{{ $sliders->count() }}-01</div>
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
            <h2 class="main-title site-color">{{ __('TOP CARE SERVICES') }}</h2>
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
                @foreach ($specialities as $spec)
                    <div class="col-4 col-sm-6 col-xs-12">
                        <div class="discover-box" style="background-image:url({{asset($spec->img)}})">
                            <div class="discover-box-content">
                                <span>{{ $spec->title }}</span>
                                <p>{{ $spec->desc }}</p>
                                <a href="{{ route("Site.specialtie", $spec->id) }}">{{__("Learn more")}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                <a href="{{ route('Site.conference.index') }}" class="site-color">
                    {{__("View more events")}}
                </a>
            </div>
            <p class="main-para">{{__("We take pride in our participation in medical events and conferences, where we showcase the latest technologies")}}<br>{{__("and share our expertise with the medical community. Our goal is to exchange knowledge and highlight our leadership")}}<br>{{__("in ophthalmology and eye surgery through these distinguished events.")}}</p>

            <div class="flex-center discover-row pdt">
                @foreach ($conferences as $conference)
                    <div class="col-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="discover-box discover-box-2" style="background-image:url({{asset('uploads/conferences/' . $conference->img)}})">
                            <div class="discover-box-details">
                                <h3>{{ $conference->title }}</h3>
                                <p>{{ $conference->description }}</p>
                                <a href="{{ route('Site.conference.show', $conference->id) }}">
                                    {{__("Read more")}}
                                    <i class="fa-solid fa-chevron-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

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
                            <img src="{{asset('siteassets/images/experience/Badge.svg')}}">
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
                <a href="{{ route('Site.faqs') }}" class="site-color">
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
                       @php
                            $plainText = strip_tags($quetion->answer);
                            $charLimit = 20;
                        @endphp

                        @if(strlen($plainText) > $charLimit)
                            @php
                                $shortAnswer = mb_substr($plainText, 0, $charLimit) . '...';
                                $showMoreText = __("Show More");
                                $showLessText = __("Show Less");
                            @endphp
                            <p class="answer short-answer">{{ $shortAnswer }}</p>
                            <p class="answer full-answer d-none">{!! $quetion->answer !!}</p>
                            <a href="javascript:void(0);" class="toggle-answer-link"
                            data-show-more="{{ __('Show More') }}" data-show-less="{{ __('Show Less') }}">
                                {{ __('Show More') }}
                            </a>
                        @else
                            <p class="answer">{!! $quetion->answer !!}</p>
                        @endif
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
                <a href="{{ route('Site.partners.index') }}" class="site-color">
                    {{__("View more Partners")}}
                </a>
            </div>
            <p class="main-para">{{__('Our company takes')}}</p>

            <div class="flex-between align-center pdt">
                @foreach ($insurance_partners as $partner)
                    <img src="{{asset($partner->img)}}">
                @endforeach

            </div>

        </div>
    </article>
    <!-- Parteners Section -->

    <!-- Contact us Section -->
     @include('components.contact-us')
    <!-- Contact us Section -->

</main>

@endsection

