app.controller('projectController', function ($scope, $http, API_URL, $compile) {

    $scope.projectTypes = [];
    $http.get(`${API_URL}get-project-type`).then((res) => {  $scope.projectTypes = res.data; });

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
                d.from_date      = $scope.from_date;
                d.to_date        = $scope.to_date;
                d.project_type   = $scope.project_type;
            }
        },
        columns       : [
            {data: 'reference_number', name: 'reference_number'},
            {data: 'project_name', name: 'project_name'},
            {data: 'contact_person', name: 'contact_person'},
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

    var live = $('#live-project-table').DataTable({
        aaSorting     : [[0, 'desc']],
        responsive: true,
        processing: true,    
        pageLength: 50,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        serverSide: true,
        ajax          : {
            url     :  API_URL +'admin/project-live-list',
            dataType: 'json',
            data: function (d) {
              d.from_date      = $scope.from_date;
              d.to_date        = $scope.to_date;
              d.project_type   = $scope.project_type;
            }
        },
        columns       : [
            {data: 'reference_number', name: 'reference_number'},
            {data: 'project_name', name: 'project_name'},
            {data: 'contact_person', name: 'contact_person'},
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

    $scope.projectFilter = () => {
        $scope.from_date = $("#from_date").val();
        $scope.to_date = $("#to_date").val();
        unestablish.draw();
        live.draw();
        $scope.from_date = '';
        $scope.to_date = '';
        $scope.project_type = '';
        $("#project-filter-modal").modal('hide');
    }
}); 