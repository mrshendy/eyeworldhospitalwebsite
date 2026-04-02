@extends('site')

@section('content')
<main id="main">

    <!-- Banner -->
    <article class="banner">
        <img src="{{asset('uploads/medical-devices/banner.jpg')}}" alt="Medical Academies Banner">
    </article>
    <!-- Banner -->

    <!-- Info Section -->
    <article class="achievement pd">
        <div class="container">
            <section class="about flex-start  text-right align-center">
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="about-desc">
                        <span class="pre-title site-color">{{ $medical_academy_info->title }}</span>
                        <h2 class="main-title">{{ $medical_academy_info->sub_title }}</h2>
                        <p class="main-para">
                            {{ $medical_academy_info->description }}
                        </p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <figure class="about-image">
                        <img src={{ asset('uploads/medical-academies/' . $medical_academy_info->img) }} alt="{{ $medical_academy_info->title }}">
                    </figure>
                </div>
            </section>
        </div>
    </article>

    <!-- Achievement Section -->

    <article class="videos-section pd">
        <div class="container">
            <h2 class="main-title">
                من المواضيع العملية
            </h2>
            <div class="all-videos-holder height-auto flex-center row-gab-15">
                @foreach ($medical_academies as $academy)
                    <div class="col-4 col-md-6 col-sm-12">
                        <div class="text-box text-center">
                            <div class="device-image">
                                <img src="{{ asset('uploads/medical-academies/' . $academy->img) }}" alt="{{ $academy->title }}">
                            </div>
                            <h4>{{ $academy->title }}</h4>
                            <p class="feedback">
                                {{ $academy->description }}
                            </p>
                            <a href="{{ route('Site.medical-academy.show', $academy->slug) }}" class="show-profile">
                                عرض الفيديوهات
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </article>
    @include('components.contact-us')
</main>
@endsection

