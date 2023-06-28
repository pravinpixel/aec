<div class="dropdown">
    <button type="button" class="btn-light border rounded" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <i class="dripicons-dots-3"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        @if ($proposal->admin_status === 'AWAITING')
            <button onclick="proposalViewOrEdit({{ $proposal->id }},true)" class="dropdown-item">View / Edit</button>
            <button onclick="proposalDownload({{ $proposal->id }})" class="dropdown-item">Download</button>
            <div class="dropdown-divider m-0"></div>
            <button onclick="proposalDelete({{ $proposal->id }})" class="dropdown-item text-danger">Delete</button>
            @else
                <button onclick="proposalViewOrEdit({{ $proposal->id }}, false)" class="dropdown-item">View</button>
                @if ($proposal->admin_status !== 'OBSOLETE')
                    <button onclick="proposalDuplicate({{ $proposal->id }})" class="dropdown-item">Duplicate</button>
                @endif
                <button onclick="proposalDelete({{ $proposal->id }})" class="dropdown-item">Download</button>
        @endif 
    </div>
</div>
