@extends('temp')
@section('styles')
{{-- <link href="{{asset('select2/css/select2.min.css')}}"> --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
                            <select class="form-select" aria-label="Default select example">
                                @foreach ($specialties as $row)
                                      <option value="{{$row->id}}">{{$row->title}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-6">
                            <label>  {{__('sub specialties')}} </label>    
                                <select name="sub_specialtie_id[]" class="select2" multiple="multiple">
                                    @foreach ($specialties as $row)
                                    <option value="{{$row->id}}">{{$row->title}}</option>
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

{{-- <link href="{{asset('select2/js/select2.js')}}">


<script>
  $(document).ready(function() {
    $('.select2').select2({
      width: "100%"
    });
    
  });
</script>     --}}

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



@endsection