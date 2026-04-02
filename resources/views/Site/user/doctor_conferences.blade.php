@extends('site')

@section('content')
    <main id="main">
		<article class="videos-section pd">
			<div class="container">
				<div class="flex-start">
                    @include('siteLayout.sidebar')
					<div class="col-10 col-md-6 col-sm-12">

						<div class="flex-between">
							<div>
								<h2 class="main-title">
									المؤتمرات
								</h2>
								<p class="main-para">
									هنا يمكنك ايجاد كافة المؤتمرات التى ابديت اهتمامك بها
								</p>
							</div>

							<a href="{{ route('Site.conference.index') }}" class="discover">
								اكتشف المزيد
							</a>

						</div>

						<div class="all-videos-holder height-auto flex-center row-gab-15">
                            @forelse ($conferences as $conference)
                                <div class="col-4 col-md-6 col-sm-12">
                                    <div class="text-box ">
                                        <div class="device-image">
                                            <img src={{ asset('uploads/conferences/' . $conference->img) }} alt="{{ $conference->title }}">
                                        </div>
                                        <h4>{{ $conference->title }}</h4>
                                        <p class="feedback">{{ $conference->description}}</p>
                                        <p class="time-date">
                                            <img src="{{ asset('uploads/conferences/calendar.png') }}" alt="Calendar" width="32">
                                            @php
                                                $locale = app()->getLocale();
                                                \Carbon\Carbon::setLocale($locale);

                                                $start = \Carbon\Carbon::parse($conference->start_date);
                                                $end = \Carbon\Carbon::parse($conference->end_date);

                                                $startDay = $start->format('d');
                                                $endDay = $end->format('d');

                                                $startMonth = $locale === 'ar' ? $start->translatedFormat('F') : $start->format('F');
                                                $endMonth = $locale === 'ar' ? $end->translatedFormat('F') : $end->format('F');

                                                $startYear = $start->format('Y');
                                                $endYear = $end->format('Y');
                                            @endphp


                                            @if ($startMonth === $endMonth && $startYear === $endYear)
                                                <span>{{ $startDay }} - {{ $endDay }} {{ $startMonth }} {{ $startYear }}</span>
                                            @else
                                                <span>{{ $startDay }} {{ $startMonth }} {{ $startYear }} - {{ $endDay }} {{ $endMonth }} {{ $endYear }}</span>
                                            @endif
                                        </p>
                                        <a href="{{ route('Site.conference.show', $conference->slug) }}" class="show-profile">
                                        {{ __('show_details') }}
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center">{{__("There is no Upcoming Conferences Yet!")}}</p>
                                </div>
                            @endforelse

						</div>


					</div>
				</div>
			</div>
		</article>


	</main>


@endsection
