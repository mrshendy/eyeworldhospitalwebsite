@extends('temp')
@section('styles')
{{-- <link href="{{asset('select2/css/select2.min.css')}}"> --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<link rel="stylesheet" href="{{asset('dropify/dist/css/demo.css')}}">
<link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">

@endsection


@section('content')


 <div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('Admin.doctors.index')}}">{{__('doctors')}}</a></li>
          <li class="breadcrumb-item"><a href="{{route('Admin.doctors.create')}}">{{__('create')}}</a></li>
        </ol>
      </nav>


      <div class="card">



            <div class="card-body">

                <form method="post" action="{{route('Admin.doctors.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">


                        <label for="input-file-max-fs">{{__('img')}}</label>
                        <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"  @isset($data) data-default-file="{{ $data->img }}" @endisset  />
                      

                        <div class="form-group col-6">
                    
                            <label>{{ __('name') }}</label>
                            <input class="form-control" name="name"   value="{{old('name')}}" type="text" required>
                        
                        </div>   


                        <div class="form-group col-6">
                    
                            <label>{{ __('job title') }}</label>
                            <input class="form-control" name="job_title"   value="{{old('job_title')}}" type="text" required>
                        
                        </div>   


                        <div class="form-group col-6">
                    
                            <label>{{ __('title') }}</label>
                            <input class="form-control" name="title"   value="{{old('title')}}" type="text" required>
                        
                        </div>   


                        <div class="form-group col-6">
                    
                            <label>{{ __('sub title') }}</label>
                            <input class="form-control" name="sub title"   value="{{old('sub_title')}}" type="text" required>
                        
                        </div>   


                        <div class="form-group col-6">
                    
                            <label>{{ __('breif') }}</label>
                            <textarea class="form-control" name="breif"  row="3"  value="" type="text" required>{{old('job_title')}} </textarea>
                        
                        </div>   


                        
                        <div class="form-group col-6">
                    
                            <label>{{ __('desc') }}</label>
                            <textarea class="form-control" name="breif"  row="3"  value="" type="text" required>{{old('desc')}} </textarea>
                        
                        </div>   



                        <div class="form-group col-6">
                    
                            <label>{{ __('specialtie') }}</label>
                            <select class="form-select" id="specialty" name="specialtie_id" aria-label="Default select example">
                                @foreach ($specialties as $row)
                                      <option value="{{$row->id}}">{{$row->title}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-6">
                            <label>  {{__('sub specialties')}} </label>    
                                <select name="sub_specialtie_ids[]" id="subSpecialties" class="select2" multiple="multiple">
                                    @foreach ($subspecialties as $row)
                                        <option value="{{$row->id}}">{{$row->main_title}}</option>
                                    @endforeach
                                </select>
                        </div>





                    </div>    

                 

                    <button type="submit" class="btn  mt-2" style="background-color: #267B26 ; color:white">{{__('system.add')}}</button>  





                </form>    

            </div>

      </div>
 </div>  

@endsection


@section('scripts')



<script>
  $(document).ready(function() {
    $('.select2').select2({
      width: "100%"
    });
    
  });
</script>    
    {{-- <link href="{{asset('select2/js/select2.js')}}"> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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


<script>
    $('#specialty').change(function () {
        var specialty_id = $("#specialty option:selected").val();
        var SITEURL ={!!json_encode(url('/'))!!};
        $.ajax({
            url: SITEURL + "/Admin/ajax/subSpecialties/" + specialty_id,
            type: "GET", //send it through get method
            success: function (response) {

                var option = '';
                for (const item of response) {
                    option += '<option value="' + item.id + '">' + item.main_title + '</obtion>';
                }
                $("#subSpecialties").html(option);

            },
            error: function (response) {
                console.log('fdfd');
            }
        });
    })
</script>


@endsection