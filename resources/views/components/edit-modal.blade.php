    {{--begain::Add doctor --}}
    <div class="modal fade outer-repeater" id="editModal" tabindex="-1" role="dialog" aria-labelledby="addeModel" aria-hidden="true">
        <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$title ?? __('dashboard.edit')}}</h5>
                 
                </div>
                <form action="{{$route ?? '#'}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body" id="detailes">

                                <div class="row">
                                    {{ $slot }}
                                </div>

                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{__('system.edit')}}</button>
                        </div>
                </form>
            </div>
        </div>
    </div>   
{{--end::Add doctor --}}