@extends('temp')

@section('styles')

@endsection

@section('content')

<div class="card">
   <div class="card-header">
      <h4>{{__('system.abouts')}}</h4>

   </div>
   <div class="card-body">
      <div class="row">
         <div class="col-12">
      
            <form action="{{route('Admin.abouts.update',0)}}" method="post">
              @csrf
              @method('put')
      
              @foreach (config('translatable.locales') as $locale)
                  <label>{{ __('system.'.$locale.'.title') }}</label>
                  <input class="form-control" name="{{$locale}}[title]"    value="{{ isset($data) ? $data->translateOrNew($locale)->title : old($locale . '.title')  }}" type="text" required>
      
                  <label>{{ __('system.'.$locale.'.sub_title') }}</label>
                  <input class="form-control" name="{{$locale}}[sub_title]"  value="{{ isset($data) ? $data->translateOrNew($locale)->sub_title : old($locale . '.sub_title')  }}"  type="text" required>
          
                  <label>{{ __('system.'.$locale.'.desc') }}</label>
                  <textarea class="form-control" name="{{$locale}}[desc]" rows="5" type="text"  required> {{ isset($data) ? $data->translateOrNew($locale)->desc : old($locale . '.desc')  }} </textarea>
               @endforeach
      
               <button type="submit" class="btn btn-primary mt-3">{{__('system.edit')}}</button>
              </form> 
      
         </div>
      
      </div>
   
   </div>

  

</div>



@endsection
@section('scripts')



@endsection