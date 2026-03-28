@extends('site')


@section('styles')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>One conference</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">

@section('content')


	<main id="main">

		<!-- Achievement Section -->
		<article class="achievement pd">
			<div class="container">

				<!-- About  -->
				<section class="about flex-start  text-right align-center">
					<div class="col-6 col-md-6 col-sm-12">
						<div class="about-desc">
							<h2 class="main-title">{{ $conference->title }}</h2>
							<p class="main-para">
                                {{ $conference->detail_description }}
                            </p>
                            <a href="{{ route('Site.conference.booking', $conference->slug) }}" class="show-profile" style="width: 70%">
                                {{ __('Attend Conference') }}
                            </a>

						</div>
					</div>
					<div class="col-6 col-md-6 col-sm-12">
						<figure class="about-image">
						<img src="{{ asset('uploads/conferences/' . $conference->img) }}" alt="{{ $conference->title }}">
						</figure>
					</div>
				</section>
                <!-- About  -->
			</div>
		</article>

        <article class="patients-rights pd">
            <div class="container">
                <h2 class="main-title">من خدماتنا المميزة</h2>
                <div class="pdt flex-start row-gap-15">
                    @foreach ($conference->advantages as $advantage)
                        <div class="col-4 col-md-6 col-sm-12">
                            <div class="rights-box flex-start">
                                <img src="{{ asset('uploads/conferences/emoji-normal.png') }}" width="24" height="24" alt="Advantage indicator">
                                <div class="flex-1">
                                    <h4>{{ $advantage->advantage_title }}</h4>
                                    <p>{{ $advantage->advantage_description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>

        <div class="container">
            <h2 class="main-title">من صور المؤتمر</h2>
            <article class="slider">
                    <div class="owl-slider owl-carousel">
                    @foreach ($conference->images as $img)
                        <div class="item" style="background-image:url(../images/slider/1.jpg)">
                            <div class="container h-100">
                                <div class="slider-details h-100 flex-column">
                                    <img src="{{ asset('uploads/conferences/' . $img->image) }}" class="img-fluid" alt="{{ $conference->title }} Photo" style="width:100%; height:auto;">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </article>
        </div>

        <article class="patients-rights pd">
            <div class="container">
                <h2 class="main-title">{{ __('Global Doctors') }}</h2>

                <div class="pdt flex-start row-gap-15">
                    @foreach ($conference->globalDoctors as $global)
                        <div class="col-4 col-md-6 col-sm-12">
                            <div class="rights-box flex-start">
                                <img src="{{ asset('uploads/conference-doctors/' . $global->img) }}" width="150" height="150" alt="{{ $global->name }}">
                                <div class="flex-1">
                                    <h4>{{ $global->name }}</h4>
                                    <p>{{ $global->specialty }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>

        <article class="patients-rights pd">
            <div class="container">
                <h2 class="main-title">{{ __('Local Doctors') }}</h2>
                <div class="pdt flex-start row-gap-15">
                    @foreach ($conference->localDoctors as $doctor)
                        <div class="col-4 col-md-6 col-sm-12">
                            <div class="rights-box flex-start">
                                <img src="{{ asset('uploads/conference-doctors/' . $doctor->img) }}" width="150" height="150" alt="Dr. {{ $doctor->name }}">
                                <div class="flex-1">
                                    <h4>{{ $doctor->name }}</h4>
                                    <p>{{ $doctor->specialty }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>


        <article class="videos-section pd">
			<div class="container">

				<h2 class="main-title">
                من المؤسسات الداعمة
				</h2>

				<div class="all-videos-holder height-auto flex-center row-gab-15">
                    <div class="all-videos-holder height-auto flex-center row-gab-15">
                        @foreach ($conference->charities as $charity)
                            <div class="col-2">
                                <div class="text-box ">
                                        <img src="{{ $charity->img }}" class="img-fluid" alt="{{ $charity->title }}" style="width:100%; height:auto;">
                                </div>
                            </div>
                        @endforeach
                    </div>
				</div>

			</div>
		</article>
	</main>

    @include('components.contact-us')

@endsection

@section('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>

@endsection
