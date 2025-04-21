@extends('temp')

@section('styles')
@endsection


@section('content')

<div class="container">
    <h3 class="mb-4">{{ __('eye info details') }}</h3>
    <div class="card">
    <form action="{{route('Admin.eye-health-detail.update')}}" method="post" enctype="multipart/form-data">
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
            <input class="form-control" name="{{$locale}}[subtitle]"   value="{{ isset($data) ? $data->translateOrNew($locale)->subtitle : old($locale . '.subtitle')  }}" type="text" required>
    
            <label>{{ __('system.'.$locale.'.desc') }}</label>
            <textarea class="form-control" name="{{$locale}}[desc]" rows="3"  value="" type="text" required>{{ isset($data) ? $data->translateOrNew($locale)->desc : old($locale . '.desc')  }} </textarea>
      
            <label>{{ __('system.'.$locale.'.detail_title') }}</label>
            <input class="form-control" name="{{$locale}}[detail_title]"   value="{{ isset($data) ? $data->translateOrNew($locale)->detail_title : old($locale . '.detail_title')  }}" type="text" required>
    
            <label>{{ __('system.'.$locale.'.detail_subtitle') }}</label>
            <input class="form-control" name="{{$locale}}[detail_subtitle]"   value="{{ isset($data) ? $data->translateOrNew($locale)->detail_subtitle : old($locale . '.detail_subtitle')  }}" type="text" required>
    
            <label>{{ __('system.'.$locale.'.detail_desc') }}</label>
            <textarea class="form-control" name="{{$locale}}[detail_desc]" rows="3"  value="" type="text" required>{{ isset($data) ? $data->translateOrNew($locale)->detail_desc : old($locale . '.detail_desc')  }} </textarea>
      
      
        @endforeach
        <div>
            <button type="submit" class="btn mt-4" style="background-color: #267B26 ; color:white">{{__('system.edit')}}</button>
        </div>           
        </div>
    </form>
    </div>        
</div>    


@endsection


@section('scripts')

@endsection
