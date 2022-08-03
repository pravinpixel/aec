
<div class="modal fade" id="add-template-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form name="addTemplateForm"  name="addTemplateForm" id="addTemplateForm">    
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalLabel">Add Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Template Name:</label>
                <input type="text" required ng-model="TemplateForm.name" class="form-control" id="template-name">
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <input type="submit"  ng-click="submitTemplate()" value="save" class="btn btn-primary"/> --}}
                <input type="submit"  ng-click="submitTemplate()"  class="btn btn-primary" value="Save"/>
            </div>
            </div>
        </div>
    </form>
</div>
  