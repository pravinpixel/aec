
<ul class="nav nav-tabs nav-justified nav-bordered mb-3">
    <li class="nav-item">
        <a href="#services-b2" data-bs-toggle="tab" ng-click="servicesTab()" aria-expanded="true" class="nav-link active">
            <i class="mdi mdi-home-variant d-md-none d-block"></i>
            <span class="d-none d-md-block">Services</span>
        </a>
    </li>
    <li class="nav-item" >
        <a href="#costPreset-b2" ng-click="costPreset()" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
            <i class="mdi mdi-account-circle d-md-none d-block"></i>
            <span class="d-none d-md-block" >Cost Preset</span>
        </a>
    </li>
    <li  class="nav-item" >
    <button class="btn btn-primary" id="costEstimationTab" ng-click="toggleModalForm('add', 0)">Add new</button>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane show active" id="services-b2">
        <div class="card">
            <div class="card-body">
                <table class="table custom table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="(index,woodEstimation) in woodEstimations">
                            <td class="align-items-center">@{{ woodEstimation.name }}</td>
                            <td>
                                <div>
                                    <input type="checkbox" id="switch__@{{ index }}" ng-checked="woodEstimation.is_active == 1" data-switch="primary"/>
                                    <label for="switch__@{{index}}" data-on-label="On" ng-click="changeWoodEstimateStatus(woodEstimation.id, woodEstimation.is_active)" data-off-label="Off"></label>
                                </div>
                                <span ng-if="woodEstimation.is_active == 1" class="d-none">1</span>              
                                <span ng-if="woodEstimation.is_active == 0" class="d-none">0</span>              
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="shadow btn btn-sm me-2 btn-outline-primary l rounded-pill" ng-click="toggleModalForm('edit', woodEstimation.id)"><i class="fa fa-edit"></i></button>
                                    <button class="shadow btn btn-sm btn-outline-secondary rounded-pill  " ng-click="delete(woodEstimation.id)"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-fooetr"></div>
        </div> 
    </div>
    <div id="woodestimate-form-popup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="@{{form_color}}-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-@{{form_color}}">
                    <h4 class="modal-title" id="@{{form_color}}-header-modalLabel">@{{form_title}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form name="LayerModule" class="form-horizontal" novalidate="">
                        <div class="form-group error mb-2">
                            <label for="inputEmail3" class="col-sm-12 text-dark control-label mb-2">Wood Estimate Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error" id="name" name="name" placeholder="Type Here.." ng-model="wood_estimate_item.name" ng-required="true" required>
                                <small class="help-inline text-danger">This  Fields is Required</small>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-12 pt-3">
                                <label for="status" class="col-sm-12  text-dark control-label mb-2">Status</label>
                                <div>
                                    <div class="form-check form-check-inline form-radio-@{{form_color}}">
                                        <input type="radio"  ng-checked="wood_estimate_item.is_active == 1" id="active" value="1" ng-model="wood_estimate_item.is_active" name="is_active" class="form-check-input"  ng-required="true">
                                        <label class="form-check-label" for="active">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline form-radio-dark">
                                        <input type="radio" ng-checked="wood_estimate_item.is_active == 0" id="Deactive" value="0" ng-model="wood_estimate_item.is_active" name="is_active" class="form-check-input" ng-required="true">
                                        <label class="form-check-label" for="Deactive">Inactive</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-@{{form_color}}" id="btn-save" ng-click="storeModalWoodForm(modalstate, id)" ng-disabled="LayerModule.$invalid">Submit</button>
                        </div>
                    </form>
                </div>
               
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div> 
    <div class="tab-pane " id="costPreset-b2">
        <div class="card ">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-around">
                    <div  class="col me-2">
                        <small for="" class="mb-2">Building Component</small>
                        <select name="" class="form-select cl_country" id="ddlCountry">
                        <option value="all">Select</option>    
                        <option ng-repeat="buildingComponent in buildingComponents" value="@{{ buildingComponent.building_component_name}}">
                            @{{ buildingComponent.building_component_name }}
                        </option>
                        </select>
                    </div>
                    <div class="col me-2">
                        <small for="" class="mb-2">Type of Delivery</small>
                        <select name="" id="ddlAge" class="form-select cl_age">
                            <option value="all">Select</option>                    
                            <option ng-repeat="deliveryType in deliveryTypes" value="@{{ deliveryType.delivery_type_name}}">
                                @{{ deliveryType.delivery_type_name }}
                            </option>
                        </select>
                    </div>
                    <div class="cols" >
                        <small for="" class="mb-2" style="opacity:0">Building Type</small>
                        <div>
                            <button class="btn btn-primary" onclick="reset_dropdown()">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table custom custom custom-table table-hover table-s" id="table11" >
                    <thead>
                        <tr>
                            <th style="padding: 0 5px !important"><small>S.No</small> </th>
                            <th style="padding: 0 5px !important"><small>Component</small> </th>
                            <th style="padding: 0 5px !important"><small>Type of Delivery</small> </th>
                            <th style="padding: 0 5px !important"><small>Details Price</small> </th>
                            <th style="padding: 0 5px !important"><small>Details Sum</small> </th>
                            <th style="padding: 0 5px !important"><small>Statistics Price</small> </th>
                            <th style="padding: 0 5px !important"><small>Statistics Sum</small> </th>
                            <th style="padding: 0 5px !important"><small>CAD/CAM Price</small> </th>
                            <th style="padding: 0 5px !important"><small>CAD/CAM Sum</small> </th>
                            <th style="padding: 0 5px !important"><small>Logistics Price</small> </th>
                            <th style="padding: 0 5px !important"><small>Logistics Sum</small> </th>
                            <th style="padding: 0 5px !important"><small>Action</small> </th>
                        </tr>
                    </thead> 
                    <tbody> 
                        <tr class="needs-validations " name="cal_frm"  ng-repeat="calculation in calculations">
                            <td class="text-left wood_estimation_td">
                               @{{ $index + 1}}
                            </td>
                            <td class="text-left wood_estimation_td">
                                <span> @{{  calculation.component }}</span>
                            </td>
                            <td class="wood_estimation_td">
                                <span> @{{  calculation.type }}</span>
                            </td> 
                           <td class="text-left wood_estimation_td">
                                <input class="wood_estimation_td_data" update-master="calculation" min="0" type="number" ng-model="calculation.detail_price" > 
                            </td>
                            <td class="text-left wood_estimation_td">
                                <input class="wood_estimation_td_data" update-master="calculation"  min="0" type="number" ng-model="calculation.detail_sum"> 
                            </td>
                            <td class="text-left wood_estimation_td">
                                <input class="wood_estimation_td_data" update-master="calculation"  min="0" type="number" ng-model="calculation.statistic_price" > 
                            </td>
                            <td class="text-left wood_estimation_td">
                                <input class="wood_estimation_td_data" update-master="calculation"  min="0" type="number" ng-model="calculation.statistic_sum"> 
                            </td>
                            <td class="text-left wood_estimation_td">
                                <input class="wood_estimation_td_data" update-master="calculation"  min="0" type="number" ng-model="calculation.cad_cam_price" > 
                            </td>
                        
                            <td class="text-left wood_estimation_td">
                                <input class="wood_estimation_td_data" update-master="calculation"  min="0" type="number" ng-model="calculation.cad_cam_sum"> 
                            </td>

                            <td class="text-left wood_estimation_td">
                                <input class="wood_estimation_td_data" update-master="calculation"  min="0" type="number" ng-model="calculation.logistic_price"> 
                            </td>

                            <td class="text-left wood_estimation_td">
                                <input class="wood_estimation_td_data" update-master="calculation"  min="0" type="number" ng-model="calculation.logistic_sum"> 
                            </td>

                            <td class="text-left wood_estimation_td">
                                <button ng-show="calculation.status == '1'" class="btn btn-danger" ng-click="deleteCalculation(calculation.id)"><i class="fa fa-refresh"></i></button>
                            </td>
                        </tr> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
</div>



<style>
    .woodEstimateTab{
        color: #163269 !important;
        background-color: #d4e2ff !important;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $("#ddlCountry,#ddlAge").on("change", function () {
          
            var country = $('#ddlCountry').find("option:selected").val();
            var age = $('#ddlAge').find("option:selected").val();
           
            SearchData(country, age)
        });

       
    });
    function reset_dropdown()
        {
            
            $("#ddlCountry")[0].selectedIndex = 0;  
            $("#ddlAge")[0].selectedIndex = 0;  
            $('#table11 tbody tr').show();
    
        }
    function SearchData(selectComponent, selectType) {
      
        if (selectComponent.toUpperCase() == 'ALL' && selectType.toUpperCase() == 'ALL') {
            $('#table11 tbody tr').show();
        } else {
            $('#table11 tbody tr:has(td)').each(function () {
                var component = $.trim($(this).find('td:eq(1)').text());
                var type = $.trim($(this).find('td:eq(2)').text());
                if(selectType == '' && selectComponent == component){
                    $(this).show();
                } else if(selectComponent == '' && selectType == type ){
                    $(this).show();
                }else if (selectComponent.toUpperCase() != 'ALL' && selectType.toUpperCase() != 'ALL') {
                    if (component.toUpperCase() == selectComponent.toUpperCase() && type == selectType) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                } else if ($(this).find('td:eq(0)').text() != '' || $(this).find('td:eq(1)').text() != '') {
                    if (selectComponent != 'all') {
                        if (selectComponent.toUpperCase() == component.toUpperCase()) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    }
                    if (selectType != 'all') {
                        if (selectType == type) {
                            $(this).show();
                        }
                        else {
                            $(this).hide();
                        }
                    }
                }
            });
        }
    }

    
</script>
