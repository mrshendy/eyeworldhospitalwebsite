@extends('temp')


@section('styles')

@endsection

@section('content')
 <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Admin.participation_types.index') }}">{{__('Participation Types')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Create Participation Type')}}</li>
      </ol>
    </nav>

    <div class="card">
        <form method="post" action="{{route('Admin.participation_types.store')}}">
            @csrf
            <div class="card-body">
              @foreach (config('translatable.locales') as $locale)
                  <div class="col-6">
                      <div>
                          <label>{{ __('system.'.$locale.'.title') }}</label>
                          <input class="form-control" name="{{$locale}}[title]"   value="" type="text" required>
                        </div>
                  </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary mt-2">{{__('system.add')}}</button>
          </form>

    </div>
 </div>
@endsection

@section('scripts')
    <!-- Vendors JS -->
    <script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/forms-editors.js')}}"></script>

<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script>

@endsection

