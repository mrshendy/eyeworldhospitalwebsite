@extends('site')
@section('content')
	<main id="main">

		<!-- Banner -->
		<article class="banner">
			<img src="{{asset('siteassets/images/specializations/main.svg')}}">
		</article>
		<!-- Banner -->

		<!-- Achievement Section -->
		<article class="achievement pd">
			<div class="container">

				<!-- About  -->
				<section class="about flex-start  text-right align-center">
					<div class="col-6 col-md-6 col-sm-12">
						<div class="about-desc">
							<span class="pre-title site-color">{{ $book_info->title }}</span>
							<h2 class="main-title">{{ $book_info->sub_title }}</h2>
							<p class="main-para">
                                {{ $book_info->description }}
							</p>
						</div>
					</div>
					<div class="col-6 col-md-6 col-sm-12">
						<figure class="about-image">
							<img src="{{asset('uploads/books/' . $book_info->img)}}" class="img-fluid">
						</figure>
					</div>
				</section>
				<!-- About  -->




			</div>
		</article>

		<!-- Achievement Section -->

		<article class="videos-section pd">
			<div class="container">

				<h2 class="main-title">
					من فئات الكتب العلمية
				</h2>



				<div class="all-videos-holder height-auto flex-center row-gab-15">

					@foreach ($bookTopics as $topic)
						<div class="col-4 col-md-6 col-sm-12">
							<div class="text-box text-center">
								<div class="device-image">
									<img src="{{asset('siteassets/images/medical/categories/' . $topic->id . '.svg')}}" alt="">
								</div>
								<h4>{{ $topic->name }}</h4>
								<p class="feedback">
									{{ $topic->description }}
								</p>
								<a href="#" class="show-profile">
									عرض الكتب
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
