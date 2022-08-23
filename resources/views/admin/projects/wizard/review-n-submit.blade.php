<div class="card-body"> 
    <x-accordion title="Project Infomation" path="admin.projects.wizard.overview.project-information" open="true"></x-accordion>
    <x-accordion title="Connect Platform" path="admin.projects.wizard.overview.connect-platform" open="false"></x-accordion> 
    <x-accordion title="Team Setup" path="admin.projects.wizard.overview.team-setup" open="false"></x-accordion> 
    <x-accordion title="Invoice Plan" path="admin.projects.wizard.overview.invoice-plan" open="false"></x-accordion> 
    <x-accordion title="To Do List" path="admin.projects.wizard.overview.to-do-list" open="false"></x-accordion>
</div>

<div class="card-footer text-end">
    <a href="#!/to-do-listing" class="btn btn-light float-start">Prev</a>
    <a class="next me-2 btn btn-light rounded border" ng-click="saveProject($event)"> Save & Submit Later </a>
    <a class="next btn-primary btn rounded" ng-click="submitProject($event)"> Establish New Project </a>
</div>

<style> 
    .Review .timeline-step .inner-circle{
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style> 