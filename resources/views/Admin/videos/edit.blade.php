@extends('temp')


@section('styles')



    <link rel="stylesheet" href="{{asset('dropify/dist/css/demo.css')}}">
    <link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">


@endsection



@section('content')
<div class="form-container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url()->current()}}">{{__('services')}}</a></li>
          <li class="breadcrumb-item"><a href="{{route('Admin.videos.index')}}">{{__('Videos')}}</a></li>
          <li class="breadcrumb-item"><a href="{{url()->current()}}">{{__('edit')}}</a></li>  
        </ol>
      </nav>

  <div class="card">
    <div class="card-body">

       <form method="post" action="{{route('Admin.partner.update',$data->id)}}" enctype="multipart/form-data">
           @csrf
           @method('put')
        

            <label for="input-file-max-fs">{{__('img')}}</label>
            <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"  @isset($data) data-default-file="{{ $data->img }}" @endisset  />

            <label>{{__('link')}}</label>
            <input type="text" name="link" class="form-control"  value="{{ isset($data) ? $data->link : old('link')  }}"  />
        
            <lable>{{__('topic')}}</lable>
            <select class="form-select" name="topic_id" id="topic_select" aria-label="Default select example">
                                
                @foreach ($topics as $row)
                    <option value="{{$row->id}}" @if($data->topic_id == $row->id) selected @endif>{{$row->title}}</option>
                @endforeach

           </select>

        
            @foreach (config('translatable.locales') as $locale)
                <div class="col-12">
                    <div>
                        <label>{{ __('system.'.$locale.'.title') }}</label>
                        <input class="form-control" name="{{$locale}}[title]"    value="{{ isset($data) ? $data->translateOrNew($locale)->title : old($locale . '.title')  }}"  type="text" required>
                
                        <label>{{ __('system.'.$locale.'.desc') }}</label>
                        <textarea class="form-control" name="{{$locale}}[desc]" rows="3"   type="text" required>{{ isset($data) ? $data->translateOrNew($locale)->desc : old($locale . '.desc')  }} </textarea>
                      </div>
                </div>
            @endforeach
         

    

        
          <button type="submit" class="btn  mt-2" style="background-color: #267B26 ; color:white">{{__('system.edit')}}</button>  
        </form>   
    </div>
  </div>

</div>
@endsection

@section('scripts')

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>
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

@endsection

