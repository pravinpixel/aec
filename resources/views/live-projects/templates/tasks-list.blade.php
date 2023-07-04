<div class="row ">
    <div class="col">
        <div class="card border shadow-sm m-0">
            <div class="modal-header px-3 bg-light">
                <h5 class="m-0">Task Details</h3>
                    @if (AecAuthUser()->Role->slug != 'aec_customer')
                        <button type="button" data-bs-toggle="modal" data-bs-target="#create-live-task"
                            class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add</button>
                    @endif
            </div>
            <div class="card-bodyx">
                <ol class="list-group border-0">
                    @foreach ($project->LiveProjectTasks as $i => $task)
                        @if (count($task->SubTasks) !== 0)
                            <div class="list-group-item list-group-item-action">
                                <div>
                                    <div class="d-flex align-items-center justify-content-between w-100">
                                        <div>
                                            <b>{{ $task->name }}</b>
                                        </div>
                                        <div class="text-center d-flex align-items-center">
                                            <center>
                                                @if ($task['progress_percentage'] == 100)
                                                    <span
                                                        class="badge badge-success-lighten shadow-sm border border-success rounded-pill"><i
                                                            class="mdi mdi-check-circle me-1"></i>Completed</span>
                                                @else
                                                    {{ $task['progress_percentage'] !== 0 ? 'Completed' : 'Pending' }}
                                                    {!! generateProgressBar($task['progress_percentage']) !!}
                                                @endif
                                            </center>
                                            <div class="vr mx-2"></div>
                                            <i class="fa fa-trash text-danger btn p-0"
                                                onclick="deleteSubtask(`{{ $task->id }}`)"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="text-primary"><i class="fa fa-list me-1"></i> Sub Tasks
                                            ({{ count($task->SubTasks) }})</h6>
                                        <ul class="list-group" onclick="getLiveProjectSubTasks({{ $task->id }})">
                                            @foreach ($task->SubTasks as $subtask)
                                                <li class="list-group-item">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between w-100">
                                                        <small class="text-dark">{{ $subtask->name }} <b
                                                                class="ps-1 text-primary">(
                                                                {{ $subtask->SubSubTasks->where('status', 1)->count() }}
                                                                / {{ $subtask->SubSubTasks->count() }} )</b> </small>
                                                        <div class="text-center">
                                                            {{-- {!! generateProgressBar($subtask->progress_percentage,'bg-primary') !!} --}}
                                                            <b>{{ $subtask->progress_percentage }}%</b>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
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
                        <th>Customer Name</th>
                        <td>{{ $project->Customer->full_name }}</td>
                    </tr>
                    <tr>
                        <th>Start Date</th>
                        <td>{{ SetDateFormat($project->start_date) }}</td>
                    </tr>
                    <tr>
                        <th>Estimated End Date</th>
                        <td>{{ SetDateFormat($project->delivery_date) }}</td>
                    </tr>
                    <tr>
                        <th>Total Tasks</th>
                        <td>{{ getCompleteTaskCountByProjectId($project->id) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create-live-task" tabindex="-1" aria-labelledby="create-live-taskLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create-live-taskLabel">Add new task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select id="new_task_id" class="form-select">
                    <option value="">-- Select --</option>
                    @foreach (checSheetList() as $row)
                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light border me-1 btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="addNewTask(`{{ $project->id }}`)"
                    class="btn btn-primary btn-sm">Submit</button>
            </div>
        </div>
    </div>
</div>
