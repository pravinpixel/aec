<div class="p-2">    
    <div>
        <ul class="nav nav-tabs mb-0 border-bottom-0">
            <li class="nav-item">
                <a href="#CustomerTicket" data-bs-toggle="tab" aria-expanded="false" class="nav-link active border-bottom-0">
                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                    <span class="d-none d-md-block">Customer Tickets</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#InternalTickets" data-bs-toggle="tab" aria-expanded="true" class="nav-link  border-bottom-0">
                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                    <span class="d-none d-md-block">Internal Tickets</span>
                </a>
            </li> 
        </ul> 
        <div class="tab-content border p-2">
            <div class="tab-pane show active" id="CustomerTicket">
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
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr> 
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="InternalTickets"> 
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
                                        <strong class="lead fw-bold ms-2">6</strong>
                                    </div>
                                    <div class="fw-bold text-dark">Answered</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">6</strong>
                                    </div>
                                    <div class="fw-bold text-warning">On Hold</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">6</strong>
                                    </div>
                                    <div class="fw-bold text-success">Closed</div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="my-2 x-y-between">
                    <h3 class="h4">Ticket Summary</h3>
                    <button class="btn btn-sm btn-primary">Raise Ticket</button>
                </div>
                <table class="table custom custom table-bordered table-hover m-0">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Ticket #</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Raised By</th>
                            <th>Last Reply Date</th>
                            <th>Assign To</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i=0;$i<6;$i++)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>TIC-00{{ $i+1 }}</td>
                                <td>01-01-2022</td>
                                <td>What is the update</td>
                                <td>Alex</td>
                                <td>02-01-2022</td>
                                <td>Hema</td>
                                <td><span class="badge bg-success">open</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm py-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="dripicons-dots-3 "></i>
                                        </button> 
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewTicketDetails" href="#">View</a>
                                            <a class="dropdown-item" href="#">Reply</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
</div>  

{{-- ========== Ticket Viwe =========== --}} 
<div id="viewTicketDetails" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width ">
        <div class="modal-content card">
            <div class="modal-header bg-light">
                <div class="modal-title d-flex">
                    <i class="uil-envelope-alt f-26 me-2 text-secondary" style="margin-top: -9px;"></i> 
                    <div>
                        <h4 class="m-0">Received a broken TV</h4>
                        <span class="text-secondary f-14">Raised by <b>Alex.</b></span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="row m-0">
                    <div class="col-lg-7 p-0">
                        <div class="card text-start m-0 border" style="min-height: 500px"> 
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <img src="{{ asset('public/assets/images/users/avatar-10.jpg') }}" class="me-2 rounded-circle" height="30" alt="Rhonda D">
                                    <div class="w-100 overflow-hidden">
                                        <h5 class="mt-0 mb-0 font-14">
                                            Rhonda D
                                        </h5>
                                        <p class="mt-1 mb-0 text-muted font-14">
                                            <span class="w-75">3 hours ago (Fri, 8 Jul 2022 at 10:08 AM)</span>
                                        </p> 
                                    </div>
                                </div> 
                                <hr>
                                <div class="d-flex align-items-start">
                                    <i class="uil-envelope-alt f-18 me-3 text-secondary" style="margin-top: -5px;"></i> 
                                    <div class="w-100 overflow-hidden">
                                        <h5 class="mt-0 mb-0 font-14">
                                            Rhonda D
                                        </h5>
                                        <p class="mt-1 mb-0 font-14">
                                            Hi, <br>
                                            The television I ordered from your site was delivered with a cracked screen. I need some help with a refund or a replacement.
                                            <br><br>
                                            Here is the order number <small><b>FD07062010</b></small>
                                            <br><br>
                                            Thanks,
                                            Sarah
                                        </p> 
                                    </div>
                                </div>  
                            </div>
                            <div class="card-footer bg-light border-top">
                                <div class="collapsed collapse mb-2" id="ReplayMail">
                                    <small>To : <b>sarah.james@gmail.com</b></small>
                                    <textarea class="form-control mt-1">Hi.. Rhonda D</textarea>
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
                                        <button class="btn btn-primary btn-sm fw-bold collapsed collapse" id="ReplayMail"> 
                                            <i class="uil-corner-up-left me-1"></i> Send
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 p-0 ">
                        <div class="cardx">
                            <div class="card-body">
                                <div class="cart-title">PROPERTIES </div> <br>
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Type</label>
                                    <select class="form-select shadow" id="example-select">
                                        <option>Question</option>
                                        <option>Incident</option>
                                        <option>Problem</option>
                                        <option>Refund</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Status</label>
                                    <select class="form-select shadow" id="example-select">
                                        <option>Open</option>
                                        <option>Close</option>
                                        <option>Pending</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Assign To</label>
                                    <select class="form-select shadow" id="example-select">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Priority</label>
                                    <select class="form-select shadow" id="example-select">
                                        <option>Low</option>
                                        <option>High</option>
                                        <option>Medium</option>
                                    </select>
                                </div>
                                <button class="btn btn-sm btn-info w-100"><i class="mdi mdi-rotate-left me-1"></i> Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 p-0 border-start   ">
                        <div class="cardx">
                            <div class="card-body">
                                <div class="mt-3 text-center">
                                    <img src="{{ asset('public/assets/images/users/avatar-10.jpg') }}" alt="shreyu" class="img-thumbnail avatar-lg rounded-circle">
                                    <h4>Shreyu N</h4>
                                    <p class="text-muted mt-2 font-14">Last Interacted: <strong>Few hours back</strong></p>
                                </div>
                                <div class="mt-3">
                                    <hr>
                                    <p class="mt-4 mb-1"><strong><i class="uil uil-envelope-alt me-1"></i></strong><span>support@gmail.com</span></p>
                                    <p class="mt-3 mb-1"><strong><i class="uil uil-phone me-1"></i></strong><span>+1 456 9595 9594</span> </p>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div> 
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{-- ========== Ticket Viwe =========== --}}



<div id="Variation_mdal-box" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <td><input type="date" get-to-do-lists ng-value="modelptickets.change_date | date: 'yyyy-MM-dd'" ng-model="ticket.change_date" id="" class=" border-0 form-control form-control-sm"></td>
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
<div class="card-footer text-end">
    <a href="#!@{{ PrevRoute }}" ng-show="indexRoute" class="btn btn-light float-start">Prev</a>
    <a href="#!@{{ NextRoute }}" ng-show="HideNextRoute" class="btn btn-primary">Next</a>
    <a href="#" ng-show="SubmitRoute" class="btn btn-primary">Submit & Save</a>
</div>
@include("admin.enquiry.models.ticket-chat-box") 
