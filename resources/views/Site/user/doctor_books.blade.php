@extends('site')

@section('content')
    	<main id="main">




		<article class="videos-section pd">
			<div class="container">
				<div class="flex-start">
					@include('siteLayout.sidebar')
					<div class="col-10 col-md-6 col-sm-12">
						<div class="flex-between align-center">
							<div>
								<h2 class="main-title">كتبى</h2>
								<p class="main-para">هنا يمكنك ايجاد كافة الكتب التى قمت بشراءها</p>
							</div>
							<a href="" class="discover">
								اكتشف المزيد
							</a>
						</div>
						<div class="all-videos-holder height-auto flex-center row-gab-15">
                            @foreach ($books as $book)
                                <div class="col-4 col-md-6 col-sm-12">
                                    <div class="text-box ">
                                        <div class="device-image">
                                            <img src="{{ asset('uploads/books/' . $book->img) }}" alt="{{ $book->title }}">
                                        </div>
                                        <h4>{{ $book->title }}</h4>

                                        <p class="feedback">
                                            {{ $book->desc }}
                                        </p>

                                        <a href="{{ route('Site.book.download', $book->id) }}" class="show-profile">
                                        تحميل الكتاب
                                        </a>
                                    </div>
                                </div>
                            @endforeach

						</div>
					</div>
				</div>
			</div>
		</article>




	</main>

@endsection
