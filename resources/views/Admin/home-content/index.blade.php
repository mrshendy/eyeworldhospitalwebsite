@extends('temp')

@section('content')
@php($inputName = fn ($key) => \App\Http\Controllers\Admin\HomeContentController::inputName($key))
<div class="container">
    <h3 class="mb-2">{{ __('Homepage content') }}</h3>
    <p class="text-muted mb-4">{{ __('Edit the texts, numbers and images of the homepage, and show or hide each section.') }}</p>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('Admin.home-content.update') }}" method="post" enctype="multipart/form-data">
        @csrf

        @foreach ($sections as $sectionKey => $section)
            <div class="card mb-4" id="section-{{ $sectionKey }}">
                <div class="card-header"><h5 class="mb-0">{{ __($section['label']) }}</h5></div>
                <div class="card-body">
                    @foreach ($section['fields'] as $key => $field)
                        @php($name = $inputName($key))

                        @if ($field['type'] === 'toggle')
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="t-{{ $name }}" name="toggles[{{ $name }}]" value="1"
                                       @checked(\App\Models\HomeContent::value($key) === '1')>
                                <label class="form-check-label fw-bold" for="t-{{ $name }}">{{ __($field['label']) }}</label>
                            </div>

                        @elseif ($field['type'] === 'image')
                            <div class="mb-3">
                                <label class="form-label fw-bold">{{ __($field['label']) }}</label>
                                <div class="d-flex align-items-center gap-3 flex-wrap">
                                    <img src="{{ home_image($key) }}" alt="" style="max-height:90px;max-width:160px;object-fit:contain;border:1px solid #eee;border-radius:6px" loading="lazy">
                                    <input type="file" class="form-control" style="max-width:320px" name="images[{{ $name }}]" accept="image/*">
                                    @if (! str_starts_with(\App\Models\HomeContent::value($key), 'siteassets/'))
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" name="reset_images[{{ $name }}]" value="1">
                                            <span class="form-check-label">{{ __('Restore the original image') }}</span>
                                        </label>
                                    @endif
                                </div>
                                <small class="text-muted">{{ __('Max 2MB. JPG / PNG / WEBP.') }}</small>
                            </div>

                        @else
                            <div class="row mb-3">
                                @foreach (['ar' => __('Arabic'), 'en' => __('English')] as $locale => $localeLabel)
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">{{ __($field['label']) }} ({{ $localeLabel }})</label>
                                        @if (in_array($field['type'], ['textarea', 'lines']))
                                            <textarea class="form-control" rows="{{ $field['type'] === 'lines' ? 8 : 4 }}" name="{{ $locale }}[{{ $name }}]"
                                                      dir="{{ $locale === 'ar' ? 'rtl' : 'ltr' }}">{{ \App\Models\HomeContent::value($key, $locale) }}</textarea>
                                        @else
                                            <input class="form-control" type="text" name="{{ $locale }}[{{ $name }}]"
                                                   dir="{{ $locale === 'ar' ? 'rtl' : 'ltr' }}" value="{{ \App\Models\HomeContent::value($key, $locale) }}">
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="mb-5">
            <button type="submit" class="btn" style="background-color:#267B26;color:white">{{ __('system.edit') }}</button>
        </div>
    </form>
</div>
@endsection
