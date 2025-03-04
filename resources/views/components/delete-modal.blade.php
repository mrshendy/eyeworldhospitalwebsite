<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('system.sure')}}</h5>
     
        </div>
        <form action="{{$route ?? '#'}}" method="post">
        @csrf
        <div class="modal-body">
            {{ $slot }}
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('system.close')}}</button>
        <button type="submit" class="btn btn-danger">{{__('system.delete')}}</button>
        </div>
        </form>
    </div>
    </div>
</div>