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
        <li class="breadcrumb-item"><a href="{{ route('Admin.medical-devices.index') }}">{{__('medical_devices')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('create_medical_device')}}</li>
      </ol>
    </nav>

    <div class="card">
        <form method="post" action="{{route('Admin.medical-devices.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

              <label for="input-file-max-fs">{{__('img')}}</label>
              <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"  @isset($data) data-default-file="{{ $data->img }}" @endisset  />

                <div class="form-group col-12">
                    <label>{{ __('specialtie') }}</label>
                    <select class="form-select" id="spec_id" name="spec_id" aria-label="Default select example">
                        @foreach ($specialists as $speciality)
                            <option value="{{$speciality->id}}">{{$speciality->title}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-12">
                    <label>  {{__('sub specialties')}} </label>
                        <select name="sub_specialty_ids[]" id="sub_specialties" class="select2" multiple="multiple">
                            @foreach ($sub_specialists as $sub)
                                <option value="{{$sub->id}}">{{$sub->main_title}}</option>
                            @endforeach
                        </select>
                </div>


              @foreach (config('translatable.locales') as $locale)
                  <div class="col-12">
                      <div>
                          <label>{{ __('system.'.$locale.'.title') }}</label>
                          <input class="form-control" name="{{$locale}}[title]"   value="" type="text" required>

                          <label>{{ __('system.'.$locale.'.sub_title') }}</label>
                          <input class="form-control" name="{{$locale}}[sub_title]"   value="" type="text" required>
                        </div>
                  </div>
                @endforeach
            </div>

              <div class="col-12">
                <div class="card">
                  <h5 class="card-header">{{__('description on Arabic')}}</h5>
                  <div class="card-body">
                    <textarea id="editor-ar" name="ar[description]" required>
                      <p></p>
                    </textarea>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="card">
                  <h5 class="card-header">{{__('description on English')}}</h5>
                  <div class="card-body">
                    <textarea id="editor" name="en[description]" required>
                      <p></p>
                    </textarea>
                  </div>
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
    $(document).ready(function() {
      $('.select2').select2({
        width: "100%"
      });

    });
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
    $('#spec_id').change(function () {
        var specialty_id = $("#spec_id option:selected").val();
        var SITEURL ={!!json_encode(url('/'))!!};
        $.ajax({
            url: SITEURL + "/Admin/ajax/subSpecialties/" + specialty_id,
            type: "GET", //send it through get method
            success: function (response) {

                var option = '';
                for (const item of response) {
                    option += '<option value="' + item.id + '">' + item.main_title + '</option>';
                }
                $("#sub_specialties").html(option);

            },
            error: function (response) {
                console.log('error');
            }
        });
    })
</script>

<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


@endsection

