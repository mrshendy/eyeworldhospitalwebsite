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
							<a href="#">{{__('specialties')}}</a>
							<ul class="sub-menu list-unstyled">
								@foreach (\App\Models\Specialtie::get() as $row)
							     	<li><a href="{{route('Site.specialtie',$row->id)}}">{{$row->title}}</a></li>
								@endforeach

							</ul>
						</li>
						<li class="menu-item  has-children">
							<a href="#">{{__('services')}}</a>
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
							<a href="#">{{__('teams')}}</a>
								<ul class="sub-menu list-unstyled">
									@foreach (\App\Models\Specialtie::get() as $row)
										<li><a href="{{route('Site.teams.index',$row->id)}}">{{$row->title}}</a></li>
									@endforeach
								</ul>
							</li>

						<li class="menu-item"><a href="{{route('Site.medicalDevices.index')}}"> {{__('medical devices')}}</a></li>
						<li class="menu-item"><a href="{{route('Site.medicalTourism.index')}}"> {{__('medical_tourisms')}}</a></li>
						<li class="menu-item has-children">
							<a href="#">{{__('doctors')}}</a>
								<ul class="sub-menu list-unstyled">
									<li><a href="{{asset('siteassets/Academy and conference/Book-Categories.html')}}">الكتب</a></li>
									<li><a href="{{asset('siteassets/Academy and conference/Medical-Academy.html')}}">الاكاديمية الطبية</a></li>
					            	<li class="menu-item"><a href="{{route('Site.conference.index')}}"> {{__('medical_conferences')}}</a></li>
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
						{{App::getLocale()}}
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


                @guest

					<div class="login-btns">
						<a href="{{route('Site.register.index')}}" class="login-btn btn" href="">
							<span>{{__('login')}}</span>
							<i class="fa-solid fa-right-to-bracket"></i>
						</a>
					</div>

				@endguest
				
				<div class="bars">
					<i class="fa-solid fa-bars"></i>
				</div>
				<div class="user-logged-in flex-start">
					<a href="" class="head-icon flex-start align-center">
						<img src="{{asset('siteassets/images/bag.svg')}}">
						<span>{{__('cart')}}</span>
					</a>

					@auth
					<a href="" class="head-icon flex-start align-center">
						<img src="{{asset('siteassets/images/profile-circle.svg')}}">
						<span>{{Auth::user()->name}}</span>
					</a>
					@endauth



				</div>
			</div>
		</div>
	</header>
	<!-- Header Section -->


    @yield('content')
