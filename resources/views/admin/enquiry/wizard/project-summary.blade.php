<div> 
    <ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header mt-0 pt-0 bg-light timeline-steps">
        <li class="time-bar"></li>
        @if(userHasAccess('project_summary_index'))
        <li class="nav-item Project_Info">
            <a href="#!/project-summary" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle @{{ project_summary_status == 'Submitted' ? 'bg-primary' :'bg-secondary' }}">
                        <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5 mt-2">Project summary</p>
            </a>
        </li>
        @endif
        @if(userHasAccess('technical_estimate_index'))
        <li class="nav-item  admin-Technical_Estimate-wiz" style="pointer-events: @{{ project_summary_status == 'Submitted' ? 'unset' :'none'  }}">
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
        <li  ng-show="proposal_sharing_status == 1" class="nav-item admin-Delivery-wiz" style="pointer-events: @{{ customer_response ==  null ? 'none' :'unset' }}">
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
    @if(userHasAccess('project_summary_index'))
      <div class="p-3">
        <x-accordion title="Project Information" path="admin.enquiry.enquiry-overview.project-information" open="true"></x-accordion>
        <x-accordion title="Selected Services" path="admin.enquiry.enquiry-overview.selected-service" open="false"></x-accordion>
        <x-accordion title="IFC Models and Uploaded Documents" path="admin.enquiry.enquiry-overview.ifc-upload" open="false"></x-accordion>
        <x-accordion title="Building Components" path="admin.enquiry.enquiry-overview.building-components" open="false"></x-accordion>
        <x-accordion title="Additional Information" path="admin.enquiry.enquiry-overview.additional-information" open="false"></x-accordion>
      </div>
    @endif
    @include("admin.enquiry.models.chat-box")
    @include('customer.enquiry.models.document-modal')
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <div>
                
            </div>
            <div>
                <a href="#!/technical-estimation" class="btn btn-primary" ng-show="project_summary_status == 'Submitted'">Next</a>
            </div>
        </div>
    </div>
</div>
<style>
    .Project_Info .timeline-step .inner-circle{
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style> 