<div id="approve-mail-preview" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-right" style="width:100% !important">
        <div class="p-3 shadow-sm">
            <h3>Proposal Preview</b></h3>
            <button type="button" class="btn-close me-3" data-bs-dismiss="modal" style="top: 33px" aria-hidden="true"></button>
        </div>
        <div class="modal-content h-100 p-4" style="overflow: auto">
            <div ng-bind-html="approvals.documentary_content"></div>
            <div class="card-footer justify-content-end">
                <a href="" class="btn btn-danger" ng-click="updatePropodsals('denie')">Denie</a>
                <a href="" class="btn btn-success" ng-click="updatePropodsals('approve')">Approve</a>
            </div>
        </div><!-- /.modal-content -->
         
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->