<form id="projectInfoForm"  method="post" class="form-horizontal">
    <div class="row">
      
        <div class="col-md-4">
            
            <div class="form-floating  mb-2">
                <input disabled value=" {{ GlobalService::dateFormat($enquiry->enquiry_date) ?? '' }}" type="text" class="form-control form-control-sm" id="floating"  required/>
                <label for="floating">Enquiry Date</label>
            </div>
            <div class="form-floating  mb-2">
                <input disabled value="{{ $enquiry->enquiry_number ?? '' }}" type="text" class="form-control form-control-sm" id="floating" required/>
                <label for="floating">Enquiry Number</label>
            </div>
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating" name="company_name" disabled value="{{ $enquiry->customer->company_name }}"/>
                <label for="floating">Company Name</label>
            </div> 
            <div class="form-floating  mb-2">
                <input  type="text" class="form-control form-control-sm" id="floating" name="contact_person" value="{{ $enquiry->customer->contact_person }}"  disabled/>
                <label for="floating">Contact Person</label>
            </div> 
            <div class="form-floating  mb-2">
                <input  type="text" class="form-control form-control-sm" id="floating" name="mobile_no"  value="{{ $enquiry->customer->mobile_no }}" disabled />
                <label for="floating">Mobile Number</label>
            </div> 
            <div class="form-floating  mb-2">
                <input  value="" type="text" class="form-control form-control-sm" id="floating"  name="secondary_mobile_no" ng-model="projectInfo.secondary_mobile_no" required/>
                <label for="floating">Secondary Mobile Number</label>
            </div> 
        </div> 
        <div class="col-md-4">
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating"   name="project_name" ng-model="projectInfo.project_name" required/>
                <label for="floating">Project Name</label>
            </div>
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating" name="zipcode" ng-model="projectInfo.zipcode" required/>
                <label for="floating">Zipcode</label>
            </div>
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating" naem="state" ng-model="projectInfo.state" required/>
                <label for="floating">State</label>
            </div>
            <div class="form-floating mb-2">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  name="building_type" ng-model="projectInfo.building_type_id" required>
                    <option ng-repeat="buildingType in buildingTypes" value="@{{ buildingType.id }}" >
                        @{{ buildingType.building_type_name }}
                    </option>
                </select>
                <label for="floatingSelect">Type of Building</label>
            </div>
            <div class="form-floating mb-2">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  name="building_type"  ng-model="projectInfo.project_type_id" required>
                    <option ng-repeat="projectType in projectTypes" value="@{{ projectType.id }}" >
                        @{{ projectType.project_type_name }}
                    </option>
                </select>
                <label for="floatingSelect">Type of Project</label>
            </div>
            <div class="form-floating  mb-2">
                <input type="date" class="form-control form-control-sm" id="project_date"  name="project_date" ng-model="projectInfo.project_date" required/>
                <label for="floating">Project Start Date</label>
            </div>
        </div> 
        <div class="col-md-4">
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating" name="site_address" ng-model="projectInfo.site_address" required/>
                <label for="floating">Site Address</label>
            </div>
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating" name="place" ng-model="projectInfo.place" required/>
                <label for="floating">Place</label>
            </div>
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating" name="country" ng-model="projectInfo.country" required/>
                <label for="floating">Country</label>
            </div>
            <div class="form-floating  mb-2">
                <input type="text" class="form-control form-control-sm" id="floating" name="no_of_building" ng-model="projectInfo.no_of_building" required/>
                <label for="floating">No of Buildings</label>
            </div>
            <div class="form-floating mb-2">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="delivery_type" ng-model="projectInfo.delivery_type_id" required>
                
                    <option ng-repeat="deliveryType in deliveryTypes" value="@{{ deliveryType.id }}" >
                        @{{ deliveryType.delivery_type_name }}
                    </option>
                </select>
                <label for="floatingSelect">Type of Delivery</label>
            </div>
            <div class="form-floating  mb-2">
                <input type="date" class="form-control"  name="project_delivery_date" ng-model="projectInfo.project_delivery_date"  required/>
                <label for="floating">Project Delivery Date</label>
            </div>
        </div>
    </div>
</form>