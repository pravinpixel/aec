<div class="  mb-0">
    <div class="card-body p-4">
        <form class="needs-validations ng-pristine ng-invalid ng-invalid-required ng-valid-minlength" novalidate="" name="frm">
            <div class="row m-0">
                <div class="col-md-12 p-0">
                    <div class="row m-0">
                        <div class="col">
                            <div class="mb-2">                                             
                                <label class="form-label" for="validationCustom01">Enquiry Number  <sup class="text-danger">*</sup></label>
                                <input ng-disabled="true" type="text" class="form-control" disabled="disabled" value="ENQ-56">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label class="form-label" for="validationCustom02">Enquiry Date <sup class="text-danger">*</sup></label>
                                <input ng-disabled="true" type="text" value="2021-12-20" class="form-control" disabled="disabled">
                                <input style="position: absolute;opacity:0" type="radio" ng-checked="true" value="2021-12-20" ng-model="module.enquiry_date" name="enquiry_date" class="ng-pristine ng-untouched ng-valid ng-empty" checked="checked">
                            </div>  
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label class="form-label" for="validationCustom02">Password </label>
                                <input type="text" class="form-control" id="validationCustom02" placeholder="Auto generated password" ng-disabled="true" disabled="disabled">
                            </div> 
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-2">
                        <label class="form-label" for="validationCustom02">User Name<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="user_name" id="validationCustom02" ng-model="module.user_name" placeholder="Type Here..." ng-required="true" required="required">
                        <span class="help-inline ng-hide" ng-show="frm.user_name.$invalid &amp;&amp; frm.user_name.$touched"><small class="text-danger">field is required</small></span>
                        <span class="help-inline ng-hide" ng-show="frm.user_name.$valid &amp;&amp; frm.user_name.$touched"><small class="text-success">Looks good!</small></span>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="mb-2">
                        <label class="form-label" for="validationCustom02">Contact Person<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-minlength" name="contact_person" id="validationCustom02" ng-minlength="3" ng-model="module.contact_person" placeholder="Type Here..." ng-required="true" required="required">
                        <span class="help-inline ng-hide" ng-show="frm.contact_person.$invalid &amp;&amp; frm.contact_person.$touched"><small class="text-danger">field is required</small></span>
                        <span class="help-inline ng-hide" ng-show="frm.contact_person.$valid &amp;&amp; frm.contact_person.$touched"><small class="text-success">Looks good!</small></span>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>  
              
                <div class="col-md-6">
                    <div class="mb-2">
                        <label class="form-label" for="validationCustom01">Email \ E-Post<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" id="validationCustom01" name="email" ng-model="module.email" placeholder="Type Here..." ng-required="true" required="required">
                        <span class="help-inline ng-hide" ng-show="frm.email.$invalid &amp;&amp; frm.email.$touched"><small class="text-danger">field is required</small></span>
                        <span class="help-inline ng-hide" ng-show="frm.email.$valid &amp;&amp; frm.email.$touched"><small class="text-success">Looks good!</small></span>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label class="form-label" for="validationCustom02">Telephone<sup class="text-danger">*</sup></label>
                        <input type="number" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="mobile_number" id="validationCustom02" ng-model="module.mobile_number" placeholder="Type Here..." ng-required="true" required="required">
                        <span class="help-inline ng-hide" ng-show="frm.mobile_number.$invalid &amp;&amp; frm.mobile_number.$touched"><small class="text-danger">field is required</small></span>
                        <span class="help-inline ng-hide" ng-show="frm.mobile_number.$valid &amp;&amp; frm.mobile_number.$touched"><small class="text-success">Looks good!</small></span>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-2">
                        <label class="form-label" for="validationCustom01">Company Name<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="company_name" id="validationCustom01" ng-model="module.company_name" placeholder="Type Here..." ng-required="true" required="required">
                        <span class="help-inline ng-hide" ng-show="frm.company_name.$invalid &amp;&amp; frm.company_name.$touched"><small class="text-danger">field is required</small></span>
                        <span class="help-inline ng-hide" ng-show="frm.company_name.$valid &amp;&amp; frm.company_name.$touched"><small class="text-success">Looks good!</small></span>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="col-form-label col-md-12">Remarks <small class="text-scondary">(Optional)</small></label>
                    <textarea name="remarks" id="" style="height: 100px" class="form-control form-control-sm" cols="150" placeholder="Type Here..." spellcheck="false"></textarea>
                </div>
            </div> 
        </form> 
    </div> 
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <div>
                <a disabled style="opacity: 0" class="btn btn-outline-primary">Prev</a>
            </div>
            <div>
                <a href="#!/Project_Info" class="btn btn-primary">Next</a>
            </div>
        </div>
    </div>  
    </div>
</div>


@if (Route::is('admin-enquiry-wiz')) 
    <style>
       .admin-enquiry-wiz .timeline-step .inner-circle{
            background: #757CF2 !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        }
    </style>
@endif