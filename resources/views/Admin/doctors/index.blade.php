@extends('temp')
@section('styles')

@endsection


@section('content')


<div class="container">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">{{__('doctors')}}</a></li>
      </ol>
    </nav>
      

    <div class="card">
      <div class="card-body">

        <div class="row">
          <div class="col-3">

            <a href="{{route('Admin.doctors.create')}}" class="btn " style="background-color: #267B26 ; color:white"> {{__('system.add')}}</a>

          </div>
        </div>  

        {!! $html->table(['class' => 'table table-bordered'], true) !!}
      </div>  
    </div>
</div>

@endsection


@section('scripts')

<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>

<script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script>

{!! $html->scripts() !!}

<script>


    $('#dataTableBuilder').on('click','.delete_btn',function (){
      $('#delete_id').val($(this).attr("data-id"));
    });

</script>



@endsection