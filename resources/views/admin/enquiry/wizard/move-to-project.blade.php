<ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header mt-0 pt-0 bg-light timeline-steps">
    <li class="time-bar"></li>
        @if(userHasAccess('project_summary_index') )
        <li class="nav-item Project_Info">
            <a href="#/project-summary" style="min-height: 40px;" class="timeline-step">
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
            <a href="#/technical-estimation" style="min-height: 40px;" class="timeline-step">
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
            <a href="#/cost-estimation" style="min-height: 40px;" class="timeline-step">
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
        <li class="nav-item admin-Proposal_Sharing-wiz" style="pointer-events: @{{ cost_estimation_status ==  0 ? 'none' :'unset' }}">
            <a href="#/proposal-sharing" style="min-height: 40px;"  class="timeline-step">
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
        <li class="nav-item admin-Delivery-wiz" style="pointer-events: @{{ customer_response ==  null ? 'none' :'unset' }}">
            <a href="#/move-to-project" style="min-height: 40px;"  class="timeline-step" >
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
    <div class="card shadow mx-auto shadow col-md-8 my-4"  ng-show="enquiry_status == 0">
    <div class="row border-bottom m-0">
        <div class="p-0 col-md-4 bg-warning d-flex justify-content-center align-items-center">
            <i class="fa fa-warning fa-3x text-white"></i>
        </div>
        <div class="col-md-8">
            <div class="card-body p-2">
                <small class="card-text text-secondary">Response status</small>
                <h3 class="card-title m-0">Waiting for response</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row m-0">
            <div class="col">
                <strong class="card-text text-secondary"><i class="text-secondary mdi-chevron-right-circle mdi " aria-hidden="true"></i> Status</strong>
                <select name="" class="form-select mt-2" id="">
                    <option>-- choose -- </option>
                    <option value="Approved">Approved</option>
                </select>
            </div>
            <div class="col">
                <strong class="card-text text-secondary"><i class="text-secondary mdi-chevron-right-circle mdi " aria-hidden="true"></i> Next Follow Up date</strong>
                <input type="date" class="form-control mt-2" data-date-inline-picker="true">
            </div>
        </div>
        <div class="d-flex justify-content-center pt-3">
            <button class="btn btn-light me-2 p-3 py-2">Cancel</button>
            <button class="btn btn-primary p-3 py-2"> <i class="fa fa-check-circle me-1 text-white"></i> Submit </button>
        </div>
    </div>
</div>
@if(userHasAccess('customer_response_index'))
<div class="card shadow mx-auto shadow col-md-8 my-4" ng-show="enquiry_status == 1">
    <div class="row border-bottom m-0" >
        <div class="p-0 col-md-4 bg-success d-flex justify-content-center align-items-center">
            <i class="fa fa-check-circle fa-3x text-white"></i>
        </div>
        <div class="col-md-8">
            <div class="card-body p-2">
                <small class="card-text text-secondary">Response status</small>
                <h3 class="card-title m-0">Approved</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class=" mb-3">
            <strong class="card-text text-secondary"><i class="text-primary mdi-file-replace mdi" aria-hidden="true"></i> Assign to</strong>
            <select name="" id="" class="form-select shadow mt-2" style="padding: 10px 20px  !important; border: 1px solid lightgray !important" >
                <option class="text-center bg-white text-white ">-- Choose the delivery manager to assign to this project --</option>
                <option value="">Mr. Alexander</option>
                <option value="">Mr. Torbjørn</option>
                <option value="">Mr. Marius</option>
                <option value="">Mr. Asbjørn</option>
            </select>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-light me-2 p-3 py-2">Cancel</button>
            <button class="btn btn-primary p-3 py-2 me-2 "> <i class="fa fa-check-circle me-1 text-white"></i> Assign </button>
            <button class="btn btn-success p-3 py-2"> <i class="fa fa-check-circle me-1 text-white"></i> Move to Project </button>
        </div>
    </div>
</div> 

<div class="card shadow mx-auto col-md-4 my-4" ng-show="enquiry_status == 2">
    <div class="row border-bottom m-0">
        <div class="p-0 col-md-12 py-2 bg-danger d-flex justify-content-center align-items-center">
            <i class="fa fa-times-circle fa-3x text-white"></i>
        </div>
        <div class="col-md-12">
            <div class="card-body text-center p-2">
                <small class="card-text text-secondary">Response status</small>
                <h3 class="card-title m-0">Denied</h3>
            </div>
        </div>
    </div> 
</div> 
<div class="card-body" ng-show="deniedComments.length">
    <div class="container p-0"> 
        <table class="table table-bordered">
            <tbody class="panel"> 
                <tr>
                    <td style="padding: 0 !important">
                        <table  class="table table-bordereds m-0">
                            <tr>
                                <th class="text-center" colspan="2" style="width: 6% !important">No</th>
                                <th class="text-center" >File Name</th>
                                <th class="text-center">Version</th>
                                <th class="text-center">Comment</th>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr ng-repeat="(key,deniedComment) in deniedComments">
                    <td style="padding: 0 !important" >
                        <table class="table table-bordered m-0">
                            <tbody class="panel"> 
                                <tr>
                                    <td colspan="2" style="width: 6% !important" class="text-center">
                                        <div class="d-flex text-center">
                                            <div class="me-2" ng-show="P.get_versions.length">
                                                <i data-bs-toggle="collapse" href="#togggleTable@{{ key+1 }}" aria-expanded="true" aria-controls="togggleTable@{{ key+1 }}" class="accordion-button custom-accordion-button collapsed bg-primary text-white toggle-btn m-0"></i>
                                            </div>
                                            <div class="me-2" ng-show="!P.get_versions.length" style="visibility: hidden">
                                                <i class="accordion-button custom-accordion-button collapsed bg-white text-white toggle-btn m-0"></i>
                                            </div>
                                            <div class="text-center">@{{ key+1 }}</div>
                                        </div>
                                    </td>
                                    <td style="width: 38% !important" class="text-center">@{{ deniedComment.template_name }}</td>
                                    <td class="text-center">R1 </td>
                                    <td class="text-center">@{{ deniedComment.comment }}</td>
                                </tr> 
                                <tr >
                                    <td colspan="5"  style="padding: 0 !important">
                                        <table class="table table-bordered m-0">
                                            <tbody>  
                                                <tr ng-repeat="(key2,V) in deniedComment.child">
                                                    <td   class="text-end" style="width: 6% !important">
                                                        <div class="text-end">@{{ key+1 }}.@{{ key2+1 }}</div>                                                    
                                                    </td>
                                                    <td style="width: 38% !important" class="text-start"></td>
                                                    <td class="text-center">@{{ V.template_name }}</td>
                                                    <td class="text-center">@{{ deniedComment.comment }}</td>
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
 
<div class="card-body" ng-show="approvedComments.length">
    <div class="container p-0"> 
        <table class="table table-bordered">
            <tbody class="panel"> 
                <tr>
                    <th class="text-center"style="width: 6% !important">No</th>
                    <th class="text-center" >File Name</th>
                    <th class="text-center">Version</th>
                </tr>
                <tr ng-repeat="(key,row) in approvedComments">
                    <td class="text-center">@{{ key+1 }}</td>
                    <td class="text-center">@{{ row.template_name }}</td>
                    <td class="text-center">
                        <span ng-show="row.child != []">R1</span>
                        <span ng-show="row.child == []">@{{ row.template_name}}</span>
                    </td>
                </tr>  
            </tbody>
        </table>
    </div> 
</div>
@endif
@if (Route::is('enquiry.move-to-project')) 
    <style>
        .admin-Delivery-wiz .timeline-step .inner-circle{
            background: var(--secondary-bg) !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        } 
    </style>
@endif