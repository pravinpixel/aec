     
@extends('layouts.customer')

@section('customer-content')
         
    
    <div class="content-page" ng-app="App">
        <div class="content">

            @include('customers.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('customers.layouts.page-navigater') 
            </div>                
          
 
            <div class="card border">
                <div class="card-body pt-0 pb-0">
                               
                    <div id="rootwizard" ng-controller="wizard">
                        {{-- <ul class="nav nav-pills nav-justified form-wizard-header bg-light">
                            <li class="nav-item" ng-click="updateWizardStatus(0)" data-target-form="#projectInfoForm">
                                <a href="#first" data-bs-toggle="tab" data-toggle="tab" style="min-height: 40px;" class="d-flex justify-content-center align-items-center nav-link text-center rounded-0 p-0 active">
                                    <i class="uil-angle-double-right me-1"></i>
                                    <span class="d-none d-sm-inline">Project Information</span>
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(1)" data-target-form="#serviceSelection">
                                <a href="#second" data-bs-toggle="tab" data-toggle="tab" style="min-height: 40px;" class="d-flex justify-content-center align-items-center nav-link text-center rounded-0 p-0">
                                    <i class="uil-angle-double-right me-1"></i>
                                    <span class="d-none d-sm-inline">Service Selection</span>
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(2)" data-target-form="#IFCModelUpload">
                                <a href="#four" data-bs-toggle="tab" data-toggle="tab" style="min-height: 40px;" class="d-flex justify-content-center align-items-center nav-link text-center rounded-0 p-0">
                                    <i class="uil-angle-double-right me-1"></i>
                                    <span class="d-none d-sm-inline">IFC Model & Uploads</span>
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(3)"  data-target-form="#buildingComponent">
                                <a href="#five" data-bs-toggle="tab" data-toggle="tab" style="min-height: 40px;" class="d-flex justify-content-center align-items-center nav-link text-center rounded-0 p-0">
                                    <i class="uil-angle-double-right me-1"></i>
                                    <span class="d-none d-sm-inline">Building  Components</span>
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(4)" data-target-form="#additionalInformation">
                                <a href="#six" data-bs-toggle="tab" data-toggle="tab" style="min-height: 40px;" class="d-flex justify-content-center align-items-center nav-link text-center rounded-0 p-0">
                                    <i class="uil-angle-double-right me-1"></i>
                                    <span class="d-none d-sm-inline">Additional Info</span>
                                </a>
                            </li>
                            <li class="nav-item"  ng-click="updateWizardStatus(5)" data-target-form="#reviewSubmit">
                                <a href="#third" data-bs-toggle="tab" data-toggle="tab"style="min-height: 40px;"  class="d-flex justify-content-center align-items-center nav-link text-center rounded-0 p-0">
                                    <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                    <span class="d-none d-sm-inline">Review &  Submit </span>
                                </a>
                            </li>
                        </ul> --}}
                        <ul class="nav nav-pills nav-justified form-wizard-header bg-light pt-0">
                            <li class="nav-item" ng-click="updateWizardStatus(0)" data-target-form="#projectInfoForm">
                                <a href="#first" data-bs-toggle="tab" data-toggle="tab" style="min-height: 80px;" class="d-flex flex-column justify-content-center align-items-center nav-link text-center rounded-0 p-0 active">
                                    <i class="fa fa-project-diagram fa-2x mb-1"></i>
                                    <small class="d-none d-sm-inline">Project Info</small>
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(1)" data-target-form="#serviceSelection">
                                <a href="#second" data-bs-toggle="tab" data-toggle="tab" style="min-height: 80px;" class="d-flex flex-column justify-content-center align-items-center nav-link text-center rounded-0 p-0">
                                    <i class="fa fa-list-alt fa-2x mb-1"></i>
                                    <small class="d-none d-sm-inline">Service Selection</small>
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(2)" data-target-form="#IFCModelUpload">
                                <a href="#four" data-bs-toggle="tab" data-toggle="tab" style="min-height: 80px;" class="d-flex flex-column justify-content-center align-items-center nav-link text-center rounded-0 p-0">
                                    <i class="fa fa-2x fa-file-upload mb-1"></i>
                                    <small class="d-none d-sm-inline">IFC Model & Uploads</small>
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(3)"  data-target-form="#buildingComponent">
                                <a href="#five" data-bs-toggle="tab" data-toggle="tab" style="min-height: 80px;" class="d-flex flex-column justify-content-center align-items-center nav-link text-center rounded-0 p-0">
                                    <i class="fa fa-2x fa-shapes mb-1"></i>
                                    <small class="d-none d-sm-inline">Building  Components</small>
                                </a>
                            </li>
                            <li class="nav-item" ng-click="updateWizardStatus(4)" data-target-form="#additionalInformation">
                                <a href="#six" data-bs-toggle="tab" data-toggle="tab" style="min-height: 80px;" class="d-flex flex-column justify-content-center align-items-center nav-link text-center rounded-0 p-0">
                                    <i class="fa fa-2x fa-info mb-1"></i>
                                    <small class="d-none d-sm-inline">Additional Info</small>
                                </a>
                            </li>
                            <li class="nav-item"  ng-click="updateWizardStatus(5)" data-target-form="#otherForm">
                                <a href="#third" data-bs-toggle="tab" data-toggle="tab"style="min-height: 80px;"  class="d-flex flex-column justify-content-center align-items-center nav-link text-center rounded-0 p-0">
                                    <i class="fa fa-2x fa-clipboard-check mb-1"></i>
                                    <small class="d-none d-sm-inline">Review &  Submit </small>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content my-3" >
                            <div class="tab-pane active" id="first" ng-controller="ProjectInfo">
                                @include('customers.pages.enquiryWizard.project-info')
                            </div>
                            <div class="tab-pane fade " id="second" ng-controller="ServiceSelection">
                                @include('customers.pages.enquiryWizard.service-selection')
                            </div>
                            <div class="tab-pane fade " id="four" ng-controller="IFCModelUpload">
                                @include('customers.pages.enquiryWizard.ifc-model-uploads')
                            </div>

                            <div class="tab-pane p-0 h-100 fade " id="five" ng-controller="CrudCtrl">
                                <div class="row">
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
                                                                                            {{-- <button ng-click="RemoveDetails(fIndex , Secindex)" class=" btn-danger btn shadow-lg  RemoveDetails" type="button"><i class="fa fa-trash"></i></button> --}}
                                                                                            
                                                                                            <button  type="button" class="btn btn-outline-danger rounded shadow-sm btn-sm" data-bs-toggle="modal" data-bs-target="#ConfirmDeleteWall_@{{ fIndex }}_@{{ Secindex }}"><div class="fa fa-trash " ></div></button>
                                                                                            <div id="ConfirmDeleteWall_@{{ fIndex }}_@{{ Secindex }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ConfirmDeleteLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content text-center">
                                                                                                        <div class="modal-header modal-colored-header bg-danger">
                                                                                                            <h4 class="modal-title" id="ConfirmDeleteLabel">Delete Confirmation</h4>
                                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            <h2>Are you sure !!</h2>
                                                                                                            <p class="lead">You want to delete ? </br> Please put your password for delete action</p>
                                                                                                            <input type="text" class="w-75 mx-auto form-control" placeholder="Enter your password" class="form-control">
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
                                                                                                                <h4 class="modal-title" id="ConfirmDeleteLabel">Delete Confirmation</h4>
                                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">
                                                                                                                <h2>Are you sure !!</h2>
                                                                                                                <p class="lead">You want to delete ? </br> Please put your password for delete action</p>
                                                                                                                <input type="text" class="w-75 mx-auto form-control" placeholder="Enter your password" class="form-control">
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
                                            </div> 
                                        </div> 
                                    </div> 
                                </div> 
                                
                            </div>
                            <div class="tab-pane fade" id="six">
                                @include('customers.pages.enquiryWizard.additional-info')
                            </div>
                            <div class="tab-pane fade" id="third">
                                <div class="summary-group pt-3">
                                    {{-- ProjectInfo --}}
                                    <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
                                        <div class="legend shadow-sm border rounded text-primary">Project Information </div>
                                        <div class="card-body">
                                            <table class="table m-0  ">
                                                <tbody>
                                                    <tr>
                                                        <td width="30%"><b>Project Name</b></td>
                                                        <td>ABCD Building</td>
                                                    </tr> 
                                                    <tr>
                                                        <td><b>Construction Site Address</b></td>
                                                        <td>Strandgata-12</td>
                                                    </tr> 
                                                    <tr>
                                                        <td><b>Post Code</b></td>
                                                        <td>2134</td>
                                                    </tr> 
                                                    <tr>
                                                        <td><b>Place</b></td>
                                                        <td>Austvatd</td>
                                                    </tr> 
                                                    <tr>
                                                        <td><b>State</b></td>
                                                        <td>Hedmark</td>
                                                    </tr> 
                                                    <tr>
                                                        <td><b>Country</b></td>
                                                        <td>Norway</td>
                                                    </tr> 
                                                    <tr>
                                                        <td><b>Type of Project</b></td>
                                                        <td>1</td>
                                                    </tr> 
                                                    <tr>
                                                        <td><b>Type of Building</b></td>
                                                        <td>2</td>
                                                    </tr> 
                                                    <tr>
                                                        <td><b>Number of Buildings</b></td>
                                                        <td>2</td>
                                                    </tr> 
                                                    <tr>
                                                        <td><b>Type of Delivery</b></td>
                                                        <td>1</td>
                                                    </tr> 
                                                    <tr>
                                                        <td><b>Deliveryd Date</b></td>
                                                        <td>2021-02-25</td>
                                                    </tr> 
                                                    <tr>
                                                        <td><b>State</b></td>
                                                        <td>non</td>
                                                    </tr> 
                                                    <tr>
                                                        <td><b>Contact Person name</b></td>
                                                        <td>XXXXXXX </td>
                                                    </tr> 
                                                    <tr>
                                                        <td><b>E-post</b></td>
                                                        <td>dummyemail@gmail.com</td>
                                                    </tr> 
                                                </tbody>
                                            </table> 
                                        </div> 
                                    </fieldset>
                                    {{-- ProjectInfo --}}
                            
                                    {{-- Selected Services --}}
                                    <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
                                        <div class="legend shadow-sm border rounded text-primary">Selected Services</div>
                                        <div class="card-body">
                                            <ul class="row m-0 ">
                                                <li class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> Cras justo odio</li>
                                                <li class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> Dapibus ac facilisis in</li>
                                                <li class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> Morbi leo risus</li>
                                                <li class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> Porta ac consectetur ac</li>
                                                <li class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> Vestibulum at eros</li>
                                            </ul> 
                                        </div> 
                                    </fieldset>
                                    {{-- Selected Services --}}
                            
                                    {{-- IFC Models & Uploaded Documents --}}
                                    <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
                                        <div class="legend shadow-sm border rounded text-primary">IFC Models & Uploaded Documents</div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th><b>S.No</b></th>
                                                    <th><b>File name</b></th>
                                                    <th><b>File Type</b></th>
                                                    <th><b>View Type</b></th>
                                                    <th class="text-center" width="150px"><b>Action</b></th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Document001</td>
                                                    <td>.docs</td>
                                                    <td>Plan view</td>
                                                    <td class="text-center">
                                                        <i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i>
                                                        <i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Files002</td>
                                                    <td>.pdf</td>
                                                    <td>Facade view</td>
                                                    <td class="text-center">
                                                        <i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i>
                                                        <i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Files005</td>
                                                    <td>.png</td>
                                                    <td>IFC model</td>
                                                    <td class="text-center">
                                                        <i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i>
                                                        <i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>myImage</td>
                                                    <td>.JPEG</td>
                                                    <td>others</td>
                                                    <td class="text-center">
                                                        <i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i>
                                                        <i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i>
                                                    </td>
                                                </tr>
                                            </table> 
                                        </div> 
                                    </fieldset>
                                    {{-- IFC Models & Uploaded Documents --}}
                            
                                    {{-- Building Components --}}
                                    <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
                                        <div class="legend shadow-sm border rounded text-primary">Building Components</div>
                                        <div class="card-body">
                                            <div  style="max-height: 400px; overflow:auto">
                                                <table class="table table-bordered" >
                                                    <tbody>
                                                        <tr class="table-bold text-center">
                                                            <th width="150px"> </th>
                                                            <th style="padding: 0 !important">
                                                                <table class="table m-0 ">
                                                                    <tr>
                                                                        <th width="50%">
                                                                            Wall details
                                                                        </th>
                                                                        <th style="padding: 0 !important" width="50%">
                                                                            Layer details
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th width="150px"><b>Wall name</b></th>
                                                            <th style="padding: 0 !important">
                                                                <table class="table m-0 ">
                                                                    <tr>
                                                                        <td width="50%" style="padding: 0 !important">
                                                                            <table class="table m-0 table-bordered table-bold">
                                                                                <tr>
                                                                                    <th>Floor</th>
                                                                                    <th>wall Number</th>
                                                                                    <th>Delivery type</th>
                                                                                    <th>Total Area</th>
                                                                                </tr> 
                                                                            </table>
                                                                        </td>
                                                                        <td style="padding: 0 !important" width="50%">
                                                                            <table class="table m-0 table-bordered">
                                                                                <tr class="table-bold">
                                                                                    <th>Name</th>
                                                                                    <th>Type</th>
                                                                                    <th>Thickness</th>
                                                                                    <th>Breadth</th>
                                                                                </tr> 
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </th>
                                                        </tr>
                                                        <tr width="150px">
                                                            <tr width="180px">
                                                                <td>Internal  Wall</td>
                                                                <td style="padding: 0 !important"  >
                                                                    <table class="table m-0 ">
                                                                        <tr>
                                                                            <td width="50%">
                                                                                <table class="table m-0 table-bordered">
                                                                                    <tr>
                                                                                        <td>kids floor</td>
                                                                                        <td>1</td>
                                                                                        <td>quick</td>
                                                                                        <td>1250</td>
                                                                                    </tr> 
                                                                                </table>
                                                                            </td>
                                                                            <td style="padding: 0 !important" width="50%">
                                                                                <table class="table m-0 table-bordered">
                                                                                    <tr>
                                                                                        <td>fire proof</td>
                                                                                        <td>precut</td>
                                                                                        <td>25.54</td>
                                                                                        <td>254</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>cold proof</td>
                                                                                        <td>precut</td>
                                                                                        <td>25.54</td>
                                                                                        <td>254</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>noice proof</td>
                                                                                        <td>precut</td>
                                                                                        <td>25.54</td>
                                                                                        <td>254</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>abcd proof</td>
                                                                                        <td>precut</td>
                                                                                        <td>25.54</td>
                                                                                        <td>254</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>others proof</td>
                                                                                        <td>precut</td>
                                                                                        <td>25.54</td>
                                                                                        <td>254</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="50%">
                                                                                <table class="table m-0 table-bordered">
                                                                                    <tr>
                                                                                        <td>kids floor</td>
                                                                                        <td>1</td>
                                                                                        <td>quick</td>
                                                                                        <td>1250</td>
                                                                                    </tr> 
                                                                                </table>
                                                                            </td>
                                                                            <td style="padding: 0 !important" width="50%">
                                                                                <table class="table m-0 table-bordered">
                                                                                    <tr>
                                                                                        <td>fire proof</td>
                                                                                        <td>precut</td>
                                                                                        <td>25.54</td>
                                                                                        <td>254</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>cold proof</td>
                                                                                        <td>precut</td>
                                                                                        <td>25.54</td>
                                                                                        <td>254</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>noice proof</td>
                                                                                        <td>precut</td>
                                                                                        <td>25.54</td>
                                                                                        <td>254</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>abcd proof</td>
                                                                                        <td>precut</td>
                                                                                        <td>25.54</td>
                                                                                        <td>254</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>others proof</td>
                                                                                        <td>precut</td>
                                                                                        <td>25.54</td>
                                                                                        <td>254</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr> 
                                                            <td>External  Wall</td>
                                                            <td style="padding: 0 !important"  >
                                                                <table class="table m-0 ">
                                                                    <tr>
                                                                        <td width="50%">
                                                                            <table class="table m-0 table-bordered">
                                                                                <tr>
                                                                                    <td>kids floor</td>
                                                                                    <td>1</td>
                                                                                    <td>quick</td>
                                                                                    <td>1250</td>
                                                                                </tr> 
                                                                            </table>
                                                                        </td>
                                                                        <td style="padding: 0 !important" width="50%">
                                                                            <table class="table m-0 table-bordered">
                                                                                <tr>
                                                                                    <td>fire proof</td>
                                                                                    <td>precut</td>
                                                                                    <td>25.54</td>
                                                                                    <td>254</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>cold proof</td>
                                                                                    <td>precut</td>
                                                                                    <td>25.54</td>
                                                                                    <td>254</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>noice proof</td>
                                                                                    <td>precut</td>
                                                                                    <td>25.54</td>
                                                                                    <td>254</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>abcd proof</td>
                                                                                    <td>precut</td>
                                                                                    <td>25.54</td>
                                                                                    <td>254</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>others proof</td>
                                                                                    <td>precut</td>
                                                                                    <td>25.54</td>
                                                                                    <td>254</td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="50%">
                                                                            <table class="table m-0 table-bordered">
                                                                                <tr>
                                                                                    <td>kids floor</td>
                                                                                    <td>1</td>
                                                                                    <td>quick</td>
                                                                                    <td>1250</td>
                                                                                </tr> 
                                                                            </table>
                                                                        </td>
                                                                        <td style="padding: 0 !important" width="50%">
                                                                            <table class="table m-0 table-bordered">
                                                                                <tr>
                                                                                    <td>fire proof</td>
                                                                                    <td>precut</td>
                                                                                    <td>25.54</td>
                                                                                    <td>254</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>cold proof</td>
                                                                                    <td>precut</td>
                                                                                    <td>25.54</td>
                                                                                    <td>254</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>noice proof</td>
                                                                                    <td>precut</td>
                                                                                    <td>25.54</td>
                                                                                    <td>254</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>abcd proof</td>
                                                                                    <td>precut</td>
                                                                                    <td>25.54</td>
                                                                                    <td>254</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>others proof</td>
                                                                                    <td>precut</td>
                                                                                    <td>25.54</td>
                                                                                    <td>254</td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr> 
                                                    </tbody>
                                                </table> 
                                            </div> 
                                        </div> 
                                    </fieldset>
                                    {{-- Building Components --}}
                            
                                    {{-- Additional Info --}}
                                    <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
                                        <div class="legend shadow-sm border rounded text-primary">Additional Info</div>
                                        <div class="card-body pt-4">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus numquam illum sint perspiciatis tempore cumque ipsa asperiores tempora earum molestias aperiam doloremque facere placeat officiis iure, ea eum architecto sunt?</p>
                                            
                                        </div> 
                                    </fieldset>
                                    {{-- Additional Info --}}
                                </div>
                            </div>

                            <div class="card-footer border-0 p-0 " >
                                <ul class="list-inline wizard mb-0 pt-3">
                                    <li class="previous list-inline-item disabled" ng-click="gotoStep(currentStep - 1)"><a href="#" class="btn btn-primary">Previous</a></li>
                                    <li class="next list-inline-item float-end" ng-click="gotoStep(currentStep + 1)" ><a href="#" class="btn btn-primary">Next</a></li>
                                </ul>
                            </div>

                        </div> <!-- tab-content -->
                    </div> <!-- end #rootwizard--> 
                </div> <!-- end card-body -->
            </div>
            </div> <!-- container -->

        </div> <!-- content -->


    </div> 
    <div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-right" style="width:100% !important">
            <div class="modal-content p-3 h-100 d-flex justify-content-center align-items-center" >
                <div>
                    <div class="border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <ul class="conversation-list" data-simplebar="init" style="max-height: 537px"><div class="simplebar-wrapper" style="margin: 0px -15px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px 15px;">
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" class="rounded" alt="Shreyu N">
                                        <i>10:00</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Hello!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" class="rounded" alt="dominic">
                                        <i>10:01</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                Hi, How are you? What about our next meeting?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" class="rounded" alt="Shreyu N">
                                        <i>10:01</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Yeah everyThickness g is fine
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" class="rounded" alt="dominic">
                                        <i>10:02</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                Wow that's great
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" alt="Shreyu N" class="rounded">
                                        <i>10:02</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Let's have it today if you are free
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" alt="dominic" class="rounded">
                                        <i>10:03</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                Sure Thickness g! let me know if 2pm works for you
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" alt="Shreyu N" class="rounded">
                                        <i>10:04</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Sorry, I have another meeting scheduled at 2pm. Can we have it
                                                at 3pm instead?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" alt="Shreyu N" class="rounded">
                                        <i>10:04</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                We can also discuss about the presentation talk format if you have some extra mins
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" alt="dominic" class="rounded">
                                        <i>10:05</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                3pm it is. Sure, let's discuss about presentation format, it would be great to finalize today. 
                                                I am attaching the last year format and assets here...
                                            </p>
                                        </div>
                                        <div class="card mt-2 mb-1 shadow-none border text-start">
                                            <div class="p-2">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title rounded">
                                                                .ZIP
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col ps-0">
                                                        <a href="javascript:void(0);" class="text-muted fw-bold">Hyper-admin-design.zip</a>
                                                        <p class="mb-0">2.3 MB</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <!-- Button -->
                                                        <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                                            <i class="dripicons-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                            </div></div></div></div><div class="simplebar-placeholder" style="width: 479px; height: 924px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 312px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></ul>

                            <div class="row">
                                <div class="col">
                                    <div class="mt-2 bg-light p-3 rounded">
                                        <form class="needs-validation" novalidate="" name="chat-form" id="chat-form">
                                            <div class="row">
                                                <div class="col mb-2 mb-sm-0">
                                                    <input type="text" class="form-control border-0" placeholder="Enter your text" required="">
                                                    <div class="invalid-feedback">
                                                        Please enter your messsage
                                                    </div>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-secondary"><i class="uil uil-paperclip"></i></a>
                                                        <a href="#" class="btn btn-secondary"> <i class="uil uil-smile"></i> </a>
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-success chat-send"><i class="uil uil-message"></i></button>
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row-->
                                        </form>
                                    </div> 
                                </div> <!-- end col-->
                            </div>
                            <!-- end row -->
                        </div> <!-- end card-body -->
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
      
@endsection
          
@push('custom-styles')
    <link rel="stylesheet" href="{{ asset('public/assets/css/pages/customer-enquiry.css') }}">
    <style>
        fieldset:hover ,   fieldset:hover  .legend {
            border: 1px solid #757CF2 !important
        }
        .legend {
            top: -15px;
            position: absolute;
            font-weight: bold;
            line-height: 25px;
            padding: 0px 10px;
            background: white;
            left: 25px;
        } 
        .table-bold {
            font-weight: bold !important
        }
         li.nav-item .timeline-step::after {
            content: "";
            position: absolute;
            top: 34%;
            right: -38px;
            border: 1px dashed;
            width: 50%; 
        }
        li.nav-item {
            position: relative;
        }
        .timeline-steps  {
            display: flex;
            justify-content:space-between;
            /* align-items: center; */
            position: relative;
         
        }
        .timeline-step {
            padding: 10px;
            z-index: 1;
            border-radius: 15px;
            margin: 10px
        }
        .inner-circle {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            box-shadow: 0px 0px 10px #bdbdbd;
            background: white;
            display: flex;
            justify-content:center;
            align-items: center;
            color: white;
            border: 3px solid white;
            transform: scale(1.1);

        }
        .timeline-content {
            display: flex;
            justify-content:center;
            align-items: center;
            flex-direction: column;
        }
        .admin-Delivery-wiz .timeline-step::after {
            visibility: hidden;
        }
    </style>
@endpush

@push('custom-scripts')

    

    <!-- end demo js-->
    <script src="{{ asset('public/assets/js/pages/demo.form-wizard.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/ui/component.fileupload.js') }}"></script>
   
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.angularjs.org/1.2.16/angular.js"></script>

    <script >
        var app = angular.module('App', []).constant('API_URL', $("#baseurl").val());           
    </script>
        <script src="{{ asset('public/assets/js/pages/customers/directives.js') }}"></script>
    <script>
        // const result = [];
        app.controller('wizard', function($scope, $http,$rootScope) {
            $scope.result = []
            $rootScope.currentStep = 0;

            $rootScope.updateWizardStatus = (newStep) => {
                $rootScope.currentStep = newStep;
            }
            $rootScope.gotoStep = function(newStep) {
                if($rootScope.currentStep > newStep) {
                    $rootScope.currentStep = newStep;
                    return false;
                }
                $rootScope.currentStep = newStep;
                if($rootScope.currentStep == 1 ) {
                    $scope.$broadcast('callProjectInfo');
                } else if ($rootScope.currentStep == 2) {
                    $scope.$broadcast('callServiceSelection');
                } else if ($rootScope.currentStep == 3) {
                    $scope.$broadcast('callIFCModelUpload');
                } else if ($rootScope.currentStep == 4) {
                    $scope.$broadcast('buildingComponent');
                }
            }
          
        });
    
       	app.controller('ProjectInfo', function ($scope, $http, $rootScope ) {
       
            let projectTypefiredOnce = false;
            let deliveryTypefiredOnce = false;
            let buildingTypefiredOnce = false;
            $scope.mobilenoRegex = /^[0-9]{1,8}$/;
            $scope.getProjectType = () => {
                if(projectTypefiredOnce){ return; }
                $http({
                    method: 'GET',
                    url: '{{ route("project-type.index") }}'
                }).then(function (res) {
                    projectTypefiredOnce = true;
                    $scope.projectTypes = res.data;		
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 

            $scope.getDeliveryType = () => {
                if(deliveryTypefiredOnce){ return; }
                $http({
                    method: 'GET',
                    url: '{{ route("delivery-type.index") }}'
                }).then(function (res) {
                    deliveryTypefiredOnce = true;
                    $scope.deliveryTypes = res.data;		
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 
  
            $scope.getBuildingType = () => {
                if(buildingTypefiredOnce){ return; }
                $http({
                    method: 'GET',
                    url: '{{ route("building-type.index") }}'
                }).then(function (res) {
                    buildingTypefiredOnce = true;
                    $scope.buildingTypes = res.data;		
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 

            $scope.getProjectType();
            $scope.getBuildingType();
            $scope.getDeliveryType();

            $scope.$on('callProjectInfo', function(e) {  
                if(!$("#projectInfoForm")[0].checkValidity()){
                    $rootScope.currentStep = 0;
                    return false;
                }
                $http({
                    method: 'POST',
                    url: '{{ route("customers.store-enquiry") }}',
                    data: {type: 'project_info', 'data': $scope.getProjectInfoInptuData($scope.projectInfo)}
                }).then(function (res) {
                    
                }, function (error) {
                    console.log(`callprojectinfo ${error}`);
                });         
            });
        
            $scope.getProjectInfoInptuData = function($projectInfo) {
                $scope.data = {
                    'company_name'         : $projectInfo.company_name,
                    'contact_person'       : $projectInfo.contact_person,
                    'mobile_no'            : $projectInfo.mobile_no,
                    'secondary_mobile_no'  : $projectInfo.secondary_mobile_no,
                    'project_name'         : $projectInfo.project_name,
                    'zipcode'              : $projectInfo.zipcode,
                    'state'                : $projectInfo.state,
                    'building_type_id'     : $projectInfo.building_type_id,
                    'project_type_id'      : $projectInfo.project_type_id,
                    'project_date'         : $projectInfo.project_date,
                    'site_address'         : $projectInfo.site_address,
                    'place'                : $projectInfo.place,
                    'country'              : $projectInfo.country,
                    'no_of_building'       : $projectInfo.no_of_building,
                    'delivery_type_id'     : $projectInfo.delivery_type_id,
                    'project_delivery_date': $projectInfo.project_delivery_date,
                };
                return  $scope.data;
            }

        }); 

        app.controller('ServiceSelection', function ($scope, $http, $rootScope) {
            $scope.serviceList = [];

           $scope.$on('callServiceSelection', function(e) { 
                if($scope.serviceList.length == 0){
                    $scope.service_selection_mandatory = null;
                    $rootScope.currentStep = 1;
                    return false;
                }
                $scope.service_selection_mandatory = true;      
               $http({
                    method: 'POST',
                    url: '{{ route("customers.store-enquiry") }}',
                    data: {type: 'services', 'data': $scope.getServiceSelectionInptuData()}
                }).then(function (res) {
                    
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });         
           });

           $scope.getServiceSelectionInptuData = function() {
                return Object.assign({}, $scope.serviceList);
           }
    
            $scope.changeService = function(list, active){
                if (active) {
                    $scope.serviceList.push(list);
                }else {
                    $scope.serviceList.splice($scope.serviceList.indexOf(list), 1);
                }
            };
           let servicefireOnce = false;
           $scope.getServices = () => {
               if(servicefireOnce){ return; }
               $http({
                   method: 'GET',
                   url: '{{ route("service.index") }}'
               }).then(function (res) {
                    servicefireOnce = true;
                    $scope.services = res.data;	
               }, function (error) {
                   console.log('This is embarassing. An error has occurred. Please check the log for details');
               });
           } 
           $scope.getServices();
        }); 

        app.directive('demoFileModel', function ($parse) {
            return {
                restrict: 'A', //the directive can be used as an attribute only
                /*
                link is a function that defines functionality of directive
                scope: scope associated with the element
                element: element on which this directive used
                attrs: key value pair of element attributes
                */
                link: function (scope, element, attrs) {
                    var model = $parse(attrs.demoFileModel),
                        modelSetter = model.assign; //define a setter for demoFileModel

                    //Bind change event on the element
                    element.bind('change', function () {
                        //Call apply on scope, it checks for value changes and reflect them on UI
                        scope.$apply(function () {
                            //set the model value
                            modelSetter(scope, element[0].files[0]);
                            
                        });
                    });
                }
            };
        });

        
        app.directive('customModal', function ($parse) {
            return {
                link: function(scope, element, attributes){
                    let title = attributes.modalTitle;
                    let body = attributes.modalBody;
                    let route = attributes.modalRoute;
                    let id = attributes.modalId;
                    let view_type = attributes.modalViewType;
                    let enquiry_id = attributes.modalEnquiryId;
                    let method = attributes.modalMethod;
                    element.bind('click', function () {
                        $("#exampleModalLabel").html(title);
                        $("#exampleModalBody").html(body);
                        $("#exampleModalRoute").val(route);
                        $("#exampleModalId").val(id);
                        $("#exampleModalEnquiryId").val(enquiry_id);
                        $("#exampleModalViewType").val(view_type);
                        $("#exampleModalMethod").val(method);
                        $("#exampleModal").modal('show');
                    });
                }
            };
        });
        
        app.service('fileUploadService', function ($http, $q) {
                    
            this.uploadFileToUrl = function (file, type, view_type,  uploadUrl) {
                var fileFormData = new FormData();
                fileFormData.append('file', file);
                fileFormData.append('type',type);
                fileFormData.append('view_type',view_type);

                var deffered = $q.defer();
                $http.post(uploadUrl, fileFormData, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}

                }).success(function (response) {
                    deffered.resolve(response);

                }).error(function (response) {
                    deffered.reject(response);
                });

                return deffered.promise;
            }
        });

        app.controller('IFCModelUpload', function ($scope, $http, $parse, fileUploadService,  $rootScope) {
            let mandatoryUpload= [];
            $scope.PlanView = [];
            $scope.posterTitle = 'click here';
            
            $scope.$on('callIFCModelUpload', function(e) {

                mandatoryUpload.length != 0 && mandatoryUpload.map((view) => {
                                                alert(`mandatory file upload ${view}`);
                                            });$rootScope.currentStep = 2;
                
                $http({
                    method: 'POST',
                    url: '{{ route("customers.store-enquiry") }}',
                    data: {type: 'ifc_model_upload_mandatory', 'data': false}
                }).then(function (res) {
                    if(res.data.status == false) {
                        res.data.data.map((field) => {
                            console.log(field);
                        });
                    }
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            });

            $scope.fileName= function(element, attribute) {
                $scope.$apply(function($scope) {
                    var attribute_name = element.getAttribute('demo-file-model');
                    $scope[`${attribute_name}__file_name`] = element.files[0].name;
                });
            };
            $scope.uploadFile = function (view_type) { 
               
                if(view_type){
                    var file = $scope[view_type];
                    if(typeof(file) == 'undefined') {
                        $scope[`${view_type}__error`] = true;
                        return  false;
                    }
                    $scope[`${view_type}__error`] = false;
                    var type = 'ifc_model_upload';
                    var view_type = view_type;
                    var uploadUrl = '{{ route('customers.store-enquiry') }}'
                    promise = fileUploadService.uploadFileToUrl(file, type, view_type, uploadUrl);
                    promise.then(function (response) {
                        $scope.getIFCViewList(response, view_type);
                        $scope.serverResponse = response;
                        $scope[`${view_type}__file_name`] = '';
                        $scope[`${view_type}`] = undefined;
                        const index = mandatoryUpload.indexOf(view_type);
                        if (index > -1) {
                            mandatoryUpload.splice(index, 1);
                        }
                        $scope[`${view_type}mandatory`] = 'true';
                    }, function () {
                        $scope.serverResponse = 'An error has occurred';
                    });
                 
                }
            }
        
            $scope.getIFCViewList = (id, view_type) => {
              
                $http({
                    method: 'GET',
                    url: '{{ route('customers.get-view-list') }}',
                    params: {id: id, view_type: view_type},
                }).then(function (res) {
                    $scope[`${view_type}List`] = res.data;
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }

            $scope.performAction = function()  {
                let route      = $("#exampleModalRoute").val();
                let method     = $("#exampleModalMethod").val();
                let id         = $("#exampleModalId").val();
                let enquiry_id = $("#exampleModalEnquiryId").val();
                let view_type  = $("#exampleModalViewType").val();
                $http({
                    method: method,
                    url: route,
                    params: {id: id},
                }).then(function (res) {
                    if(res.status) {
                        $scope.getIFCViewList(enquiry_id, view_type);
                        $("#exampleModal").modal('hide');
                        return false;
                    }
                    return false;
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            }
            let documentTypefireOnce = false;
            $scope.getDocumentTypes = () => {
                if(documentTypefireOnce){ return; }
                $http({
                    method: 'GET',
                    url: '{{ route("document-type.index") }}'
                }).then(function (res) {
                    documentTypefireOnce = true;
                    res.data.map((item) => {
                        item.is_mandatory == 1 && mandatoryUpload.push(item.slug);
                    });
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 
            $scope.getDocumentTypes();
        });
       

        app.controller('CrudCtrl', function ($scope, $http) { 

            $scope.$on('callServiceSelection', function(e) {  
               $scope.$parent.result['building_component'] = ($scope.getBuildingComponentInptuData());            
            });

            $scope.getBuildingComponentInptuData = function() {
                return $scope.wallGroup;
           }

            $scope.wallGroup  = [
                {
                    "WallName" : "External Wall",
                    "WallIcon" : "dripicons-store", 
                    "Details": [
                        {
                            "FloorName" : "Ground Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } 
                            ] 
                        } 
                    ]
                },
                {
                    "WallName" : "Internal Wall",
                    "WallIcon" : "uil uil-store-alt", 
                    "Details": [
                        {
                            "FloorName" : "First Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } 
                            ] 
                        } 
                    ]
                },
                {
                    "WallName" : "Partition Wall",
                    "WallIcon" : "uil uil-wall", 
                    "Details": [
                        {
                            "FloorName" : "New Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } 
                            ] 
                        } 
                    ]
                },
                {
                    "WallName" : "Ceiling",
                    "WallIcon" : "uil uil-layers", 
                    "Details": [
                        {
                            "FloorName" : "Top Right Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } 
                            ] 
                        } 
                    ]
                },
                {
                    "WallName" : "Roof",
                    "WallIcon" : "uil uil-mountains-sun", 
                    "Details": [
                        {
                            "FloorName" : "Top Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } 
                            ] 
                        } 
                    ]
                } 
            ]; 
            $scope.AddWall  =   function() {
                $scope.wallGroup.unshift({
                    "WallName" : "",
                    "Details": [{
                        "Layers": [] 
                    }]
                });
            }
            $scope.AddWallDetails  =   function(index) {
                $scope.wallGroup[index].Details.push({
                    "FloorName" : "Ground Floor",
                    "FloorNumber" : "1",
                    "TotalArea" : "2500",
                    "DeliveryType" : "Fire Proof",
                    "Layers": [
                        {
                            "LayerName": '',
                            "LayerType": '',
                            "Thickness ": '',
                            "Breadth": '',
                        }
                    ] 
                });
            } 
            $scope.AddLayers  =   function(fIndex, index) {
                $scope.wallGroup[fIndex].Details[index].Layers.unshift({
                    "LayerName": '',
                    "LayerType": '',
                    "Thickness ": '',
                    "Breadth": '',
                });
            }    
            $scope.delWall = function(index){
                
                $scope.wallGroup.splice(index,1);
            } 
            $scope.delWallTwo = function(fIndex){
                $scope.wallGroup.splice(fIndex,1);
            }  
            $scope.RemoveDetails = function(fIndex, Secindex){
                $scope.wallGroup[fIndex].Details.splice(Secindex,1);                
            }

            $scope.removeLayer = function(fIndex, Secindex, ThreeIndex){
                $scope.wallGroup[fIndex].Details[Secindex].Layers.splice(ThreeIndex,1);
            }  
            $scope.removeWall = function(fIndex, Secindex){
                $scope.wallGroup[fIndex].Details.splice(Secindex,1);           
            } 
        });

      
    </script>
   
@endpush