@extends('temp')

@section('styles')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}" />

@endsection

@section('content')

<div class="container">
    <h3 class="mb-4">{{ __('sup specialitie details') }}</h3>
    <form action="{{route('Admin.sup-specialtie.update')}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="hidden" name="id" value="{{$id}}">

        <div class="col-12">
            <div class="card mb-6">
              <h5 class="card-header">Basic</h5>
              <input name="file" type="file" />
            </div>
        </div>

        @foreach (config('translatable.locales') as $locale)

        <label>{{ __('system.'.$locale.'.detail_title') }}</label>
        <input class="form-control" name="{{$locale}}[detail_title]"   value="{{ isset($data) ? $data->translateOrNew($locale)->detail_title : old($locale . '.detail_title')  }}" type="text" required>
    
        <label>{{ __('system.'.$locale.'.detail_subtitle') }}</label>
        <input class="form-control" name="{{$locale}}[detail_subtitle]"   value="{{ isset($data) ? $data->translateOrNew($locale)->detail_subtitle : old($locale . '.detail_subtitle')  }}" type="text" required>
    
        <label>{{ __('system.'.$locale.'.desc') }}</label>
        <textarea class="form-control" name="{{$locale}}[desc]" rows="3"  value="" type="text" required>{{ isset($data) ? $data->translateOrNew($locale)->desc : old($locale . '.desc')  }} </textarea>
        @endforeach
        <div>
            <button type="submit" class="btn btn-primary mt-4">{{__('system.edit')}}</button>
        </div>               
</div>    

@endsection

@section('scripts')

@endsection