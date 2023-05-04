<div class="row">
    <div class="col-lg-4">
        <h5>Summary</h5>
        <div class="d-flex shadow mb-2 border rounded align-items-center">
            <i class="bi bi-exclamation-circle fa-2x mx-3 text-secondary"></i>
            <div class="py-1">
                <h5 class="border-bottom pb-1 text-success">Resolved : {{ count(getIssuesByProjectId($project->id, "CLOSED")->get()) }}</h5>
                <h6 class="mb-0 fw-normal">Total Issues : {{ count(getIssuesByProjectId($project->id)->get()) }} </h6>
            </div>
        </div>
        <div class="d-flex shadow mb-2 border rounded align-items-center">
            <i class="bi bi-list-check fa-2x mx-3 text-secondary"></i>
            <div class="py-1">
                <h5 class="border-bottom pb-1 text-success">Completed : 50</h5>
                <h6 class="mb-0 fw-normal">Total Task : 50</h6>
            </div>
        </div>
        <div class="d-flex shadow mb-2 border rounded align-items-center">
            <i class="bi bi-signpost fa-2x mx-3 text-secondary"></i>
            <div class="py-1">
                <h5 class="border-bottom pb-1 text-success">Completed : 5</h5>
                <h6 class="mb-0 fw-normal">Total Mile Stones : 5</h6>
            </div>
        </div>
    </div>
    <ul class="list-group col-lg-8">
        <h5>Please confirm below </h5>
        @if (count($project->projectClosure))
            @foreach ($project->projectClosure as $key => $item)
                <li class="list-group-item list-group-item-action d-flex justify-content-between">
                    <div class="lead">{{ ucfirst(str_replace('-', ' ', $item->question)) }} ?</div>
                    <div class="mx-2 fs-5 text-uppercase fw-bold text-success">
                        <i class="fa fa-check-circle"></i>
                        {{ $item->answer }}
                    </div>
                </li>
            @endforeach
        @else
            @foreach (config('live-project.project_closure') as $key => $item)
                <li class="list-group-item list-group-item-action d-flex justify-content-between">
                    <div class="lead">{{ $item }}</div>
                    <div>
                        <label for="INPUT_{{ $key }}_YES"
                            class="mx-2 fs-5 text-uppercase fw-bold form-radio-success">
                            <input type="checkbox" name="{{ Str::slug($item) }}" id="INPUT_{{ $key }}_YES"
                                value="Yes" class="form-check-input me-1" required> Yes
                        </label>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
</div>
