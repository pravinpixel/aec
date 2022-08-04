<div id="customer-project-quick-modal-view" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
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
                        
                        <div>
                            <div class="header gantt-demo-header">
                                <ul class="gantt-controls bg-light">
                                    <li class="gantt-menu-item"><a data-action="collapseAll"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_collapse_all_24.png">Collapse All</a></li>
                                    <li class="gantt-menu-item gantt-menu-item-last"><a data-action="expandAll"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_expand_all_24.png">Expand All</a></li>
                                    <li class="gantt-menu-item"><a data-action="undo"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_undo_24.png">Undo</a></li>
                                    <li class="gantt-menu-item"><a data-action="redo"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_redo_24.png">Redo</a></li>
                                    <li id="fullscreen_button"   class="gantt-menu-item  gantt-menu-item-last"><a ><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_fullscreen_24.png">Fullscreen</a></li>
                                    <li class="gantt-menu-item gantt-menu-item-right gantt-menu-item-last"><a data-action="zoomToFit"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_zoom_to_fit_24.png">Zoom to Fit</a></li>
                                    <li class="gantt-menu-item gantt-menu-item-right"><a data-action="zoomOut"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_zoom_out.png">Zoom Out</a></li>
                                    <li class="gantt-menu-item gantt-menu-item-right"><a data-action="zoomIn"><img src="https://dhtmlx.com/docs/products/dhtmlxGantt/demo/imgs/ic_zoom_in.png">Zoom In</a></li>
                                </ul>
                            </div> 
                            <div class="demo-main-content">
                                <div id="gantt_here"></div>
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

                            <table class="mb-2 table border custom ng-scope" >
                                <tbody>
                                    <tr>
                                        <td><b>Project Name</b></td>
                                        <td>:</td>
                                        <td >@{{ projectTypes.project_name}}</td>
                                        <td><b>Customer Name</b></td>
                                        <td>:</td>
                                        <td >@{{ projectTypes.customerdatails.first_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Project Lead</b></td>
                                        <td>:</td>
                                        <td>@{{lead}}</td>
                                        <td><b>Over All Status</b></td>
                                        <td>:</td>
                                        <td><div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: @{{overall}}%;" aria-valuenow="@{{overall}}" aria-valuemin="0" aria-valuemax="100">@{{overall}}%</div>
                                        </div></td>
                                    </tr>
                                </tbody>
                            </table>



                            
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
                                        <td colspan="5" class="bg-light">
                                            <div class="text-start">
                                                <strong>@{{ checkListData.name }}</strong>
                                            </div>
                                        </td>
                                        <td  colspan="5" class="bg-light">
                    
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: @{{countper[$index].completed}}%;" aria-valuenow="@{{countper[$index].completed}}" aria-valuemin="0" aria-valuemax="100">@{{countper[$index].completed}}%</div>
                                            </div>
                                           
                                        </td>
                                    </tr>
                                   
                                    <tr ng-repeat="(index_3 , taskListData) in checkListData.data">
                                        <td>@{{ index_3 +1 }}</td>
                                        <td>@{{ taskListData.task_list }}</td>
                                      
                                        <td>
                                            <label ng-repeat="projectManager in projectManagers" value="@{{ taskListData.assign_to }}" >
                                                @{{ projectManager.first_name }}
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
                    <div class="accordion-header custom m-0 position-relative" id="TO_DO_header">
                        <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#TO_DO" aria-expanded="false" aria-controls="TO_DO">
                            <span class="position-relative btn py-0"><b>@lang('project.tickets')</b></span> 
                        </div>
                       
                    </div>
                    <div id="TO_DO" class="accordion-collapse collapse" aria-labelledby="TO_DO_header" >
                        <div class="card-body">
                            <div >
                                <div >
                                    <table class="table custom table-striped table-bordered" datatable="ng" id="tablebqup" dt-options="vm.dtOptions">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>Type</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Due by</th>
                                                <th>Priority</th>
                                                <th>Modifed at</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                                <tr ng-repeat="(ptcindex,pticketscomment) in pticketcomment">
                                                    <td>@{{ ptcindex+1 }}</td>
                                                    <td style="padding: 0 !important" class="text-center"><button class="btn btn-sm btn-outline-primary p-0 px-1"><a class="dropdown-item fw-bold" data-bs-toggle="modal" ng-click="showTicketComments(pticketscomment.id,'show')"><small>@{{customer.reference_number}} / TIKXX-0@{{ pticketscomment.id }}</small></a></button></td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                           
                                                            <div>
                                                                <h5 class="m-0 font-14">
                                                                   @{{pticketscomment.type}}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>@{{pticketscomment.summary}}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset("public/assets/images/") }}/@{{pticketscomment.assigndetails.image}}" alt="Arya S" class="rounded-circle me-2" height="24">
                                                            <div>
                                                                <h5 class="m-0 font-14">
                                                                    @{{pticketscomment.assigndetails.first_name}} 
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge bg-success">@{{pticketscomment.project_status}}</span></td>
                                                    <td> <small>@{{ pticketscomment.ticket_date | date:"MM/dd/yyyy'T' h:mm" }}<br> <!--<small class="text-secondary">(Due in 1d)</small>--></small></td>
                                                    <td style="padding: 0 !important" class="text-center">@{{pticketscomment.priority}} <i class="fa fa-arrow-up text-danger ms-1"></i></td>
                                                  
                                                    <td><small>@{{ pticketscomment.updated_at | date:"dd-MM-yyyy h:mm" }}</small> </td>
                                                   
                                                </tr>
                                               
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
                        <div class="row my-2 mx-3 align-items-center">
                            <div class="col-6">
                                <div class="row m-0 align-items-center">
                                    <div class="col-4 p-0">
                                        <label class="col-form-label">Project Cost</label>
                                    </div>
                                    <div class="col pe-0"> 
                                        <div class="form-control form-control-sm  border-0  ng-binding">@{{review.invoice_plan.project_cost}}</div>  
                                    </div> 
                                </div>
                                <div class="row m-0 align-items-center">
                                    <div class="col-4 p-0">
                                        <label class="col-form-label">Project Start Date</label>
                                    </div>
                                    <div class="col pe-0"> 
                                        <div class="form-control form-control-sm  border-0  ng-binding"> @{{project.start_date  | date: 'dd-MM-yyyy' }}</div>  
                                    </div> 
                                </div>
                              
                            </div>
                            <div class="col-6">
                                 <div class="row m-0 align-items-center">
                                    <div class="col-3  p-0">
                                        <label class="col-form-label">No.of Invoices</label>
                                    </div>
                                    <div class="col pe-0"> 
                                        <div class="form-control form-control-sm  border-0  ng-binding">@{{review.invoice_plan.no_of_invoice}}</div>  
                                    </div> 
                                </div>
                                <div class="row m-0 align-items-center">
                                    <div class="col-3  p-0">
                                        <label class="col-form-label">Project End Date</label>
                                    </div>
                                    <div class="col pe-0"> 
                                        <div class="form-control form-control-sm  border-0  ng-binding"> @{{project.delivery_date  | date: 'dd-MM-yyyy' }}</div>  
                                    </div> 
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
                    <div class="accordion-header custom m-0 position-relative" id="Gendral_notes_header">
                        <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#Gendral_notes" aria-expanded="false" aria-controls="Invoice_maileStone">
                            <span class="position-relative btn py-0"><b>@lang('project.generalnotes')</b></span> 
                        </div>
                        <div class="icon m-0 position-absolute rounded-pills  " style="right: 10px;top:30%; z-index:111 !important">
                            <i data-bs-toggle="collapse" 
                                href="#Gendral_notes" 
                                aria-expanded="true" 
                                aria-controls="Gendral_notes" 
                                class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "
                                >
                            </i>
                        </div>
                    </div>
                    <div id="Gendral_notes" class="accordion-collapse collapse" aria-labelledby="Gendral_notes_header" >
                        <div class="row my-2 mx-3 align-items-center">
                            <div class="col-12" ng-bind-html="notes.notes">
                               
                               @{{notes.notes}}
                              
                            </div>
                           
                        </div>
                       
                       
                    </div>
                </fieldset> 
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<link href="{{ asset("public/assets/dhtmlx/dhtmlxgantt.css") }}" rel="stylesheet">  
 
<script src="{{ asset("public/assets/dhtmlx/dhtmlxgantt.js") }}"></script> 
<script src="http://export.dhtmlx.com/gantt/api.js"></script> 
<script>
var button = document.getElementById("fullscreen_button");
    button.addEventListener("click", function(){
        if (!gantt.getState().fullscreen) {
            // expanding the gantt to full screen
            gantt.expand();
        }
        else {
            // collapsing the gantt to the normal mode
            gantt.collapse();
        }
    }, false);
</script>
<script >
    if (!window.ganttModules) {
        window.ganttModules = {};
    }
    gantt.config.open_tree_initially = true;
    gantt.config.autosize = "y";
    ganttModules.layout = {
        init: function(gantt, durationFormatter, linksFormatter) {
            gantt.config.layout = {
                css: "gantt_container",
                cols: [{
                        width: 524,
                        min_width: 300,

                        // adding horizontal scrollbar to the grid via the scrollX attribute
                        rows: [{
                                view: "grid",
                                scrollX: "gridScroll",
                                scrollable: true,
                                scrollY: "scrollVer"
                            },
                            {
                                view: "scrollbar",
                                id: "gridScroll",
                                group: "horizontalScrolls"
                            }
                        ]
                    },
                    {
                        resizer: true,
                        width: 1
                    },
                    {
                        rows: [{
                                view: "timeline",
                                scrollX: "scrollHor",
                                scrollY: "scrollVer"
                            },
                            {
                                view: "scrollbar",
                                id: "scrollHor",
                                group: "horizontalScrolls"
                            }
                        ]
                    },
                    {
                        view: "scrollbar",
                        id: "scrollVer"
                    }
                ]
            };

            var hourFormatter = gantt.ext.formatters.durationFormatter({
                enter: "hour",
                store: "hour",
                format: "hour",
                short: true
            });
            var textEditor = {
                type: "text",
                map_to: "text"
            };
            var dateEditor = {
                type: "date",
                map_to: "start_date",
                min: new Date(2018, 0, 1),
                max: new Date(2019, 0, 1)
            };
            var durationEditor = {
                type: "duration",
                map_to: "duration",
                formatter: durationFormatter,
                min: 0,
                max: 10000
            };
            var hourDurationEditor = {
                type: "duration",
                map_to: "duration",
                formatter: hourFormatter,
                min: 0,
                max: 10000
            }; 
            gantt.config.columns = [{
                    name: "",
                    width: 40,
                    resize: false,
                    template: function(task) {
                        return "<small class=''>" + gantt.getWBSCode(task) + "</small>"
                    }
                },
                {
                    name: "text",
                    tree: true,
                    width: 180,
                    resize: true,
                    editor: textEditor
                },
                {
                    name: "start_date",
                    label: "Start",
                    align: "center",
                    resize: true,
                    // editor: dateEditor
                },
                // {
                //     name: "end_date",
                //     label: "End",
                //     align: "center",
                //     resize: true,
                //     // editor: dateEditor
                // },

                {
                    name: "duration",
                    label: "Duration",
                    resize: true,
                    align: "center",
                    template: function(task) {
                        return durationFormatter.format(task.duration);
                    },
                    editor: durationEditor
                },
                {
                    name: "duration_hours",
                    label: "<div style='white-space: normal;line-height: 20px;margin: 10px 0;'>Duration (hours)</div>",
                    resize: true,
                    align: "center",
                    template: function(task) {
                        return hourFormatter.format(task.duration);
                    },
                    editor: hourDurationEditor
                }, 
                //     {
                //     name: "project_id",
                //     label: "project_id",
                //     align: "center",
                //     resize: true, 
                // },
                {
                    name: "add",
                    "width": 44
                }
            ];
        }
    };
    ganttModules.grid_struct = (function(gantt) {
        gantt.templates.grid_row_class = function(start, end, task) {
            return gantt.hasChild(task.id) ? "gantt_parent_row" : "";
        };
    })(gantt);
    ganttModules.grid_struct = (function(gantt) {
        gantt.config.font_width_ratio = 7;
        gantt.templates.leftside_text = function leftSideTextTemplate(start, end, task) {
            if (getTaskFitValue(task) === "left") {
                return task.text;
            }
            return "";
        };
        gantt.templates.rightside_text = function rightSideTextTemplate(start, end, task) {
            if (getTaskFitValue(task) === "right") {
                return task.text;
            }
            return "";
        };
        gantt.templates.task_text = function taskTextTemplate(start, end, task) {
            if (getTaskFitValue(task) === "center") {
                return task.text;
            }
            return "";
        };

        function getTaskFitValue(task) {
            var taskStartPos = gantt.posFromDate(task.start_date),
                taskEndPos = gantt.posFromDate(task.end_date);

            var width = taskEndPos - taskStartPos;
            var textWidth = (task.text || "").length * gantt.config.font_width_ratio;

            if (width < textWidth) {
                var ganttLastDate = gantt.getState().max_date;
                var ganttEndPos = gantt.posFromDate(ganttLastDate);
                if (ganttEndPos - taskEndPos < textWidth) {
                    return "left"
                } else {
                    return "right"
                }
            } else {
                return "center";
            }
        }
    })(gantt);
    ganttModules.zoomToFit = (function(gantt) {
        var cachedSettings = {};

        function saveConfig() {
            var config = gantt.config;
            cachedSettings = {};
            cachedSettings.scales = config.scales;
            cachedSettings.template = gantt.templates.date_scale;
            cachedSettings.start_date = config.start_date;
            cachedSettings.end_date = config.end_date;
        }

        function restoreConfig() {
            applyConfig(cachedSettings);
        }

        function applyConfig(config, dates) {
            if (config.scales[0].date) {
                gantt.templates.date_scale = null;
            } else {
                gantt.templates.date_scale = config.scales[0].template;
            }

            gantt.config.scales = config.scales;

            if (dates && dates.start_date && dates.start_date) {
                gantt.config.start_date = gantt.date.add(dates.start_date, -1, config.scales[0].subscale_unit);
                gantt.config.end_date = gantt.date.add(gantt.date[config.scales[0].subscale_unit + "_start"](dates.end_date), 2, config.scales[0].subscale_unit);
            } else {
                gantt.config.start_date = gantt.config.end_date = null;
            }
        }


        function zoomToFit() {
            var project = gantt.getSubtaskDates(),
                areaWidth = gantt.$task.offsetWidth;

            for (var i = 0; i < scaleConfigs.length; i++) {
                var columnCount = getUnitsBetween(project.start_date, project.end_date, scaleConfigs[i].scales[0].subscale_unit, scaleConfigs[i].scales[0].step);
                if ((columnCount + 2) * gantt.config.min_column_width <= areaWidth) {
                    break;
                }
            }

            if (i == scaleConfigs.length) {
                i--;
            }

            applyConfig(scaleConfigs[i], project);
            gantt.render();
        }

        // get number of columns in timeline
        function getUnitsBetween(from, to, unit, step) {
            var start = new Date(from),
                end = new Date(to);
            var units = 0;
            while (start.valueOf() < end.valueOf()) {
                units++;
                start = gantt.date.add(start, step, unit);
            }
            return units;
        }

        //Setting available scales
        var scaleConfigs = [
            // minutes
            {
                scales: [{
                        subscale_unit: "minute",
                        unit: "hour",
                        step: 1,
                        format: "%H"
                    },
                    {
                        unit: "minute",
                        step: 1,
                        format: "%H:%i"
                    }
                ]
            },
            // hours
            {
                scales: [{
                        subscale_unit: "hour",
                        unit: "day",
                        step: 1,
                        format: "%j %M"
                    },
                    {
                        unit: "hour",
                        step: 1,
                        format: "%H:%i"
                    }

                ]
            },
            // days
            {
                scales: [{
                        subscale_unit: "day",
                        unit: "month",
                        step: 1,
                        format: "%F"
                    },
                    {
                        unit: "day",
                        step: 1,
                        format: "%j"
                    }
                ]
            },
            // weeks
            {
                scales: [{
                        subscale_unit: "week",
                        unit: "month",
                        step: 1,
                        date: "%F"
                    },
                    {
                        unit: "week",
                        step: 1,
                        template: function(date) {
                            var dateToStr = gantt.date.date_to_str("%d %M");
                            var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
                            return dateToStr(date) + " - " + dateToStr(endDate);
                        }
                    }
                ]
            },
            // months
            {
                scales: [{
                        subscale_unit: "month",
                        unit: "year",
                        step: 1,
                        format: "%Y"
                    },
                    {
                        unit: "month",
                        step: 1,
                        format: "%M"
                    }
                ]
            },
            // quarters
            {
                scales: [{
                        subscale_unit: "month",
                        unit: "year",
                        step: 3,
                        format: "%Y"
                    },
                    {
                        unit: "month",
                        step: 3,
                        template: function(date) {
                            var dateToStr = gantt.date.date_to_str("%M");
                            var endDate = gantt.date.add(gantt.date.add(date, 3, "month"), -1, "day");
                            return dateToStr(date) + " - " + dateToStr(endDate);
                        }
                    }
                ]
            },
            // years
            {
                scales: [{
                        subscale_unit: "year",
                        unit: "year",
                        step: 1,
                        date: "%Y"
                    },
                    {
                        unit: "year",
                        step: 5,
                        template: function(date) {
                            var dateToStr = gantt.date.date_to_str("%Y");
                            var endDate = gantt.date.add(gantt.date.add(date, 5, "year"), -1, "day");
                            return dateToStr(date) + " - " + dateToStr(endDate);
                        }
                    }
                ]
            },
            // decades
            {
                scales: [{
                        subscale_unit: "year",
                        unit: "year",
                        step: 10,
                        template: function(date) {
                            var dateToStr = gantt.date.date_to_str("%Y");
                            var endDate = gantt.date.add(gantt.date.add(date, 10, "year"), -1, "day");
                            return dateToStr(date) + " - " + dateToStr(endDate);
                        }
                    },
                    {
                        unit: "year",
                        step: 100,
                        template: function(date) {
                            var dateToStr = gantt.date.date_to_str("%Y");
                            var endDate = gantt.date.add(gantt.date.add(date, 100, "year"), -1, "day");
                            return dateToStr(date) + " - " + dateToStr(endDate);
                        }
                    }
                ]
            }
        ];

        var enabled = false;
        return {
            enable: function() {
                if (!enabled) {
                    enabled = true;
                    saveConfig();
                    zoomToFit();
                    gantt.render();
                }
            },
            isEnabled: function() {
                return enabled;
            },
            toggle: function() {
                if (this.isEnabled()) {
                    this.disable();
                } else {
                    this.enable();
                }
            },
            disable: function() {
                if (enabled) {
                    enabled = false;
                    restoreConfig();
                    gantt.render();
                }
            }
        };

    })(gantt);
    ganttModules.zoom = (function(gantt) {

        gantt.ext.zoom.init({
            levels: [{
                    name: "hours",
                    scales: [{
                            unit: "day",
                            step: 1,
                            format: "%d %M"
                        },
                        {
                            unit: "hour",
                            step: 1,
                            format: "%h"
                        },
                    ],
                    round_dnd_dates: true,
                    min_column_width: 30,
                    scale_height: 60
                },
                {
                    name: "days",
                    scales: [{
                            unit: "month",
                            step: 1,
                            format: "%M"
                        },
                        {
                            unit: "week",
                            step: 1,
                            format: "%W"
                        },
                        {
                            unit: "day",
                            step: 1,
                            format: "%D"
                        },
                    ],
                    round_dnd_dates: true,
                    min_column_width: 60,
                    scale_height: 60
                },
                {
                    name: "weeks",
                    scales: [{
                            unit: "year",
                            step: 1,
                            format: "%Y"
                        },
                        {
                            unit: "month",
                            step: 1,
                            format: "%M"
                        },
                        {
                            unit: "week",
                            step: 1,
                            format: "%W"
                        },
                    ],
                    round_dnd_dates: false,
                    min_column_width: 60,
                    scale_height: 60
                },
                {
                    name: "months",
                    scales: [{
                            unit: "year",
                            step: 1,
                            format: "%Y"
                        },
                        {
                            unit: "month",
                            step: 1,
                            format: "%M"
                        }
                    ],
                    round_dnd_dates: false,
                    min_column_width: 50,
                    scale_height: 60
                },
                {
                    name: "quarters",
                    scales: [{
                            unit: "year",
                            step: 1,
                            format: "%Y"
                        },
                        {
                            unit: "quarter",
                            step: 1,
                            format: function quarterLabel(date) {
                                var month = date.getMonth();
                                var q_num;

                                if (month >= 9) {
                                    q_num = 4;
                                } else if (month >= 6) {
                                    q_num = 3;
                                } else if (month >= 3) {
                                    q_num = 2;
                                } else {
                                    q_num = 1;
                                }

                                return "Q" + q_num;
                            }
                        },
                        {
                            unit: "month",
                            step: 1,
                            format: "%M"
                        }
                    ],
                    round_dnd_dates: false,
                    min_column_width: 50,
                    scale_height: 60
                },
                {
                    name: "years",
                    scales: [{
                        unit: "year",
                        step: 1,
                        format: "%Y"
                    }, ],
                    round_dnd_dates: false,
                    min_column_width: 50,
                    scale_height: 60
                }
            ]

        });

        var isActive = true;

        return {
            deactivate: function() {
                isActive = false;
            },
            setZoom: function(level) {
                isActive = true;
                gantt.ext.zoom.setLevel(level);
            },
            zoomOut: function() {
                isActive = true;
                gantt.ext.zoom.zoomOut();
                gantt.render();
            },
            zoomIn: function() {
                isActive = true;
                gantt.ext.zoom.zoomIn();
                gantt.render();
            },
            canZoomOut: function() {
                var level = gantt.ext.zoom.getCurrentLevel();

                return !isActive || !(level > 4);
            },
            canZoomIn: function() {
                var level = gantt.ext.zoom.getCurrentLevel();
                return !isActive || !(level === 0);
            }
        };
    })(gantt);
    ganttModules.grid_struct = (function(gantt) {
        gantt.config.font_width_ratio = 7;
        gantt.templates.leftside_text = function leftSideTextTemplate(start, end, task) {
            if (getTaskFitValue(task) === "left") {
                return task.text;
            }
            return "";
        };
        gantt.templates.rightside_text = function rightSideTextTemplate(start, end, task) {
            if (getTaskFitValue(task) === "right") {
                return task.text;
            }
            return "";
        };
        gantt.templates.task_text = function taskTextTemplate(start, end, task) {
            if (getTaskFitValue(task) === "center") {
                return task.text;
            }
            return "";
        };

        function getTaskFitValue(task) {
            var taskStartPos = gantt.posFromDate(task.start_date),
                taskEndPos = gantt.posFromDate(task.end_date);

            var width = taskEndPos - taskStartPos;
            var textWidth = (task.text || "").length * gantt.config.font_width_ratio;

            if (width < textWidth) {
                var ganttLastDate = gantt.getState().max_date;
                var ganttEndPos = gantt.posFromDate(ganttLastDate);
                if (ganttEndPos - taskEndPos < textWidth) {
                    return "left"
                } else {
                    return "right"
                }
            } else {
                return "center";
            }
        }
    })(gantt);
    ganttModules.menu = (function() {
        function addClass(node, className) {
            node.className += " " + className;
        }

        function removeClass(node, className) {
            node.className = node.className.replace(new RegExp(" *" + className.replace(/\-/g, "\\-"), "g"), "");
        }

        function getButton(name) {
            return document.querySelector(".gantt-controls [data-action='" + name + "']");
        }

        function highlightButton(name) {
            addClass(getButton(name), "menu-item-active");
        }

        function unhighlightButton(name) {
            removeClass(getButton(name), "menu-item-active");
        }

        function disableButton(name) {
            addClass(getButton(name), "menu-item-disabled");
        }

        function enableButton(name) {
            removeClass(getButton(name), "menu-item-disabled");
        }

        function refreshZoomBtns() {
            var zoom = ganttModules.zoom;
            if (zoom.canZoomIn()) {
                enableButton("zoomIn");
            } else {
                disableButton("zoomIn");
            }
            if (zoom.canZoomOut()) {
                enableButton("zoomOut");
            } else {
                disableButton("zoomOut");
            }
        }

        function refreshUndoBtns() {
            if (!gantt.getUndoStack || !gantt.getUndoStack().length) {
                disableButton("undo");
            } else {
                enableButton("undo");
            }

            if (!gantt.getRedoStack || !gantt.getRedoStack().length) {
                disableButton("redo");
            } else {
                enableButton("redo");
            }

        }

        // setInterval(refreshUndoBtns, 1000);

        function toggleZoomToFitBtn() {
            if (ganttModules.zoomToFit.isEnabled()) {
                highlightButton("zoomToFit");
            } else {
                unhighlightButton("zoomToFit");
            }
        }

        var menu = {
            undo: function() {
                gantt.undo();
                refreshUndoBtns();
            },
            redo: function() {
                gantt.redo();
                refreshUndoBtns();
            },
            zoomIn: function() {
                ganttModules.zoomToFit.disable();
                var zoom = ganttModules.zoom;
                zoom.zoomIn();
                refreshZoomBtns();
                toggleZoomToFitBtn()
            },
            zoomOut: function() {
                ganttModules.zoomToFit.disable();
                ganttModules.zoom.zoomOut();
                refreshZoomBtns();
                toggleZoomToFitBtn()
            },
            zoomToFit: function() {
                ganttModules.zoom.deactivate();
                ganttModules.zoomToFit.toggle();
                toggleZoomToFitBtn();
                refreshZoomBtns();
            },
            fullscreen: function() {
                gantt.expand();
            },
            collapseAll: function() {
                gantt.eachTask(function(task) {
                    task.$open = false;
                });
                gantt.render();

            },
            expandAll: function() {
                gantt.eachTask(function(task) {
                    task.$open = true;
                });
                gantt.render();
            },
            toggleAutoScheduling: function() {
                gantt.config.auto_scheduling = !gantt.config.auto_scheduling;
                if (gantt.config.auto_scheduling) {
                    gantt.autoSchedule();
                    highlightButton("toggleAutoScheduling");
                } else {
                    unhighlightButton("toggleAutoScheduling")
                }
            },
            toggleCriticalPath: function() {
                gantt.config.highlight_critical_path = !gantt.config.highlight_critical_path;
                if (gantt.config.highlight_critical_path) {
                    highlightButton("toggleCriticalPath");
                } else {
                    unhighlightButton("toggleCriticalPath")
                }
                gantt.render();
            },
            toPDF: function() {
                gantt.exportToPDF();
            },
            toPNG: function() {
                gantt.exportToPNG();
            },
            toExcel: function() {
                gantt.exportToExcel();
            },
            toMSProject: function() {
                gantt.exportToMSProject();
            }
        }; 

        return {
            setup: function() {

                var navBar = document.querySelector(".gantt-controls");
                gantt.event(navBar, "click", function(e) {
                    var target = e.target || e.srcElement;
                    while (!target.hasAttribute("data-action") && target !== document.body) {
                        target = target.parentNode;
                    }

                    if (target && target.hasAttribute("data-action")) {
                        var action = target.getAttribute("data-action");
                        console.log(action)
                        if (menu[action]) {
                            menu[action]();
                        }
                    }
                     
                });
                this.setup = function() {};
            }
        }
    })(gantt); 
</script>
<script type="text/javascript">
    gantt.plugins({
        marker: true,
        fullscreen: true,
        critical_path: true,
        auto_scheduling: true,
        tooltip: true,
        undo: true
    });
    gantt.config.row_height = 50;
    

    var dateToStr = gantt.date.date_to_str(gantt.config.task_date);
    var markerId = gantt.addMarker({
        start_date: new Date(), //a Date object that sets the marker's date
        css: "today", //a CSS class applied to the marker
        text: "Today", //the marker title
        title: dateToStr( new Date()) // the marker's tooltip
    }); 

    gantt.attachEvent("onTaskCreated", function(item) {
        if (item.duration == 1) {
            item.duration = 72;
        }
        return true;
    });

    gantt.ext.fullscreen.getFullscreenElement = function() {
        return document.querySelector(".main-container");
    };

    var formatter = gantt.ext.formatters.durationFormatter({
        enter: "day",
        store: "hour",
        format: "day",
        hoursPerDay: 24,
        hoursPerWeek: 40,
        daysPerMonth: 30,
        short: true
    });
    var linksFormatter = gantt.ext.formatters.linkFormatter({
        durationFormatter: formatter
    });

    ganttModules.layout.init(gantt, formatter, linksFormatter);

    gantt.config.lightbox.sections = [{
            name: "description",
            height: 70,
            map_to: "text",
            type: "textarea",
            focus: true
        },
        {
            name: "type",
            type: "typeselect",
            map_to: "type",
            filter: function(name, value) {
                return !!(value != gantt.config.types.project);
            }
        },
        {
            name: "time",
            type: "duration",
            map_to: "auto",
            formatter: formatter
        }
    ];
    gantt.config.lightbox.project_sections = [{
            name: "description",
            height: 70,
            map_to: "text",
            type: "textarea",
            focus: true
        },

        {
            name: "time",
            type: "duration",
            readonly: true,
            map_to: "auto",
            formatter: formatter
        }
    ];
    gantt.config.lightbox.milestone_sections = [{
            name: "description",
            height: 70,
            map_to: "text",
            type: "textarea",
            focus: true
        },
        {
            name: "type",
            type: "typeselect",
            map_to: "type",
            filter: function(name, value) {
                return !!(value != gantt.config.types.project);
            }
        },
        {
            name: "time",
            type: "duration",
            single_date: true,
            map_to: "auto",
            formatter: formatter
        }
    ];

    //Make resize marker for two columns
    gantt.attachEvent("onColumnResizeStart", function(ind, column) {
        if (!column.tree || ind == 0) return;

        setTimeout(function() {
            var marker = document.querySelector(".gantt_grid_resize_area");
            if (!marker) return;
            var cols = gantt.getGridColumns();
            var delta = cols[ind - 1].width || 0;
            if (!delta) return;

            marker.style.boxSizing = "content-box";
            marker.style.marginLeft = -delta + "px";
            marker.style.paddingRight = delta + "px";
        }, 1);
    });

    gantt.attachEvent("onCollapse", function() {
        var el = document.querySelector(".dhx-navigation");
        if (el) {
            el.removeAttribute("style");
        }

        var chatapp = document.getElementById("chat-application");
        if (chatapp) {
            chatapp.style.visibility = "visible";
        }
    });

    gantt.attachEvent("onExpand", function() {
        var el = document.querySelector(".dhx-navigation");
        if (el) {
            el.style.position = "static";
        }

        var chatapp = document.getElementById("chat-application");
        if (chatapp) {
            chatapp.style.visibility = "hidden";
        }

    });

    gantt.templates.tooltip_text = function(start, end, task) {
        var links = task.$target;
        var labels = [];
        for (var i = 0; i < links.length; i++) {
            var link = gantt.getLink(links[i]);
            labels.push(linksFormatter.format(link));
        }
        var predecessors = labels.join(", ");

        var html = "<b>Task:</b> " + task.text + "<br/><b>Start:</b> " +
            gantt.templates.tooltip_date_format(start) +
            "<br/><b>End:</b> " + gantt.templates.tooltip_date_format(end) +
            "<br><b>Duration:</b> " + formatter.format(task.duration);
        if (predecessors) {
            html += "<br><b>Predecessors:</b>" + predecessors;
        }
        return html;
    };

    gantt.config.auto_types = true;
    gantt.config.date_format = "%Y-%m-%d %H:%i:%s";
    gantt.config.duration_unit = "hour";

    gantt.config.row_height = 23;
    gantt.config.order_branch = "marker";
    gantt.config.order_branch_free = true;
    gantt.config.grid_resize = true;

    gantt.config.auto_scheduling_strict = true;
    gantt.config.auto_scheduling_compatibility = true;
</script>  