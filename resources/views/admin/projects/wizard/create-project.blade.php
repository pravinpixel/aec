<form id="createProjectForm" name="createProjectForm" ng-submit="submitCreateProjectForm()">
    <div class="card-body">
        <div class="row m-0 border-bottom mb-2 pb-2">
            <div class="col-md-6"> 
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Project ID</label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" disabled ng-model="project.reference_number" class="form-control form-control-sm">
                    </div> 
                </div> 
            </div>
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Contact Person <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" name="contact_person" ng-model="project.contact_person" class="form-control form-control-sm" required>
                        <small class="text-danger" ng-show="createProjectForm.contact_person.$invalid && createProjectForm.contact_person.$toucehd">This field is required</small>
                    </div> 
                </div>
            </div>
            <div class="col-md-6"> 
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Company Name<sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text"  name="company_name" id="validationCustom01" class="form-control form-control-sm"  placeholder="Type Here..."  ng-required="true" list="companyList" ng-change="getCompany(project.company_name)"  ng-model="project.company_name"/>
                        <datalist id="companyList">
                            <option ng-repeat="item in companyList" value="@{{item.company}}">@{{item.company}}</option>
                        </datalist>
                        
                        <small class="text-danger" ng-show="createProjectForm.company_name.$invalid && createProjectForm.company_name.$toucehd">This field is required</small>
                    </div> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Telephone <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" pattern="{{ config('global.mobile_no_pattern') }}" maxlength="{{ config('global.mobile_no_length') }}"  onkeypress="return isNumber(event)" name="mobile_number" ng-model="project.mobile_number"  class="form-control form-control-sm" required>
                        <small class="text-danger" ng-show="createProjectForm.mobile_number.$invalid && createProjectForm.mobile_number.$toucehd">This field is required</small>
                    </div> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Project Name <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" name="project_name" ng-model="project.project_name" class="form-control form-control-sm" required>
                        <small class="text-danger" ng-show="createProjectForm.project_name.$invalid && createProjectForm.project_name.$toucehd">This field is required</small>
                    </div> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Email <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" pattern="{{ config('global.email') }}"   name="email" ng-model="project.email"  class="form-control form-control-sm" required>
                        <small class="text-danger" ng-show="createProjectForm.email.$invalid && createProjectForm.email.$toucehd">This field is required</small>
                    </div> 
                </div>    
            </div>
        </div>
        <div class="row m-0 border-bottom mb-2 pb-2">
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Site Address <sup class="text-danger"></sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" name="site_address" ng-model="project.site_address" class="form-control form-control-sm" required>
                        <small class="text-danger" ng-show="createProjectForm.site_address.$invalid && createProjectForm.site_address.$toucehd">This field is required</small>
                    </div> 
                </div>
            </div>
          
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Zipcode <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" onkeypress="return isNumber(event)" id="zipcode" name="zipcode" ng-model="project.zipcode" ng-change="getZipcode()" class="form-control form-control-sm" required>
                        <small class="text-danger" ng-show="createProjectForm.zipcode.$invalid && createProjectForm.zipcode.$toucehd">This field is required</small>

                    </div> 
                </div>
            </div>
   
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">City <sup class="text-danger"></sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" name="city" ng-model="project.city" class="form-control form-control-sm" required>
                        <small class="text-danger" ng-show="createProjectForm.city.$invalid && createProjectForm.city.$toucehd">This field is required</small>
                    </div> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">State <sup class="text-danger"></sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" name="state" ng-model="project.state" class="form-control form-control-sm" required>
                        <small class="text-danger" ng-show="createProjectForm.state.$invalid && createProjectForm.state.$toucehd">This field is required</small>
                    </div> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Country <sub class="text-danger">*</sub></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" name="country"  ng-model="project.country" class="form-control form-control-sm" required>
                        <small class="text-danger" ng-show="createProjectForm.country.$invalid && createProjectForm.country.$toucehd">This field is required</small>

                    </div> 
                </div>
            </div>

            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">No.of Buildings  <sup class="text-danger"></sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" onkeypress="return isNumber(event)" name="no_of_building_id" ng-model="project.no_of_building" class="form-control form-control-sm" required>
                        <small class="text-danger" ng-show="createProjectForm.no_of_building_id.$invalid && createProjectForm.no_of_building_id.$toucehd">This field is required</small>
                    </div> 
                </div>
            </div>
                   
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Type of Building<sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  name="building_type_id" ng-model="project.building_type_id" required>
                            <option value="">@lang('project.select') </option>
                            <option ng-repeat="buildingType in buildingTypes" value="@{{ buildingType.id }}" ng-selected="buildingType.id == project.building_type_id">
                                @{{ buildingType.building_type_name }}
                            </option>
                        </select>
                        <small class="text-danger" ng-show="createProjectForm.building_type_id.$invalid && createProjectForm.building_type_id.$toucehd">This field is required</small>

                    </div> 
                </div>
            </div>

            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Type of Project <sup class="danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  name="project_type_id" ng-model="project.project_type_id" required>
                            <option value="">@lang('project.select') </option>
                            <option ng-repeat="projectType in projectTypes" value="@{{ projectType.id }}" ng-selected="projectType.id == project.project_type_id">
                                @{{ projectType.project_type_name }}
                            </option>
                        </select>
                        <small class="text-danger" ng-show="createProjectForm.project_type_id.$invalid && createProjectForm.project_type_id.$toucehd">This field is required</small>

                    </div> 
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Type of Delivery <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  name="delivery_type_id" ng-model="project.delivery_type_id" required>
                            <option value="">@lang('project.select') </option>
                            <option ng-repeat="deliveryType in deliveryTypes" value="@{{ deliveryType.id }}" ng-selected="deliveryType.id == project.delivery_type_id" >
                                @{{ deliveryType.delivery_type_name }}
                            </option>
                        </select>
                        <small class="text-danger" ng-show="createProjectForm.delivery_type_id.$invalid && createProjectForm.delivery_type_id.$toucehd">This field is required</small>

                    </div> 
                </div>
            </div> 
        </div>
        <div class="row m-0">
            <div class="col-md-6">  
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Start Date <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="date" name="start_date" ng-model="project.start_date" class="form-control form-control-sm" required>
                        <small class="text-danger" ng-show="createProjectForm.start_date.$invalid && createProjectForm.start_date.$toucehd">This field is required</small>

                    </div> 
                </div>
            </div>
            <div class="col-md-6"> 
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Delivery Date <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="date" ng-model="project.delivery_date" class="form-control form-control-sm" required>
                        <small class="text-danger" ng-show="createProjectForm.delivery_date.$invalid && createProjectForm.delivery_date.$toucehd">This field is required</small>

                    </div> 
                </div>
            </div>
        </div>
    </div>

<div class="card-footer text-end">
    <input ng-disabled ="createProjectForm.$invalid" class="btn btn-primary" type="submit" name="submit" value="Next"/>
</div>
</form>