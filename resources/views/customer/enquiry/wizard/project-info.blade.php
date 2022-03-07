<form id="projectInfoForm" ng-submit="submitProjectInfoForm()" name="projectInfoForm" method="post" class="form-horizontal" novalidate>
    <div class="row">
        <div class="col-md-4">
            <div class="form-floating  mb-2">
                <input disabled value="" ng-model="enquiry_date" type="date" class="form-control form-control-sm" id="floating"  required/>
                <label for="floating">Enquiry Date</label>
            </div>
            <div class="form-floating  mb-2">
                <input disabled type="text" class="form-control form-control-sm" id="floating"   ng-model="enquiry_number" required />
                <label for="floating">Enquiry Number</label>
            </div>         
            <div class="form-floating  mb-2">
                <input type="text"  name="company_name" id="validationCustom01" class="form-control form-control-sm"  placeholder="Type Here..."  ng-required="true" list="companyList" ng-change="getCompany(customer.company_name)" ng-model="customer.company_name" disabled/>
                <label for="floating">Company Name</label>
                <datalist id="companyList">
                    <option ng-repeat="item in companyList" value="@{{item.company}}">@{{item.company}}</option>
                </datalist>
            </div> 
            <div class="form-floating  mb-2">
                <input  type="text" class="form-control form-control-sm" id="floating" name="contact_person"  ng-model="projectInfo.contact_person" required />
                <label for="floating">Contact Person</label>
                <small class="text-danger" ng-show="projectInfo.contact_person.$touched && projectInfo.contact_person.$invalid">This field is required</small>
            </div>
            <div class="form-floating  mb-2">
                <input  type="text" pattern="{{ config('global.mobile_no_pattern') }}" maxlength="{{ config('global.mobile_no_length') }}"  onkeypress="return isNumber(event)"   ng-model="projectInfo.mobile_no" class="form-control form-control-sm" id="floating" name="mobile_no" />
                <label for="floating">Mobile Number</label>
                <small class="text-danger" ng-show="projectInfo.mobile_no.$touched && projectInfo.mobile_no.$invalid">Enter valid mobile number</small>
            </div>
            <div class="form-floating  mb-2">
                <input  value="" type="text" pattern="{{ config('global.mobile_no_pattern') }}" maxlength="{{ config('global.mobile_no_length') }}" onkeypress="return isNumber(event)"  class="form-control form-control-sm" id="floating"  name="secondary_mobile_no"   ng-model="projectInfo.secondary_mobile_no" required/>
                <label for="floating">Secondary Mobile Number</label>
                <small class="text-danger" ng-show="projectInfoForm.secondary_mobile_no.$touched && projectInfoForm.secondary_mobile_no.$invalid">Enter valid mobile number</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating"   name="project_name" ng-model="projectInfo.project_name" required/>
                <label for="floating">Project Name</label>
                <small class="text-danger" ng-show="projectInfoForm.project_name.$touched && projectInfoForm.project_name.$invalid">This field is required</small>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control form-control-sm" ng-keyup="getZipcodeData()" id="zipcode" name="zipcode" ng-model="projectInfo.zipcode" required/>
                <label for="floating">Zip Code</label>
                <small class="text-danger" ng-show="projectInfoForm.zipcode.$touched && projectInfoForm.zipcode.$invalid">This field is required</small>
            </div>
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating" name="state" ng-model="projectInfo.state" required/>
                <label for="floating">State  </label>
                <small class="text-danger" ng-show="projectInfoForm.state.$touched && projectInfoForm.state.$invalid">This field is required</small>
            </div>
            <div class="form-floating mb-2">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  name="building_type" ng-model="projectInfo.building_type_id" required>
                    <option value="">@lang('customer-enquiry.select')</option>
                    <option ng-repeat="buildingType in buildingTypes" value="@{{ buildingType.id }}" >
                        @{{ buildingType.building_type_name }}
                    </option>
                </select>
                <label for="floatingSelect">Type of Building</label>
                <small class="text-danger" ng-show="projectInfoForm.building_type.$touched && projectInfoForm.building_type.$invalid">This field is required</small>
            </div>
            <div class="form-floating mb-2">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  name="project_type"  ng-model="projectInfo.project_type_id" required>
                    <option value="">@lang('customer-enquiry.select')</option>
                    <option ng-repeat="projectType in projectTypes" value="@{{ projectType.id }}" >
                        @{{ projectType.project_type_name }}
                    </option>
                </select>
                <label for="floatingSelect">Type of Project</label>
                <small class="text-danger" ng-show="projectInfoForm.project_type.$touched && projectInfoForm.project_type.$invalid">This field is required</small>
            </div>
            <div class="form-floating  mb-2">
                <input type="date" class="form-control form-control-sm" id="project_date"  name="project_date" ng-model="projectInfo.project_date" required/>
                <label for="floating">Project Start Date</label>
                <small class="text-danger" ng-show="projectInfoForm.project_date.$touched && projectInfoForm.project_date.$invalid">This field is required</small>
            </div>
        </div> 
        <div class="col-md-4">
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating" name="site_address" ng-model="projectInfo.site_address" required/>
                <label for="floating">Site Address</label>
                <small class="text-danger" ng-show="projectInfoForm.site_address.$touched && projectInfoForm.site_address.$invalid">This field is required</small>
            </div>
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating" name="place" ng-model="projectInfo.place" required/>
                <label for="floating">Place</label>
                <small class="text-danger" ng-show="projectInfoForm.place.$touched && projectInfoForm.place.$invalid">This field is required</small>
            </div>
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating" name="country" ng-model="projectInfo.country" required/>
                <label for="floating">Country</label>
                <small class="text-danger" ng-show="projectInfoForm.country.$touched && projectInfoForm.country.$invalid">This field is required</small>
            </div>
            <div class="form-floating  mb-2">
                <input type="text" onkeypress="return isNumber(event)"  class="form-control form-control-sm" id="floating" name="no_of_building" ng-model="projectInfo.no_of_building" required/>
                <label for="floating">No of Buildings</label>
                <small class="text-danger" ng-show="projectInfoForm.no_of_building.$touched && projectInfoForm.no_of_building.$invalid">This field is required</small>
            </div>
            <div class="form-floating mb-2">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="delivery_type"  ng-model="projectInfo.delivery_type_id" required>
                    <option value="">@lang('customer-enquiry.select')</option>
                    <option ng-repeat="deliveryType in deliveryTypes" value="@{{ deliveryType.id }}" >
                        @{{ deliveryType.delivery_type_name }}
                    </option>
                </select>
                <label for="floatingSelect">Type of Delivery</label>
                <small class="text-danger" ng-show="projectInfoForm.delivery_type.$touched && projectInfoForm.delivery_type.$invalid">This field is required</small>
            </div>
            <div class="form-floating  mb-2">
                <input type="date" class="form-control" name="project_delivery_date" ng-model="projectInfo.project_delivery_date" required/>
                <label for="floating">Project Delivery Date</label>
                <small class="text-danger" ng-show="projectInfoForm.project_delivery_date.$touched && projectInfoForm.project_delivery_date.$invalid">This field is required</small>
            </div>
        </div>
    </div>
    <div class="card-footer border-0 p-0 " >
        <ul class="list-inline wizard mb-0 pt-3">
            <li class="previous list-inline-item disabled"><a href="#" class="btn btn-light border shadow-sm">Prev</a></li>
            <li class="next list-inline-item float-end"><input ng-disabled ="projectInfoForm.$invalid" class="btn btn-primary" type="submit" name="submit" value="Next"/></li>
        </ul>
    </div>
</form>

<style> 
    .projectInfoForm .timeline-step .inner-circle{
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style> 


    
    
