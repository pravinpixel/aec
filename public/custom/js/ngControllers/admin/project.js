app.controller('projectController', function ($scope, $http, API_URL, $compile) {

    var unestablish = $('#unestablished-table').DataTable({
        aaSorting     : [[0, 'desc']],
        responsive: true,
        processing: true,    
        pageLength: 50,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        serverSide: true,
        ajax          : {
            url     :  API_URL +'admin/project-unestablished-list',
            dataType: 'json',
            data: function (d) {
              d.from_date      = $scope.enquiry_from_date,
              d.to_date        = $scope.enquiry_to_date
            }
        },
        columns       : [
            {data: 'reference_number', name: 'reference_number'},
            {data: 'project_name', name: 'project_name'},
            {data: 'contact_person', name: 'contact_person'},
            {data: 'mobile_number', name: 'mobile_number'},
            {data: 'start_date', name: 'start_date'},
            {data: 'delivery_date', name: 'delivery_date'},
            {data: 'pipeline', name: 'pipeline'},
            {
                data         : 'action', name: 'action', orderable: false, searchable: false,
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                    $("a", nTd).tooltip({container: 'body'});
                }
            }
        ],
        rowCallback: function( row, data ) {
           if(data.is_new_enquiry == 1){
                $(row).addClass('font-weight-bold bg-light');
           }
        },
        createdRow: function ( row, data, index ) {
            $compile(row)($scope);  //add this to compile the DOM
        }
    });
}); 
app.controller('CreateProjectController', function ($scope, $http, API_URL){
    let project_id =  $("#project_id").val();
     //get building types
    $http.get(`${API_URL}get-building-type`)
    .then((res)=> {
        $scope.buildingTypes = res.data;
    });
    //get delivery types
    $http.get(`${API_URL}get-project-type`)
    .then((res)=> {
        $scope.projectTypes = res.data;
    });
    //get project types
    $http.get(`${API_URL}get-delivery-type`)
    .then((res)=> {
        $scope.deliveryTypes = res.data;
    });

    $http.get(`${API_URL}project/${project_id}`)
    .then((res)=> {
        $scope.project = res.data;
    });
   


    

    
});

