@extends('temp')

@section('styles')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}" />


<link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
  rel="stylesheet" />

<!-- Icons -->
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/remixicon/remixicon.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/flag-icons.css')}}" />

<!-- Menu waves for no-customizer fix -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/core.css" class="template-customizer-core-css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}" />

<!-- Page CSS -->

<!-- Helpers -->
<script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
<script src="{{asset('assets/vendor/js/template-customizer.js')}}"></script>
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{asset('assets/js/config.js')}}"></script>

@endsection

@section('content')

<div class="container">
    <h3 class="mb-4">{{ __('specialitie details') }}</h3>
    <form action="{{route('Admin.specialtie.update',0)}}"  method="post"  id="dropzone-basic" enctype="multipart/form-data">
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


    <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/node-waves/node-waves.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{asset('assets/vendor/js/menu.js')}}"></script>

    <script src="{{asset('assets/vendor/libs/dropzone/dropzone.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <!-- Page JS -->
    <script src="{{asset('assets/js/forms-file-upload.js')}}"></script>


    

@endsection