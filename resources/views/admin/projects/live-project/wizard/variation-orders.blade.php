<div class="p-2">
    <div class="card shadow-sm bg-light mb-0 shadow-sm border">
        {{--<div class="card-header border-0 pb-0 bg-light text-center">
            <strong class="fw-bold"> Variation Orders Overview</strong>
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
    </div>--}}
    <div class="my-2">
        <h3 class="h4">Variation Order Summary</h3>
    </div>
  


    <table class="table custom table-bordered">
        <tbody class="panel"> 
            <tr>
                <td style="padding: 0 !important">
                    <table  class="table custom table-bordereds m-0">
                        <tr>
                            <th class="text-center" colspan="2" style="width: 6% !important">No</th>
                            <th class="text-center" style="width: 10% !important">File Name</th>
                            <th class="text-center" style="width: 10% !important">Version</th>
                            <th class="text-center" style="width: 10% !important">Status</th>
                            <th class="text-center" style="width: 28% !important">Comments</th>
                            <th class="text-center" style="width: 16% !important">Date & Time</th>
                            <th class="text-center" style="width: 6% !important">Action</th>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr ng-repeat="(key,P) in proposal">
                <td style="padding: 0 !important">
                    <table class="table custom table-bordered m-0">
                        <tbody class="panel"> 
                            <tr>
                                <td colspan="2" style="width: 6% !important" class="text-center">
                                    <div class="d-flex text-center" >
                                       
                                        <div class="me-2" ng-show="P.get_versions.length">
                                            <i data-bs-toggle="collapse" href="#togggleTable@{{ key+1 }}" aria-expanded="true" aria-controls="togggleTable@{{ key+1 }}" class="accordion-button custom-accordion-button collapsed bg-primary text-white toggle-btn m-0"></i>
                                        </div>
                                        <div class="me-2" ng-show="!P.get_versions.length" style="visibility: hidden">
                                            <i class="accordion-button custom-accordion-button collapsed bg-white text-white toggle-btn m-0"></i>
                                        </div>
                                        <div class="text-center">@{{ key+1 }}</div>
                                    </div>
                                </td>
                                <td style="width: 10% !important" class="text-center">@{{ P.template_name }}</td>
                                <td style="width: 10% !important" class="text-primary text-center">@{{ P.version }}</td>
                                <td style="width: 10% !important" class="text-info text-center"> 
                                    <proposal-status data="P.status" />
                                </td>
                                <td style="width: 28% !important" class="text-info text-center">
                                    <div class="proposal-comment">
                                        <div>
                                            @{{ P.comment }}
                                        </div> 
                                    </div>
                                </td>
                                <td style="width: 16% !important"class="text-center">
                                    <small>@{{P.mail_send_date | date:"MM/dd/yyyy 'at' h:mma"}} </small>
                                </td>
                                <td style="width: 6% !important" class="text-center"> 
                                    <div class="dropdown">
                                        <button type="button" class="toggle-btn btn-light btn-sm p-1 py-0 btn-light btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="dripicons-dots-3 "></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" ng-if="P.type == 'root'">
                                            
                                            <a  class="btn dropdown-item" ng-click="DuplicatePropose(P.proposal_id)">Duplicate</a>
                                            <a  class="btn dropdown-item" ng-click="variationticketshow(P.id)">View / Edit</a>
                                            {{-- <a class="btn dropdown-item" ng-click="sendMailToCustomer(P.proposal_id)">Send Proposal</a> --}}
                                            <a class="btn dropdown-item"  ng-click="showCommentsToggle(P.proposal_id, P.type)" > Chat</u></a>
                                        
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-end" ng-if="P.type == 'child'">
                                           
                                            <a  ng-show="proposal_email_status == 0 || (customer_response == 2 ||  customer_response == 3)" class="btn dropdown-item" ng-click="DuplicateProposalVersion(P.proposal_id)">Duplicate</a>
                                            <a class="dropdown-item" ng-click="variationticketshow(P.id,true)">View / Edit</a>
                                            {{-- <a class="btn dropdown-item" ng-click="sendMailToCustomerVersion(P.proposal_id , P.id)">Send Proposal</a> --}}
                                            <a class="btn dropdown-item"  ng-click="showCommentsToggle(P.id, P.type)" > Chat</u></a>
                                            <a ng-show="P.status == 'awaiting'" class="btn dropdown-item" ng-click="DeleteProposeVersion(P.proposal_id , P.id)">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr> 
                            <tr  id="togggleTable@{{ key+1 }}" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <td colspan="8" class="hiddenRow" style="padding: 0 !important">
                                    <table class="table custom table-bordered m-0">
                                        <tbody> 
                                            <tr ng-repeat="(key2,V) in P.get_versions">
                                                <td  class="text-end" style="width: 6% !important">
                                                    <div class="text-end">@{{ key+1 }}.@{{ key2+1 }}</div>                                                    
                                                </td>
                                                <td style="width: 10% !important" class="text-center">@{{ V.template_name }}</td>
                                                <td style="width: 10% !important" class="text-info text-center"><b><small>@{{ V.version }}</small></b></td>
                                                {{-- <td style="width: 10% !important" class="text-info text-center"> 
                                                    <span ng-show="V.status == 'awaiting'" class="badge badge-outline-warning rounded-pill">Awaiting</span>
                                                    <span ng-show="V.status == 'sent'" class="badge badge-outline-success rounded-pill">sent</span>
                                                    <span> @{{ V.status  }} </span>
                                                </td> --}}
                                                <td style="width: 10% !important" class="text-info text-center"> 
                                                    <proposal-status data="V.status" />
                                                </td>
                                            
                                                <td style="width: 28% !important" class="text-info text-center">
                                                    <div class="proposal-comment">
                                                        <div>@{{ V.comment }} </div>
                                                    </div>
                                                </td>

                                                <td style="width: 16% !important" class="text-center">
                                                    <small>@{{V.mail_send_date | date:"MM/dd/yyyy 'at' h:mma"}}</small>
                                                </td>
                                                
                                                <td style="width: 6% !important" class="text-center"> 
                                                    <div class="dropdown">
                                                        <button type="button" class="toggle-btn btn-light btn-sm p-1 py-0 btn-light btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="dripicons-dots-3 "></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" ng-if="V.type == 'root'">
                                                            <a  class="btn dropdown-item" ng-click="DuplicatePropose(V.proposal_id)">Duplicate</a>
                                                            <a  class="btn dropdown-item" ng-click="variationticketshow(P.id,false)">View</a>
                                                            {{-- <a class="btn dropdown-item" ng-click="sendMailToCustomer(V.proposal_id)">Send Proposal</a> --}}
                                                            <a class="btn dropdown-item"  ng-click="showCommentsToggle(V.proposal_id, V.type)" > Chat</u></a>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end" ng-if="P.type == 'child'">
                                                            <a ng-show="proposal_email_status == 0 || (customer_response == 2 ||  customer_response == 3)" class="btn dropdown-item" ng-click="DuplicateProposalVersion(V.proposal_id)">Duplicate</a>
                                                            <a class="dropdown-item" ng-click="variationticketshow(P.id,false)">View </a>
                                                            {{-- <a class="btn dropdown-item" ng-click="sendMailToCustomerVersion(V.proposal_id , V.id)">Send Proposal</a> --}}
                                                            <a class="btn dropdown-item"  ng-click="showCommentsToggle(V.id, V.type)" > Chat</u></a>
                                                            <a ng-show="V.status == 'awaiting'" class="btn dropdown-item" ng-click="DeleteProposeVersion(V.proposal_id ,V.id)">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                </td>
                            </tr> 
                        </tbody>
                    </table>
                </td>
            </tr>  
        </tbody>
    </table>




    <table class="table custom custom table-bordered table-hover m-0">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Ticket #</th>
                <th>Customer Name</th>
                <th>Subject</th>
                <th>Details</th>
                <th>Last Reply</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="(index,pticketsdata) in ptickets">
                <td>@{{ index+1 }}</td>
                <td>
                    <button type="button" ng-click="projectticketshow(pticketsdata.id)" class="btn btn-sm py-0 btn-outline-primary" data-bs-toggle="modal" data-bs-target="#Variation_mdal-box">
                        TIC-00@{{ index+1 }} 
                    </button>
                </td>
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
                <table class="table custom table-bordered">
                    <thead>
                        <tr>
                            <td colspan="2" class="text-center" style="background: #F4F4F4"><b class="h4">Variation Request - 01</b></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center"><b class="h4">Architectural Support for Hytte Norefiell</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="200px"><b>Project Name</b></td>
                            <td>Hytte Norefiell</td>
                        </tr>
                        <tr>
                            <td><b>Client Name</b></td>
                            <td>Modul Pluss</td>
                        </tr>
                        <tr>
                            <td><b>Project Incharge</b></td>
                            <td>Mariusz Pierzgalski</td>
                        </tr>
                        <tr>
                            <td><b>Date of Change Request</b></td>
                            <td>22/05/2021</td>
                        </tr> 
                    </tbody>
                </table>
                <table class="table custom table-bordered">
                    <tbody>
                        <tr><td colspan="2" class="text-center" style="background: #F4F4F4"><b>Change Request Overview</b></td></tr>
                        <tr>
                            <td width="250px"><b>Description of Variation / Change</b></td>
                            <td>Architectural support for over all building design & detailing</td>
                        </tr> 
                        <tr>
                            <td><b>Reason for Variation / Change</b></td>
                            <td>There was no Architectural design for the building</td>
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
                            <td rowspan="2" class="text-center">kr 30, 000</td> 
                        </tr> 
                        <tr>
                            <td>60</td>
                            <td>kr 500</td> 
                        </tr> 
                    </tbody>
                    <tfoot>
                        <tr>
                           <td colspan="2"></td>
                            <td rowspan="2" class="text-end"><b>Total Price</b></td> 
                            <td rowspan="2" class="text-center"><b>kr 30, 000</b></td> 
                        </tr> 
                    </tfoot>
                </table>
                <a ng-click= "submitgeneralinfo()"  class="btn btn-primary" >Update</a>



            </div>
            {{-- <div class="modal-footer"> 
                <button class="btn btn-primary"  ><i class="fa fa-save me-2"></i>Update</button>
            </div> --}}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="card-footer text-end">
    <a href="#!@{{ PrevRoute }}" ng-show="indexRoute" class="btn btn-light float-start">Prev</a>
    <a href="#!@{{ NextRoute }}" ng-show="HideNextRoute" class="btn btn-primary">Next</a>
    <a href="#" ng-show="SubmitRoute" class="btn btn-primary">Submit & Save</a>
</div>