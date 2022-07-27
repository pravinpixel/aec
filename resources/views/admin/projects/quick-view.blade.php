<div id="project-quick-modal-view" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-right" style="width:100% !important">
        <div class="p-3 shadow-sm">
            <h3>Project Name : <b class="text-primary"> @{{  review['project_name'] }}</b></h3>
            <button type="button" class="btn-close me-3" data-bs-dismiss="modal" style="top: 33px" aria-hidden="true"></button>
        </div>
        <div class="modal-content h-100 p-4" style="overflow: auto">
           
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
                        <table class="table custom m-0 table-hover">
                            <tbody>
                                <tr>
                                    <td width="30%"><b>Project ID</b></td>
                                    <td>:</td>
                                    <td>@{{ review['reference_number'] }}</td>
                                </tr> 
                                <tr>
                                    <td width="30%"><b>Project Name</b></td>
                                    <td>:</td>
                                    <td>@{{ review['project_name'] }}</td>
                                </tr> 
                                <tr>
                                    <td><b>Telephone</b></td>
                                    <td>:</td>
                                    <td>@{{ review['mobile_number'] }}</td>
                                </tr> 
                                <tr>
                                    <td><b>Contact Person name</b></td>
                                    <td>:</td>
                                    <td>@{{ review['contact_person'] }} </td>
                                </tr> 
                                <tr>
                                    <td><b>Company</b></td>
                                    <td>:</td>
                                    <td>@{{ review['company_name'] }}</td>
                                </tr> 
                                <tr >
                                    <td><b>Email</b></td>
                                    <td>:</td>
                                    <td>@{{ review['email'] }}</td>
                                </tr> 
                                <tr>
                                    <td><b>Site Address</b></td>
                                    <td>:</td>
                                    <td>@{{ review['site_address'] }}</td>
                                </tr> 
                                <tr>
                                    <td><b>Country</b></td>
                                    <td>:</td>
                                    <td>@{{ review['country'] }}</td>
                                </tr> 
                                <tr>
                                    <td><b>Zipcode</b></td>
                                    <td>:</td>
                                    <td>@{{ review['zipcode'] }}</td>
                                </tr> 
                                <tr>
                                    <td><b>Start  Date</b></td>
                                    <td>:</td>
                                    <td>@{{ review['start_date'] }}</td>
                                </tr> 
                                <tr>
                                    <td><b>State</b></td>
                                    <td>:</td>
                                    <td>@{{ review['state'] }}</td>
                                </tr> 
                                <tr>
                                    <td><b>No of Building</b></td>
                                    <td>:</td>
                                    <td>@{{ review['no_of_building'] }}</td>
                                </tr> 
                                <tr>
                                    <td><b>Type of Project</b></td>
                                    <td>:</td>
                                    <td>@{{ review['project_type'] }}</td>
                                </tr> 
                                <tr>
                                    <td><b>Type of Delivery</b></td>
                                    <td>:</td>
                                    <td>@{{ review['delivery_type'] }}</td>
                                </tr> 
                                <tr>
                                    <td><b>Delivery Date</b></td>
                                    <td>:</td>
                                    <td>@{{ review['delivery_date'] }}</td>
                                </tr> 
                                
                            </tbody>
                        </table>

                    



                        
                    </div>
                </fieldset>
                <fieldset class="accordion-item">
                    <div class="accordion-header custom m-0 position-relative" id="connection_plateforms_header">
                        <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#connection_plateforms" aria-expanded="false" aria-controls="connection_plateforms">
                            <span class="position-relative btn py-0"><b> @lang('project.milestone')</b></span> 
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
                                                <input type="checkbox" id="switch0" data-switch="none" disabled />
                                                <label for="switch0" class="border" data-on-label="" data-off-label="" disabled></label>
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
                                                <input type="checkbox" id="switch1" data-switch="none" disabled/>
                                                <label for="switch1" class="border" data-on-label="" data-off-label="" disabled></label>
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
                                                <input type="checkbox" id="switch1" data-switch="none" disabled/>
                                                <label for="switch1" class="border" data-on-label="" data-off-label="" disabled></label>
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
                                                        <select name="language" ng-model="project.language" id="language" class="form-control form-select-sm  border-0"  style="pointer-events:none">
                                                            <option value=""> @lang('project.select') </option>
                                                            @foreach(config('project.languages') as $key => $value)
                                                                <option value="{{ $key }}"> {{  $value }} </option>
                                                            @endforeach
                                                        </select>
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
                                                    <div class="col-5 p-0">
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
                    </div>
            
            
                </fieldset>
                <fieldset class="accordion-item">
                    <div class="accordion-header custom m-0 position-relative" id="Team_setup_header">
                        <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#Team_setup" aria-expanded="false" aria-controls="Team_setup">
                            <span class="position-relative btn py-0"><b>@lang('project.tasklist')</b></span> 
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
                            
                            <table class="m-0 table custom" ng-repeat="(index,check_list) in check_list_items">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Deliverable Name</th>
                                        
                                        <th class="text-center">Assign To</th>
                                        <th class="text-center">Status</th>
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
                                      
                                        <td>
                                            <label ng-repeat="projectManager in projectManagers" value="@{{ taskListData.assign_to }}" >
                                                @{{ projectManager.first_Name }}
                                            </label>
                                        </td>
                                          <td class="text-center">  
                                             @{{(taskListData.status) == 1 ? 'Completed' : 'Pending'}}
                                                
                                               
                                        </td>
                                        <td><input disabled  type="text" get-to-do-lists ng-value="taskListData.start_date | date: 'dd-MM-yyyy'" ng-model="taskListData.start_date" id="" class=" border-0 form-control form-control-sm  border-0 "></td>
                                        <td><input disabled  type="text" get-to-do-lists ng-value="taskListData.end_date | date: 'dd-MM-yyyy'" ng-model="taskListData.end_date" id="" class=" border-0 form-control form-control-sm  border-0 "></td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </fieldset> 
                <fieldset class="accordion-item">
                    <div class="accordion-header custom m-0 position-relative" id="Bim360_header">
                        <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#bim360" aria-expanded="false" aria-controls="Invoice_maileStone">
                            <span class="position-relative btn py-0"><b>@lang('project.bim360')</b></span> 
                        </div>
                        <div class="icon m-0 position-absolute rounded-pills  " style="right: 10px;top:30%; z-index:111 !important">
                            <i data-bs-toggle="collapse" 
                                href="#bim360" 
                                aria-expanded="true" 
                                aria-controls="bim360" 
                                class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "
                                >
                            </i>
                        </div>
                    </div>
                    <div id="bim360" class="accordion-collapse collapse" aria-labelledby="Bim360_header" >
                        <table class="table custom m-0 custom table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">S.No</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Su Type</th>
                                    <th class="text-center">Title </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="row in review['invoice_plan'].invoice_data">
                                    <td class="text-center"> @{{ $index + 1 }} </td>
                                    <td class="text-center">@{{ row.invoice_date | date: 'dd-MM-yyyy' }}</td>
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
                    <div class="accordion-header custom m-0 position-relative" id="Invoice_maileStone_header">
                        <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#Invoice_maileStone" aria-expanded="false" aria-controls="Invoice_maileStone">
                            <span class="position-relative btn py-0"><b>@lang('project.invoiceplan')</b></span> 
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
                        <div class="row mb-3 align-items-center">
                            <div class="col-8">
                                <div class="row align-items-center mb-2 m-0">
                                    <div class="col-3"><strong>Project Cost</strong></div>
                                    <div class=" col-9"><label>  @{{review.invoice_plan.project_cost}} <label></div>
                                </div>
                                <div class="row align-items-center mb-2 m-0">
                                    <div class="col-3"><strong>No.of Invoices</strong></div>
                                    <div class=" col-9"><label>  @{{review.invoice_plan.no_of_invoice}} <label></div>
                                </div>
                                <div class="row align-items-center mb-2 m-0">
                                    <div class="col-3"><strong>Project Start Date</strong></div>
                                    <div class=" col-9"><label>  @{{review.invoice_plan.invoice_data[0].invoice_date | date: 'dd-MM-yyyy' }} <label></div>
                                </div>
                               
                            </div>
                          
                        </div>
                       
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
                                <tr ng-repeat="row in review['invoice_plan'].invoice_data.invoices">
                                    <td class="text-center"> @{{ $index + 1 }} </td>
                                    <td class="text-center">@{{ row.invoice_date | date: 'dd-MM-yyyy' }}</td>
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
                            <span class="position-relative btn py-0"><b>@lang('project.tickets')</b></span> 
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
                                                            {{-- <th class="text-center">Status</th> --}}
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
                                                            {{-- <td class="text-center">
                                                                <input disabled  type="checkbox" get-to-do-lists ng-model="taskListData.status" class="form-check-input">
                                                            </td> --}}
                                                            <td>
                                                                <select  get-to-do-lists ng-model="taskListData.assign_to" class="form-control border-0  form-select-sm" style="pointer-events: none">
                                                                    <option value="">-- Project Manager --</option>
                                                                    <option ng-repeat="projectManager in projectManagers" value="@{{ projectManager.id }}" ng-selected="projectManager.id == taskListData.assign_to">
                                                                        @{{ projectManager.first_Name }}
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td><input style="pointer-events: none"  type="text" get-to-do-lists ng-value="taskListData.start_date | date: 'dd-MM-yyyy'" ng-model="taskListData.start_date" id="" class=" border-0 form-control form-control-sm  border-0 "></td>
                                                            <td><input style="pointer-events: none"  type="text" get-to-do-lists ng-value="taskListData.end_date | date: 'dd-MM-yyyy'" ng-model="taskListData.end_date" id="" class=" border-0 form-control form-control-sm  border-0 "></td>
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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->