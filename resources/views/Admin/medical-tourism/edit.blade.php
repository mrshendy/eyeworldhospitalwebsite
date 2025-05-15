@extends('temp')


@section('styles')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="{{asset('dropify/dist/css/demo.css')}}">
<link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">

@endsection

@section('content')
<div class="container">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{__('medical_devices')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('create article')}}</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-body">

    <form method="post" action="{{route('Admin.medical-tourism-services.update',$data->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
         @foreach (config('translatable.locales') as $locale)
             <div class="col-12">
                 <div>
                     <label>{{ __('system.'.$locale.'.title') }}</label>
                     <input class="form-control" name="{{$locale}}[title]"    value="{{ isset($data) ? $data->translateOrNew($locale)->title : old($locale . '.title')  }}"  type="text" required>

                     <label>{{ __('system.'.$locale.'.description') }}</label>
                     <textarea class="form-control" name="{{$locale}}[description]" rows="3"   type="text" required>{{ isset($data) ? $data->translateOrNew($locale)->description : old($locale . '.description')  }} </textarea>
                     </div>
             </div>
          @endforeach
       <button type="submit" class="btn btn-primary mt-2">{{__('system.edit')}}</button>
     </form>
  </div>
  </div>
</div>

@endsection
