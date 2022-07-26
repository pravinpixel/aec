<div class="card">
                                    <!-- @{{component_module_get}} -->
    <div class="card-header ">
        <div class="d-flex justify-content-between">
            <h3 class="haeder-title">Building Component</h3>
            <button class="btn btn-primary " ng-click="toggleComponent('add', 0)">Create New Building Component</button>
        </div>
    </div>
    <div class="card-body">
        <table datatable="ng" dt-options="vm.dtOptions" class="table custom table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th >Order Id</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th >Actions</th>
                </tr>
            </thead>
        
            <tbody>
                <tr ng-repeat="(index,comp) in component_module_get">
                    
                    <td class="align-items-center">@{{ comp.building_component_name }}</td>
                    <td ><span>@{{ comp.order_id }} </span></td>
                    <td ><span style="font-size: 18px">@{{ comp.building_component_icon }} </span></td>
                    <td>
                        <div>
                            <input type="checkbox" id="switch__@{{ index }}" ng-checked="comp.is_active == 1" data-switch="primary"/>
                            <label for="switch__@{{index}}" data-on-label="On" ng-click="component_status(index,comp.id)" data-off-label="Off"></label>
                        </div>  
                        <span ng-if="comp.is_active == 1" class="d-none">1</span>              
                        <span ng-if="comp.is_active == 0" class="d-none">0</span>            
                    </td>
                    <td  >
                        <div class="btn-group">
                            <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill" ng-click="toggleComponent('edit', comp.id)"><i class="fa fa-edit"></i></button>
                            <button class="shadow btn btn-sm btn-outline-secondary rounded-pill  " ng-click="confirmComponentDelete(comp.id)"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                    
                </tr>
                
            </tbody>
        </table>
    </div>
    <div class="card-fooetr"></div>
</div> 
<div id="primary-component-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-@{{form_color}}">
                <h4 class="modal-title" id="@{{form_color}}-header-modalLabel">@{{form_title}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form name="ComponentModule" class="form-horizontal" novalidate="">
                    <div class="form-group error mb-2">
                        <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2"> Building Component Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control has-error" id="building_component_name" name="building_component_name" placeholder="Type Here.." ng-model="module_comp.building_component_name" ng-required="true">
                            <small class="help-inline text-danger">This  Fields is Required</small>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="form-group col error">
                                <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Order Id</label>
                                <div class="col-sm-12 me-2">
                                    <input type="number" class="form-control has-error" id="order_id" name="order_id" placeholder="Type Here.." ng-model="module_comp.order_id" ng-required="true">
                                    <small class="help-inline text-danger" >This  Fields is Required</small>
                                </div>
                        </div> 
                        <div class="form-group col error">
                            <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Menu Icon</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error" id="building_component_icon" name="building_component_icon" placeholder="Type Here.." ng-model="module_comp.building_component_icon" ng-required="true">
                                <small class="help-inline text-danger"  >This  Fields is Required</small>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-12 pt-3">
                            <div>
                                <div class="form-check form-check-inline form-radio-@{{form_color}}">
                                    <input type="radio"  ng-checked="module_comp.is_active == 1" id="active" value="1" ng-model="module_comp.is_active" name="is_active" class="form-check-input"  ng-required="true">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check form-check-inline form-radio-dark">
                                    <input type="radio" ng-checked="module_comp.is_active == 0" id="Deactive" value="0" ng-model="module_comp.is_active" name="is_active" class="form-check-input" ng-required="true">
                                    <label class="form-check-label" for="Deactive">Inactive</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="save_component(modalstate, id); $event.stopPropagation();" ng-disabled="ComponentModule.$invalid">Submit</button>
                    </div>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div> 
<style>
    .componentTab{
        color: #727cf5 !important;
        background-color: rgba(114,124,245,.18) !important;
    }
</style>