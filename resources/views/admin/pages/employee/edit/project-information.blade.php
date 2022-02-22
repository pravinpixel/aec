<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow-lg mb-0">
            <div class="card-body p-4">
            <form class="needs-validations"  novalidate name="frm" id="frm"  >
                            <input  ng-model="FormData.key" name="key" ng-value="EmpData.id" value="EmpData.id"  ng-model="FormData.id" id="key" type="hidden" >
                                <div class="row m-0">
                                    <div class="col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col">
                                                <div class="mb-3">                                             
                                                    <label class="form-label"  >Enquiry ID <sup class="text-danger">*</sup></label>
                                                    <input ng-disabled="true" type="text"  name="epm_id" id="epm_id" ng-value="EmpData.employee_id" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                        
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >First name<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control"  name="epm_fname" id="epm_fname"   ng-value="EmpData.first_Name" placeholder="Type Here..."ng-required="true">
                                            <!-- <div class="error-msg">
                                                <small class="error-text" ng-if="frm.epm_fname.$touched && frm.epm_fname.$error.required">This field is required!</small> 
                                            </div> -->
                                        </div>
                                    </div>
                                    
                                
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Last name<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="epm_lname" id="epm_lname"  ng-value="EmpData.last_name" placeholder="Type Here..." ng-required="true">
                                            <!-- <div class="error-msg">
                                                <small class="error-text" ng-if="frm.epm_lname.$touched && frm.epm_lname.$error.required">This field is required!</small> 
                                            </div> -->
                                        </div>
                                    </div>  
                                
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom01">Username<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" id="epm_username" name="epm_username"  ng-value="EmpData.user_name"  placeholder="Type Here..."  ng-required="true">
                                                <!-- <div class="error-msg">
                                                    <small class="error-text" ng-if="frm.epm_username.$touched && frm.epm_username.$error.required">This field is required!</small> 
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Password<sup class="text-danger">*</sup></label>
                                            <input type="password" class="form-control" name="epm_password" id="epm_password"  ng-value="EmpData.password"  placeholder="Type Here..."  ng-required="true">
                                            <!-- <div class="error-msg">
                                                <small class="error-text" ng-if="frm.epm_password.$touched && frm.epm_password.$error.required">This field is required!</small> 
                                            </div> -->
                                        </div>
                                    </div>


                            <div class="col-md-6">
                                
                                <div class="mb-3">
                                    <label class="form-label" >Job Role<sup class="text-danger">*</sup></label>
                                    
                                    <select aria-label="ngSelected demo" ng-model="EmpData.job_role" name="epm_job_role" id="epm_job_role"  class="form-select">
                                        <!-- <option value="@{{ EmpData.job_role}}"   selected>@{{EmpData.job_role}}</option> -->
                                        <option value="@{{ emp.role_name }}" ng-repeat="(index,emp) in employee_module_role">@{{ emp.role_name }}</option>
                                    </select>
                                    <!-- <div class="error-msg">
                                                <small class="error-text" ng-if="frm.epm_job_role.$touched && frm.epm_job_role.$error.required">This field is required!</small> 
                                    </div> -->

                                </div>
                            </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Mobile Number<sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="epm_number" min="8" id="epm_number"   ng-value="EmpData.number" ng-maxlength="12"  ng-minlength="8"  placeholder="Type Here..."  ng-required="true">
                                            <div class="error-msg">
                                                <!-- <small class="error-text" ng-if="frm.epm_number.$error.required">This field is required!</small> -->
                                                <small class="error-text" ng-if="frm.number.$error.minlength">Minlength 8 digit only</small>
                                                <small class="error-text" ng-if="frm.number.$error.maxlength">Maxlength 12 digit only</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" >Email Id<sup class="text-danger">*</sup></label>
                                            <input type="email" class="form-control" name="epm_email" id="epm_email"  ng-value="EmpData.email"  placeholder="Type Here..."  ng-required="true">
                                            <!-- <div class="error-msg">
                                                <small class="error-text" ng-if="frm.epm_email.$touched && frm.epm_email.$error.required">This field is required!</small> 
                                                <small class="error-text" ng-if="frm.epm_email.$touched && frm.epm_email.$error.email">Please enter valid email!</small> 
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-3"> 
                                            <img src="{{ asset('/public/uploads/employees/image/') }}/@{{EmpData.image}}" width="60px">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-4">
                                       
                                        <div class="mb-3">
                                            <label class="form-label" >Select Image<sup class="text-danger">*</sup></label>
                                            <!-- <label for="files">Select Image File</label> -->
                                            <input type="file" class="form-control" id="file"  name="file" />
                                            <!-- <div class="error-msg">
                                                <small class="error-text" ng-if="frm.file.$touched && frm.file.$error.required">This field is required!</small>
                                            </div>   -->
                                        </div>
                                    </div>
                                 
                                </div>
                                <div class="text-end mt-3">
                                    <button type="reset" class="btn btn-outline-secondary font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
                                    <button  ng-click="update(modalstate, id);"  class="btn btn-primary font-weight-bold px-3"><i class="fa fa-check-circle "></i> Next </button>
                                </div>
                            </form>
               
            </div> 
        </div>
    </div>
</div>