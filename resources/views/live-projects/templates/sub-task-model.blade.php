<div class="modal-header bg-light">
    <h4 class="modal-title text-primary"><i class="fa fa-star" aria-hidden="true"></i> 
        <b>{{ $task->name }}</b>
        {{ $task->progress_percentage }}
    </h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
</div>
<div class="modal-body text-capitalize position-relative">
    @foreach ($task->SubTasks as $index => $sub_task)
        <div class="card border">
            <div class="card-header px-3 bg-light d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="text-capitalize text-purple border-bottom pb-2"> {{ $sub_task->name }}</h5>
                    <div class="d-flex align-items-center">
                        @if ($sub_task->progress_percentage == 0)
                            <div class="progress border border-white shadow" style="width: 100px">
                                <div class="progress-bar progress-bar-striped bg-secondary text-white" role="progressbar" style="width: 100%;">0%</div>
                            </div>
                            @else
                            <div class="progress border border-purple shadow" style="width: 100px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-rebeccapurple" role="progressbar" style="width: {{ $sub_task->progress_percentage < 25 ? 25 : $sub_task->progress_percentage }}%;" aria-valuenow="{{ $sub_task->progress_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $sub_task->progress_percentage }}%</div>
                            </div>
                        @endif
                    </div>
                </div>
                <button type="button" onclick="deleteLiveProjectSubTask('{{ $sub_task->id }}', this)" class="btn-outline-danger rounded"><i class="mdi mdi-trash-can"></i> Delete all</button>
            </div>
            <div class="card-body">
                <table class="table m-0 table-hover">
                    <thead>
                        <tr>
                            <th>Deliverable Name</th>
                            <th>Assign To</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Date of Delivery</th>
                            <th class="text-center">Status</th>
                            <th width="30px">
                                <button type="button" class="btn-primary rounded" onclick="createLiveProjectSubTask('{{ $sub_task->id }}', '{{ slugable($sub_task->name,$task->id) }}',this)"><i class="mdi mdi-plus"></i></button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($sub_task->SubSubTasks))
                            @foreach ($sub_task->SubSubTasks as $key => $sub_sub_task)
                                <tr class="{{ slugable($sub_task->name,$key + 1) }}">
                                    <td>
                                        <input type="text" onchange="setLiveProjectSubSubTask('name','{{ $sub_sub_task->id }}',this.value)" value="{{ $sub_sub_task->name }}" class="border w-100 input_{{ slugable($sub_task->name,$key + 1) }}" required>
                                    </td>
                                    <td>
                                        <select onchange="setLiveProjectSubSubTask('assign_to','{{ $sub_sub_task->id }}',this.value)" class="border w-100 text-capitalize input_{{ slugable($sub_task->name,$key + 1) }}">
                                            <option value="">-- choose --</option>
                                            @if (count($managers))
                                                @foreach ($managers as $manager)
                                                    <option
                                                        {{ $manager['id'] == $sub_sub_task->assign_to ? 'selected' : '' }}
                                                        value="{{ $manager['id'] }}">{{ $manager['display_name'] }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        <input type="date" onchange="setLiveProjectSubSubTask('start_date','{{ $sub_sub_task->id }}',this.value)" value="{{ $sub_sub_task->start_date }}" class="border w-100 input_{{ slugable($sub_task->name,$key + 1) }}"  required>
                                    </td>
                                    <td>
                                        <input type="date" onchange="setLiveProjectSubSubTask('end_date','{{ $sub_sub_task->id }}',this.value)" value="{{ $sub_sub_task->end_date }}" class="border w-100 input_{{ slugable($sub_task->name,$key + 1) }}" required >
                                    </td> 
                                    <td>
                                        <input type="date"
                                            onchange="setLiveProjectSubSubTask('delivery_date','{{ $sub_sub_task->id }}',this.value)"
                                            value="{{ $sub_sub_task->delivery_date }}" class="border w-100 input_{{ slugable($sub_task->name,$key + 1) }}" required>
                                    </td>
                                    <td>
                                        <div class="form-check form-checkbox-success">
                                            <input type="checkbox" class="form-check-input mx-auto input_{{ slugable($sub_task->name,$key + 1) }}" style="cursor: pointer"
                                                onchange="setTaskStatus('{{ $sub_sub_task->id }}','{{ $sub_task->id }}',this)"
                                                value="1" {{ $sub_sub_task->status == 1 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <i title="DELETE" onclick="deleteLiveProjectSubSubTask('{{ $sub_sub_task->id }}', this)" class="mdi mdi-trash-can text-danger" style="cursor: pointer"></i>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach 
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</div>
<div id="create-live-project-task-modal" class="app-modal modal-d-none">
    <div class="card app-modal-content border shadowm-sm m-0 h-100">
        <div class="card-header px-3 bg-light">
            <b>Create Task</b>
        </div>
        <div class="card-body px-3"> 
            <input type="hidden" id="subTaskId" />
            <input type="hidden" id="taskId" value="{{ $task->id }}"/>
            <div class="mb-3">
                <label for="TaskName" class="form-label">Deliverable Name</label>
                <input type="text" id="TaskName"  class="form-control form-control-sm" placeholder="Type here...">
            </div> 
            <div class="mb-3">
                <label for="AssignTo" class="form-label">Assign To</label>
                <select class="form-select form-select-sm" id="AssignTo">
                    <option value="">-- choose --</option>
                    @if (count($managers))
                        @foreach ($managers as $manager)
                            <option value="{{ $manager['id'] }}">{{ $manager['display_name'] }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="StartDate" class="form-label">Start Date</label>
                <input type="date" id="StartDate" class="form-control form-control-sm">
            </div>
            <div class="mb-3">
                <label for="EndDate" class="form-label">End Date</label>
                <input type="date" id="EndDate"  class="form-control form-control-sm">
            </div>
            <div class="mb-3">
                <label for="DeliveryDate" class="form-label">Delivery Date</label>
                <input type="date" id="DeliveryDate" class="form-control form-control-sm">
            </div> 
        </div>
        <div class="card-footer text-end px-3 bg-light">
            <button type="button" class="btn btn-sm btn-light border" onclick="return $('#create-live-project-task-modal').toggleClass('modal-d-none')">Cancel</button>
            <button type="button" onclick="storeSubTask()" class="btn btn-sm btn-success">Create</button>
        </div>
    </div>
</div>