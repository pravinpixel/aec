formatData = (project) => {
    return {...project, ...{'start_date': new Date(project.start_date), 'delivery_date' : new Date(project.start_date)}}
}

app.controller('CreateProjectController', function ($scope, $http, API_URL, $location){
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
                    $scope.project.mobile_number = $scope.companyList[0].mobile.split(" ").join("");
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
            Message('success', 'Project updated successfully');
            $location.path('platform');
        })
    }

});

app.controller('ConnectPlatformController', function($scope, $http, API_URL, $location){
    let project_id =  $("#project_id").val();
    $http.get(`${API_URL}get-project-type`)
    .then((res)=> {
        $scope.projectTypes = res.data;
    });
    $http.get(`${API_URL}project/${project_id}`)
    .then((res)=> {
        $scope.project = formatData(res.data);
    });
    $http.get(`${API_URL}project/enquiry/${project_id}`)
    .then((res)=> {
       $scope.enquiry = res.data;
    });
    $scope.submitConnectPlatformForm = () => {
        $http.put(`${API_URL}project/${project_id}`, {data: $scope.project, type:'create_project'})
        .then((res) => {
            Message('success', 'Connect Platform updated successfully');
            $location.path('team-setup');
        })
    }
});

app.controller('TeamSetupController', function ($scope, $http, API_URL, $location){
    let project_id        = $("#project_id").val();
    $scope.teamRole   = {};
    $scope.tagBox     = {};
    $scope.teamSetups = [];
    $http.get(`${API_URL}project/edit/${project_id}/team_setup`)
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
        $http.put(`${API_URL}project/${project_id}`, {data: $scope.teamSetups, type:'team_setup'})
        .then((res) => {
            Message('success', 'Team Setup updated successfully');
            $location.path('project-scheduling');
        })
    }
});

app.controller('ProjectSchedulerController', function($scope, $http, API_URL, $location){
    let project_id =  $("#project_id").val();
    var dp = new gantt.dataProcessor(`${API_URL}api/project/${project_id}`);
    dp.init(gantt);
    dp.setTransactionMode("REST");

    ganttModules.zoom.setZoom("months");
    gantt.init("gantt_here");
    ganttModules.menu.setup();
    gantt.load(`${API_URL}project/edit/${project_id}/project_scheduler`); 
});

app.controller('InvoicePlanController', function ($scope, $http, API_URL, $location){
    $scope.invoicePlans = [];
    $scope.project = {};
    let project_id =  $("#project_id").val();
    
    $http.get(`${API_URL}project/edit/${project_id}/invoice_plan`)
    .then((res)=> {
        $scope.project = formatData(res.data);
    });

    $scope.handleInvoiceChange = () => {
        $scope.invoicePlans.length = 0;
        for(var i =0; i< $scope.project.no_of_invoice;  i++){
            $scope.invoicePlans.push({
                'invoice_date': '',
                'amount' : ($scope.project.project_cost / $scope.project.no_of_invoice).toFixed(2),
                'percentage':  ((($scope.project.project_cost / $scope.project.no_of_invoice) * 100) / 100)
            });
        }
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

  