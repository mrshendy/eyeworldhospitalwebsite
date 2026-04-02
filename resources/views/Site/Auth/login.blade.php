@extends('site')
@section('content')
	<main id="main">

		<!-- sign section -->
		<article class="sign pd">

			<div class="container">

				{{-- <span class="pre-title site-color">ابدأ رحلتك نحو الصحة المثلى! قم بتسجيل الدخول للوصول إلى خدماتنا الطبية المتكاملة وأفضل الرعاية الصحية المتاحة</span>
				<h2 class="main-title">تسجيل الدخول كمريض للوصول إلى خدماتنا الطبية المتكاملة ومتابعة حالتك الصحية بشكل سهل وفعال مع أفضل التخصصات الطبية المتاحة.</h2>
				<p class="main-para">يسرنا أن نقدم لك أفضل تجربة صحية، حيث يمكنك تسجيل الدخول كمريض للوصول إلى خدماتنا الطبية المتميزة. سواء كنت بحاجة إلى استشارة طبية أو ترغب في حجز مواعيد للفحوصات، يمكنكم إدارة كل شيء بسهولة. نحن هنا لنساعدك في الحصول على الرعاية الصحية التي تحتاجها، أينما كنت، في أي وقت.</p> --}}

				<section class="login pdt">

					{{-- <div class="tabs flex-center">
						<div data-class=".log-patient" class="active">تسجيل الدخول كمريض</div>
						<div data-class=".log-doctor">تسجيل الدخول كطبيب</div>
					</div> --}}
					<div class="sign-box-title">
						<h2> سجل الدخول عبر</h2>
						<div class="social-login">
			            	<a href="#"><img src="{{asset('siteassets/images/login/facebook.svg')}}" alt="Facebook"></a>
							<a href="#"><img src="{{asset('siteassets/images/login/google.svg')}}" alt="Google"></a>
						</div>
					</div>

					{{-- <div class="or">
						<span>أو</span>
					</div> --}}

					<div class="form-holder">
						<div class="log-patient active">
							<form class="custom-form text-right"  action="{{route('Site.login')}}" method="post">
								@csrf

								<div class="form-control">
									<div class="form-field">
										<label>اكتب بريدك الإلكتروني</label>
										<div class="field">
											<input type="email" name="email" placeholder="example@email.com">
										</div>
									</div>
								</div>
								<div class="form-control">
									<div class="form-field">
										<label>كلمة المرور</label>
										<div class="field">
											<input type="password" name="password" placeholder="">
											<img class="eye" src="../images/login/eye.svg" alt="Eye">
										</div>
									</div>
								</div>

								@if ($errors->any())
									<div class="alert alert-danger" style="margin-bottom: 15px;">
										@foreach ($errors->all() as $error)
											<div>{{ $error }}</div>
										@endforeach
									</div>
								@endif

								<div class="form-control">
									<div class="form-field flex-between align-center">
										<span>
											<input type="checkbox" name=""> تذكرني
										</span>
										<a href="{{route('Site.resetpassword')}}">
											{{__('Forgot your password?') }}
										</a>
									</div>
								</div>
								<div class="form-control">
									<input type="submit" class="btn w-100" name="register" value="تسجيل الدخول">
								</div>
								<a href="{{route('Site.register')}}" class="have-not-account">{{__("don't have an account? create one")}}</a>
							</form>


						</div>
						{{-- <div class="log-doctor">
							<form class="custom-form text-right"  action="">


								<div class="form-control">
									<div class="form-field">
										<label>اكتب بريدك الإلكتروني</label>
										<div class="field">
											<input type="email" name="email" placeholder="example@email.com">
										</div>
									</div>
								</div>
								<div class="form-control">
									<div class="form-field">
										<label>كلمة المرور</label>
										<div class="field">
											<input type="password" name="password" placeholder="">
											<img class="eye" src="../images/login/eye.svg" alt="Eye">
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
									<input type="submit" class="btn w-100" name="register" value="تسجيل الدخول">
								</div>
								<a href="#" class="have-not-account">ليس لديك حساب؟ أنشيء حساب</a>
							</form>
						</div> --}}
					</div>
				</section>
			</div>

		</article>
		<!-- sign section -->


	</main>

@endsection
