<form id="createProjectForm" name="createProjectForm" ng-submit="submitCreateProjectForm()">
    <div class="card-body" id="customized_card">
        <div class="row m-0 border-bottom mb-2 pb-2">
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Project ID</label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" disabled ng-model="project.reference_number"
                            class="form-control form-control-sm">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Contact Person <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" name="contact_person" ng-model="project.contact_person"
                            class="form-control form-control-sm" required>
                        <small class="text-danger"
                            ng-show="createProjectForm.contact_person.$invalid && createProjectForm.contact_person.$toucehd">This
                            field is required</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Company Name<sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" name="company_name" id="validationCustom01"
                            class="form-control form-control-sm" placeholder="Type Here..." ng-required="true"
                            list="companyList" ng-change="getCompany(project.company_name)"
                            ng-model="project.company_name" />
                        <datalist id="companyList">
                            <option ng-repeat="item in companyList" value="@{{ item.company }}">
                                @{{ item.company }}</option>
                        </datalist>

                        <small class="text-danger"
                            ng-show="createProjectForm.company_name.$invalid && createProjectForm.company_name.$toucehd">This
                            field is required</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Telephone <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" pattern="{{ config('global.mobile_no_pattern') }}"
                            maxlength="{{ config('global.mobile_no_length') }}" onkeypress="return isNumber(event)"
                            name="mobile_number" ng-model="project.mobile_number" class="form-control form-control-sm"
                            required>
                        <small class="text-danger"
                            ng-show="createProjectForm.mobile_number.$invalid && createProjectForm.mobile_number.$toucehd">This
                            field is required</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Project Name <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" name="project_name" ng-model="project.project_name"
                            class="form-control form-control-sm" required>
                        <small class="text-danger"
                            ng-show="createProjectForm.project_name.$invalid && createProjectForm.project_name.$toucehd">This
                            field is required</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Email <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" pattern="{{ config('global.email') }}" name="email"
                            ng-model="project.email" class="form-control form-control-sm" required>
                        <small class="text-danger"
                            ng-show="createProjectForm.email.$invalid && createProjectForm.email.$toucehd">This field is
                            required</small>
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
                        <input type="text" name="site_address" ng-model="project.site_address"
                            class="form-control form-control-sm" required>
                        <small class="text-danger"
                            ng-show="createProjectForm.site_address.$invalid && createProjectForm.site_address.$toucehd">This
                            field is required</small>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Zipcode <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" onkeypress="return isNumber(event)" id="zipcode" name="zipcode"
                            ng-model="project.zipcode" ng-change="getZipcode()" class="form-control form-control-sm"
                            required>
                        <small class="text-danger"
                            ng-show="createProjectForm.zipcode.$invalid && createProjectForm.zipcode.$toucehd">This
                            field is required</small>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">City <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" name="city" ng-model="project.city"
                            class="form-control form-control-sm" required>
                        <small class="text-danger"
                            ng-show="createProjectForm.city.$invalid && createProjectForm.city.$toucehd">This field is
                            required</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">State <sup class="text-danger"></sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" name="state" ng-model="project.state"
                            class="form-control form-control-sm" required>
                        <small class="text-danger"
                            ng-show="createProjectForm.state.$invalid && createProjectForm.state.$toucehd">This field
                            is required</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Country <sub class="text-danger">*</sub></label>
                    </div>
                    <div class="col pe-0">
                        <input type="text" name="country" ng-model="project.country"
                            class="form-control form-control-sm" required>
                        <small class="text-danger"
                            ng-show="createProjectForm.country.$invalid && createProjectForm.country.$toucehd">This
                            field is required</small>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">No.of Buildings <sup class="text-danger"></sup></label>
                    </div>
                    <div class="col pe-0">
                        <input type="number" onkeypress="return isNumber(event)" min="1"
                            name="no_of_building_id" ng-model="project.no_of_building"
                            class="form-control form-control-sm" required>
                        <small class="text-danger"
                            ng-show="createProjectForm.no_of_building_id.$invalid && createProjectForm.no_of_building_id.$toucehd">This
                            field is required</small>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Type of Building<sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                            name="building_type_id" ng-model="project.building_type_id" required>
                            <option value="">@lang('project.select') </option>
                            <option ng-repeat="buildingType in buildingTypes" value="@{{ buildingType.id }}"
                                ng-selected="buildingType.id == project.building_type_id">
                                @{{ buildingType.building_type_name }}
                            </option>
                        </select>
                        <small class="text-danger"
                            ng-show="createProjectForm.building_type_id.$invalid && createProjectForm.building_type_id.$toucehd">This
                            field is required</small>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Type of Project <sup class="danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                            name="project_type_id" ng-model="project.project_type_id" required>
                            <option value="">@lang('project.select') </option>
                            <option ng-repeat="projectType in projectTypes" ng-value="@{{ projectType.id }}"
                                ng-selected="projectType.id == project.project_type_id">
                                @{{ projectType.project_type_name }}
                            </option>
                        </select>
                        <small class="text-danger"
                            ng-show="createProjectForm.project_type_id.$invalid && createProjectForm.project_type_id.$toucehd">This
                            field is required</small>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Type of Delivery <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                            name="delivery_type_id" ng-model="project.delivery_type_id" required>
                            <option value="">@lang('project.select') </option>
                            <option ng-repeat="deliveryType in deliveryTypes" value="@{{ deliveryType.id }}"
                                ng-selected="deliveryType.id == project.delivery_type_id">
                                @{{ deliveryType.delivery_type_name }}
                            </option>
                        </select>
                        <small class="text-danger"
                            ng-show="createProjectForm.delivery_type_id.$invalid && createProjectForm.delivery_type_id.$toucehd">This
                            field is required</small>

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
                        <div class="cusInp">
                            <datepicker date-format="dd-MM-yyyy" date-min-limit="{{ \Carbon\Carbon::yesterday()->format('Y-m-d') }}"
                                date-set="project.start_date" style="width:70% !important">
                                <input type="text" name="start_date" ng-model="project.start_date"
                                    class="form-control form-control-sm" required id="start_date"
                                    ng-change="checkDate(project.start_date)"
                                    placeholder="DD/MM/YYYY"
                                    autocomplete="off">
                            </datepicker>
                        </div>
                        <small class="text-danger"
                            ng-show="createProjectForm.start_date.$invalid && createProjectForm.start_date.$toucehd">This
                            field is required</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row m-0 align-items-center">
                    <div class="col-3 mb-2 p-0">
                        <label class="col-form-label">Delivery Date <sup class="text-danger">*</sup></label>
                    </div>
                    <div class="col pe-0">
                        <div class="cusInp">
                            <datepicker date-format="dd-MM-yyyy" date-min-limit="@{{ min_date==null ? projectDates : min_date }}"
                                date-set="project.delivery_date" style="width:70% !important">
                                <input type="text" name="delivery_date" ng-model="project.delivery_date"
                                    class="form-control form-control-sm" required id="end_date"
                                    placeholder="DD/MM/YYYY"
                                    autocomplete="off">
                            </datepicker>
                        </div>
                        <small class="text-danger"
                            ng-show="createProjectForm.delivery_date.$invalid && createProjectForm.delivery_date.$toucehd">This
                            field is required</small>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer text-end">
        <input ng-disabled="createProjectForm.$invalid" class="btn btn-primary" type="submit" name="submit"
            value="Next" />
    </div>
</form>
<style>
    .Create_Project .timeline-step .inner-circle {
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }

    #start_date {
        border: none !important;
    }

    #end_date {
        border: none !important;
    }

    .cusInp {
        width: 100%;
        border: 1px solid #DEE2E6;
        border-radius: 5px;
        height: 35px;
        position: relative;
    }

    .cusInp::after {
        font-family: bootstrap-icons !important;
        content: '\F1EA';
        position: absolute;
        height: 100%;
        width: 30px;
        right: 0;
        top: 0;
        z-index: 111;
        display: flex;
        justify-content: center;
        align-items: center;
        color: gray;
    }

    datepicker::after {
        display: none !important;
    }
</style>
