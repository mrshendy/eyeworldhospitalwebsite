
@extends('site')

@section('content')
    <main id="main">

        <article class="thankyou pdt">
            <div class="thankyou-box">
                <h3>{{ __("Your interest in the conference has been successfully registered.") }}</h3>
                <p>{{ __("You can follow the conferences you have expressed interest in from your settings.") }}</p>
                <a href="{{ route('Site.conference.index') }}" class="w-100 confirm-link">{{ __("Go to conferences") }}</a>
                <a href="{{ route('Site.home.index') }}" class="w-100 confirm-link">{{ __("Go to main page") }}</a>
            </div>
        </article>

    </main>
@endsection

