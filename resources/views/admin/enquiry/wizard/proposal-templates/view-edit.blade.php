<div class="modal-header">
    <h4 class="modal-title" id="standard-modalLabel">{{ $proposal->title }}</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body overflow-auto">
    <textarea id="proposal-content-editer">{!! $proposal->content !!}</textarea>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
    @if ($status)
        <button type="button" class="btn btn-primary" onclick="proposalUpdate({{ $proposal->id }})">Save changes</button>
    @endif
</div>