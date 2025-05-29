@extends('temp')


@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="{{asset('dropify/dist/css/demo.css')}}">
<link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


@endsection

@section('content')
 <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Admin.conferences.index') }}">{{__('medical_conference')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('create_medical_conference')}}</li>
      </ol>
    </nav>

    <div class="card">
        <form method="post" action="{{route('Admin.conferences.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <label for="input-file-max-fs">{{__('img')}}</label>
                <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"  @isset($data) data-default-file="{{ $data->img }}" @endisset  />
              @foreach (config('translatable.locales') as $locale)
                  <div class="col-12">
                      <div>
                          <label>{{ __('system.'.$locale.'.title') }}</label>
                          <input class="form-control" name="{{$locale}}[title]"   value="" type="text" required>

                          <label>{{ __('system.'.$locale.'.sub_title') }}</label>
                          <input class="form-control" name="{{$locale}}[sub_title]"   value="" type="text" required>

                          <label>{{ __('system.'.$locale.'.description') }}</label>
                          <input class="form-control" name="{{$locale}}[description]"   value="" type="text" required>

                          <label>{{ __('system.'.$locale.'.detail_description') }}</label>
                          <input class="form-control" name="{{$locale}}[detail_description]"   value="" type="text" required>

                        </div>
                  </div>
                @endforeach
                <div class="row">
                    <div class="col-md-6 col-6">
                        <label for="start_date">{{ __('Start Date') }}</label>
                        <input type="text" id="start_date" name="start_date" class="form-control flatpickr" placeholder="YYYY-MM-DD" required>
                    </div>
                    <div class="col-md-6 col-6">
                        <label for="end_date">{{ __('End Date') }}</label>
                        <input type="text" id="end_date" name="end_date" class="form-control flatpickr" placeholder="YYYY-MM-DD" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label>{{ __('Doctors Attendances') }}</label>
                        <select name="doctor_ids[]" class="select2" multiple>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->doctorInfo->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-12">
                        <label>  {{__('Charities Supports')}} </label>
                        <select name="charities_ids[]" id="charities" class="select2" multiple="multiple">
                            @foreach ($charities as $charity)
                                <option value="{{$charity->id}}">{{$charity->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-12">
                        <label>{{ __('conference_images') }}</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('conference_advantages') }}</label>
                    <div id="advantages-wrapper">
                        <div class="advantage-item mb-3 border rounded p-2">
                            @foreach (config('translatable.locales') as $locale)
                                <div class="mb-2">
                                    <label>{{ __('system.'.$locale.'.advantage_title') }}</label>
                                    <input type="text" name="advantages[0][{{ $locale }}][advantage_title]" class="form-control" required>
                                    <label>{{ __('system.'.$locale.'.advantage_description') }}</label>
                                    <textarea name="advantages[0][{{ $locale }}][advantage_description]" class="form-control" required></textarea>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="button" class="btn btn-success mt-2" id="add-advantage"><i class="fa fa-plus"></i>{{  __('add_advantage')}}</button>
                </div>

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

