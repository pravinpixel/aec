<div class="card">                              <!-- @{{component_module_get}} -->
    <div class="card-header ">
        <div class="d-flex justify-content-between">
            <h3 class="haeder-title">Layer Type</h3>
            <button class="btn btn-primary " ng-click="toggleLayerType('add', 0)">Create New Layer Type</button>
        </div>
    </div>
    <div class="card-body">
        <table datatable="ng" dt-options="vm.dtOptions" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th >Actions</th>
                </tr>
            </thead>
        
            <tbody>
                <tr ng-repeat="(index,layerType) in layerType_module_get">
                    <td class="align-items-center">@{{ layerType.layer_type_name }}</td>
                    <td>
                        <div>
                            <input type="checkbox" id="switch__@{{ index }}" ng-checked="layerType.is_active == 1" data-switch="primary"/>
                            <label for="switch__@{{index}}" data-on-label="On" ng-click="layerType_status(index,layerType.id)" data-off-label="Off"></label>
                        </div>    
                        <span ng-if="layerType.is_active == 1" class="d-none">1</span>              
                        <span ng-if="layerType.is_active == 0" class="d-none">0</span>           
                    </td>
                    <td  >
                        <div class="btn-group">
                            <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill" ng-click="toggleLayerType('edit', layerType.id)"><i class="fa fa-edit"></i></button>
                            <button class="shadow btn btn-sm btn-outline-secondary rounded-pill  " ng-click="confirmLayerTypeDelete(layerType.id)"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
    <div class="card-fooetr"></div>
</div> 
<div id="primary-layerType-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-@{{form_color}}">
                <h4 class="modal-title" id="@{{form_color}}-header-modalLabel">@{{form_title}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form name="LayerTypeModule" class="form-horizontal" novalidate="">
                    <div class="form-group error mb-2">
                        <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Layer Type Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control has-error" id="layer_type_names" name="layer_type_name" placeholder="Type Here.." ng-model="module_layerType.layer_type_name" ng-required="true" required>
                            <small class="help-inline text-danger">This  Fields is Required</small>
                        </div>
                    </div> 


                    <div class="form-group error mb-2">
                        <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Building Component</label>
                        <div class="col-sm-12">
                            <select  class="form-select"  ng-model="module_layerType.building_component_id" name="building_component_id"    ng-required="true">
                                <option value="" selected>Select</option>  
                                <option value="@{{ emp.id }}"  ng-selected="emp.id == module_layerType.building_component_id" ng-repeat="(index,emp) in component_module_name">@{{ emp.building_component_name }}</option>  
                            </select>
                           
                        </div>
                    </div> 
                    
                    <div class="form-group error mb-2">
                        <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Layer</label>
                        <div class="col-sm-12">
                            <select  class="form-select" aria-label="ngSelected"  ng-model="module_layerType.layer_id" name="layer_id"    ng-required="true">
                                <option value="" selected>Select</option>  
                                <option value="@{{ emp1.id }}" ng-selected="emp1.id == module_layerType.layer_id" ng-repeat="(index,emp1) in layer_module_name">@{{ emp1.layer_name }}</option>  
                            </select>
                            
                        </div>
                    </div> 

                    <!-- <div class="col-md-6 mb-1">
                        <div class="my-2">
                            <label class="form-label" >Job Role<sup class="text-danger">*</sup></label>
                            <select  class="form-select"  ng-model="FormData.epm_job_role" name="epm_job_role"    ng-required="true">
                                <option value="" selected>Select</option>  
                                <option value="@{{ emp.role }}" ng-repeat="(index,emp) in employee_module_role">@{{ emp.role }}</option>  
                            </select>
                            <div class="error-msg">
                                <small class="error-text" ng-if="frm.epm_job_role.$touched && frm.epm_job_role.$error.required">This field is required!</small> 
                            </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-12 pt-3">
                            <div>
                                <div class="form-check form-check-inline form-radio-@{{form_color}}">
                                    <input type="radio"  ng-checked="module_layerType.is_active == 1" id="active" value="1" ng-model="module_layerType.is_active" name="is_active" class="form-check-input"  ng-required="true">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check form-check-inline form-radio-dark">
                                    <input type="radio" ng-checked="module_layerType.is_active == 0" id="Deactive" value="0" ng-model="module_layerType.is_active" name="is_active" class="form-check-input" ng-required="true">
                                    <label class="form-check-label" for="Deactive">Inactive</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="save_layerType(modalstate, id); $event.stopPropagation();" ng-disabled="LayerTypeModule.$invalid">Submit</button>
                    </div>
                </form>
            </div>
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div> 
<style>
    .layerTypeTab{
        color: #727cf5 !important;
        background-color: rgba(114,124,245,.18) !important;
    }
</style>