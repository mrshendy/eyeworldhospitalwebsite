@extends('temp')

@section('styles')
<link rel="stylesheet" href="{{asset('dropify/dist/css/demo.css')}}">
<link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">


@endsection



@section('content')
 <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Admin.medical-academies.index') }}">{{__('Medical Academies')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Create Medical Academy')}}</li>
      </ol>
    </nav>

    <div class="card">
        <form method="post" action="{{route('Admin.medical-academies.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

              <label for="input-file-max-fs">{{__('img')}}</label>
              <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"  @isset($data) data-default-file="{{ $data->img }}" @endisset  />

                @foreach (config('translatable.locales') as $locale)
                  <div class="col-12">
                      <div>
                          <label>{{ __('system.'.$locale.'.title') }}</label>
                          <input class="form-control" name="{{$locale}}[title]"   value="" type="text" required>

                          <label>{{ __('system.'.$locale.'.description') }}</label>
                          <input class="form-control" name="{{$locale}}[description]"   value="" type="text" required>
                        </div>
                  </div>
                @endforeach

                <div class="form-group">
                    <label>{{ __('Medical Academy Videos') }}</label>
                    <div id="medical-academy-wrapper">
                        <div class="advantage-item mb-3 border rounded p-2">
                            @foreach (config('translatable.locales') as $locale)
                                <div class="mb-2">
                                    <label>{{ __('system.'.$locale.'.title') }}</label>
                                    <input type="text" name="videos[0][{{ $locale }}][title]" class="form-control" required>
                                    <label>{{ __('system.'.$locale.'.description') }}</label>
                                    <textarea name="videos[0][{{ $locale }}][description]" class="form-control" required></textarea>
                                </div>
                            @endforeach
                            <div class="mb-2">
                                <label>{{ __('Video URL') }}</label>
                                <input type="text" name="videos[0][video_url]" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>{{ __('Video Thumbnail') }}</label>
                                <input type="file" name="videos[0][img]" class="form-control dropify" data-max-file-size="2M" required>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success mt-2" id="add-video"><i class="fa fa-plus"></i>{{  __('Add Video Details')}}</button>
                </div>
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

<script>
    $(document).ready(function () {
        let videoIndex = 1;
        const locales = @json(config('translatable.locales'));

        $('#add-video').click(function () {
            let html = `<div class="advantage-item mb-3 border rounded p-2">`;

            locales.forEach(function(locale) {
                html += `
                    <div class="mb-2">
                        <label>{{ __('system.') }}${locale}{{('.title') }}</label>
                        <input type="text" name="videos[${videoIndex}][${locale}][title]" class="form-control" required>

                        <label>{{ __('system.') }}${locale}{{('.description') }}</label>
                        <textarea name="videos[${videoIndex}][${locale}][description]" class="form-control" required></textarea>
                    </div>
                `;
            });

            html += `
                <div class="mb-2">
                    <label>{{ __('Video URL') }}</label>
                    <input type="text" name="videos[${videoIndex}][video_url]" class="form-control" required>
                </div>

                <div class="mb-2">
                    <label>{{ __('Video Thumbnail') }}</label>
                    <input type="file" name="videos[${videoIndex}][img]" class="form-control dropify" data-max-file-size="2M" required>
                </div>

                <button type="button" class="btn btn-danger btn-sm remove-video mt-2">{{ __('remove') }}</button>
            </div>`;

            $('#medical-academy-wrapper').append(html);
            $('.dropify').dropify(); // Re-initialize dropify for new input
            videoIndex++;
        });

        $('#medical-academy-wrapper').on('click', '.remove-video', function () {
            $(this).closest('.advantage-item').remove();
        });
    });
</script>

<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script>



@endsection

