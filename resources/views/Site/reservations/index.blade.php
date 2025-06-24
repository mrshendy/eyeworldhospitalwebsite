@extends('site')
@section('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('siteassets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('siteassets/css/main.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	 <style>
    .time-picker {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      max-width: 400px;
      margin: 20px auto;
      justify-content: center;
    }

    .time-option {
      position: relative;
    }

    .time-option input {
      display: none;
    }

    .time-option label {
      display: inline-block;
      padding: 10px 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      cursor: pointer;
      background-color: white;
      transition: 0.2s;
    }

    /* Active (selected) style */
    .time-option input:checked + label {
      background-color: #007bff;
      color: white;
      border-color: #007bff;
    }

    /* Disabled style */
    .time-option input:disabled + label {
      background-color: #eee;
      color: #999;
      border-color: #ccc;
      cursor: not-allowed;
    }
  </style>
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
						<img src="{{$doctor->img}}" alt="" width="48" height="48">
						<div class="flex-1">
							<h3>{{$doctor->info->name}}</h3>
							<p>{{$doctor->info->title}}</p>
							<p>{{$doctor->specialtie->specialtie->title}}</p>
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

						    <input type="hidden" name="price" value="{{$price->price}}">
							<input type="hidden" name="urgent_price" value="{{$price->urgent_price}}">
                            <input type="hidden" name="type" value="{{$reservationType}}">


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
												<input type="date" name="date"  id="calendar" placeholder="اختر التاريخ">
											</div>
										</div>
									</div>
									<div class="col-6 col-md-6 col-sm-12" id="appointments">
										<div class="appoints">
											<h4>المواعيد المتاحة في الصباح</h4>
											<div class="pm-times times-spans flex-center">
													@foreach ($appointments->where('timing','am') as $row)
														<div class="time-option">
																<input type="radio" name="time_from" id="time{{$row->id}}" value="{{$row->time_from}}">
                                                                <label for="time{{$row->id}}">{{ \Carbon\Carbon::createFromFormat('H:i:s', $row->time_from)->format('h:i A') }}</label>
														</div>
													@endforeach
											</div>
										</div>

										<div class="appoints">
											<h4>المواعيد المتاحة في المساء</h4>
											<div class="pm-times times-spans flex-center">
													@foreach ($appointments->where('timing','pm') as $row)
														<div class="time-option">
																<input type="radio" name="time_from" id="time{{$row->id}}" value="{{$row->time_from}}">
                                                                <label for="time{{$row->id}}">{{ \Carbon\Carbon::createFromFormat('H:i:s', $row->time_from)->format('h:i A') }}</label>
														</div>
													@endforeach
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
											<img src="{{asset('siteassets//images/doctors/book/calendar.svg')}}" width="24">
									 <span id="time">  </span> -	<span id="date">   </span>

									</p>
										<p>
											<span id="">حجز عادى:</span>
											<span class="site-color" id="price">{{$price->price}} ج.م</span>
										</p>
									</div>
								</div>

								<div class="pdt">
									<h4>طريقة الدفع</h4>

									<div class="payment-box">
										<input type="radio" name="payment" checked>
										<img src="{{asset('siteassets/images/doctors/book/whatsapp.svg')}}" width="24">
										<span>{{__('cash')}}</span>
									</div>

									<div class="payment-box">
										<input type="radio" name="payment">
										<img src="{{asset('siteassets/images/doctors/book/visa.svg')}}" width="24" disabled>
										<span>Visa</span>
									</div>

									{{-- <div class="payment-box">
										<input type="radio" name="payment">
										<img src="{{asset('siteassets/images/doctors/book/pay.svg')}}" width="24">
										<span>Apple Pay</span>
									</div> --}}

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
	{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="../js/main.js"></script> --}}
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script>
	    flatpickr("#calendar", {
	        inline: true,
	        dateFormat: "d-m-Y",
	        locale: "ar"
	    });
	</script>
    {{-- price script --}}
    <script>
		var price        = {!!json_encode($price->price)!!};
	    var urgent_price = {!!json_encode($price->urgent_price)!!};
    $('select[name="urgent"]').on('change', function () {
        const selectedValue = $(this).val();
		if(selectedValue==1){
           $('#price').html(urgent_price);
		}
    });
	</script>


    {{-- get appointment scripts --}}
	<script>
		$(document).ready(function () {
			// Detect when a date is selected
			var doctor_id = {!!json_encode($doctor->id)!!};
			var SITEURL ={!!json_encode(url('/'))!!};

			$('#calendar').on('change', function () {
				const selectedDate = $(this).val();
				$.ajax({
					url: SITEURL + "/reservation/appoint_ment/" + doctor_id+'/'+selectedDate,
					type: "GET", //send it through get method
					success: function (response) {

					  $('#appointments').html(response);
					  	document.getElementById('date').textContent = selectedDate;
					},
					error: function (response) {

					}
				});
			});
		});
    </script>
    {{-- get chosen time script --}}
	<script>
		 function formatTimeToAmPm(timeStr) {
			const [hour, minute] = timeStr.split(':');
			const h = parseInt(hour);
			const suffix = h >= 12 ? 'PM' : 'AM';
			const hour12 = h % 12 === 0 ? 12 : h % 12;
			return `${hour12}:${minute} ${suffix}`;
		}

	    $(document).on('change', 'input[name="time_from"]', function () {
			const selectedTime = formatTimeToAmPm(this.value);
			$('#time').html(selectedTime);
		});
	</script>
	{{-- get date when page is reloaded --}}
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const today = new Date();

			const options = { year: 'numeric', month: 'long', day: 'numeric' };
			const formattedDate = today.toLocaleDateString('en-US', options);
			document.getElementById('date').textContent = formattedDate;

		});
</script>


{{-- @if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: 'Your action was successful.'
    });
</script>
@endif  --}}
@endsection

