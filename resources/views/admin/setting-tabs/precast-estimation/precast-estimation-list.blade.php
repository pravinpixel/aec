<ul class="nav nav-tabs nav-justified nav-bordered mb-3">
    <li class="nav-item">
        <a href="#services-b2"  ng-click="precostEstimationService()" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
            <i class="mdi mdi-home-variant d-md-none d-block"></i>
            <span class="d-none d-md-block">Services</span>
        </a>
    </li>
    <li class="nav-item" >
        <a href="#costPreset-b2" ng-click="precostEstimation()" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
            <i class="mdi mdi-account-circle d-md-none d-block"></i>
            <span class="d-none d-md-block" >Cost Preset</span>
        </a>
    </li>
   <li  class="nav-item">
    <button class="btn btn-primary" id="preCostEstimationTab" ng-click="toggleModalForm('add', 0)">Add new</button>
   </li>
</ul>

<div class="tab-content">
    <div class="tab-pane show active" id="services-b2">
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
            <h3 class="haeder-title">Precast Estimation</h3>
            {{-- <button class="btn btn-primary " ng-click="toggleModalForm('add', 0)">Add new</button> --}}
        </div>
    </div>
    <div class="card-body">
        <table class="table custom table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    {{-- <th>Hours</th> --}}
                    <th>Status</th>
                    <th >Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="(index,precastEstimation) in precastEstimations">
                    <td class="align-items-center">@{{ precastEstimation.name }}</td>
                    {{-- <td class="align-items-center">@{{ precastEstimation.hours }}</td> --}}
                    <td>
                        <div>
                            <input type="checkbox" id="switch__@{{ index }}" ng-checked="precastEstimation.is_active == 1" data-switch="primary"/>
                            <label for="switch__@{{index}}" data-on-label="On" ng-click="changeprecastEstimateStatus(precastEstimation.id, precastEstimation.is_active)" data-off-label="Off"></label>
                        </div>
                        <span ng-if="precastEstimation.is_active == 1" class="d-none">1</span>              
                        <span ng-if="precastEstimation.is_active == 0" class="d-none">0</span>              
                    </td>
                    <td>
                        <div class="btn-group">
                            <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill" ng-click="toggleModalForm('edit', precastEstimation.id)"><i class="fa fa-edit"></i></button>
                            <button class="shadow btn btn-sm btn-outline-secondary rounded-pill  " ng-click="delete(precastEstimation.id)"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-fooetr"></div>
</div> 


    </div>
    <div class="tab-pane " id="costPreset-b2">
        
        <div class="card">
            <div class="card-header ">
                <div class="d-flex justify-content-between">
                    <h3 class="haeder-title">Precast Estimation</h3>
                </div>
            </div>
            <div class="card-body">
                <table class="table custom table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Hours</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="(index,precastEstimation) in precastEstimations">
                            <td class="align-items-center">@{{ precastEstimation.name }}</td>
                            <td class="align-items-center">@{{ precastEstimation.hours }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-fooetr"></div>
        </div>
        
    </div>
</div>

<div id="precastestimate-form-popup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
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
                        <div class="col-sm-12">
                            <input type="text" class="form-control has-error" id="name" name="name" placeholder="Type Here.." ng-model="precast_estimate_item.name" ng-required="true" required>
                            <small class="help-inline text-danger">This  Fields is Required</small>
                        </div>
                    </div> 
                    <div class="form-group error mb-2">
                        <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Hours</label>
                        <div class="col-sm-12">
                            <input type="text" onkeypress="" class="form-control has-error" id="name" name="name" placeholder="Type Here.." ng-model="precast_estimate_item.hours" ng-required="true" required>
                            <small class="help-inline text-danger">This  Fields is Required</small>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-12 pt-3">
                            <label for="status" class="col-sm-12  text-dark control-label mb-2">Status</label>
                            <div>
                                <div class="form-check form-check-inline form-radio-@{{form_color}}">
                                    <input type="radio"  ng-checked="precast_estimate_item.is_active == 1" id="active" value="1" ng-model="precast_estimate_item.is_active" name="is_active" class="form-check-input"  ng-required="true">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check form-check-inline form-radio-dark">
                                    <input type="radio" ng-checked="precast_estimate_item.is_active == 0" id="Deactive" value="0" ng-model="precast_estimate_item.is_active" name="is_active" class="form-check-input" ng-required="true">
                                    <label class="form-check-label" for="Deactive">Inactive</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="storeModalprecastForm(modalstate, id)" ng-disabled="LayerModule.$invalid">Submit</button>
                    </div>
                </form>
            </div>
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div> 
<style>
    .precastEstimateTab{
        color: #163269 !important;
        background-color: #d4e2ff !important;
    }
</style>