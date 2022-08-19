<table class="table custom m-0 custom table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Type</th>
            <th class="text-center">Su Type</th>
            <th class="text-center">Title </th>
        </tr>
    </thead>
    <tbody>
        <tr ng-repeat="row in review['invoice_plan'].invoice_data">
            <td class="text-center"> @{{ $index + 1 }} </td>
            <td class="text-center">@{{ row.invoice_date | date: 'dd-MM-yyyy' }}</td>
            <td class="text-center">@{{ row.amount }}</td>
            <td class="text-center">@{{ row.percentage }}</td>
        </tr> 
        <tr ng-show="review['invoice_plan'].invoice_data.length == 0">
            <td class="text-center" colspan="4"> No data found </td>
        </tr> 
    </tbody>
</table>
<input type="hidden" id = "login_id" value = "{{Customer()->id}}">
<form id="bim360__commentsForm" ng-submit="sendComments('bim360','Customer', {{Customer()->id}})" class="input-group mt-3">
    <input required type="text" ng-model="bim360__comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type here..!">
    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
</form>  
<div class="text-end pt-2">
    <a class="text-primary p-0 btn" ng-show="project_comments.bim360" ng-click="showCommentsToggle('viewConversations', 'bim360', 'bim360')">
        <i class="mdi mdi-eye"></i>  Previous chat history
    </a>
</div>