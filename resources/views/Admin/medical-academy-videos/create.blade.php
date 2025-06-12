@extends('temp')

@section('styles')
<link rel="stylesheet" href="{{asset('dropify/dist/css/demo.css')}}">
<link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">


@endsection



@section('content')
 <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Admin.medical-academy-videos.index') }}">{{__('Medical Academy Videos')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Create Medical Academy Video')}}</li>
      </ol>
    </nav>

    <div class="card">
        <form method="post" action="{{route('Admin.medical-academy-videos.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <label for="input-file-max-fs">{{__('img')}}</label>
                <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"  @isset($data) data-default-file="{{ $data->img }}" @endisset  />

                <div class="col-12 mb-3">
                    <label for="spec_id" class="form-label">{{ __('Medical Academy') }}</label>
                    <select name="medical_academy_id" class="form-control" required>
                        <option value="">{{ __('Choose Medical Academy') }}</option>
                        @foreach($medical_academies as $academy)
                            <option value="{{ $academy->id }}">
                                {{ $academy->translateOrDefault()?->title ?? $academy->title ?? '' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2">
                    <label>{{ __('Video URL') }}</label>
                    <input type="text" name="video_url" class="form-control" required>
                </div>

                @foreach (config('translatable.locales') as $locale)
                  <div class="col-12">
                      <div>
                          <label>{{ __('system.'.$locale.'.title') }}</label>
                          <input class="form-control" name="{{$locale}}[title]"   value="" type="text" required>

                          <label>{{ __('system.'.$locale.'.description') }}</label>
                          <textarea name="{{$locale}}[description]" class="form-control" rows="3" required></textarea>
                        </div>
                  </div>
                @endforeach

            </div>

            <button type="submit" class="btn btn-primary mt-2">{{__('system.add')}}</button>
          </form>

    </div>
 </div>
@endsection

@section('scripts')


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

<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script>
@endsection
