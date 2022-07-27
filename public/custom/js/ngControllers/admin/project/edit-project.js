formatData = (project) => {
    return {...project, ...{'start_date': new Date(project.start_date), 'delivery_date' : new Date(project.delivery_date)}}
}

app.controller('CreateProjectController', function ($scope, $http, API_URL, $location){
    $("#create-project").addClass('active');
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
        projectActiveTabs($scope.project.wizard_status);
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
    $("#connect-platform").addClass('active');
    let project_id =  $("#project_id").val();
    let fileSystem = [];
    $http.get(`${API_URL}bim360/projects-type`)
    .then((res)=> {
        $scope.projectTypes = res.data;
    });
    $http.get(`${API_URL}project/${project_id}`)
    .then((res)=> {
        $scope.project = formatData(res.data);
        projectActiveTabs($scope.project.wizard_status);
        $scope.project['address_one'] =  res.data.site_address;
    });
    $http.get(`${API_URL}project/enquiry/${project_id}`)
    .then((res)=> {
       $scope.enquiry = res.data;
    });



    $scope.updateConnectionPlatform = (type) => {
        console.log('called');
        if(type == 'sharepoint') {
           $type = 'sharepoint_status';
        } else if(type == 'bim') {
            $type = 'bim_status';
        } else if(type == 'tsoffice') {
            $type = 'tf_office_status';
        } else {
          return false;  
        }
        $http.post(`${API_URL}project/connection-platform/${project_id}/${$type}`)
        .then((res) => {
            Message('success', res.data.msg);
        }, (er) => {
            Message('danger', res.data.msg);
        })
    }
    

    $http.get(`${API_URL}project/edit/${project_id}/connection_platform`)
    .then((res)=> {
        fileSystem = res.data.folders;
        if(res.data.platform_access.sharepoint_status == 1) {
            $("#switch0").prop('checked', true);
        }
        if(res.data.platform_access.bim_status == 1) {
            $("#switch1").prop('checked', true);
        }
        if(res.data.platform_access.tf_office_status == 1) {
            $("#switch2").prop('checked', true);
        }
    

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
                $http.put(`${API_URL}project/sharepoint-folder/${project_id}`, {data: fileSystem, path: path})
                .then((res) => {
                    if(res.data.status == false) {
                        Message('danger', res.data.msg);
                        return false;
                    }
                    Message('success', 'updated successfully');
                })
            },
            onItemDeleting: function (e) {
                let path = e.item.relativeName;
                console.log(path);
                $http.post(`${API_URL}project/sharepoint-folder-delete/${project_id}`, {data: fileSystem, path: path})
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
             
                $http.put(`${API_URL}project/sharepoint-folder/${project_id}`, {data: fileSystem})
                .then((res) => {
                    Message('success', 'updated successfully');
                 
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
        $http.put(`${API_URL}project/${project_id}`, {data: $scope.project, type:'connect_platform'})
        .then((res) => {
            Message('success', 'Connect Platform updated successfully');
            $location.path('team-setup');
        })
    }

});

app.controller('TeamSetupController', function ($scope, $http, API_URL, $location){
    $("#team-setup").addClass('active');
    let project_id        = $("#project_id").val();
    $scope.teamRole   = {};
    $scope.tagBox     = {};
    $scope.teamSetups = [];
    $scope.Template;
    $scope.selectedTemplate;
    $http.get(`${API_URL}project/${project_id}`)
    .then((res)=> {
        projectActiveTabs(res.data.wizard_status);
    });
    
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
    
    $scope.teamSetupFormSubmit = () => {
        $http.put(`${API_URL}project/${project_id}`, {data: $scope.teamSetups, type:'team_setup'})
        .then((res) => {
            Message('success', 'Team Setup updated successfully');
            $location.path('invoice-plan');
        })
    }
});

app.controller('ProjectSchedulerController', function($scope, $http, API_URL, $location){
    $("#project-scheduler").addClass('active');
    let project_id =  $("#project_id").val();

    $http.get(`${API_URL}project/${project_id}`)
    .then((res)=> {
        projectActiveTabs(res.data.wizard_status);
    });

    var dp = new gantt.dataProcessor(`${API_URL}api/project/${project_id}`);
    dp.init(gantt);
    dp.setTransactionMode("REST");

    ganttModules.zoom.setZoom("months");
    gantt.init("gantt_here");
    ganttModules.menu.setup();
    gantt.load(`${API_URL}project/edit/${project_id}/project_scheduler`); 
});

app.controller('InvoicePlanController', function ($scope, $http, API_URL, $location, $timeout){
    $("#invoice-plan").addClass('active');
    $scope.invoicePlans = {
        totalPercentage: 100,
        totalAmount: 0,
        invoices: []
    };
    $scope.project = {};
    var invoiceStatus = true;
    var totalInvoice = 0;
    let project_id =  $("#project_id").val();
    
    $http.get(`${API_URL}project/${project_id}`)
    .then((res)=> {
        projectActiveTabs(res.data.wizard_status);
    });

    $http.get(`${API_URL}project/edit/${project_id}/invoice_plan`)
    .then((res)=> {
        $scope.project = formatData(res.data);
        $scope.project.project_cost = res.data.invoice_plan.project_cost;
        $scope.project.no_of_invoice = Number(res.data.invoice_plan.no_of_invoice);
        let result = {};
        let response = JSON.parse(res.data.invoice_plan.invoice_data);
        totalInvoice = response.invoices.length;
        if(totalInvoice > 0) {
            invoiceStatus = !invoiceStatus;
        }
        let invoices = response.invoices.map((item)=> {
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
        result['invoices'] = invoices;
        $scope.invoicePlans = result;
    });

    $scope.handleInvoiceChange = () => {
        if($scope.project.no_of_invoice <= 0){
            $scope.project.no_of_invoice = 1;
        }
        if($scope.project.no_of_invoice >= 100){
            $timeout(() => {
                $scope.project.no_of_invoice = 100;
            },1000);
        }
        let totalRow = totalInvoice - $scope.project.no_of_invoice;
        if(invoiceStatus) {
            totalInvoice = $scope.project.no_of_invoice;
            invoiceStatus = !invoiceStatus;
            for(var i = 1; i <= $scope.project.no_of_invoice;  i++){
                let invoice_date = (i == 1) ? $scope.project.start_date : '';
                $scope.invoicePlans.invoices.push({
                    'index': i,
                    'invoice_date': invoice_date,
                    'amount' : 0,
                    'percentage': 0
                });
            }
        } else if(totalRow >  0) {
            let removeCount = $scope.invoicePlans.invoices.length - totalRow;
            $scope.invoicePlans.invoices.length = removeCount + 1;
            $scope.invoicePlans.invoices.splice(-2,1);
            totalInvoice =  $scope.invoicePlans.invoices.length;
        } else if(totalRow < 0) {
            let newRow = [];
            let numOfRow = $scope.project.no_of_invoice - totalInvoice;
            for(var i = 0; i < numOfRow;  i++){
                newRow.push({
                    'index': totalInvoice + i,
                    'invoice_date': '',
                    'amount' : 0,
                    'percentage': 0
                });
            }
            $scope.invoicePlans.invoices.splice(-1,0, ...newRow);
            totalInvoice = $scope.project.no_of_invoice;
        }
        if($scope.invoicePlans.invoices.length == 1) {
            $scope.invoicePlans.invoices[0].invoice_date = $scope.project.start_date;
        }
        if($scope.invoicePlans.invoices[0].invoice_date == '') {
            $scope.invoicePlans.invoices[0].invoice_date = $scope.project.start_date;
        }
    }

    $scope.handleSubmitInvoicePlan = () => {
        let data ={'invoice_data': $scope.invoicePlans,'no_of_invoice': $scope.project.no_of_invoice, 'project_cost': $scope.project.project_cost}
        $http.put(`${API_URL}project/${project_id}`, {data: data, type:'invoice_plan'})
        .then((res) => {
            Message('success', 'Invoice Plan updated successfully');
            $location.path('to-do-listing');
        });
    }
});

app.controller('ToDoListController', function ($scope, $http, API_URL, $location) {
    $("#todo-list").addClass('active');
    let project_id =  $("#project_id").val();
    $http.get(`${API_URL}get-delivery-type`).then((res)=> {
        $scope.deliveryTypes = res.data;
    });

    $http.get(`${API_URL}admin/get-employee-by-slug/project_manager`).then((res)=> {
        $scope.projectManagers = res.data;
    });

    $http.get(`${API_URL}project/${project_id}`).then((res)=> {
        $scope.project = formatData(res.data);
        $scope.check_list_items         =   JSON.parse(res.data.gantt_chart_data)  == null ? [] :  JSON.parse(res.data.gantt_chart_data)
        $scope.check_list_items_status  =   JSON.parse(res.data.gantt_chart_data)  == null ? false :  true
        projectActiveTabs($scope.project.wizard_status);
    });
 
    // ======= $scope of Flow ==============

    $http.get(`${API_URL}admin/check-list-master-group`).then((res)=> {
        $scope.check_list_master = res.data.data;
    });

    // $scope.check_list_items     =  $scope.gantt_project_data
    // clg

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
                    id      :  project_id,
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
    $("#review").addClass('active');
    let project_id =  $("#project_id").val();
    $scope.teamSetups = [];
    let fileSystem = [];

    $http.get(`${API_URL}project/${project_id}`)
    .then((res)=> {
        projectActiveTabs(res.data.wizard_status);
    });

    $http.get(`${API_URL}admin/get-employee-by-slug/project_manager`).then((res)=> {
        $scope.projectManagers = res.data;
    });
    
    $http.get(`${API_URL}project/overview/${project_id}`).then((res)=> {
        let connect_platform_access = res.data.connect_platform_access;
        if(connect_platform_access.sharepoint_status == 1) {
            $("#switch0").prop('checked', true);
        }
        if(connect_platform_access.bim_status == 1) {
            $("#switch1").prop('checked',true);
        }
        if(connect_platform_access.tf_office_status == 1) {
            $("#switch2").prop('checked',true);
        }
        $scope.review  =  res.data 
        $scope.teamSetups = res.data.team_setup;
        $scope.project = formatData(res.data.project);
        $scope.project['address_one'] =  res.data.project.site_address;
        $scope.check_list_items         =   JSON.parse(res.data.gantt_chart_data)  == null ? [] :  JSON.parse(res.data.gantt_chart_data)
        fileSystem = res.data.sharepoint;
        const fileManager = $('#file-manager').dxFileManager({
            name: 'fileManager',
            fileSystemProvider: fileSystem,
            height: 450,
            permissions: {
              create: false,
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
                  
                },
                'refresh',
                {
                  name: 'separator',
                  location: 'after',
                },
                'switchView',
              ]
            }
        }).dxFileManager('instance');
    }); 
    
    $scope.submitProject = (e) => {
        e.preventDefault();
        $http.put(`${API_URL}project/${project_id}`, {data: '', type:'review_and_submit'})
        .then((res) => {
            $timeout(function(){
                window.onbeforeunload = null;
            });
            if(res.data.status == true) {
                Swal.fire({
                    icon: 'success',
                    html: `<h3>Project Submitted Successfully..!!</h3>`,
                    showConfirmButton: false,
                    timer: 3000
                });
                $timeout(()=> {
                    location.href =  `${API_URL}admin/list-projects`;
                }, 3000);
            }
        })
    }

    $scope.saveProject = () => {
        $http.put(`${API_URL}project/${project_id}`, {data: '', type:'review_and_save'})
        .then((res) => {
            $timeout(function(){
                window.onbeforeunload = null;
            });
            if(res.data.status == true) {
                Swal.fire({
                    html: `<h3>Project Saved Successfully </br> Do you want to leave the page ?</h3>`,
                    showDenyButton: false,
                    showCancelButton: true,
                    cancelButtonText: 'No',
                    confirmButtonText: 'Yes',
                    icon: 'question',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        location.href =  `${API_URL}admin/list-projects`;
                    }
                });
            }
        })
    }

});

app.directive('getToDoLists',['$http', function() {
    return {
        restrict: 'A',
        link: function (scope, element, attrs) {
            element.on('change', function () {

                scope.to_do_ist = {
                    duration    :   100,
                    parent      :   0,
                    progress    :   0,
                    project_id  :   1,
                    assign_to   :   1,
                    start_date  :   moment(scope.taskListData.start_date).format('YYYY-MM-DD, h:mm:ss'),
                    end_date    :   moment(scope.taskListData.end_date).format('YYYY-MM-DD, h:mm:ss'),
                    text        :   scope.taskListData.task_list,
                    type        :   "project",
                    status      :   scope.taskListData.status,
                }
                scope.to_do_ist =   scope.taskListData 
            
            });
        },
    };
}]);

app.directive('calculateAmount',   ['$http' ,function ($http, $scope , $apply) {  
    return {
        restrict: 'A',
        link: function (scope, element, attrs) {
            element.on('change', function () {
                scope.invoicePlans.totalPercentage = 100;
                scope.invoicePlans.totalAmount = 0;
                let result = {};
                let projectCost = scope.project.project_cost;
                let invoices =   scope.invoicePlans.invoices.map((invoicePlan, index) => {
                    if(scope.project.no_of_invoice == index + 1) {
                        projectCost -= scope.invoicePlans.totalAmount;
                        return {
                            index: index + 1,
                            amount: Number.parseFloat(projectCost).toFixed(2),
                            invoice_date: invoicePlan.invoice_date,
                            percentage: scope.invoicePlans.totalPercentage,
                        }
                    }
                    let totalPercentage = scope.invoicePlans.totalPercentage - invoicePlan.percentage;
                    if(totalPercentage < 0) {
                        return {    
                            index: index + 1,
                            amount: 0,
                            invoice_date: invoicePlan.invoice_date,
                            percentage: 0,
                        };
                    } else {
                        scope.invoicePlans.totalPercentage -= invoicePlan.percentage;
                        scope.invoicePlans.totalAmount += ( scope.project.project_cost / 100 ) * invoicePlan.percentage;
                        return {    
                            index: index + 1,
                            amount: Number.parseFloat(( scope.project.project_cost / 100 ) * invoicePlan.percentage).toFixed(2),
                            invoice_date: invoicePlan.invoice_date,
                            percentage: invoicePlan.percentage,
                        };
                    }
                });
                result['totalPercentage'] = scope.invoicePlans.totalPercentage;
                result['totalAmount'] = scope.invoicePlans.totalAmount;
                result['invoices'] = invoices;
                scope.invoicePlans = result;
                scope.$apply();
            });
            scope.$watchGroup(['project.no_of_invoice','project.project_cost'], function() {
                let totalPercentage = 100;
                scope.invoicePlans.invoices = scope.invoicePlans.invoices.map((invoicePlan, index) => {
                    if(scope.project.no_of_invoice == 1) {
                        totalPercentage = 100;
                        invoice_date = scope.project.start_date;
                    }else if(scope.project.no_of_invoice != index + 1) {
                        totalPercentage -= invoicePlan.percentage;
                    }
                    if(scope.project.no_of_invoice == index + 1) {
                        return {    
                            index: index + 1,
                            amount: Number.parseFloat(( scope.project.project_cost / 100 ) * invoicePlan.percentage).toFixed(2),
                            invoice_date: invoicePlan.invoice_date,
                            percentage: totalPercentage,
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
            $http.get(`${API_URL}admin/get-role-user/${scope.teamSetup.role.id}`).then((res) => {
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

 