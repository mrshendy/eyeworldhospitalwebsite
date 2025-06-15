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
        <li class="breadcrumb-item"><a href="{{ route('Admin.books.index') }}">{{__('library')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('Books')}}</li>
        <li class="breadcrumb-item active" aria-current="page">{{__('create')}}</li>
      </ol>
    </nav>

    <div class="card">
        <form method="post" action="{{route('Admin.books.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">



              <label for="input-file-max-fs">{{__('img')}}</label>
              <input type="file" name="img" id="input-file-max-fs" class="dropify" data-max-file-size="2M"  @isset($data) data-default-file="{{ $data->img }}" @endisset  />

              <label for="input-file-max-fs">{{__('file')}}</label>
              <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"  @isset($data) data-default-file="{{ $data->img }}" @endisset  />

            
            
            
            
              @foreach (config('translatable.locales') as $locale)
                  <div class="col-12">
                      <div>
                          <label>{{ __('system.'.$locale.'.title') }}</label>
                          <input class="form-control" name="{{$locale}}[title]"   value="" type="text" required>

                          <label>{{ __('system.'.$locale.'.desc') }}</label>
                          <input class="form-control" name="{{$locale}}[desc]"   value="" type="text" required>
                        </div>
                  </div>
                @endforeach




               <div class="form-group col-6">
                    <label for="topic_id">{{__('topic')}}</label>
                    <select class="form-select" name="topic_id" id="topic_id" required>
                        {{-- <option value="" disabled selected>{{__('system.select')}}</option> --}}
                        @foreach($topics as $topic)
                            <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-6">
                    <label for="author_id">{{__('count')}}</label>
                   <input type="number" class="form-control" name="count" id="count" value="{{ old('count') }}" required>
                </div>

                 <div class="form-group col-6">
                    <label for="author_id">{{__('price')}}</label>
                   <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}" required>
                </div>


                 <div class="form-group col-6">
                    <label for="author_id">{{__('pdf price')}}</label>
                   <input type="number" class="form-control" name="pdf_price" id="pdf_price" value="{{ old('pdf_price') }}" required>
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

<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

