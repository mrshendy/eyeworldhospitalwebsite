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
									<h4 class="settings-title">الحجوزات</h4>
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
													<th>رقم الحجز</th>
													<th>تاريخ الحجز</th>
													<th>الطبيب المعالج</th>
													<th>جهة الحجز</th>
													<th>نوع الحجز</th>
													<th>الكل</th>
													<th>الحالة</th>
												</tr>
											</thead>
											<tbody>
                                                @forelse ($reservations as $reservation)
                                                    <tr>
                                                        <td>#{{ $reservation->id }}</td>
                                                        <td>
                                                            {{ $reservation->created_at->format('d/m/Y') }}
                                                            <br>
                                                            {{ $reservation->created_at->format('h:i A') }}
                                                        </td>
                                                        <td>
                                                            <div class="flex-start align-center">
                                                                <img src="{{ $reservation->doctor->img }}" alt="" width="40" height="40">
                                                                <div class="flex-1">
                                                                    <h3>{{ $reservation->doctor->info->name }}</h3>
                                                                    <p>{{ $reservation->doctor->info->job_title }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="distination">{{ $reservation->type == "normal" ? __('Normal') : __('Urgent') }}</span>
                                                        </td>
                                                        <td>
                                                            {{ $reservation->type == "normal" ? __('Normal') : __('Urgent') }}
                                                        </td>
                                                        <td>
                                                            <strong class="price">{{ $reservation->price }} ج.م</strong>
                                                        </td>
                                                        <td>
                                                             @if ($reservation->status == 'pending')
                                                                <span class="complete">{{ __("Pending") }}</span>
                                                            @elseif ($reservation->status == 'attended')
                                                                <span class="complete">{{ __("Attended") }}</span>
                                                            @elseif ($reservation->status == 'cancelled')
                                                                <span class="pending">{{ __("Cancelled") }}</span>
                                                            @endif


                                                            <a href="{{ route('Site.user_reservations.show', $reservation->id) }}" class="show">
                                                                <i class="fa-solid fa-eye"></i>
                                                                عرض
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    {{ __('No reservations found') }}
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

									<a href="{{ route('Site.teams.index', 1) }}" class="reserve-new">
										<i class="fa-solid fa-plus"></i>
										حجز جديد
									</a>
								</div>

						</div>
					</div>
				</div>
			</div>
		</article>
	</main>
@endsection

