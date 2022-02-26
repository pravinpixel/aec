<!-- Primary Header Modal -->
<div id="delete-confirmation-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="modal-title">Delete</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="">
                    <i class="fa fa-info" style="padding-right: 10px"></i>
                    <span id="message"></span>
                </div>
            </div>
            <div class="modal-footer">
                <br>
                <form action="" method="post" id="remove-form">
                    {!! csrf_field() !!}
                    <input name="_method" type="hidden" id="method" value="DELETE">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </form>
            </div>
          
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->