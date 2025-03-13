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
        {{route('Admin.sup-specialtie-type.store')}}
    </x-slot>
    <input type="hidden" name="sub_specialtie_id" value="{{$id}}">
    @foreach (config('translatable.locales') as $locale)
        <div class="col-12">
            <div>
                <label>{{ __('system.'.$locale.'.title') }}</label>
                <input class="form-control" name="{{$locale}}[title]"   value="" type="text" required>
         
                <label>{{ __('system.'.$locale.'.desc') }}</label>
                <textarea class="form-control" name="{{$locale}}[desc]" rows="3"  value="" type="text" required> </textarea>
             
            
                
            </div>
        </div>
    @endforeach

  </x-addModal>


  <x-editModal>
    <x-slot:title>
        {{__('system.edit')}}
    </x-slot>
    <x-slot:route>
        {{route('Admin.sup-specialtie-type.update')}}
    </x-slot>
    @method('put')
    <input type="hidden" name="id" id="id" value="">
    @foreach (config('translatable.locales') as $locale)
        <div class="col-12">
              <div>
                <label>{{ __('system.'.$locale.'.main_title') }}</label>
                <input class="form-control" name="{{$locale}}[title]"  id="title_{{$locale}}"  value="" type="text" required>
              </div>

              <div>
                <label>{{ __('system.'.$locale.'.desc') }}</label>
                <input class="form-control" name="{{$locale}}[desc]"  id="desc_{{$locale}}"  value="" type="text" required>
              </div>
        </div>
    @endforeach

  </x-editModal>


  <x-deleteModal>
    <x-slot:route>
        {{route('Admin.sup-specialtie-type.destroy')}}
    </x-slot>
    <input type="hidden" id="delete_id" name="id" value="">
    <h3 id="delete_name"></h3>
   
  </x-deleteModal>



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
          var title = $(this).attr("data-title-"+locale);
          $('#title_'+locale).val(title);

          var desc = $(this).attr("data-desc-"+locale);
          $('#desc_'+locale).val(desc);
        }
    });

    $('#dataTableBuilder').on('click','.delete_btn',function (){
      $('#delete_id').val($(this).attr("data-id"));
    });

</script>

@endsection