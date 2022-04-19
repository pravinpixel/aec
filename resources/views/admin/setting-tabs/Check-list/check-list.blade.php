
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
            <h3 class="haeder-title">Check List</h3>
            <button class="btn btn-primary " ng-click="toggleModalForm('add', 0)">Create Check List</button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered" datatable="ng" dt-options="vm.dtOptions">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Task list group</th>
                    <th>Task list</th>
                    <th>Status</th>
                    <th >Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="(index,checkListitem) in checkList">
                    <td class="align-items-center"><small class="text-black">@{{ checkListitem.name }}</small></td>
                    <td class="align-items-center"><small class="text-black">@{{ checkListitem.task_list }}</small></td>
                    <td class="align-items-center"><small class="text-black">@{{ checkListitem.get_task_list.task_list_name }}</small></td>
                    <td>
                        <div>
                            <input type="checkbox" id="switch__@{{ index }}" ng-checked="checkListitem.is_active == 1" data-switch="primary"/>
                            <label for="switch__@{{index}}" data-on-label="On" ng-click="changeCheckListStatus(checkListitem.id, checkListitem.is_active)" data-off-label="Off"></label>
                        </div>
                        <span ng-if="checkListitem.is_active == 1" class="d-none">1</span>              
                        <span ng-if="checkListitem.is_active == 0" class="d-none">0</span>              
                    </td>
                    <td> 
                        <div class="btn-group">
                            <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill" ng-click="toggleModalForm('edit', checkListitem.id)"><i class="fa fa-edit"></i></button>
                            <button class="shadow btn btn-sm btn-outline-secondary rounded-pill  " ng-click="deleteThisData(checkListitem.id)"><i class="fa fa-trash"></i></button>
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
                        <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Name</label>
                        <div class="col">
                            <input type="text" class="form-control has-error" id="name" name="name" placeholder="Type Here.." ng-model="check_list_item.name" ng-required="true" required>
                            <small class="help-inline text-danger">This  Fields is Required</small>
                        </div>
                    </div>
                    <div class="form-group error mb-2">
                        <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Task Group</label>
                        <div class="col">
                            <select ng-model="check_list_item.task_list_category" ng-required="true" class="form-select" required>
                                <option value="">-- select --</option>
                                <option value="@{{ row.id }}" ng-repeat="row in task_list_master">@{{ row.task_list_name }}</option>
                            </select>
                            <small class="help-inline text-danger">This  Fields is Required</small>
                        </div>
                    </div>
                    <div class="form-group error mb-2">
                        <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Task List</label>
                        <div class="col">
                            <input type="text" class="form-control has-error" id="task_list" name="task_list" placeholder="Type Here.." ng-model="check_list_item.task_list" ng-required="true" required>
                            <small class="help-inline text-danger">This  Fields is Required</small>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 pb-3">
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

<style>
    .checkListTab{
        color: #727cf5 !important;
        background-color: rgba(114,124,245,.18) !important;
    }
</style>