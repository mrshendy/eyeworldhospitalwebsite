@extends('temp')


@section('styles')

<link rel="stylesheet" href="{{asset('dropify/dist/css/demo.css')}}">
<link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">

@endsection

@section('content')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('Admin.slider.index') }}">{{__('Sliders')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('Edit Slider')}}</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-body">
        <form method="post" action="{{route('Admin.slider.update',$data->id)}}" enctype="multipart/form-data">
           @csrf
           @method('put')

           <label for="input-file-max-fs">{{__('img')}}</label>
           <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"  @isset($data) data-default-file="{{ $data->img }}" @endisset  />

            @foreach (config('translatable.locales') as $locale)
                <div class="col-12">
                    <div>
                        <label>{{ __('system.'.$locale.'.title') }}</label>
                        <input class="form-control" name="{{$locale}}[title]"    value="{{ isset($data) ? $data->translateOrNew($locale)->title : old($locale . '.title')  }}"  type="text" required>

                        <label>{{ __('system.'.$locale.'.sub_title') }}</label>
                        <input class="form-control" name="{{$locale}}[sub_title]"    value="{{ isset($data) ? $data->translateOrNew($locale)->sub_title : old($locale . '.sub_title')  }}"  type="text" required>

                        <label>{{ __('system.'.$locale.'.description') }}</label>
                        <input class="form-control" name="{{$locale}}[description]"    value="{{ isset($data) ? $data->translateOrNew($locale)->description : old($locale . '.description')  }}"  type="text" required>

                    </div>
                </div>
            @endforeach

          <button type="submit" class="btn btn-primary mt-2">{{__('system.edit')}}</button>
        </form>
    </div>
  </div>

@endsection

@section('scripts')
    <script src="{{asset('dropify/dist/js/dropify.min.js')}}"></script>

    <!-- Vendors JS -->
    <script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <script src="{{asset('assets/js/forms-editors.js')}}"></script>

    <script src="{{asset('Ck_editor5/ckeditor.js')}}"></script>
    <script src="{{asset('dropify/dist/js/dropify.min.js')}}"></script>


<script>

    ClassicEditor.create( document.querySelector( '#editor' ), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );


    ClassicEditor.create( document.querySelector( '#editor-ar' ), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );


    } );

</script>



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

