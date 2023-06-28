<ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header m-0 pt-0 bg-light timeline-steps">
    <li class="time-bar"></li>
    @if (userHasAccess('project_summary_index'))
        <li class="nav-item Project_Info">
            <a href="#!/project-summary" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle @{{ project_summary_status == 'Submitted' ? 'bg-primary' : 'bg-secondary' }}">
                        <img src="{{ asset('public/assets/icons/information.png') }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5 mt-2">Project summary</p>
            </a>
        </li>
    @endif
    @if (userHasAccess('technical_estimate_index'))
        <li class="nav-item  admin-Technical_Estimate-wiz">
            <a href="#!/technical-estimation" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle @{{ technical_estimation_status == '1' ? 'bg-primary' : 'bg-secondary' }}">
                        <img src="{{ asset('public/assets/icons/technical-support.png') }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5 mt-2">Technical Estimate</p>
            </a>
        </li>
    @endif
    @if (userHasAccess('cost_estimate_index'))
        <li class="nav-item admin-Cost_Estimate-wiz" style="pointer-events: @{{ technical_estimation_status == 0 ? 'none' : 'unset' }}">
            <a href="#!/cost-estimation" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle  @{{ cost_estimation_status == '1' ? 'bg-primary' : 'bg-secondary' }}">
                        <img src="{{ asset('public/assets/icons/budget.png') }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5 mt-2">Cost Estimate</p>
            </a>
        </li>
    @endif
    @if (userHasAccess('proposal_sharing_index'))
        <li class="nav-item admin-Proposal_Sharing-wiz" ng-class="{last:proposal_email_status == 0}"
            style="pointer-events: @{{ cost_estimation_status == 0 ? 'none' : 'unset' }}">
            <a href="#!/proposal-sharing" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle @{{ proposal_sharing_status == '1' ? 'bg-primary' : 'bg-secondary' }}">
                        <img src="{{ asset('public/assets/icons/share.png') }}" ng-click="getDocumentaryFun();"
                            class="w-50 invert">
                    </div>
                </div>
                <p class="h5 mt-2">Proposal Sharing</p>
            </a>
        </li>
    @endif
    @if (userHasAccess('customer_response_index'))
        <li ng-show="proposal_email_status == 1" class="nav-item admin-Delivery-wiz"
            style="pointer-events: @{{ customer_response == null ? 'none' : 'unset' }}">
            <a href="#!/move-to-project" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle @{{ customer_response == '1' ? 'bg-primary' : 'bg-secondary' }}">
                        <img src="{{ asset('public/assets/icons/arrow-right.png') }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5  mts-2">Customer Response</p>
            </a>
        </li>
    @endif
</ul>
@if (userHasAccess('proposal_sharing_index'))
    <div class="card shadow-none p-0" class="accordion accordion-flush" id="accordionFlushExample">
        <div class="p-2 mx-auto col-md-6" ng-hide="proposal.length">
            <div>
                <h4 class="p-2 m-0 h4 text-center"> Select Proposal type </h4>
            </div>
            <div class="d-flex">
                <select class="form-select me-2" ng-disabled="proposal.length" ng-model="documentary.documentary_title"
                    name="documentary_title" ng-required="true">
                    <option value="" selected>Select</option>
                    <option value="@{{ emp.id }}" ng-repeat="(index,emp) in documentary_module_name">
                        @{{ emp.documentary_title }}</option>
                </select>
                <button ng-click="documentaryOneData()" ng-disabled="proposal.length"
                    class="btn btn-success float-right btn-sm"><small> Create</small></button>
            </div>
        </div>
        <div class="card-body">
            <div class="container p-0">
                <h4 class="text-center h5 mb-3">Proposal Versioning</h4>
                <div id="proposal-table">
                    @include('admin.enquiry.wizard.proposal-table')
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <div>
                    <a href="#!/cost-estimation" class="btn btn-light border shadow-sm">Prev</a>
                </div>
                <div>
                    <a ng-show="customer_response == 1" href="#!/move-to-project"
                        style="pointer-events: @{{ proposal_email_status == null ? 'none' : 'unset' }}" class="btn btn-primary">Next</a>
                    <a ng-show="customer_response != 1" ng-click="sendProposal()"
                        style="pointer-events: @{{ proposal_email_status == null ? 'none' : 'unset' }}" class="btn btn-primary">Send Proposal</a>
                </div>
            </div>
        </div>
        @include('admin.enquiry.models.proposal-comment-box')
        <div class="modal fade" id="bs-Preview-modal-lg" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-right h-100" style="width:100% !important">
                <div class="modal-content  h-100">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Sales Offer Letter</h4>

                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-hidden="true"></button>
                    </div>
                    <div class="modal-body pt-0" style="overflow: auto">
                        <div class="card pt-3">
                            <div id="mail_content_first_text_editor" ng-if="proposalModal">
                                <div text-angular="text-angular" name="mail_content_first"
                                    ng-model="mail_content_first" ta-disabled='disabled'></div>
                            </div>
                            <div ng-bind-html="mail_content_first" ng-if="proposalModal === false"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button ng-show="proposalModal" class="btn btn-primary"
                            ng-click="updateProposalMail(proposalId, 'bs-Preview-modal-lg')"><i
                                class="fa fa-save me-2"></i>Update</button>
                        <button ng-show="!proposalModal" class="btn btn-primary" data-bs-dismiss="modal"><i
                                class="fa fa-close me-2"></i>Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="modal fade" id="bs-PreviewVersions-modal-lg" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-right h-100" style="width:100% !important">
                <div class="modal-content  h-100">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Sales Offer Letter</h4>

                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-hidden="true"></button>
                    </div>
                    <div class="modal-body pt-0" style="overflow: auto">
                        <div class="card pt-3">
                            <div id="mail_content_text_editor">
                                <div text-angular="text-angular" name="mail_content" ng-model="mail_content"
                                    ta-disabled='disabled'></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button ng-show="proposalModal" class="btn btn-primary"
                            ng-click="updateProposalVersionMail('bs-PreviewVersions-modal-lg')"><i
                                class="fa fa-save me-2"></i>Update</button>
                        <button ng-show="!proposalModal" class="btn btn-primary" data-bs-dismiss="modal"><i
                                class="fa fa-close me-2"></i>Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="modal fade" id="ViewProposalModal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-right h-100" style="width:100% !important">
                <div class="modal-content  h-100">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Sales Offer Letter Preview</h4>

                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-hidden="true"></button>
                    </div>
                    <div class="modal-body pt-0" style="overflow: auto">
                        <div>
                            <div ng-bind-html="mail_content_first"></div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
@endif
@if (Route::is('enquiry.proposal-sharing'))
    <style>
        .proposal-comment {
            max-height: 300px;
            overflow: auto;
        }

        .admin-Proposal_Sharing-wiz .timeline-step .inner-circle {
            background: var(--secondary-bg) !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        }

        .table tbody tr td {
            padding: 6px !important
        }
    </style>
@endif
