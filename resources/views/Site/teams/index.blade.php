@extends('site')
@section('content')


	<main id="main">
		
		<!-- Banner -->
		<article class="banner">
			<img src="{{$Specialtie->img}}">
		</article>
		<!-- Banner -->

		<!-- Achievement Section -->
		<article class="achievement pd">
			<div class="container">

				<!-- About  -->
				<section class="about flex-start  text-right align-center">
					<div class="col-6 col-md-6 col-sm-12">
						<div class="about-desc">
							<span class="pre-title site-color"> {{$info->title}}</span>
							<h2 class="main-title">{{$info->sub_title}}</h2>
							<p class="main-para">{{$info->desc}}</p>
						</div>	
					</div>
					<div class="col-6 col-md-6 col-sm-12">
						<figure class="about-image">
							<img src="{{asset('siteassets/images/videos/medical/main.svg')}}" alt="">
						</figure>
					</div>
				</section>
				<!-- About  -->

	
					

			</div>
		</article>
		<!-- Achievement Section -->


		<article class="videos-section pd">
			<div class="container">
				<div class="flex-start">
					<div class="col-3 col-md-6 col-sm-12">
						<div class="aside-tabs">

                            @foreach ($Specialties as $data)
                                <a href="{{route('Site.teams.index',$data->id)}}" class="aside-tab flex-between align-center @if($data->id==$id) active @endif">
                                    <div class="flex-1">
                                        <h3>{{$data->title}}</h3>
                                    </div>
                                    <i class="fa-solid fa-chevron-left"></i>
                                </a>			
                            @endforeach
						</div>
					</div>
					<div class="col-9 col-md-6 col-sm-12">
						<div class="all-videos-holder flex-center row-gab-15">


                            @foreach ($doctors as $row)
                                		<div class="col-6 col-md-6 col-sm-12">
                                    <div class="text-box">
                                        
                                        <img src="{{$row->img}}" width="60" height="60" alt="">
                                        <h4>{{$row->info->name}}</h4>
                                        <p class="feedback">
                                        <h4>{{$row->info->breif}}</h4>
										</p>
                                        <a href="{{route('Site.teams.profile',[$row->id,$id])}}" class="show-profile">
                                         {{__('display profile and booking')}}
										</a>
                                    </div>
                                </div>
                            @endforeach



						</div>
					</div>
				</div>
			</div>
		</article>

		<!-- Contact us Section -->
	     @include('components.contact-us')
		<!-- Contact us Section -->


	</main>

@endsection