app.controller('SalesController', function ($scope, $http, API_URL, $window) { 
    $scope.day = new Date();
    $scope.enq_number = 'Draft';
    let today = new Date();
    let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    $scope.enq_date_one = new Date(date);
    $scope.phoneNumbr = /^(0047|\+47|47)?[2-9]\d{7}$/;

    $scope.save = function (modalstate, id) {
        $scope.data = {
            company_name            :   $scope.module.company_name, 
            organization_no         :   $scope.module.organization_no, 
            project_name            :   $scope.module.project_name, 
            contact_person          :   $scope.module.contact_person,
            mobile_no               :   $scope.module.mobile_number,
            email                   :   $scope.module.email,
            customer_enquiry_date   :   $scope.enq_date_one,
            enquiry_number          :   $scope.myWelcome,
            remarks                 :   $scope.module.remarks
        } 
        
        $http({
            method: "POST",
            url: API_URL + "admin/enquiry",
            data: $.param($scope.data),
            headers: { 
                'Content-Type': 'application/x-www-form-urlencoded' 
            }
        }).then(function successCallback(response) {
            $window.location.href =`${API_URL}admin/enquiry-list`;
        }, function errorCallback(response) {
            Message('danger',response.data.errors.email);
        });
    } 

    $scope.getCompany = (text) => {
        $http.get(`https://hotell.difi.no/api/json/brreg/enhetsregisteret?query=${text}`)
        .then(function successCallback(res){
            $scope.companyList = res.data.entries.slice(0, 50)
                .map((item) => {
                    return {'company':item.navn, 'mobile': item.tlf_mobil, 'organization_no': item.orgnr} 
                });
                if($scope.companyList.length == 1) {
                    $scope.module.company_name = $scope.companyList[0].company;
                    $scope.module.mobile_number = $scope.companyList[0].mobile.split(" ").join("");
                    $scope.module.organization_no = ($scope.companyList[0].organization_no == '') ? '  ' : $scope.companyList[0].organization_no;
                }  else {
                    $scope.module.mobile_number = '';
                    $scope.module.organization_no = '';
                }
        }, function errorCallback(error){
            console.log(error);
        });
    }

    $scope.getCompanyByName = (name) => {
        console.log(name)
    }
});