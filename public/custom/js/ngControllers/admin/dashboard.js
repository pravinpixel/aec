app.controller('dashboardController', function ($scope, $http, API_URL, $compile) { 
    $scope.enquiry_summary = {};  
    var enquirySummary = $('#dashboard-enquiry-summary').DataTable({
        aaSorting     : [[0, 'desc']],
        responsive: true,
        processing: true,    
        pageLength: 50,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        serverSide: true,
        ajax          : {
            url     :  API_URL +'admin/get-enquiry-summary',
            dataType: 'json',
            data: function (d) {
              d.from_date               = $scope.enquiry_summary.from_date,
              d.type_of_delivery        = $scope.enquiry_summary.type_of_delivery,
              d.type_of_project         = $scope.enquiry_summary.type_of_project,
              d.customer                = $scope.enquiry_summary.customer,
              d.project_name            = $scope.enquiry_summary.project_name,
              d.search_by               = $scope.enquiry_summary.search_by
            }
        },
        columns       : [
            {data: 'id', name: 'id', visible: false},
            {data: 'enquiry_number', name: 'enquiry_number'},
            {data: 'enquiry_date', name: 'enquiry_date'},
            {data: 'deliveryType', name: 'deliveryType.delivery_type_name'},
            {data: 'projectType', name: 'projectType.project_type_name'},
            {data: 'contact_person', name: 'contact_person'},
            {data: 'email', name: 'email'},
            {data: 'no_of_building', name: 'no_of_building'},
            {data: 'buildingType', name: 'buildingType.building_type_name'},
            {data: 'project_name', name: 'project_name'},
            {data: 'mobile_no', name: 'mobile_no'},
            {
                data         : 'action', name: 'action', orderable: false, searchable: false,
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                    $("a", nTd).tooltip({container: 'body'});
                }
            }
        ],
        // rowCallback: function( row, data ) {
        //     if(data.is_new_enquiry == 1){
        //         $(row).addClass('active-table-row');
        //     }
        // },
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