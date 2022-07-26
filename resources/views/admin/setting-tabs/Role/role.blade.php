
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
            <h3 class="haeder-title">Role</h3>
            <button class="btn btn-primary " ng-click="toggleRole('add', 0)">Create New Role</button>
        </div>
    </div>
    <div class="card-body">
        <table dt-options="vm.dtOptions" class="table custom table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th >Actions</th>
                </tr>
            </thead>
        
            <tbody>
                <tr ng-repeat="(index,m) in role_module_get track by m.id">
                    
                    <td class="align-items-center">@{{ m.name }}</td>

                    <td>
                        <div>
                            <input type="checkbox" id="switch__@{{ index }}" ng-checked="m.status == 1" data-switch="primary"/>
                            
                            <label for="switch__@{{index}}" data-on-label="On" ng-click="checkItRole(index, m.id)" data-off-label="Off"></label>
                        </div>
                        <span ng-if="m.status == 1" class="d-none">1</span>              
                        <span ng-if="m.status == 0" class="d-none">0</span>              
                    </td>
                    <td  >
                        <div class="btn-group">
                            <a href="#!/permission/@{{m.id}}"" class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill"><i class="fa fa-gear"></i></a>
                            <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill" ng-click="toggleRole('edit', m.id)"><i class="fa fa-edit"></i></button>
                            <button class="shadow btn btn-sm btn-outline-secondary rounded-pill  " ng-click="confirmRoleDelete(m.id)"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                    
                </tr>
                
            </tbody>
        </table>
    </div>
    <div class="card-fooetr"></div>
</div> 
<div id="primary-role-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-@{{form_color}}">
                <h4 class="modal-title" id="@{{form_color}}-header-modalLabel">@{{form_title}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form name="RoleModule" ng-submit="module_role.$valid" class="form-horizontal" novalidate="">
                    <div class="form-group error mb-2">
                        <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Role Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control has-error" id="name" name="name" placeholder="Type Here.." ng-model="module_role.name" ng-required="true" required>
                            <small class="help-inline text-danger">This  Fields is Required</small>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-12 pt-3">
                            <label for="status" class="col-sm-12  text-dark control-label mb-2">Status</label>
                            <div>
                                <div class="form-check form-check-inline form-radio-@{{form_color}}">
                                    <input type="radio"  ng-checked="module.status == 1" id="active" value="1" ng-model="module_role.status" name="status" class="form-check-input"  ng-required="true">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check form-check-inline form-radio-dark">
                                    <input type="radio" ng-checked="module.status == 0" id="Deactive" value="0" ng-model="module_role.status" name="status" class="form-check-input" ng-required="true">
                                    <label class="form-check-label" for="Deactive">Inactive</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="save_role(modalstate, id); $event.stopPropagation();" ng-disabled="RoleModule.$invalid">Submit</button>
                    </div>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<style>
    .roleTab{
        color: #163269 !important;
        background-color: #d4e2ff !important;
    }
</style>