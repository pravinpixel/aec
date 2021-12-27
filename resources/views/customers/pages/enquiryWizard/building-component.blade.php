<div class="row" id="buildingComponent">
    <div class="col-sm mb-2 mb-sm-0">
        <div class="nav flex-column nav-pills shadow-sm rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a ng-repeat="(fIndex,w) in wallGroup" ng-class="{active: $index == 0}" ng-class="{show: $index == 0}" class="nav-link d-flex flex-column align-items-center justify-content-center" id="v-pills-tab_wall_@{{ fIndex }}" data-bs-toggle="pill" href="#v-pills-profile_wall_@{{ fIndex }}" role="tab" aria-controls="v-pills-profile_wall_@{{ fIndex }}"
                aria-selected="false">
                <i class="fa-2x @{{ w.WallIcon }}"></i>
                <div>@{{ w.WallName }}</div>
            </a>
        </div>
    </div> 

    <div class="col-sm-10">
        <div class="tab-content" id="v-pills-tabContent">


            <div class="tab-pane fade " ng-repeat="(fIndex,w) in wallGroup" ng-class="{show: $index == 0, active: $index == 0}" id="v-pills-profile_wall_@{{ fIndex }}" role="tabpanel" aria-labelledby="v-pills-profile-tab_wall_@{{ fIndex }}">

                <div class="d-flex justify-content-between align-items-center">
                    <div > <h3> <div> </div></h3> </div>
                    <button class="btn btn-info mb-2 float-end" ng-click="AddWallDetails(fIndex)"><i class="fa fa-plus"></i> Add Wall</button>
                </div>

                <div ng-repeat="(Secindex,d) in w.Details">    
                                                                       
                    <div class="accordion mb-3 " id="accordionTable_@{{ Secindex }}_@{{ fIndex  }}" >
                     
                       <div class="btn border" style="border-bottom:0px !important;background:#F1F2FE;border-radius: 10px 10px 0 0; transform:translateY(2px)">@{{ w.WallName }} 1.@{{$index + 1}}</div>
                       {{-- <button class="btn btn-info float-end"  ng-click="AddWallDetails(fIndex)"><i class="fa fa-plus"></i> Add Floor</button> --}}
                        <div class="accordion-item shadow-sm  ">
                            
                            <div class="accordion-header m-0  " style="background:#f1f2fe" id="headingOne">                                                                    
                                <table class="table table-bordered m-0  ">
                                    <tr>
                                        <th class="bg-light">
                                            <div class="form-group">
                                                <label class="form-lable text-dark shadow-sm position-absolute border">Floor</label>
                                                <input type="text" class="form-control form-control-sm my-2 mt-3" placeholder="Type here...">
                                            </div>
                                        </th>
                                        <th  class="bg-light">
                                            <div class="form-group">
                                                <label class="form-lable text-dark shadow-sm position-absolute border">EXD wall Number</label>
                                                <input type="text" class="form-control form-control-sm my-2  mt-3" placeholder="Type here...">
                                            </div>
                                        </th>
                                        <th  class="bg-light">
                                            <div class="form-group">
                                                <label class="form-lable text-dark shadow-sm position-absolute border">Delivery type</label>
                                                <select class="form-select  form-select-sm my-2 mt-3">
                                                    <option selected >-- Choose --</option>
                                                    <option value="Element">Element</option>
                                                    <option value="Precut">Precut</option>
                                                    <option value="Module">Module</option>
                                                    <option value="mix of all">Mix of All</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </th>
                                        <th  class="bg-light">
                                            <div class="form-group">
                                                <label class="form-lable text-dark shadow-sm position-absolute border">Approx Total Area</label>
                                                <input type="number" class="form-control form-control-sm my-2  mt-3" >
                                            </div>
                                        </th> 
                                        <th  class="bg-light">
                                            <div class="btn-group">
                                                <button class="btn-primary btn more-btn-layer" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneaccordionTable_@{{ Secindex }}_@{{ fIndex  }}" aria-expanded="true" aria-controls="collapseOneaccordionTable_@{{ Secindex }}_@{{ fIndex  }}">
                                                    <i class="fa fa-chevron-down"></i>
                                                </button>
                                                
                                                {{-- <span  class="position-absolute wall-delete-btn  badge bg-danger">
                                                    <i class="fa fa-trash"></i>
                                                </span>  --}}
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
                                                            <button ng-click="RemoveDetails(fIndex , Secindex)" class=" btn-danger btn shadow-lg  RemoveDetails" type="button"><i class="fa fa-trash"></i></button>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-4">
                                            <table class="table table-borderless m-0 " > 
                                                <tbody>
                                                    <tr ng-repeat="(ThreeIndex,l) in d.Layers">
                                                        <td>
                                                            <div class="form-group shadow-sm">
                                                                <label class="form-lable shadow-sm position-absolute border" style="background: #FFFFFF">Layer Name</label>
                                                                <select class="form-select  form-select-sm" ng-model="layer.LayerName">
                                                                    <option value="">-- Choose --</option>
                                                                    <option value="1">External Cladding</option>
                                                                    <option value="2">Horizontal Nailers</option>
                                                                    <option value="3">Vertical Nailers</option>
                                                                    <option value="4">External Insulation</option>
                                                                    <option value="5">Wind Barrier</option>
                                                                    <option value="7">Planking</option>
                                                                    <option value="9">Construction</option>
                                                                    <option value="10">Insulation</option>
                                                                    <option value="12">Planking</option>
                                                                    <option value="14">Vapour Barrier</option>
                                                                    <option value="17">Insulation</option>
                                                                    <option value="18">Internal Planking</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td> 
                                                            <div class="form-group shadow-sm">
                                                                <label class="form-lable shadow-sm position-absolute border" style="background: #FFFFFF">Layer Type</label>
                                                                <select class="form-select  form-select-sm" ng-model="layer.Type">
                                                                    <option value="">-- Choose --</option>
                                                                    <option value="1">External Cladding</option>
                                                                    <option value="2">Horizontal Nailers</option>
                                                                    <option value="3">Vertical Nailers</option>
                                                                    <option value="4">External Insulation</option>
                                                                    <option value="5">Wind Barrier</option>
                                                                    <option value="7">Planking</option>
                                                                    <option value="9">Construction</option>
                                                                    <option value="10">Insulation</option>
                                                                    <option value="12">Planking</option>
                                                                    <option value="14">Vapour Barrier</option>
                                                                    <option value="17">Insulation</option>
                                                                    <option value="18">Internal Planking</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td width="35%"> 
                                                            <div class="btn-group shadow-sm border rounded">
                                                                <div class="form-group">
                                                                    <label class="form-lable badge-secondary-lighten shadow-sm position-absolute border" style="background: #FFFFFF">Thickness </label>
                                                                    <input type="number" class="form-control rounded-0 rounded-start  border-0 form-control-sm" ng-model="layer.Thickness " >
                                                                </div>
                                                                <span class="input-group-text border-0 rounded-0 px-2 justify-content-center" >x</span>
                                                                <div class="form-group">
                                                                    <label class="form-lable shadow-sm position-absolute border" style="background: #FFFFFF">Breadth</label>
                                                                    <input type="number" class="form-control form-control-sm rounded-0 border-0 " ng-model="layer.Breadth" >
                                                                </div>
                                                                <span class="input-group-text rounded-0 border-0 px-2 rounded-end justify-content-center">.mm</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <!-- Danger Header Modal -->
                                                                <button  type="button" class="btn btn-outline-danger rounded shadow-sm btn-sm" data-bs-toggle="modal" data-bs-target="#ConfirmDelete_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}"><div class="fa fa-trash " ></div></button>
                                                                <div id="ConfirmDelete_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ConfirmDeleteLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header modal-colored-header bg-danger">
                                                                                <h4 class="modal-title" id="ConfirmDeleteLabel">Alert Message</h4>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <h2>Delete</h2>
                                                                                <p class="lead">Are you sure you want to delete this  layer ?</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel & close</button>
                                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" ng-click="removeLayer(fIndex, Secindex , ThreeIndex)">Yes, delete it !</button>
                                                                            </div>
                                                                        </div><!-- /.modal-content -->
                                                                    </div><!-- /.modal-dialog -->
                                                                </div><!-- /.modal -->
                                                            </div>
                                                        </td> 
                                                    </tr>
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                {{-- <div >
                    <h3>@{{ w.WallName }}</h3>
                    <button class="btn btn-info float-end mb-2 "  ng-click="AddWallDetails(fIndex)"><i class="fa fa-plus"></i> Add Floor</button>
                    <table class="table table-bordered ">
                        <thead class="badge-primary-lighten">
                            <tr>
                                <th>FloorName</th>
                                <th>Floor Number	</th>
                                <th>Total Area	</th>
                                <th>Delivery Type</th> 
                                <th>Layers</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="(Secindex,d) in w.Details">
                                <td>
                                    <input class="form-control" type="text" ng-model="d.FloorName" placeholder="Type Here..."/>
                                </td>
                                <td>
                                    <input class="form-control" type="number" ng-model="d.FloorNumber" placeholder="Type Here..."/>
                                </td>
                                <td>
                                    <input class="form-control" type="text" ng-model="d.TotalArea"  placeholder="Type Here..." />
                                </td>
                                <td  width="20%">
                                    <select class="form-select" ng-model="d.DeliveryType">
                                        <option value="">-- Choose --</option>
                                        <option value="Element">Element</option>
                                        <option value="Precut">Precut</option>
                                        <option value="Module">Module</option>
                                        <option value="mix of all">Mix of All</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#primary-header-modal__@{{ Secindex }}_@{{ fIndex  }}"><i class="fa fa-plus"></i></button>
                                    <div id="primary-header-modal__@{{ Secindex }}_@{{ fIndex  }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel__@{{ Secindex }}_@{{ fIndex  }}" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header modal-colored-header bg-primary">
                                                    <h4 class="modal-title" id="primary-header-modalLabel__@{{ Secindex }}_@{{ fIndex  }}"> @{{ d.FloorName }}</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row m-0 mb-2">
                                                        <div class="col-sm-3 shadow-lg border p-2 x-y-center">
                                                            <i style="font-size: 35px" class="mdi mdi-ear-hearing-off   text-primary me-2" aria-hidden="true"></i>
                                                            <div id="count"><span class="badge badge-primary-lighten rounded-pill">1.35</span></div>
                                                        </div>
                                                        <div class="col-sm-3 shadow-sm border p-2 x-y-center">
                                                            <i style="font-size: 35px" class="fa  fa-snowflake-o   text-info  me-2" aria-hidden="true"></i>
                                                            <div id="count"><span class="badge badge-info-lighten rounded-pill">0.5</span></div>
                                                        </div>
                                                        <div class="col-sm-3 shadow-lg border p-2 x-y-center">
                                                            <i style="font-size: 40px" class="mdi mdi-fire  text-danger  me-2" aria-hidden="true"></i>
                                                            <div id="count"><span class="badge badge-danger-lighten rounded-pill">0.45</span></div>
                                                        </div>
                                                        <div class="col-sm-3 shadow-sm border p-2 x-y-center">
                                                            <i style="font-size: 35px" class="fa fa-thermometer-half   text-warning  me-2" aria-hidden="true"></i>
                                                            <div id="count"><span class="badge badge-warning-lighten rounded-pill">2.05</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-horizontal">
                                                        <div class="row m-0 text-start">
                                                            <div class="col-md-6">
                                                                <div class="row my-3">
                                                                    <label for="inputEmail3" class="col-3 col-form-label">Floor Name</label>
                                                                    <div class="col-9">
                                                                        <input type="text" disabled class="form-control" id="inputEmail3" value="@{{ d.FloorName }}" >
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="inputPassword3" class="col-3 col-form-label">Floor Number</label>
                                                                    <div class="col-9">
                                                                        <input type="text" disabled class="form-control" id="inputPassword3" value="@{{ d.FloorNumber }}" >
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="row my-3">
                                                                    <label for="inputEmail3" class="col-3 col-form-label">Total Area </label>
                                                                    <div class="col-9">
                                                                        <input type="text" disabled class="form-control" id="inputEmail3" value="@{{ d.TotalArea }}" >
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="inputPassword3" class="col-3 col-form-label">Delivery Type</label>
                                                                    <div class="col-9">
                                                                        <input type="text" disabled class="form-control" id="inputPassword3" value="@{{ d.DeliveryType }}" >
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div >
                                                        <table class="table dt-responsive nowrap m-0" >
                                                            <tr class="bg-light">
                                                                <th> LayerName </th>
                                                                <th> Type </th>
                                                                <th> Size</th>
                                                                <th><button class="btn btn-primary  btn-sm" ng-click="AddLayers(fIndex , Secindex)"> <i class="fa fa-plus"></i> Add New Layer</button></th>
                                                            </tr>
                                                            <tbody>
                                                                <tr ng-repeat="(ThreeIndex,l) in d.Layers">
                                                                    <td>
                                                                        <select class="form-select" ng-model="layer.LayerName">
                                                                            <option value="">-- Choose --</option>
                                                                            <option value="1">External Cladding</option>
                                                                            <option value="2">Horizontal Nailers</option>
                                                                            <option value="3">Vertical Nailers</option>
                                                                            <option value="4">External Insulation</option>
                                                                            <option value="5">Wind Barrier</option>
                                                                            <option value="7">Planking</option>
                                                                            <option value="9">Construction</option>
                                                                            <option value="10">Insulation</option>
                                                                            <option value="12">Planking</option>
                                                                            <option value="14">Vapour Barrier</option>
                                                                            <option value="17">Insulation</option>
                                                                            <option value="18">Internal Planking</option>
                                                                        </select>
                                                                    </td>
                                                                    <td> 
                                                                        <input class="form-control" type="text" ng-model="layer.Type" placeholder="Type Here..."  />
                                                                    </td>
                                                                    <td> 
                                                                        <input class="form-control" type="text" ng-model="layer.Size" placeholder="Type Here..." />
                                                                    </td>
                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <button class="btn btn-outline-danger" ng-click="removeLayer(fIndex, Secindex , ThreeIndex)"><div class="fa fa-trash"></div></button>
                                                                        </div>
                                                                    </td> 
                                                                </tr>
                                                            </tbody>
                                                            
                                                        </table>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save & Close</button>
                                                </div>
                                            </div> 
                                        </div> 
                                    </div> 
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-danger" ng-click="RemoveDetails(fIndex , Secindex)"><i class="fa fa-trash"></i></button>
                                </td> 
                            </tr>
                        </tbody>
                    </table> 
                </div> --}}
            </div> 
        </div> 
    </div> 
</div> 
