
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

    formatData = (project) => {
        return {...project, ...{'start_date': new Date(project.start_date), 'delivery_date' : new Date(project.start_date)}}
    }

    $http.get(`${API_URL}project/${project_id}`)
    .then((res)=> {
        $scope.project = formatData(res.data);
    });
//postalcode api
    $scope.getZipcode = function() {
        let zipcode = $("#zipcode").val();
        if(typeof(zipcode) == 'undefined' || zipcode.length != 4){
            return false;
        }
        $http({
            method: 'GET',
            url: `https://api.zippopotam.us/NO/${zipcode}`
        }).then(function successCallback(res) {
            $scope.zipcodeData = res.data
            $scope.project = {
                ...$scope.project, 
                ...{
                    'state'     :  $scope.zipcodeData.places[0].state,
                    'place'     :  $scope.zipcodeData.places[0]['place name'],
                    'country'   :  $scope.zipcodeData.country,
                    'zipcode'   :  zipcode,
                }
            };
        }, function errorCallback(error) {
            Message('danger', 'Invalid zipcode');
            $scope.project = {
                ...$scope.project, 
                ...{
                    'state'     : '',
                    'place'     : '',
                    'country'   : '',
                    'zipcode'   :  zipcode,
                }
            };
            return false;
        });
    } 
//company api
    $scope.getCompany = (text) => {
        $http.get(`https://hotell.difi.no/api/json/brreg/enhetsregisteret?query=${text}`)
        .then(function successCallback(res){
            $scope.companyList = res.data.entries.slice(0, 50)
                .map((item) => {
                    return {'company':item.navn, 'mobile': item.tlf_mobil, 'zip_code': item.forradrpostnr, 'site_address': item.forretningsadr} 
                });
                if($scope.companyList.length == 1) {
                    $scope.project.company_name = $scope.companyList[0].company;
                    $("#zipcode").val($scope.companyList[0].zip_code);
                    $scope.getZipcode();
                }
        }, function errorCallback(error){
            console.log(error);
        });
    }

    $scope.submitCreateProjectForm = () => {
        $http.put(`${API_URL}project/${project_id}`, {data: $scope.project, type:'create_project'})
            .then((res) => {
                console.log(res);
            })
    }

});

