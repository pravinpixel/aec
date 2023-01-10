
    <table class="table custom table-striped table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th >Actions</th>
            </tr>
        </thead>
    
        <tbody>
            <tr ng-repeat="WoodEstimate in WoodEstimateList">
                <td style="text-align: left !important"> @{{ WoodEstimate.created_at | date:'dd-MM-yyyy' }} </td>
                <td> @{{ WoodEstimate.name }} </td>
                <td>
                    <a class=" btn btn-outline-success btn-sm" ng-click="EstimateAssignToEnquiry(WoodEstimate.id, 'wood')"><i class="fa fa-plus"></i></a>
                    <a class="edit edit_data btn btn-primary btn-sm" ng-click="EstimateEdit(WoodEstimate,'wood')"><i class="fa fa-edit"></i></a> 
                    <a class=" btn btn-outline-danger btn-sm" ng-click="EstimateDelete(WoodEstimate.id, 'wood')"><i class="fa fa-trash"></i></a> 
                </td>
            </tr>
        </tbody>
    </table>
