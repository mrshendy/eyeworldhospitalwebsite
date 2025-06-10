@extends('temp')

@section('content')
<div class="container">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('Admin.medical-academies.index')}}">{{__('Medical Academies')}}</a></li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <div class="row">
        <div class="col-3">
            <a href="{{route('Admin.medical-academies.create')}}" class="btn " style="background-color: #267B26 ; color:white"> {{__('system.add')}}</a>
          </div>
    </div>
    {!! $html->table(['class' => 'table table-bordered'], true) !!}
  </div>
</div>

  {{-- Add Modal --}}
  <x-add-modal>
    <x-slot:title>
        {{__('Medical Academies')}}
    </x-slot>
    <x-slot:route>
        {{route('Admin.medical-academies.store')}}
    </x-slot>

    @foreach (config('translatable.locales') as $locale)
        <div class="col-12">
            <div>
                <label>{{ __('system.'.$locale.'.title') }}</label>
                <input class="form-control" name="{{$locale}}[title]" value="" type="text" required>
            </div>
        </div>
    @endforeach
  </x-add-modal>

  {{-- Edit Modal --}}
  <x-edit-modal>
    <x-slot:title>
        {{__('system.edit')}}
    </x-slot>
    <x-slot:route>
        {{route('Admin.medical-academies.update',0)}}
    </x-slot>
    @method('put')
    <input type="hidden" name="id" id="id" value="">
    @foreach (config('translatable.locales') as $locale)
        <div class="col-12">
            <div>
                <label>{{ __('system.'.$locale.'.title') }}</label>
                <input class="form-control" name="{{$locale}}[title]" id="title_{{$locale}}" value="" type="text" required>
            </div>
        </div>
    @endforeach
  </x-edit-modal>

  {{-- Delete Modal --}}
  <x-delete-modal>
    <x-slot:route>
        {{route('Admin.medical-academies.destroy',0)}}
    </x-slot>
    @method('DELETE')
    <input type="hidden" id="delete_id" name="id" value="">
    <h3 id="delete_name"></h3>
  </x-delete-modal>

</div>
@endsection

@section('scripts')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script>
{!! $html->scripts() !!}

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    var locales = {!!json_encode(config('translatable.locales'))!!};

    // Populate Edit Modal
    $('#dataTableBuilder').on('click','.edit_btn',function (){
        $('#id').val($(this).attr("data-id"));
        $('#edit_spec_id').val($(this).attr("data-spec-id"));
        for(locale of locales){
            var title = $(this).attr("data-title-"+locale);
            $('#title_'+locale).val(title);
        }
    });

    // Populate Delete Modal
    $('#dataTableBuilder').on('click','.delete_btn',function (){
        $('#delete_id').val($(this).attr("data-id"));
    });

    // Initialize Select2 in Add Modal
    $('#addModal').on('shown.bs.modal', function () {
        $('#sub_specialties').select2({
            dropdownParent: $('#addModal'),
            width: '100%',
            placeholder: '{{ __("Choose Sub Specialties") }}',
            allowClear: true
        });
    });
</script>
@endsection
