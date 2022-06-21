$(function(){
    const API_URL = $("#baseurl").val();
    var activeEnquiry = $('#verification-enquiries').DataTable({
        aaSorting     : [[0, 'desc']],
        responsive: true,
        processing: true,    
        pageLength: 50,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        serverSide: true,
        ajax          : {
            url     :  API_URL +'cost-estimate/get-assigned-enquiries',
            dataType: 'json',
            data: function (d) {
            
            }
        },
        columns       : [
            {data: 'id', name: 'id', visible: false},
            {data: 'enquiry_number', name: 'enquiry_number'},
            {data: 'enquiry_date', name: 'enquiry_date'},
            {data: 'project_name', name: 'project_name'},
            {data: 'status', name: 'status'},
            {
                data         : 'action', name: 'action', orderable: false, searchable: false,
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                    $("a", nTd).tooltip({container: 'body'});
                }
            }
        ]
    });
})