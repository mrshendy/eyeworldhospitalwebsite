@extends('site')
@section('content')


<main id="main">

    <!-- Banner -->
    <article class="banner">
        <img src="{{$specialtie->img}}">
    </article>
    <!-- Banner -->

    <!-- Specialization blocks -->
    <article class="specializations-blocks pd">
        <div class="container">
            <span class="pre-title site-color">{{$specialtie->detail_title}}</span>
            <h2 class="main-title">{{$specialtie->detail_subtitle}}</h2>
            <p class="main-para">{{$specialtie->desc}}</p>

            <div class="flex-start pdt row-gap-15">
                @foreach ($SubSpecialties as $row)
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="specializations-block flex-start align-center">
                        <figure>
                            <img src="{{$row->img}}">
                        </figure>
                        <div class="spec-blocks-dtl">
                            <h3>{{$row->main_title}}</h3>
                            <p> {{$row->main_subtitle}}</p>
                            <div class="images">
                                <img src="{{asset('siteassets//images/specializations/avatar/1.svg')}}">
                                <img src="{{asset('siteassets//images/specializations/avatar/2.svg')}}">
                                <img src="{{asset('siteassets//images/specializations/avatar/3.svg')}}">
                                <img src="{{asset('siteassets//images/specializations/avatar/4.svg')}}">
                                <img src="{{asset('siteassets//images/specializations/avatar/5.svg')}}">
                                <img src="{{asset('siteassets//images/specializations/avatar/6.svg')}}">
                                <img src="{{asset('siteassets//images/specializations/avatar/7.svg')}}">
                                <img src="{{asset('siteassets//images/specializations/avatar/8.svg')}}">
                                <span>+5</span>
                            </div>
                            <a class="site-color" href="{{route('Site.specialtie-detail',$row->id)}}"> {{ __('Learn more') }}</a>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </article>
    <!-- Specialization blocks -->

    <!-- Contact us Section -->
      @include('components.contact-us')
    <!-- Contact us Section -->


</main>

@endsection
