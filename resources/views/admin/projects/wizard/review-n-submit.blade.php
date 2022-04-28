<div class="card-body">
    <fieldset class="accordion-item">
        <div class="accordion-header custom m-0 position-relative" id="project_infomation_header">
            <div class="accordion-button " data-bs-toggle="collapse" data-bs-target="#project_infomation" aria-expanded="true" aria-controls="project_infomation">
                <span class="position-relative btn py-0"><b>Project Infomation</b></span> 
            </div>
            <div class="icon m-0 position-absolute rounded-pills" style="right: 10px;top:30%; z-index:111 !important">
                <i data-bs-toggle="collapse" 
                    href="#project_infomation" 
                    aria-expanded="false" 
                    aria-controls="project_infomation" 
                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn ">
                </i>
            </div>
        </div>
        <div id="project_infomation" class="accordion-collapse collapse show" aria-labelledby="project_infomation_header" >
            <div class="card-body">
                <div class="row m-0 "> 
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Project ID</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{ review['reference_number'] }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Project Name</label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0 ">@{{ review['project_name'] }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Telephone</label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0 ">@{{ review['mobile_number'] }}</div>
                            </div> 
                        </div>  
                    </div>
                    <div class="col-md-6"> 
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Contact Person</label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0 ">@{{ review['contact_person'] }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Company</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{ review['company_name'] }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Email</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{ review['email'] }} </div>
                            </div> 
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Site Address</label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0 ">@{{ review['site_address'] }}</div>
                            </div> 
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Country</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{ review['country'] }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Zipcode</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{ review['zipcode'] }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Start  Date</label>
                            </div>
                            <div class="col pe-0">  
                                <div class="form-control form-control-sm  border-0 ">@{{ review['start_date'] }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">State</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{ review['state'] }}</div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Type of Building</label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0 ">@{{ review['no_of_building'] }}</div> 
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Type of Project</label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0 ">@{{ review['project_type'] }}</div>  
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Type of Delivery</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{ review['delivery_type'] }}</div>  
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-3  p-0">
                                <label class="col-form-label">Delivery Date</label>
                            </div>
                            <div class="col pe-0"> 
                                <div class="form-control form-control-sm  border-0 ">@{{ review['delivery_date'] }}</div>  
                            </div> 
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </fieldset>
    <fieldset class="accordion-item">
        <div class="accordion-header custom m-0 position-relative" id="connection_plateforms_header">
            <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#connection_plateforms" aria-expanded="false" aria-controls="connection_plateforms">
                <span class="position-relative btn py-0"><b>Connect Platform</b></span> 
            </div>
            <div class="icon m-0 position-absolute rounded-pills  " style="right: 10px;top:30%; z-index:111 !important">
                <i data-bs-toggle="collapse" 
                    href="#connection_plateforms" 
                    aria-expanded="true" 
                    aria-controls="connection_plateforms" 
                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "
                    >
                </i>
            </div>
        </div>
        <div id="connection_plateforms" class="accordion-collapse collapse" aria-labelledby="connection_plateforms_header" >
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
                                    <input type="checkbox" id="switch0" data-switch="none"/>
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
                                    <input type="checkbox" id="switch1" data-switch="none"/>
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
                                    <input type="checkbox" id="switch1" data-switch="none"/>
                                    <label for="switch1" class="border" data-on-label="" data-off-label=""></label>
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
                                            <div class="form-control form-control-sm  border-0 ">@{{ project.start_date  | date: 'yyyy-MM-dd' }}</div>
                                        </div> 
                                    </div>  
                                </div>
                                <div class="col-md-6"> 
                                    <div class="row m-0 align-items-center">
                                        <div class="col-3  p-0">
                                            <label class="col-form-label"> Project End Date </label>
                                        </div>
                                        <div class="col pe-0">
                                            <div class="form-control form-control-sm  border-0 ">@{{ project.delivery_date  | date: 'yyyy-MM-dd' }}</div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row m-0 align-items-center">
                                        <div class="col-3  p-0">
                                            <label class="col-form-label">BIM 360 Language</label>
                                        </div>
                                        <div class="col pe-0"> 
                                            <div class="form-control form-control-sm  border-0 ">@{{ project.language }} </div>
                                        </div> 
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="row m-0 align-items-center">
                                        <div class="col-3  p-0">
                                            <label class="col-form-label">Project Time Zone</label>
                                        </div>
                                        <div class="col pe-0">
                                            <div class="form-control form-control-sm  border-0 ">@{{ project.time_zone }}</div>
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
                                            <div class="form-control form-control-sm  border-0 ">@{{ project.start_date  | date: 'yyyy-MM-dd' }}</div>
                                        </div> 
                                    </div>  
                                </div>
                                <div class="col-md-6"> 
                                    <div class="row m-0 align-items-center">
                                        <div class="col-3  p-0">
                                            <label class="col-form-label"> Project End Date </label>
                                        </div>
                                        <div class="col pe-0">
                                            <div class="form-control form-control-sm  border-0 ">@{{ project.delivery_date  | date: 'yyyy-MM-dd' }}</div>
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
                </div>
            </div>
        </div>


    </fieldset>
    <fieldset class="accordion-item">
        <div class="accordion-header custom m-0 position-relative" id="Team_setup_header">
            <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#Team_setup" aria-expanded="false" aria-controls="Team_setup">
                <span class="position-relative btn py-0"><b>Team Setup</b></span> 
            </div>
            <div class="icon m-0 position-absolute rounded-pills  " style="right: 10px;top:30%; z-index:111 !important">
                <i data-bs-toggle="collapse" 
                    href="#Team_setup" 
                    aria-expanded="true" 
                    aria-controls="Team_setup" 
                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "
                    >
                </i>
            </div>
        </div>
        <div id="Team_setup" class="accordion-collapse collapse" aria-labelledby="Team_setup_header" >
            <div class="card-body"> 
                <div class="row mb-2 mx-0">
                    <ul>
                        <li ng-repeat="(key,teamSetup) in teamSetups" class="">
                            <strong>@{{ teamSetup.role.name }}</strong>
                            <div class="row m-0">
                                <div ng-repeat="(key,team) in teamSetup.team" class="col-md-4 list-group-item border-0 "> 
                                    <i class="fa fa-check-circle text-primary me-1"></i>
                                    @{{ team }}
                                </div>
                            </div>
                        </li>
                    </ul>  
                </div>
            </div> 
        </div>
    </fieldset> 
    <fieldset class="accordion-item">
        <div class="accordion-header custom m-0 position-relative" id="Invoice_maileStone_header">
            <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#Invoice_maileStone" aria-expanded="false" aria-controls="Invoice_maileStone">
                <span class="position-relative btn py-0"><b>Invoice Plan</b></span> 
            </div>
            <div class="icon m-0 position-absolute rounded-pills  " style="right: 10px;top:30%; z-index:111 !important">
                <i data-bs-toggle="collapse" 
                    href="#Invoice_maileStone" 
                    aria-expanded="true" 
                    aria-controls="Invoice_maileStone" 
                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "
                    >
                </i>
            </div>
        </div>
        <div id="Invoice_maileStone" class="accordion-collapse collapse" aria-labelledby="Invoice_maileStone_header" >
            <table class="table custom m-0 custom table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">S.No</th>
                        <th class="text-center">Invoice Date</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Percentage %</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="row in review['invoice_plan'].invoice_data">
                        <td class="text-center"> @{{ $index + 1 }} </td>
                        <td class="text-center">@{{ row.invoice_date | date: 'yyyy-MM-dd' }}</td>
                        <td class="text-center">@{{ row.amount }}</td>
                        <td class="text-center">@{{ row.percentage }}</td>
                    </tr> 
                    <tr ng-show="review['invoice_plan'].invoice_data.length == 0">
                        <td class="text-center" colspan="4"> No data found </td>
                    </tr> 
                </tbody>
            </table>
        </div>
    </fieldset> 
    <fieldset class="accordion-item">
        <div class="accordion-header custom m-0 position-relative" id="TO_DO_header">
            <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#TO_DO" aria-expanded="false" aria-controls="TO_DO">
                <span class="position-relative btn py-0"><b>To Do List</b></span> 
            </div>
            <div class="icon m-0 position-absolute rounded-pills  " style="right: 10px;top:30%; z-index:111 !important">
                <i data-bs-toggle="collapse" 
                    href="#TO_DO" 
                    aria-expanded="true" 
                    aria-controls="TO_DO" 
                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "
                    >
                </i>
            </div>
        </div>
        <div id="TO_DO" class="accordion-collapse collapse" aria-labelledby="TO_DO_header" >
            <div class="card-body">
                <div  ng-show="check_list_items.length != 0">
                    <div >
                        <fieldset class="accordion-item" ng-repeat="(index,check_list) in check_list_items">
                            <div class="accordion-header py-0 custom m-0 position-relative" id="OpenCloseBoxHeader_@{{ index }}">
                                <div class="accordion-button py-1 collapsed" data-bs-toggle="collapse" data-bs-target="#OpenCloseBoxBody_@{{ index }}" aria-expanded="true" aria-controls="OpenCloseBoxBody_@{{ index }}">
                                    <span class="position-relative btn py-0"> <i class="text-danger fa fa-trash btn-sm btn" ng-click="delete_this_check_list_item(index)"></i> <b >@{{ check_list.name }}</b></span> 
                                </div>
                                <div class="icon m-0 position-absolute rounded-pills" style="right: 10px;top:30%; z-index:111 !important">
                                    <i data-bs-toggle="collapse" 
                                        href="#OpenCloseBoxBody_@{{ index }}" 
                                        aria-expanded="false" 
                                        aria-controls="OpenCloseBoxBody_@{{ index }}" 
                                        class="accordion-button collapsed custom-accordion-button bg-primary text-white toggle-btn ">
                                    </i>
                                </div>
                            </div>
                            <div id="OpenCloseBoxBody_@{{ index }}" class="accordion-collapse collapse" aria-labelledby="OpenCloseBoxHeader_@{{ index }}" >
                                <div class="accordion-body p-0">
                                    <table class="m-0 table custom">
                                        <thead>
                                            <tr>
                                                <th class="text-center">S.No</th>
                                                <th class="text-center">Deliverable Name</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Assign To</th>
                                                <th class="text-center">Start Date</th>
                                                <th class="text-center">End Date</th>
                                            </tr>
                                        </thead>
                                        <tbody class="border" ng-repeat="(index_2 , checkListData) in check_list.data">
                                            <tr ng-show="checkListData.text != 'others'">
                                                <td colspan="6" class="bg-light">
                                                    <div class="text-start">
                                                        <strong>@{{ checkListData.name }}</strong>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr ng-repeat="(index_3 , taskListData) in checkListData.data">
                                                <td>@{{ index_3 +1 }}</td>
                                                <td>@{{ taskListData.task_list }}</td>
                                                <td class="text-center">
                                                    <input disabled  type="checkbox" get-to-do-lists ng-model="taskListData.status" class="form-check-input">
                                                </td>
                                                <td>
                                                    <select disabled  get-to-do-lists ng-model="taskListData.assign_to" class="form-select border-0  form-select-sm">
                                                        <option value="">-- Project Manager --</option>
                                                        <option value="Alexander">Alexander</option>
                                                        <option value="Bjørn">Bjørn</option>
                                                        <option value="Gunnar">Gunnar</option>
                                                        <option value="Kristoffer">Kristoffer</option>
                                                    </select>
                                                </td>
                                                <td><input disabled  type="text" get-to-do-lists ng-value="taskListData.start_date | date: 'yyyy-MM-dd'" ng-model="taskListData.start_date" id="" class=" border-0 form-control form-control-sm  border-0 "></td>
                                                <td><input disabled  type="text" get-to-do-lists ng-value="taskListData.end_date | date: 'yyyy-MM-dd'" ng-model="taskListData.end_date" id="" class=" border-0 form-control form-control-sm  border-0 "></td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                </div>  
                            </div>
                        </fieldset> 
                    </div>
                </div>
            </div>
        </div>
    </fieldset> 
</div>
<div class="card-footer text-end">
    <a href="#!/to-do-listing" class="btn btn-light float-start">Prev</a>
    <a class="next me-2 btn btn-light rounded border" ng-click="saveProject($event)"> Save & Submit Later </a>
    <a class="next btn-primary btn rounded" ng-click="submitProject($event)">Submit</a>
</div>