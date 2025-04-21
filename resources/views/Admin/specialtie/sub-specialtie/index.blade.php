@extends('temp')

@section('styles')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}" />

@endsection

@section('content')


<div class="container">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('Admin.specialtie.index')}}">{{__('specialties')}}</a></li>
      <li class="breadcrumb-item"><a href="{{url()->current()}}">{{$Specialtie->title}}</a></li>
      <li class="breadcrumb-item"><a href="{{url()->current()}}">{{__('sub specialties')}}</a></li>
    </ol>
  </nav>


  <div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-3">
            <button type="button" class="btn  add_btn" style="background-color: #267B26 ; color:white" data-bs-toggle="modal" data-bs-target="#addModal">
              {{__('system.add')}}
            </button>
            </div>
        </div> 



         {!! $html->table(['class' => 'table table-bordered'], true) !!}
    </div>     
  </div>


<x-add-modal>
    <x-slot:title>
        {{__('sup-specialtie')}}
    </x-slot>
    <x-slot:route>
        {{route('Admin.sup-specialtie.store')}}
    </x-slot>
    <input type="hidden" name="specialtie_id" value="{{$id}}">
    @foreach (config('translatable.locales') as $locale)
        <div class="col-12">
            <div>
                <label>{{ __('system.'.$locale.'.main_title') }}</label>
                <input class="form-control" name="{{$locale}}[main_title]"   value="" type="text" required>
         
                <label>{{ __('system.'.$locale.'.main_subtitle') }}</label>
                <input class="form-control" name="{{$locale}}[main_subtitle]"   value="" type="text" required>
             
            
                
            </div>
        </div>
    @endforeach

  </x-add-modal>


  <x-edit-modal>
    <x-slot:title>
        {{__('system.edit')}}
    </x-slot>
    <x-slot:route>
        {{route('Admin.sup-specialtie.update')}}
    </x-slot>
    @method('put')
    <input type="hidden" name="id" id="id" value="">
    @foreach (config('translatable.locales') as $locale)
        <div class="col-12">
              <div>
                <label>{{ __('system.'.$locale.'.main_title') }}</label>
                <input class="form-control" name="{{$locale}}[main_title]"  id="main_title-{{$locale}}"  value="" type="text" required>
              </div>

              <div>
                <label>{{ __('system.'.$locale.'.main_subtitle') }}</label>
                <textarea class="form-control" name="{{$locale}}[main_subtitle]"  id="main_subtitle-{{$locale}}" rows="3"  value="" type="text" required></textarea>
              </div>
        </div>
    @endforeach

  </x-edit-modal>


  <x-delete-modal>
    <x-slot:route>
        {{route('Admin.sup-specialtie.destroy',0)}}
    </x-slot>
    <input type="hidden" id="delete_id" name="id" value="">
    <h3 id="delete_name"></h3>
   
  </x-delete-modal>


</div>  
@endsection

@section('scripts')

<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>

<script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script>

{!! $html->scripts() !!}


<script>

    var locales = {!!json_encode(config('translatable.locales'))!!};
    $('#dataTableBuilder').on('click','.edit_btn',function (){

       $('#id').val($(this).attr("data-id"));
        for(locale of locales){
          var main_title = $(this).attr("data-main_title-"+locale);
          $('#main_title-'+locale).val(main_title);

          var main_subtitle = $(this).attr("data-main_subtitle-"+locale);
          $('#main_subtitle-'+locale).val(main_subtitle);
        }
    });

    $('#dataTableBuilder').on('click','.delete_btn',function (){
      $('#delete_id').val($(this).attr("data-id"));
    });



</script>

@endsection