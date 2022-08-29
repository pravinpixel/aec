@extends('admin.setup.index')
@section('setup-content')
    <section ng-controller="CheckSheetSetupController">
        <div class="card">
            <div class="card-header ">
                <div class="d-flex justify-content-between">
                    <h3 class="haeder-title"></h3>
                    <div>
                        <button class="btn btn-primary btn-sm " ng-click="toggleModalForm('add', 0)">Create Check sheet</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mx-0 pb-3 mb-2 border-bottom">
                    <div class="col">
                        <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Check Sheet Name</label>
                        <select ng-model="check_list_item1.name" ng-change="changedValue()" class="form-select form-select-sm" >
                            <option value="">-- select --</option>
                            <option value="@{{ row.name }}" ng-repeat="row in check_sheet_master">@{{ row.name }}</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Delivery List</label>
                        <select ng-model="check_list_item1.task_list_category" ng-change="changedValue()"  class="form-select form-select-sm" >
                            <option value="">-- select --</option>
                            <option value="@{{ row.id }}" ng-repeat="row in task_list_master">@{{ row.task_list_name }}</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Activity List</label>
                        <select ng-model="check_list_item1.task_list"  ng-change="changedValue()" class="form-select form-select-sm" >
                            <option value="">-- select --</option>
                            <option value="@{{ row.name }}" ng-repeat="row in activity_list_master">@{{ row.name }}</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2" style="opacity: 0">Activity List</label>
                    <button class="btn btn-info btn-sm" ng-click="resetButton()">
                            <i class="fa fa-refresh"></i> Reset
                        </button>
                    </div>
                </div>
                <table class="table custom table-striped table-bordered" datatable="ng" dt-options="vm.dtOptions">
                    <thead>
                        <tr>
                        
                            <th>Check Sheet Name</th>
                            <th>Delivery List</th>
                            <th>Activity List</th>
                            <th>Status</th>
                            <th >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="(index,checkListitem) in checkList">
                            <td class="align-items-center"><small class="text-black">@{{ checkListitem.name }}</small></td>
                            <td class="align-items-center"><small class="text-black">@{{ checkListitem.get_task_list.task_list_name }}</small></td>
                            <td class="align-items-center"><small class="text-black">@{{ checkListitem.task_list }}</small></td>
                        
                            <td>
                                <div>
                                    <input type="checkbox" id="switch__@{{ index }}" ng-checked="checkListitem.is_active == 1" data-switch="success"/>
                                    <label for="switch__@{{index}}" data-on-label="On" ng-click="changeCheckListStatus(checkListitem.id, checkListitem.is_active)" data-off-label="Off"></label>
                                </div>
                                <span ng-if="checkListitem.is_active == 1" class="d-none">1</span>              
                                <span ng-if="checkListitem.is_active == 0" class="d-none">0</span>              
                            </td>
                            <td> 
                                <div class="btn-group">
                                    <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill" ng-click="toggleModalForm('edit', checkListitem.id)"><i class="fa fa-edit"></i></button>
                                    <button class="shadow btn btn-sm btn-outline-danger rounded-pill  " ng-click="deleteThisData(checkListitem.id)"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-fooetr"></div>
        </div> 

        <div id="checklist-form-popup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-@{{form_color}}">
                        <h4 class="modal-title" id="@{{form_color}}-header-modalLabel">@{{form_title}}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form name="LayerModule" class="form-horizontal" novalidate="">
                            <div class="form-group error mb-2">
                                <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Check Sheet Name</label>
                                <div class="col">
                                    <select ng-model="check_list_item.name" ng-required="true" class="form-select form-select-sm" required>
                                        <option value="">-- select --</option>
                                        <option value="@{{ row.name }}" ng-repeat="row in check_sheet_master">@{{ row.name }}</option>
                                    </select>
                                    {{-- <input type="text" class="form-control has-error" id="name" name="name" placeholder="Type Here.." ng-model="check_list_item.name" ng-required="true" required> --}}
                                    <small class="help-inline text-danger">This  Fields is Required</small>
                                </div>
                            </div>
                            <div class="form-group error mb-2">
                                <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Delivery List</label>
                                <div class="col">
                                    <select ng-model="check_list_item.task_list_category" ng-required="true" class="form-select form-select-sm" required>
                                        <option value="">-- select --</option>
                                        <option value="@{{ row.id }}" ng-repeat="row in task_list_master">@{{ row.task_list_name }}</option>
                                    </select>
                                    <small class="help-inline text-danger">This  Fields is Required</small>
                                </div>
                            </div>
                            <div class="form-group error mb-2">
                                <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Activity List</label>
                                <div class="col">
                                    <select ng-model="check_list_item.task_list" ng-required="true" class="form-select form-select-sm" required>
                                        <option value="">-- select --</option>
                                        <option value="@{{ row.name }}" ng-repeat="row in activity_list_master">@{{ row.name }}</option>
                                    </select>
                                    {{-- <input type="text" class="form-control has-error" id="task_list" name="task_list" placeholder="Type Here.." ng-model="check_list_item.task_list" ng-required="true" required> --}}
                                    <small class="help-inline text-danger">This  Fields is Required</small>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12 pb-3">
                                    <label for="status" class="col-sm-12  text-dark control-label mb-2">Status</label>
                                    <div>
                                        <div class="form-check form-check-inline form-radio-@{{form_color}}">
                                            <input type="radio"  ng-checked="check_list_item.is_active == 1" id="active" value="1" ng-model="check_list_item.is_active" name="is_active" class="form-check-input"  ng-required="true">
                                            <label class="form-check-label" for="active">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline form-radio-dark">
                                            <input type="radio" ng-checked="check_list_item.is_active == 0" id="Deactive" value="0" ng-model="check_list_item.is_active" name="is_active" class="form-check-input" ng-required="true">
                                            <label class="form-check-label" for="Deactive">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="storeModalForm(modalstate, id); $event.stopPropagation();" ng-disabled="LayerModule.$invalid">Submit</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div> 
    </section>
@endsection
@push('custom-scripts') 
    <script>
        app.controller('CheckSheetSetupController', function ($scope, $http, API_URL, $location) {

            $scope.getFreshTaskListData = () => {
                $http.get(`${API_URL}task-list-master`).then((res)=> {
                    $scope.task_list_master = res.data; 
                    $scope.task_list_master1 = res.data; 
                });
            }
            $scope.getFreshTaskListData();

            $scope.getFreshCheckSheetData = () => {
                $http.get(`${API_URL}check-sheet-master`).then((res)=> {
                    $scope.check_sheet_master = res.data; 
                    $scope.check_sheet_master1 = res.data; 
                });
            }
            $scope.getFreshCheckSheetData();
            $scope.getFreshActivityListData = () => {
                $http.get(`${API_URL}activity-list-master`).then((res)=> {
                    $scope.activity_list_master = res.data; 
                    $scope.activity_list_master1 = res.data; 
                });
            }
            $scope.getFreshActivityListData();


            $scope.getFreshCheckListData    =   ()  => {
                $http.get(`${API_URL}check-list-master`).then((res)=> {
                    $scope.checkList = res.data;
                });
            }
            $scope.changedValue = () =>{
                // $scope.checkSheet = checkSheet;
            console.log($scope.check_list_item1.name);
            console.log($scope.check_list_item1.task_list_category);
            console.log($scope.check_list_item1.task_list);

                // alert($scope.check_list_item.name)
                // console.log(checkSheet);
                $http({
                    method: "POST",
                    url: `${API_URL}select-check-sheet`,
                    data: {"checkSheet":$scope.check_list_item1.name,"deliveryList":$scope.check_list_item1.task_list_category,"activityList":$scope.check_list_item1.task_list},
                }).then(function successCallback(res) {
                    $scope.checkList = res.data;
                }, function errorCallback(response) {
                    
                });
            }
            $scope.resetButton = () =>{
                $scope.getFreshCheckListData();
                $scope.check_list_item1 = {};
                
            }
            $scope.getFreshCheckListData();

            $scope.toggleModalForm = (modalstate, id) => {
                $scope.modalstate = modalstate;
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Check List";
                        $scope.form_color = "primary";
                        $scope.check_list_item = {};
                        $('#checklist-form-popup').modal('show');
                        break;
                    case 'edit':
                        $scope.form_title = "Edit Check List";
                        $scope.form_color = "success";
                        $scope.id = id;
                        $scope.check_list_item = {};
                        
                        $http.get(`${API_URL}check-list-master/${id}`).then(function (response) {
                            $scope.check_list_item = response.data.data;
                            $('#checklist-form-popup').modal('show');
                        });
                        break;
                    
                    default:
                        break;
                } 
            }

            $scope.storeModalForm = (modalstate, id) => {
                // console.log($.param($scope.check_list_item));
                // return false;
                $http({
                    method: `${modalstate == 'edit' ? 'PUT' : 'POST'}`,
                    url: `${API_URL}check-list-master${modalstate == 'edit' ? '/'+id : ''}`,
                    data:$.param($scope.check_list_item),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function successCallback(response) {
                    $('#checklist-form-popup').modal('hide');
                    $scope.check_list_item1 = {};
                    Message('success',response.data.msg);
                    $scope.getFreshCheckListData();
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }

            $scope.changeCheckListStatus = (id , params) =>{
                $http({
                    method: "put",
                    url: `${API_URL}check-list-master/${id}`,
                    data: $.param({'is_active':params == 1 ? 0 : 1}),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function (response) {
                    $scope.getFreshCheckListData();
                    Message('success',response.data.msg);
                }), (function (error) {
                    console.log(error);
                });
            }

            $scope.deleteThisData   =   (id) => {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if(willDelete) {
                        $http.delete(`${API_URL}check-list-master/${id}`).then(function (response) {
                            $scope.getFreshCheckListData();
                            Message('success',response.data.msg);
                        }); 
                    }
                });
            }
            });
    </script>
@endpush