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
							<span class="pre-title site-color">{{ $conference_info->title }}</span>
							<h2 class="main-title">{{ $conference_info->sub_title }}</h2>
							<p class="main-para">{{ $conference_info->description }}</p>
						</div>
					</div>
					<div class="col-6 col-md-6 col-sm-12">
						<figure class="about-image">
							<img src={{ asset('uploads/conferences/' . $conference_info->img) }} class="img-fluid">
						</figure>
					</div>
				</section>
				<!-- About  -->

			</div>
		</article>

		<!-- current conferences Section -->

		<article class="videos-section pd">
			<div class="container">

				<h2 class="main-title">
					من المؤتمرات العلمية الحالية
				</h2>

				<div class="all-videos-holder height-auto flex-center row-gab-15">
                    @forelse ($upcomingConferences as $conference)
                        <div class="col-4 col-md-6 col-sm-12">
                            <div class="text-box ">
                                <div class="device-image">
                                    <img src={{ asset('uploads/conferences/' . $conference->img) }} alt="">
                                </div>
                                <h4>{{ $conference->title }}</h4>
                                <p class="feedback">{{ $conference->description}}</p>
                                <p class="time-date">
                                    <img src="{{ asset('uploads/conferences/calendar.png') }}" alt="" width="32">
                                    @php
                                    $locale = app()->getLocale();
                                    \Carbon\Carbon::setLocale($locale);

                                    $start = \Carbon\Carbon::parse($conference->start_date);
                                    $end = \Carbon\Carbon::parse($conference->end_date);

                                    $startDay = $start->format('d');
                                    $endDay = $end->format('d');
                                    if ($locale === 'ar') {
                                        $month = $start->translatedFormat('F');
                                    } else {
                                        $month = $start->format('F');
                                    }

                                    $year = $start->format('Y');
                                    @endphp

                                <span>{{ $startDay }}-{{ $endDay }} {{ $month }} {{ $year }}</span>
                                </p>
                                <a href="{{ route('Site.conference.show', $conference->id) }}" class="show-profile">
                                {{ __('show_details') }}
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center">{{__("no_upcoming_conference_yet")}}</p>
                        </div>
                    @endforelse

				</div>

			</div>
		</article>
		<!-- current conferences Section -->

		<!-- previous conferences Section -->

		<article class="videos-section pd">
			<div class="container">

				<h2 class="main-title">
					من المؤتمرات العلمية السابقة
				</h2>
				<div class="all-videos-holder height-auto flex-center row-gab-15">

                    @forelse ($previousConferences as $conference)
                    <div class="col-4 col-md-6 col-sm-12">
                        <div class="text-box ">
                            <div class="device-image">
                                <img src={{ asset('uploads/conferences/' . $conference->img) }} alt="">
                            </div>
                            <h4>{{ $conference->title }}</h4>
                            <p class="feedback">{{ $conference->description}}</p>
                            <p class="time-date">
                                <img src="{{ asset('uploads/conferences/calendar.png') }}" alt="" width="32">
                                @php
                                $locale = app()->getLocale();
                                \Carbon\Carbon::setLocale($locale);

                                $start = \Carbon\Carbon::parse($conference->start_date);
                                $end = \Carbon\Carbon::parse($conference->end_date);

                                $startDay = $start->format('d');
                                $endDay = $end->format('d');
                                if ($locale === 'ar') {
                                    $month = $start->translatedFormat('F');
                                } else {
                                    $month = $start->format('F');
                                }

                                $year = $start->format('Y');
                                @endphp

                            <span>{{ $startDay }}-{{ $endDay }} {{ $month }} {{ $year }}</span>
                            </p>
                            <a href="#" class="show-profile">
                                {{ __('show_details') }}
                            </a>
                        </div>
                    </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center">{{__("no_upcoming_conference_yet")}}</p>
                        </div>
                    @endforelse

				</div>
			</div>
		</article>

        @include('components.contact-us')

	</main>
@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $('.specialty-link').on('click', function (e) {
            e.preventDefault();
            var specialtyId = $(this).data('id');

            $.ajax({
                url: "{{ route('Site.getMedicalDevicesBySpecialty') }}",
                method: 'GET',
                data: { specialty_id: specialtyId },
                success: function (response) {
                    $('#medical-device-cards').html(response.html);
                },
                error: function () {
                    alert('حدث خطأ أثناء جلب البيانات.');
                }
            });
        });
    </script>
@endsection
