@extends('temp')
@section('styles')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}" />
<script src="{{asset('assets/vendor/js/template-customizer.js')}}"></script>

   <!-- Vendors CSS -->
   <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
   <link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
   <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
   <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
   <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
   <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
   <link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
   <!-- Row Group CSS -->
   <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}" />
   <!-- Form Validation -->
   <link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/form-validation.css')}}" />


@endsection
@section('content')
  <div class="container">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">@if($type=='experiments')  {{__('Customer experiments videos')}}  @else  {{__($type)}}  @endif</a></li>

        <li class="breadcrumb-item"><a href="#">{{__('topics')}}</a></li>

      </ol>
    </nav>
      

    <div class="card">
      <div class="card-body">

        <div class="row">
          <div class="col-3">
          
            <button type="button" class="btn btn-primary add_btn" data-bs-toggle="modal" data-bs-target="#addModal">
              {{__('system.add')}}
            </button>
            
          
          </div>
        </div>  

        {!! $html->table(['class' => 'table table-bordered'], true) !!}
      </div>  
    </div>


      <x-addModal>
        <x-slot:title>
            {{__('Add')}}
        </x-slot>
        <x-slot:route>
            {{route('Admin.Topic.store')}}
        </x-slot>
         <input type="hidden" name="type" value="{{$type}}">
        @foreach (config('translatable.locales') as $locale)
            <div class="col-12">
                <div>
                    <label>{{ __('system.'.$locale.'.title') }}</label>
                    <input class="form-control" name="{{$locale}}[title]"   value="" type="text" required>
                  </div>
            </div>
        @endforeach

      </x-addModal>



      <x-editModal>
        <x-slot:title>
            {{__('system.edit')}}
        </x-slot>
        <x-slot:route>
            {{route('Admin.Topic.update',$type)}}
        </x-slot>
        <input type="hidden" name="id" id="id" value="">
        <input type="hidden" name="type" value="{{$type}}">
        @foreach (config('translatable.locales') as $locale)
            <div class="col-12">
                <div>
                    <label>{{ __('system.'.$locale.'.title') }}</label>
                    <input class="form-control" name="{{$locale}}[title]"  id="title_{{$locale}}"  value="" type="text" required>
                  </div>
            </div>
        @endforeach

      </x-editModal>
    


      <x-deleteModal>
        <x-slot:route>
            {{route('Admin.Topic.destroy',$type)}}
        </x-slot>
    
        <input type="hidden" id="delete_id" name="id" value="">
        <h3 id="delete_name"></h3>
      
      </x-deleteModal>


    <!-- Button trigger modal -->
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
          var title = $(this).attr("data-title-"+locale);
          $('#title_'+locale).val(title);
        }
    });


    $('#dataTableBuilder').on('click','.delete_btn',function (){
      $('#delete_id').val($(this).attr("data-id"));
    });

</script>



@endsection