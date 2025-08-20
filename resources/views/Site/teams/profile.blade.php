@extends('site')
@section('content')

	<main id="main">

		<!-- Banner -->
		<article class="banner">
			<img src="{{$Specialtie->img}}">
		</article>
		<!-- Banner -->


		<!-- Content Section -->
		<article class="content-section pd">
			<div class="container text-center">

				<!-- About  -->
				<section class="about nopd flex-start pdt  text-right align-center">
					<div class="col-6 col-md-6 col-sm-12">
						<div class="about-desc">
							<span class="pre-title site-color">{{$doctor->info->title}}</span>
							<h2 class="main-title">{{$doctor->info->sub_title}}</h2>
							<p class="main-para">{{$doctor->info->desc}}</p>

							<div class="flex-start row-gap-15 pdt">

								<div class="col-6 col-md-6 col-sm-12">
									<div class="profile-info flex-start">
										<img src="{{$doctor->img}}">
										<div class="flex-1">
											<h3>{{__('doctor name')}}</h3>
											<p>{{$doctor->info->name}}</p>
										</div>
									</div>
								</div>

								<div class="col-6 col-md-6 col-sm-12">
									<div class="profile-info flex-start">
										<img src="../images/doctors/profile/job.svg">
										<div class="flex-1">
											<h3>المسمي الوظيفي</h3>
											<p>استشاري شبكية عيون الأطفال</p>
										</div>
									</div>
								</div>

								<div class="col-6 col-md-6 col-sm-12">
									<div class="profile-info flex-start">
										<img src="../images/doctors/profile/hospital.svg">
										<div class="flex-1">
											<h3>التخصصات التي يعمل بها:</h3>
											<ul class="profile-info-list">
												@foreach ($doctor->subspecialties as $row)
                                                    <li>{{$row->subSpecialtie->main_title}}</li>
                                                @endforeach
											</ul>
										</div>
									</div>
								</div>

								<div class="col-6 col-md-6 col-sm-12">
									<div class="profile-info flex-start">
										<img src="../images/doctors/profile/personalcard.svg">
										<div class="flex-1">
											<h3>الجهات التأمينية:</h3>
											<ul class="profile-info-list">
												@foreach ($doctor->partners as $row)
                                                    <li>{{$row->partner->title}}</li>
                                                @endforeach
											</ul>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="col-6 col-md-6 col-sm-12">
						<figure class="about-image">
							<img src="{{$doctor->img}}" alt="">
						</figure>
					</div>
				</section>
				<!-- About  -->

				<!-- About  -->
				<div class="pdt text-right">
					<h2 class="main-title">{{__('info about service of doctor')}}</h2>
				</div>
				<section class="about nopd flex-start  text-right align-center">
					<div class="col-6 col-md-6 col-sm-12">
						<div class="about-desc">

							<ul class="profile-info-list row">
                                @foreach ($doctor->serviceinfo as $row)
                                    <li>{{$row->info}}</li>
                                @endforeach
							</ul>

						</div>
					</div>
					{{-- <div class="col-6 col-md-6 col-sm-12">
						<div class="about-desc">

							<ul class="profile-info-list">
								<li>تقديم استشارات متخصصة في علاج أورام العين للأطفال</li>
								<li>استخدام تقنيات العلاج الحديثة مثل العلاج بالليزر والجراحة لإزالة الأورام</li>
								<li>متابعة الحالات المرضية للأطفال المصابين بأمراض الشبكية</li>
								<li>تقديم نصائح طبية للحفاظ على صحة العين بشكل عام</li>
							</ul>

						</div>
					</div> --}}
					<div class="col-12">
						<div class="doctor-links pdt">
							<a href="{{route('Site.reservation.index',[$doctor->id,'normal'])}}" class="reserve">{{__('reservation doctor')}}</a>
							<a href="{{route('Site.reservation.index',[$doctor->id,'onlin'])}}" class="discuss"> {{__('online discussion')}}</a>
                            <a href="{{ route('Site.reservation.index', [$doctor->id, 'Expat_visit']) }}" class="discuss">{{__('Booking a medical visit for expatriates')}}</a>
							{{-- <button type="button" class="visit" data-bs-toggle="modal" id="myInput"
								data-bs-target="#exampleModalCenter">{{__('Booking a medical visit for expatriates')}}</button> --}}
							{{-- <a href="{{route('Site.reservation.index',[$doctor->id,'Expat_visit'])}}" class="visit">{{__('Booking a medical visit for expatriates')}}</a> --}}
						</div>
					</div>
				</section>
				<!-- About  -->



			</div>
		</article>
		<!-- Content Section -->





		<!-- Contact us Section -->
	     @include('components.contact-us')
		<!-- Contact us Section -->


	</main>

		<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<main id="main">
						<div class="overlay">
							<div class="activation pd">
								<h4>هل حصلت على التأشيرة؟</h4>
								<p>من فضلك اخبرنا هل حصلت على التأشيرة ام تحتاج دعوة للسفارة الخاصة بك!</p>
								<form class="custom-form">
									<div class="form-control">
										<div class="form-field flex-start">
											<label class="flex-1 flex-start align-center">
												<input type="radio" name="vl" value="yes" checked="checked" onchange="handleChange(event)">
												<span style="margin-right: 5px;">نعم</span>
											</label>
											<label class="flex-1 flex-start align-center">
												<input type="radio" name="vl" value="no" onchange="handleChange(event)">
												<span style="margin-right: 5px;">لا</span>
											</label>
										</div>
										<div class="form-field w-100" id="setDateArrivall" >
											<label>حدد موعد الوصول</label>
											<input type="date" class="form-date" name="arrival">
										</div>
										<div class="form-field w-100" id="ifYouWantInvite" style="display: none;">
											<p>هل تحتاج إلي دعوة من المستشفي إلى سفارتك ؟</p>
											<div class="form-field flex-start">
												<label class="flex-1 flex-start align-center">
													<input type="radio" name="vl" value="yes">
													<span style="margin-right: 5px;">نعم</span>
												</label>
												<label class="flex-1 flex-start align-center">
													<input type="radio" name="vl" value="no">
													<span style="margin-right: 5px;">لا</span>
												</label>
											</div>
											<p style="font-weight: 600;">سيتم حجز الفحص الطبي عبر الانترنت اولا</p>
										</div>
									</div>
									<div class="form-control">
										<div class="form-field">
											<input type="submit" class="btn" style="width: 100%;" name="yes"
												value="التالي">
										</div>
									</div>
								</form>

							</div>
						</div>
					</main>
				</div>
			</div>
		</div>
	</div>

@endsection
