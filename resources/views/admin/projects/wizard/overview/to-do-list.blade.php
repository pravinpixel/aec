<div  ng-show="check_list_items.length != 0">
    <div>
        <div class="custom-accordion card border shadow-sm rounded" ng-repeat="(index,check_list) in check_list_items">
            <div class="card-header collapsed" id="custom-accordion-head-@{{ index }}" data-bs-toggle="collapse" data-bs-target="#custom-accordion-collapse-@{{ index }}">
                <div class="card-title">@{{ check_list.name }}</div> 
                <i class="accordion-icon"></i> 
            </div>
            <div class="card-body collapse " id="custom-accordion-collapse-@{{ index }}">
                <div class="card-content">
                    <table class="m-0 table custom">
                        <thead>
                            <tr>
                                <th class="text-center">S.No</th>
                                <th class="text-center">Deliverable Name</th>
                                <th class="text-center">Assign To</th>
                                <th class="text-center">Start Date</th>
                                <th class="text-center">End Date</th>
                            </tr>
                        </thead>
                        <tbody class="border" ng-repeat="(index_2 , checkListData) in check_list.data">
                            <tr ng-show="checkListData.text != 'others'">
                                <td colspan="6" class="bg-light">
                                    <div class="text-start">
                                        <strong>@{{ checkListData.name }}</strong>
                                    </div>
                                </td>
                            </tr>
                            <tr ng-repeat="(index_3 , taskListData) in checkListData.data">
                                <td>@{{ index_3 +1 }}</td>
                                <td>@{{ taskListData.task_list }}</td>
                                {{-- <td class="text-center">
                                    <input disabled  type="checkbox" get-to-do-lists ng-model="taskListData.status" class="form-check-input">
                                </td> --}}
                                <td>
                                    <select  get-to-do-lists ng-model="taskListData.assign_to" class="form-control border-0  form-select-sm" style="pointer-events: none">
                                        <option value="">-- Project Manager --</option>
                                        <option ng-repeat="projectManager in projectManagers" value="@{{ projectManager.id }}" ng-selected="projectManager.id == taskListData.assign_to">
                                            @{{ projectManager.first_name }}
                                        </option>
                                    </select>
                                </td>
                                <td><input style="pointer-events: none"  type="text" get-to-do-lists ng-value="taskListData.start_date | date: 'dd-MM-yyyy'" ng-model="taskListData.start_date" id="" class=" border-0 form-control form-control-sm  border-0 "></td>
                                <td><input style="pointer-events: none"  type="text" get-to-do-lists ng-value="taskListData.end_date | date: 'dd-MM-yyyy'" ng-model="taskListData.end_date" id="" class=" border-0 form-control form-control-sm  border-0 "></td>
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>
</div>