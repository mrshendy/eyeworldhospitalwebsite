
@extends('site')

@section('content')
    <main id="main">

        <!-- Banner -->
        <article class="banner">
            <img src="{{asset('uploads/medical-devices/banner.jpg')}}">
        </article>
        <!-- Banner -->

        <!-- Achievement Section -->
        <article class="achievement pd">
            <div class="container">

                <!-- About  -->
                <section class="about flex-start  text-right align-center">
                    <div class="col-6 col-md-6 col-sm-12">
                        <div class="about-desc">
                            <h2 class="main-title">{{ $medical_academy->title }}</h2>
                            <p class="main-para">
                                {{ $medical_academy->description }}
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-sm-12">
                        <figure class="about-image">
                            <img src="{{ asset('uploads/medical-academies/' . $medical_academy->img) }}" alt="{{ $medical_academy->title }}">
                        </figure>
                    </div>
                </section>
                <!-- About  -->




            </div>
        </article>

        <!-- Achievement Section -->

        <article class="videos-section pd">
            <div class="container">
                <h2 class="main-title">من المواضيع العملية</h2>
                <div class="all-videos-holder flex-center row-gab-15">
                    @foreach ($medical_academy->videos as $video)
                    <div class="col-4 col-md-6 col-sm-12">
                        <div class="video-box">
                            <div class="image-holder" style="background-image: url('{{ asset('uploads/medical-academy-videos/' . $video->img) }}');">
                                <a href="{{ $video->video_url }}">
                                    <img src="{{ asset('uploads/medical-academies/thumbnails/icon.svg') }}">
                                </a>
                            </div>
                            <div class="video-dtl">
                                <h3>{{ $video->title }}</h3>
                                <p>{{ $video->description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </article>

        @include('components.contact-us')
    </main>

@endsection

