<ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header mt-0 pt-0 bg-light timeline-steps">
    <li class="time-bar"></li>
    @if(userHasAccess('project_summary_index'))
    <li class="nav-item Project_Info">
        <a href="#!/project-summary" style="min-height: 40px;" class="timeline-step">
            <div class="timeline-content">
                <div class="inner-circle @{{ project_summary_status == 'Active' ? 'bg-primary' :'bg-secondary' }}">
                    <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                </div>
            </div>
            <p class="h5 mt-2">Project summary</p>
        </a>
    </li>
    @endif
    @if(userHasAccess('technical_estimate_index'))
    <li class="nav-item  admin-Technical_Estimate-wiz">
        <a href="#!/technical-estimation" style="min-height: 40px;" class="timeline-step">
            <div class="timeline-content">
                <div class="inner-circle @{{ technical_estimation_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                    <img src="{{ asset("public/assets/icons/technical-support.png") }}" class="w-50 invert">
                </div>
            </div>
            <p class="h5 mt-2">Technical Estimate</p>
        </a>
    </li>
    @endif
    @if(userHasAccess('cost_estimate_index'))
    <li class="nav-item admin-Cost_Estimate-wiz"  style="pointer-events: @{{ technical_estimation_status ==  0 ? 'none' :'unset' }}">
        <a href="#!/cost-estimation" style="min-height: 40px;" class="timeline-step">
            <div class="timeline-content">
                <div class="inner-circle  @{{ cost_estimation_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                    <img src="{{ asset("public/assets/icons/budget.png") }}" class="w-50 invert">
                </div>
            </div>
            <p class="h5 mt-2">Cost Estimate</p>
        </a>
    </li> 
    @endif
    @if(userHasAccess('proposal_sharing_index'))
    <li class="nav-item admin-Proposal_Sharing-wiz" ng-class="{last:proposal_sharing_status == 0}" style="pointer-events: @{{ cost_estimation_status ==  0 ? 'none' :'unset' }}">
        <a href="#!/proposal-sharing" style="min-height: 40px;"  class="timeline-step">
            <div class="timeline-content">
                <div class="inner-circle @{{ proposal_sharing_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                    <img src="{{ asset("public/assets/icons/share.png") }}" ng-click="getDocumentaryFun();" class="w-50 invert">
                </div>                                                                        
            </div>
            <p class="h5 mt-2">Proposal Sharing</p>
        </a>
    </li>
    @endif
    @if(userHasAccess('customer_response_index'))
    <li  ng-show="proposal_sharing_status == 1"  class="nav-item admin-Delivery-wiz" style="pointer-events: @{{ customer_response ==  null ? 'none' :'unset' }}">
        <a href="#!/move-to-project" style="min-height: 40px;"  class="timeline-step" >
            <div class="timeline-content">
                <div class="inner-circle @{{ customer_response == '1' ? 'bg-primary' :'bg-secondary' }}">
                    <img src="{{ asset("public/assets/icons/arrow-right.png") }}" class="w-50 invert">
                </div>
            </div>
            <p class="h5  mts-2">Customer Response</p>
        </a>
    </li>
    @endif
</ul>
@if(userHasAccess('proposal_sharing_index'))
<div >
    <div class="card shadow-none p-0" class="accordion accordion-flush" id="accordionFlushExample">
        <div class="p-2 mx-auto col-md-8"> 
            <div>
                <h4 class="p-2 m-0 h4 text-center"> Select Proposal type </h4>
            </div>
            <div class="d-flex">
                <select  class="form-select me-2"  ng-model="documentary.documentary_title" name="documentary_title"    ng-required="true">
                    <option value="" selected>Select</option> 
                    <option value="@{{ emp.id }}" ng-repeat="(index,emp) in documentary_module_name">@{{ emp.documentary_title }}</option>  
                </select>
                <button ng-click="documentaryOneData()" class="btn btn-success float-right btn-sm" ><small> Create</small></button>
            </div> 
        </div> 
        
        <div class="card-body" >
            <div class="container p-0" ng-show="proposal.length"> 
                <h4 class="text-center h5 mb-3">Proposal Versioning</h4> 
                <table class="table custom table-bordered">
                    <tbody class="panel"> 
                        <tr>
                            <td style="padding: 0 !important">
                                <table  class="table custom table-bordereds m-0">
                                    <tr>
                                        <th class="text-center" colspan="2" style="width: 6% !important">No</th>
                                        <th class="text-center" style="width: 38% !important">File Name</th>
                                        <th class="text-center" style="width: 16% !important">Version</th>
                                        <th class="text-center" style="width: 16% !important">Status</th>
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
                                            <td style="width: 38% !important" class="text-center">@{{ P.template_name }}</td>
                                            <td style="width: 16% !important" class="text-primary text-center">R1</td>
                                            <td style="width: 16% !important" class="text-info text-center"> 
                                                <span ng-show="P.status == 'awaiting'" class="badge badge-outline-warning rounded-pill">Awaiting</span>
                                                <span ng-show="P.status == 'sent'" class="badge badge-outline-success rounded-pill">sent</span>
                                            </td>
                                            <td style="width: 16% !important"class="text-center">
                                                <small>@{{P.mail_send_date | date:"MM/dd/yyyy 'at' h:mma"}} </small>
                                            </td>
                                            <td style="width: 6% !important" class="text-center"> 
                                                <div class="dropdown">
                                                    <button type="button" class="toggle-btn btn-light btn-sm p-1 py-0 btn-light btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="dripicons-dots-3 "></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a ng-show="P.status == 'sent'" class="btn dropdown-item" ng-click="DuplicatePropose(P.proposal_id)">Duplicate</a>
                                                        <a ng-show="P.status == 'awaiting'" class="btn dropdown-item" ng-click="ViewEditPropose(P.proposal_id)">View / Edit</a>
                                                        <a class="btn dropdown-item" ng-click="sendMailToCustomer(P.proposal_id)">Send Mail</a>
                                                        <a ng-show="P.status == 'awaiting'" class="btn dropdown-item" ng-click="DeletePropose(P.proposal_id)">Remove</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> 
                                        <tr  id="togggleTable@{{ key+1 }}" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <td colspan="7" class="hiddenRow" style="padding: 0 !important">
                                                <table class="table custom table-bordered m-0">
                                                    <tbody> 
                                                        <tr ng-repeat="(key2,V) in P.get_versions">
                                                            <td  class="text-end" style="width: 6% !important">
                                                                <div class="text-end">@{{ key+1 }}.@{{ key2+1 }}</div>                                                    
                                                            </td>
                                                            <td style="width: 38% !important" class="text-center">@{{ V.template_name }}</td>
                                                            <td style="width: 16% !important" class="text-info text-center"><b><small>R@{{ key2+2 }}</small></b></td>
                                                            <td style="width: 16% !important" class="text-info text-center"> 
                                                                <span ng-show="V.status == 'awaiting'" class="badge badge-outline-warning rounded-pill">Awaiting</span>
                                                                <span ng-show="V.status == 'sent'" class="badge badge-outline-success rounded-pill">sent</span>
                                                            </td>
                                                            <td style="width: 16% !important" class="text-center">
                                                                <small>@{{V.mail_send_date | date:"MM/dd/yyyy 'at' h:mma"}}</small>
                                                            </td>
                                                            <td style="width: 6% !important" class="text-center"> 
                                                                <div class="dropdown">
                                                                    <button type="button" class="toggle-btn btn-light btn-sm p-1 py-0 btn-light btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="dripicons-dots-3 "></i>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        {{-- <a ng-show="V.status == 'sent'" class="dropdown-item" ng-click="DuplicatePropose(V.proposal_id)">Duplicate</a> --}}
                                                                        <a ng-show="V.status == 'awaiting'" class="dropdown-item" ng-click="ViewEditProposeVersions(V.proposal_id , V.id)">View / Edit</a>
                                                                        <a class="btn dropdown-item" ng-click="sendMailToCustomerVersion(V.proposal_id , V.id)">Send Mail</a>
                                                                        <a ng-show="V.status == 'awaiting'" class="btn dropdown-item" ng-click="DeleteProposeVersion(V.proposal_id , V.id)">Remove</a>
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
            </div> 
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <div>
                    <a href="#!/cost-estimation" class="btn btn-light border shadow-sm">Prev</a>
                </div>
                <div>
                    <a ng-show="proposal_sharing_status == 1" href="#!/move-to-project" style="pointer-events: @{{ proposal_sharing_status ==  null ? 'none' :'unset' }}" class="btn btn-primary">Next</a>
                    <a ng-show="proposal_sharing_status == 0" ng-click="moveToProject()" style="pointer-events: @{{ proposal_sharing_status ==  null ? 'none' :'unset' }}" class="btn btn-primary">Submit</a>
                </div>
            </div>
        </div> 
    
    <div class="modal fade" id="bs-Preview-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-right h-100" style="width:100% !important">
            <div class="modal-content  h-100">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Sales Offer Letter</h4>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body pt-0"  style="overflow: auto">
                    <div class="card pt-3">
                        <div id="mail_content_first_text_editor">
                            <div text-angular="text-angular" name="mail_content_first" ng-model="mail_content_first" ta-disabled='disabled'></div>      
                        </div>                       
                    </div>
                   
                </div>
                <div class="modal-footer"> 
                    <button class="btn btn-primary" ng-click="updateProposalMail(proposalId)"><i class="fa fa-save me-2"></i>Update</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="bs-PreviewVersions-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-right h-100" style="width:100% !important">
            <div class="modal-content  h-100">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Sales Offer Letter</h4>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body pt-0"  style="overflow: auto">
                    <div class="card pt-3">
                        <div id="mail_content_text_editor">
                            <div text-angular="text-angular" name="mail_content" ng-model="mail_content" ta-disabled='disabled'></div>                         
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" ng-click="updateProposalVersionMail()"><i class="fa fa-save me-2"></i>Update</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
@endif
@if (Route::is('enquiry.proposal-sharing')) 
    <style>
       .admin-Proposal_Sharing-wiz .timeline-step .inner-circle{
            background: var(--secondary-bg) !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        }
        .table tbody tr td {
            padding: 6px !important
        }
    </style>
@endif 