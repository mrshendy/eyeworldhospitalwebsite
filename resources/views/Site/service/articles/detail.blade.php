@extends('site')
@section('content')

<main id="main">

    <!-- Banner -->
    <article class="banner">
        <img src="{{$article->img}}" alt="{{ $article->title }}">
    </article>
    <!-- Banner -->

    <article class="single">
        <div class="container">
            <h2 class="main-title">{{$article->title}}</h2>
               {!!$article->article!!}
        </div>
    </article>
    <!-- Discover two Section -->
    <!-- Doctors Section -->
    <article class="doctors pdt">
        <div class="container">

            {{-- <span class="pre-title site-color">حافظ على صحة عينيك من خلال الفحص المبكر وتجنب المشاكل المستقبلية</span>
            <h2 class="main-title">أهمية الفحص المبكر للعيون وكيفية الوقاية من الأمراض البصرية المختلفة</h2>
            <p class="main-para">الفحص المبكر هو خطوة هامة للحفاظ على صحة عينيك. اكتشاف المشاكل في مراحلها المبكرة يسهل العلاج ويوفر لك فرصة أفضل للشفاء. من خلال هذه الخدمة، نساعدك في اكتشاف مشاكل العين مثل الأورام والأمراض في وقت مبكر.</p>
             --}}
            <div class="doctors-blocks pdt">
                <div class="flex-start row-gap-15">


                    @foreach ($articles as $article)

                        <div class="col-3 col-md-6 col-sm-12">
                            <div class="doctor">
                                <figure>
                                    <img src="{{$article->img}}" alt="{{ $article->title }}">
                                </figure>
                                <div class="doctor-dtl">
                                    <h3>{{$article->title}}</h3>
                                    <p>{{$article->desc}}</p>
                                    <a href="{{route('Site.article.detail',$article->slug)}}">
                                        {{__('read more')}}
                                    </a>
                                </div>
                            </div>
                        </div>

                    @endforeach


                </div>
            </div>


        </div>
    </article>
    <!-- Doctors Section -->

    <!-- Discover two Section -->



    <!-- Contact us Section -->
    @include('components.contact-us')
    <!-- Contact us Section -->


</main>

@endsection
