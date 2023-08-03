<div class="row m-0 align-items-end">
    <div class="my-2 col-sm-6 col-md-3 col-lg-3">
        <div class="d-flex shadow px-2 border rounded">
            <i class="mdi mdi-account fa-3x text-success mb-0 me-2"></i>
            <div class="py-1">
                <h4 class="border-bottom pb-1">Company Name</h4>
                <p class="mb-0 ng-binding">{{ $project->company_name }}</p>
            </div>
        </div>
    </div>
    <div class="my-2 col-sm-6 col-md-3 col-lg-3">
        <div class="d-flex shadow px-2 border rounded">
            <i class="mdi mdi-comment-account fa-3x text-primary mb-0 me-2"></i>
            <div class="py-1">
                <h4 class="border-bottom pb-1">Contact Person</h4>
                <p class="mb-0 ng-binding">{{ $project->contact_person }}</p>
            </div>
        </div>
    </div>
    <div class="my-2 col-sm-6 col-md-3 col-lg-3">
        <div class="d-flex shadow px-2 border rounded">
            <i class="mdi mdi-email-open fa-3x text-danger mb-0 me-2"></i>
            <div class="py-1">
                <h4 class="border-bottom pb-1">Email</h4>
                <p class="mb-0 ng-binding">{{ $project->Customer->email }}</p>
            </div>
        </div>
    </div>
    <div class="my-2 col-sm-6 col-md-3 col-lg-3">
        <div class="d-flex shadow px-2 border rounded">
            <i class="mdi mdi-deskphone fa-3x text-info mb-0 me-2"></i>
            <div class="py-1">
                <h4 class="border-bottom pb-1">Phone</h4>
                <p class="mb-0 ng-binding">{{ $project->Customer->mobile_no }}</p>
            </div>
        </div>
    </div>
    <div class="my-2 col-md-6">
        <div class="m-0 alert bg-light border shadow-sm" role="alert">
            <strong>  Project Start Date - </strong> 
            <span class="lead"><i class="fa fa-calendar mx-1"></i> {{ SetDateFormat($project->start_date) }}</span>
        </div>
    </div>
    <div class="my-2 col-md-6">
        <div class="m-0 alert bg-light border shadow-sm" role="alert">
            <strong>  Project End Date - </strong> 
            <span class="lead"><i class="fa fa-calendar mx-1"></i> {{ SetDateFormat($project->delivery_date) }}</span>
        </div>
    </div> 
    <div class="my-2 col-md-4">
        <a class="card border d-block" href="{{ route('live-project.menus-index', ['menu_type' => 'issues', 'id' => $project->id]) }}">
            <div class="card-header text-center">
                <div class="h4 m-0">Issues</div>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-bold">New</span>
                        <b class="rounded-pill btn py-0 fw-bold btn-sm text-white bg-primary">{{ $project->IssuesCount("NEW") }}</b>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-bold">Opened</span>
                        <b class="rounded-pill btn py-0 fw-bold btn-sm text-white bg-danger">{{ $project->IssuesCount("OPEN") }}</b>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-bold">Closed</span>
                        <b class="rounded-pill btn py-0 fw-bold btn-sm text-white bg-success">{{ $project->IssuesCount("CLOSED") }}</b>
                    </li>
                </ul>
            </div>
        </a>
    </div>
    <div class="my-2 col-md-4">
        <a class="card border d-block" href="{{ route('live-project.menus-index', ['menu_type' => Admin() ? 'task-list' : 'milestone', 'id' => $project->id]) }}">
            <div class="card-header text-center">
                <div>
                    <div class="pie mb-0" data-value="{{ $project->progress_percentage }}%"></div>
                    <div class="h5 m-0">Overall Progress</div>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($project->LiveProjectParentTasks as $task)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $task->name }}</span>
                            <b>{{ $task->progress_percentage }}%</b>
                        </li>
                    @endforeach
                </ul>
            </div>
        </a>
    </div> 
    <div class="my-2 col-md-4">
        <a class="card border d-block" href="{{ route('live-project.menus-index', ['menu_type' => 'variation-orders', 'id' => $project->id]) }}">
            <div class="card-header text-center">
                <div class="h4 m-0">Variation orders</div>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-bold">Approved</span>
                        <b class="rounded-pill btn py-0 fw-bold btn-sm text-white bg-success">{{ $project->VariationOrderVersionsByStatus("ACCEPT") }}</b>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-bold">Pending</span>
                        <b class="rounded-pill btn py-0 fw-bold btn-sm text-white bg-warning">{{ $project->VariationOrderVersionsByStatus("NEW") }}</b>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-bold">Rejected</span>
                        <b class="rounded-pill btn py-0 fw-bold btn-sm text-white bg-danger">{{ $project->VariationOrderVersionsByStatus("DENY") }}</b>
                    </li>
                </ul>
            </div>
        </a>
    </div>
</div> 