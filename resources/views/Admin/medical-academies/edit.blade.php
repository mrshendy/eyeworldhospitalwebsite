@extends('temp')


@section('styles')

<link rel="stylesheet" href="{{asset('dropify/dist/css/demo.css')}}">
<link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">

@endsection

@section('content')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Admin.medical-academies.index') }}">{{__('Medical Academies')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Edit Medical Academy')}}</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-body">
        <form method="post" action="{{route('Admin.medical-academies.update',$data->id)}}" enctype="multipart/form-data">
           @csrf
           @method('put')

           <label for="input-file-max-fs">{{__('img')}}</label>
           <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"  @isset($data) data-default-file="{{ $data->img }}" @endisset  />

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

            <div class="form-group">
                <h4>{{ __('Videos') }}</h4>
                <div id="videos-wrapper">
                    @foreach ($data->videos as $video)
                        <div class="card mb-3 video-item border rounded p-2">
                            <input type="hidden" name="videos[{{ $loop->index }}][id]" value="{{ $video->id }}">

                            <label>{{ __('Video URL') }}</label>
                            <input type="text" name="videos[{{ $loop->index }}][video_url]" class="form-control" value="{{ $video->video_url }}">

                            <label>{{ __('Video Thumbnail') }}</label>
                            <input type="file" name="videos[{{ $loop->index }}][img]" class="dropify" data-default-file="{{ asset($video->img) }}">

                            @foreach (config('translatable.locales') as $locale)
                                <div>
                                    <label>{{ __('system.' . $locale . '.title') }}</label>
                                    <input type="text" name="videos[{{ $loop->index }}][{{ $locale }}][title]" class="form-control" value="{{ $video->translateOrNew($locale)->title }}">

                                    <label>{{ __('system.' . $locale . '.description') }}</label>
                                    <textarea name="videos[{{ $loop->index }}][{{ $locale }}][description]" class="form-control">{{ $video->translateOrNew($locale)->description }}</textarea>
                                </div>
                            @endforeach

                            <button type="button" class="btn btn-danger mt-2 remove-existing-video" data-id="{{ $video->id }}">{{ __('remove') }}</button>
                        </div>
                    @endforeach
                </div>
                <input type="hidden" name="deleted_videos[]" id="deleted_videos_holder">
                <button type="button" class="btn btn-secondary mt-2" id="add-video-btn">{{ __('Add Video') }}</button>
                </div>
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

<script>
    let videoIndex = {{ $data->videos->count() }};

    // Delete existing video (add ID to hidden input)
    $(document).on('click', '.remove-existing-video', function () {
        let videoId = $(this).data('id');
        $(this).closest('.video-item').remove();

        if (videoId) {
            $('<input>').attr({
                type: 'hidden',
                name: 'deleted_videos[]',
                value: videoId
            }).appendTo('form');
        }
    });

    // Add new video block
    $('#add-video-btn').on('click', function () {
        const locales = @json(config('translatable.locales'));

        let html = `
        <div class="card mb-3 video-item">
            <label>{{ __('Video URL') }}</label>
            <input type="text" name="videos[${videoIndex}][video_url]" class="form-control">

            <label>{{ __('Video Thumbnail') }}</label>
            <input type="file" name="videos[${videoIndex}][img]" class="dropify">

        `;

        locales.forEach(locale => {
            html += `
            <label>{{ __('system.'.$locale.'.title') }}</label>
            <input type="text" name="videos[${videoIndex}][${locale}][title]" class="form-control">

            <label>{{ __('system.'.$locale.'.description') }}</label>
            <textarea class="form-control" name="videos[${videoIndex}][${locale}][description]"></textarea>
            `;
        });

        html += `<button type="button" class="btn btn-danger mt-2 remove-new-video">{{ __('remove') }}</button></div>`;

        $('#videos-wrapper').append(html);
        $('.dropify').dropify();
        videoIndex++;
    });

    // Remove new (not yet saved) video
    $(document).on('click', '.remove-new-video', function () {
        $(this).closest('.video-item').remove();
    });
    </script>

@endsection

