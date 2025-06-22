@extends('site')

@section('content')

@endsection
	<main id="main">

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
						<form class="steps-holder" action="">



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
												<input type="text" name="" placeholder="محمد الشريف" >
											</div>
										</div>
									</div>

									<div class="form-control">
										<div class="form-field">
											<label>البريد الإلكترونى</label>
											<div class="field">
												<input type="email" name="" placeholder="example@gmail.com" >
											</div>
										</div>
									</div>


									<div class="form-control">
										<div class="form-field">
											<label>الدولة</label>
											<div class="field">
												<input type="text" name="" placeholder="مصر" >
											</div>
										</div>

										<div class="form-field">
											<label>رقم الهاتف</label>
											<div class="field">
												<input type="text" name="" placeholder="+201012345678" >
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
												<select>
													<option>اختر</option>
													<option>23 شارع الشريف, الرياض, السعودية</option>
												</select>
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

									<div class="product-sm">
										<span>تقنيات علاج السرطان الحديثة</span>
										<strong class="price-sm">567 ج.م</strong>
									</div>

									<div class="product-sm">
										<span>تقنيات علاج السرطان الحديثة</span>
										<strong class="price-sm">567 ج.م</strong>
									</div>

									<div class="product-sm">
										<span>تقنيات علاج السرطان الحديثة</span>
										<strong class="price-sm">567 ج.م</strong>
									</div>

								</div>

								<div class="total flex-between align-center">
									<h5>المجموع</h5>
									<h5 class="price-sm">980 ج.م</h5>
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

	<!-- Footer -->

    @include('component.contact-us')
</body>
</html>
