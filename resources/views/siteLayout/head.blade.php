<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <title>{{ $seo?->meta_title ?? __('Eye World') }}</title>
	<meta name="description" content="{{ $seo?->meta_description ?? '' }}">
	<meta name="keywords" content="{{ $seo?->meta_keywords ?? '' }}">
    <meta property="og:title" content="{{ $seo?->meta_title ?? __('Eye World') }}" />
    <meta property="og:description" content="{{ $seo?->meta_description ?? '' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('siteassets/images/logo.svg') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $seo?->meta_title ?? __('Eye World') }}" />
    <meta name="twitter:description" content="{{ $seo?->meta_description ?? '' }}" />
    <meta name="twitter:image" content="{{ asset('siteassets/images/logo.svg') }}" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('siteassets/images/logo.svg') }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('siteassets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('siteassets/css/main.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar') }}" />
    <link rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en') }}" />
    <link rel="alternate" hreflang="x-default" href="{{ LaravelLocalization::getLocalizedURL(config('app.locale')) }}" />
    <link rel="canonical" href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(), null, [], true) }}" />

   <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "MedicalBusiness",
        "name": "Eye World Hospital",
        "url": "{{ config('app.url') }}",
        "logo": "{{ asset('uploads/settings/' . ($settings->logo ?? 'logo.svg')) }}",
        "image": "{{ asset('siteassets/images/about.svg') }}",
        "description": "Eye World Hospital is a leading ophthalmology center in Egypt providing cataract, LASIK, retinal and eye care services.",
        "telephone": "{{ $settings->phone ?? '' }}",
        "email": "{{ $settings->email ?? 'info@eyeworldhospital.com' }}",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ $settings->address ?? '' }}",
            "addressLocality": "{{ $settings->city ?? '' }}",
            "addressRegion": "Egypt",
            "postalCode": "{{ $settings->zip ?? '' }}",
            "addressCountry": "EG"
        }
        @if($settings->lat && $settings->lng)
        ,"geo": {
            "@type": "GeoCoordinates",
            "latitude": "{{ $settings->lat }}",
            "longitude": "{{ $settings->lng }}"
        }
        @endif,
        "sameAs": [
            "{{ $settings->facebook ?? '' }}",
            "{{ $settings->twitter ?? '' }}",
            "{{ $settings->instagram ?? '' }}"
        ]
    }
</script>
    @yield('styles')

</head>
<body>


