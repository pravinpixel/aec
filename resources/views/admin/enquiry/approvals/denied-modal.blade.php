<div id="proposal-denied" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
               
                <form action="{{ route('customer-approval',['id'=>$enquiry_id, 'type' => 0]) }}" class="ps-3 pe-3">
                    <input type="hidden" name="pid" value="{{ $additionalInfo['proposal_id'] }}">
                    <input type="hidden" name="vid" value="{{ $additionalInfo['version_id'] }}">
                    <div class="mb-3">
                        <label for="emailaddress1" class="form-label">Comments</label>
                        <textarea required name="proposal_comments" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="button" class="btn rounded-pill  btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn rounded-pill btn-primary" type="submit">Submit</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->