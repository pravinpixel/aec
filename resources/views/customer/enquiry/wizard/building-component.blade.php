<form class="row p-3 m-0" id="buildingComponent" name="buildingComponentForm" novalidate>
    <div class="rounded-pill d-flex justify-content-between alert bg-light align-items-center shadow-sm border  col-5 mx-auto" role="alert">
        <div>
            <strong>Do you want to Enter Manually ?</strong>
        </div>
        <div class="d-flex">
            <label for="flexRadioDefault1" class="rounded-pill mx-3 btn btn-sm btn-success border shadow-sm">
                <input class="form-check-input border shadow-sm border-dark" type="radio" id="flexRadioDefault1" name="buildingComponent_" ng-checked="showHideBuildingComponent == 0" ng-model="showHideBuildingComponent" ng-value="false">
                <strong>  Yes </strong>
            </label>
            <label for="flexRadioDefault"  class="rounded-pill  btn btn-sm btn-primary border shadow-sm">
                <input class="form-check-input border shadow-sm border-dark" type="radio" id="flexRadioDefault" ng-checked="showHideBuildingComponent == 1" name="buildingComponent_" ng-model="showHideBuildingComponent" ng-value="true">
                <label class="form-check-label" for="flexRadioDefault"> No </label>
            </label>
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
                <input type="file" class="form-control col-lg-8 mx-auto  file-control rounded-pill mb-2" id ="building-component-file"  accept="{{ implode(',',config('global.upload_file_extension')) }}" file-model ="building_component_file" required />
                <button ng-click = "uploadBuildingComponentFile()" class=" col-lg-8 mx-auto btn btn-info form-control rounded-pill"> Upload file</button>
            </div>
            @include('customer.enquiry.table.building-component-upload-list')
        </div>
        <div class="row" ng-show="showHideBuildingComponent == 0">
            <div class="col-sm mb-2 mb-sm-0">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button ng-click="callWall(w.WallName)" ng-repeat="(fIndex,w) in wallGroup" ng-class="{active: wallName ==  w.WallName}" class="border mb-2 nav-link d-flex flex-column align-items-center justify-content-center">
                        <div ng-if="w.WallIcon != null">
                            <img src="{{ asset('/public/uploads/building-component-icon/') }}/@{{w.WallIcon}}" width="60px" class="mb-1">
                        </div>
                        <div ng-if="w.WallIcon == null">
                            <img class="rounded-pill mb-1 border shadow-sm" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS33NUKvo6xLaAcTaCGFggAzBhYYEf7Rn2RzAVr5PB3NZ94VwKxFrAL_8KHjdXJqRbP6U0&usqp=CAU" alt="no image" width="60px">
                        </div>
                        <div class="fw-bold">@{{ w.WallName }}</div>
                    </button>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="tab-content" >
                    <div ng-show="wallName ==  w.WallName" get-customer-layer get-template  ng-repeat="(fIndex,w) in wallGroup" ng-class="{show: $index == 0, active: $index == 0}"  >
                        <div class="text-end" ng-if="w.Details.length"> 
                            <button class="btn btn-success" ng-click="AddWallDetails(fIndex)"><i class="fa fa-plus"></i> Add New @{{  w.WallName }}</button> 
                        </div>
                        <div ng-if="!w.Details.length" class="d-flex justify-content-center align-items-center card card-body p-3 m-0 border shadow-sm" style="min-height: 450px">
                            <div class="text-center">
                                <img src="{{ asset("public/assets/images/bg-emty-2.png") }}" width="75%">
                                <h1 class="h4">Please Click to Add New @{{  w.WallName }}</p>
                                <button class="btn btn-success" ng-click="AddWallDetails(fIndex)"><i class="fa fa-plus"></i> Add New </button> 
                            </div>
                        </div>

                        <div ng-repeat="(Secindex,d) in w.Details track by $index">
                            <div class="accordion mb-3 " id="accordionTable_@{{ Secindex }}_@{{ fIndex  }}" >
                                <div class="d-flex ">
                                    <div class="btn border d-flex justify-content-center align-items-center" style="background:#EBEFF4;border-radius: 10px 10px 0 0; transform:translateY(2px)">
                                        <div class="lead fw-bold  me-2 pe-2 borer-end" style="font-size: 15px !important;color: #4a99f9;">@{{ w.WallName }} - @{{$index + 1}}</div>
                                        <component-template></component-template>
                                        {{-- <div class="btn-group border shadow-sm">
                                            <select title="Set as Template" class="form-select border-0" name="template" ng-change="getTemplate(fIndex, w.WallId, Secindex,template)" ng-model="template">
                                                <option value="">@lang('customer-enquiry.select_template')</option>
                                                <option ng-repeat="Template in Templates" value="@{{ Template.id }}">
                                                    @{{ Template.template_name }}
                                                </option>
                                            </select>
                                            <button title="Create / Save Template" ng-click="callTemplateModal(fIndex, w.WallId, Secindex)" class="btn btn-success btn-sm  border-0" ng-show="d">
                                                <i class="mdi mdi-plus-box-multiple"></i>
                                            </button>
                                            <button title="Overwrite Template" overwrite-template="{
                                                building_component_id: w.WallId,
                                                index_position: fIndex,
                                                detail_position: Secindex,
                                                template: template
                                            }" class="btn btn-primary  btn-sm  border-0" ng-show="d"><i class="mdi mdi-pencil"></i></button>
                                            <button title="Delete Template" delete-template="{
                                                building_component_id: w.WallId,
                                                index_position: fIndex,
                                                detail_position:  Secindex,
                                                template: template
                                            }" class="btn btn-danger btn-sm  border-0" ng-show="d"><i class="mdi mdi-trash-can"></i></button>
                                        </div> --}}
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
                                                        <button  type="button" class="ms-2 btn btn-danger rounded shadow-sm btn-sm" title="Delete Wall" data-bs-toggle="modal" data-bs-target="#ConfirmDeleteWall_@{{ fIndex }}_@{{ Secindex }}"><div class="fa fa-trash " ></div></button>
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
                                                                        <input  type="text" class="form-control form-control-sm " autocomplete="off" name="LayerName_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}"  ng-model="l.LayerName" required>
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
                                                    <div class="text-end">
                                                        <small ng-if="d.LastAction">
                                                            <b>last update</b> - 
                                                            <small >
                                                                @{{ d.LastAction }}
                                                            </small>
                                                        </small>
                                                        <small></small>
                                                        <button type="button" ng-if="d.LastAction" ng-click="saveToLocal()" class="ms-2 btn btn-primary rounded shadow-sm btn-sm"><i class="fa fa-save me-1"></i> Save</button>
                                                        <button type="button" ng-if="!d.LastAction" onclick="getTimeStamp(this)" ng-click="saveToLocal()" class="ms-2 btn btn-primary rounded shadow-sm btn-sm"><i class="fa fa-save me-1"></i> Save</button>
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
                                            <td width="20%">@{{ layer.LayerName }}</td>
                                            <td width="40%">@{{ layer.Thickness }}</td>
                                            <td width="40%">@{{ layer.Breadth }} </td>
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
    <div class="row m-0 justify-content-end mt-2">
        <div class="col-md-3" ng-show="showHideBuildingComponent == 0 && !buildingComponentForm.$invalid">
            <div class="card border shadow-sm mb-0">
                <div class="card-header bg-light"><strong>BUILDING SUMMARY</strong></div>
                <div class="card-body text-center">
                    <button ng-class="isOpen  != true ?  'w-100 btn-sm rounded-pill btn btn-info' : 'w-100 btn-sm rounded-pill btn btn-light border shadow-sm'" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="buildingComponentTab reviewTab"  ng-click="isOpen = !isOpen"> 
                      <i ng-class='isOpen  != true ?  "fa fa-eye" : "fa fa-eye-slash"'></i>  @{{ isOpen  != true ?  "View" : "Close"  }}
                    </button> 
                </div>
            </div>  
        </div> 
        <div class="col-md-4"  ng-show="commentShow">
            <div class="card border shadow-sm mb-0">
                <div class="card-header bg-light"><strong>CHAT BOX</strong></div>
                <div class="card-body">
                    <x-chat-box 
                        :status="1" 
                        moduleId="{{ session('enquiry_id') }}" 
                        moduleName="enquiry"
                        menuName="{{ __('app.Building_Components') }}"
                    />
                </div>
            </div>  
        </div> 
    </div>

    @include('customer.enquiry.models.add-layer-modal')
    @include('customer.enquiry.models.add-template-modal')
    @include('customer.enquiry.modal')
    <div class="card-footer p-3">
        <ul class="list-inline wizard m-0">
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
