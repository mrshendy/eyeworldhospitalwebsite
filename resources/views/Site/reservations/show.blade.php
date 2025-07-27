@extends('site')

@section('content')

<main id="main">
		<article class="videos-section pd">
			<div class="container">

				<div class="flex-between details-bar pdb align-center">
					<h3>تفاصيل الحجز  <span class="site-color">#{{ $reservation->id }}</span></h3>
                    @if ($reservation->status != 'cancelled')
                        <form action="{{ route('Site.user_reservations.cancel', $reservation->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="cancel-reserve" onclick="return confirm('هل أنت متأكد من إلغاء الحجز؟')">
                                إلغاء الحجز
                            </button>
                        </form>
                    @endif
				</div>

				<div class="flex-start">
					<div class="col-2 col-md-6 col-sm-12">
						<div class="aside-tabs">
							<a href="" class="aside-tab flex-between align-center">
								<div class="flex-1">
									<h3>بياناتى</h3>
								</div>
								<i class="fa-solid fa-chevron-left"></i>
							</a>

							<a href="" class="aside-tab flex-between active align-center">
								<div class="flex-1">
									<h3>الحجوزات</h3>
								</div>
								<i class="fa-solid fa-chevron-left"></i>
							</a>

							<a href="" class="aside-tab flex-between align-center">
								<div class="flex-1">
									<h3>تغيير كلمة المرور</h3>
								</div>
								<i class="fa-solid fa-chevron-left"></i>
							</a>


							<a href="" class="aside-tab flex-between align-center">
								<div class="flex-1">
									<h3>حذف الحساب</h3>
								</div>
								<i class="fa-solid fa-chevron-left"></i>
							</a>

							<a href="" class="aside-tab flex-between align-center">
								<div class="flex-1">
									<h3>تسجيل الخروج</h3>
								</div>
								<i class="fa-solid fa-chevron-left"></i>
							</a>


						</div>
					</div>
					<div class="col-10 col-md-6 col-sm-12">
						<div class="flex-start">
							<div class="col-8 col-md-12">
								<div class="cart-box">

									<div class="flex-between align-center">
										<span class="reserve-number">#{{ $reservation->id }}</span>
										<div class="cats">
											<span class="pending">
                                                @if ($reservation->status == 'pending')
                                                    {{ __("Pending") }}
                                                @elseif ($reservation->status == 'attended')
                                                    {{ __("Attended") }}
                                                @elseif ($reservation->status == 'cancelled')
                                                    {{ __("Cancelled") }}
                                                @endif
                                            </span>
											<span class="name">العيادة</span>
										</div>
									</div>

									<h5>{{ __('Reservation') }}
										{{ $reservation->type == "normal" ? __('Normal') : __('Urgent') }}:
										<strong class="site-color">{{ $reservation->price }} ج.م</strong>
									</h5>


									<div class="doctor-details flex-between">
										<div class="flex-start align-center">
											<img src="{{  asset($reservation->doctor->img)  }}" width="40" height="40">
											<div class="flex-1">
												<h3>{{ $reservation->doctor->info->name }}</h3>
												<p>{{ $reservation->doctor->info->job_title }}</p>
											</div>
										</div>

										<a href="{{ route('Site.reservation.index', [$reservation->doctor->id, 'normal']) }}" class="site-color">
											<i class="fa-solid fa-plus"></i>
											أحجز موعد آخر
										</a>
									</div>

									<div class="doctor-info">
										<h4>
											<img src="{{ asset('siteassets/images/settings/personalcard.svg') }}" alt="" width="24" height="24">
											التخصصات التي يعمل بها الطبيب:
										</h4>
										<ul>
                                            @foreach ($reservation->doctor->subspecialties as $sub_specialty)
                                                <li>{{$sub_specialty->subSpecialtie->main_title}}</li>
                                            @endforeach
										</ul>
									</div>

								</div>

							</div>
							<div class="col-4 col-md-12">
								<div class="cart-box">
									<h3>البيانات الشخصية</h3>
									<div class="li">
										<img src="{{ asset('siteassets/images/settings/profile.svg') }}" alt="" width="24" height="24">
										<span>{{ $reservation->doctor->info->name }}</span>
									</div>

									<div class="li">
										<img src="{{ asset('siteassets/images/settings/location.svg') }}" alt="" width="24" height="24">
										<span>{{ $reservation->doctor->info->location }}</span>
									</div>

									<div class="li">
										<img src="{{ asset('siteassets/images/settings/call-calling.svg') }}" alt="" width="24" height="24">
										<span>{{ $reservation->doctor->info->phone }}</span>
									</div>
								</div>
								<div class="cart-box">

									<h3>تفاصيل الدفع</h3>

									<div class="li">
										<img src="{{ asset('siteassets/images/settings/cards.svg') }}" alt="" width="24" height="24">
										<span class="site-color">الدفع كاش</span>
									</div>

									<div class="li flex-between align-center">
										<span>حجز عادى:</span>
										<span>{{ $reservation->price }} ج.م</span>
									</div>

									<div class="li flex-between align-center">
										<span>المجموع الفرعي</span>
										<span>{{ $reservation->price }} ج.م</span>
									</div>

									<div class="li flex-between  title-color align-center">
										<strong>المجموع</strong>
										<strong>{{ $reservation->price }} ج.م</strong>
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
