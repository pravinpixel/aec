<div id="reviewSubmit">
    <section id="enquiryOverView"> </section>
    <div class="card-footer p-3">
        <div class="row m-0">
            <div class="col-6 p-0"><a href="#!/additional-info" class="btn btn-light border shadow-sm">Prev</a></div>
            <div class="col-6 p-0 text-end" ng-show="project_info.status == 'In-Complete'">
                <div class="btn-group">
                    <button class="next me-2 btn btn-light rounded border"  ng-click="saveOrSubmit('In-Complete')"> Save & Submit Later </button>
                    <button class="next btn-primary btn rounded"   ng-click="saveOrSubmit('Submitted')">Submit </button>
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
    svg[viewBox="0 0 10 8"]{
        display:none ;
    }
    svg[viewBox="0 0 16 16"]{
        display:none ;
    }
    .card-body.false.collapse.show{
        /* background: #000; */
    }
    .openSpan{
        position: absolute;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background: #000;
        z-index:1;
    }
</style> 