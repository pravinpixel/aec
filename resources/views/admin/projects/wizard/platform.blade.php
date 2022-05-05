<form id="connectPlatformForm" name="connectPlatformForm" ng-submit="submitConnectPlatformForm()">
    <div class="card-body">   
    <div class="row m-0 justify-content-center align-items-center">
        <div class="col-12 row m-0">
            <div class="col border p-1 px-2 m-1 shadow rounded-pill border-primary">
                <div class="row m-0 align-items-center">
                    <div class="col-md d-flex align-items-center">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSS3pxBW14LCWAvNVLwZOt8WD6fTVf0q2qi_29x4rX1xqeV-VIZbkVDGndQcK59_VW9tH4&usqp=CAU" width="30px" class="me-3">
                        <b>Share Point</b>
                    </div>
                    <div class="col-4 text-end">
                        <input type="checkbox" id="switch0" ng-model="sharepoint"  ng-value="2" ng-click="updateConnectionPlatform('sharepoint')" data-switch="none"/>
                        <label for="switch0" class="border" data-on-label="" data-off-label=""></label>
                    </div>
                </div>
            </div> 
            <div class="col border p-1 px-2 m-1 shadow rounded-pill border-primary">
                <div class="row m-0 align-items-center">
                    <div class="col-md d-flex align-items-center">
                        <img src="https://www.autodesk.com/bim-360/app/themes/bim360/assets/img/favicons/favicon.ico" width="30px" class="me-3">
                        <b>BIM 360</b>
                    </div>
                    <div class="col-4 text-end">
                        <input type="checkbox" id="switch1"  ng-model="bim" ng-value="2" ng-click="updateConnectionPlatform('bim')" data-switch="none"/>
                        <label for="switch1" class="border"  data-on-label="" data-off-label=""></label>
                    </div>
                </div>
            </div>
            <div class="col border p-1 px-2 m-1 shadow rounded-pill border-primary">
                <div class="row m-0 align-items-center">
                    <div class="col-md d-flex align-items-center">
                        <img src="https://i.ytimg.com/an/zRM0HdaPD4zy71zHDYeB2w/featured_channel.jpg?v=5cad0ca7" width="30px" class="me-3">
                        <b>24 /7 Office</b>
                    </div>
                    <div class="col-4 text-end">
                        <input type="checkbox" id="switch2" ng-model="tsoffice"  ng-value="2" ng-click="updateConnectionPlatform('tsoffice')"  data-switch="none"/>
                        <label for="switch2" class="border" data-on-label="" data-off-label=""></label>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#Sharepoint" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                    <span class="d-none d-md-block">Sharepoint</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#BIM-360" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                    <span class="d-none d-md-block">BIM 360</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#Project-Leader" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                    <span class="d-none d-md-block">24/7 Office</span>
                </a>
            </li>
        </ul>
        <div class="tab-content border border-top-0">
            <div class="tab-pane p-3  show active" id="Sharepoint">
                <div class="dx-viewport">
                    <div class="demo-container">
                      <div id="file-manager"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane p-3" id="BIM-360">
                <div class="row m-0">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <small>* Project Name</small>
                            <input name="project_name" ng-model="project.project_name" type="text" class="form-control form-control-sm" required>
                        </div>
                        <div class="mb-3">
                            <small>* Project Type</small>
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  name="bim_project_type" ng-model="project.bim_project_type" required>
                                <option value="">@lang('project.select') </option>
                                <option ng-repeat="projectType in projectTypes" value="@{{ projectType }}" >
                                    @{{ projectType }}
                                </option>
                            </select>
                        </div>
                        <div class="row mx-0 mb-3">
                            <div class="col-6 px-0 pe-1">
                                <small>* Project Start Date</small>
                                <input type="date" ng-model="project.start_date" name="project_start_date" class="form-control form-control-sm" required>
                            </div>
                            <div class="col-6 px-0 ps-1">
                                <small>* Project End Date</small>
                                <input type="date"  ng-model="project.delivery_date" name="project_end_date"  class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <small>* BIM 360 Language</small>
                            <select name="language" ng-model="project.language" id="language" class="form-select form-select-sm" required>
                                <option value=""> @lang('project.select') </option>
                                @foreach(config('project.languages') as $key => $value)
                                    <option value="{{ $key }}"> {{  $value }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <small> Project Address</small>
                            <input type="text" name="address_one" ng-model="project.address_one" class="form-control form-control-sm mb-1" placeholder="Address Line 1">
                            <input type="text" name="address_two" ng-model="project.address_two" class="form-control form-control-sm mb-1" placeholder="Address Line 2">
                            <div class="d-flex">
                                <input type="text"  name="city" ng-model="project.city" class="form-control form-control-sm mb-1 me-1" placeholder="City" required>
                                <input type="text" name="zipcode" ng-model="project.zipcode" class="form-control form-control-sm mb-1 ms-1" placeholder="Postal Code" required>   
                            </div>
                            <div class="d-flex">
                                <input type="text" name="state" ng-model="project.state" class="form-control form-control-sm mb-1" required>
                                <input type="text" name="country" ng-model="project.country" class="form-control form-control-sm mb-1 ms-1" required>
                            </div>
                        </div>
                        <div>
                            <small> Project Time Zone</small>
                            <select name="time_zone" ng-model="project.time_zone" id="time_zone" class="form-select form-select-sm">
                                <option value=""> @lang('project.select') </option>
                                @foreach(config('project.time_zones') as $key => $value)
                                    <option value="{{ $key }}"> {{  $value }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane p-3" id="Project-Leader">
                <div class="col-md-6 mx-auto">
                    <div class="mb-3">
                        <small>Project ID</small>
                        <input type="text" readonly ng-model="project.reference_number" name="reference_number" id="reference_number" class="form-control">
                    </div>
                    <div class="mb-3">
                        <small>Project Name</small>
                        <input type="text" name="project_name" ng-model="project.project_name" class="form-control form-control-sm">
                    </div>
                    <div class="row mx-0 mb-3">
                        <div class="col-6 px-0 pe-1">
                            <small>Project Start Date</small>
                            <input type="date" name="start_date" ng-model="project.start_date" class="form-control form-control-sm">
                        </div>
                        <div class="col-6 px-0 ps-1">
                            <small>Project End Date</small>
                            <input type="date" name="delivery_date" ng-model="project.delivery_date" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="mb-3">
                        <input ng-checked="project.linked_to_customer== 1" type="checkbox" ng-model="project.linked_to_customer" class="form-check-input me-2 mb-2" id=""><small>Should the project be linked to a customer ?</small>
                        <input ng-show="project.linked_to_customer" readonly type="text" name="customer" ng-model="enquiry.customer.first_name" class="form-control form-control-sm">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-footer text-end">
    <a href="#!/" class="btn btn-light float-start">Prev</a>
    <input type="submit" class="btn btn-primary" value="Next" ng-disabled="connectPlatformForm.$invalid">
</div>
</form>
{{-- <link href="{{ asset('public/assets/css/vendor/jstree.min.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('public/assets/js/vendor/jstree.min.js') }}"></script>
<script src="{{ asset('public/assets/js/pages/demo.jstree.js') }}"></script> --}}
 