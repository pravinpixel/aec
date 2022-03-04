app.controller('SalesController', function ($scope, $http, API_URL, $window) { 
    $scope.day = new Date();
    $scope.enq_number = 'Draft';
    $scope.enq_date_one = moment(new Date()).format('YYYY-MM-DD');
    $scope.phoneNumbr = /^(0047|\+47|47)?[2-9]\d{7}$/;

    $scope.save = function (modalstate, id) {
        $scope.data = {
            company_name            :   $scope.module.company_name, 
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
                    return {'company':item.navn, 'mobile': item.tlf_mobil} 
                });
                if($scope.companyList.length == 1) {
                    $scope.module.company_name = $scope.companyList[0].company;
                    $scope.module.mobile_number = $scope.companyList[0].mobile.split(" ").join("");
                }
        }, function errorCallback(error){
            console.log(error);
        });
    }
});