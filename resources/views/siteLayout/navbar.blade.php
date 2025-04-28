	<!-- Header Section -->
	<header>
		<div class="container">
			<div class="flex-start align-center">
				<figure class="logo">
					<a href="{{route('Site.home.index')}}">
						<img src="{{asset('siteassets/images/logo.svg')}}" alt="webiste logo">
					</a>
				</figure>
				<nav class="flex-1">
					<ul class="main-menu list-unstyled flex-center">
						<li class="menu-item selected"><a href="{{route('Site.home.index')}}">{{__('Main')}}</a></li>
						<li class="menu-item has-children">
							<a href="#">{{__('our specialties')}}</a>
							<ul class="sub-menu list-unstyled">
								@foreach (\App\Models\Specialtie::get() as $row)
							     	<li><a href="{{route('Site.specialtie',$row->id)}}">{{$row->title}}</a></li>
								@endforeach
							
							</ul>
						</li>
						<li class="menu-item  has-children">
							<a href="#">{{__('our services')}}</a>
							<ul class="sub-menu list-unstyled">
								<li><a href="{{route('Site.EyeHealthInfo.index')}}">{{__('Information about your eye health')}}</a></li>
								@php  use App\Models\Topic;
                              	 Topic::where('type','health-video')->whereHas('videos')->orderby('id','desc')->latest()->first() @endphp
								<li><a href="{{route('Site.video.health',$topic?->id ?? 0)}}">{{__('Videos about your eye health')}}</a></li>
								<li><a href="{{route('Site.partners.index')}}">{{__('Insurance partners')}}</a></li>
								@php  
                              	 Topic::where('type','experiments')->whereHas('videos')->orderby('id','desc')->latest()->first() @endphp
								<li><a href="{{route('Site.video.experiments',$topic?->id ?? 0)}}"> {{__('Customer experiments videos')}}</a></li>
								<li><a href="{{route('Site.rate.index')}}"> {{__('customer rates')}}</a></li>
								<li><a href="{{route('Site.rights.index')}}">حقوق و واجبات المريض</a></li>
							</ul>
						</li>
						<li class="menu-item  has-children">
							<a href="#">{{__('our teams')}}</a>
								<ul class="sub-menu list-unstyled">
									@foreach (\App\Models\Specialtie::get() as $row)
										<li><a href="{{route('Site.specialtie',$row->id)}}">{{$row->title}}</a></li>
									@endforeach
								</ul>
							</li>
						<li class="menu-item"><a href="#">أحدث الأجهزة الطبية</a></li>
						<li class="menu-item"><a href="#">السياحة العلاجية</a></li>
						<li class="menu-item has-children">
							<a href="#">الأطباء</a>
								<ul class="sub-menu list-unstyled">
									<li><a href="{{asset('siteassets/Academy and conference/Book-Categories.html')}}">الكتب</a></li>
									<li><a href="{{asset('siteassets/Academy and conference/Medical-Academy.html')}}">الاكاديمية الطبية</a></li>
									<li><a href="{{asset('siteassets/Academy and conference/Medical-conferences.html')}}">مؤتمرات وفاعليات طبية </a></li>
								</ul>
						</li>
					</ul>
				</nav>

				{{-- <ul class="list-group collapse" id="myList">
					@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
						<li class="list-group-item">
								<a rel="alternate" class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
								  <span class="align-middle">
									{{ $properties['native'] }}
								  </span>
								</a>
							</li>
						@endforeach
				</ul>		 --}}

				<div class="languages">
					<span class="current-lang">
						<i class="fa-solid fa-chevron-down"></i>
						Ar
					</span>
					<ul class="lang list-unstyled">
						@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
							<li class="active" data-lang="{{$localeCode}}"> 
								<a rel="alternate" class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
								<span class="align-middle">
								{{ $properties['native'] }}
								</span>
							</a>
							</li>
						@endforeach
					</ul>
			
				</div>

			

				<div class="login-btns">
					<a class="login-btn btn" href="">
						<span>تسجيل الدخول</span>
						<i class="fa-solid fa-right-to-bracket"></i>
					</a>
				</div>
				<div class="bars">
					<i class="fa-solid fa-bars"></i>
				</div>
				<div class="user-logged-in flex-start">
					<a href="" class="head-icon flex-start align-center">
						<img src="{{asset('siteassets/images/bag.svg')}}">
						<span>السلة</span>
					</a>					

					<a href="" class="head-icon flex-start align-center">
						<img src="{{asset('siteassets/images/profile-circle.svg')}}">
						<span>مرحبا ندى</span>
					</a>
				</div>
			</div>
		</div>
	</header>
	<!-- Header Section -->


    @yield('content')