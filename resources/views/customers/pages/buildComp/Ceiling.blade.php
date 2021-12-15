<button class="btn btn-info float-end mb-2" ng-click="add()"><i class="fa fa-plus"></i> Add Floor</button>
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
    <tr ng-repeat="(fIndex,profile) in Profiles">
        <td>
            <input class="form-control" type="text" ng-model="profile.FloorName" placeholder="Type Here..."/>
            {{-- <span ng-hide="profile.editable">@{{ profile.FloorName }}</span> --}}
        </td>
        <td>
            <input class="form-control" type="number" ng-model="profile.FloorNumber" placeholder="Type Here..."/>
            {{-- <span ng-hide="profile.editable">@{{ profile.FloorNumber }}</span> --}}
        </td>
        <td>
            <input class="form-control" type="text" ng-model="profile.TotalArea"  placeholder="Type Here..." />
            {{-- <span ng-hide="profile.editable">@{{ profile.TotalArea }}</span> --}}
        </td>
        <td  width="20%">
            {{-- <input class="form-control" type="text" ng-model="profile.DeliveryType" /> --}}
            {{-- <span ng-hide="profile.editable">@{{ profile.DeliveryType }}</span> --}}
            <select class="form-control" ng-model="profile.DeliveryType">
                <option value="">-- Choose --</option>
                <option value="Element">Element</option>
                <option value="Precut">Precut</option>
                <option value="Module">Module</option>
                <option value="mix of all">Mix of All</option>
                <option value="Others">Others</option>
            </select>
        </td>
        <td class="text-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Ceilling_wall_model__@{{ fIndex }}"><i class="fa fa-pencil"></i></button>
            <div id="Ceilling_wall_model__@{{ fIndex }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Ceilling_wall_modelLabel__@{{ fIndex }}" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h4 class="modal-title" id="Ceilling_wall_modelLabel__@{{ fIndex }}">Ceilling - @{{ profile.FloorName }}</h4>
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
                                                <input type="text" disabled class="form-control" id="inputEmail3" value="@{{ profile.FloorName }}" >
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputPassword3" class="col-3 col-form-label">Floor Number</label>
                                            <div class="col-9">
                                                <input type="text" disabled class="form-control" id="inputPassword3" value="@{{ profile.FloorNumber }}" >
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row my-3">
                                            <label for="inputEmail3" class="col-3 col-form-label">Total Area </label>
                                            <div class="col-9">
                                                <input type="text" disabled class="form-control" id="inputEmail3" value="@{{ profile.TotalArea }}" >
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputPassword3" class="col-3 col-form-label">Delivery Type</label>
                                            <div class="col-9">
                                                <input type="text" disabled class="form-control" id="inputPassword3" value="@{{ profile.DeliveryType }}" >
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                            </div>

                            {{-- <h1 class="header-title text-start mb-2">Wall Layers Information</h1> --}}
                            <div >
                                <table class="table dt-responsive nowrap m-0" >
                                    <tr class="bg-light">
                                        <th> LayerName </th>
                                        <th> Type </th>
                                        <th> Size</th>
                                        <th><button class="btn btn-primary  btn-sm" ng-click="addLayer(fIndex)"> <i class="fa fa-plus"></i> Add New Layer</button></th>
                                    </tr>
                                    <tbody>
                                        <tr ng-repeat="profile in Profiles" >
                                            <tr ng-repeat="layer in profile.Layers">
                                                <td>
                                                    <select class="form-control" ng-model="layer.LayerName">
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
                                                        <button class="btn btn-outline-danger" ng-click="Subdelete(fIndex, $index)"><div class="fa fa-trash"></div></button>
                                                    </div>
                                                </td> 
                                            </tr>
                                        </tr>
                                    </tbody>
                                    
                                </table>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">cancel</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save & Close</button>
                        </div>
                    </div> 
                </div> 
            </div> 
        </td>
        <td class="text-center">
            {{-- <button class="btn btn-primary" ng-click="edit($index)" ng-hide="profile.editable">Edit</button> --}}
            {{-- <button class="btn btn-success" ng-click="save($index)" ng-show="profile.editable">Save</button> --}}
            <button class="btn btn-danger" ng-click="delete($index)"><i class="fa fa-trash"></i></button>
        </td> 
    </tr>
</tbody>
</table> 