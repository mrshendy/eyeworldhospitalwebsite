@extends('temp')

@section('content')

<div class="container">
    <h3 class="mb-4">{{ __('SEO Details') }}</h3>
    <div class="card">
    <form action="{{route('Admin.seo.update')}}" method="post">
        @csrf
        <div class="card-body">

            <label>{{ __('Meta Title') }}</label>
            <input class="form-control" name="meta_title" value="{{ isset($seo) ? $seo->meta_title : old('meta_title') }}" type="text">

            <label>{{ __('Meta Description') }}</label>
            <textarea class="form-control" name="meta_description" rows="2" required>{{ isset($seo) ? $seo->meta_description : old('meta_description') }}</textarea>

            <label>{{ __('Meta Keywords') }}</label>
            <input class="form-control" name="meta_keywords" value="{{ isset($seo) ? $seo->meta_keywords : old('meta_keywords') }}" type="text">

            <div>
                <button type="submit" class="btn  mt-4" style="background-color: #267B26 ; color:white">{{__('system.edit')}}</button>
            </div>
        </div>
    </form>
    </div>
</div>


@endsection
