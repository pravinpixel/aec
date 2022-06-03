
    <table class="table custom table-striped table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th >Actions</th>
            </tr>
        </thead>
    
        <tbody>
            <tr ng-repeat="PrecastEstimate in PrecastList">
                <td> @{{ PrecastEstimate.created_at }} </td>
                <td> @{{ PrecastEstimate.name }} </td>
                <td>
                    <a class="edit edit_data btn btn-primary btn-sm" ng-click="EstimateEdit(PrecastEstimate,'precast')"><i class="fa fa-edit"></i></a> 
                    <a class=" btn btn-outline-danger btn-sm" ng-click="EstimateDelete(PrecastEstimate.id, 'precast')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
