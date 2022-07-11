<form class="row" id="buildingComponent" name="buildingComponentForm" novalidate>
    
    <div class="alert alert-secondary col-md-6 mx-auto shadow" role="alert">
        <div class="d-flex align-items-center justify-content-center    ">
            <i class="dripicons-information me-2"></i>  
            Do you want to
            <div class="form-check">
                <input type="radio" id="flexRadioDefault1" name="buildingComponent_" ng-checked="showHideBuildingComponent == 0" ng-model="showHideBuildingComponent" ng-value="false">
                <label class="form-check-label" for="flexRadioDefault1">
                Enter Manually   (or)
                </label>
            </div> 
            <div class="form-check">
                <input type="radio" id="flexRadioDefault" ng-checked="showHideBuildingComponent == 1" name="buildingComponent_" ng-model="showHideBuildingComponent" ng-value="true">
                <label class="form-check-label" for="flexRadioDefault">
                Upload  
                </label>
            </div>
        </div>
    </div>
    
   
    <div class="collapse multi-collapse show" id="buildingComponentTab">
        <div ng-show="showHideBuildingComponent == 1"> 
            <div  class="card p-3 mt-3 shadow-sm file-upload-card col-md-5 mx-auto" style="overflow: hidden">
                <div class="progress my-2" ng-show="buildingComponentshowProgress">
                    <div ng-show="buildingComponentshowProgress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-value min="0" aria-valuemax="100" style="width:@{{progress_value}}"> @{{progress_value}} </div>
                </div>
                <div class="d-flex my-2 mx-auto bg-primary shadow justify-content-center align-items-center rounded-circle" style="height: 100px;width:100px">
                    <i class="fa fa-file-text text-white fa-3x"></i>
                </div>
                <input type="file" class="form-control col-lg-8 mx-auto  file-control rounded-pill mb-2" id ="building-component-file" file-model ="building_component_file" required />
                <button ng-click = "uploadBuildingComponentFile()" class=" col-lg-8 mx-auto btn btn-info form-control rounded-pill"> Upload file</button>
            </div> 
            @include('customer.enquiry.table.building-component-upload-list')
        </div>
        <div class="row" ng-show="showHideBuildingComponent == 0">
            <div class="col-sm mb-2 mb-sm-0">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a ng-click="callWall(w.WallName)" ng-repeat="(fIndex,w) in wallGroup" ng-class="{active: wallName ==  w.WallName}" class="border mb-2 nav-link d-flex flex-column align-items-center justify-content-center">
                        <i class="fa-2x @{{ w.WallIcon }}"></i>
                        <div>@{{ w.WallName }}</div>
                    </a>
                </div>
            </div> 
            <div class="col-sm-10">
                <div class="tab-content" > 
                    <div ng-show="wallName ==  w.WallName" get-customer-layer get-template  ng-repeat="(fIndex,w) in wallGroup" ng-class="{show: $index == 0, active: $index == 0}"  >
                        <div class="d-flex justify-content-between align-items-center">
                            <div > <h3> <div> </div></h3> </div>
                            <button class="btn btn-info mb-2 float-end" ng-click="AddWallDetails(fIndex)"><i class="fa fa-plus"></i> Add Wall</button>
                        </div>
                        <div ng-if="!w.Details.length">
                            <div class="text-center pt-5">
                                <h1 class="h4">Please click to add new wall</p>
                                <img src="{{ asset("public/assets/images/bg-emty.png") }}" width="50%">
                            </div>
                        </div>
                    
                        <div ng-repeat="(Secindex,d) in w.Details">  
                            <div class="accordion mb-3 " id="accordionTable_@{{ Secindex }}_@{{ fIndex  }}" >
                                <div class="d-flex justify-content-between">
                                    <div class="btn border d-flex justify-content-center align-items-center" style="border-bottom:0px !important;background:#F1F2FE;border-radius: 10px 10px 0 0; transform:translateY(2px)">
                                        @{{ w.WallName }} - @{{$index + 1}}
                                    </div> 
                                    <div>
                                        <div class="btn-group border shadow-sm mb-2">
                                            <select style="width: unset !important;" class="form-select border-0 f" name="template" ng-change="getTemplate(fIndex, w.WallId, Secindex,template)" ng-model="template">
                                                <option value="">@lang('customer-enquiry.select_template')</option>
                                                <option ng-repeat="Template in Templates" value="@{{ Template.id }}">
                                                    @{{ Template.template_name }}
                                                </option>
                                            </select>
                                            <button ng-click="callTemplateModal(fIndex, w.WallId, Secindex)" class="w-100 btn btn-success btn-sm  border-0" ng-show="d">Save as template</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item shadow-sm  ">
                                    <div class="accordion-header m-0  " style="background:#f1f2fe" id="headingOne">                                                                    
                                        <table class="table  table-bordered m-0  ">
                                            <tr>
                                                <th class="bg-light">
                                                    <div class="form-group"> 
                                                        <label class="form-lable text-dark shadow-sm position-absolute border">@{{ w.WallLabel }}  <sup class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control form-control-sm my-2 mt-3" name="FloorName_@{{ fIndex  }}_@{{  Secindex  }}" ng-model="d.FloorName"  required placeholder="Type here..." required>
                                                        <small class="text-danger" ng-show="buildingComponentForm.FloorName_@{{ fIndex }}_@{{ Secindex }}.$invalid && formSubmit">This field is required</small>
                                                    </div>
                                                </th> 
                                                <th  class="bg-light">
                                                    <div class="form-group">
                                                        <label class="form-lable text-dark shadow-sm position-absolute border">Type of Delivery  <sup class="text-danger">*</sup></label>
                                                        <select class="form-select  form-select-sm my-2 mt-3"  name="DeliveryType_@{{ fIndex }}_@{{ Secindex }}" ng-model="d.DeliveryType" required>
                                                            <option value="">@lang('customer-enquiry.select')</option>
                                                            <option ng-repeat="delivery in deliveryTypes" ng-value="@{{ delivery.id }}" ng-selected="delivery.id == d.DeliveryType">
                                                                @{{ delivery.delivery_type_name }}
                                                            </option>
                                                        </select>
                                                        <small class="text-danger" ng-show="buildingComponentForm.DeliveryType_@{{ fIndex }}_@{{ Secindex }}.$invalid && formSubmit">This field is required</small>
                                                    </div>
                                                </th>
                                                <th  class="bg-light">
                                                    <div class="form-group">
                                                        <label class="form-lable text-dark shadow-sm position-absolute border">Approx Total Area  <sup class="text-danger"></sup></label>
                                                        <input  type="number" min="0" step="0.50" onkeypress="return isNumber(event)" class="form-control form-control-sm my-2  mt-3" name="TotalArea_@{{ fIndex }}_@{{ Secindex }}" ng-model="d.TotalArea">
                                                        <small class="text-danger" ng-show="buildingComponentForm.TotalArea_@{{ fIndex }}_@{{ Secindex }}.$invalid && formSubmit">This field is required</small>
                                                    </div>
                                                </th> 
                                                <th  class="bg-light">
                                                    <div class="btn-group">
                                                        <button class="btn-light shadow-sm border btn more-btn-layer" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneaccordionTable_@{{ Secindex }}_@{{ fIndex  }}" aria-expanded="true" aria-controls="collapseOneaccordionTable_@{{ Secindex }}_@{{ fIndex  }}">
                                                            <i class="fa fa-chevron-down"></i>
                                                        </button>  
                                                        <button  type="button" class="ms-2 btn btn-danger rounded shadow-sm btn-sm" data-bs-toggle="modal" data-bs-target="#ConfirmDeleteWall_@{{ fIndex }}_@{{ Secindex }}"><div class="fa fa-trash " ></div></button>
                                                        <button  type="button" ng-click="addToLocal('wallItem',wallGroup)" class="ms-2 btn btn-info rounded shadow-sm btn-sm">save</div></button>
                                                    </div>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="collapseOneaccordionTable_@{{ Secindex }}_@{{ fIndex  }}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionTable_@{{ Secindex }}_@{{ fIndex  }}">
                                        <div class="accordion-body p-0">
                                            <div class=" rounded ">
                                                <div class="card-header border-0 shadow p-0 ">
                                                    <div class="row m-0 p-3 py-2 align-items-center">
                                                        <div class="col-md-8 p-0">
                                                            <div class="btn-group">
                                                                <span class="me-2 shadow-sm badge badge-secondary-lighten d-flex justify-content-center align-items-center">
                                                                    <img width="25px" src="{{ asset("public/assets/images/icon_wallthickness.png") }}" alt="icon_wallthickness"> 
                                                                    <span> <b class="px-2"> 0.25</b></span>
                                                                </span>
                                                                <span class="me-2 shadow-sm badge badge-danger-lighten d-flex justify-content-center align-items-center">
                                                                    <img width="25px" src="{{ asset("public/assets/images/icon_fire.png") }}" alt="icon_fire">
                                                                    <span> <b class="px-2"> 1.75</b></span>
                                                                </span>
                                                                <span class="me-2 shadow-sm badge badge-info-lighten d-flex justify-content-center align-items-center">
                                                                    <img width="25px" src="{{ asset("public/assets/images/icon_acoustic.png") }}" alt="icon_acoustic">
                                                                    <span> <b class="px-2"> 4.25</b></span>
                                                                </span>
                                                                <span class="me-2 shadow-sm badge badge-warning-lighten d-flex justify-content-center align-items-center">
                                                                    <img width="25px" src="{{ asset("public/assets/images/icon_insulation.png") }}" alt="icon_insulation">
                                                                    <span> <b class="px-2"> 0.75</b></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md p-0">
                                                            <div class="w-100 text-end">
                                                                <div class="d-flex justify-content-end">
                                                                    <button class="btn-sm float-end btn btn-outline-primary me-2" ng-click="AddLayers(fIndex , Secindex)" title="Add New Layer" ><i class="fa fa-plus" ></i> Add Layer</button>
                                                                    {{-- <button ng-click="RemoveDetails(fIndex , Secindex)" class=" btn-danger btn shadow-lg  RemoveDetails" type="button"><i class="fa fa-trash"></i></button> --}}
                                                                    
                                                                    <div id="ConfirmDeleteWall_@{{ fIndex }}_@{{ Secindex }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ConfirmDeleteLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content text-center">
                                                                                <div class="modal-header modal-colored-header bg-danger">
                                                                                    <h4 class="modal-title" id="ConfirmDeleteLabel">Delete Confirmation</h4>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <h2>Are you sure !!</h2>
                                                                                    <p class="lead">You want to delete 
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel & close</button>
                                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" ng-click="removeWall(fIndex, Secindex)">Yes, delete it !</button>
                                                                                </div>
                                                                            </div><!-- /.modal-content -->
                                                                        </div><!-- /.modal-dialog -->
                                                                    </div><!-- /.modal -->
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-4">
                                                    <p class="text-center p-1 bg-light border shadow-sm rounded" ng-if="w.WallTop"> @{{ w.WallTop }}</p>

                                                    <div psi-sortable="" ng-model="d.Layers" id="Layers_Lable">
                                                        <div ng-repeat="(ThreeIndex,l) in d.Layers track by $index"  class="row m-0 justify-content-between mb-2">
                                                            <div class="col p-0">
                                                                <div class="btn-group w-100">
                                                                    <div class="btn btn-light border btn-sm d-flex justify-content-center align-items-center"><i class="mdi mdi-drag"></i></div>
                                                                    <div class="form-group w-100 ">
                                                                        <label class="form-lable shadow-sm position-absolute border" style="background: #FFFFFF">Layer Name  <sup class="text-danger">*</sup></label>
                                                                        <input  type="text" class="form-control form-control-sm" name="LayerName_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}"  ng-model="l.LayerName" required>
                                                                    </div>
                                                                    {{-- <select class="form-select form-select-sm form-control" id="floatingSelect" aria-label="Floating label select example"  name="LayerName_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}"   ng-model="l.LayerName" required>
                                                                                <option value="">@lang('customer-enquiry.select')</option>
                                                                                <option ng-repeat="layer in layers" value="@{{ layer.id}}" ng-selected="layer.id == l.LayerName">
                                                                                    @{{ layer.layer_name }}
                                                                                </option>
                                                                        </select> --}}
                                                                    {{-- <div class="btn btn-light border btn-sm d-flex justify-content-center align-items-center" ng-click="callLayerModal(w.WallId)" title="Add layer name"><i class="fa fa-plus"></i></div> --}}
                                                                </div>
                                                            </div> 
                                                            <div class="col p-0"> 
                                                                <div class="btn-group shadow-sm border rounded">
                                                                    <div class="form-group">
                                                                        <label class="form-lable shadow-sm position-absolute border" style="background: #FFFFFF">Thickness  <sup class="text-danger">*</sup></label>
                                                                        <input  type="number" min="0" step="0.50" onkeypress="return isNumber(event)" class="form-control rounded-0 rounded-start  border-0 form-control-sm" name="Thickness_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}" ng-model="l.Thickness " required >
                                                                        
                                                                    </div>
                                                                    {{-- <small class="text-danger" ng-show="buildingComponentForm.LayerName_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}.$invalid && formSubmit">This field is required</small>
                                                                    <small class="text-danger" ng-show="buildingComponentForm.Thickness_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}.$invalid && formSubmit">This field is required</small>
                                                                    <small class="text-danger" ng-show="buildingComponentForm.Breadth_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}.$invalid && formSubmit">This field is required</small> --}}

                                                                    <span class="input-group-text border-0 rounded-0 px-2 justify-content-center" >.mm</span>
                                                                    <div class="form-group">
                                                                        <label class="form-lable shadow-sm position-absolute border" style="background: #FFFFFF">Breadth  <sup class="text-danger">*</sup></label>
                                                                        <input   type="number" min="0" step="0.50" onkeypress="return isNumber(event)" class="form-control form-control-sm rounded-0 border-0 " name="Breadth_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}" ng-model="l.Breadth" required>
                                                                    
                                                                    </div>
                                                                    
                                                                    <span class="input-group-text rounded-0 border-0 px-2 rounded-end justify-content-center">.mm</span>
                                                                    <button  type="button" class="btn btn-outline-danger rounded shadow-sm btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#ConfirmDelete_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}"><div class="fa fa-trash " ></div></button>
                                                                </div> 
                                                                <div id="ConfirmDelete_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ConfirmDeleteLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header modal-colored-header bg-danger">
                                                                                <h4 class="modal-title" id="ConfirmDeleteLabel">Delete Confirmation</h4>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                            </div>
                                                                            <div class="modal-body text-center">
                                                                                <h2>Are you sure !!</h2>
                                                                                <p class="lead">You want to delete 
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel & close</button>
                                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" ng-click="removeLayer(fIndex, Secindex , ThreeIndex)">Yes, delete it !</button>
                                                                            </div>
                                                                        </div><!-- /.modal-content -->
                                                                    </div><!-- /.modal-dialog -->
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col p-0 mx-1">
                                                                    <small class="text-danger" ng-show="buildingComponentForm.LayerName_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}.$invalid && formSubmit">This field is required</small>
                                                                </div>
                                                                <div class="col p-0">
                                                                    <div class="row">
                                                                        <div class="col p-0 mx-3">
                                                                            <small class="text-danger" ng-show="buildingComponentForm.Thickness_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}.$invalid && formSubmit">This field is required</small>
                                                                        </div>
                                                                        <div class="col p-0">
                                                                            <small class="text-danger" ng-show="buildingComponentForm.Breadth_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}.$invalid && formSubmit">This field is required</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                    <div>
                                                        {{-- <small class="text-danger" ng-show="buildingComponentForm.LayerName_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}.$invalid && formSubmit">This field is required</small>
                                                        <small class="text-danger" ng-show="buildingComponentForm.Thickness_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}.$invalid && formSubmit">This field is required</small>
                                                        <small class="text-danger" ng-show="buildingComponentForm.Breadth_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}.$invalid && formSubmit">This field is required</small> --}}
                                                    </div>
                                                    <p class="text-center p-1 bg-light border shadow-sm rounded" ng-if="w.WallBottom"> @{{ w.WallBottom }}</p>
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
    </div>
    <div class="collapse multi-collapse" id="reviewTab">
        <div class="card card-body mb-0">
            <h5>Building Component Summary</h5> 
            <table class="table table-bordered m-0 table-striped" ng-init="total = 0 ">
                <tbody > 
                    <tr ng-repeat="building_component in wallGroup" ng-show="wallGroup.length">
                        <td class="text-left" width="150px">
                            <b>@{{ building_component.WallName }}</b>
                        </td>
                        <td>
                            <div class="py-2" ng-repeat="detail in building_component.Details">
                                <table class="shadow-sm custom border border-dark mb-0 table table-bordred bg-white">
                                    <thead class="table-secondary text-dark">
                                        <tr>
                                            <th>Floor</th>
                                            <th>Type of Delivery</th>
                                            <th>Total Area </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: left !important">@{{ detail.FloorName }}</td>
                                            <td ng-repeat="delivery_type in deliveryTypes |  filter : { id : detail.DeliveryType  }">@{{ delivery_type.delivery_type_name }}</td>
                                            <td >@{{ detail.TotalArea }}</td>
                                        </tr>
                                    </tbody> 
                                </table>
                                <table class="shadow-sm border table-bordered border-dark table m-0 bg-white">
                                    <thead>
                                        <tr> 
                                            <td><b>Name</b></td>
                                            <td><b>Thickness (mm)</b></td>
                                            <td><b>Breadth (mm)</b></td>
                                        </tr> 
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="layer in detail.Layers">
                                            <td>@{{ layer.LayerName }}</td>
                                            <td>@{{ layer.Thickness }}</td>
                                            <td>@{{ layer.Breadth }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </td>
                    </tr>  
                    <tr ng-show="!wallGroup.length">
                        <td colspan="4"> No data found </td>
                    </tr>
                </tbody>                     
            </table> 
        </div>
    </div>

    <div class="d-flex justify-content-end" ng-init="isOpen = false">
        <a ng-show="showHideBuildingComponent == 0" ng-click="isOpen = !isOpen" class="my-2 mx-3" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="buildingComponentTab reviewTab">
            <u> @{{ isOpen  != true ?  "View Summary" : "Close Summary"  }}</u>
        </a>
        <comment  ng-show="commentShow" data="
            {'modalState':'viewConversations',
            'type': 'building_components', 
            'header':'Building Components',
            'enquiry_id':enquiry_id,
            send_by: {{ Customer()->id }}
            }">
        </comment>
    </div>
    
    
    @include('customer.enquiry.models.add-layer-modal')
    @include('customer.enquiry.models.add-template-modal')
    @include('customer.enquiry.modal')
    <div class="card-footer border-0 p-0 " >
        <ul class="list-inline wizard mb-0 pt-3">
            <li class="previous list-inline-item disabled"><a href="#!/ifc-model-upload" class="btn btn-light border shadow-sm">Prev</a></li>
             <li class="next list-inline-item float-end"><input ng-click="submitBuildingComponent(buildingComponentForm.$invalid)"  ng-show="showHideBuildingComponent == 0" class="btn btn-primary" type="submit" name="submit" value="Next"/></li>
            <li class="next list-inline-item float-end"><input ng-click="submitBuildingComponent(buildingComponentForm.$invalid)"  ng-show="showHideBuildingComponent == 1" ng-disabled="buildingComponentUploads.length == 0" class="btn btn-primary" type="submit" name="submit" value="Next"/></li>
            <li class="next list-inline-item float-end mx-2"><input class="btn btn-light border shadow-sm" g-show="showHideBuildingComponent == 0" ng-click="saveAndSubmitBuildingComponent(buildingComponentForm.$invalid)" type="button" name="submit"  value="Save & Submit Later"/></li>
        </ul>
    </div>
</form>
<style>
    .buildingComponent .timeline-step .inner-circle{
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style>