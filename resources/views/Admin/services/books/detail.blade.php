@extends('temp')

@section('styles')

    <link rel="stylesheet" href="{{asset('dropify/dist/css/demo.css')}}">
    <link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">

@endsection


@section('content')

<div class="container">
    <h3 class="mb-4">{{ __('Book Details') }}</h3>
    <div class="card">
    <form action="{{route('Admin.book-info.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
        <label for="input-file-max-fs">{{__('img')}}</label>
        <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="12M"  @isset($data) data-default-file="{{ $data->img }}" @endisset  />

        @foreach (config('translatable.locales') as $locale)

            <label>{{ __('system.'.$locale.'.title') }}</label>
            <input class="form-control" name="{{$locale}}[title]"   value="{{ isset($data) ? $data->translateOrNew($locale)->title : old($locale . '.title')  }}" type="text" required>

            <label>{{ __('system.'.$locale.'.sub_title') }}</label>
            <input class="form-control" name="{{$locale}}[sub_title]"   value="{{ isset($data) ? $data->translateOrNew($locale)->sub_title : old($locale . '.sub_title')  }}" type="text" required>

            <label>{{ __('system.'.$locale.'.description') }}</label>
            <textarea class="form-control" name="{{$locale}}[description]" rows="3"  value="" type="text" required>{{ isset($data) ? $data->translateOrNew($locale)->description : old($locale . '.description')  }} </textarea>
        @endforeach
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
