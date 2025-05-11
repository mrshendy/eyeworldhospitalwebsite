@extends('temp')

@section('styles')
@endsection


@section('content')

<div class="container">
    <h3 class="mb-4">{{ __('Team Info Detailes') }}</h3>
    <div class="card">
    <form action="{{route('Admin.team-info.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
        {{-- <div class="col-12">
            <div class="card mb-6">
              <h5 class="card-header">Basic</h5>
              <input name="file" type="file" />
            </div>
        </div> --}}
 
        @foreach (config('translatable.locales') as $locale)

            <label>{{ __('system.'.$locale.'.title') }}</label>
            <input class="form-control" name="{{$locale}}[title]"   value="{{ isset($data) ? $data->translateOrNew($locale)->title : old($locale . '.title')  }}" type="text" required>
    
            <label>{{ __('system.'.$locale.'.subtitle') }}</label>
            <input class="form-control" name="{{$locale}}[sub_title]"   value="{{ isset($data) ? $data->translateOrNew($locale)->sub_title : old($locale . '.sub_title')  }}" type="text" required>
    
            <label>{{ __('system.'.$locale.'.desc') }}</label>
            <textarea class="form-control" name="{{$locale}}[desc]" rows="3"  value="" type="text" required>{{ isset($data) ? $data->translateOrNew($locale)->desc : old($locale . '.desc')  }} </textarea>
      
        @endforeach
        <div>
            <button type="submit" class="btn  mt-4" style="background-color: #267B26 ; color:white">{{__('system.edit')}}</button>
        </div>           
        </div>
    </form>
    </div>        
</div>    


@endsection


@section('scripts')

@endsection
