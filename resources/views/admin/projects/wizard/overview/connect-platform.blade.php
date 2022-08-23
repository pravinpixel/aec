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
                        <input type="checkbox" id="switch0" disabled data-switch="none"/>
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
                        <input type="checkbox" id="switch1" disabled data-switch="none"/>
                        <label for="switch1" class="border" data-on-label="" data-off-label=""></label>
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
                        <input type="checkbox" id="switch2" disabled data-switch="none"/>
                        <label for="switch2" class="border" data-on-label="" data-off-label=""></label>
                    </div>
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
            <div class="card-body">
                <div class="row m-0 "> 
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Project Name</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{ project.project_name }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Project Type</label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0 ">@{{ review.project_type }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Project Start Date</label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0 ">@{{ project.start_date  | date: 'dd-MM-yyyy' }}</div>
                            </div> 
                        </div>  
                    </div>
                    <div class="col-md-6"> 
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label"> Project End Date </label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0 ">@{{ project.delivery_date  | date: 'dd-MM-yyyy' }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">BIM 360 Language</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="col pe-0"> 
                                    <select name="language" ng-model="project.language" id="language" class="form-control form-select-sm  border-0"  style="pointer-events:none">
                                        <option value=""> @lang('project.select') </option>
                                        @foreach(config('project.languages') as $key => $value)
                                            <option value="{{ $key }}"> {{  $value }} </option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div> 
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Project Time Zone</label>
                            </div>
                            <div class="col pe-0">
                                <select name="time_zone" ng-model="project.time_zone" id="time_zone"  class="form-control form-select-sm border-0" style="pointer-events:none">
                                    <option value=""> @lang('project.select') </option>
                                    @foreach(config('project.time_zones') as $key => $value)
                                        <option value="{{ $key }}"> {{  $value }} </option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Address Line 1</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{ project.address_one }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Address Line 2</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{ project.address_two }}</div>
                            </div> 
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Zipcode</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{ project.zipcode }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">City</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{project.city }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">State</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{project.state }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Country</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{ project.country }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-12"> 
                        <div class="row m-0 align-items-center">
                            <div class="col-4 p-0">
                                <label class="col-form-label">Should the project be linked to a customer ? </label>
                            </div> 
                            <div class="col pe-0">
                                <i class="fa fa-check-circle text-primary me-1"></i>  @{{ project.linked_to_customer == 0 ? 'No' : 'Yes' }}
                            </div>
                        </div>
                    </div>
                    
                </div> 
            </div>
        </div>
        <div class="tab-pane p-3" id="Project-Leader">
            <div class="card-body">
                <div class="row m-0 "> 

                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Project ID</label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0 ">@{{ project.reference_number }}</div>
                            </div> 
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Project Name</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{ project.project_name }}</div>
                            </div> 
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Project Start Date</label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0 ">@{{ project.start_date  | date: 'dd-MM-yyyy' }}</div>
                            </div> 
                        </div>  
                    </div>
                    <div class="col-md-6"> 
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label"> Project End Date </label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0 ">@{{ project.delivery_date  | date: 'dd-MM-yyyy' }}</div>
                            </div> 
                        </div>
                    </div>
                    
                </div> 
            </div>
        </div>
    </div>
</div>