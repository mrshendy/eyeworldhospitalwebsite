@extends('temp')


@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="{{asset('dropify/dist/css/demo.css')}}">
<link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">

@endsection

@section('content')
 <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Admin.conferences.doctors.index', $conferenceId) }}">{{__('Conference Doctors')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Create Conference Doctors')}}</li>
      </ol>
    </nav>

    <div class="card">
        <form method="post" action="{{route('Admin.conferences.doctors.store', $conferenceId)}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <label for="input-file-max-fs">{{__('img')}}</label>
                <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"  @isset($data) data-default-file="{{ $data->img }}" @endisset  />

                <label>{{ __('Type') }}</label>
                <select class="form-control" name="type" required>
                    <option value="local">{{ __('Local') }}</option>
                    <option value="global">{{ __('Global') }}</option>
                </select>


                @foreach (config('translatable.locales') as $locale)
                  <div class="col-12">
                      <div>
                          <label>{{ __('system.'.$locale.'.name') }}</label>
                          <input class="form-control" name="{{$locale}}[name]"   value="" type="text" required>

                          <label>{{ __('system.'.$locale.'.specialty') }}</label>
                          <input class="form-control" name="{{$locale}}[specialty]"   value="" type="text" required>
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
    <script src="{{asset('dropify/dist/js/dropify.min.js')}}"></script>

<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script>

<script>
    $(document).ready(function(){
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element){
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e){
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
  </script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr(".flatpickr", {
        enableTime: false,
        dateFormat: "Y-m-d",
        minDate: "today"
    });
</script>
<script>
    $(document).ready(function() {
      $('.select2').select2({
        width: "100%"
      });

    });
  </script>
<script>
    $(document).ready(function () {
        let advantageIndex = 1;
        const locales = @json(config('translatable.locales'));

        $('#add-advantage').click(function () {
            let html = `<div class="advantage-item mb-3 border rounded p-2">`;

            locales.forEach(function(locale) {
                html += `
                    <div class="col-12">
                        <div>
                            <label>{{ __('system.'.$locale.'.advantage_title') }}</label>
                            <input type="text" name="advantages[${advantageIndex}][${locale}][advantage_title]" class="form-control" required>

                            <label>{{ __('system.'.$locale.'.advantage_description') }}</label>
                            <textarea name="advantages[${advantageIndex}][${locale}][advantage_description]" class="form-control" required></textarea>
                        </div>
                    </div>
                `;
            });

            html += `<button type="button" class="btn btn-danger btn-sm remove-advantage mt-2">{{ __('remove') }}</button></div>`;
            $('#advantages-wrapper').append(html);
            advantageIndex++;
        });

        $('#advantages-wrapper').on('click', '.remove-advantage', function () {
            $(this).closest('.advantage-item').remove();
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection

