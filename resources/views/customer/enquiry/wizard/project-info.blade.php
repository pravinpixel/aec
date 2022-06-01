<form id="projectInfoForm" ng-submit="submitProjectInfoForm(projectInfoForm.$invalid)" name="projectInfoForm" method="post" class="form-horizontal" novalidate>
    <div class="row">
        <div class="col-md-4">
            <div class="form-floating  mb-2">
                <input disabled value="" ng-model="enquiry_date" type="date" class="form-control form-control-sm" id="floating"  required/>
                <label for="floating">Enquiry Date <sup class="text-danger">*</sup></label>
            </div>
            <div class="form-floating  mb-2">
                <input disabled type="text" class="form-control form-control-sm" id="floating"   ng-model="enquiry_number" required />
                <label for="floating">Enquiry Number <sup class="text-danger">*</sup></label>
            </div>         
            <div class="form-floating  mb-2">
                <input type="text"  name="company_name" id="validationCustom01" class="form-control form-control-sm"  placeholder="Type Here..."  ng-required="true" list="companyList" ng-change="getCompany(customer.company_name)" ng-model="customer.company_name" disabled/>
                <label for="floating">Company Name <sup class="text-danger">*</sup></label>
                <datalist id="companyList">
                    <option ng-repeat="item in companyList" value="@{{item.company}}">@{{item.company}}</option>
                </datalist>
            </div> 
            <div class="form-floating  mb-2">
                <input  type="text" class="form-control form-control-sm" id="floating" name="contact_person"  ng-model="projectInfo.contact_person" required />
                <label for="floating">Contact Person <sup class="text-danger">*</sup></label>
                <small class="text-danger" ng-show="projectInfo.contact_person.$touched && projectInfo.contact_person.$invalid && formSubmit">This field is required</small>
            </div>
            <div class="form-floating  mb-2">
                <input  type="text" pattern="{{ config('global.mobile_no_pattern') }}" maxlength="{{ config('global.mobile_no_length') }}"  onkeypress="return isNumber(event)"   ng-model="projectInfo.mobile_no" class="form-control form-control-sm" id="floating" name="mobile_no" />
                <label for="floating">Contact Number <sup class="text-danger">*</sup></label>
                <small class="text-danger" ng-show="projectInfo.mobile_no.$invalid && formSubmit">Enter valid contact number</small>
            </div>
            <div class="form-floating  mb-2">
                <input  value="" type="text" pattern="{{ config('global.mobile_no_pattern') }}" maxlength="{{ config('global.mobile_no_length') }}" onkeypress="return isNumber(event)"  class="form-control form-control-sm" id="floating"  name="secondary_mobile_no"   ng-model="projectInfo.secondary_mobile_no"/>
                <label for="floating">Secondary Contact Number</label>
                <small class="text-danger" ng-show="projectInfoForm.secondary_mobile_no.$invalid && formSubmit">Enter valid contact number</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating"   name="project_name" ng-model="projectInfo.project_name" required/>
                <label for="floating">Project Name <sup class="text-danger">*</sup></label>
                <small class="text-danger" ng-show="projectInfoForm.project_name.$invalid && formSubmit">This field is required</small>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control form-control-sm" ng-keyup="getZipcodeData()" id="zipcode" name="zipcode" ng-model="projectInfo.zipcode" required/>
                <label for="floating">Zip Code <sup class="text-danger">*</sup></label>
                <small class="text-danger" ng-show="projectInfoForm.zipcode.$invalid && formSubmit">This field is required</small>
            </div>
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating" name="state" ng-model="projectInfo.state" required/>
                <label for="floating">State  <sup class="text-danger">*</sup></label>
                <small class="text-danger" ng-show="projectInfoForm.state.$invalid && formSubmit">This field is required</small>
            </div>
            <div class="form-floating mb-2">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  name="building_type" ng-model="projectInfo.building_type_id" required>
                    <option value="">@lang('customer-enquiry.select') </option>
                    <option ng-repeat="buildingType in buildingTypes" value="@{{ buildingType.id }}"  ng-selected="buildingType.id == projectInfo.building_type_id">
                        @{{ buildingType.building_type_name }}
                    </option>
                </select>
                <label for="floatingSelect">Type of Building <sup class="text-danger">*</sup></label>
                <small class="text-danger" ng-show="projectInfoForm.building_type.$invalid && formSubmit">This field is required</small>
            </div>
            <div class="form-floating mb-2">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  name="project_type"  ng-model="projectInfo.project_type_id" required>
                    <option value="">@lang('customer-enquiry.select')</option>
                    <option ng-repeat="projectType in projectTypes" value="@{{ projectType.id }}" ng-selected="projectType.id == projectInfo.project_type_id">
                        @{{ projectType.project_type_name }}
                    </option>
                </select>
                <label for="floatingSelect">Type of Project <sup class="text-danger">*</sup></label>
                <small class="text-danger" ng-show="projectInfoForm.project_type.$invalid && formSubmit">This field is required</small>
            </div>
            <div class="form-floating  mb-2">
                <input type="date" class="form-control form-control-sm" id="project_date"  name="project_date" ng-model="projectInfo.project_date" required/>
                <label for="floating">Project Start Date <sup class="text-danger">*</sup></label>
                <small class="text-danger" ng-show="projectInfoForm.project_date.$invalid && formSubmit">This field is required</small>
            </div>
        </div> 
        <div class="col-md-4">
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating" name="site_address" ng-model="projectInfo.site_address" required/>
                <label for="floating">Site Address <sup class="text-danger">*</sup></label>
                <small class="text-danger" ng-show="projectInfoForm.site_address.$invalid && formSubmit">This field is required</small>
            </div>
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating" name="place" ng-model="projectInfo.place" required/>
                <label for="floating">City <sup class="text-danger">*</sup></label>
                <small class="text-danger" ng-show="projectInfoForm.place.$invalid && formSubmit">This field is required</small>
            </div>
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating" name="country" ng-model="projectInfo.country" required/>
                <label for="floating">Country <sup class="text-danger">*</sup></label>
                <small class="text-danger" ng-show="projectInfoForm.country.$invalid && formSubmit">This field is required</small>
            </div>
            <div class="form-floating  mb-2">
                <input type="text" onkeypress="return isNumber(event)"  class="form-control form-control-sm" id="floating" name="no_of_building" ng-model="projectInfo.no_of_building" required/>
                <label for="floating">No of Buildings <sup class="text-danger">*</sup></label>
                <small class="text-danger" ng-show="projectInfoForm.no_of_building.$invalid && formSubmit">This field is required</small>
            </div>
            <div class="form-floating mb-2">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="delivery_type"  ng-model="projectInfo.delivery_type_id" required>
                    <option value="">@lang('customer-enquiry.select')</option>
                    <option ng-repeat="deliveryType in deliveryTypes" value="@{{ deliveryType.id }}" ng-selected="deliveryType.id == projectInfo.delivery_type_id">
                        @{{ deliveryType.delivery_type_name }}
                    </option>
                </select>
                <label for="floatingSelect">Type of Delivery <sup class="text-danger">*</sup></label>
                <small class="text-danger" ng-show="projectInfoForm.delivery_type.$invalid && formSubmit">This field is required</small>
            </div>
            
            <div class="form-floating  mb-2">
                <input type="date" class="form-control" name="project_delivery_date" ng-model="projectInfo.project_delivery_date" required/>
                <label for="floating">Project Delivery Date <sup class="text-danger">*</sup></label>
                <small class="text-danger" ng-show="projectInfoForm.project_delivery_date.$invalid && formSubmit">This field is required</small>
            </div>
        </div>
    </div>
            {{-- <form id="project_information__commentsForm" ng-submit="sendComments('project_information','Customer')" class="input-group mt-3">
                                            <input required type="text" ng-model="project_information__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
                                            <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                                        </form>   --}}
                                         
    <comment ng-show="commentShow" data="
    {'modalState':'viewConversations',
    'type': 'project_information', 
    'header':'Project Information',
    'enquiry_id':enquiry_id,
    send_by: {{ Customer()->id }}
    }">
    </comment>
    <div class="card-footer border-0 p-0">
        <ul class="list-inline wizard mb-0 pt-3">
            <li class="previous list-inline-item disabled"><a href="#" class="btn btn-light border shadow-sm">Prev</a></li>
            <li class="next list-inline-item float-end"><input  class="btn btn-primary" type="submit" name="submit" value="Next"/></li>
            <li class="next list-inline-item float-end mx-2"><input  class="btn btn-light border shadow-sm" ng-click="ProjectInfoSaveAndSubmit(projectInfoForm.$invalid)" type="button" name="submit"  value="Save & Submit Later"/></li>
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


    
    
