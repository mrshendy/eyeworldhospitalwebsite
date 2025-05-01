@extends('temp')
@section('styles')

     {{-- start quil styles --}}

    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />


    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assets/js/config.js')}}"></script>

    {{-- end quil styles --}}



    <link rel="stylesheet" href="{{asset('dropify/dist/css/demo.css')}}">
    <link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">



@endsection



@section('content')


 <div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('Admin.socialmedia.index')}}">{{__('Social Media')}}</a></li>
          <li class="breadcrumb-item"><a href="{{route('Admin.socialmedia.create')}}">{{__('create')}}</a></li>
        </ol>
      </nav>


      <div class="card">



            <div class="card-body">

                <form method="post" action="{{route('Admin.socialmedia.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">


                      

                        <label for="input-file-max-fs">{{__('img')}}</label>
                        <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"  @isset($data) data-default-file="{{ $data->img }}" @endisset  />

                        <div class="form-group col-6">
                    
                            <label>{{ __('name') }}</label>
                            <input class="form-control" name="name"   value="{{old('name')}}" type="text" required>
                        
                        </div>   


                        <div class="form-group col-6">
                    
                            <label>{{ __('url') }}</label>
                            <input class="form-control" name="url"   value="{{old('url')}}" type="text" required>
                        
                        </div>   


                     


                    </div>    

                 

                    <button type="submit" class="btn  mt-2" style="background-color: #267B26 ; color:white">{{__('system.add')}}</button>  





                </form>    

            </div>

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

@endsection
