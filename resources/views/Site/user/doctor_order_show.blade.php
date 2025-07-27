@extends('site')

@section('content')
    <main id="main">
		<article class="videos-section pd">
			<div class="container">

				<div class="flex-between align-center">
					<h3>
						تفاصيل الطلب
						<span class="site-color">#{{ $order->id }}</span>
					</h3>

					<a href="" class="btn-reserve">
						قيم الخدمة
					</a>
				</div>
				<div class="flex-start">
					@include('siteLayout.sidebar')
					<div class="col-10 col-md-6 col-sm-12">

						<div class="flex-start">
							<div class="col-8 col-md-12">
								<div class="cart-box">

									<div class="flex-between align-center">
										<span class="reserve-number">#{{ $order->id }}</span>
										<div class="cats">
											<span class="complete">مكتمل</span>
										</div>
									</div>

									<h5>
										حجز عادى:
									    <strong class="site-color">{{ number_format($order->total) }} ج.م</strong>
									</h5>


									<div class="doctor-details flex-between">
										<div class="flex-start align-center">
											<img src="../images/settings/Avatar.svg" alt="" width="40" height="40">
											<div class="flex-1">
												<h3>{{ $order->user->name }}</h3>
												<p>{{ $order->user->specialtie }}</p>
											</div>
										</div>


									</div>

									<div class="doctor-info flex-between align-center">
										<h4>
											المنتجات
										</h4>
										<a href="" class="site-color">
											<i class="fa-solid fa-plus"></i>
											أطلب الكل مجددا
										</a>
									</div>

									<div class="table-holder">
										<table class="book-table">
											<thead>
												<tr>
													<th>المنتج</th>
													<th>السعر</th>
												</tr>
											</thead>
											<tbody>
                                               @foreach($order->items as $item)
												<tr>
													<td>
														<div class="flex-start  tbl align-center">
															<img src="{{ asset('uploads/books/' . $item->book->img) }}" width="40" height="40">
															<span>{{ $item->book->title }}</span>
														</div>
													</td>
													<td>
														<div class="flex-start align-center">

															<strong class="site-color price">{{ number_format($item->price * $item->quantity) }} ج.م</strong>
															<a href="{{ route('Site.book.download', $item->book_id) }}" class="dw site-color">
																<img src="{{ asset('images/patients/download.svg') }}" width="24" height="24" alt="">
																تحميل الكتاب
															</a>
														</div>
													</td>
												</tr>
                                                @endforeach
											</tbody>
										</table>
									</div>


								</div>

							</div>
							<div class="col-4 col-md-12">
								<div class="cart-box">
									<h3>البيانات الشخصية</h3>
									<div class="li">
										<img src="../images/settings/profile.svg" alt="" width="24" height="24">
										<span>محمد الشريف</span>
									</div>

									<div class="li">
										<img src="../images/settings/location.svg" alt="" width="24" height="24">
										<span>مدينة المنصوره، الدقهلية ، مصر</span>
									</div>

									<div class="li">
										<img src="../images/settings/call-calling.svg" alt="" width="24" height="24">
										<span>+201012345678</span>
									</div>
								</div>
								<div class="cart-box">

									<h3>تفاصيل الدفع</h3>

									<div class="li">
										<img src="../images/settings/cards.svg" alt="" width="24" height="24">
										<span class="site-color">الدفع كاش</span>
									</div>

									<div class="li flex-between align-center">
										<span>حجز عادى:</span>
										<span>567 ج.م</span>
									</div>

									<div class="li flex-between align-center">
										<span>المجموع الفرعي</span>
										<span>980</span>
									</div>

									<div class="li flex-between  title-color align-center">
										<strong>المجموع</strong>
									    <span>{{ number_format($order->total) }} ج.م</span>
									</div>

								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</article>
	</main>

@endsection
