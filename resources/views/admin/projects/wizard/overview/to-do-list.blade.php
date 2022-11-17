<div  ng-show="check_list_items.length != 0">
    <div class="custom-accordion card border shadow-sm rounded" ng-repeat="(index,check_list) in check_list_items">
        <div class="card-header collapsed" id="custom-accordion-head-@{{ index }}" data-bs-toggle="collapse" data-bs-target="#custom-accordion-collapse-@{{ index }}">
            <div class="card-title">
                <i class="text-danger fa fa-trash btn-sm btn" ng-click="delete_this_check_list_item(index)"></i>
                @{{ check_list.name }}
            </div> 
            <i class="accordion-icon"></i> 
        </div>
        <div class="card-body collapse" id="custom-accordion-collapse-@{{ index }}">
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
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-center"><span class="bg-warning fw-bold rounded px-1" ng-bind="check_list.project_start_date | date: 'yyyy-MM-dd'"></span></td>
                            <td class="text-center"><span class="bg-warning fw-bold rounded px-1" ng-bind="check_list.project_end_date | date: 'yyyy-MM-dd'"></span></td>
                        </tr>
                    </thead>
                    <tbody class="border" ng-repeat="(index_2 , checkListData) in check_list.data">
                        <tr ng-show="checkListData.text != 'others'" class="bg-light">
                            <td colspan="5">
                                <div class="text-start">
                                    <strong>@{{ checkListData.name }}</strong>
                                </div>
                            </td>  
                        </tr>
                        <tr ng-repeat="(index_3 , taskListData) in checkListData.data">
                            <td class="text-center">@{{ index_3 +1 }}</td>
                            <td ng-bind="taskListData.task_list"></td>
                            <td class="text-center">
                                <select get-to-do-lists ng-model="taskListData.assign_to" class="text-center form-control form-control-sm border-0" style="pointer-events: none">
                                    <option ng-value="null" ng-selected="taskListData.assign_to==null">-- Project Manager --</option>
                                    <option ng-repeat="projectManager in projectManagers" ng-value=" projectManager.id " ng-selected="projectManager.id == taskListData.assign_to">
                                        @{{ projectManager.first_name }}
                                    </option>
                                </select>
                            </td>
                            <td class="text-center" ng-bind="taskListData.start_date | date: 'yyyy-MM-dd'"></td>
                            <td class="text-center" ng-bind="taskListData.end_date | date: 'yyyy-MM-dd'"></td>
                        </tr> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>