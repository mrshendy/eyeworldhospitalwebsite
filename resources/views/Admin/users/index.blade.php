@extends('temp')
@section('styles')
@endsection

@section('content')

 <div class="container">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">{{__('users')}}</a></li>
        <li class="breadcrumb-item"><a href="#">{{__($type.'s')}}</a></li>

      </ol>
    </nav>
      

    <div class="card">
      <div class="card-body">
           {!! $html->table(['class' => 'table table-bordered'], true) !!}
      </div>
    </div>
 </div>

  <x-delete-modal>
    <x-slot:route>
        {{route('Admin.users.destroy',$type)}}
    </x-slot>

    <input type="hidden" id="delete_id" name="id" value="">
    <h3 id="delete_name"></h3>
    
</x-delete-modal>


@endsection

@section('scripts')

    <script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>

    <script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script>

    {!! $html->scripts() !!}

    <script>
        $('#dataTableBuilder').on('click','.delete_btn',function (){
            $('#delete_id').val($(this).attr("data-id"));
            
            $('#delete_name').html($(this).attr("data-name"));
        });
    </script>    
@endsection    


