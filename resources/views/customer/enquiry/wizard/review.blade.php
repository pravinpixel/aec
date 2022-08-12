<div class="" id="reviewSubmit">
    <section>
        <x-accordion title="Project Information" path="customer.enquiry.wizard.overview.project-information" open="true"></x-accordion>
        <x-accordion title="Selected Services" path="customer.enquiry.wizard.overview.selected-service" open="false"></x-accordion>
        <x-accordion title="IFC Models and Uploaded Documents" path="customer.enquiry.wizard.overview.ifc-upload" open="false"></x-accordion>
        <x-accordion title="Building Components" path="customer.enquiry.wizard.overview.building-components" open="false"></x-accordion>
        <x-accordion title="Additional Information" path="customer.enquiry.wizard.overview.additional-information" open="false"></x-accordion>
    </section>  
    
    <div class="card-footer border-0 p-0 ">
        <ul class="list-inline wizard mb-0 pt-3">
            <li class="previous list-inline-item disabled"></li> 
        </ul>
        <div class="row m-0">
            <div class="col-6"><a href="#!/additional-info" class="btn btn-light border shadow-sm">Prev</a></div>
            <div class="col-6 text-end" ng-show="project_info.status == 'In-Complete'">
                <div class="btn-group">
                    <button class="next me-2 btn btn-light rounded border"  ng-click="saveOrSubmit('In-Complete')"> Save & Submit Later </button>
                    <button class="next btn-primary btn rounded"  ng-click="saveOrSubmit('Submitted')">Submit </button>
                </div>
            </div>
            <div class="col-6 text-end" ng-show="project_info.status == 'Submitted' ">
                <div class="btn-group">
                    <button class="next btn-primary btn rounded"  ng-click="saveOrSubmit('Submitted')">Submit </button>
                </div>
            </div>
        </div>
    </div>
    @include('customer.enquiry.models.document-modal')
</div>
<style> 
    .reviewSubmit .timeline-step .inner-circle{
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style> 