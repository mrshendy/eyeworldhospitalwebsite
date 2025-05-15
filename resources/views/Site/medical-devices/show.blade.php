
@extends('site')

@section('content')

	<main id="main">

		<!-- Banner -->
		<article class="banner">
            <img src="{{ asset('uploads/medical-devices/' . $medical_device->img) }}" class="img-fluid" alt="">
		</article>
		<!-- Banner -->

		<article class="single">
			<div class="container">
                {!! $medical_device->description !!}
            </div>
		</article>

		<article class="videos-section pd">
			<div class="container">
				<span class="pre-title site-color">
                    {{ $medical_device->title }}
				</span>
				<h2 class="main-title">
                    {{ $medical_device->sub_title }}
				</h2>
				<p class="main-para">
					نقدم أحدث الأجهزة العلاجية المصممة لتلبية أعلى المعايير الطبية. تعمل تقنياتنا على تحسين كفاءة العلاج وتوفير الراحة للمرضى، مع ضمان تقديم تجربة طبية فريدة تلبي احتياجاتهم بدقة.
				</p>

				<div class="all-videos-holder height-auto flex-center row-gab-15">
                    @foreach ($medical_devices as $medical_device)
					<div class="col-3 col-md-6 col-sm-12">
						<div class="text-box text-center">
							<div class="device-image">
								<img src="{{ asset('uploads/medical-devices/' . $medical_device->img) }}" class="img-fluid" alt="">
							</div>
							<h4> {{ $medical_device->title }}</h4>
							<p class="feedback">{{ $medical_device->sub_title }}</p>
							<a href="#" class="show-profile">
								اقرأ المزيد
							</a>
						</div>
					</div>
                    @endforeach

				</div>


			</div>
		</article>
	</main>
    @include('components.contact-us')

@endsection
