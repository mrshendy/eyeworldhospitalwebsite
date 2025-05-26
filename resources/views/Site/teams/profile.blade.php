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
					<h2 class="main-title">معلومات عن خدمات الطبيب</h2>
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
							<a href="{{route('Site.reservation.index',$doctor->id)}}" class="reserve"> حجز الطبيب</a>
							<a href="#" class="discuss">مناقشة عبر الإنترنت</a>
							<a href="#" class="visit">حجز زيارة علاجية (للمغتربين)</a>
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

@endsection