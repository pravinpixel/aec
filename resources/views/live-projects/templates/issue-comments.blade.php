<div class="timeline-alt py-0">
    @foreach ($comments as $comment)
        <div class="timeline-item d-flex lg pb-2">
            <img src="https://ui-avatars.com/api/?name={{ $comment->created_by }}&background=random" class="rounded-circle img-thumbnail avatar-sm" width="30px" style="z-index:1">
            <div class="timeline-item-info ms-2 w-100"> 
                <small class="text-{{  $comment->created_at == $comment->updated_at ? 'primary' : 'dark' }} fw-bold mb-1 d-block">{{ ucfirst($comment->created_by) }} {{ $comment->created_at == $comment->updated_at ? '' : '⏴' }}</small>
                <div>{{ $comment->comment }}</div>
                <p class="m-0 p-0 d-flex">
                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    <button onclick="editComment(this ,'{{ $comment->id }}')" data-text="{{ $comment->comment }}" class="ms-1 btn-action border-0 text-primary">
                        <i class="fa fa-pen"></i> Edit
                    </button>
                    <button onclick="removeComment(this ,'{{ $comment->id }}')" class="ms-1 btn-action border-0 text-danger">
                        <i class="fa fa-trash"></i> Remove
                    </button>
                </p>
            </div>
        </div>
    @endforeach
</div>