<form class="needs-validations"  novalidate name="frm"  >
    <input type="hidden" ng-model="employeeRowId" value="@{{ employeeRowId }}" >
    {{-- <div class="row m-0">
        <div class="col-md-6 mb-1">
            <div class="my-2">                                             
                <label class="form-label">Employee ID​<sup class="text-danger">*</sup></label>
                <input ng-disabled="true" type="text" ng-model="myWelcome"  class="form-control form-control-sm"  ng-required="true">
            </div>
        </div> 
        <div class="col-md-6 mb-1">
            <div class="my-2">
                <label class="form-label" >Display Name​<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control form-control-sm"  name="epm_fname" value="" ng-model="FormData.epm_fname" placeholder="Type Here..." ng-required="true">
                <div class="error-msg">
                    <small class="error-text" ng-if="frm.epm_fname.$touched && frm.epm_fname.$error.required">This field is required!</small> 
                </div>
            </div> 
        </div>
        <div class="col-md-6 mb-1">
            <div class="my-2">
                <label class="form-label" >First name<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control form-control-sm" name="epm_lname"  ng-minlength="1" ng-model="FormData.epm_lname" placeholder="Type Here..." ng-required="true">
                <div class="error-msg">
                    <small class="error-text" ng-if="frm.epm_lname.$touched && frm.epm_lname.$error.required">This field is required!</small> 
                </div>
            </div>
        </div>  
        <div class="col-md-6 mb-1">
            <div class="my-2"> 
                <label class="form-label" for="validationCustom01">Last name<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control form-control-sm" id="validationCustom01" name="epm_username" ng-model="FormData.epm_username" placeholder="Type Here..."  ng-required="true">
                <div class="error-msg">
                    <small class="error-text" ng-if="frm.epm_username.$touched && frm.epm_username.$error.required">This field is required!</small> 
                </div>
            </div>
        </div> 
        <div class="col-md-6 mb-1">
            <div class="my-2">
                <label class="form-label" >Job Title​<sup class="text-danger">*</sup></label>
                <select class="form-select form-select-sm"  ng-model="FormData.epm_job_role" name="epm_job_role"    ng-required="true">
                    <option value="" selected>Select</option>  
                    <option value="@{{ emp.id }}" ng-repeat="(index,emp) in employee_module_role" ng-selected="FormData.epm_job_role == emp.id">@{{ emp.name }}</option>  
                </select>
                <div class="error-msg">
                    <small class="error-text" ng-if="frm.epm_job_role.$touched && frm.epm_job_role.$error.required">This field is required!</small> 
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="my-2">
                <label class="form-label" >Email Id<sup class="text-danger">*</sup></label>
                <input type="email" class="form-control form-control-sm" name="epm_email"  ng-model="FormData.epm_email" placeholder="Type Here..."  ng-required="true">
                <div class="error-msg">
                </div>
            </div>
        </div> 
        <div class="col-md-6 mb-1">
            <div class="my-2">
                <label class="form-label" >Mobile Number<sup class="text-danger">*</sup></label>
                <input  type="text" ng-pattern="/^\d{8}$|^\d{12}$/"  onkeypress="return isNumber(event)" max="12"   maxlength="12" ng-model="FormData.epm_number" class="form-control form-control-sm" id="epm_number" placeholder="Type Here..." name="epm_number"  value="" ng-required="true" />
                <div class="error-msg">
                    <small class="error-text" ng-if="frm.epm_number.$error.minlength"> 8 or 12 Number digit only</small>
                </div>
            </div>
        </div> 
        <div class="col-md-6">
            <div class="cardx my-2">
                <div class="">
                    <label for="file" class="form-label" >Select Image<sup class="text-danger"></sup></label>
                    <input type="file" class="form-control form-control-sm" onchange="angular.element(this).scope().SelectFile(event)" accept="image/png, image/jpeg, image/jpg" id="file" ng-model="FormData.file" name="file"  />
                    <div class="error-msg">
                        <small class="error-text" ng-if="frm.file.$touched && frm.file.$error.required">This field is required!</small>
                    </div>
                </div>
                <div class="card-body" ng-show="PreviewImage.length">
                    <div class="position-relative">
                        <img ng-src="@{{PreviewImage}}" id="PreviewImage" ng-show="!@{{PreviewImage}}" width="100px" ng-model="FormData.image"/>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" ng-show="deleteImageBtn" ng-click="deleteImage()">
                            <i class="fa fa-times"></i>
                        </span>
                    </div> 
                </div>
            </div>
        </div> 
        <div class="col-md-6">
            <div class="my-2">
                <label class="form-label" >Password<sup class="text-danger">*</sup></label>
                <input type="password" class="form-control form-control-sm" name="epm_password" autocomplete="off"  ng-model="FormData.epm_password" placeholder="Type Here..."  ng-required="true">
                <div class="error-msg">
                    <small class="error-text" ng-if="frm.epm_password.$touched && frm.epm_password.$error.required">This field is required!</small> 
                </div>
            </div>
        </div>
    </div>  --}}
    <div class="row m-0">
        <div class="col-md-6 p-0">
            <div class="row m-0">
                <div class="my-2 col-md-6">                                             
                    <label class="form-label">First name</label>
                    <input type="text"  class="form-control form-control-sm">
                </div>
                <div class="my-2 col-md-6">                                             
                    <label class="form-label">Last name</label>
                    <input type="text"  class="form-control form-control-sm">
                </div>
            </div>
            <div class="my-2 col-md-12 px-2">                                             
                <label class="form-label">Display name <sup class="text-danger">*</sup></label>
                <input type="text"  class="form-control form-control-sm">
            </div>
            <div class="row m-0">
                <div class="my-2 col-md-6 pe-0">                                             
                    <label class="form-label">User name <sup class="text-danger">*</sup></label>
                    <input type="text"  class="form-control form-control-sm">
                </div>
                <div class="my-2 col-md-6 ps-0">                                             
                    <label class="form-label">Last name</label>
                    <div class="d-flex align-items-center">
                        <span class="mx-2">@</span>
                        <select name="" id="" class="form-select form-select-sm">
                            <option value="">aecprefab.net</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="px-2 my-3">
                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="customCheck1">
                    <label class="form-check-label" for="customCheck1">Automatically create a password</label>
                </div>
                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="customCheck2">
                    <label class="form-check-label" for="customCheck2">Require this user to change their password when they first sign in</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="customCheck3">
                    <label class="form-check-label" for="customCheck3">Send password in email upon completion</label>
                </div>
            </div>
            <div class="my-2 col-md-12 px-2">                                             
                <label class="form-label">Email the new password to the following recipients <sup class="text-danger">*</sup></label>
                <input type="email" class="form-control form-control-sm" value="arun.kalyan@aecprefab.net">
            </div>
        </div>
        <div class="col-md-6">
            <div class="my-2 col-md-6 ps-0">                                             
                <label class="form-label">Select location</label>
                <select name="" id="" class="form-select form-select-sm">
                    <option value="">India</option>
                </select>
            </div>
            <div class="mb-0 border-top pt-3 mt-3">
                <div class="card-header border-0 p-0 pb-2" id="headingFour">
                    <h5 class="m-0">
                        <a class="custom-accordion-title d-block py-1"
                            data-bs-toggle="collapse" href="#collapseFour"
                            aria-expanded="true" aria-controls="collapseFour">
                            Licenses (0) <sup class="text-danger">*</sup>
                            <i class="mdi mdi-chevron-up accordion-arrow  float-end"></i>
                        </a>
                    </h5>
                </div>
                    
                <div id="collapseFour" class="collapse show"
                    aria-labelledby="headingFour"
                    data-bs-parent="#custom-accordion-one">
                    <div class="card-body pt-0">
                        <div class="form-check mb-2">
                            <input type="radio" checked class="form-check-input" id="customCheck5">
                            <label class="form-check-label" for="customCheck5">Automatically create a password</label>
                        </div>
                        <div class="form-check mb-2 ps-5">
                            <input type="checkbox" class="form-check-input" id="customCheck6">
                            <label class="form-check-label" for="customCheck6">
                                <strong>Microsoft 365 Business Basic</strong>
                                <div class="fw-light">You're out of licenses. if you turn this on, we'll try to buy an additional license for you.</div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-2 col-md-12 px-2">                                             
                <label class="form-label">Job title</label>
                <input type="text" class="form-control form-control-sm">
            </div>
            <div class="my-2 col-md-12 px-2">                                             
                <label class="form-label">Department</label>
                <input type="text" class="form-control form-control-sm">
            </div>
            <div class="my-2 col-md-12 px-2">                                             
                <label class="form-label">Mobile Phone</label>
                <input type="text" class="form-control form-control-sm">
            </div>
        </div>
    </div>
    <div class="text-end mt-3">
        <button class="btn btn-light font-weight-bold px-3" ng-click="image_reset()"><i class="fa fa-ban "></i> Cancel</button>
        <button ng-click="submit(modalstate, id);" ng-disabled="frm.$invalid || frm.$pending" class="btn btn-primary font-weight-bold px-3"><i class="fa fa-check-circle "></i> Next </button>
    </div>
</form>