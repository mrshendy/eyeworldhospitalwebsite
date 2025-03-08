@extends('temp')

@section('styles')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}" />

@endsection

@section('content')


<div class="row">
    <div class="col-3">
     <button type="button" class="btn btn-primary add_btn" data-bs-toggle="modal" data-bs-target="#addModal">
       {{__('system.add')}}
     </button>
    </div>
</div> 



{!! $html->table(['class' => 'table table-bordered'], true) !!}



<x-addModal>
    <x-slot:title>
        {{__('sup-specialtie')}}
    </x-slot>
    <x-slot:route>
        {{route('Admin.sup-specialtie.store')}}
    </x-slot>

    @foreach (config('translatable.locales') as $locale)
        <div class="col-12">
            <div>
                <label>{{ __('system.'.$locale.'.main_title') }}</label>
                <input class="form-control" name="{{$locale}}[main_title]"   value="" type="text" required>
         
                <label>{{ __('system.'.$locale.'.main_subtitle') }}</label>
                <input class="form-control" name="{{$locale}}[main_subtitle]"   value="" type="text" required>
             
                <label>{{ __('system.'.$locale.'.detail_title') }}</label>
                <input class="form-control" name="{{$locale}}[detail_title]"   value="" type="text" required>
            
                <label>{{ __('system.'.$locale.'.detail_subtitle') }}</label>
                <input class="form-control" name="{{$locale}}[detail_subtitle]"   value="" type="text" required>
            
                <label>{{ __('system.'.$locale.'.desc') }}</label>
                <textarea class="form-control" name="{{$locale}}[desc]" rows="3"  value="" type="text" required> </textarea>
                
            </div>
        </div>
    @endforeach

  </x-addModal>



@endsection

@section('scripts')

<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>

<script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script>

{!! $html->scripts() !!}

@endsection