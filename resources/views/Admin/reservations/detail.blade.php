@extends('temp')
@section('styles')
@endsection

@section('content')

<div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Admin.reservations.index')}}">{{__('reservations')}}</a></li>
                 <li class="breadcrumb-item"><a href="#">{{__('reservation detail')}}</a></li>
            </ol>
        </nav>


        <div class="card">
           <div class="card-body">
           
               <form>

                    <div class="row">

                        <div class="form-group col-3">
                            <lable>{{__('doctor')}}</lable>
                            <input type="text" class="form-control" value="{{$data->doctor->info->name}}" readonly>
                        </div>

                         <div class="form-group col-3">
                            <lable>{{__('patient')}}</lable>
                            <input type="text" class="form-control" value="{{$data->patient_name}}" readonly>
                        </div>


                         <div class="form-group col-3">
                            <lable>{{__('patient phone')}}</lable>
                            <input type="text" class="form-control" value="{{$data->phone}}" readonly>
                        </div>



                         <div class="form-group col-3">
                            <lable>{{__('date')}}</lable>
                            <input type="text" class="form-control" value="{{$data->date}}" readonly>
                         </div>


                         <div class="form-group col-3">
                            <lable>{{__('time from')}}</lable>
                            <input type="text" class="form-control" value="{{$data->time_from}}" readonly>
                         </div>

                        <div class="form-group col-3">
                            <lable>{{__('price')}}</lable>
                            <input type="text" class="form-control" value="{{$data->price}}" readonly>
                        </div>

                        <div class="form-group col-3">
                            <lable>{{__('urgent')}}</lable>
                            <input type="text" class="form-control" value="@if($data->urgent==0) {{__('Normal')}} @else {{__('urgent')}}  @endif" readonly>
                        </div>

                        
                        <div class="form-group col-3">
                            <lable>{{__('payment method')}}</lable>
                            <input type="text" class="form-control" value="{{$data->payment_method}}"  readonly>
                        </div>


                         <div class="form-group col-3">
                            <lable>{{__('created at')}}</lable>
                            <input type="text" class="form-control" value="{{$data->created_at}}"  readonly>
                        </div>

                    </div>    


               </form>
        
           </div>
        </div>
</div>    




@endsection

@section('scripts')

@endsection