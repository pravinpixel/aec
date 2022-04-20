formatData = (project) => {
    return {...project, ...{'start_date': new Date(project.start_date), 'delivery_date' : new Date(project.start_date)}}
}

app.controller('CreateProjectController', function ($scope, $http, API_URL, $location, $rootScope){
    $scope.project = {};
    $rootScope.project = {};
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
        $rootScope.project_id = res.data.id;
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
    let fileSystem = [];
    $http.get(`${API_URL}get-project-type`)
    .then((res)=> {
        $scope.projectTypes = res.data;
    });

    $http.get(`${API_URL}project/wizard/create_project`)
    .then((res)=> {
        if(res.data != false) $scope.project = formatData(res.data);
    });

    $http.get(`${API_URL}project/wizard/connection_platform`)
    .then((res)=> {
        fileSystem = res.data;
        const fileManager = $('#file-manager').dxFileManager({
            name: 'fileManager',
            fileSystemProvider: fileSystem,
            height: 450,
            permissions: {
              create: true,
              delete: false,
              rename: false,
              download: false,
            },
            itemView: {
              details: {
                columns: [
                  'thumbnail', 'name',
                  'dateModified', 'size',
                ],
              },
              showParentFolder: false,
            },
            toolbar: {
              items: [
                {
                  name: 'showNavPane',
                  visible: true,
                },
                'separator', 'create',
                {
                  widget: 'dxMenu',
                  location: 'before',
                  options: {
                    onItemClick,
                  },
                },
                'refresh',
                {
                  name: 'separator',
                  location: 'after',
                },
                'switchView',
              ]
            },
            onContextMenuItemClick: onItemClick,
            onDirectoryCreating: function (e) {
                console.log('onDirectoryCreating',fileSystem);
                $http.post(`${API_URL}project/sharepoint-folder`, {data: fileSystem})
                .then((res) => {
                    Message('success', 'Created successfully');
                 
                })
            },
            onItemRenamed: function(e) {
                console.log('onItemRenamed',fileSystem);
                $http.put(`${API_URL}project/sharepoint-folder/${project_id}`, {data: fileSystem})
                .then((res) => {
                    Message('success', 'created successfully');
                })
            }
           
        }).dxFileManager('instance');
        
        function onItemClick(args) {
        let updated = false;
        if (args.itemData.extension) {
            updated = createFile(args.itemData.extension, args.fileSystemItem);
        } else if (args.itemData.category !== undefined) {
            updated = updateCategory(args.itemData.category, args.fileSystemItem, args.viewArea);
        }
        if (updated) {
            fileManager.refresh();
        }
        }
         
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

    $scope.selectedTemplate;
    $http.get(`${API_URL}project/get-templates`)
    .then( (res) => {
        console.log('template', res.data);
        $scope.templateList = res.data;
    });

    $scope.getTemplateChange = (template_id) => {
        console.log(template_id);
        $http.get(`${API_URL}project/get-template-by-id/${template_id}`)
        .then( (res) => {
            $scope.teamSetups = res.data;
            console.log('template', res.data);
        });
    }
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

app.controller('ProjectSchedulerController', function($scope, $http, API_URL, $rootScope){
    
    var dp = new gantt.dataProcessor(`${API_URL}api/project`);
    dp.init(gantt);
    dp.setTransactionMode("REST");
    ganttModules.zoom.setZoom("months");
    gantt.init("gantt_here");
    ganttModules.menu.setup();
    gantt.load(`${API_URL}project/wizard/project_scheduler`); 
});

app.controller('InvoicePlanController', function ($scope, $http, API_URL, $location){
    $scope.invoicePlans                     = [];
    $scope.invoicePlans['totalPercentage']  = 100;
    $scope.invoicePlans['totalAmount']      = 0;
    $scope.project = {};
    $http.get(`${API_URL}project/wizard/invoice_plan`)
    .then((res)=> {
        $scope.project = formatData(res.data);
        $scope.project.project_cost = res.data.invoice_plan.project_cost ?? 0;
        $scope.project.no_of_invoice = Number(res.data.invoice_plan.no_of_invoice);
        let result = JSON.parse(res.data.invoice_plan.invoice_data).map((item)=> {
            $scope.invoicePlans.totalPercentage -= item.percentage;
            $scope.invoicePlans.totalAmount += ( $scope.project.project_cost / 100 ) * item.percentage;
            return {
                'index': item.index,
                'invoice_date': new Date(item.invoice_date),
                'amount' : item.amount,
                'percentage': item.percentage
            }
        });
        result['totalPercentage'] = $scope.invoicePlans.totalPercentage;
        result['totalAmount'] = $scope.invoicePlans.totalAmount;
        $scope.invoicePlans = result;
    });

    $scope.handleInvoiceChange = () => {
        $scope.invoicePlans.length = 0;
        $scope.invoicePlans['totalPercentage']  = 100;
        $scope.invoicePlans['totalAmount']      = 0;
        for(var i = 1; i <= $scope.project.no_of_invoice;  i++){
            $scope.invoicePlans.push({
                'index': i,
                'invoice_date': '',
                'amount' : 0,
                'percentage': 0
            });
        }
    }

    $scope.handleSubmitInvoicePlan = () => {
        let data ={'invoice_data': $scope.invoicePlans,'no_of_invoice': $scope.project.no_of_invoice, 'project_cost': $scope.project.project_cost}
        $http.post(`${API_URL}project`, {data: data, type:'invoice_plan'})
        .then((res) => {
            Message('success', 'Invoice paln added successfully');
            $location.path('to-do-listing');
        })
    }
});

app.directive('calculateAmount',   ['$http' ,function ($http, $scope , $apply) {  
    return {
        restrict: 'A',
        link: function (scope, element, attrs) {
            element.on('change', function () {
                scope.invoicePlans.totalPercentage = 100;
                scope.invoicePlans.totalAmount = 0;
                let result =   scope.invoicePlans.map((invoicePlan, index) => {
                    scope.invoicePlans.totalPercentage -= invoicePlan.percentage;
                    scope.invoicePlans.totalAmount += ( scope.project.project_cost / 100 ) * invoicePlan.percentage;
                    return {    
                        index: index + 1,
                        amount: ( scope.project.project_cost / 100 ) * invoicePlan.percentage,
                        invoice_date: invoicePlan.invoice_date,
                        percentage: invoicePlan.percentage,
                    };
                });
                result['totalPercentage'] = scope.invoicePlans.totalPercentage;
                result['totalAmount'] = scope.invoicePlans.totalAmount;
                scope.invoicePlans = result;
                scope.$apply();
            });
        },
    };
}]);

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

