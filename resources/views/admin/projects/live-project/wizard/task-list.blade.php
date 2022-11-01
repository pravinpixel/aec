<div class="p-2" ng-controller="TasklistController">
    {{-- <table class="mb-2 table border custom" >
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
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: @{{ overall == 0 ? 10 : overall }}%;" aria-valuenow="@{{ overall }}" aria-valuemin="0" aria-valuemax="100"><small>@{{ overall }}%</small></div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="m-0 table table-hover table-bordered custom" ng-repeat="(index,check_list) in check_list_items">
        <thead>
            <tr>
                <th class="text-center">S.No</th>
                <th class="text-center">Deliverable Name</th>
                <th class="text-center">Assign To</th>
                <th class="text-center">Start date</th>
                <th class="text-center">end date</th>
                <th class="text-center">Status</th>
                <th class="text-center">Date of Delivery</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody class="border" ng-repeat="(index_2 , checkListData) in check_list.data" >
             <tr>
                <td colspan="3" class="bg-light">
                    <div class="text-center">
                        <strong>@{{ checkListData.name }}</strong>
                    </div>
                </td>
                <td>
                   <strong class="text-center m-0 span bg-warning fw-bold rounded px-1">@{{ checkListData.data[0].start_date | date: 'dd-MM-yyyy' }}</strong>     
                </td>
                <td>
                    <strong class="text-center m-0 span bg-warning fw-bold rounded px-1">@{{ checkListData.data[checkListData.data.length - 1].end_date | date: 'dd-MM-yyyy' }}</strong>
                </td>
                <td  colspan="5" class="bg-light">
                    <div class="progress bg-light border rounded-3">
                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: @{{ countper[$index].completed == 0 ? 10 : countper[$index].completed }}%;" aria-valuenow="@{{ countper[$index].completed }}" aria-valuemin="0" aria-valuemax="100"><small>@{{ countper[$index].completed }}%</small></div>
                    </div>
                </td>
            </tr>
            <tr ng-repeat="(index_3 , taskListData) in checkListData.data">
                <td>@{{ index_3 + 1 }}</td>
                <td>@{{ taskListData.task_list }}</td>
                <td>
                    <input get-to-do-lists  type = "hidden"   ng-model="taskListData.assign_to" value="@{{ taskListData.assign_to }}" >
                    <label ng-repeat="projectManager in projectManagers" value="@{{ taskListData.assign_to }}" >
                        @{{ projectManager.first_name }}
                    </label>
                </td>
                <td> 
                    <input type="hidden" get-to-do-lists ng-value="taskListData.start_date | date: 'dd-MM-yyyy'" ng-model="taskListData.start_date" id="" class=" border-0 form-control form-control-sm">
                    <label get-to-do-lists ng-value="taskListData.start_date | date: 'dd-MM-yyyy'" id="" class=" border-0 form-control form-control-sm" ng-readonly="">@{{ taskListData.start_date | date: 'dd-MM-yyyy' }}</label></td>
                <td> 
                    <input type="hidden" get-to-do-lists ng-value="taskListData.end_date | date: 'dd-MM-yyyy'" ng-model="taskListData.end_date" id="" class=" border-0 form-control form-control-sm">
                    <label get-to-do-lists ng-value="taskListData.end_date | date: 'dd-MM-yyyy'" id="" class=" border-0 form-control form-control-sm" ng-readonly="">@{{ taskListData.end_date | date: 'dd-MM-yyyy' }}</label>
                </td>
                <td class="text-center"><input type="checkbox" name="" ng-model="taskListData.status" id="" class="form-check-input" ng-value = "taskListData.status" ng-change=storeTaskListsStatus(taskListData.status)></td>
                <td><input type="date" min="@{{ taskListData.start_date | date: 'yyyy-MM-dd' }}" get-to-do-lists ng-value="taskListData.delivery_date | date: 'yyyy-MM-dd'" ng-model="taskListData.delivery_date" id="" class=" border-0 form-control form-control-sm" ng-change=storeTaskListsDeliverydate(taskListData.status)></td>
                <td class="text-center"><a ng-click="deleteTaskList(index,index_2,index_3)" href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-delete text-danger"></i></a></td>
            </tr>  
            
        </tbody>
    </table> --}}


   
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






    <div ng-repeat="(index,check_list) in check_list_all">
        <div style="display:flex;background:#0C326C;" class="p-2">
            <div class="text-center text-light" style="font-weight:bold;width:5%">S.No</div>
            <div class="text-center text-light" style="font-weight:bold;width:25%">Deliverable Name</div>
            <div class="text-center text-light" style="font-weight:bold;width:15%">Assign To</div>
            <div class="text-center text-light" style="font-weight:bold;width:10%">Start date</div>
            <div class="text-center text-light" style="font-weight:bold;width:10%">end date</div>
            <div class="text-center text-light" style="font-weight:bold;width:5%">Status</div>
            <div class="text-center text-light" style="font-weight:bold;width:20%">Date of Delivery</div>
            <div class="text-center text-light" style="font-weight:bold;width:8%">Action</div>
        </div>
        <div class="border" ng-repeat="(index_2 , checkListData) in check_list.data">
            <div style="display: flex;border:1px solid #eee" >
                <div class="text-center " style="width:45%;">
                    <strong>@{{ checkListData.name }}</strong>
                </div>
                <div style="width:10%;display:flex;justify-content:center" class="">
                    <strong
                        class="text-center m-0 span bg-warning fw-bold rounded px-1">@{{ checkListData.data[0].start_date | date: 'dd-MM-yyyy' }}</strong>
                </div>
                <div  style="width:17.5%;margin-left:10px;" class="">
                    <strong
                        class="text-center m-0 span bg-warning fw-bold rounded px-1">@{{ checkListData.data[checkListData.data.length - 1].end_date | date: 'dd-MM-yyyy' }}</strong>
                </div>
                <div class="progress bg-light border rounded-3" style="width:12.5%;">
                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                        style="width: @{{ countper[$index].completed == 0 ? 10 : countper[$index].completed }}%;" aria-valuenow="@{{ countper[$index].completed }}"
                        aria-valuemin="0" aria-valuemax="100"><small>@{{ countper[$index].completed }}%</small>
                    </div>
                </div>
                <div style="width:14%;padding:0 0 0 55px;">
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
                    <div style="width:25%;display:flex;align-items:center;justify-content:center" class="text-center ">
                        {{-- <p class="m-0"> --}}
                            <input type="text" class="res-input form-control" ng-value=" taskListData.task_list " ng-model=" taskListData.task_list ">
                        {{-- </p> --}}
                    </div>
                    <div style="width:15%;display:flex;align-items:center;justify-content:center" class="text-center ">
                        <input get-to-do-lists type="hidden" ng-model="taskListData.assign_to"
                            value="@{{ taskListData.assign_to }}">
                            {{-- <p style="" class="m-0"> --}}
                                {{-- <input type="text" ng-repeat="projectManager in projectManagers" ng-value="projectManager.first_name" ng-bind=" taskListData.task_list "> --}}
                                <select name="" id="" ng-model="taskListData.assign_to" class="form-control">
                                    <option value="">-- Project Manager --</option>
                                    <option ng-repeat="projectManager in projectManagers"
                                    value="@{{ projectManager.id }}"
                                    ng-selected="projectManager.id == taskListData.assign_to">
                                    @{{ projectManager.first_name }}
                                </option>
                                </select>
                            {{-- </p> --}}
                    </div>
                    <div style="width:10%;display:flex;justify-content:center" class="">
                        <input type="date" get-to-do-lists
                            value="@{{ taskListData.start_date  | date: 'yyyy-MM-dd'}}"
                            ng-model="taskListData.start_date" id=""
                            class=" border-0 form-control form-control-sm">
                        {{-- <label get-to-do-lists ng-value="taskListData.start_date | date: 'dd-MM-yyyy'" id=""
                            class=" border-0 form-control form-control-sm"
                            ng-readonly="">@{{ taskListData.start_date | date: 'dd-MM-yyyy' }}</label> --}}
                    </div>
                    <div style="width:10%" class="">
                        <input type="date" get-to-do-lists
                            value="@{{ taskListData.end_date | date: 'yyyy-MM-dd' }}"
                            ng-model="taskListData.end_date" id=""
                            class=" border-0 form-control form-control-sm text-center">
                        {{-- <label get-to-do-lists ng-value="taskListData.end_date | date: 'dd-MM-yyyy'" id=""
                            class=" border-0 form-control form-control-sm "
                            ng-readonly="">@{{ taskListData.end_date | date: 'dd-MM-yyyy' }}</label> --}}
                    </div>
                    <div style="width:5%;display:flex;align-items:center;justify-content:center" class="text-center"><input type="checkbox" name="" ng-model="taskListData.status"
                            id="" class="form-check-input " ng-value="taskListData.status"
                            ng-change=storeTaskListsStatus(taskListData.status)></div>
                    <div style="width:20%">
                        <input type="date" min="@{{ taskListData.start_date | date: 'yyyy-MM-dd' }}" get-to-do-lists
                            ng-value="taskListData.delivery_date | date: 'yyyy-MM-dd'"
                            ng-model="taskListData.delivery_date" id=""
                            class=" border-0 text-right form-control text-center "
                            ng-change=storeTaskListsDeliverydate(taskListData.status)></div>
                    <div style="width:8%" class="text-center "><a ng-click="deleteTaskList(index,index_2,index_3)"
                            href="javascript: void(0);" class="action-icon"> <i
                                class="mdi mdi-delete text-danger"></i></a></div>
                </div>
               </div>

            </div>

        </div>
    </div> 








    <div class="row">
        <div class="col-8" ng-if="projectTypes">
            <project-open-comment
                data="
            {'modalState':'viewConversations',
            'type': 'task', 
            'header':'task',
            'project_id':projectTypes.id,
            send_by: {{ Admin()->id }},
            'from':'Admin'
            }" />
        </div>
        <div class="col-4" ng-if="projectTypes">
            <project-comment
                data="
            {'modalState':'viewConversations',
            'type': 'task', 
            'header':'task',
            'project_id':projectTypes.id,
            send_by: {{ Admin()->id }},
            'from':'Admin'
            }" />
        </div>
    </div>
</div>



<div class="card-footer text-end">
    <a href="#!/invoice-plan" class="btn btn-light float-start">Prev</a>
    <a  class="btn btn-primary" ng-click="liveProjectToDoUpdate()">Next</a>
</div>
<style>
/* .wrapper-custom{
    position:relative;
    overflow:hidden;
}
button.abs-icon{
    border:none;
    outline:none;
    height:0;
    width:0;
    margin:0;
    padding:0;

    
}
.wrapper-custom .abs-icon::before{
    content:'+';
    position: absolute;
    color:white;
    display:flex;
    align-items: center;
    justify-content: center;
    font-size:22px;
    top:-20px;
    right:10px;
    width:35px;
    height:35px;
    border-radius:50%;
    background: #39AFD1;
    transition:0.5s all;
}
.wrapper-custom:hover .abs-icon::before{
    top:0px;
    right:10px;
    background: #1EE76A;
} */
.res-input{
    width:100%;
    
    border:1px solid #DEE2E6;
    outline: none;
    padding:5px;
}
</style>