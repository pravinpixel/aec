<div class="modal-header bg-white">
    <h4 class="modal-title text-dark d-flex align-items-center">
        <span class="text-primary">{{ session()->get('current_project')->reference_number }}</span> 
        <span class="mx-1">|</span>
        <span class="text-secondary">{{ session()->get('current_project')->project_name }}</span>
        <span class="mx-1">|</span>
        <b>{{ $task->name }}</b>
    </h4>
    <button type="button" onclick="setAllTask()" class="btn btn-sm btn-light" data-bs-dismiss="modal" aria-hidden="true"> <i class="mdi-close mdi"></i></button>
</div>
<div class="modal-body text-capitalize position-relative">
    @foreach ($task->SubTasks as $index => $sub_task)
        <div class="card shadow">
            <div class="card-header px-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center pe-3 me-3 border-end" id="{{ slugable($sub_task->name,'_progress_bar') }}">
                        {!! generateProgressBar($sub_task->progress_percentage) !!}
                    </div>
                    <h5 class="m-0 text-capitalize text-black"> {{ $sub_task->name }} </h5>
                </div>
                <button type="button" onclick="deleteLiveProjectSubTask('{{ $sub_task->id }}', this)" class="btn btn-sm btn-outline-danger rounded"><i class="mdi mdi-trash-can"></i> Delete all</button>
            </div>
            <div class="card-body pt-0">
                <table class="table m-0 table-hover table-sm">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-secondary font-14">Deliverable Name</th>
                            <th class="text-secondary font-14">Assign To</th>
                            <th class="text-secondary font-14">Start date</th>
                            <th class="text-secondary font-14">End date</th>
                            <th class="text-secondary font-14">Date of Delivery</th>
                            <th class="text-secondary font-14 text-center">Status</th>
                            <th class="text-secondary font-14 text-center">
                                <button type="button" class="btn-primary btn btn-sm rounded-pill" onclick="createLiveProjectSubTask('{{ $sub_task->id }}', '{{ slugable($sub_task->name,$task->id) }}',this)"><i class="mdi mdi-plus"></i></button>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="sortable">
                        @if (count($sub_task->SubSubTasks))
                            @foreach ($sub_task->SubSubTasks as $key => $sub_sub_task)
                                <tr data-id="{{ $sub_sub_task->id }}" class="{{ slugable($sub_task->name,$key + 1) }}">
                                    <td>
                                        <i class="btn btn-sm border py-0 p-1 shadow-sm btn-light mdi-arrow-collapse-vertical mdi"></i>
                                    </td>
                                    <td>
                                        <input type="text" {{ $sub_sub_task->status == 1 ? 'disabled' : '' }}  onkeypress="setLiveProjectSubSubTask('name','{{ $sub_sub_task->id }}',this)" value="{{ $sub_sub_task->name }}" class="custom input_{{ slugable($sub_task->name,$key + 1) }}" required>
                                    </td>
                                    <td>
                                        <select {{ $sub_sub_task->status == 1 ? 'disabled' : '' }}  onchange="setLiveProjectSubSubTask('assign_to','{{ $sub_sub_task->id }}',this)" class="custom input_{{ slugable($sub_task->name,$key + 1) }}">
                                            <option value="">-- choose --</option>
                                            @if (count(getManagers()))
                                                @foreach (getManagers() as $manager)
                                                    <option
                                                        {{ $manager['id'] == $sub_sub_task->assign_to ? 'selected' : '' }}
                                                        value="{{ $manager['id'] }}">{{ $manager['display_name'] }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        <input type="date" {{ $sub_sub_task->status == 1 ? 'disabled' : '' }} onchange="setLiveProjectSubSubTask('start_date','{{ $sub_sub_task->id }}',this)" value="{{ DatePickerFormat($sub_sub_task->start_date) }}" class="custom input_{{ slugable($sub_task->name,$key + 1) }}"  required>
                                    </td>
                                    <td>
                                        <input type="date" {{ $sub_sub_task->status == 1 ? 'disabled' : '' }}  onchange="setLiveProjectSubSubTask('end_date','{{ $sub_sub_task->id }}',this)" min="{{ DatePickerFormat($sub_sub_task->start_date) }}" value="{{ DatePickerFormat($sub_sub_task->end_date) }}" class="custom input_{{ slugable($sub_task->name,$key + 1) }}" required >
                                    </td> 
                                    <td>
                                        <input type="date"
                                        {{ $sub_sub_task->status == 1 ? 'disabled' : '' }} 
                                            onchange="setLiveProjectSubSubTask('delivery_date','{{ $sub_sub_task->id }}',this)"
                                            value="{{ DatePickerFormat($sub_sub_task->delivery_date) }}" 
                                            min="{{ DatePickerFormat($sub_sub_task->end_date) }}"
                                            class="custom input_{{ slugable($sub_task->name,$key + 1) }}" required>
                                    </td>
                                    <td>
                                        <div class="form-check ps-0 form-checkbox-success d-flex justify-content-center">
                                            <input 
                                                type="checkbox" 
                                                style="cursor: pointer"
                                                data-progress-id="{{ slugable($sub_task->name,'_progress_bar') }}"
                                                class="form-check-input custom mx-auto input_{{ slugable($sub_task->name,$key + 1) }}" 
                                                onchange="setTaskStatus('{{ $sub_sub_task->id }}','{{ $sub_task->id }}',this)"
                                                value="1"  
                                                {{ $sub_sub_task->status == 1 ? 'checked disabled' : '' }} 
                                            />
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if ($sub_sub_task->status == 1)
                                            <i title="DELETE" class="mdi-close mdi font-18 text-secondary" style="cursor: pointer"></i>
                                            @else
                                            <i title="DELETE" data-progress-id="{{ slugable($sub_task->name,'_progress_bar') }}" onclick="deleteLiveProjectSubSubTask('{{ $sub_sub_task->id }}', this)" class="mdi-close mdi font-18 text-danger" style="cursor: pointer"></i>
                                        @endif
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
{{-- <div class="modal-footer">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="setAllTask()">Close</button>
    <button type="button" class="btn btn-primary" onclick="setAllTask()">Save changes</button>
</div> --}}
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
                    @if (count(getManagers()))
                        @foreach (getManagers() as $manager)
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