@extends('site')

@section('content')

	<main id="main">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
		<!-- Book a docotr -->
		<article class="book-doctor pd">
			<div class="container">
				<h2 class="main-title">{{ __('Register your interest in the conference on the role of artificial intelligence in modern medicine') }}</h2>
				<p class="main-para">{{ __('Join the latest scientific conferences specializing in various medical fields, and receive the latest information and research that will contribute to developing your medical practice.') }}</p>


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
										<h3>البيانات الشخصية</h3>
										<p>من فضلك ادخل بياناتك الشخصية</p>
									</div>
								</div>
							</div>

							<div class="step">
								<div class="flex-start align-center">
									<div class="number">02</div>
									<div class="flex-1">
										<h3>بيانات الحجز</h3>
										<p>من فضلك أدخل بيانات الحجز كاملة</p>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="col-9 col-md-12">
						<form class="steps-holder" method="POST" action="{{ route('Site.conference.booking.store', $conference->slug) }}">
                            @csrf
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
											<label>{{ __('name') }}</label>
											<div class="field">
												<input type="text" name="name" placeholder="{{ __('name') }}" >
											</div>
										</div>
                                    </div>
                                    @error('name')
                                        <span class="bg-red">{{ $message }}</span>
                                    @enderror

                                    <div class="form-control">
										<div class="form-field">
											<label>{{ __('email') }}</label>
											<div class="field">
												<input type="email" name="email" placeholder="{{ __('email') }}" >
											</div>
										</div>
									</div>
                                    <div class="form-control">
										<div class="form-field">
											<label>{{ __('Country') }}</label>
											<div class="field">
												<input type="text" name="country" placeholder="{{ __('Country') }}" >
											</div>
										</div>

										<div class="form-field">
											<label>{{ __('Phone') }}</label>
											<div class="field">
												<input type="text" name="phone" placeholder="+201012345678" >
											</div>
										</div>
									</div>
                                    <div class="form-control">
										<div class="form-field">
											<label>{{ __('Age') }}</label>
											<div class="field">
												<input type="number" name="age" placeholder="{{ __('Age') }}" >
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
                                    <div class="form-control">
										<div class="form-field">
											<label>{{ __('Employer') }}</label>
											<div class="field">
												<input type="text" name="employer" placeholder="{{ __('Employer') }}" >
											</div>
										</div>
                                        <div class="form-field">
                                            <label>{{ __('Doctor') }}</label>
                                            <div class="field">
                                                <select name="doctor_type">
                                                    <option>{{ __('Select Attendance Details') }}</option>
                                                    <option value="Specialist Doctor">{{ __('Specialist Doctor') }}</option>
                                                    <option value="Consultant Doctor">{{ __('Consultant Doctor') }}</option>
                                                    <option value="General Practitioner">{{ __('General Practitioner') }}</option>
                                                    <option value="Medical Student">{{ __('Medical Student') }}</option>
                                                </select>
                                            </div>
                                        </div>
									</div>

                                    <div class="form-control">
                                        <div class="form-field">
                                            <label>{{ __('Participation Type') }}</label>
                                            <div class="field">
                                                <select name="attendance_details">
                                                    <option value="Conference Attendance Only">{{ __('Conference Attendance Only') }}</option>
                                                    <option value="Paticipant as Speaker Only">{{ __('Paticipant as Speaker Only') }}</option>
                                                    <option value="Paticipant as speaker and something esle">{{ __('Paticipant as speaker and something esle') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-control">
                                        <div class="form-field">
                                            <label>{{ __('Select Attendance Details') }}</label>
                                            <div class="field">
                                                <select name="participation_type_id">
                                                    @foreach ($participationTypes as $type)
                                                        <option value="{{ $type->id }}">{{ $type->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</article>
		<!-- Book Form -->


	</main>

    @include('components.contact-us')

@endsection

