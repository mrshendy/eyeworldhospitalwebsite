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
                        <span class="pre-title site-color">{{$medical_device->title}}</span>
                        <h2 class="main-title">{{$medical_device->sub_title}}</h2>
                        <p class="main-para"> {!! $medical_device->description !!}  </p>
                    </div>
                </div>
            </section>


        </div>
    </article>
    <!-- Achievement Section -->



</main>


@endsection
