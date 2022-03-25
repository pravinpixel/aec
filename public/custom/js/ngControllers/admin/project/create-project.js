formatData = (project) => {
    return {...project, ...{'start_date': new Date(project.start_date), 'delivery_date' : new Date(project.start_date)}}
}

app.controller('CreateProjectController', function ($scope, $http, API_URL, $location){
    $scope.project = {};
    $http.get(`${API_URL}project/reference-number`)
    .then((res)=> {
        $scope.project.reference_number = res.data;
    });
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

    $http.get(`${API_URL}project/wizard/create_project`)
    .then((res)=> {
        if(res.data != false) $scope.project = formatData(res.data);
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
                    $scope.project.mobile_number = $scope.companyList[0].mobile.split(" ").join("");
                    $("#zipcode").val($scope.companyList[0].zip_code);
                    $scope.getZipcode();
                }
        }, function errorCallback(error){
            console.log(error);
        });
    }

    $scope.submitCreateProjectForm = () => {
        $http.post(`${API_URL}project`, {data: $scope.project, type:'create_project'})
            .then((res) => {
                Message('success', 'Project Created Successfully');
                $location.path('platform');
            })
    }
});

app.controller('ConnectPlatformController', function($scope, $http, API_URL, $location){
    $scope.project = {};
    $http.get(`${API_URL}get-project-type`)
    .then((res)=> {
        $scope.projectTypes = res.data;
    });

    $http.get(`${API_URL}project/wizard/create_project`)
    .then((res)=> {
        if(res.data != false) $scope.project = formatData(res.data);
    });

    $scope.submitConnectPlatformForm = () => {
        $http.post(`${API_URL}project`, {data: $scope.project, type:'create_project'})
        .then((res) => {
            Message('success', 'Connect platform Created Successfully');
            $location.path('team-setup')
        })
    }
});

app.controller('TeamSetupController', function ($scope, $http, API_URL, $location){
    $scope.teamRole   = {};
    $scope.tagBox     = {};
    $scope.teamSetups = [];
    $http.get(`${API_URL}project/wizard/team_setup`)
    .then((res)=> {
        $scope.teamSetups =  res.data.map( (item) => {
            return { role: item.role, team: item.team }
        })
    });
    $http.get(`${API_URL}role`).then((res) => {
        $scope.roles = res.data;
    });

    $scope.addResource = (role) => {
        let role_data = JSON.parse(role);
        if($scope.teamRole.role == "" || typeof($scope.teamRole.role) == 'undefined') {
            Message('danger','Please select role');
            return false;
        }
        const result = $scope.teamSetups.filter(item => item.role.id == role_data.id);
        if(result.length) {
            Message('danger','Role already added');
            return false;
        }
        $scope.teamSetups.push( {role: role_data, team:{}});
        $scope.teamRole.role = "";
    }
    $scope.removeResource = (index) => {
        $scope.teamSetups.splice(index, 1);
    }
    
    $scope.teamSetupFormSubmit = () => {
        $http.post(`${API_URL}project`, {data: $scope.teamSetups, type:'team_setup'})
        .then((res) => {
            Message('success', 'Team Setup created successfully');
            $location.path('project-scheduling')
        })
    }
});

app.directive('getRoleUser',function getRoleUser($http, API_URL){
    return {
        restrict: 'A',
        link : function (scope, element, attrs) {
            let selectedValues = Object.values(scope.teamSetups[attrs.value].team);
            $http.get(`${API_URL}role/${scope.teamSetup.role.id}`).then((res) => {
                if(selectedValues) {
                    scope.tagBox = {
                        customTemplate: {
                        dataSource:  res.data.data,
                        displayExpr: 'first_Name',
                        valueExpr: 'id',
                        itemTemplate: 'customItem',
                        value: selectedValues,
                        searchEnabled: true,
                        onValueChanged(e) {
                            scope.teamSetup.team = e.value;
                        },
                        },
                    };
                }
                
            });
        },
    };
});

