<div class="card">                              <!-- @{{component_module_get}} -->
    <div class="card-header ">
        <div class="d-flex justify-content-between">
            <h3 class="haeder-title">Project Type</h3>
            <button class="btn btn-primary " ng-click="togglepType('add', 0)">Create New Project Type</button>
        </div>
    </div>
    <div class="card-body">
        <table datatable="ng" dt-options="vm.dtOptions" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
        
            <tbody>
                <tr ng-repeat="(index,pType) in pType_module_get">
                    
                    <td class="align-items-center">@{{ pType.project_type_name }}</td>

                    <td>
                        <div>
                            <input type="checkbox" id="switch__@{{ index }}" ng-checked="pType.is_active == 1" data-switch="primary"/>
                            <label for="switch__@{{index}}" data-on-label="On" ng-click="pType_status(index,pType.id)" data-off-label="Off"></label>
                        </div>              
                    </td>
                    <td class="text-center" >
                        <div class="btn-group">
                            <button class="shadow btn btn-sm mx-2 btn-outline-primary l rounded-pill" ng-click="togglepType('edit', pType.id)"><i class="fa fa-edit"></i></button>
                            <button class="shadow btn btn-sm btn-outline-secondary rounded-pill  " ng-click="confirmpTypeDelete(pType.id)"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                    
                </tr>
                
            </tbody>
        </table>
    </div>
    <div class="card-fooetr"></div>
</div> 
<div id="primary-pType-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-@{{form_color}}">
                <h4 class="modal-title" id="@{{form_color}}-header-modalLabel">@{{form_title}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form name="pTypeModule" class="form-horizontal" novalidate="">
                    <div class="form-group error mb-2">
                        <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Project Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control has-error" id="project_type_name" name="project_type_name" placeholder="Type Here.." ng-model="module_pType.project_type_name" ng-required="true" required>
                            <small class="help-inline text-danger">This  Fields is Required</small>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-12 pt-3">
                            <div>
                                <div class="form-check form-check-inline form-radio-@{{form_color}}">
                                    <input type="radio"  ng-checked="module_pType.is_active == 1" id="active" value="1" ng-model="module_pType.is_active" name="is_active" class="form-check-input"  ng-required="true">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check form-check-inline form-radio-dark">
                                    <input type="radio" ng-checked="module_pType.is_active == 0" id="Deactive" value="0" ng-model="module_pType.is_active" name="is_active" class="form-check-input" ng-required="true">
                                    <label class="form-check-label" for="Deactive">Deactive</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="save_pType(modalstate, id); $event.stopPropagation();" ng-disabled="module_pType.$invalid">Submit</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div> 