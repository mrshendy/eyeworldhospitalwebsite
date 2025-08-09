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
                        <span class="pre-title site-color">{{$info->title}} </span>
                        <h2 class="main-title"> {{$info->subtitle}}</h2>
                        <p class="main-para">{{$info->desc}}</p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <figure class="about-image">
                        <img src="{{asset('siteassets/images/videos/medical/parteners/main.svg')}}" alt="">
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
                {{-- <div class="col-3 col-md-6 col-sm-12">
                    <div class="aside-tabs">
                        <a href="" class="aside-tab flex-between align-center active">
                            <div class="flex-1">
                                <h3>أورام العين</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>

                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>الليزك (تصحيح الإبصار)</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>

                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>المياه البيضاء</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>المياه الزرقاء</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>اعتلال الشبكية السكري</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>شبكية الأطفال المبتسرين</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>الحول</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>كسل العين</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>

                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>جراحة القرنية</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>

                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>جراحة تجميل</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                    </div>
                </div> --}}
                <div class="col-9 col-md-6 col-sm-12">
                    <div class="all-videos-holder flex-center row-gab-15">

                        @foreach ($partners as $row)
                        @php
                            $firstDoctor = $row->doctors->first();
                        @endphp
                        <div class="col-4 col-md-6 col-sm-12">
                            <div class="text-box text-center">
                                <div class="partener-image">
                                    <img src="{{asset($row->img)}}" alt="">
                                </div>
                                <h4>{{$row->title}}</h4>

                            @if ($firstDoctor && $firstDoctor->specialtie)
                                <a href="{{ route('Site.teams.index', $firstDoctor->specialtie->specialtie_id) }}" class="show-profile">
                                    {{ __('Book your appointment now') }}
                                </a>
                            @endif

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
