app.controller('customerDetailController', function ($scope, $http, API_URL, $compile) {
    $('#customer-table').DataTable({
        aaSorting : [[0, 'desc']],
        responsive: true,
        processing: true,    
        pageLength: 50,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        serverSide: true,
        ajax          : {
            url     :  API_URL +'admin/customer/datatable',
            dataType: 'json'
        },
        columns       : [
            {data: 'id', name: 'id', visible: false},
            {data: 'first_name', name: 'first_name'},
            {data: 'mobile_no', name: 'mobile_no'},
            {data: 'email', name: 'email'},
            {data: 'company_name', name: 'company_name'},
            {data: 'is_active', name: 'is_active'},
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
        }
    });
});
