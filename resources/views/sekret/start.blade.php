{{-- !-- Start Warning Modal -->  --}}
<form action="{{ route('start', $meet->id) }}" method="post">
    <div class="modal-body">
        @csrf
        <h5 class="text-center">Are you sure you want to start meeting "{{ $meet->title }}" ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-danger">Yes</button>
    </div>
</form>