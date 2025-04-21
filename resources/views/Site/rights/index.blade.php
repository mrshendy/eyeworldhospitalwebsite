@extends('site')
@section('content')


<main id="main">
		
    <!-- Banner -->
    <article class="banner">
        <img src="{{asset('siteassets/images/specializations/main.svg')}}">
    </article>
    <!-- Banner -->

    <!-- Achievement Section -->
    <article class="achievement pd">
        <div class="container">

            <!-- About  -->
            <section class="about flex-start  text-right align-center">
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="about-desc">
                        <span class="pre-title site-color">{{$info->title}}</span>
                        <h2 class="main-title"> :{{$info->subtitle}}</h2>
                        <p class="main-para">{{$info->desc}}
                        </p>
                        <a href="#" class="download btn">
                            الحقوق والواجبات!
                            <img src="{{asset('siteassets//images/patients/download.svg')}}" width="24" height="24" alt="">
                        </a>
                    </div>	
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <figure class="about-image">
                        <img src="{{asset('siteassets//images/patients/main.svg')}}" alt="">
                    </figure>
                </div>
            </section>
            <!-- About  -->


                

        </div>
    </article>
    <!-- Achievement Section -->


    <!-- Patients Rights Section -->
    <article class="patients-rights pd">
        <div class="container">
            <h2 class="main-title">حقوق المرضى</h2>
            <div class="pdt flex-start row-gap-15">

                @foreach ($rights as $row)
                    <div class="col-4 col-md-6 col-sm-12">
                        <div class="rights-box flex-start">
                            <img src="{{asset('siteassets/images/patients/note.svg')}}" width="24" height="24" alt="">
                            <div class="flex-1">
                                <h4>{{$row->title}}</h4>
                                <p>{{$row->desc }}</p>
                             </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </article>
    <!-- Patients Rights Section -->

    <!-- Patients Duties Section -->
    <article class="patients-rights  pd">
        <div class="container">
            <h2 class="main-title">واجبات المرضى</h2>
            <div class="pdt flex-start row-gap-15">

                @foreach ($duties as $row)
                    <div class="col-4 col-md-6 col-sm-12">
                        <div class="rights-box flex-start">
                            <img src="{{asset('siteassets/images/patients/note.svg')}}" width="24" height="24" alt="">
                            <div class="flex-1">
                                <h4>{{$row->title}}</h4>
                                <p>{{$row->desc }}</p>
                             </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </article>
    <!-- Patients Duties Section -->



       <!-- Contact us Section -->
       @include('components.contact-us')
       <!-- Contact us Section -->
   


</main>
@endsection