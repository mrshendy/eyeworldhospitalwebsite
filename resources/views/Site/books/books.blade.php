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
								<img src="{{ $book->img }}" class="img-fluid" alt="{{ $book->title }}">
							</div>
							<h4> {{ $book->title }}</h4>
							<p class="feedback">{{ $book->desc }}</p>
                            @if($book->count > 0)
                                <div class="books d-flex justify-content-between align-items-center">
                                    <button class="show-profile add-to-cart"
                                            data-book-id="{{ $book->id }}"
                                            data-type="paper+pdf"
                                            data-price="{{ $book->price + $book->pdf_price }}">
                                        {{ __('Add to cart Book + PDF') }}
                                    </button>
                                    <strong class="text-bold">{{ $book->price + $book->pdf_price }} EGP</strong>
                                </div>
                            @else
                                <div class="books d-flex justify-content-between align-items-center">
                                    <button class="show-profile" disabled>{{ __('(Paper + PDF) Sold Out') }}</button>
                                    <strong class="text-bold">{{ $book->price + $book->pdf_price }} EGP</strong>
                                </div>
                            @endif

                            <div class="books d-flex justify-content-between align-items-center">
                                <button class="show-profile add-to-cart"
                                        data-book-id="{{ $book->id }}"
                                        data-type="pdf"
                                        data-price="{{ $book->pdf_price }}">
                                    {{ __('Add to cart PDF Book') }}
                                </button>
                                <strong class="text-bold">{{ $book->pdf_price }} EGP</strong>
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
@section('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                const isLoggedIn = @json(auth()->check());
                const NOT_LOGIN = @json(__('You Must Login First'));
                const NOT_LOGIN_TEXT = @json(__('You Must Login to Add Book To Cart'));
                const LOGIN = @json(__('Login'));
                const EXIT = @json(__('Exit'));



                if (!isLoggedIn) {
                    Swal.fire({
                        title: NOT_LOGIN,
                        text: NOT_LOGIN_TEXT,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: LOGIN,
                        cancelButtonText: EXIT
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('Site.login') }}";
                        }
                    });
                    return;
                }

                const bookId = this.dataset.bookId;
                price = this.dataset.price;
                const type = this.dataset.type;

                fetch("{{ route('Site.cart.add') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                    book_id: bookId,
                    type: type,
                    price: price,
                    quantity: 1
                })
                })
                .then(res => res.json())
                .then(data => {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: data.status === 'success' ? 'success' : 'error',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                })
                .catch(err => {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Something went wrong!',
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
            });
        });
    });
</script>

@endsection
