@extends('temp')


@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="{{asset('dropify/dist/css/demo.css')}}">
<link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection

@section('content')
<div class="container">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Admin.participation_types.index') }}">{{__('Participation Types')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Edit Participation Type')}}</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-body">
    <form method="post" action="{{route('Admin.participation_types.update',$data->id)}}">
        @csrf
        @method('put')
            @foreach (config('translatable.locales') as $locale)
                <div class="col-12">
                    <div>
                        <label>{{ __('system.'.$locale.'.title') }}</label>
                        <input class="form-control" name="{{$locale}}[title]"    value="{{ isset($data) ? $data->translateOrNew($locale)->title : old($locale . '.title')  }}"  type="text" required>
                    </div>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary mt-2">{{__('system.edit')}}</button>
        </div>
     </form>
  </div>
  </div>
</div>

@endsection
