@extends('temp')


@section('styles')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="{{asset('dropify/dist/css/demo.css')}}">
<link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">

@endsection

@section('content')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{__('medical_devices')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('create article')}}</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-body">
        <form method="post" action="{{route('Admin.medical-devices.update',$data->id)}}" enctype="multipart/form-data">
           @csrf
           @method('put')

           <label for="input-file-max-fs">{{__('img')}}</label>
           <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"  @isset($data) data-default-file="{{ $data->img }}" @endisset  />


            <div class="form-group col-12">

                <label>{{ __('specialtie') }}</label>
                <select class="form-select" id="spec_id" name="spec_id" aria-label="Default select example">
                    @foreach ($specialists as $specialty)
                        <option value="{{$specialty->id}}">{{$specialty->title}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-12">
                <label>  {{__('sub specialties')}} </label>
                <select name="sub_specialties_ids[]" id="sub_specialties" class="select2" multiple="multiple">
                    @foreach ($sub_specialists as $sub)
                        <option value="{{$sub->id}}"
                            @if(isset($data) && $data->subSpecialties->contains($sub->id)) selected @endif>
                            {{ $sub->main_title }}
                    @endforeach
                </select>
            </div>

            @foreach (config('translatable.locales') as $locale)
                <div class="col-12">
                    <div>
                        <label>{{ __('system.'.$locale.'.title') }}</label>
                        <input class="form-control" name="{{$locale}}[title]"    value="{{ isset($data) ? $data->translateOrNew($locale)->title : old($locale . '.title')  }}"  type="text" required>

                        <label>{{ __('system.'.$locale.'.sub_title') }}</label>
                        <textarea class="form-control" name="{{$locale}}[sub_title]" rows="3"   type="text" required>{{ isset($data) ? $data->translateOrNew($locale)->sub_title : old($locale . '.sub_title')  }} </textarea>
                        </div>
                </div>
                @endforeach

            <div class="col-12">
            <div class="card">
                <h5 class="card-header">{{__('Description on Arabic')}}</h5>
                <div class="card-body">
                <textarea id="editor-ar" name="ar[description]" required>
                        {!! old('description_content', $data->translateOrNew('ar')->description) !!}
                    <p></p>
                </textarea>
                </div>
            </div>
            </div>

            <div class="col-12">
            <div class="card">
                <h5 class="card-header">{{__('Description on English')}}</h5>
                <div class="card-body">
                <textarea id="editor" name="en[description]" required>
                    <p>

                    {{ isset($data) ? $data->translateOrNew('en')->description : old($locale . '.description')  }}
                    </p>
                </textarea>
                </div>
            </div>
            </div>

          <button type="submit" class="btn btn-primary mt-2">{{__('system.edit')}}</button>
        </form>
    </div>
  </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                console.log('fdfd');
            }
        });
    })
</script>
@endsection

