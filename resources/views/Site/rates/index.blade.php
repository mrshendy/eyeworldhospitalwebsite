@extends('site')
@section('content')




<main id="main">

    <!-- Banner -->
    <article class="banner">
        <img src="{{asset('siteassets/images/specializations/main.svg')}}" alt="Main">
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
                        <h2 class="main-title">{{$info->subtitle}}</h2>
                        <p class="main-para">{{$info->desc}}</p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <figure class="about-image">
                        <img src="{{asset('siteassets/images/videos/reviews/main.svg')}}" alt="Main">
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
                                <h3>مشاكل النظر وضعف الإبصار</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>

                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>جراحات المياه البيضاء والزرقاء</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>

                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>التهابات العين المزمنة</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>مشاكل القرنية المخروطية</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>جراحات تصحيح النظر بالليزر</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>أورام العين وأمراضها النادرة</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>أمراض الشبكية والانفصال الشبكي</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>أمراض الأطفال المتعلقة بالعيون</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>




                    </div>
                </div> --}}
                <div class="col-9 col-md-6 col-sm-12">
                    <div class="all-videos-holder flex-center row-gab-15">


                       @foreach ($rates as $row)

                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="text-box">
                                <div class="flex-start align-center">
                                    <img src="{{ $row->user_id == null ? asset('siteassets/images/videos/reviews/persons/1.svg') : $user->img }}" alt="{{ $row->user_id == null ? 'Default reviewer' : ($user->name ?? 'Reviewer') }}" width="64" height="64" class="rounded-circle">
                                    <div class="flex-1">
                                        <h4>

                                        @if ($row->user_id == null)
                                               {{$row->user_name}}
                                        @else
                                               {{$row->user->name}}
                                        @endif

                                        </h4>
                                        <img src="../images/videos/reviews/stars.svg"  alt="Stars">
                                    </div>
                                </div>
                                <p class="feedback">
                                    {{$row->comment}}
                                </p>
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
