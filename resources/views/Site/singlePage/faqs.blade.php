@extends('site')

@section('content')

@section('styles')
   <style>
    .answer {
        display: block;
        margin-top: 5px;
    }

    .d-none {
    display: none !important;
}

    .toggle-answer-link {
        color: #007bff;
        text-decoration: underline;
        cursor: pointer;
        display: inline-block;
        margin-top: 5px;
    }
</style>

<!-- FAQ Schema Markup for Rich Snippets -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    @foreach($questions as $quetion)
    {
      "@type": "Question",
      "name": "{{ $quetion->quetion }}",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "{{ strip_tags($quetion->answer) }}"
      }
    }@if(!$loop->last),@endif
    @endforeach
  ]
}
</script>

<main id="main">

    <!-- Banner -->
    <article class="banner">
        <img src="{{asset('uploads/medical-devices/banner.jpg')}}" alt="FAQs Banner">
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

            <div class="questions pdt flex-start">

                @foreach ($questions as $quetion)
                <div class="col-4 col-md-6 col-sm-12">
                    <div class="qbox">
                        <h3>
                            <i class="fa-solid fa-chevron-left"></i>
                             {{$quetion->quetion}}
                        </h3>
                       @php
                            $plainText = strip_tags($quetion->answer);
                            $charLimit = 20;
                        @endphp

                        @if(strlen($plainText) > $charLimit)
                            @php
                                $shortAnswer = mb_substr($plainText, 0, $charLimit) . '...';
                                $showMoreText = __("Show More");
                                $showLessText = __("Show Less");
                            @endphp
                            <p class="answer short-answer">{{ $shortAnswer }}</p>
                            <p class="answer full-answer d-none">{!! $quetion->answer !!}</p>
                            <a href="javascript:void(0);" class="toggle-answer-link"
                            data-show-more="{{ __('Show More') }}" data-show-less="{{ __('Show Less') }}">
                                {{ __('Show More') }}
                            </a>
                        @else
                            <p class="answer">{!! $quetion->answer !!}</p>
                        @endif
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
