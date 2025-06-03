@extends('temp')


@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="{{asset('dropify/dist/css/demo.css')}}">
<link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">
@endsection

@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('Admin.conferences.doctors.index', $conferenceId) }}">{{__('Conference Doctors')}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{__('Edit Conference Doctor')}}</li>
        </ol>
     </nav>

  <div class="card">
    <div class="card-body">

        <form method="POST" action="{{ route('Admin.conferences.doctors.update', [$conferenceId, $conference_doctor->id]) }}" enctype="multipart/form-data">
            @csrf
        @method('put')

        <label for="input-file-max-fs">{{__('img')}}</label>
        <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"  @isset($conference_doctor) data-default-file="{{ $conference_doctor->img }}" @endisset  />

        <label>{{ __('Type') }}</label>
        <select class="form-control" name="type" required>
            <option value="local" {{ $conference_doctor->type === 'local' ? 'selected' : '' }}>{{ __('Local') }}</option>
            <option value="global" {{ $conference_doctor->type === 'global' ? 'selected' : '' }}>{{ __('Global') }}</option>
        </select>

        @foreach (config('translatable.locales') as $locale)
            <div class="col-12">
                <label>{{ __('system.'.$locale.'.name') }}</label>
                <input class="form-control" name="{{$locale}}[name]" value="{{ $conference_doctor->translateOrNew($locale)->name }}" type="text" required>
                <label>{{ __('system.'.$locale.'.specialty') }}</label>
                <input class="form-control" name="{{$locale}}[specialty]" value="{{ $conference_doctor->translateOrNew($locale)->specialty }}" type="text" required>
            </div>
        @endforeach



        <button type="submit" class="btn btn-primary mt-2">{{__('system.edit')}}</button>
    </div>
     </form>
  </div>
  </div>
</div>

@endsection

@section('scripts')
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
