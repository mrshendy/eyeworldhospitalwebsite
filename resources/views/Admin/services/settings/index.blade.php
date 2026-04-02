@extends('temp')

@section('styles')

    <link rel="stylesheet" href="{{asset('dropify/dist/css/demo.css')}}">
    <link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">

@endsection


@section('content')

<div class="container">
    <h3 class="mb-4">{{ __('Settings Details') }}</h3>
    <div class="card">
    <form action="{{route('Admin.settings.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

        <label for="input-file-max-fs">{{__('img')}}</label>
        <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="12M"  @isset($data) data-default-file="{{ $data->logo }}" @endisset  />


        @foreach (config('translatable.locales') as $locale)

            <label>{{ __('system.'.$locale.'.title') }}</label>
            <input class="form-control" name="{{$locale}}[title]"   value="{{ isset($data) ? $data->translateOrNew($locale)->title : old($locale . '.title')  }}" type="text" required>

            <label>{{ __('system.'.$locale.'.description') }}</label>
            <textarea class="form-control" name="{{$locale}}[description]" rows="2" required>{{ isset($data) ? $data->translateOrNew($locale)->description : old($locale . '.description')  }} </textarea>

            <label>{{ __('system.'.$locale.'.address') }}</label>
            <input class="form-control" name="{{$locale}}[address]" value="{{ isset($data) ? $data->translateOrNew($locale)->address : old($locale . '.address')  }}" type="text" required>

            <label>{{ __('system.'.$locale.'.city') }}</label>
            <input class="form-control" name="{{$locale}}[city]" value="{{ isset($data) ? $data->translateOrNew($locale)->city : old($locale . '.city')  }}" type="text" required>

        @endforeach

        <label>{{ __('Phone') }}</label>
        <input class="form-control" name="phone" value="{{ isset($data) ? $data->phone : old('phone') }}" type="text" required>

        <label>{{ __('Secondary Phone') }}</label>
        <input class="form-control" name="secondary_phone" value="{{ isset($data) ? $data->secondary_phone : old('secondary_phone') }}" type="text">

        <label>{{ __('Email') }}</label>
        <input class="form-control" name="email" value="{{ isset($data) ? $data->email : old('email') }}" type="email" required>

        <label>{{ __('Whatsapp') }}</label>
        <input class="form-control" name="whatsapp_number" value="{{ isset($data) ? $data->whatsapp_number : old('whatsapp_number') }}" type="number" required>

        <label>{{ __('ZIP') }}</label>
        <input class="form-control" name="zip" value="{{ isset($data) ? $data->zip : old('zip') }}" type="text" required>

        <label>{{ __('Facebook') }}</label>
        <input class="form-control" name="facebook" value="{{ isset($data) ? $data->facebook : old('facebook') }}" type="text" required>

        <label>{{ __('Twitter') }}</label>
        <input class="form-control" name="twitter" value="{{ isset($data) ? $data->twitter : old('twitter') }}" type="text" required>

        <label>{{ __('Instagram') }}</label>
            <input class="form-control" name="instagram" value="{{ isset($data) ? $data->instagram : old('instagram') }}" type="text" required>

        <label>{{ __('Latitude') }}</label>
            <input class="form-control" name="lat" value="{{ isset($data) ? $data->lat : old('lat') }}" type="text" required>

        <label>{{ __('Longitude') }}</label>
            <input class="form-control" name="lng" value="{{ isset($data) ? $data->lng : old('lng') }}" type="text" required>

        <div>
            <button type="submit" class="btn  mt-4" style="background-color: #267B26 ; color:white">{{__('system.edit')}}</button>
        </div>
        </div>
    </form>
    </div>
</div>


@endsection


@section('scripts')
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('dropify/dist/js/dropify.min.js')}}"></script>


<script>
    $(document).ready(function(){
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element){
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e){
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
  </script>

@endsection
