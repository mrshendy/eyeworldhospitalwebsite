    {{--begain::Add modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$title ?? __('dashboard.add')}}</h5>
                  
                </div>
                <form action="{{$route ?? '#'}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                                <div class="row">
                                    {{ $slot }}
                                </div>

                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn " style="background-color: #267B26 ; color:white">{{__('system.add')}}</button>
                        </div>
                </form>
            </div>
        </div>
    </div>   
{{--end::Add modal --}}

  