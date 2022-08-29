<form class="needs-validations"  novalidate name="frm" id="frm"  > 
   
    <input ng-model="FormData.key" name="key" ng-value="EmpData.id" value="EmpData.id"  ng-model="FormData.id" id="key" type="hidden" >
    <div class="row m-0">
        <div class="col-md-6"> 
            <div class="mb-3">                                             
                <label class="form-label"> Employee ID <sup class="text-danger">*</sup></label>
                <input ng-disabled="true" type="text" name="epm_id" id="epm_id" ng-value="EmpData.employee_id" class="form-control" required>
            </div> 
        </div> 
        <div class="col-md-6">
            <div class="mb-3">
                <div class="mb-3">
                    <label class="form-label" for="validationCustom01">Display Name​<sup class="text-danger">*</sup></label>
                    <input type="text" required class="form-control" id="epm_username" name="epm_username"  ng-value="EmpData.user_name"  placeholder="Type Here..."  ng-required="true" required>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" >First name<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control"  name="epm_fname" id="epm_fname"   ng-value="EmpData.first_name" placeholder="Type Here..."ng-required="true" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" >Last name<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" name="epm_lname" id="epm_lname"  ng-value="EmpData.last_name" placeholder="Type Here..." ng-required="true" required>
            </div>
        </div>   
        {{--         
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" >Password<sup class="text-danger">*</sup></label>
                <input type="password" class="form-control" name="epm_password" id="epm_password"  ng-value="EmpData.password"  placeholder="Type Here..."  ng-required="true">
            </div>
        </div> --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" > Job Title​<sup class="text-danger" required>*</sup></label>
                <select aria-label="ngSelected demo" ng-model="EmpData.job_role" name="epm_job_role" id="epm_job_role"  class="form-select">
                    <option value="@{{ emp.id }}" ng-repeat="(index,emp) in employee_module_role">@{{ emp.name }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" >Email Id<sup class="text-danger" required>*</sup></label>
                <input type="email" class="form-control" name="epm_email" id="epm_email" readonly ng-value="EmpData.email"  placeholder="Type Here..."  ng-required="true">
            </div>
        </div>  
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" >Mobile Number<sup class="text-danger" required>*</sup></label>
                <input type="number"  class="form-control" name="epm_number" min="8" id="epm_number"   ng-value="EmpData.number" ng-maxlength="12"  ng-minlength="8"  placeholder="Type Here..."  ng-required="true">
                <div class="error-msg">
                    <small class="error-text" ng-if="frm.number.$error.minlength">Minlength 8 digit only</small>
                    <small class="error-text" ng-if="frm.number.$error.maxlength">Maxlength 12 digit only</small>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="cardx row m-0">
                <div class="col-9 p-0">
                    <label for="file" class="form-label" >Select Image</label>
                    <input type="file" class="form-control" id="file"  name="file" /> 
                    <div class="error-msg">
                        <small class="error-text" ng-if="frm.file.$touched && frm.file.$error.required">This field is required!</small>
                    </div>
                    <button class="btn btn-sm btn-warning mt-3"><i class="fa fa-refresh"></i> Reset email Password​</button>
                </div>
                <div class="card-body col-3">
                    <div class="position-relative" style="width: 100px"> 
                        <span ng-if="EmpData.image">
                            <img src="{{ asset('/public/assets/images/') }}/@{{EmpData.image}}"  class="w-100">
                        </span>
                        <span ng-if="!EmpData.image">
                            <img src="{{ asset('/public/assets/images/no_image.jpg') }}"  class="w-100">
                        </span>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" ng-show="deleteImageBtn" ng-click="deleteImage()">
                            <i class="fa fa-times"></i>
                        </span>
                    </div> 
                </div> 
            </div>
        </div>
    </div> 
</form>   
<div class="card-footer text-end mt-3 pt-3">
    <button type="reset" class="btn btn-outline-danger font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
    <button  ng-click="update(modalstate, id);"  class="btn btn-primary font-weight-bold px-3"><i class="fa fa-check-circle "></i> Next </button>
</div> 