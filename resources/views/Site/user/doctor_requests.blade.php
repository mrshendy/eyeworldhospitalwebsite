@extends('site')

@section('content')
   <main id="main">




		<article class="videos-section pd">
			<div class="container">


				<div class="flex-start">
					@include('siteLayout.sidebar')
					<div class="col-10 col-md-6 col-sm-12">
						<div class="all-videos-holder height-auto">

								<div class="flex-between align-center">
									<h4 class="settings-title">الطلبات</h4>
									<div class="filter flex-start align-center">
										<div class="filter-box">
											<span>حالة الحجز</span>
											<select name="status">
												<option>اختر</option>
											</select>
										</div>
										<div class="filter-box">
											<span>التاريخ</span>
											<select name="date">
												<option>اختر</option>
											</select>
										</div>
										<div class="filter-box">
											<span><i class="fa-solid  fa-search"></i></span>
											<input type="text" name="s" placeholder="البحث">
										</div>
									</div>
								</div>
								<div class="pdt">
									<div class="table-holder">


										<table class="book-table">
											<thead>
												<tr>
													<th>رقم الطلب</th>
													<th>تاريخ الطلب</th>
													<th>الكمية</th>
													<th>السعر</th>
													<th>الكل</th>
													<th>الحالة</th>
												</tr>
											</thead>
											<tbody>
                                                @forelse ($orders as $order)
                                                    <tr>
                                                        <td>#{{ $order->id }}</td>
                                                        <td>
                                                            {{ $order->created_at->format('d/m/Y') }}
                                                            <br>
                                                            {{ $order->created_at->format('h:i A') }}
                                                        </td>
                                                        <td>
                                                            {{ $order->items->sum('quantity') }}x
                                                        </td>

                                                        <td>
                                                            {{ number_format($order->items->sum(fn($item) => $item->price * $item->quantity)) }} ج.م
                                                        </td>

                                                        <td>
                                                            <strong class="price">{{ number_format($order->total) }} ج.م</strong>
                                                        </td>

                                                        <td>
                                                            <span class="complete">مكتمل</span>
                                                            <a href="{{ route("Site.doctor.order.show", $order->id) }}" class="show">
                                                                <i class="fa-solid fa-eye"></i>
                                                                عرض
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">لا يوجد طلبات بعد</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
										</table>

										<div class="pagination flex-start align-center">
											<a href="#" class="prev-nav">
												<i class="fa-solid fa-arrow-right"></i>
												<span>السابق</span>
											</a>
											<ul class="list-unstyled flex-center flex-1">
												<li><span class="current">1</span></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><span>....</span></li>
												<li><a href="">6</a></li>
											</ul>
											<a href="#" class="next-nav">
												<span>التالي</span>
												<i class="fa-solid fa-arrow-left"></i>
											</a>
										</div>
									</div>

									<a href="#" class="reserve-new">
										<i class="fa-solid fa-plus"></i>
										طلب  جديد
									</a>

								</div>

						</div>
					</div>
				</div>
			</div>
		</article>




	</main>
@endsection
