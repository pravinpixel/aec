<div class="row">
    <div class="col-lg-4">
        <h5>Summary</h5>
        <div class="d-flex shadow mb-2 border rounded align-items-center">
            <i class="bi bi-exclamation-circle fa-2x mx-3 text-secondary"></i>
            <div class="py-1">
                <h5 class="border-bottom pb-1 text-success">Resolved :
                    {{ count(getIssuesByProjectId($project->id, 'CLOSED')->get()) }}</h5>
                <h6 class="mb-0 fw-normal">Total Issues : {{ count(getIssuesByProjectId($project->id)->get()) }} </h6>
            </div>
        </div>
        <div class="d-flex shadow mb-2 border rounded align-items-center">
            <i class="bi bi-list-check fa-2x mx-3 text-secondary"></i>
            <div class="py-1">
                <h5 class="border-bottom pb-1 text-success">Completed :
                    {{ getCompleteTaskCountByProjectId($project->id, 1) }}</h5>
                <h6 class="mb-0 fw-normal">Total Task : {{ getCompleteTaskCountByProjectId($project->id) }}</h6>
            </div>
        </div>
        <div class="d-flex shadow mb-2 border rounded align-items-center">
            <i class="bi bi-signpost fa-2x mx-3 text-secondary"></i>
            <div class="py-1">
                <h5 class="border-bottom pb-1 text-success">Completed :
                    {{ getMilestoneCountByProjectId($project->id, 1) }}</h5>
                <h6 class="mb-0 fw-normal">Total Mile Stones : {{ getMilestoneCountByProjectId($project->id) }}</h6>
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
                            <input type="radio" name="{{ $item }}" value="Yes" id="INPUT_{{ $key }}_YES" class="form-check-input me-1" required> Yes
                        </label>
                        <label for="INPUT_{{ $key }}_NO"
                            class="mx-2 fs-5 text-uppercase fw-bold form-radio-danger">
                            <input type="radio" name="{{ $item }}" value="No" id="INPUT_{{ $key }}_NO" class="form-check-input me-1" required> No
                        </label>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
    <hr>
    <div class="col-lg-8 mx-auto">
        <div class="modal-header border-0">
            <h5>Share point folder link </h5>
            @if (is_null($project->share_point_folder_link))
                <button type="button" onclick="addUrl()" class="btn btn-primary btn-sm"><i class="fa fa-plus me-1"></i>
                    Add</button>
            @endif
        </div>
        @if (is_null($project->share_point_folder_link))
            <div class="px-2" id="urlList">
                <div class="input-group mb-3">
                    <input type="url" name="url[]" class="form-control form-control-sm"
                        placeholder="Paste URL here..." required>
                    <button type="button" onclick="$(this).parent('div').remove()" class="btn-sm btn btn-danger"><i
                            class="fa fa-trash"></i></button>
                </div>
            </div>
            @else
            @foreach (json_decode($project->share_point_folder_link) as $row)
                <li class="list-group-item"><a href="{{  $row }}">{{  $row }}</a></li>
            @endforeach
        @endif
    </div>
</div>
@push('live-project-custom-scripts')
    <script>
        addUrl = () => {
            $('#urlList').append(`
            <div class="input-group mb-3">
                <input type="url" name="url[]" class="form-control form-control-sm" placeholder="Paste URL here..." required>
                <button type="button" onclick="$(this).parent('div').remove()" class="btn-sm btn btn-danger"><i class="fa fa-trash"></i></button>
            </div>
        `)
        }
    </script>
@endpush
