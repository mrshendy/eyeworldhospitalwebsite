@extends('site')
@section('content')


<main id="main">
		
    <!-- Banner -->
    <article class="banner">
        <img src="{{asset('siteassets/images/specializations/main.svg')}}">
    </article>
    <!-- Banner -->

    <!-- Achievement Section -->
    <article class="achievement pd">
        <div class="container">

            <!-- About  -->
            <section class="about flex-start  text-right align-center">
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="about-desc">
                        <span class="pre-title site-color">{{$info->title}}</span>
                        <h2 class="main-title">{{$info->subtitle}}</h2>
                        <p class="main-para"> {{$info->desc}} 
                        </p>
                    </div>	
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <figure class="about-image">
                        <img src="{{asset('siteassets/images/videos/main.svg')}}" alt="">
                    </figure>
                </div>
            </section>
            <!-- About  -->


                

        </div>
    </article>
    <!-- Achievement Section -->


    <article class="videos-section pd">
        <div class="container">
            <div class="flex-start">
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="aside-tabs">
                        @foreach ($topics as $topic)
                            <a href="" class="aside-tab flex-between align-center @if ($topic->id == $topic_id)
                                 active
                            @endif">
                                <div class="flex-1">
                                    <h3>{{$topic->title}}</h3>
                                    {{-- <p>خطوات بسيطة تحافظ على صحة العين</p> --}}
                                </div>
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>		
                        @endforeach

                    </div>
                </div>
                <div class="col-9 col-md-6 col-sm-12">
                    <div class="all-videos-holder flex-center row-gab-15" style="min-height: 500px;">


                        @foreach ($videos as $video)
                            <div class="col-6 col-md-6 col-sm-12">
                                <div class="video-box">
                                    <a href="{{ $video->link }}" target="_blank"> {{-- Open in new tab --}}
                                        <div class="image-holder" style="background-image: url({{ $video->img }});">
                                            <img src="{{ asset('siteassets/images/videos/icon.svg') }}">
                                        </div>
                                    </a>
                                    <div class="video-dtl">
                                        <h3> {{$video->title}}</h3>
                                        <p>{{$video->desc}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </article>

    <article class="video-holder-wrapper"></article>

    <!-- Contact us Section -->
    @include('components.contact-us')
    <!-- Contact us Section -->


</main>


@endsection