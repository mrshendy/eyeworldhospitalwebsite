@extends('site')
@section('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">	
@endsection
@section('content')
	<main id="main">
		
		<!-- Book a docotr -->
		<article class="book-doctor pd">
			<div class="container">
				<h2 class="main-title">حجز الطبيب</h2>
				<p class="main-para">احصل على موعدك مع الخبراء في طب العيون واحصل على العناية التي تحتاجها بلمسة واحدة.</p>
				<div class="pdt">
					<div class="doctor-info flex-start align-center">
						<img src="../images/doctors/book/avatar.svg" alt="" width="48" height="48">
						<div class="flex-1">
							<h3>إيهاب سعد عثمان</h3>
							<p>استشاري شبكية عيون الأطفال</p>
						</div>
					</div>
				</div>

			</div>
		</article>
		<!-- Book a docotr -->


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
										<h3>بيانات الحجز</h3>
										<p>من فضلك ادخل بيانات الحجز كاملة</p>
									</div>
								</div>
							</div>							

							<div class="step">
								<div class="flex-start align-center">
									<div class="number">02</div>
									<div class="flex-1">
										<h3>البيانات الشخصية</h3>
										<p>من فضلك ادخل بياناتك الشخصية</p>
									</div>
								</div>
							</div>							

							<div class="step">
								<div class="flex-start align-center">
									<div class="number">03</div>
									<div class="flex-1">
										<h3>تاريخ الحجز</h3>
										<p>من فضلك اختر الميعاد المناسب لك</p>
									</div>
								</div>
							</div>							

							<div class="step">
								<div class="flex-start align-center">
									<div class="number">04</div>
									<div class="flex-1">
										<h3>بيانات الدفع</h3>
										<p>اختر طريقة الدفع التى تناسبك بأريحية</p>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="col-9 col-md-12">
						<form class="steps-holder" action="{{route('Site.reservation.store')}}" method="POST">
                           @csrf
							<div class="step-content active">

								<div class="flex-between align-center">
									<h4>بيانات الحجز</h4>
									<div class="btns flex-center">
										<div class="next">التالى</div>
									</div>
								</div>

								<div class="pdt">

									<div class="form-control">
										<div class="form-field">
											<label>الطبيب</label>
											<div class="field">
												<select name="doctor_id">
													<option value="{{$doctor->id}}">{{$doctor->info->name}}</option>
												</select>
											</div>
										</div>			
									</div>	

									<div class="form-control">
										<div class="form-field">
											<label>التخصص</label>
											<div class="field">
												<select name="specialtie_id">
													<option value="{{$doctor->specialtie->specialtie_id}}">{{$doctor->specialtie->specialtie->title}}</option>
													
												</select>
											</div>
										</div>			
									</div>	

									{{-- <div class="form-control">
										<div class="form-field">
											<label>النقابة العامة لأطباء مصر</label>
											<div class="field">
												<input type="text" name="" placeholder="النقابة العامة لأطباء مصر" >
											</div>
										</div>			
									</div>	 --}}

									<div class="form-control">
										<div class="form-field">
											<label>نوع الحجز</label>
											<div class="field">
												<select name="urgent">
                                                    <option value="0">عادي</option>
													<option value="1">مستعجل</option>
												
												</select>
											</div>
										</div>			
									</div>	


								</div>

							</div>							

							<div class="step-content">
								<div class="flex-between align-center">
									<h4>البيانات الشخصية</h4>
									<div class="btns flex-center">
										<div class="prev">السابق</div>
										<div class="next">التالى</div>
									</div>
								</div>
								<div class="pdt">
									
									<div class="form-control">
										<div class="form-field">
											<label>الاسم</label>
											<div class="field">
												<input type="text" name="name" placeholder="محمد الشريف" required>
											</div>
										</div>			
									</div>

									<div class="form-control">
										<div class="form-field">
											<label>البريد الإلكترونى</label>
											<div class="field">
												<input type="email" name="email" placeholder="example@gmail.com" required>
											</div>
										</div>			
									</div>	


									<div class="form-control">
										<div class="form-field">
											<label>الدولة</label>
											<div class="field">
												<input type="hidden" name="country_id" value="{{$country->id}}">
												<input type="text" placeholder="مصر" value="{{$country->name}}" >
											</div>
										</div>			

										<div class="form-field">
											<label>رقم الهاتف</label>
											<div class="field">
												<input type="text" name="phone" placeholder="+201012345678" required>
											</div>
										</div>			
									</div>	


								</div>
							</div>

							<div class="step-content">
								<div class="flex-between align-center">
									<h4>تاريخ الحجز</h4>
									<div class="btns flex-center">
										<div class="prev">السابق</div>
										<div class="next">التالى</div>
									</div>
								</div>

								<div class="pdt flex-start">

									<div class="col-6 col-md-6 col-sm-12">
										<div class="form-control">
											<div class="form-field">
												<input type="text" style="display: none;" id="calendar" placeholder="اختر التاريخ">
											</div>			
										</div>	
									</div>
									<div class="col-6 col-md-6 col-sm-12">
										<div class="appoints">
											<h4>المواعيد المتاحة في الصباح</h4>
											<div class="am-times  times-spans  flex-center">
												<input type="hidden" name="am_time">
												<span>04:00 AM</span>
												<span class="active">04:00 AM</span>
												<span>04:00 AM</span>
												<span class="disable">04:00 AM</span>
												<span>04:00 AM</span>
												<span>04:00 AM</span>
												<span>04:00 AM</span>
												<span class="disable">04:00 AM</span>
												<span class="disable">04:00 AM</span>
												<span>04:00 AM</span>
												<span>04:00 AM</span>
												<span>04:00 AM</span>
												<span>04:00 AM</span>
												<span>04:00 AM</span>
												<span>04:00 AM</span>
											</div>
										</div>						

										<div class="appoints">
											<h4>المواعيد المتاحة في المساء</h4>
											<div class="pm-times times-spans flex-center">
												<input type="hidden" name="am_time">
												<span>04:00 PM</span>
												<span class="active">04:00 PM</span>
												<span>04:00 PM</span>
												<span class="disable">04:00 PM</span>
												<span>04:00 PM</span>
												<span>04:00 PM</span>
												<span>04:00 PM</span>
												<span class="disable">04:00 PM</span>
												<span class="disable">04:00 PM</span>
												<span>04:00 PM</span>
												<span>04:00 PM</span>
												<span>04:00 PM</span>
												<span>04:00 PM</span>
												<span>04:00 PM</span>
												<span>04:00 PM</span>
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

								<div class="pdt">
									<h4>ملخص الطلب</h4>

									<div class="flex-between step-bar align-center">
										<p> #755748</p>
										<a href="#" class="clinic">العيادة</a>
									</div>
									<div class="flex-between step-bar align-center">
										<p class="flex-start align-center">
											<img src="../images/doctors/book/calendar.svg" width="24">
										29/11/2023 - 12:35 ص</p>
										<p>
											<span>حجز عادى:</span>
											<span class="site-color">980 ج.م</span>
										</p>
									</div>
								</div>

								<div class="pdt">
									<h4>طريقة الدفع</h4>

									<div class="payment-box">
										<input type="radio" name="payment" checked>
										<img src="../images/doctors/book/whatsapp.svg" width="24">
										<span>واتساب</span>
									</div>									

									<div class="payment-box">
										<input type="radio" name="payment">
										<img src="../images/doctors/book/visa.svg" width="24">
										<span>Visa</span>
									</div>									

									<div class="payment-box">
										<input type="radio" name="payment">
										<img src="../images/doctors/book/pay.svg" width="24">
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


	</main>

@endsection

@section('scripts')


	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script>
	    flatpickr("#calendar", {
	        inline: true,
	        dateFormat: "d-m-Y",
	        locale: "ar"
	    });
	</script>


@endsection

