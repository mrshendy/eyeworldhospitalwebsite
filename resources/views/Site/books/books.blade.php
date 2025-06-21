@extends('site')
@section('content')
	<main id="main">

        <article class="achievement pd">
            <div class="container">

                <section class="about flex-start  text-right align-center">
                    <div class="col-6 col-md-6 col-sm-12">
                        <div class="about-desc">
                            <h2 class="main-title">{{ $book_topic->title }}</h2>
                            <p class="main-para">
                                {{ $book_topic->desc }}
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-sm-12">
                        <figure class="about-image">
                            <img src="{{ $book_topic->img }}" alt="{{ $book_topic->title }}">
                        </figure>
                    </div>
                </section>
            </div>
        </article>


        <article class="videos-section pd">
			<div class="container">
				<div class="all-videos-holder height-auto flex-center row-gab-15">
                    @foreach ($book_topic->books as $book)
					<div class="col-4 col-md-6 col-sm-12">
						<div class="text-box">
							<div class="device-image">
								<img src="{{ $book->img }}" class="img-fluid" alt="">
							</div>
							<h4> {{ $book->title }}</h4>
							<p class="feedback">{{ $book->desc }}</p>
                            <div class="books d-flex justify-content-between align-items-center">
                                <a href="#" class="show-profile">
									{{ __('Add to cart Book + PDF') }}
								</a>
                                <strong class="text-bold">{{ $book->price + $book->pdf_price }} EGP</strong>
                            </div>
                            <div class="books d-flex justify-content-between align-items-center">
                                <a href="#" class="show-profile m-2 p-5">
									{{ __('Add to cart PDF Book') }}
								</a>
                                <strong class="text-bold">{{ $book->price }} EGP</strong>
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
