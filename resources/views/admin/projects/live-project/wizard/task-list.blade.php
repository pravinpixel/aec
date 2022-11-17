<div class="p-2" >
    <table class="mb-2 table border custom">
        <tbody>
            <tr>
                <td><b>Project Name</b></td>
                <td>:</td>
                <td>@{{ projectTypes.project_name }}</td>
                <td><b>Customer Name</b></td>
                <td>:</td>
                <td>@{{ projectTypes.customerdatails.first_name }}</td>
            </tr>
            <tr>
                <td><b>Project Lead</b></td>
                <td>:</td>
                <td>@{{ lead }}</td>
                <td><b>Over All Status</b></td>
                <td>:</td>
                <td>
                    <div class="progress bg-light border rounded-3 progress-xl">
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar"
                            style="width: @{{ overall == 0 ? 10 : overall }}%;" aria-valuenow="@{{ overall }}"
                            aria-valuemin="0" aria-valuemax="100"><small>@{{ overall }}%</small></div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table> 
    <div ng-repeat="(index,check_list) in TaskListsCollection">
        <div style="display:flex;background:#0C326C;" class="p-2">
            <div class="text-center text-light" style="font-weight:bold;width:5%">S.No</div>
            <div class="text-center text-light" style="font-weight:bold;width:20%">Deliverable Name</div>
            <div class="text-center text-light" style="font-weight:bold;width:10%">Assign To</div>
            <div class="text-center text-light" style="font-weight:bold;width:15%">Start date</div>
            <div class="text-center text-light" style="font-weight:bold;width:15%">end date</div>
            <div class="text-center text-light" style="font-weight:bold;width:5%">Status</div>
            <div class="text-center text-light" style="font-weight:bold;width:20%">Date of Delivery</div>
            <div class="text-center text-light" style="font-weight:bold;width:8%">Action</div>
        </div>
        <div class="border" ng-repeat="(index_2 , checkListData) in check_list.data">
            <div style="display: flex;border:1px solid #eee" >
                <div class="text-center " style="width:37.5%;">
                    <strong>@{{ checkListData.name }}</strong>
                </div>
                <div style="width:10%;display:flex;justify-content:center" class="">
                    <strong
                        class="text-center m-0 span bg-warning fw-bold rounded px-1">@{{ checkListData.data[0].start_date | date: 'dd-MM-yyyy' }}</strong>
                </div>
                <div  style="width:17.5%;margin-left:55px;" >
                    <strong
                        class="text-center m-0 span bg-warning fw-bold rounded px-1 pb-2">@{{ checkListData.data[checkListData.data.length - 1].end_date | date: 'dd-MM-yyyy' }}</strong>
                </div>
                <div class="progress bg-light border rounded-3" style="width:12.5%;">
                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                        style="width: @{{ countper[$index].completed == 0 ? 10 : countper[$index].completed }}%;" aria-valuenow="@{{ countper[$index].completed }}"
                        aria-valuemin="0" aria-valuemax="100"><small>@{{ countper[$index].completed }}%</small>
                    </div>
                </div>
                <div style="width:14%;padding:0 0 0 90px;">
                    <i class="fa fa-plus btn-sm btn btn-success mx-2" style="margin-left:4px;"  ng-click="createTaskListData(index,index_2)"></i>
                </div>
                {{-- <button class="btn bktn-primary"  ng-click="createTaskListData(index,index_2)"> --}}
                {{-- </button> --}}
            </div>
            <div psi-sortable="" ng-model="checkListData.data " class="wrapper-custom">
                {{-- <a  class="abs-icon" ng-click="createTaskListData(index,index_2)"></a> --}}
               <div  ng-repeat="(index_3 , taskListData) in checkListData.data track by $index">
                <div style="display:flex;" >
                    <div style="width:5%;display:flex;justify-content:center;align-items:center" class="">
                        <i class="bi bi-arrows-move border" style="padding:5px;cursor:pointer"></i>
                        <strong>@{{ index_3 + 1 }}</strong>
                    </div>
                    <div style="width:20%;display:flex;align-items:center;justify-content:center" class="text-center ">
                        {{-- <p class="m-0"> --}}
                            <input type="text" class="form-control-sm form-control" ng-value=" taskListData.task_list " ng-model=" taskListData.task_list ">
                        {{-- </p> --}}
                    </div>
                    <div style="width:10%;display:flex;align-items:center;justify-content:center" class="text-center ">
                        <input get-to-do-lists type="hidden" ng-model="taskListData.assign_to" 
                            value="@{{ taskListData.assign_to }}">
                            {{-- <p style="" class="m-0"> --}}
                                {{-- <input type="text" ng-repeat="projectManager in projectManagers" ng-value="projectManager.first_name" ng-bind=" taskListData.task_list "> --}}
                                <select name="" id="shouldRemoveSelect" ng-model="taskListData.assign_to" class="form-control" 
                                >
                                    <option ng-value="null" ng-selected="taskListData.assign_to==null">-- Project Manager --</option>
                                    <option 
                                        ng-repeat="projectManager in projectManagers"
                                        ng-value="projectManager.id"
                                        ng-selected="projectManager.id == parseInt(taskListData.assign_to)"
                                    >
                                        @{{ projectManager.first_name }}
                                    </option>
                                </select>
                            {{-- </p> --}}
                    </div>
                    <div style="width:15%;display:flex;justify-content:center" class="">
                        <datepicker date-format="dd/MM/yyyy" date-min-limit="taskListData.start_date" date-set="taskListData.start_date">
                        <input type="text" get-to-do-lists
                            {{-- ng-value="@{{ taskListData.start_date  | date: 'yyyy-MM-dd'}}" --}}
                            ng-model="taskListData.start_date" id=""
                            class=" form-control form-control-sm text-center">
                        </datepicker>
                        {{-- <label get-to-do-lists ng-value="taskListData.start_date | date: 'dd-MM-yyyy'" id=""
                            class=" border-0 form-control form-control-sm"
                            ng-readonly="">@{{ taskListData.start_date | date: 'dd-MM-yyyy' }}</label> --}}
                    </div>
                    <div style="width:15%" class="">
                        <datepicker date-format="dd/MM/yyyy" date-min-limit="taskListData.end_date" date-set="taskListData.end_date">
                            <input type="text" 
                                get-to-do-lists 
                                ng-model="taskListData.end_date" 
                                class="form-control form-control-sm text-center"
                            />
                        </datepicker>
                    </div>
                    <div style="width:5%;display:flex;align-items:center;justify-content:center" class="text-center">
                        <input 
                            type="checkbox"
                            ng-model="taskListData.status"
                            class="form-check-input"
                            ng-value="taskListData.status"
                            ng-change=storeTaskListsStatus(taskListData.status)
                        />
                    </div>
                    <div style="width:20%">
                        <datepicker date-format="dd-MM-yyyy" date-min-limit="taskListData.start_date" date-set="taskListData.delivery_date">
                            <input type="text" 
                                placeholder="dd/MM/yyyy"
                                get-to-do-lists
                                ng-model="taskListData.delivery_date" 
                                class="form-control text-center"
                                style="padding:4.48px;"
                                ng-change="storeTaskListsDeliverydate(taskListData.status)"
                            />
                        </datepicker>
                    </div>
                    <div style="width:8%" class="text-center ">
                        <a ng-click="deleteTaskList(index,index_2,index_3)" href="javascript: void(0);" class="action-icon">
                            <i class="mdi mdi-delete text-danger"></i>
                        </a>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer text-end">
    <a href="#!/invoice-plan" class="btn btn-light float-start">Prev</a>
    {{-- <a  class="btn btn-primary" ng-click="liveProjectToDoUpdate()">Next</a> --}}
    <button  class="btn btn-primary" ng-click="liveProjectToDoSubmit()">Next</a>
</div> 