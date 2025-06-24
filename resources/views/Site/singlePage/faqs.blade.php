@extends('site')

@section('content')

<main id="main">

    <!-- Banner -->
    <article class="banner">
        <img src="{{asset('uploads/medical-devices/banner.jpg')}}">
    </article>
    <!-- Banner -->
    <!-- Faq Section -->
    <article class="faq pd">
        <div class="container">
            <div class="flex-between pdb">
                <div>
                    <span class="pre-title site-color">{{__('quetion 1')}}</span>
                    <h2 class="main-title">{{__('quetion 2')}}</h2>
                </div>
            </div>
            <p class="main-para">{{__('quetion 3')}}</p>
            <div class="questions pdt flex-start row">
                @foreach ($questions as $question)
                <div class="col-4 col-md-6 col-sm-12">
                    <div class="qbox">
                        <h3>
                            <i class="fa-solid fa-chevron-left"></i>
                             {{$question->quetion}}
                        </h3>
                        <div class="answer">
                            <p>{{$question->answer}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </article>
    <!-- Faq Section -->
    @include('components..contact-us')
</main>
@endsection
