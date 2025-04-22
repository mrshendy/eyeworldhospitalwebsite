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
        <li class="breadcrumb-item"><a href="#">{{__($type.'s')}}</a></li>
      </ol>
    </nav>
      

    <div class="card">
      <div class="card-body">

        <div class="row">
          <div class="col-3">
          
            <button type="button" class="btn  add_btn" data-bs-toggle="modal" data-bs-target="#addModal" style="background-color: #267B26 ; color:white">
              {{__('system.add')}}
            </button>
            
          
          </div>
        </div>  

        {!! $html->table(['class' => 'table table-bordered'], true) !!}
      </div>  
    </div>


      <x-add-modal>
        <x-slot:title>
            {{__('add')}}
        </x-slot>
        <x-slot:route>
            {{route('Admin.rights.store')}}
        </x-slot>
              <input type="hidden" name="type" value="{{$type}}">
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

      </x-add-modal>



      <x-edit-modal>
        <x-slot:title>
            {{__('system.edit')}}
        </x-slot>
        <x-slot:route>
            {{route('Admin.rights.update',0)}}
        </x-slot>
        @method('put')
        <input type="hidden" name="type" value="{{$type}}">
        <input type="hidden" name="id" id="id" value="">
        @foreach (config('translatable.locales') as $locale)
            <div class="col-12">
                <div>
                    <label>{{ __('system.'.$locale.'.title') }}</label>
                    <input class="form-control" name="{{$locale}}[title]"  id="title-{{$locale}}"  value="" type="text" required>
            
                    <label>{{ __('system.'.$locale.'.desc') }}</label>
                    <textarea class="form-control" name="{{$locale}}[desc]" id="desc-{{$locale}}"  rows="3"  value="" type="text" required> </textarea>
                  </div>
            </div>
        @endforeach

      </x-edit-modal>
    


      <x-delete-modal>
        <x-slot:route>
            {{route('Admin.rights.destroy',0)}}
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