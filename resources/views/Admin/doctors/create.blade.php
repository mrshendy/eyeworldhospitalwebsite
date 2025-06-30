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



                        </div>
                        <div class="col-6">
                        </div>

                           @foreach (config('translatable.locales') as $locale)
                            <div class="col-6">
                                <div>

                                    <label>{{ __('system.'.$locale.'.name') }}</label>
                                    <input class="form-control" name="{{$locale}}[name]"   value="{{old('name')}}" type="text" required>

                                    <label>{{ __('system.'.$locale.'.job_title') }}</label>
                                    <input class="form-control" name="{{$locale}}[job_title]"   value="{{old('job_title')}}" type="text" required>


                                    <label>{{ __('system.'.$locale.'.title') }}</label>
                                    <input class="form-control" name="{{$locale}}[title]"   value="{{old('title')}}" type="text" required>

                                    <label>{{ __('system.'.$locale.'.subtitle') }}</label>
                                    <input class="form-control" name="{{$locale}}[sub_title]"   value="{{old('sub_title')}}" type="text" required>

                                    <label>{{ __('system.'.$locale.'.breif') }}</label>
                                    <textarea class="form-control" name="{{$locale}}[breif]"  rows="3"  required>{{old('job_title')}} </textarea>

                                    <label>{{ __('system.'.$locale.'.desc') }}</label>
                                    <textarea class="form-control" name="{{$locale}}[desc]"  rows="3" required>{{old('desc')}} </textarea>


                                    <label>{{ __('system.'.$locale.'.desc') }}</label>
                                    <textarea class="form-control" name="{{$locale}}[sasasa]"  rows="3"  required>{{old('desc')}} </textarea>
                                </div>
                            </div>
                            @endforeach







                        <div class="form-group col-6">
                                <label>{{ __('urgent price') }}</label>
                                <input class="form-control" name="urgent_price"   value="{{old('urgent_price')}}" type="number" required>
                        </div>



                         <div class="form-group col-6">
                                <label>{{ __('price') }}</label>
                                <input class="form-control" name="price"   value="{{old('urgent_price')}}" type="number" required>
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


                        <div class="form-group col-6">
                            <label>  {{__('Insurance partners')}} </label>
                                <select name="partner_ids[]"  class="select2" multiple="multiple">
                                    @foreach ($InsurancePartners  as $row)
                                        <option value="{{$row->id}}">{{$row->title}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group col-6">

                        </div>


                        <div class="row col-12 mt-2">
                            <div class="row  col-12" id="info_div">



                                <label>{{ __('doctor service info') }}</label>
                                @foreach (config('translatable.locales') as $locale)
                                    <div class="form-group col-4" >

                                        <label>{{ __('system.'.$locale.'.info') }}</label>
                                        <textarea class="form-control" name="info[0][{{$locale}}]"  rows="2" required></textarea>

                                    </div>
                                @endforeach

                            </div>


                            <div class="col-lg-3 col-md-12 " style="display: flex; align-items: flex-end;">
                                <button type="button" class="btn" id="add_info">
                                    +  @lang('add other')
                                </button>
                            </div>

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


{{-- add info script --}}

<script>

let inputcount = 0;
$('#add_info').click(function(){
    inputcount += 1;
    $('#info_div').append(`

   <div class="row" id="info${inputcount}">
        <div class="form-group col-4 m-2">

            <textarea class="form-control" name="info[${inputcount}][ar]"  row="2"  value="" type="text" required> </textarea>

        </div>

        <div class="form-group col-4 m-2" >

            <textarea class="form-control" name="info[${inputcount}][en]"  row="2"  value="" type="text" required> </textarea>

        </div>

      <div class="col-3 mt-4">
            <div class="InputWithlabel">
                <i class="ri-delete-bin-5-line delete_info" data-id="${inputcount}"></i>

            </div>
     </div>

    </div>
  `);
});

$(document).on('click', '.delete_info', function () {

    var index = $(this).attr("data-id");
    // alert(index);
    $('#info' + index).remove();
    //  inputcount-=1;

});

</script>





@endsection
