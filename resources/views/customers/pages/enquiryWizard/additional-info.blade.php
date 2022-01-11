<form class="row" novalidate id="additionalInformation">
    <div class="col-sm-8 mx-auto">
        <div >
            <h3 class="text-center">Specify additional details</h3>

            <div class="py-3">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" ng-model="additionalInfo" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Comments</label>
                </div>
             
            </div>
            <button class="btn btn-info" ng-click="addComment()">Add</button>
            <table class="table table-bordered">
                <tr>
                    <th>S.no</th>
                    <th>Date</th>
                    <th>commented persion</th>
                    <th>comments</th>
                </tr>
                <tr ng-repeat="comment in comments">
                    <td> @{{ index + 1  }}</td>
                    <td>@{{ comment.created_at }}</td>
                    <td>@{{ comment.user.first_name }}</td>
                    <td>@{{ comment.comment }}</td>
                </tr> 
            </table>
             
        </div>
    </div>
    <!-- end col -->
</form>
<!-- end row -->