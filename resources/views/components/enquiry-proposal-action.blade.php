<div class="dropdown">
    <button type="button" class="btn-light border rounded" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <i class="dripicons-dots-3"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        @if ($proposal->admin_status === 'AWAITING')
            <button class="dropdown-item">View / Edit</button>
            <button class="dropdown-item">Download</button>
            <div class="dropdown-divider m-0"></div>
            <button class="dropdown-item text-danger">Delete</button>
            @else
                <button class="dropdown-item">View</button>
                <button class="dropdown-item">Duplicate</button>
                <button class="dropdown-item">Download</button>
        @endif 
    </div>
</div>
