app.controller('customerDetailController', function ($scope, $http, API_URL, $compile) {
    $('#inactive-customer-table').DataTable({
        aaSorting : [[0, 'desc']],
        responsive: true,
        processing: true,    
        pageLength: 50,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        serverSide: true,
        ajax          : {
            url     :  API_URL +'admin/customer/inactive-datatable',
            dataType: 'json'
        },
        columns       : [
            {data: 'id', name: 'id', visible: false},
            {data: 'first_name', name: 'first_name'},
            {data: 'mobile_no', name: 'mobile_no'},
            {data: 'email', name: 'email'},
            {data: 'organization_no', name: 'organization_no'},
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

    $('#active-customer-table').DataTable({
        aaSorting : [[0, 'desc']],
        responsive: true,
        processing: true,    
        pageLength: 50,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        serverSide: true,
        ajax          : {
            url     :  API_URL +'admin/customer/active-datatable',
            dataType: 'json'
        },
        columns       : [
            {data: 'id', name: 'id', visible: false},
            {data: 'first_name', name: 'first_name'},
            {data: 'mobile_no', name: 'mobile_no'},
            {data: 'email', name: 'email'},
            {data: 'organization_no', name: 'organization_no'},
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

    $('#cancel-customer-table').DataTable({
        aaSorting : [[0, 'desc']],
        responsive: true,
        processing: true,    
        pageLength: 50,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        serverSide: true,
        ajax          : {
            url     :  API_URL +'admin/customer/cancel-datatable',
            dataType: 'json'
        },
        columns       : [
            {data: 'id', name: 'id', visible: false},
            {data: 'first_name', name: 'first_name'},
            {data: 'mobile_no', name: 'mobile_no'},
            {data: 'email', name: 'email'},
            {data: 'organization_no', name: 'organization_no'},
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

    $scope.getCompany = (text) => {
        $http.get(`https://hotell.difi.no/api/json/brreg/enhetsregisteret?query=${text}`)
        .then(function successCallback(res){
            $scope.companyList = res.data.entries.slice(0, 50)
                .map((item) => {
                    return {'company':item.navn, 'mobile': item.tlf_mobil, 'zip_code': item.forradrpostnr, 'organization_no': item.orgnr, 'site_address': item.forretningsadr} 
                });
                if($scope.companyList.length == 1) {
                    $scope.organization_no = ($scope.companyList[0].organization_no == '') ? '  ' : $scope.companyList[0].organization_no;
                    $("#organization_no").val($scope.organization_no);
                } else {
                    $("#organization_no").val('');
                }
        }, function errorCallback(error){
            console.log(error);
        });
    }

});

