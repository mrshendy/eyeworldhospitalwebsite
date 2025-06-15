@extends('site')
@section('content')

	<main id="main">
		
		<!-- sign section -->
		<article class="sign pd">

			<div class="container">

				<span class="pre-title site-color">{{__('Start now by creating your account to always stay close to high-quality healthcare and to easily manage your medical appointments')}}</span>
                <h2 class="main-title">{{__('Create an account as a patient for quick access to the best healthcare and diagnostic services that suit your needs and ensure you receive the highest quality medical care.')}}</h2>
				<p class="main-para">{{__('We are pleased to welcome you to our medical platform! Create an account as a patient to access the best integrated healthcare services. Once your account is created, you can book appointments, follow up on your medical consultations, and take advantage of exclusive offers and premium healthcare services. We are here to provide healthcare at the highest standards for you and your family.')}}</p>

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
							   <input type="hidden" name="type" value="doctor">


							   	<div class="form-control">
									<div class="form-field">
										<label>{{__('name')}}</label>
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
										<label>{{__('email')}}</label>
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
										<label>{{__('phone')}}</label>
										<div class="field">
											<input type="text" name="phone" value="{{old('phone')}}" placeholder="" required>
											@if ($errors->has('phone'))
											   <p class="text-danger">{{ $errors->first('phone')}}</p>
											@endif
										</div>
									</div>
								</div>


								<div class="form-control">
									<div class="form-field">
										<label>{{__('specialty')}}</label>
										<div class="field">
                                           <select class="form-control" required name="specialty">
											    @foreach ($specialties as $specialty)
													<option value="{{ $specialty['id'] }}">{{ $specialty['title'] }}</option>
												@endforeach
										   </select>	
										</div>
									</div>
								</div>


								<div class="form-control">
									<div class="form-field">
										<label>{{__('academic degree')}}</label>
										<div class="field">
                                           <select class="form-control" required name="academic_degree">
											    @foreach ($degrees as $degree)
													<option value="{{ $degree['value'] }}">{{ $degree['label'] }}</option>
												@endforeach
										   </select>	
										</div>
									</div>
								</div>


								<div class="form-control">
									<div class="form-field">
										<label>{{__('graduation year')}}</label>
										<div class="field">
                                           <select class="form-control" required name="graduation_year">
											    @for ($year = 1980; $year <= date('Y'); $year++)
													<option value="{{ $year }}">{{ $year }}</option>
												@endfor
										   </select>	
										</div>
									</div>
								</div>


								<div class="form-control">
									<div class="form-field">
										<label>{{__('password')}}</label>
										<div class="field">
											<input type="password" name="password" placeholder="">
											<img class="eye" src="{{asset('siteassets/images/login/eye.svg')}}">
										</div>
									</div>			
								</div>

								  <div class="form-control">
										<div class="form-field">
											<label>{{__('password confirmation')}}</label>
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
											<input type="checkbox" name=""> {{__('remember me')}}
										</span>
										<a href="#">
											{{__('forgot password?')}}
										</a>
									</div>
								</div>
								{{-- <div class="form-control">
									<input type="submit" class="btn w-100"  value="{{__('login')}}">
								</div> --}}

								<div class="form-control">
									<input type="submit" class="btn w-100" name="register" value="تسجيل الدخول">
								</div>


								<a href="#" class="have-not-account">{{__('don\'t have an account? create one')}}</a>
							</form>
						</div>
						<div class="log-patient active">
							<form class="custom-form text-right"  action="{{route('Site.register')}}" method="post">
								@csrf
			 			   <input type="hidden" name="type" value="patient">


								<div class="form-control">
									<div class="form-field">
										<label>{{__('name')}}</label>
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
										<label>{{__('email')}}</label>
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
										<label>{{__('password confirmation')}}</label>
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
								<a href="{{route('Site.login.index')}}" class="have-not-account">لديك حساب؟  <span class="site-color"> تسجيل الدخول  </span></a>
							</form>
						</div>

				
					</div>
				</section>
			</div>

		</article>
		<!-- sign section -->


	</main>
@endsection