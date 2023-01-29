app.controller('projectController', function ($scope, $http, API_URL, $compile) { 
    $scope.enquiry_summary = {};  
    var enquirySummary = $('#dashboard-project-summary').DataTable({
        aaSorting     : [[0, 'desc']],
        responsive: true,
        processing: true,    
        pageLength: 50,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        serverSide: true,
        ajax          : {
            url     :  API_URL +'admin/get-project-summary',
            dataType: 'json',
           
        },
        columns       : [
            {data: 'id', name: 'id', visible: false},
            {data: 'reference_number', name: 'reference_number'},
            {data: 'customer', name: 'customer.full_name'},
            {data: 'project_name', name: 'project_name'},
            {data: 'site_address', name: 'site_address'},
            {data: 'deliveryType', name: 'deliveryType.delivery_type_name'},
            {data: 'original_price', name: 'original_price'},
            {data: 'vr_one', name: 'vr_one'},
            {data: 'vr_two', name: 'vr_two'},
            {data: 'invoicePlan', name: 'invoicePlan.project_cost'},
            {data: 'engineering_hours', name: 'engineering_hours'},
            {data: 'start_date', name: 'start_date'},
            {data: 'delivery_date', name: 'delivery_date'},
            {data: 'progress_percentage', name: 'progress_percentage'}
        ],
    
        createdRow: function ( row, data, index ) {
            $compile(row)($scope);  //add this to compile the DOM
        }
    });

    $scope.applyFilter = () => {
        enquirySummary.draw();
    }

    $scope.resetFilter = () => {
        $scope.enquiry_summary = {}
        enquirySummary.draw();
    }
});