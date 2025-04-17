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
						<li class="menu-item selected"><a href="#">الرئيسية</a></li>
						<li class="menu-item has-children">
							<a href="#">تخصصاتنا</a>
							<ul class="sub-menu list-unstyled">
								@foreach (\App\Models\Specialtie::get() as $row)
							     	<li><a href="{{route('Site.specialtie',$row->id)}}">{{$row->title}}</a></li>
								@endforeach
							
							</ul>
						</li>
						<li class="menu-item  has-children">
							<a href="#">خدماتنا</a>
							<ul class="sub-menu list-unstyled">
								<li><a href="{{route('Site.EyeHealthInfo.index')}}">{{__('Information about your eye health')}}</a></li>
								<li><a href="{{asset('siteassets/Events&medical team&medical tourism/videos.html')}}">{{__('Videos about your eye health')}}</a></li>
								<li><a href="{{asset('siteassets/Events&medical team&medical tourism/Medical-Insurance-parteners.html')}}">{{__('Insurance partners')}}</a></li>
								<li><a href="{{asset('siteassets/Events&medical team&medical tourism/Customer-Reviews-Videos.html')}}">فيديوهات تجارب العملاء</a></li>
								<li><a href="{{route('Site.rate.index')}}"> {{__('customer rates')}}</a></li>
								<li><a href="{{asset('siteassets/Events&medical team&medical tourism/Patient-rights-and-duties.html')}}">حقوق و واجبات المريض</a></li>
							</ul>
						</li>
						<li class="menu-item  has-children">
							<a href="#">فريقنا</a>
								<ul class="sub-menu list-unstyled">
									<li><a href="{{asset('siteassets/Events&medical team&medical tourism/Medical-Team.html')}}">طب و جراحة العيون</a></li>
									<li><a href="#">الجلدية</a></li>
									<li><a href="#">الاسنان</a></li>
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

				<ul class="list-group collapse" id="myList">
					@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
						<li class="list-group-item">
								<a rel="alternate" class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
								  <span class="align-middle">
									{{ $properties['native'] }}
								  </span>
								</a>
							</li>
						@endforeach
				</ul>		

			

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