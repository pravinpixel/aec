<div class="border-bottom">
    <br>
    <br> 
    <div class="row m-0 card-body">
        <div class="col-8 mx-auto d-flex">
            <div class="mb-2 me-3">
                <label for=""><b>Type of Delivery</b></label>
                <div class="btn-group w-100 border rounded">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                        name="delivery_type_id" ng-model="project.delivery_type_id" required>
                        <option value="">@lang('project.select')</option>
                        <option ng-repeat="deliveryType in deliveryTypes" value="@{{ deliveryType.id }}"
                            ng-selected="deliveryType.id == project.delivery_type_id">
                            @{{ deliveryType.delivery_type_name }}
                        </option>
                    </select>
                </div>
            </div>
            <div>
                <label for=""><b>Select Check List</b></label>
                <div class="btn-group w-100 border rounded">
                    <select ng-model="check_list_type" class="border-0 form-select ">
                        <option value="">@lang('project.select')</option>
                        <option value="@{{ row.name }}" ng-repeat="row in check_list_master">
                            @{{ row.name }}
                        </option>
                    </select>
                    <button class="btn btn-primary" ng-click="add_new_check_list_item(index)"><i
                            class="mdi mdi-plus"></i></button>
                </div>
            </div>
        </div> 
        <div class="col-12 mt-4 pe-0" ng-show="check_list_items.length != 0">
            <div class="custom-accordion card border shadow-sm rounded " ng-repeat="(index,check_list) in check_list_items">
                <div class="card-header collapsed" id="custom-accordion-head-@{{ index }}"
                    data-bs-toggle="collapse" data-bs-target="#custom-accordion-collapse-@{{ index }}">
                    <div class="card-title">
                        <i class="text-danger fa fa-trash btn-sm btn" ng-click="delete_this_check_list_item(index)"></i>
                        @{{ check_list.name }}
                    </div>
                    <i class="accordion-icon"></i>
                </div>
                <div class="card-body collapse" id="custom-accordion-collapse-@{{ index }}">
                    <div class="card-content">
                        {{-- <table class="m-0 table custom">
                            <thead>
                                <tr>
                                    <th class="text-center">S.No</th>
                                    <th class="text-center">Deliverable Name</th>
                                    <th class="text-center">Assign To</th>
                                    <th class="text-center">Start Date</th>
                                    <th class="text-center">End Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                        </table> --}}
                        {{-- <table class="m-0 table custom"> --}}
                            <div class="custom-table p-2">
                                    <div class="d-flex justify-content-center">
                                        <label class="text-center text-light">S.No</label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <label class="text-center text-light">Deliverable Name</label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <label class="text-center text-light">Assign To</label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <label class="text-center text-light">Start Date</label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <label class="text-center text-light">End Date</label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <label class="text-center text-light">Action</label>
                                    </div>

                            </div>
                        {{-- </table> --}}
                        <div class="border" ng-repeat="(index_2 , checkListData) in check_list.data">
                            <div ng-show="checkListData.text != 'others'" class="bg-light row m-0 align-items-center" >
                                <div class="col-6 text-start">
                                    <strong ng-bind="checkListData.name"></strong>
                                </div>
                                <div class="col p-0">
                                    <div class="row m-0 p-2">
                                        <div class="col ps-4">
                                            <md-datepicker 
                                                md-hide-icons="all"
                                                ng-disabled
                                                class="text-center"
                                                ng-model="checkListData.data[0].start_date" 
                                                md-placeholder="Enter date"
                                            />
                                        </div>
                                        <div class="col">
                                            <md-datepicker 
                                                md-hide-icons="all"
                                                ng-disabled
                                                class="text-center"
                                                ng-model="checkListData.data[checkListData.data.length-1].end_date" 
                                                md-placeholder="Enter date"
                                            /> 
                                        </div>
                                        <div class="col-1" style="padding:0 !important;">
                                            <i class="fa fa-plus btn-sm btn btn-success" ng-click="createTaskListData(index,index_2)" ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div psi-sortable="" ng-model="checkListData" id="todoListing">
                                <div ng-repeat="(index_3 , taskListData) in checkListData.data track by $index" class="row" >
                                    <div class="d-flex align-items-center">
                                        <div style="width:48px;" class="p-1">
                                            <i class="bi bi-arrows-move border btn btn-sm"></i>
                                            {{-- <strong class="text-center pl-2">@{{ index_3 + 1 }}</strong>  --}}
                                        </div>
                                        <div style="width:300px;" class="p-1">
                                            <input type="text" class="form-control-sm form-control" ng-model="taskListData.task_list">
                                        </div>
                                        <div class="col p-1" >
                                            <select  ng-model="taskListData.assign_to" class="form-select form-select-sm">
                                                <option ng-value="null" ng-selected="taskListData.assign_to==null">-- Project Manager --</option>
                                                <option ng-repeat="projectManager in projectManagers"
                                                    ng-value="projectManager.id"
                                                    ng-selected="projectManager.id == taskListData.assign_to"
                                                    ng-bind="projectManager.first_name"
                                                ></option>
                                            </select>
                                        </div>
                                        <div class="col p-1"> 
                                            <md-datepicker 
                                                ng-model="taskListData.start_date" 
                                                md-placeholder="Enter date"
                                            />
                                        </div>
                                        <div class="col p-1"> 
                                            <md-datepicker 
                                                ng-model="taskListData.end_date" 
                                                ng-value="taskListData.end_date" 
                                                md-placeholder="Enter date"
                                                md-min-date="taskListData.start_date"
                                            />
                                        </div>
                                        <div class="p-1" style="width: 50px;display:flex;justify-content:center">
                                            <i class="bi bi-trash text-danger border btn btn-sm" ng-click="delete_this_taskListData(index,index_2,$index)"></i>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer text-end">
    <a href="#!/invoice-plan" class="btn btn-light float-start">Prev</a>
    <a ng-click="storeToDoLists()" class="btn btn-primary">Next</a>
</div>
<style>
    .To_Do_List .timeline-step .inner-circle {
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
    .custom-align{
        display: flex;
        justify-content:center;
    }
    .align-date1{
        margin-left:42px !important;
    }
    .align-date2{
        margin-left:-18px !important;
    }
    .custom-table{
        display:flex;
        background: #0C326C;
    }
    .custom-table>div:nth-child(1){
        width:6%;
    }
    .custom-table>div:nth-child(2){
        width:27.8%;
    }
    .custom-table>div:nth-child(3){
        width:20%;
    }
    .custom-table>div:nth-child(4){
        width:21%;
    }
    .custom-table>div:nth-child(5){
        width:20%;
    }
    .custom-table>div:nth-child(6){
        width:6%;
    }
    .custom-align{
        padding-left:86px;
    }
</style>
