@extends('site')

@section('content')
    <main id="main">

        <!-- Cart Section -->
        <article class="cart-page pd">
            <div class="container">
                <span class="pre-title site-color">
                    هل أنت جاهز لإنهاء عملية الشراء؟ تحقق من سلتك الآن وأكمل خطوات الدفع لتستمتع بتجربة سلسة وسريعة.
                </span>
                <h2 class="main-title">
                    سلة التسوق: استعرض العناصر التي اخترتها وابدأ في إتمام عملية الدفع بسهولة وسرعة.
                </h2>
                <p class="main-para">
                    في صفحة "السلة"، يمكنك مراجعة كل العناصر التي قمت بإضافتها إلى سلتك. هذه الصفحة تتيح لك تعديل الكميات، حذف المنتجات، أو متابعة عملية الدفع. نحن هنا لنقدم لك تجربة تسوق مريحة وسلسة من البداية حتى النهاية. اضمن لك الحصول على المنتجات المفضلة لديك بأسرع وقت ممكن وبأفضل الأسعار.
                </p>

                <div class="flex-start pdt row-gap-15">
                    <div class="col-8 col-md-12">

                        <div class="cart-box">

                            <div class="title-bar">
                                <strong>المنتجات</strong>
                                <a href="#" class="delete-all" data-action="{{ route('Site.cart.deleteAll') }}">
                                    <img src="{{ asset('siteassets/images/trash.png') }}" width="24" height="24">
                                    <span>حذف كل العناصر</span>
                                </a>

                            </div>

                            <div class="products pdt">
                                @forelse ($cart->items as $item)
                                    <div class="product flex-start align-center" id="item-{{ $item->id }}">
                                        <img src="{{ $item->book->img }}" alt="{{ $item->book->title }}" width="68" height="68">
                                        <div class="flex-1">
                                            <h4>{{ $item->book->title }}</h4>
                                            @if($item->type == 'paper+pdf')
                                                <span>{{ __('Paper + PDF') }}</span>
                                            @elseif($item->type == 'pdf')
                                                <span>{{ __('PDF Only') }}</span>
                                            @endif
                                            <span id="price-{{ $item->id }}" class="site-color product-price">{{ $item->price * $item->quantity }} ج.م</span>
                                            <p>(السعر شامل الضريبة 15%)</p>
                                        </div>
                                        <div class="actions">
                                            <button class="delete-product delete-product btn btn-danger" data-id="{{ $item->id }}" >
                                                <img src="{{ asset('siteassets/images/trash.png') }}" width="24" height="24">
                                            </button>

                                            <div class="product-control">
                                                <button class="increase" data-id="{{ $item->id }}"><i class="fa fa-plus"></i></button>
                                                <span class="product-number" id="qty-{{ $item->id }}">{{ $item->quantity }}</span>
                                                <button class="decrease" data-id="{{ $item->id }}"><i class="fa fa-minus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>Cart is Empty</p>
                                @endforelse
                            </div>
                        </div>

                    </div>
                    <div class="col-4 col-md-12">
                        <div class="cart-box">
                            <div class="title-bar">
                                <strong>
                                    الإجمالى
                                </strong>
                            </div>
                            <div class="pdt brief-products" id="brief-products">
                                @foreach($cart->items as $item)
                                <div class="product-sm" id="summary-{{ $item->id }}">
                                    <span>(<span class="badge badge-primary">{{ $item->quantity }}</span>) {{ $item->book->title }} </span>
                                    <strong class="price-sm" id="summary-price-{{ $item->id }}">{{ $item->price * $item->quantity }}</strong>
                                </div>
                                @endforeach
                            </div>

                            <div class="total flex-between align-center">
                                <h5>المجموع</h5>
                                <h5 class="price-sm">{{ $cart->total_price }}</h5>
                            </div>
                            <a class="cart-go-checkout" href="{{ route('Site.Checkout') }}">{{ __('Go for Pay') }}</a>
                        </div>
                    </div>
                </div>

            </div>
        </article>
        <!-- Cart Section -->

        {{-- <section class="popup">
            <!-- Book Form -->
            <article class="book-form pd">
                <div class="container">
                    <div class="flex-start row-gap-15">
                        <div class="col-3 col-md-12">
                            <div class="steps">
                                <div class="step active">
                                    <div class="flex-start align-center">
                                        <div class="number">01</div>
                                        <div class="flex-1">
                                            <h3>البيانات</h3>
                                            <p>من فضلك ادخل بياناتك هنا</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="step">
                                    <div class="flex-start align-center">
                                        <div class="number">02</div>
                                        <div class="flex-1">
                                            <h3>بيانات الدفع</h3>
                                            <p>اختر طريقة الدفع التى تناسبك بأريحية</p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-9 col-md-12">
                            <form class="steps-holder" action="{{ route('Site.Order.make') }}" method="POST">
                                @csrf
                                <div class="step-content active">
                                    <div class="flex-between align-center">
                                        <h4>البيانات الشخصية</h4>
                                        <div class="btns flex-center">
                                            <div class="next">التالى</div>
                                        </div>
                                    </div>
                                    <div class="pdt">

                                        <div class="form-control">
                                            <div class="form-field">
                                                <label>الاسم</label>
                                                <div class="field">
                                                    <input type="text" name="name" placeholder="محمد الشريف" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-control">
                                            <div class="form-field">
                                                <label>البريد الإلكترونى</label>
                                                <div class="field">
                                                    <input type="email" name="email" placeholder="example@gmail.com" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-control">
                                            <div class="form-field">
                                                <label>الدولة</label>
                                                <div class="field">
                                                    <input type="text" name="country" placeholder="مصر" >
                                                </div>
                                            </div>

                                            <div class="form-field">
                                                <label>رقم الهاتف</label>
                                                <div class="field">
                                                    <input type="text" name="phone" placeholder="+201012345678" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-control">
                                            <div class="form-field flex-start align-center">
                                                <i class="fa-solid fa-check cart-check"></i>
                                                <h3>نسخة اوفلاين من الكتاب</h3>
                                            </div>
                                        </div>

                                        <div class="form-control">
                                            <div class="form-field">
                                                <label>اختر موقع التوصيل</label>
                                                <div class="field">
                                                    <input type="text" name="address" placeholder="مصر" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="step-content">
                                    <div class="flex-between align-center">
                                        <h4>بيانات الحجز</h4>
                                        <div class="btns flex-center">
                                            <div class="prev">السابق</div>
                                            <button type="submit" class="confirm">تأكيد الحجز</button>
                                        </div>
                                    </div>

                                    <div class="pdt brief-products">
                                        @foreach ($cart->items as $item)
                                        <div class="product-sm">
                                            <span>{{ $item->book->title }}</span>
                                            <strong class="price-sm">{{ $item->price * $item->quantity }} ج.م</strong>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="total flex-between align-center">
                                        <h5>المجموع</h5>
                                        <h5 class="price-sm">{{ $cart->total_price }} ج.م</h5>
                                    </div>



                                    <div class="pdt">
                                        <h4>طريقة الدفع</h4>

                                        <div class="payment-box">
                                            <input type="radio" name="payment_method" value="whatsapp" checked>
                                            <img src="{{ asset('siteassets/images/doctors/book/whatsapp.svg') }}" width="24">
                                            <span>واتساب</span>
                                        </div>

                                        <div class="payment-box">
                                            <input type="radio" name="payment_method" value="visa">
                                            <img src="{{ asset('siteassets/images/doctors/book/visa.svg') }}" width="24">
                                            <span>Visa</span>
                                        </div>

                                        <div class="payment-box">
                                            <input type="radio" name="payment_method" value="apple_pay">
                                            <img src="{{ asset('siteassets/images/doctors/book/pay.svg') }}" width="24">
                                            <span>Apple Pay</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <!-- Book Form -->
        </section> --}}

    </main>

    @include('components.contact-us')
@endsection



@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const CART_EMPTY_TEXT = @json(__('Cart is Empty'));
        const NO_PRODUCTS = @json(__('No Product in the Cart'));
        const MSG_BOOK_REMOVED = @json(__('Book Removed From Cart'));
        const All_BOOKS_REMOVED = @json(__('All Books Removed From Cart'));
        const ERROR_UPDATE = @json(__('Error While Updating'));
        const ERROR_DELETE = @json(__('Error While Deleting'));
        const PLEASE_TRY_LATER = @json(__('Please Try Later'))

        // DELETE item
        document.querySelectorAll('.delete-product').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;

                fetch(`/cart/remove/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(async res => {
                    if (!res.ok) {
                        const errorText = await res.text();
                        console.error("Delete failed:", errorText);
                        throw new Error("Delete failed");
                    }
                    return res.json();
                })
                .then(data => {
                    const item = document.getElementById('item-' + id);
                    if (item) item.remove();
                    const summary = document.getElementById('summary-' + id);
                    if (summary) summary.remove();

                    updateCartSummary(data.total);
                    if (document.querySelectorAll('.product').length === 0) {
                        document.querySelector('.products.pdt').innerHTML = `<p>${CART_EMPTY_TEXT}</p>`;
                        document.querySelector('.brief-products').innerHTML = `<p>${NO_PRODUCTS}</p>`;
                    }
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: MSG_BOOK_REMOVED,
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch(error => {
                    console.error('Error deleting:', error);
                    Swal.fire({
                        icon: 'error',
                        title: ERROR_DELETE,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
            });
        });

        // UPDATE quantity
        document.querySelectorAll('.increase, .decrease').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const action = this.classList.contains('increase') ? 'inc' : 'dec';

                fetch(`/ar/cart/update/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        action: action,
                        _method: 'PUT'
                    })
                })
                .then(async (res) => {
                    if (!res.ok) {
                        const errorText = await res.text();
                        console.error("Laravel error response:\n", errorText);
                        throw new Error("Server error, see above");
                    }
                    return res.json();
                })
                .then(data => {
                    document.getElementById('qty-' + id).innerText = data.quantity;
                    document.getElementById('price-' + id).innerText = data.total_item;
                    document.getElementById('summary-price-' + id).innerText = data.total_item;
                    document.querySelector(`#summary-${id} .badge`).innerText = data.quantity;

                    updateCartSummary(data.total_cart);
                })
                .catch(err => {
                    console.error("Error in fetch:", err);
                    Swal.fire({
                        icon: 'error',
                        title: ERROR_UPDATE,
                        text: PLEASE_TRY_LATER,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2500
                    });
                });
            });
        });

        if (document.querySelectorAll('.product').length === 0) {
            document.querySelector('.products.pdt').innerHTML = `<p>${CART_EMPTY_TEXT}</p>`;
        }

        function updateCartSummary(newTotal) {
            document.querySelectorAll('.total .price-sm').forEach(el => {
                el.innerText = newTotal + ' ج.م';
            });
        }

        // DELETE all items
        document.querySelector('.delete-all')?.addEventListener('click', function (e) {
            e.preventDefault();

            const actionUrl = this.dataset.action;

            fetch(actionUrl, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                document.querySelector('.products.pdt').innerHTML = `<p>${CART_EMPTY_TEXT}</p>`;
                document.getElementById('brief-products').innerHTML = `<p>${NO_PRODUCTS}</p>`;
                updateCartSummary(data.total);
                const cartTotalElements = document.getElementById('cart-total');
                if (cartTotalElements) {
                    cartTotalElements.innerHTML = '0 ج.م';
                }

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: All_BOOKS_REMOVED,
                    showConfirmButton: false,
                    timer: 1500
                });
            })
            .catch(err => {
                console.error('Error clearing cart:', err);
            });
        });
    });

</script>

@endsection
