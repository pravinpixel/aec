
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
         {{-- <tr>
                            <td>
                                <div class="d-flex">
                                    <div class="icon">
                                        <i data-bs-toggle="collapse" href="#collapseOne_2" aria-expanded="true" aria-controls="collapseOne_2" class="accordion-button custom-accordion-button collapsed bg-primary text-white toggle-btn ">
    
                                        </i>
                                    </div>
                                    <div>2</div>
                                    <button class="accordion-button custom-accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne_2"></button>
                                </div>
                            </td>
                            <td>05 May 2022</td>
                            <td>Dummy Name</td>
                            <td class="text-primary">R1</td>
                         
                           <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                            <td>
                                
                                <div class="dropdown">
                                    <button type="button" class="toggle-btn btn-light btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="dripicons-dots-3 "></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Duplicate</a>
                                        <a class="dropdown-item" href="#">View / Edit</a>
                                        <a class="dropdown-item" href="#">Send Mail</a>
                                        <a class="dropdown-item" href="#">Remove</a>
                                    </div>
                                </div> 
                            </td>
                            <tr id="collapseOne_2" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <td colspan="7" class="hiddenRow">
                                    <div class="p-3 card m-0">
                                        <table class="table table-bordered m-0">
                                            <tbody>
                                                <tr>
                                                    <th width="15px">s.no</th>
                                                    <th>Date</th>
                                                    <th>File Name</th>
                                                    <th>Status</th>
                                                </tr>
                                                <tr  >
                                                    <td>2.3</td>
                                                    <td>05-06-2021</td>
                                                    <td>XXx</td>
                                                    <td><span class="badge badge-outline-success rounded-pill">Send</span></td>
                                                </tr>
                                                <tr>
                                                    <td>2.2</td>
                                                    <td>04-06-2021</td>
                                                    <td>YYY</td>
                                                    <td><span class="badge badge-outline-info rounded-pill">ReView commentsing</span></td>
                                                </tr>
                                                <tr>
                                                    <td>2.1</td>
                                                    <td>03-06-2021</td>
                                                    <td>ZZZ</td>
                                                    <td><span class="badge badge-outline-secondary rounded-pill">ReView commentsing</span></td>
                                                </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </td>
                            </tr> 
                        </tr>   --}}
                <table class="table table-bordered">
                    
                    <tbody class="panel"> 
                        <tr>
                            <td style="padding: 0 !important">
                                <table  class="table table-bordered m-0">
                                    <tr>
                                        <th style="width: 3% !important">No</th>
                                        <th style="width: 3% !important">No</th>
                                        <th style="width: 38% !important">File Name</th>
                                        <th style="width: 16% !important">Version</th>
                                        <th style="width: 16% !important">Status</th>
                                        <th style="width: 16% !important">Date</th>
                                        <th style="width: 6% !important">Action</th>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr ng-repeat="(key,P) in proposal">
                            <td style="padding: 0 !important">
                                <table class="table table-bordered m-0">
                                    <tbody class="panel"> 
                                        <tr>
                                            <td>
                                                <div class="icon"><i class="accordion-button custom-accordion-button bg-primary collapsed text-white toggle-btn" ng-click="ViewPropsalVersions(P.proposal_id)"></i></div> 
                                            </td>
                                            <td style="width: 3% !important">
                                                <div>@{{ key+1 }}</div>                                                    
                                            </td>
                                            <td style="width: 38% !important">@{{ P.template_name }}</td>
                                            <td style="width: 16% !important" class="text-primary">R1</td>
                                            <td style="width: 16% !important"> 
                                                <span ng-show="P.status == 'awaiting'" class="badge badge-outline-warning rounded-pill">Awaiting</span>
                                                <span ng-show="P.status == 'send'" class="badge badge-outline-success rounded-pill">Send</span>
                                            </td>
                                            <td style="width: 16% !important">@{{ P.documentary_date }}</td>
                                            <td style="width: 6% !important"> 
                                                <div class="dropdown">
                                                    <button type="button" class="toggle-btn btn-light btn-sm btn-light btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="dripicons-dots-3 "></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a ng-show="P.status == 'send'" class="dropdown-item" ng-click="DuplicatePropose(P.proposal_id)">Duplicate</a>
                                                        <a ng-show="P.status == 'awaiting'" class="dropdown-item" ng-click="ViewEditPropose(P.proposal_id)">View / Edit</a>
                                                        <a class="dropdown-item" >Send Mail</a>
                                                        <a ng-show="P.status == 'awaiting'" class="dropdown-item" ng-click="DeletePropose(P.proposal_id)">Remove</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr ng-repeat="(key2,V) in proposal_versions"> 
                                            <td style="width:  3% !important">
                                            </td>
                                            <td style="width: 38% !important">@{{ V.template_name }}</td>
                                            <td style="width: 16% !important" class="text-primary">R1</td>
                                            <td style="width: 16% !important"> 
                                                <span ng-show="P.status == 'awaiting'" class="badge badge-outline-warning rounded-pill">Awaiting</span>
                                                <span ng-show="P.status == 'send'" class="badge badge-outline-success rounded-pill">Send</span>
                                            </td>
                                            <td style="width: 16% !important">@{{ V.documentary_date }}</td>
                                            <td style="width: 6% !important"> 
                                                <div class="dropdown">
                                                    <button type="button" class="toggle-btn btn-light btn-sm btn-light btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="dripicons-dots-3 "></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a ng-show="P.status == 'send'" class="dropdown-item" ng-click="DuplicatePropose(V.proposal_id)">Duplicate</a>
                                                        <a ng-show="P.status == 'awaiting'" class="dropdown-item" ng-click="ViewEditPropose(V.proposal_id)">View / Edit</a>
                                                        <a class="dropdown-item" >Send Mail</a>
                                                        <a ng-show="P.status == 'awaiting'" class="dropdown-item" ng-click="DeletePropose(V.proposal_id)">Remove</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- <tr >
                                            <td style="width:  6% !important">
                                                <div class="d-flex">
                                                    <div class="icon"><i class="accordion-button custom-accordion-button bg-primary collapsed text-white toggle-btn" ng-click="ViewPropsalVersions(P.proposal_id)"></i></div> 
                                                    <div>@{{ key2+1 }}</div>                                                    
                                                </div>
                                            </td>
                                            
                                        </tr>   --}}
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
                    <a href="#/cost-estimation" class="btn btn-light border shadow-sm">Prev</a>
                </div>
                <div>
                    <a href="#/move-to-project" class="btn btn-primary">Next</a>
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
                        <div text-angular="text-angular" name="mail_content" ng-model="mail_content" ta-disabled='disabled'></div>                         
                    </div>
                    <input type="text" class="d-none" ng-model="mail_content">
                </div>
                <div class="modal-footer"> 
                    <button class="btn btn-primary" ng-click="updateProposalMail(proposalId)"><i class="fa fa-save me-2"></i>Resend Mail</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
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