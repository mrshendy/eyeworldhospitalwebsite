@extends('temp')
@section('styles')
@endsection

@section('content')

 <div class="container">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">{{__('reservations')}}</a></li>
      </ol>
    </nav>
      

    <div class="card">
      <div class="card-body">
           {!! $html->table(['class' => 'table table-bordered'], true) !!}
      </div>
    </div>
 </div>
@endsection

@section('scripts')

    <script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>

    <script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script>

    {!! $html->scripts() !!}


@endsection    