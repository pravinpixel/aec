<div class="row "> 
    <div class="col">
        <div class="card border shadow-sm m-0">
            <div class="card-header px-3 bg-light">
                <h5 class="m-0">Task Details</h3>
            </div>
            <div class="card-bodyx" style="max-height: 270px;overflow:auto"> 
                <ol class="list-group border-0">
                    @foreach ($project->LiveProjectTasks as $i => $task)
                        @if (count($task->SubTasks) !== 0)
                            <button type="button" class="list-group-item list-group-item-action" onclick="getLiveProjectSubTasks({{ $task->id }})">
                                <div>
                                    <div class="d-flex align-items-center justify-content-between w-100">
                                        <b>{{ $task->name }} </b>
                                        <div class="text-center">
                                            @if ($task->progress_percentage == 100) 
                                                <span class="badge badge-success-lighten shadow-sm border border-success rounded-pill"><i class="mdi mdi-check-circle me-1"></i>Completed</span>
                                                @else
                                                {{ $task->progress_percentage !== 0 ? 'Completed' : 'Pending' }}
                                                {!! generateProgressBar($task->progress_percentage) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <span class="badge bg-secondary rounded-pill">{{ count($task->SubTasks) }} Sub Tasks </span>
                                    </div>
                                </div>
                            </button>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div> 
    </div>
    <div class="col-md-4 ps-0">
        <div class="card border shadow-sm m-0"> 
            <div class="card-header px-3 bg-light">
                <h5 class="m-0">Task Details</h3>
            </div>
            <div class="card-body">
                <table class="table m-0">
                    <tr>
                        <th>Project Name </th>
                        <td>{{ $project->project_name }}</td>
                    </tr>
                    <tr>
                        <th>Project Lead </th>
                        <td>sdgsd</td>
                    </tr>
                    <tr>
                        <th>Customer Name</th>
                        <td>{{ $project->Customer->full_name }}</td>
                    </tr>
                    <tr>
                        <th>Total Tasks</th>
                        <td>{{ count($project->LiveProjectTasks) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>