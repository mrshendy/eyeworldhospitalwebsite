@extends('temp')


@section('styles')


@endsection
@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">{{__('appointments')}}</a></li>
         <li class="breadcrumb-item"><a href="#">{{__('edit')}}</a></li>
      </ol>
    </nav>
      

    <div class="card">
      <div class="card-body">

        <form action="{{route('Admin.appointments.update',$data->id)}}" method="Post">
            @csrf
            @method('put')

           <div class="row">


                 <div class="col-md-3 form-group">
                    <lable>{{__('day')}}</lable>
                    <select name="day_id" class="form-control">
                        @foreach ($days as $row)
                             <option value="{{$row->id}}"
                                @if($data->day_id == $row->id)
                                   selected
                                @endif
                                
                                >{{$row->title}}</option>
                        @endforeach
                    </select>
                 </div>

                 <div class="col-md-3 form-group">
                    <lable>{{__('from')}}</lable>
                    <input type="time" name="time_from" value="{{ isset($data) ? $data->time_from : old('time_from')}}" class="form-control">
                 </div>

                  <div class="col-md-3 form-group">
                    <lable>{{__('to')}}</lable>
                    <input type="time" name="time_to" value="{{ isset($data) ? $data->time_to : old('time_to')}}"  class="form-control">
                 </div>

                  {{-- <div class="col-md-3 form-group">
                    <lable>{{__('avilable count')}}</lable>
                    <input type="number" name="avilable_count"   value="{{ isset($data) ? $data->avilable_count : old('avilable_count')}}"  class="form-control">
                 </div>

                 <div class="form-check form-switch mt-2">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="stop_on_complete" {{ isset($data) ? ($data->stop_on_complete ? 'checked' : (old('avilable_count') ? 'checked' : '')) : (old('avilable_count') ? 'checked' : '') }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">{{__('stop on complete')}}</label>
                </div> --}}

                <div>
                    <button type="submit" class="btn  mt-2" style="background-color: #267B26 ; color:white">{{__('system.edit')}}</button>  
                </div>

           </div>
 
        </form>    

      </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection