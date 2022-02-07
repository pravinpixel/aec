<!-- Primary Header Modal -->
<div id="add-layer-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">Add Layer</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form name="LayerModelForm">
              <div class="modal-body">
                <div class="form-group">@{{ LayerModelForm }}
                  <label for="layer_name">Layer Name</label>
                  <input type="text" name="layer_name" ng-model= "layer_name" id="layer_name" class="form-control" placeholder="Enter layer name">
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                  <input type="submit"  ng-click="submitLayer()"  class="btn btn-primary" value="Save"/>
              </div>
          </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->