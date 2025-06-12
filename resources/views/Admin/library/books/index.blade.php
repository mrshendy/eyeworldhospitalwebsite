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
        <li class="breadcrumb-item"><a href="{{route('Admin.books.index')}}">{{__('library')}}</a></li>
        <li class="breadcrumb-item active"><a href="{{route('Admin.books.index')}}">{{__('Books')}}</a></li>

    </ol>
    </nav>
      

    <div class="card">
      <div class="card-body">

        <div class="row">
          <div class="col-3">
          
          <a href="{{route('Admin.books.create')}}" class="btn " style="background-color: #267B26 ; color:white"> {{__('system.add')}}</a>

            
          
          </div>
        </div>  

        {!! $html->table(['class' => 'table table-bordered'], true) !!}
      </div>  
    </div>




      <x-delete-modal>
        <x-slot:route>
            {{route('Admin.books.destroy',0)}}
        </x-slot>
        @method('DELETE')
        <input type="hidden" id="delete_id" name="id" value="">
        <h3 id="delete_name"></h3>
      
      </x-delete-modal>


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
          $('#title-'+locale).val(title);

          var desc = $(this).attr("data-desc-"+locale);
          $('#desc-'+locale).val(desc);
        }
    });


    $('#dataTableBuilder').on('click','.delete_btn',function (){
      $('#delete_id').val($(this).attr("data-id"));
    });

</script>



@endsection