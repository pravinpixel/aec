<div id="projectOverView"></div>
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