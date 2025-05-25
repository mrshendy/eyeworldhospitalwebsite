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
      <li class="breadcrumb-item"><a href="#">{{__('medical_conferences')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('create conference')}}</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-body">

    <form method="post" action="{{route('Admin.conferences.update',$conference->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <label for="input-file-max-fs">{{__('img')}}</label>
        <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"  @isset($data) data-default-file="{{ $data->img }}" @endisset  />

         @foreach (config('translatable.locales') as $locale)
             <div class="col-12">
                 <div>
                     <label>{{ __('system.'.$locale.'.title') }}</label>
                     <input class="form-control" name="{{$locale}}[title]"    value="{{ isset($conference) ? $conference->translateOrNew($locale)->title : old($locale . '.title')  }}"  type="text" required>

                     <label>{{ __('system.'.$locale.'.sub_title') }}</label>
                     <input class="form-control" name="{{$locale}}[sub_title]"    value="{{ isset($conference) ? $conference->translateOrNew($locale)->sub_title : old($locale . '.sub_title')  }}"  type="text" required>

                     <label>{{ __('system.'.$locale.'.description') }}</label>
                     <textarea class="form-control" name="{{$locale}}[description]" rows="3"   type="text" required>{{ isset($conference) ? $conference->translateOrNew($locale)->description : old($locale . '.description')  }} </textarea>

                     <label>{{ __('system.'.$locale.'.detail_description') }}</label>
                     <textarea class="form-control" name="{{$locale}}[detail_description]" rows="3"   type="text" required>{{ isset($conference) ? $conference->translateOrNew($locale)->detail_description : old($locale . '.detail_description')  }} </textarea>

                  </div>
             </div>
          @endforeach
          <div class="row">
            <div class="col-md-6 col-6">
                <label for="start_date">{{ __('Start Date') }}</label>
                <input type="text" id="start_date" name="start_date" class="form-control flatpickr" placeholder="YYYY-MM-DD" value="{{ old('start_date', $conference->start_date ?? '') }}" required>

            </div>
            <div class="col-md-6 col-6">
                <label for="end_date">{{ __('End Date') }}</label>
                <input type="text" id="end_date" name="end_date" class="form-control flatpickr" placeholder="YYYY-MM-DD" value="{{ old('end_date', $conference->end_date ?? '') }}" required>

            </div>

            <div class="form-group">
                <label>{{ __('conference_advantages') }}</label>
                <div id="advantages-wrapper">
                    @foreach ($conference->advantages as $index => $advantage)
                        <div class="advantage-item mb-3 border rounded p-2">
                            @foreach (config('translatable.locales') as $locale)
                                <div class="mb-2">
                                    <label>{{ __('system.'.$locale.'.advantage_title') }}</label>
                                    <input type="text" name="advantages[{{ $index }}][{{ $locale }}][advantage_title]" class="form-control" value="{{ $advantage->translateOrNew($locale)->advantage_title }}" required>

                                    <label>{{ __('system.'.$locale.'.advantage_description') }}</label>
                                    <textarea name="advantages[{{ $index }}][{{ $locale }}][advantage_description]" class="form-control" required>{{ $advantage->translateOrNew($locale)->advantage_description }}</textarea>
                                </div>
                            @endforeach
                            <button type="button" class="btn btn-danger btn-sm remove-advantage mt-2">{{ __('remove') }}</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-success mt-2" id="add-advantage"><i class="fa fa-plus"></i> {{ __('add_advantage') }}</button>
            </div>

        </div>


       <button type="submit" class="btn btn-primary mt-2">{{__('system.edit')}}</button>
     </form>
  </div>
  </div>
</div>

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('dropify/dist/js/dropify.min.js')}}"></script>

<!-- Vendors JS -->
<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>

<script src="{{asset('assets/js/forms-editors.js')}}"></script>

<script src="{{asset('Ck_editor5/ckeditor.js')}}"></script>
<script src="{{asset('dropify/dist/js/dropify.min.js')}}"></script>


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
    });
</script>

<script>
    $(document).ready(function () {
        let advantageIndex = {{ $conference->advantages->count() ?? 1 }};
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



@endsection
