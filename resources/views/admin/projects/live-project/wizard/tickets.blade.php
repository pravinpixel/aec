<div class="p-2" >    
    <div>
        <ul class="nav nav-tabs mb-0 border-bottom-0">
           <!-- <li class="nav-item">
                <a href="#CustomerTicket" data-bs-toggle="tab" aria-expanded="false" class="nav-link active border-bottom-0">
                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                    <span class="d-none d-md-block">Internal Tickets</span>
                </a>
            </li> 
            <li class="nav-item">
                <a href="#InternalTickets" data-bs-toggle="tab" aria-expanded="true" class="nav-link active  border-bottom-0">
                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                    <span class="d-none d-md-block">Customer Tickets</span>
                </a>
            </li> -->
        </ul> 
        <div class="tab-content border p-2">
            <div class="tab-pane " id="CustomerTicket">
                <div class="card shadow-sm bg-light mb-0 shadow-sm border">
                    <div class="card-header border-0 pb-0 bg-light text-center">
                        <strong class="fw-bold"> Overview</strong>
                    </div>
                    <div class="card-body p-0 py-2">
                        <div class="row m-0">
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">15</strong>
                                    </div>
                                    <div class="fw-bold text-danger">Open</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">5</strong>
                                    </div>
                                    <div class="fw-bold text-info">Inprogress</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">56</strong>
                                    </div>
                                    <div class="fw-bold text-dark">Answered</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">45</strong>
                                    </div>
                                    <div class="fw-bold text-warning">On Hold</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">1458</strong>
                                    </div>
                                    <div class="fw-bold text-success">Closed</div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="my-2 x-y-between"  >
                    <h3 class="h4">Ticket on the Project</h3>
                   
                    <a  href="  {{ URL('admin/create-project-ticket') }}/@{{project.id}}" class="btn btn-primary"><i class="mdi mdi-briefcase-plus"></i>   Create Variation Order </a>

                 <!-- <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#Variation_mdal-box">
                        Create Variation Order
                    </button> -->
                   
                </div>
                <table class="table custom custom table-bordered table-hover m-0" >
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Ticket #</th>
                            <th>Customer Name</th>
                            <th>Title</th>
                            <th>Details</th>
                            <th>Last Reply</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                      
                            <tr ng-repeat="(index,pticketsdata) in ptickets">
                                <td>@{{ index+1 }}</td>
                                <td>TIC-00@{{ index+1 }}</td>
                                <td> @{{customer.customerdatails.first_name}} @{{customer.customerdatails.first_name}}</td>
                                <td ng-bind-html="pticketsdata.title">@{{ pticketsdata.title }}</td>
                                <td>-</td>
                                <td>@{{ pticketsdata.change_date }}</td>
                                <td><span class="badge bg-success">open</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm py-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="dripicons-dots-3 "></i>
                                        </button>
                                        
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" ng-click="projectticketshow(pticketsdata.id)" >View</a>
                                            <a class="btn dropdown-item" ng-click="sendMailToCustomerticket(pticketsdata.id,customer.customerdatails.id)">Send Mail</a>
                                            <a class="dropdown-item" ng-click="showCommentsToggle('viewConversations', 'project_ticket_comment', 'Ticket Comment',pticketsdata.id)">Reply comment</a>
                                            <a class="dropdown-item" href="#" >Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr> 
                    </tbody>
                </table>
            </div>
            <div class="tab-pane show active" id="InternalTickets"> 
                <div class="card shadow-sm bg-light mb-0 shadow-sm border">
                    <div class="card-header border-0 pb-0 bg-light text-center">
                        <strong class="fw-bold"> Overview</strong>
                    </div>
                    <div class="card-body p-0 py-2">
                        <div class="row m-0">
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">@{{overview.new}}</strong>
                                    </div>
                                    <div class="fw-bold text-danger">New</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">@{{overview.open}}</strong>
                                    </div>
                                    <div class="fw-bold text-info">Open</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">@{{overview.close}}</strong>
                                    </div>
                                    <div class="fw-bold text-dark">Close</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">@{{overview.pending}} </strong>
                                    </div>
                                    <div class="fw-bold text-warning">Pending</div>
                                </div>
                            </div> 
                           {{-- <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">6</strong>
                                    </div>
                                    <div class="fw-bold text-success">Low</div>
                                </div>
                            </div>  --}}
                        </div>
                    </div>
                </div>
                <h3 class="h4 mb-0 mt-3">Issues Summary</h3>
                <div class="d-flex justify-content-between border-bottom align-items-end">
                    <div>
                        <button class="fw-bold border-primary border-start-0 border-end-0 border-top-0 rounded-0 border-bottom btn btn-sm" ng-click = "tablesearch('all')">All</button>
                        <button class="rounded-0 border-0 btn btn-sm ms-1" ng-click = "tablesearch('internal')">Internal</button>
                        <button class="rounded-0 border-0 btn btn-sm ms-1" ng-click = "tablesearch('customer')">Customer</button>
                    </div>
                    <div class="pb-2">
                        <button class="ms-1 border rounded btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#rasieTicketDetails"><i class="mdi mdi-plus me-1"></i> New Issue</button>
                        {{-- <a  href="{{ route('admin.live-project.ticket-create', ['id'=>  1]) }}" class="btn btn-primary"><i class="mdi mdi-briefcase-plus"></i>   Create Variation Order </a>--}}
                        <!--<button class="ms-1 border rounded btn btn-sm"><i class="mdi me-1 mdi-chart-bar"></i> Report</button>
                        <button class="ms-1 border rounded btn btn-sm"><i class="mdi mdi-dots-horizontal"></i></button> -->
                    </div>
                </div>
                <div class="mb-2 pt-2 row mx-0 align-items-center">
                    <div class="d-flex align-items-center col-4 p-0">
                        
                    </div>
                    <div class="col-8 p-0">
                       
                        <div class="input-group justify-content-end">
                           
                            <button type="button" data-bs-toggle="modal" data-bs-target="#right-modal" title="Click to Filter"  class="ms-1 border rounded btn btn-sm"><i class="mdi me-1 mdi-filter-variant"></i> Filter</button>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi me-1 mdi-eye-outline"></i> Show / hide fields
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <label for="test@{{$index}}" class="dropdown-item" ng-repeat="col in cols" >
                                        <input type="checkbox"  ng-model="col.show" name="" id="test@{{$index}}" class="form-check-input me-1">
                                        @{{col.title}}
                                    </label>
                                  
                                </ul>
                              </div>
                           <!-- <button class="ms-1 border rounded btn btn-sm"><i class="fa fa-expand"></i></button> -->
                        </div>
                    </div>
                </div>
               
             
                <table class="table custom table-striped table-bordered" datatable="ng" id="tablebqup" dt-options="vm.dtOptions">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th ng-repeat="locale in cols" ng-show="locale.show" class="text-center">@{{locale.title}}</th>
                          
                            <th><i class="dripicons-menu"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            <tr ng-repeat="(ptcindex,pticketscomment) in pticketcomment">
                                <td >@{{ ptcindex+1 }}</td>
                                <td ng-show="cols[0].show" style="padding: 0 !important" class="text-center"><button class="btn btn-sm btn-outline-primary p-0 px-1"><a class="dropdown-item fw-bold" data-bs-toggle="modal" ng-click="showTicketComments(pticketscomment.id,'show')"><small>@{{customer.reference_number}} / TIKXX-0@{{ pticketscomment.id }}</small></a></button></td>
                                <td ng-show="cols[1].show">@{{pticketscomment.requester}}</td>
                                <td ng-show="cols[2].show">
                                    <div class="d-flex align-items-center">
                                       
                                        <div>
                                            <h5 class="m-0 font-14">
                                               @{{pticketscomment.type}}
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td ng-show="cols[3].show">@{{pticketscomment.summary}}</td>
                                <td ng-show="cols[4].show">@{{pticketscomment.description}}</td>
                                <td ng-show="cols[5].show">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset("public/assets/images/") }}/@{{pticketscomment.assigndetails.image}}" alt="Arya S" class="rounded-circle me-2" height="24">
                                        <div>
                                            <h5 class="m-0 font-14">
                                                @{{pticketscomment.assigndetails.first_Name}} 
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                
                                <td ng-show="cols[6].show"><span ng-class="{'badge bg-danger': pticketscomment.project_status == 'New', 'badge bg-warning': pticketscomment.project_status == 'pending', 'badge bg-secondary': pticketscomment.project_status == 'close', 'badge bg-info': pticketscomment.project_status == 'open'}" >@{{pticketscomment.project_status}}</span></td>
                                <td ng-show="cols[7].show"> <small>@{{ pticketscomment.ticket_date | date: 'dd-MM-yyyy h:mm a'}}<br> <!--<small class="text-secondary">(Due in 1d)</small>--></small></td>
                                <td ng-show="cols[8].show" style="padding: 0 !important" class="text-center">@{{pticketscomment.priority}} </td>
                              
                                <td ng-show="cols[9].show"><small>@{{ pticketscomment.updated_at | date:"dd-MM-yyyy h:mm a" }}</small> </td>
                                <td style="padding: 0 !important" class="text-center" >
                                    <div class="dropdown">
                                        <i class="dripicons-dots-3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" data-bs-toggle="modal" ng-click="showCommentsToggle('viewConversations', 'internal', 'Ticket Comment',pticketscomment.id)">View/Reply</a>
                                            <a class="dropdown-item"ng-click = "ticketdelete(pticketscomment.id)">Delete</a>
                                           
                                        </div>
                                    </div>
                                </td>
                            </tr>
                           
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
</div>  

{{-- ========== Raise Ticket ========== --}}
<div id="rasieTicketDetails" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form class="needs-validations"  id="newissuesForm" name="newissuesForm" ng-submit="submitticketForm()" novalidate enctype="multipart/form-data">
            
            <div class="modal-content card m-0">
                <div class="modal-header bg-light">
                    <div class="modal-title d-flex">
                        <i class="fa fa-plus f-26 me-1 text-secondary" style="margin-top: -4px;"></i> 
                        <div>
                            <h4 class="m-0">Create a new Issue</h4> 
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="row m-0">
                        <div class="col-lg-7 p-0">
                            <div class="card text-start m-0 border" > 
                                <div class="card-header">
                                    <h3 class="card-title m-0 h5">Add details</h3>
                                    <input type = "hidden" id = "project_case"  name = "project_id" ng-model = "case.project_id" value= "@{{ticket.projectid}}">
                                </div>
                                <div class="card-body">
                                    


                                    <div class="mb-3">
                                        <label for="example-select" class="form-label text-secondary">Summary<sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control form-control-sm"  name = "summary" ng-model = "case.summary" ng-required="true">
                                        <small class="text-danger" ng-show="newissuesForm.summary.$invalid && newissuesForm.summary.$toucehd">This field is required</small>
                                    </div> 
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label text-secondary">Description<sup class="text-danger">*</sup></label>
                                        <textarea class="form-control form-control-sm" cols="20" rows="5" ng-model = "case.description"  ng-required="true"></textarea>
                                    </div> 
                                    <div>
                                        
                                        <div class="mb-3">
                                            
                                            <label for="Attachments" class="form-label text-secondary" >Attachments</label>
                                            

                                            <div class="field" align="left">
                                               
                                               <!-- <input type="file" class="form-control" onchange="angular.element(this).scope().SelectFile(event)" accept="image/png, image/jpeg, image/jpg" id="file" ng-model="FormData.file" name="file" multiple />-->

                                                {{-- <input type='file' multiple ng-file='uploadfiles'  onchange="angular.element(this).scope().upload(event)"> --}}
                                                {{-- <input  type="file" class="form-control file-control rounded-pill" file-model="projectFiles" id ="@{{ documentType.slug }}"/> --}}
                                                <input type="file" onchange="angular.element(this).scope().SelectFile(event)" id="files" multiple/>

                                                <p id = "case_image"ng-model = "case.file_id" ng-show="!responses.name" style="display: none;">@{{ responses.name }}</p>
                                                
                                                <div class="error-msg">
                                                    <small class="error-text" ng-if="frm.file.$touched && frm.file.$error.required">This field is required!</small>
                                                </div>
                                            </div>
                                          



                                        </div> 
                                       
                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" ng-show="responses.name.length">
                                            <ol class="carousel-indicators">
                                                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="$index" class="active"  ng-repeat="curesponse in responses.name"></li>
                                                
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item" ng-class="{active: $index == 0}" ng-repeat="response in responses.name">
                                                    
                                                    <img class="w-100" style="max-height: 180px;object-fit:cover" ng-src="@{{response}}"  alt="First slide">
                                                </div>
                                                
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" ng-show="responses.name.length != $index "  aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </a>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        </div>
                        <div class="col">
                            <div class="cardx">
                                <div class="card-body">

                                    <div class="mb-3" >
                                        <label for="example-select" class="form-label text-secondary">Assign Type <sup class="text-danger">*</sup></label>
                                        <div>
                                            <!-- Default radio -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="internal" ng-model = "case.type"  ng-click="ticket_type('internal')"  ng-required="true" />
                                                <label class="form-check-label" for="flexRadioDefault1"> Internal </label>
                                            </div>
                                            
                                            <!-- Default checked radio -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="customer" ng-model = "case.type"  ng-click="ticket_type('customer')"  ng-required="true"  />
                                                <label class="form-check-label" for="flexRadioDefault2"> Customer </label>
                                            </div>
                                        </div>

                                        
                                    </div>


                                    <div class="mb-3">
                                        <label for="example-select" class="form-label text-secondary">Assignee<sup class="text-danger">*</sup></label>

                                       


                                        <select class="form-select form-select-sm shadow" id="example-select_project"  ng-required="true" >
                                           
                                                <option ng-if = "projectManagers.length == '0'" selected value = "0" > AEC prefab as </option>
                                                <option ng-repeat="projectManager in projectManagers" value="@{{ projectManager.id }}" ng-selected="projectManager.id == taskListData.assign_to">
                                                    @{{ projectManager.first_Name }}
                                                </option>

                                            
                                           
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-select" class="form-label text-secondary">Tag</label>
                                        <input id="ms1" class="my-control" type="text" name="ms1"/>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-select" class="form-label text-secondary">Priority<sup class="text-danger">*</sup></label>
                                        <select class="form-select form-select-sm shadow" id="example-select" ng-model = "case.priority"  ng-required="true">
                                            <option value = "critical">Critical</option>
                                            <option value = "high">High</option>
                                            <option value = "medium">Medium</option>
                                            <option value = "low">Low</option>
                                        </select>
                                    </div> 
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label text-secondary">Due Date<sup class="text-danger">*</sup></label>
                                        <input type="datetime-local"  min="2001-01-01T00:00:00" max="2013-12-31T00:00:00" class="form-control form-control-sm" ng-model = "case.ticket_date"  ng-required="true">
                                    </div> 
                                    <div class="mb-3">
                                       
                                        <label for="example-select" class="form-label text-secondary">Requester</label><Br>
                                       
                                        <select class="form-select form-select-sm shadow requested" id="example-select">
                                            <option ng-repeat="req in Requester" value="@{{ req.id }}" ng-selected="projectManager.id == taskListData.assign_to">
                                                @{{ req.first_Name }}
                                            </option>
                                            
                                            
                                        </select>
                                        <label for="example-select" class="form-label text-secondary" ng-model = "case.created_by" style="display: none;">{{Auth::user()->id}}</label>
                                    </div> 

                                    <div class="mb-3 customer_variation" style="display: none;" >
                                        <input class="form-check-input" type="checkbox" ng-model = "case.variation" id="check1" name="option1" value="something" checked>
                                        <label for="example-select" class="form-label text-secondary">Converted Variation Order</label>

                                        
                                    </div> 
                                </div>
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="modal-footer border-top text-end">
                    <button class="btn btn-light shadow-sm border btn-sm" ng-click=discardticket()>Discard</button>
                    
                    <button class="btn btn-info btn-sm" ng-disabled="newissuesForm.$invalid" onclick >Submit</button>
                </div>
         </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div>
{{-- ========== Raise Ticket ========== --}}

{{-- ========== Ticket Viwe =========== --}} 
    <div id="viewTicketDetails" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content card m-0">
                <div class="modal-header bg-light">
                    <div class="modal-title d-flex">
                        <i class="fa fa-thumb-tack f-26 me-1 text-secondary" style="margin-top: -4px;"></i> 
                        <div>
                          
                            <h4 class="m-0">@{{projectticket.reference_number}}  |    @{{projectticket.project_name}} </h4> 
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body" style="height: 90vh;overflow:auto">
                    <div class="row m-0">
                        <div class="col-lg-7 p-0">
                            <div class="card text-start m-0 border" > 
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <img src="{{ asset('public/assets/images/') }}/@{{header.image}}" class="me-2 rounded-circle" height="30" alt="Rhonda D">
                                        <div class="w-100 overflow-hidden">
                                            <h5 class="mt-0 mb-0 font-14">
                                               @{{header.username}}
                                            </h5>
                                            <p class="mt-1 mb-0 text-muted font-14">
                                               {{-- <span class="w-75">3 hours ago (Fri, 8 Jul 2022 at 10:08 AM)</span>--}}
                                            </p> 
                                        </div>
                                    </div> 
                                    <hr>
                                    {{--  --}}
                                    <ul class="conversation__box" >
                                     
                                       <li class="right__conversation" ng-repeat="comment in commentsData" ng-if="comment.created_by == {{ Admin()->id }}">
                                            <div>
                                              
                                                <p class="m-0 font-14" >   @{{comment.comments}}</p> 
                                                <small> @{{comment.created_at  | date: 'dd-MM-yyyy'}}</small>
                                            </div>
                                        </li>
                                        <li class="left__conversation" ng-repeat="comment in commentsData" ng-if="comment.created_by != {{ Admin()->id }}">
                                            <div>
                                              
                                                <p class="m-0 font-14">@{{comment.comments}}</p> 
                                                <small>10:04</small>
                                            </div>
                                        </li>
                                       <!-- <li class="left__conversation">
                                            <div>
                                                <h5 class="m-0 mb-1 font-14">
                                                    Rhonda D
                                                    <small>10:04</small>
                                                </h5>
                                                <p class="m-0 font-14">Yeah everything is fine</p> 
                                            </div>
                                        </li>
                                        <li class="right__conversation">
                                            <div>
                                                <h5 class="m-0 mb-1 font-14">Dominic</h5>
                                                <p class="m-0 font-14">Wow that's great</p> 
                                                <small>10:04</small>
                                            </div>
                                        </li>
                                        <li class="left__conversation">
                                            <div>
                                                <h5 class="m-0 mb-1 font-14">Rhonda D</h5>
                                                <p class="m-0 font-14">Let's have it today if you are free</p> 
                                                <small>10:04</small>
                                            </div>
                                        </li>
                                        <li class="right__conversation">
                                            <div>
                                                <h5 class="m-0 mb-1 font-14">Dominic</h5>
                                                <p class="m-0 font-14">Sure thing! let me know if 2pm works for you</p> 
                                                <small>10:04</small>
                                            </div>
                                        </li>
                                        <li class="left__conversation">
                                            <div>
                                                <h5 class="m-0 mb-1 font-14"> Rhonda D </h5>
                                                <p class="m-0 font-14">Sorry, I have another meeting scheduled at 2pm. Can we have it at 3pm instead?</p> 
                                                <small>10:04</small>
                                            </div>
                                        </li>
                                        <li class="left__conversation">
                                            <div>
                                                <h5 class="m-0 mb-1 font-14">Rhonda D</h5>
                                                <p class="m-0 font-14">We can also discuss about the presentation talk format if you have some extra mins</p> 
                                                <small>10:04</small>
                                            </div>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="card-footer bg-light border-top">
                                    <div class="collapsed collapse mb-2" id="ReplayMail">
                                        <small>To : <b> @{{header.email}}</b></small>
                                      
                                        <textarea class="form-control mt-1" id = "replay_textarea" ng-model = "inlineComments">Hi..  @{{header.username}}</textarea>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <i class="mdi mdi-account btn me-2 shadow-sm border btn-sm" style="background: #e7e7e7"></i>
                                        <div>
                                            <button class="btn btn-light border bg-white btn-sm fw-bold collapse show" id="ReplayMail" data-bs-toggle="collapse"
                                                href="#ReplayMail" aria-expanded="false"
                                                aria-controls="ReplayMail"> 
                                                <i class="uil-corner-up-left me-1"></i> Reply
                                            </button>
                                            <i class="mdi mdi-delete btn me-2 shadow-sm border btn-sm collapsed collapse text-danger" data-bs-toggle="collapse"
                                            href="#ReplayMail" aria-expanded="false" aria-controls="ReplayMail" id="ReplayMail" style="background: #e7e7e7"></i>
                                            <button class="btn btn-primary btn-sm fw-bold collapsed collapse" id="ReplayMail" ng-click = "issuesreplaycomment('issues',header.ticketid,header.project_id)"> 
                                                <i class="uil-corner-up-left me-1"  ></i> Send
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 p-0 ">
                            <div class="cardx">
                                <div class="card-body">
                                    <div class="cart-title"><b>PROPERTIES</b> </div> <br>
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label text-secondary">Tiket ID</label>
                                        <div class="form-control shadow"> 
                                            <a class="dropdown-item fw-bold" data-bs-toggle="modal" ng-click="showTicketComments(header.ticketid,'show')">
                                                <u>@{{projectticket.reference_number}} /TIK0-@{{header.ticketid}}</u>
                                            </a> 
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-select"  class="form-label text-secondary">Priority</label>
                                        <select class="form-select shadow" id="example-select" ng-model="header.priority">
                                            <option value = "critical"  ng-selected="header.priority == 'critical'">Critical</option>
                                            <option value = "high"  ng-selected="header.priority == 'high'">High</option>
                                            <option value = "medium"  ng-selected="header.priority == 'medium'">Medium</option>
                                            <option value = "low"  ng-selected="header.priority == 'low'">Low</option>
                                           
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label text-secondary">Status</label>
                                        <select class="form-select shadow" id="example-select" ng-model="header.status">
                                            <option ng-selected = "header.status == 'New'"  value="New">New</option>
                                            <option ng-selected = "header.status == 'open'"  value="open">Open</option>
                                            <option  ng-selected = "header.status == 'close'" value="close">Close</option>
                                            <option  ng-selected = "header.status == 'pending'" value="pending">Pending</option>
                                        </select>
                                    </div> 
                                    <button class="btn btn-sm btn-info w-100"  ng-click = updateticketstatus(header.ticketid)><i class="mdi mdi-rotate-left me-1"></i> Update</button>
                                </div>
                            </div>
                        </div>
                       <!-- <div class="col-lg-2 p-0 border-start   ">
                            <div class="cardx">
                                <div class="card-body">
                                    <div class="mt-3 text-center">
                                        <img src="{{ asset('public/assets/images/users/avatar-10.jpg') }}" alt="shreyu" class="img-thumbnail avatar-lg rounded-circle">
                                        <h4>Shreyu N</h4>
                                        <p class="mt-2 font-14">Last Interacted: <strong>3 hours ago</strong></p>
                                    </div>
                                    <div class="mt-3">
                                        <hr>
                                        <p class="mt-4 mb-1"><strong><i class="uil uil-envelope-alt me-1"></i></strong><span>support@gmail.com</span></p>
                                        <p class="mt-3 mb-1"><strong><i class="uil uil-phone me-1"></i></strong><span>+1 456 9595 9594</span> </p>
                                    </div>
                                </div>  
                            </div>
                        </div>-->
                    </div>
                </div> 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
{{-- ========== Ticket Viwe =========== --}}



<div id="Variation_mdal-box_pop" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-right h-100" style="width:100% !important">
        <div class="modal-content h-100">
            <div class="modal-header border-0">
                <h4 class="modal-title" id="myLargeModalLabel"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body  "  style="overflow: auto">
                {{-- <div class="card pt-3">
                    <div id="mail_content_first_text_editor">
                        <div text-angular="text-angular" name="mail_content_first" ng-model="mail_content_first" ta-disabled='disabled'></div>      
                    </div>
                </div> --}}

                
                <form id="createvariationForm" name="createvariationForm" ng-submit="submitcreatevariationForm()">

                <table class="table custom table-bordered">
                    <thead>
                        <tr>
                            <td colspan="2" class="text-center" style="background: #F4F4F4"><b class="h4">Variation Request - 01</b></td>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <tr>
                            <td width="200px"><b>Project Name</b></td>
                            <td>@{{ modelcustomer.project_name}}</td>
                        </tr>
                        <tr>
                            <td><b>Client Name</b></td>
                            <td>@{{ modelcustomer.company_name}}</td>
                        </tr>
                        <tr>
                            <td><b>Project Incharge</b></td>
                            <td>Mariusz Pierzgalski</td>
                        </tr>
                        <tr>
                            <td><b>Date of Change Request</b></td>
                                <td><input type="date" get-to-do-lists ng-value="modelptickets.change_date | date: 'dd-MM-yyyy'" ng-model="ticket.change_date" id="" class=" border-0 form-control form-control-sm"></td>
                        </tr> 
                    </tbody>
                </table>
                <table class="table custom table-bordered">
                    <tbody>
                        <tr><td colspan="2" class="text-center" style="background: #F4F4F4"><b>Change Request Overview</b></td></tr>
                        <tr>
                            <td width="250px"><b>Description of Variation / Change</b></td>
                            <td ng-bind-html="modelptickets.description">@{{modelptickets.description}}</td>
                        </tr> 
                        <tr>
                            <td><b>Reason for Variation / Change</b></td>
                            <td ng-bind-html="modelptickets.response">@{{modelptickets.response}}</td>
                        </tr>  
                    </tbody>
                </table>
                <table class="table custom table-bordered">
                    <tbody>
                        <tr><td colspan="4"class="text-center" style="background: #F4F4F4"><b>Change in Contract Price</b></td></tr>
                        <tr>
                            <td><b>Estimated Hours</b></td>
                            <td><b>Price/Hr</b></td>
                            <td rowspan="2"></td> 
                            <td rowspan="2" class="text-center">kr @{{modelptickets.total_price}}</td> 
                        </tr> 
                        <tr>
                            <td>@{{modelptickets.project_hrs}}</td>
                            <td>@{{modelptickets.project_price}}</td> 
                        </tr> 
                    </tbody>
                    <tfoot>
                        <tr>
                           <td colspan="2"></td>
                            <td rowspan="2" class="text-end"><b>Total Price</b></td> 
                            <td rowspan="2" class="text-center"><b>kr@{{modelptickets.total_price}}</b></td> 
                        </tr> 
                    </tfoot>
                </table> 
            </form>
            </div> 
            {{-- <div class="modal-footer"> 
                <button class="btn btn-primary"  ><i class="fa fa-save me-2"></i>Update</button>
            </div> --}}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



{{-- ticket comments show start--}}

<div id="ticket_mdal-box" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-right h-100" style="width:100% !important">
        <div class="modal-content h-100">
            <div class="modal-header border-0">
                <h4 class="modal-title" id="myLargeModalLabel"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body  "  style="overflow: auto">
                {{-- <div class="card pt-3">
                    <div id="mail_content_first_text_editor">
                        <div text-angular="text-angular" name="mail_content_first" ng-model="mail_content_first" ta-disabled='disabled'></div>      
                    </div>
                </div> --}}

                
                <form id="createvariationForm" name="createvariationForm" ng-submit="submitcreatevariationForm()">

                <table class="table custom table-bordered">
                    <thead>
                        <tr>
                            <td colspan="2" class="text-center" style="background: #F4F4F4"><b class="h4">@{{customer.project_name}}</b></td>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <tr>
                            <td width="200px"><b>Reference No </b></td>
                            <td>@{{ customer_model.reference_number}}/TIK0@{{pticketcomment_model.id}}</td>
                        </tr>
                        <tr>
                            <td><b>Summary</b></td>
                            <td>@{{pticketcomment_model.summary}}</td>
                        </tr>
                        <tr>
                            <td><b>Description</b></td>
                            <td>@{{pticketcomment_model.description}}</td>
                        </tr>
                        <tr>
                            <td><b>Priority</b></td>
                                <td>@{{pticketcomment_model.priority}}</td>
                        </tr> 
                        <tr>
                            <td><b>Status</b></td>
                                <td>@{{pticketcomment_model.project_status}}</td>
                        </tr> 
                        <tr>
                            <td><b>Due By</b></td>
                                <td>@{{pticketcomment_model.ticket_date | date: 'dd-MM-yyyy'}}</td>
                        </tr> 
                    </tbody>
                </table>
                
                
            </form>
            </div> 
            {{-- <div class="modal-footer"> 
                <button class="btn btn-primary"  ><i class="fa fa-save me-2"></i>Update</button>
            </div> --}}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- filter -->

<div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-right" style="width:100% !important">
        <div class="modal-content p-3 h-100 d-flex justify-content-center align-items-center" >
            <div>
                <div class="border-0">
                    <button type="button" id= "filter_close" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div >
                    <div class="my-3">
                        <h3 class="page-title">Filter</h3>
                    </div>
                     
                    <div class="mb-3 row mx-0">
                        <div class="col p-0 me-md-2">
                            <label class="form-label">Due Date</label>
                            
                            {{--<input type="date" class="form-control date" id="birthdatepicker" data-toggle="date-picker"  ng-model = "fromdate" data-single-date-picker="true">--}}
                            <div class="form-group">
                                <input date-range-picker="t1"
                                id = "due_date"
                                start-date="startDate"
                                end-date="endDate"
                                placeholder="select"
                                data-ng-required="true"
                                ng-model = "due_date"
                               
                                clear-on-cancel="true"
                                date-range-picker-options="options"
                                class="form-control">
                               
                
                       
                        </div>
                        </div>
                        
                    </div>
                    <div class="mb-3 row mx-0">
                        <div class="col p-0 me-md-2">
                            <label class="form-label">Requster Date</label>
                            
                            {{--<input type="date" class="form-control date" id="birthdatepicker" data-toggle="date-picker"  ng-model = "fromdate" data-single-date-picker="true">--}}
                            <div class="form-group">
                                <input date-range-picker="t2"
                                id="requester_date"
                                start-date="startDate2"
                                end-date="endDate2"
                                placeholder="select"
                                data-ng-required="true"
                              
                                clear-on-cancel="true"
                                date-range-picker-options="options"
                                class="form-control">
                
                       
                        </div>
                        </div>
                        
                    </div>
                    <div class="row m-0">
                        <div class="col p-0 me-md-2">
                            <div class="mb-3 ">
                                <label class="form-label">Project Priority</label>
                                <select class="form-select" ng-model="priority">
                                    <option value = "critical">Critical</option>
                                    <option value = "high">High</option>
                                    <option value = "medium">Medium</option>
                                    <option value = "low">Low</option>
                                </select>
                            </div>
                        </div>
                        <div class="col p-0">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" ng-model="status">
                                    <option selected>-- select --</option>
                                    <option value="new">New </option>
                                    <option value="open">Open</option>
                                    <option value="close">Close</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row m-0">
                        <div class="col p-0 me-md-2">
                            <div class="mb-3 ">
                                <label class="form-label">Ticket Type</label>
                                <select class="form-select" ng-model="tickettype">
                                    <option value = "internal">Internal</option>
                                    <option value = "customer">Customer</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col p-0">
                            <div class="mb-3">
                                <label class="form-label">Issues Number </label>
                                <input type="text" class="form-control" ng-model="refno" placeholder="Type Here...">
                            </div>
                        </div>
                    </div>


                    
                    
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" ng-click="tablesearch('filtersearch')">
                            <i class="mdi me-1 mdi-filter-variant"></i> Submit
                        </button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- show hide -->
<div id="right-modal-show" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-right" style="width:100% !important">
        <div class="modal-content p-3 h-100 d-flex justify-content-center align-items-center" >
            <div>
                <div class="border-0">
                    <button type="button" id= "filter_close" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div >
                    <div class="my-3">
                        <h3 class="page-title">Header</h3>
                    </div>

                    <label class="checkbox-inline" ng-repeat="col in cols">
                        <input type="checkbox" ng-model="col.show" /> @{{col.title}}
                      </label>
                    
                    
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" ng-click="showhide(col.show)">
                            <i class="mdi mdi-filter-menu"></i> Submit
                        </button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    


<div class="card-footer text-end">
    <a href="#!@{{ PrevRoute }}" ng-show="indexRoute" class="btn btn-light float-start">Prev</a>
    <a href="#!@{{ NextRoute }}" ng-show="HideNextRoute" class="btn btn-primary">Next</a>
    <a href="#" ng-show="SubmitRoute" class="btn btn-primary">Submit & Save</a>
</div>
@include("admin.enquiry.models.ticket-chat-box")  
@push('custom-styles')
<style>
#tablebqup_length {
    display: none !important;
    
}
.dataTables_length {
    display: none !important
}
</style>
    
@endpush