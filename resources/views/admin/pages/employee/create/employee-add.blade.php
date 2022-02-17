<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow-lg mb-0">
            <div class="card-body p-4">
                <form class="needs-validations"  novalidate name="frm"  >
               
                    <div class="row m-0">
                        <div class="col-md-12 ">
                            <div class="m">                                             
                                <label class="form-label"  >Employee Id  <sup class="text-danger">*</sup></label>
                                <input ng-disabled="true" type="text" ng-model="myWelcome"  class="form-control"  ng-required="true">
                            </div>
                        </div> 
                            
                        <div class="col-md-6 mb-1">
                            <div class="my-2">
                                <label class="form-label" >First name<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control"  name="epm_fname"   value="" ng-model="FormData.epm_fname" placeholder="Type Here..." ng-required="true">
                                <div class="error-msg">
                                    <small class="error-text" ng-if="frm.epm_fname.$touched && frm.epm_fname.$error.required">This field is required!</small> 
                                </div>
                            </div>
                        </div>
                        
                    
                        <div class="col-md-6 mb-1">
                            <div class="my-2">
                                <label class="form-label" >Last name<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" name="epm_lname"  ng-minlength="1" ng-model="FormData.epm_lname" placeholder="Type Here..." ng-required="true">
                                <div class="error-msg">
                                    <small class="error-text" ng-if="frm.epm_lname.$touched && frm.epm_lname.$error.required">This field is required!</small> 
                                </div>
                            </div>
                        </div>  
                    
                        <div class="col-md-6 mb-1">
                            <div class="my-2"> 
                                <label class="form-label" for="validationCustom01">Username<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" id="validationCustom01" name="epm_username" ng-model="FormData.epm_username" placeholder="Type Here..."  ng-required="true">
                                <div class="error-msg">
                                    <small class="error-text" ng-if="frm.epm_username.$touched && frm.epm_username.$error.required">This field is required!</small> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-1">
                            <div class="my-2">
                                <label class="form-label" >Password<sup class="text-danger">*</sup></label>
                                <input type="password" class="form-control" name="epm_password"  ng-model="FormData.epm_password" placeholder="Type Here..."  ng-required="true">
                                <div class="error-msg">
                                    <small class="error-text" ng-if="frm.epm_password.$touched && frm.epm_password.$error.required">This field is required!</small> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-1">
                            <div class="my-2">
                                <label class="form-label" >Job Role<sup class="text-danger">*</sup></label>
                                <select  class="form-select"  ng-model="FormData.epm_job_role" name="epm_job_role"    ng-required="true">
                                    <option value="" selected>Select</option>  
                                    <option value="@{{ emp.role_name }}" ng-repeat="(index,emp) in employee_module_role">@{{ emp.role_name }}</option>  
                                </select>
                                <div class="error-msg">
                                    <small class="error-text" ng-if="frm.epm_job_role.$touched && frm.epm_job_role.$error.required">This field is required!</small> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-1">
                            <div class="my-2">
                                <label class="form-label" >Mobile Number<sup class="text-danger">*</sup></label>
                                <input type="number" class="form-control epm_number" name="epm_number" id="epm_number" ng-model="FormData.epm_number" ng-maxlength="12"  ng-minlength="8" placeholder="Type Here..."  ng-required="true">
                                <div class="error-msg">
                                    <small class="error-text" ng-if="frm.epm_number.$touched && frm.epm_number.$error.required">This field is required!</small>
                                    <small class="error-text" ng-if="frm.epm_number.$touched && frm.epm_number.$error.minlength">Minlength 8 digit only</small>
                                    <small class="error-text" ng-if="frm.epm_number.$touched && frm.epm_number.$error.maxlength">Maxlength 12 digit only</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-1">
                            <div class="my-2">
                                <label class="form-label" >Email Id<sup class="text-danger">*</sup></label>
                                <input type="email" class="form-control" name="epm_email"  ng-model="FormData.epm_email" placeholder="Type Here..."  ng-required="true">
                                <div class="error-msg">
                                    <small class="error-text" ng-if="frm.epm_email.$touched && frm.epm_email.$error.required">This field is required!</small> 
                                    <small class="error-text" ng-if="frm.epm_email.$touched && frm.epm_email.$error.email">Please enter valid email!</small> 
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-1">
                            <div class="my-2">
                                
                                <label class="form-label" >Image<sup class="text-danger">*</sup></label>
                                <input type="file" class="form-control" onchange="angular.element(this).scope().SelectFile(event)" accept="image/png, image/jpeg, image/jpg" id="file" ng-model="FormData.file" name="file" valid-file required  ng-required="true" />
                                <div class="error-msg">
                                    <small class="error-text" ng-if="frm.file.$touched && frm.file.$error.required">This field is required!</small>
                                </div>  
                    
                            </div>
                        </div>
                        <div class="col-md-6 mb-1">
                        </div>
                        <div class="col-md-6 mb-1">
                            <img ng-src="@{{PreviewImage}}" id="PreviewImage" class="form-control" ng-model="FormData.imageFile" ng-show="PreviewImage != null" alt="" style="height:100px;width:100px" />
                        </div>
                        


                    <div class="text-end mt-3">
                        <button type="reset" class="btn btn-outline-secondary font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
                        <button ng-click="submit(modalstate, id);" ng-disabled="frm.$invalid || frm.$pending" class="btn btn-primary font-weight-bold px-3"><i class="fa fa-check-circle "></i> Submit </button>
                    </div>
                </form>
               
            </div> 
        </div>
    </div>
</div>

<script>
            // app.controller('ProfileInfo', function ($scope, $http, $rootScope, API_URL){
            
            
            
            // $scope.SelectFile = function (e) {
            //     var reader = new FileReader();
            //     reader.onload = function (e) {
            //         alert()
            //         $scope.PreviewImage = e.target.result;
            //         $scope.$apply();
            //     };
 
            //     reader.readAsDataURL(e.target.files[0]);
            // };
            // });
</script>