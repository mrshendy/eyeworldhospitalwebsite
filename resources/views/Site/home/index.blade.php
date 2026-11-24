@extends('site')

@section('title', __('Dunia Al-Oyoun Hospital - Egypt\'s Leading Eye Care Center'))
@section('meta_description', __('Egypt\'s top ophthalmology center offering cataract surgery, LASIK, retinal care, pediatric eye care, and advanced vision services with expert specialists.'))
@section('meta_keywords', __('مستشفى دنيا العيون, طب العيون, جراحة العيون, الليزك, المياه البيضاء, علاج الشبكية, رعاية العيون, طب العيون في مصر'))

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
                                <img src="{{asset('siteassets/images/slider/icon.webp')}}" alt="" width="24" height="24">
                                <span>{{ $slider->title }}</span>
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
            <h1 class="pre-title site-color">{{ home_content('achievement.pre_title') }}</h1>
            <h2 class="main-title">{{ home_content('achievement.title') }}</h2>
            <p class="main-para">{!! nl2br(e(home_content('achievement.desc'))) !!}</p>

            <!-- Counter -->
            @if (home_visible('counter'))
            <section class="counter flex-center pdt">
                @foreach ([1, 2, 3, 4] as $n)
                <div class="col-3 col-sm-6 col-xs-12">
                    <div class="counter-box">
                        <strong class="number">{{ home_content("counter.$n.number") }}</strong>
                        <p class="value">{{ home_content("counter.$n.label") }}</p>
                    </div>
                </div>
                @endforeach
            </section>
            @endif
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
                        <img src="{{ home_image('about.image') }}" alt="{{ $about->title }}" loading="lazy">
                    </figure>
                </div>
            </section>
            <!-- About  -->

        </div>
    </article>
    <!-- Achievement Section -->

    <!-- Service Section -->
    @if (home_visible('services'))
    <article class="services pd">
        <div class="bk" style="background-image:url({{ home_image('services.image') }})"></div>
        <div class="container">
            <h2 class="main-title site-color">{{ home_content('services.title') }}</h2>
            <div class="flex-start pdb align-center">
                <div class="col-6 col-md-12">
                    <p class="main-para pdl">{!! nl2br(e(home_content('services.para1'))) !!}</p>
                </div>
                <div class="col-6 col-md-12">
                    <p class="main-para pdr">{!! nl2br(e(home_content('services.para2'))) !!}</p>
                </div>
            </div>
            <h4 class="h4">{{ home_content('services.list_title') }}</h4>
            <ul class="list-unstyled flex-start services-list">
                @foreach (home_lines('services.list') as $service)
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="" loading="lazy" width="16" height="16">
                    {{ $service }}
                </li>
                @endforeach
            </ul>
        </div>
    </article>
    @endif
    <!-- Service Section -->

    <!-- Discover Section -->
    @if (home_visible('specialties'))
    <article class="discover pd">
        <div class="container">
            <span class="pre-title site-color">{{ home_content('specialties.pre_title') }}</span>
            <h2 class="main-title">{{ home_content('specialties.title') }}</h2>
            <p class="main-para">{!! nl2br(e(home_content('specialties.desc'))) !!}</p>

            <div class="flex-center discover-row pdt">
                @foreach ($specialities as $spec)
                    <div class="col-4 col-sm-6 col-xs-12">
                        <div class="discover-box" style="background-image:url({{asset($spec->img)}})">
                            <div class="discover-box-content">
                                <span>{{ $spec->title }}</span>
                                <p>{{ $spec->desc }}</p>
                                <a href="{{ route("Site.specialtie", $spec->slug) }}">{{ __("Explore") }} {{ $spec->title }} {{ __("services") }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </article>
    @endif
    <!-- Discover Section -->

    <!-- Discover two Section -->
    @if (home_visible('conferences'))
    <article class="discover pd">
        <div class="container">
            <div class="flex-between pdb">
                <div>
                    <span class="pre-title site-color">{{ home_content('conferences.pre_title') }}</span>
                    <h2 class="main-title">{!! nl2br(e(home_content('conferences.title'))) !!}</h2>
                </div>
                <a href="{{ route('Site.conference.index') }}" class="site-color">{{ __("View All Upcoming Conferences") }}</a>
            </div>
            <p class="main-para">{!! nl2br(e(home_content('conferences.desc'))) !!}</p>

            <div class="flex-center discover-row pdt">
                @foreach ($conferences as $conference)
                    <div class="col-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="discover-box discover-box-2" style="background-image:url({{asset('uploads/conferences/' . $conference->img)}})">
                            <div class="discover-box-details">
                                <h3>{{ $conference->title }}</h3>
                                <p>{{ $conference->description }}</p>
                                <a href="{{ route('Site.conference.show', $conference->slug) }}">
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
    @endif
    <!-- Discover two Section -->

    <!-- Experience Section -->
    @if (home_visible('app'))
    <article class="experience pd">
        <div class="container flex-center align-center">
            <div class="col-6 col-md-6 col-sm-12">
                <figure class="experience-image">
                    <img src="{{ home_image('app.image') }}" alt="" loading="lazy">
                </figure>
            </div>
            <div class="col-6 col-md-6 col-sm-12">
                <div class="experience-details">
                    <span class="pre-title site-color">{{ home_content('app.pre_title') }}</span>
                    <h2 class="main-title">{{ home_content('app.title') }}</h2>
                    <p class="main-para">{!! nl2br(e(home_content('app.desc'))) !!}</p>

                    <div class="btns flex-start align-center">
                        <a href="#" class="section-btn">
                            <img src="{{asset('siteassets/images/experience/Badge.svg')}}" alt="App Store" loading="lazy">
                        </a>
                        <a href="#" class="section-btn">
                            <img src="{{asset('siteassets/images/experience/app.svg')}}" alt="Google Play" loading="lazy">
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </article>
    @endif
    <!-- Experience Section -->

    <!-- Faq Section -->
    @if (home_visible('faq'))
    <article class="faq pd">
        <div class="container">
            <div class="flex-between pdb">
                <div>
                    <span class="pre-title site-color">{{ home_content('faq.pre_title') }}</span>
                    <h2 class="main-title">{{ home_content('faq.title') }}</h2>
                </div>
                <a href="{{ route('Site.faqs') }}" class="site-color">{{ __("Browse Frequently Asked Questions") }}</a>
            </div>
            <p class="main-para">{!! nl2br(e(home_content('faq.desc'))) !!}</p>

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
    @endif
    <!-- Faq Section -->

    <!-- Parteners Section -->
    @if (home_visible('partners'))
    <article class="parteners pd">
        <div class="container">
            <div class="flex-between pdb">
                <div>
                    <span class="pre-title site-color">{{ home_content('partners.pre_title') }}</span>
                    <h2 class="main-title">{{ home_content('partners.title') }}</h2>
                </div>
                <a href="{{ route('Site.partners.index') }}" class="site-color">{{ __("Meet Our Trusted Partners") }}</a>
            </div>
            <p class="main-para">{!! nl2br(e(home_content('partners.desc'))) !!}</p>

            <div class="flex-between align-center pdt">
                @foreach ($insurance_partners as $partner)
                    <img src="{{asset($partner->img)}}" alt="{{ $partner->name ?? 'Partner' }}" loading="lazy">
                @endforeach

            </div>

        </div>
    </article>
    @endif
    <!-- Parteners Section -->

    <!-- Contact us Section -->
     @include('components.contact-us')
    <!-- Contact us Section -->

</main>

@endsection

