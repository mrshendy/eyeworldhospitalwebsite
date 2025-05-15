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
							<span class="pre-title site-color">{{ $medical_tourism_info->title }}</span>
							<h2 class="main-title">{{ $medical_tourism_info->sub_title }}</h2>
							<p class="main-para">{{ $medical_tourism_info->description }}</p>

						</div>
					</div>
					<div class="col-6 col-md-6 col-sm-12">
						<figure class="about-image">
                            <img src="{{ asset('uploads/medical-tourisms/' . $medical_tourism_info->img) }}">
						</figure>
					</div>
				</section>
				<!-- About  -->




			</div>
		</article>
		<!-- Achievement Section -->

		<!-- Hosptial Visit -->

		<article class="hospital-visit pd">
			<div class="container">
				<div class="flex-start row-gap-15">
					<div class="col-6 col-md-6 col-sm-12">
						<div class="visit-box">
							<h2 class="main-title">
								زيارة المستشفى
							</h2>
							<p class="main-para">
								نحن في انتظارك لزيارة مستشفانا، حيث نوفر لك تجربة علاجية استثنائية مع أحدث التقنيات.
							</p>
							<a href="#" class="visit">
								حجز زيارة
							</a>
						</div>
					</div>
					<div class="col-6 col-md-6 col-sm-12">
						<div class="visit-box">
							<h2 class="main-title">
								مناقشة اونلاين
							</h2>
							<p class="main-para">
								تواصل مع أطبائنا عبر الإنترنت لبدء استشارتك الطبية، مع أفضل النصائح والعلاج المتاح.
							</p>
							<a href="#" class="visit">
								حجز مناقشة
							</a>
						</div>
					</div>
				</div>
			</div>
		</article>

		<!-- Hosptial Visit -->

		<article class="patients-rights pd">
			<div class="container">
				<h2 class="main-title">من خدماتنا المميزة</h2>
				<div class="pdt flex-start row-gap-15">
                    @foreach ($medical_tourism_services as $service)
                        <div class="col-4 col-md-6 col-sm-12">
                            <div class="rights-box flex-start">
                                <img src="{{ asset('uploads/medical-tourisms/emoji-happy.svg') }}" width="24" height="24" alt="">
                                <div class="flex-1">
                                    <h4>{{ $service->title }}</h4>
                                    <p>{{ $service->description }}</p>
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
