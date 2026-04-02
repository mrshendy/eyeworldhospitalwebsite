@extends('site')

@section('content')
    <main id="main">

        <!-- Banner -->
         <article class="banner">
            <img src="{{asset('uploads/medical-devices/banner.jpg')}}" alt="Contact Us Banner">
        </article>
        <!-- Banner -->

        <!-- Contact info -->
        <article class="contact-us pd">
            <div class="container">
                <div class="flex-start contact-holder">
                    <div class="col-4 col-sm-12">
                        <div class="con-box">
                            <img src="{{ asset('uploads/contact/call.svg') }}" alt="Phone" width="38" height="38">
                            <p>1112345678, 16465</p>
                        </div>
                    </div>
                    <div class="col-4 col-sm-12">
                        <div class="con-box">
                            <img src="{{ asset('uploads/contact/msg.svg') }}" alt="Email" width="38" height="38">
                            <p>info@eyeworldhospital.com Help.eyeworldhospital@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-4 col-sm-12">
                        <div class="con-box">
                            <img src="{{ asset('uploads/contact/location.svg') }}" alt="Address" width="38" height="38">
                            <p>12 مصدق، الدقي، الدقي، محافظة الجيزة 12611</p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <!-- Contact info -->

        <!-- Map -->
        <article class="map pd">
            <div class="container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d440432.00592018344!2d31.890609856335!3d30.411286880369737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sel%20tahrir!5e0!3m2!1sar!2seg!4v1740494790512!5m2!1sar!2seg" width="100%" height="450"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </article>
        <!-- Map -->

        @include('components.contact-us')
    </main>

@endsection

