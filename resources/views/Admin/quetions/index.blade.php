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
  {{-- <div class="container-xxl flex-grow-1 container-p-y">
    <!-- DataTable with Buttons -->
    <div class="card">
      <div class="card-datatable table-responsive pt-0">
        <table class="datatables-basic table table-bordered">
          <thead>
            <tr>
              <th></th>
              <th></th>
              <th>id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Date</th>
              <th>Salary</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
    <!-- Modal to add new record -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
      <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
        <button
          type="button"
          class="btn-close text-reset"
          data-bs-dismiss="offcanvas"
          aria-label="Close"></button>
      </div>
      <div class="offcanvas-body flex-grow-1">
        <form class="add-new-record pt-0 row g-3" id="form-add-new-record" onsubmit="return false">
          <div class="col-sm-12">
            <div class="input-group input-group-merge">
              <span id="basicFullname2" class="input-group-text"><i class="ri-user-line ri-18px"></i></span>
              <div class="form-floating form-floating-outline">
                <input
                  type="text"
                  id="basicFullname"
                  class="form-control dt-full-name"
                  name="basicFullname"
                  placeholder="John Doe"
                  aria-label="John Doe"
                  aria-describedby="basicFullname2" />
                <label for="basicFullname">Full Name</label>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="input-group input-group-merge">
              <span id="basicPost2" class="input-group-text"><i class="ri-briefcase-line ri-18px"></i></span>
              <div class="form-floating form-floating-outline">
                <input
                  type="text"
                  id="basicPost"
                  name="basicPost"
                  class="form-control dt-post"
                  placeholder="Web Developer"
                  aria-label="Web Developer"
                  aria-describedby="basicPost2" />
                <label for="basicPost">Post</label>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="ri-mail-line ri-18px"></i></span>
              <div class="form-floating form-floating-outline">
                <input
                  type="text"
                  id="basicEmail"
                  name="basicEmail"
                  class="form-control dt-email"
                  placeholder="john.doe@example.com"
                  aria-label="john.doe@example.com" />
                <label for="basicEmail">Email</label>
              </div>
            </div>
            <div class="form-text">You can use letters, numbers & periods</div>
          </div>
          <div class="col-sm-12">
            <div class="input-group input-group-merge">
              <span id="basicDate2" class="input-group-text"><i class="ri-calendar-2-line ri-18px"></i></span>
              <div class="form-floating form-floating-outline">
                <input
                  type="text"
                  class="form-control dt-date"
                  id="basicDate"
                  name="basicDate"
                  aria-describedby="basicDate2"
                  placeholder="MM/DD/YYYY"
                  aria-label="MM/DD/YYYY" />
                <label for="basicDate">Joining Date</label>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="input-group input-group-merge">
              <span id="basicSalary2" class="input-group-text"
                ><i class="ri-money-dollar-circle-line ri-18px"></i
              ></span>
              <div class="form-floating form-floating-outline">
                <input
                  type="number"
                  id="basicSalary"
                  name="basicSalary"
                  class="form-control dt-salary"
                  placeholder="12000"
                  aria-label="12000"
                  aria-describedby="basicSalary2" />
                <label for="basicSalary">Salary</label>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
          </div>
        </form>
      </div>
    </div>
    <!--/ DataTable with Buttons -->

    <hr class="my-12" />

  </div> --}}

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
        {{__('system.Add_quetion')}}
    </x-slot>
    <x-slot:route>
        {{route('Admin.Quetions.store')}}
    </x-slot>

    @foreach (config('translatable.locales') as $locale)
        <div class="col-12">
            <div>
                <label>{{ __('system.'.$locale.'.quetion') }}</label>
                <input class="form-control" name="{{$locale}}[quetion]"   value="" type="text" required>
         
                <label>{{ __('system.'.$locale.'.answer') }}</label>
                <textarea class="form-control" name="{{$locale}}[answer]" rows="3"  value="" type="text" required> </textarea>
              </div>
        </div>
    @endforeach

  </x-addModal>



  <x-editModal>
    <x-slot:title>
        {{__('system.edit')}}
    </x-slot>
    <x-slot:route>
        {{route('Admin.Quetions.update',0)}}
    </x-slot>
    @method('put')
    <input type="hidden" name="id" id="id" value="">
    @foreach (config('translatable.locales') as $locale)
        <div class="col-12">
            <div>
                <label>{{ __('system.'.$locale.'.quetion') }}</label>
                <input class="form-control" name="{{$locale}}[quetion]"  id="quetion_{{$locale}}"  value="" type="text" required>
         
                <label>{{ __('system.'.$locale.'.answer') }}</label>
                <textarea class="form-control" name="{{$locale}}[answer]" id="answer_{{$locale}}"  rows="3"  value="" type="text" required> </textarea>
              </div>
        </div>
    @endforeach

  </x-editModal>
 


  <x-deleteModal>
    <x-slot:route>
        {{route('Admin.Quetions.destroy',0)}}
    </x-slot>
    @method('DELETE')
    <input type="hidden" id="delete_id" name="id" value="">
    <h3 id="delete_name"></h3>
   
  </x-deleteModal>


<!-- Button trigger modal -->




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
          var quetion = $(this).attr("data-quetion-"+locale);
          $('#quetion_'+locale).val(quetion);

          var answer = $(this).attr("data-answer-"+locale);
          $('#answer_'+locale).val(answer);
        }
    });


    $('#dataTableBuilder').on('click','.delete_btn',function (){
      $('#delete_id').val($(this).attr("data-id"));
    });

</script>



@endsection