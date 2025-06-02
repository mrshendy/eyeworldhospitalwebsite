@extends('site')
@section('content')

	<main id="main">
		
		<!-- sign section -->
		<article class="sign pd">

			<div class="container">

				<span class="pre-title site-color">ابدأ الآن في إنشاء حسابك لتكون دائمًا قريبًا من رعاية صحية عالية الجودة، ولتتمكن من إدارة مواعيدك الصحية بسهولة تامة.</span>
				<h2 class="main-title">قم بإنشاء حساب كمريض للوصول السريع إلى أفضل خدمات الرعاية الصحية والتشخيصية التي تناسب احتياجاتك وتضمن لك أفضل رعاية طبية.</h2>
				<p class="main-para"> يسعدنا أن نرحب بك في منصتنا الطبية! قم بإنشاء حساب كمريض لتتمكن من الوصول إلى أفضل الخدمات الصحية المتكاملة. بمجرد إنشاء حسابك، يمكنك حجز المواعيد، متابعة استشاراتك الطبية، والاستفادة من العروض والخدمات الصحية المتميزة. نحن هنا لتوفير الرعاية الصحية بأعلى المعايير لك ولعائلتك.</p>

				<section class="login pdt">

					<div class="tabs flex-center">
						<div data-class=".log-patient" class="active">التسجيل كمريض</div>
						<div data-class=".log-doctor">التسجيل كطبيب</div>
					</div>
					<div class="sign-box-title">
						<h2> سجل الدخول عبر</h2>
						<div class="social-login">
							<a href="#"><img src="{{asset('siteassets/images/login/facebook.svg')}}"></a>
							<a href="#"><img src="{{asset('siteassets/images/login/google.svg')}}"></a>
						</div>
					</div>

					<div class="or">
						<span>أو</span>
					</div>

					<div class="form-holder">
						<div class="log-doctor">
							<form class="custom-form text-right" action="{{route('Site.register')}}" method="post">
								@csrf
							   <input type="hidden" name="type" value="patient">

								<div class="form-control">
									<div class="form-field">
										<label>اكتب بريدك الإلكتروني</label>
										<div class="field">
											<input type="email" name="email" placeholder="example@email.com">
										     @if ($errors->has('email'))
                                               <p class="text-danger">{{ $errors->first('email')}}</p>
                                             @endif
										</div>
									</div>			
								</div>
								<div class="form-control">
									<div class="form-field">
										<label>كلمة المرور</label>
										<div class="field">
											<input type="password" name="password" placeholder="">
											<img class="eye" src="{{asset('siteassets/images/login/eye.svg')}}">
										</div>
									</div>			
								</div>

								<div class="form-control">
									<div class="form-field flex-between align-center">
										<span>
											<input type="checkbox" name=""> تذكرني
										</span>
										<a href="#">
											نسيت كلمة السر؟
										</a>
									</div>
								</div>
								<div class="form-control">
									<input type="submit" class="btn w-100"  value="dddd الدخول">
								</div>
								<a href="#" class="have-not-account">ليس لديك حساب؟ أنشيء حساب</a>
							</form>
						</div>
						<div class="log-patient active">
							<form class="custom-form text-right"  action="{{route('Site.register')}}" method="post">
								@csrf
			 			   <input type="hidden" name="type" value="patient">


								<div class="form-control">
									<div class="form-field">
										<label>الاسم</label>
										<div class="field">
											<input type="text" name="name" value="{{old('name')}}" placeholder="">
										</div>
										 @if ($errors->has('name'))
										   <p class="text-danger">{{ $errors->first('name')}}</p>
										 @endif
									</div>			
								</div>			

								<div class="form-control">
									<div class="form-field">
										<label>اكتب بريدك الإلكتروني</label>
										<div class="field">
											<input type="email" name="email" {{old('email')}} placeholder="">
										</div>
										 @if ($errors->has('email'))
										   <p class="text-danger">{{ $errors->first('email')}}</p>
										 @endif
									</div>			
								</div>
								<div class="form-control">

									{{-- <div class="form-field">
										<label>الدولة</label>
										<div class="field">
											<input type="text" name="text" placeholder="مصر">
										</div>
									</div>	 --}}

									<div class="form-field">
										<label>رقم الهاتف</label>
										<div class="field">
											<input type="text" name="phone" value="{{old('phone')}}" placeholder="">
										</div>
										 @if ($errors->has('phone'))
										   <p class="text-danger">{{ $errors->first('phone')}}</p>
										 @endif
									</div>			

								</div>
								<div class="form-control">
									<div class="form-field">
										<label>كلمة المرور</label>
										<div class="field">
											<input type="password" name="password" placeholder="">
											<img class="eye" src="{{asset('siteassets/images/login/eye.svg')}}">
										</div>
										 @if ($errors->has('password'))
										   <p class="text-danger">{{ $errors->first('password')}}</p>
										 @endif
									</div>			
								</div>



                                <div class="form-control">
									<div class="form-field">
										<label>تأكيد كلمه المرور</label>
										<div class="field">
											<input type="password" name="password_confirmation" placeholder="">
											<img class="eye" src="{{asset('siteassets/images/login/eye.svg')}}">
										</div>
								         @if ($errors->has('password_confirmation'))
										   <p class="text-danger">{{ $errors->first('password_confirmation')}}</p>
										 @endif
								
									</div>			
								</div>


								<div class="form-control">
									<div class="form-field flex-between align-center">
										<span>
											<input type="checkbox" name=""> تذكرني
										</span>
		
									</div>
								</div>
								<div class="form-control">
									<input type="submit" class="btn w-100" name="register" value="تسجيل الدخول">
								</div>
								<a href="#" class="have-not-account">لديك حساب؟  <span class="site-color"> تسجيل الدخول  </span></a>
							</form>
						</div>

					</div>
				</section>
			</div>

		</article>
		<!-- sign section -->


	</main>
@endsection