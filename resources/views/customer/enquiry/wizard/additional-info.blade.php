<form class="row" ng-submit="submitAdditionalinfoForm()" name="additionalinfoForm" novalidate id="additionalInformation">
    <div class="col-sm-8 mx-auto">
        <div>
            <h3 class="text-center">Specify additional details</h3>
            <div class="py-3">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" ng-model="additionalInfo" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Comments</label>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer border-0 p-0">
        <ul class="list-inline wizard mb-0 pt-3">
            <li class="previous list-inline-item disabled"><a href="#!/building-component" class="btn btn-outline-primary">Previous</a></li>
            <li class="next list-inline-item float-end"><input  class="btn btn-primary" type="submit" name="submit" value="Next"/></li>
    </div>
    <!-- end col -->
</form>
<!-- end row -->