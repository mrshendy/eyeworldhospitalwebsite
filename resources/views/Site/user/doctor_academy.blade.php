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
									الأكاديمية
								</h2>
								<p class="main-para">
									هنا يمكنك ايجاد كافة المواضيع العلمية التى ابديت اهتمامك بها
								</p>
							</div>

							<a href="{{ route('Site.medical-academy.index') }}" class="discover">
								اكتشف المزيد
							</a>

						</div>

                        <div class="all-videos-holder height-auto flex-center row-gab-15">
                        @foreach ($academies as $academy)
                            <div class="col-4 col-md-6 col-sm-12">
                                <div class="text-box text-center">
                                    <div class="device-image">
                                        <img src="{{ asset('uploads/medical-academies/' . $academy->img) }}" alt="{{ $academy->title }}">
                                    </div>
                                    <h4>{{ $academy->title }}</h4>
                                    <p class="feedback">
                                        {{ $academy->description }}
                                    </p>
                                    <a href="{{ route('Site.medical-academy.show', $academy->id) }}" class="show-profile">
                                        عرض الفيديوهات
                                    </a>
                                </div>
                            </div>
                        @endforeach
					</div>
				</div>
			</div>
		</article>


	</main>
@endsection
