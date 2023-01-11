<div class="modal-header bg-light">
    <h4 class="modal-title text-primary"><i class="fa fa-star" aria-hidden="true"></i> {{ $task->name }}</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
</div>
<div class="modal-body text-capitalize">
        @foreach ($task->SubTasks as $index => $sub_task)
            <div class="card border">
                <div class="card-header px-3 bg-light d-flex justify-content-between align-items-center">
                    <b class="text-capitalize"> {{ $sub_task->name }}</b>
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
                                    <button type="button" class="btn-primary rounded"><i class="mdi mdi-plus"></i></button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sub_task->SubSubTasks as $key => $sub_sub_task)
                                <tr>
                                    <td>
                                        <input type="text"
                                            onchange="setLiveProjectSubSubTask('name','{{ $sub_sub_task->id }}',this.value)"
                                            value="{{ $sub_sub_task->name }}" class="border w-100" required>
                                    </td>
                                    <td>
                                        <select
                                            onchange="setLiveProjectSubSubTask('assign_to','{{ $sub_sub_task->id }}',this.value)"
                                            class="border w-100 text-capitalize">
                                            <option value="">-- choose -- {{ $sub_sub_task->assign_to }}</option>
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
                                        <input type="date"
                                            onchange="setLiveProjectSubSubTask('start_date','{{ $sub_sub_task->id }}',this.value)"
                                            value="{{ $sub_sub_task->start_date }}" class="border w-100" required>
                                    </td>
                                    <td>
                                        <input type="date"
                                            onchange="setLiveProjectSubSubTask('end_date','{{ $sub_sub_task->id }}',this.value)"
                                            value="{{ $sub_sub_task->end_date }}" class="border w-100" required>
                                    </td> 
                                    <td>
                                        <input type="date"
                                            onchange="setLiveProjectSubSubTask('delivery_date','{{ $sub_sub_task->id }}',this.value)"
                                            value="{{ $sub_sub_task->delivery_date }}" class="border w-100" required>
                                    </td>
                                    <td>
                                        <div class="form-check form-checkbox-success">
                                            <input type="checkbox" class="form-check-input mx-auto " style="cursor: pointer"
                                                onchange="setLiveProjectSubSubTask('status','{{ $sub_sub_task->id }}',this)"
                                                value="1" {{ $sub_sub_task->status == 1 ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <i title="DELETE" onclick="deleteLiveProjectSubSubTask('{{ $sub_sub_task->id }}', this)" class="mdi mdi-trash-can text-danger" style="cursor: pointer"></i>
                                    </td>
                                </tr>
                            @endforeach
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
