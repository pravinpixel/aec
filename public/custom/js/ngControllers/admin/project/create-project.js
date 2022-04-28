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
              delete: true,
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
                let path = e.parentDirectory.relativeName+'/'+e.name;
                $http.post(`${API_URL}project/sharepoint-folder`, {data: fileSystem, path : path})
                .then((res) => {
                    if(res.data.status == false) {
                        Message('danger', res.data.msg);
                        return false;
                    }
                    Message('success', 'Created successfully');
                })
            },
            onItemDeleting: function (e) {
                let path = e.item.relativeName;
                $http.post(`${API_URL}project/sharepoint-folder-delete`, {data: fileSystem, path: path})
                .then((res) => {
                    if(res.data.status == false) {
                        Message('danger', res.data.msg);
                        return false;
                    }
                    Message('success', 'deleted successfully');
                })
                return true;
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
    $scope.Template;

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
            $location.path('invoice-plan')
        })
    }

    $scope.submitTemplate = () => {
        if($scope.teamSetups.length == 0){
            Message('danger', `Please add template`); return false;
        }
        $http.post(`${API_URL}project/store-template`, {data: $scope.teamSetups, tempalte:$scope.Template})
        .then((res) => {
            Message('success', `${res.data.msg}`);
            $("#add-template-modal").modal('hide');
            return false;
        })
    }
});

app.controller('ProjectSchedulerController', function($scope, $http, API_URL, $rootScope){
     
    $http.get(`${API_URL}get-project-session-id`).then((res)=> {
        $scope.project_id = res.data;
        let project_id = $scope.project_id;

        var dp = new gantt.dataProcessor(`${API_URL}api/project/${project_id}`);
        dp.init(gantt);
        dp.setTransactionMode("REST");

        ganttModules.zoom.setZoom("months");
        gantt.init("gantt_here");
        ganttModules.menu.setup();
        gantt.load(`${API_URL}project/edit/${project_id}/project_scheduler`); 
    });
 
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

app.controller('ToDoListController', function ($scope, $http, API_URL, $location) {


    $http.get(`${API_URL}get-project-session-id`).then((res)=> {
        $scope.project_id = res.data;
        console.log("This is Current Session ID : " , $scope.project_id)

        var project_id  = $scope.project_id;
   
        if(project_id != null) {
            $http.get(`${API_URL}get-project-type`).then((res)=> {
                $scope.projectTypes = res.data;
            });
                
            $http.get(`${API_URL}project/${project_id}`).then((res)=> {
                $scope.project = formatData(res.data);
                $scope.check_list_items         =   JSON.parse(res.data.gantt_chart_data)  == null ? [] :  JSON.parse(res.data.gantt_chart_data)
                $scope.check_list_items_status  =   JSON.parse(res.data.gantt_chart_data)  == null ? false :  true
            });
        }
    });

     
 
    // ======= $scope of Flow ==============

    $http.get(`${API_URL}admin/check-list-master-group`).then((res)=> {
        $scope.check_list_master = res.data.data;
    });


    $scope.add_new_check_list_item  =  ()   => { 
        if($scope.check_list_type === undefined || $scope.check_list_type == '') return false

        // $scope.return   =    true

        // $scope.check_list_items.map(item => {``
        //     let atime   = item.data[1][0]
        //     if (atime.name == JSON.parse($scope.check_list_type).name) {
        //         $scope.return   = false
        //     }
        // });

        // if($scope.return   == false) return false

        $http.post(`${API_URL}admin/check-list-master-group`, {data:  $scope.check_list_type}).then((res) => {
            $scope.check_list_items.push(res.data.data)
            console.log($scope.check_list_items)
        })
          
    };
    
    $scope.delete_this_check_list_item  =  (index)  => $scope.check_list_items.splice(index,1);

    $scope.storeToDoLists = () => {
         
        $scope.check_list_items.map((CheckLists) => {

            const CheckListsIndex = Object.entries(CheckLists.data);

            $scope.CallToDB = false;

            CheckListsIndex.map((TaskLists) => {
                const TaskListsIndex = TaskLists[1].data;
                TaskListsIndex.map((ListItems) => {
                    if(ListItems.assign_to === undefined  || ListItems.assign_to == '') {
                        Message('danger', 'Assign To Field is  Required !');
                        $scope.CallToDB = false;
                        return false
                    } else $scope.CallToDB = true;
                    if(ListItems.start_date === undefined  || ListItems.start_date == '') {
                        Message('danger', 'Start Date Field is  Required !');
                        $scope.CallToDB = false;
                        return false
                    } else $scope.CallToDB = true;
                    if(ListItems.end_date === undefined  || ListItems.end_date == '') {
                        Message('danger', 'End Date Field is  Required !');
                        $scope.CallToDB = false;
                        return false
                    } else $scope.CallToDB = true;
                    
                }); 
            });

            if ($scope.CallToDB === true) {
                $http.post(`${$("#baseurl").val()}admin/store-to-do-list`, {
                    id      :  $scope.project_id,
                    update  :  $scope.check_list_items_status,
                    data    :  $scope.check_list_items,
                }).then((res) => {
                    if(res.data.status === true) {
                        Message('success', 'To do List Added Success !');
                        $location.path('project-scheduling')
                    }                
                })
            }
            
        }); 
        
    }
});

app.controller('ReviewAndSubmit', function ($scope, $http, API_URL, $timeout) {

    $http.get(`${API_URL}get-project-session-id`).then((res)=> {
        $scope.project_id = res.data;
        var project_id  = $scope.project_id; 
        $scope.teamSetups = [];
        $http.get(`${API_URL}project/overview/${project_id}`).then((res)=> {
            $scope.review  =  res.data;
            $scope.teamSetups = res.data.team_setup;
            $scope.check_list_items     =   JSON.parse(res.data.gantt_chart_data)  == null ? [] :  JSON.parse(res.data.gantt_chart_data)
        }); 
    }); 

        
    $scope.submitProject = (e) => {
        e.preventDefault();
        $http.post(`${API_URL}project`, {data: '', type:'review_and_submit'})
        .then((res) => {
            $timeout(function(){
                window.onbeforeunload = null;
            });
            if(res.data.status == true) {
                Swal.fire({
                    title: `Project submitted successfully are you want to leave the page?`,
                    showDenyButton: false,
                    showCancelButton: true,
                    cancelButtonText: 'No',
                    confirmButtonText: 'Yes',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        location.href =  `${API_URL}admin/list-projects`;
                    }
                });
            }
        })
    }

    $scope.saveProject = (e) => {
        e.preventDefault();
        $http.post(`${API_URL}project`, {data: '', type:'review_and_save'})
        .then((res) => {
            $timeout(function(){
                window.onbeforeunload = null;
            });
            if(res.data.status == true) {
                Swal.fire({
                    title: `Project saved successfully are you want to leave the page?`,
                    showDenyButton: false,
                    showCancelButton: true,
                    cancelButtonText: 'No',
                    confirmButtonText: 'Yes',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        location.href =  `${API_URL}admin/list-projects`;
                    }
                });
            }
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
                let projectCost = scope.project.project_cost;
                let result =   scope.invoicePlans.map((invoicePlan, index) => {
                    if(scope.project.no_of_invoice == index + 1) {
                        projectCost -= scope.invoicePlans.totalAmount;
                        return {
                            index: index + 1,
                            amount: projectCost,
                            invoice_date: invoicePlan.invoice_date,
                            percentage: scope.invoicePlans.totalPercentage,
                        }
                    }
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
            scope.$watchGroup(['project.no_of_invoice','project.project_cost'], function() {
                scope.invoicePlans = scope.invoicePlans.map((invoicePlan, index) => {
                    if(scope.project.no_of_invoice == index + 1) {
                        return {    
                            index: index + 1,
                            amount: ( scope.project.project_cost / 100 ) * invoicePlan.percentage,
                            invoice_date: invoicePlan.invoice_date,
                            percentage: 100,
                        };
                    }
                    return invoicePlan;
                });
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

