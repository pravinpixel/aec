formatData = (project) => {
    return {
      ...project,
      ...{
        'start_date': new Date(project.start_date),
        'delivery_date': new Date(project.delivery_date)
      }
    }
  }
  
  app.controller('CreateProjectController', function($scope, $http, API_URL, $location, $rootScope) {
    $scope.project = {};
    $rootScope.project = {};
    $http.get(`${API_URL}project/reference-number`)
      .then((res) => {
        $scope.project.reference_number = res.data;
      });
    //get building types
    $http.get(`${API_URL}get-building-type`)
      .then((res) => {
        $scope.buildingTypes = res.data;
      });
    //get delivery types
    $http.get(`${API_URL}get-project-type`)
      .then((res) => {
        $scope.projectTypes = res.data;
      });
    //get project types
    $http.get(`${API_URL}get-delivery-type`)
      .then((res) => {
        $scope.deliveryTypes = res.data;
      });
  
    $http.get(`${API_URL}project/wizard/create_project`)
      .then((res) => {
        $rootScope.project_id = res.data.id;
        if (res.data != false) $scope.project = formatData(res.data);
        projectActiveTabs($scope.project.wizard_status);
      });
    //postalcode api
    $scope.getZipcode = function() {
      let zipcode = $("#zipcode").val();
      if (typeof(zipcode) == 'undefined' || zipcode.length != 4) {
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
            'state': $scope.zipcodeData.places[0].state,
            'place': $scope.zipcodeData.places[0]['place name'],
            'country': $scope.zipcodeData.country,
            'zipcode': zipcode,
          }
        };
      }, function errorCallback(error) {
        Message('danger', 'The entered zip code is not valid');
        $scope.project = {
          ...$scope.project,
          ...{
            'state': '',
            'place': '',
            'country': '',
            'zipcode': zipcode,
          }
        };
        return false;
      });
    }
    //company api
    $scope.getCompany = (text) => {
      $http.get(`https://hotell.difi.no/api/json/brreg/enhetsregisteret?query=${text}`)
        .then(function successCallback(res) {
          $scope.companyList = res.data.entries.slice(0, 50)
            .map((item) => {
              return {
                'company': item.navn,
                'mobile': item.tlf_mobil,
                'zip_code': item.forradrpostnr,
                'site_address': item.forretningsadr
              }
            });
          if ($scope.companyList.length == 1) {
            $scope.project.company_name = $scope.companyList[0].company;
            $scope.project.mobile_number = $scope.companyList[0].mobile.split(" ").join("");
            $("#zipcode").val($scope.companyList[0].zip_code);
            $scope.getZipcode();
          }
        }, function errorCallback(error) {
          console.log(error);
        });
    }
  
    $scope.submitCreateProjectForm = () => {
      $http.post(`${API_URL}project`, {
          data: $scope.project,
          type: 'create_project'
        })
        .then((res) => {
          Message('success', 'Project Created Successfully');
          $location.path('platform');
        })
    }
  });
  
  app.controller('ConnectPlatformController', function($scope, $http, API_URL, $location) {
    $scope.project = {};
    let fileSystem = [];
    $http.get(`${API_URL}bim360/projects-type`)
      .then((res) => {
        $scope.projectTypes = res.data;
      });
  
    $http.get(`${API_URL}project/wizard/create_project`)
      .then((res) => {
        $scope.project = formatData(res.data);
        projectActiveTabs(res.data.wizard_status);
      });
  
    $scope.updateConnectionPlatform = (type) => {
      if (type == 'sharepoint') {
        $type = 'sharepoint_status';
      } else if (type == 'bim') {
        $type = 'bim_status';
      } else if (type == 'tsoffice') {
        $type = 'tf_office_status';
      } else {
        return false;
      }
      $http.post(`${API_URL}project/connection-platform/${$type}`)
        .then((res) => {
          Message('success', res.data.msg);
        }, (er) => {
          Message('danger', res.data.msg);
        })
    }
  
    $http.get(`${API_URL}project/wizard/connection_platform`)
      .then((res) => {
        fileSystem = res.data.folders;
        if (res.data.platform_access.sharepoint_status == 1) {
          $("#switch0").prop('checked', true);
        }
        if (res.data.platform_access.bim_status == 1) {
          $("#switch1").prop('checked', true);
        }
        if (res.data.platform_access.tf_office_status == 1) {
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
            items: [{
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
          onDirectoryCreating: function(e) {
            let path = e.parentDirectory.relativeName + '/' + e.name;
            $http.post(`${API_URL}project/sharepoint-folder`, {
                data: fileSystem,
                path: path
              })
              .then((res) => {
                if (res.data.status == false) {
                  Message('danger', res.data.msg);
                  return false;
                }
                Message('success', 'Created successfully');
              })
          },
          onItemDeleting: function(e) {
            let path = e.item.relativeName;
            $http.post(`${API_URL}project/sharepoint-folder-delete`, {
                data: fileSystem,
                path: path
              })
              .then((res) => {
                if (res.data.status == false) {
                  Message('danger', res.data.msg);
                  return false;
                }
                Message('success', 'deleted successfully');
              })
            return true;
          },
          onItemRenamed: function(e) {
            console.log('onItemRenamed', fileSystem);
            $http.put(`${API_URL}project/sharepoint-folder/${project_id}`, {
                data: fileSystem
              })
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
      $http.post(`${API_URL}project`, {
          data: $scope.project,
          type: 'connect_platform'
        })
        .then((res) => {
          Message('success', 'Connect platform Created Successfully');
          $location.path('team-setup')
        })
    }
  });
  
  app.controller('TeamSetupController', function($scope, $http, API_URL, $location) {
    $scope.teamRole = {};
    $scope.tagBox = {};
    $scope.teamSetups = [];
    $scope.Template;
  
    $http.get(`${API_URL}project/wizard/create_project`)
      .then((res) => {
        projectActiveTabs(res.data.wizard_status);
      });
  
    $scope.selectedTemplate;
    $http.get(`${API_URL}project/get-templates`)
      .then((res) => {
        console.log('template', res.data);
        $scope.templateList = res.data;
      });
  
    $scope.getTemplateChange = (template_id) => {
      console.log(template_id);
      $http.get(`${API_URL}project/get-template-by-id/${template_id}`)
        .then((res) => {
          $scope.teamSetups = res.data;
          console.log('template', res.data);
        });
    }
    $http.get(`${API_URL}project/wizard/team_setup`)
      .then((res) => {
        $scope.teamSetups = res.data.map((item) => {
          return {
            role: item.role,
            team: item.team
          }
        })
      });
    $http.get(`${API_URL}role`).then((res) => {
      $scope.roles = res.data;
    });
  
    $scope.addResource = (role) => {
      let role_data = JSON.parse(role);
      if ($scope.teamRole.role == "" || typeof($scope.teamRole.role) == 'undefined') {
        Message('danger', 'Please select role');
        return false;
      }
      const result = $scope.teamSetups.filter(item => item.role.id == role_data.id);
      if (result.length) {
        Message('danger', 'Role already added');
        return false;
      }
      $scope.teamSetups.push({
        role: role_data,
        team: []
      });
      $scope.teamRole.role = "";
    }
    $scope.removeResource = (index) => {
      $scope.teamSetups.splice(index, 1);
    }
  
    $scope.teamSetupFormSubmit = () => {
      $http.post(`${API_URL}project`, {
          data: $scope.teamSetups,
          type: 'team_setup'
        })
        .then((res) => {
          Message('success', 'Team Setup created successfully');
          $location.path('invoice-plan')
        })
    }
  
    $scope.submitTemplate = () => {
      if ($scope.teamSetups.length == 0) {
        Message('danger', `Please add template`);
        return false;
      }
      $http.post(`${API_URL}project/store-template`, {
          data: $scope.teamSetups,
          tempalte: $scope.Template
        })
        .then((res) => {
          Message('success', `${res.data.msg}`);
          $("#add-template-modal").modal('hide');
          return false;
        })
    }
  });
  
  app.controller('ProjectSchedulerController', function($scope, $http, API_URL, $rootScope) {
  
    $http.get(`${API_URL}project/wizard/create_project`)
      .then((res) => {
        projectActiveTabs(res.data.wizard_status);
      });
  
    $http.get(`${API_URL}get-project-session-id`).then((res) => {
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
  
  app.controller('InvoicePlanController', function($scope, $http, API_URL, $location) {
    $scope.invoicePlans = [];
    $scope.invoicePlans = {
      totalPercentage: 100,
      totalAmount: 0,
      invoices: []
    };
    $scope.project = {};
    let totalInvoice = 0;
    let invoiceStatus = true;
    $http.get(`${API_URL}project/wizard/invoice_plan`)
      .then((res) => {
        $scope.project = formatData(res.data);
        $scope.project.project_cost = res.data.invoice_plan.project_cost ?? 0;
        $scope.project.no_of_invoice = Number(res.data.invoice_plan.no_of_invoice);
        let result = {};
        let response = JSON.parse(res.data.invoice_plan.invoice_data);
        totalInvoice = typeof(response.invoices) == 'undefined' ? 0 : response.invoices.length;
        if (totalInvoice > 0) {
          invoiceStatus = !invoiceStatus;
        }
        let invoices = response.invoices.map((item) => {
          $scope.invoicePlans.totalPercentage -= item.percentage;
          $scope.invoicePlans.totalAmount += ($scope.project.project_cost / 100) * item.percentage;
          return {
            'index': item.index,
            'invoice_date': new Date(item.invoice_date),
            'amount': item.amount,
            'percentage': item.percentage
          }
        });
        result['totalPercentage'] = $scope.invoicePlans.totalPercentage;
        result['totalAmount'] = $scope.invoicePlans.totalAmount;
        result['invoices'] = invoices;
        $scope.invoicePlans = result;
      });
  
    $http.get(`${API_URL}project/wizard/create_project`)
      .then((res) => {
        projectActiveTabs(res.data.wizard_status);
      });
  
    $scope.handleInvoiceChange = () => {
      if ($scope.project.no_of_invoice <= 0) {
        $scope.project.no_of_invoice = 1;
      }
      if ($scope.project.no_of_invoice >= 100) {
        $timeout(() => {
          $scope.project.no_of_invoice = 100;
        }, 1000);
      }
      let totalRow = totalInvoice - $scope.project.no_of_invoice;
      if (invoiceStatus) {
        totalInvoice = $scope.project.no_of_invoice;
        invoiceStatus = !invoiceStatus;
        for (var i = 1; i <= $scope.project.no_of_invoice; i++) {
          let invoice_date = (i == 1) ? $scope.project.start_date : '';
          $scope.invoicePlans.invoices.push({
            'index': i,
            'invoice_date': invoice_date,
            'amount': 0,
            'percentage': 0
          });
        }
      } else if (totalRow > 0) {
        let removeCount = $scope.invoicePlans.invoices.length - totalRow;
        $scope.invoicePlans.invoices.length = removeCount + 1;
        $scope.invoicePlans.invoices.splice(-2, 1);
        totalInvoice = $scope.invoicePlans.invoices.length;
      } else if (totalRow < 0) {
        let newRow = [];
        let numOfRow = $scope.project.no_of_invoice - totalInvoice;
        for (var i = 0; i < numOfRow; i++) {
          newRow.push({
            'index': totalInvoice + i,
            'invoice_date': '',
            'amount': 0,
            'percentage': 0
          });
        }
        $scope.invoicePlans.invoices.splice(-1, 0, ...newRow);
        totalInvoice = $scope.project.no_of_invoice;
        if ($scope.invoicePlans.invoices.length == 1) {
          $scope.invoicePlans.invoices[0].invoice_date = $scope.project.start_date;
        }
        if ($scope.invoicePlans.invoices[0].invoice_date == '') {
          $scope.invoicePlans.invoices[0].invoice_date = $scope.project.start_date;
        }
      }
    }
  
    $scope.handleSubmitInvoicePlan = () => {
      let data = {
        'invoice_data': $scope.invoicePlans,
        'no_of_invoice': $scope.project.no_of_invoice,
        'project_cost': $scope.project.project_cost
      }
      $http.post(`${API_URL}project`, {
          data: data,
          type: 'invoice_plan'
        })
        .then((res) => {
          Message('success', 'Invoice paln added successfully');
          $location.path('to-do-listing');
        })
    }
  });
  
  app.controller('ToDoListController', function($scope, $http, API_URL, $location) {
  
    $http.get(`${API_URL}project/wizard/create_project`)
      .then((res) => {
        projectActiveTabs(res.data.wizard_status);
      });
  
    $http.get(`${API_URL}get-delivery-type`).then((res) => {
      $scope.deliveryTypes = res.data;
    });
  
    $http.get(`${API_URL}admin/get-employee-by-slug/project_manager`).then((res) => {
      $scope.projectManagers = res.data;
    });
  
    $http.get(`${API_URL}get-project-session-id`).then((res) => {
      $scope.project_id = res.data;
      console.log("This is Current Session ID : ", $scope.project_id)
      var project_id = $scope.project_id;
      if (project_id != null) {
        $http.get(`${API_URL}get-project-type`).then((res) => {
          $scope.projectTypes = res.data;
        });
  
        $http.get(`${API_URL}project/${project_id}`).then((res) => {
          $scope.project = formatData(res.data);
          $scope.check_list_items = JSON.parse(res.data.gantt_chart_data) == null ? [] : JSON.parse(res.data.gantt_chart_data)
          $scope.check_list_items_status = JSON.parse(res.data.gantt_chart_data) == null ? false : true
        });
      }
    });
  
  
  
    // ======= $scope of Flow ==============
  
    $http.get(`${API_URL}admin/check-list-master-group`).then((res) => {
      $scope.check_list_master = res.data.data;
    })
  
  
    $scope.add_new_check_list_item = () => {
      if ($scope.check_list_type === undefined || $scope.check_list_type == '') return false
  
      // $scope.return   =    true
  
      // $scope.check_list_items.map(item => {``
      //     let atime   = item.data[1][0]
      //     if (atime.name == JSON.parse($scope.check_list_type).name) {
      //         $scope.return   = false
      //     }
      // });
  
      // if($scope.return   == false) return false
  
      $http.post(`${API_URL}admin/check-list-master-group`, {
        data: $scope.check_list_type,
        project_id: $scope.project_id
      }).then((res) => {
        $scope.check_list_items.push(res.data.data)
        console.log($scope.check_list_items)
      })
  
    };
  
    $scope.delete_this_check_list_item = (index) => $scope.check_list_items.splice(index, 1);
  
    $scope.storeToDoLists = () => {
  
      $scope.check_list_items.map((CheckLists) => {
  
        const CheckListsIndex = Object.entries(CheckLists.data);
  
        $scope.CallToDB = false;
  
        CheckListsIndex.map((TaskLists) => {
          const TaskListsIndex = TaskLists[1].data;
          TaskListsIndex.map((ListItems) => {
            if (ListItems.assign_to === undefined || ListItems.assign_to == '') {
              Message('danger', 'Assign To Field is  Required !');
              $scope.CallToDB = false;
              return false
            } else $scope.CallToDB = true;
            if (ListItems.start_date === undefined || ListItems.start_date == '') {
              Message('danger', 'Start Date Field is  Required !');
              $scope.CallToDB = false;
              return false
            } else $scope.CallToDB = true;
            if (ListItems.end_date === undefined || ListItems.end_date == '') {
              Message('danger', 'End Date Field is  Required !');
              $scope.CallToDB = false;
              return false
            } else $scope.CallToDB = true;
  
          });
        });
  
        if ($scope.CallToDB === true) {
          $http.post(`${$("#baseurl").val()}admin/store-to-do-list`, {
            id: $scope.project_id,
            update: $scope.check_list_items_status,
            data: $scope.check_list_items,
          }).then((res) => {
            if (res.data.status === true) {
              Message('success', 'To do List Added Success !');
              $location.path('project-scheduling')
            }
          })
        }
  
      });
  
    }
  });
  
  // live project milestone
  app.controller('milestoneController', function($scope, $http, API_URL, $rootScope) {
  
  
      let project_id = $('#project_id').val();
      console.log(project_id);
      //var project_id  = $('#project_id').val();
  
      var dp = new gantt.dataProcessor(`${API_URL}api/project/${project_id}`);
      dp.init(gantt);
      dp.setTransactionMode("REST");
  
      ganttModules.zoom.setZoom("months");
      gantt.init("gantt_here");
      ganttModules.menu.setup();
      gantt.load(`${API_URL}project/edit/${project_id}/project_scheduler`);
    
  
  });
  
  
  
  //Live project task list
  app.controller('TasklistController', function($scope, $http, API_URL, $location) {
  $scope.project_id = project_id;
    //$('#rasieTicketDetails').modal('hide');
    $("#rasieTicketDetails").modal('hide');
    $http.get(`${API_URL}admin/get-employee-by-slug/project_manager`).then((res) => {
      $scope.projectManagers = res.data;
    });
  
    $http.get(`${API_URL}get-project-session-id`).then((res) => {
      $scope.project_id = res.data;
      //console.log("This is Current Session ID : " , $scope.project_id)
      var project_id = $('#project_id').val();
  
      if (project_id != null) {
        $http.get(`${API_URL}admin/api/v2/get-live-project-type/` + project_id).then((res) => {
          console.log(res.data);
          $scope.projectTypes = res.data;
  
  
        });
  
        $http.get(`${API_URL}project/liveprojectlist/${project_id}`).then((res) => {
          //console.log(res);
  
          $scope.project = formatData(res.data.project);
          $scope.check_list_items = JSON.parse(res.data.project.gantt_chart_data) == null ? [] : JSON.parse(res.data.project.gantt_chart_data)
          $scope.check_list_items_status = JSON.parse(res.data.project.gantt_chart_data) == null ? false : true
          $scope.countper = res.data.completed == null ? [] : res.data.completed;
          $scope.overall = res.data.overall;
          $scope.lead = res.data.lead;
          //console.log(res.data.check_list_items );
  
  
        });
      }
  
  
  
  
      $scope.storeTaskLists = () => {
  
        $scope.check_list_items.map((CheckLists) => {
  
          const CheckListsIndex = Object.entries(CheckLists.data);
  
          $scope.CallToDB = false;
  
          CheckListsIndex.map((TaskLists) => {
  
  
  
            const TaskListsIndex = TaskLists[1].data;
            TaskListsIndex.map((ListItems) => {
  
  
  
              if (ListItems.assign_to === undefined || ListItems.assign_to == '') {
                Message('danger', 'Assign To Field is  Required !');
                $scope.CallToDB = false;
                return false
              } else $scope.CallToDB = true;
              if (ListItems.start_date === undefined || ListItems.start_date == '') {
                Message('danger', 'Start Date Field is  Required !');
                $scope.CallToDB = false;
                return false
              } else $scope.CallToDB = true;
              if (ListItems.end_date === undefined || ListItems.end_date == '') {
                Message('danger', 'End Date Field is  Required !');
                $scope.CallToDB = false;
                return false
              } else $scope.CallToDB = true;
              if (ListItems.delivery_date != undefined && ListItems.delivery_date != '') {
  
                if (ListItems.status == '') {
                  //console.log(ListItems.delivery_date);
                  Message('danger', 'Please select Status!');
                  $scope.CallToDB = false;
                  return false
                }
  
              } else $scope.CallToDB = true;
  
            });
          });
  
  
          if ($scope.CallToDB === true) {
  
  
            $http.post(`${$("#baseurl").val()}admin/api/v2/store-task-list`, {
              id: $('#project_id').val(),
              update: $scope.check_list_items_status,
              data: $scope.check_list_items,
            }).then((res) => {
  
              if (res.data.status === true) {
                Message('success', 'To do List Added Success !');
                $location.path('bim360')
              }
            })
          }
  
        });
  
      }
  
  
      $scope.storeTaskListsStatus = (statusValue) => {
  
        $scope.check_list_items.map((CheckLists) => {
  
          const CheckListsIndex = Object.entries(CheckLists.data);
  
          $scope.CallToDB = false;
          let isValidDate = [];
          CheckListsIndex.map((TaskLists) => {
            const TaskListsIndex = TaskLists[1].data;
            TaskListsIndex.map((ListItems) => {
              if(ListItems.status != undefined && ListItems.status == true ) {
                  // isValidDate.push(true);
                  if(ListItems.delivery_date == undefined || ListItems.delivery_date == '' ){
                    isValidDate.push(true);
                  }
              }
            });
          });
          //console.log(isValidDate);
          if(isValidDate.includes(true)){
            isValidDate.length = 0;
            Message('danger', 'Please select Delivery Date!');
           
            return false
          }else{
           
            $scope.CallToDB = true;
          }
  
          if ($scope.CallToDB === true) {
            $http.post(`${$("#baseurl").val()}admin/api/v2/store-task-list`, {
              id: $('#project_id').val(),
              update: $scope.check_list_items_status,
              data: $scope.check_list_items,
            }).then((res) => {
  
              if (res.data.status === true) {
                Message('success', 'Task List Updated !');
                $http.get(`${API_URL}project/liveprojectlist/${project_id}`).then((res) => {
                  $scope.project = formatData(res.data.project);
                  $scope.check_list_items = JSON.parse(res.data.project.gantt_chart_data) == null ? [] : JSON.parse(res.data.project.gantt_chart_data)
                  $scope.check_list_items_status = JSON.parse(res.data.project.gantt_chart_data) == null ? false : true
                  $scope.countper = res.data.completed == null ? [] : res.data.completed;
                  $scope.overall = res.data.overall;
                  $scope.lead = res.data.lead;
                });
              }
            })
          }
  
        });
  
  
      }


      $scope.storeTaskListsDeliverydate = (statusValue) => {
  
        $scope.check_list_items.map((CheckLists) => {
  
          const CheckListsIndex = Object.entries(CheckLists.data);
  
          $scope.CallToDB = false;
          let isValidDate = [];
          CheckListsIndex.map((TaskLists) => {
            const TaskListsIndex = TaskLists[1].data;
            TaskListsIndex.map((ListItems) => {
              if(ListItems.delivery_date != undefined && ListItems.delivery_date != '' ) {
                  // isValidDate.push(true);
                  if(ListItems.status == undefined || ListItems.status == false ){
                    isValidDate.push(true);
                  }
              }
            });
          });
          //console.log(isValidDate);
          if(isValidDate.includes(true)){
            isValidDate.length = 0;
            Message('danger', 'Please select Status !');
           
            return false
          }else{
           
            $scope.CallToDB = true;
          }
  
          if ($scope.CallToDB === true) {
            $http.post(`${$("#baseurl").val()}admin/api/v2/store-task-list`, {
              id: $('#project_id').val(),
              update: $scope.check_list_items_status,
              data: $scope.check_list_items,
            }).then((res) => {
  
              if (res.data.status === true) {
                Message('success', 'Task List Updated !');
                $http.get(`${API_URL}project/liveprojectlist/${project_id}`).then((res) => {
                  $scope.project = formatData(res.data.project);
                  $scope.check_list_items = JSON.parse(res.data.project.gantt_chart_data) == null ? [] : JSON.parse(res.data.project.gantt_chart_data)
                  $scope.check_list_items_status = JSON.parse(res.data.project.gantt_chart_data) == null ? false : true
                  $scope.countper = res.data.completed == null ? [] : res.data.completed;
                  $scope.overall = res.data.overall;
                  $scope.lead = res.data.lead;
                });
              }
            })
          }
  
        });
  
  
      }



    });
  
  
  
  
    // ======= $scope of Flow ==============
  
    $http.get(`${API_URL}admin/check-list-master-group`).then((res) => {
      $scope.check_list_master = res.data.data;
    })
  
  
    $scope.add_new_check_list_item = () => {
      if ($scope.check_list_type === undefined || $scope.check_list_type == '') return false
  
      // $scope.return   =    true
  
      // $scope.check_list_items.map(item => {``
      //     let atime   = item.data[1][0]
      //     if (atime.name == JSON.parse($scope.check_list_type).name) {
      //         $scope.return   = false
      //     }
      // });
  
      // if($scope.return   == false) return false
  
      $http.post(`${API_URL}admin/check-list-master-group`, {
        data: $scope.check_list_type
      }).then((res) => {
        $scope.check_list_items.push(res.data.data)
        console.log($scope.check_list_items)
      })
  
    };
  
    $scope.delete_this_check_list_item = (index) => $scope.check_list_items.splice(index, 1);
  
    $scope.storeToDoLists = () => {
  
      $scope.check_list_items.map((CheckLists) => {
  
        const CheckListsIndex = Object.entries(CheckLists.data);
  
        $scope.CallToDB = false;
  
        CheckListsIndex.map((TaskLists) => {
          const TaskListsIndex = TaskLists[1].data;
          TaskListsIndex.map((ListItems) => {
            if (ListItems.assign_to === undefined || ListItems.assign_to == '') {
              Message('danger', 'Assign To Field is  Required !');
              $scope.CallToDB = false;
              return false
            } else $scope.CallToDB = true;
            if (ListItems.start_date === undefined || ListItems.start_date == '') {
              Message('danger', 'Start Date Field is  Required !');
              $scope.CallToDB = false;
              return false
            } else $scope.CallToDB = true;
            if (ListItems.end_date === undefined || ListItems.end_date == '') {
              Message('danger', 'End Date Field is  Required !');
              $scope.CallToDB = false;
              return false
            } else $scope.CallToDB = true;
  
          });
        });
  
        if ($scope.CallToDB === true) {
          $http.post(`${$("#baseurl").val()}admin/store-to-do-list`, {
            id: $scope.project_id,
            update: $scope.check_list_items_status,
            data: $scope.check_list_items,
          }).then((res) => {
            if (res.data.status === true) {
              Message('success', 'To do List Added Success !');
              $location.path('project-scheduling')
            }
          })
        }
  
      });
  
    }
  });
  
  
  ///ticket wizard
  
  app.controller('TicketController', function($scope, $http, API_URL, $rootScope, $location, $timeout) { 
    $scope.autotrigger = function() {
      $('#flexRadioDefault1').click();
     
    }
  
    $scope.options = {
      locale: {
        cancelLabel: 'Clear'
      },
      showDropdowns: true,
      // singleDatePicker:true
    };
  
    // $scope.startDate = moment();
    // $scope.endDate = moment();
  
    
  
  
    let project_id = $('#project_id').val();
    $("#rasieTicketDetails").modal('hide');
  
    $scope.SelectFile = function(e) {
      // $window.alert();
      //console.log(e.target.files)
      // $window.alert();
      var form_data = new FormData();
      var totalfiles = document.getElementById('files').files.length;
      for (var index = 0; index < totalfiles; index++) {
        form_data.append("files[]", document.getElementById('files').files[index]);
      }
  
      $http({
        method: 'POST',
        url: `${API_URL}admin/live-project/add-image`,
        data: form_data,
        contentType: false,
        processData: false,
        headers: {
          'Content-Type': undefined
        },
      }).then(function successCallback(response) {
        // Store response data
        $scope.responses = response.data.name;
      });
  
    };
  
    $http.get(`${API_URL}admin/project/team/${project_id}/team_setup`)
      .then((res) => {
        var quotations = [];
        var arr = [];

       //console.log(res.data);
        $scope.teamSetups = res.data.emp.map((item) => {
          //console.log(item.first_name);
          quotations.push(item.first_name);
          arr.push(item.id+'-emp');
          
  
        })
        
        quotations.push(res.data.cus);
        arr.push(res.data.cusid+'-cus');
        var jsonData = [];
  
        for (var i = 0; i < quotations.length; i++) jsonData.push({
          id: arr[i],
          name: quotations[i]
        });
        //console.log(jsonData);
        var ms1 = $('#ms1').tagSuggest({
          data: jsonData,
          sortOrder: 'name',
          maxDropHeight: 200,
          name: 'ms1'
        });
      });
  
  
  
  
    // alert('ttt');
  
  
    $scope.ticket = {};
  
  
    $scope.getRxcui = function(value) {
      //console.log($scope.ticket.hours);
      $scope.result = Number($scope.ticket.hours || 0) * Number($scope.ticket.price || 0);
    }
    //editor load
    //$scope.orightml = '<h2>Try me!</h2><p>textAngular is a super cool WYSIWYG Text Editor directive for AngularJS</p><p><b>Features:</b></p><ol><li>Automatic Seamless Two-Way-Binding</li><li>Super Easy <b>Theming</b> Options</li><li style="color: green;">Simple Editor Instance Creation</li><li>Safely Parses Html for Custom Toolbar Icons</li><li class="text-danger">Doesn&apos;t Use an iFrame</li><li>Works with Firefox, Chrome, and IE8+</li></ol><p><b>Code at GitHub:</b> <a href="https://github.com/fraywing/textAngular">Here</a> </p>';
    //$scope.htmlcontent = $scope.orightml;
    //$scope.htmlcontent = $scope.orightml;
    //$scope.disabled = false;
  
    $scope.multilineToolbar = true;
  
    $scope.htmlEditorOptions = {
      bindingOptions: {
        'toolbar.multiline': 'multilineToolbar',
       
      },
      height: 725, 
      value: '',
      toolbar: {
        items: [
          'undo', 'redo', 'separator',
          {
            name: 'size',
            acceptedValues: ['8pt', '10pt', '12pt', '14pt', '18pt', '24pt', '36pt'],
          },
          {
            name: 'font',
            acceptedValues: ['Arial', 'Courier New', 'Georgia', 'Impact', 'Lucida Console', 'Tahoma', 'Times New Roman', 'Verdana'],
          },
          'separator', 'bold', 'italic', 'strike', 'underline', 'separator',
          'alignLeft', 'alignCenter', 'alignRight', 'alignJustify', 'separator',
          'orderedList', 'bulletList', 'separator',
          {
            name: 'header',
            acceptedValues: [false, 1, 2, 3, 4, 5],
          }, 'separator',
          'color', 'background', 'separator',
          'link', 'image', 'separator',
          'clear', 'separator'
        ],
      },
      mediaResizing: {
        enabled: true,
      },
    };

    $scope.Variationchanges = {
      bindingOptions: {
        'toolbar.multiline': 'multilineToolbar',
        
      },
      height: 725,
      value: '',
      id: 'variationchanges',
      toolbar: {
        items: [
          'undo', 'redo', 'separator',
          {
            name: 'size',
            acceptedValues: ['8pt', '10pt', '12pt', '14pt', '18pt', '24pt', '36pt'],
          },
          {
            name: 'font',
            acceptedValues: ['Arial', 'Courier New', 'Georgia', 'Impact', 'Lucida Console', 'Tahoma', 'Times New Roman', 'Verdana'],
          },
          'separator', 'bold', 'italic', 'strike', 'underline', 'separator',
          'alignLeft', 'alignCenter', 'alignRight', 'alignJustify', 'separator',
          'orderedList', 'bulletList', 'separator',
          {
            name: 'header',
            acceptedValues: [false, 1, 2, 3, 4, 5],
          }, 'separator',
          'color', 'background', 'separator',
          'link', 'image', 'separator',
          'clear', 'separator'
        ],
      },
      mediaResizing: {
        enabled: true,
      },
    };
  
    if (project_id != null) {
  
  
      $http.get(`${API_URL}project/${project_id}`).then((res) => {
  
  
        $scope.project = formatData(res.data);
  
        $scope.check_list_items = JSON.parse(res.data.gantt_chart_data) == null ? [] : JSON.parse(res.data.gantt_chart_data)
        $scope.check_list_items_status = JSON.parse(res.data.gantt_chart_data) == null ? false : true
  
      });
  
      $http.get(`${API_URL}admin/api/v2/projectticket/${project_id}`).then((res) => {
  
  
        $scope.ptickets = res.data.ticket == null ? [] : res.data.ticket
        $scope.customer = res.data.project == null ? false : res.data.project
        $scope.pticketcomment = res.data.ticketcase == null ? false : res.data.ticketcase
        $scope.overview = res.data.overview == null ? false : res.data.overview
        $scope.cols = res.data.showhide == null ? false : res.data.showhide
      });
  
  
    }
  
  
    $scope.ticket = {
      projectid: project_id,
    }
    console.log($scope.ticket);
  
  
    $scope.formSave = false;
  
    $scope.submitticketForm = function(formValid) {
      if(formValid == true) {
          $scope.formSave = true;
          return false;
      }
      var fd = new FormData();
      //console.log($scope.case)
      //console.log(fd);
  
      var image = $('#case_image').text();
      var project_id = $('#project_case').val();
      var assign = $('#example-select_project').find(":selected").val();
      var requester = $('.requested').find(":selected").text();
      var tag_input = $('#tag_input').val();
      
  
  
      $http.post(`${API_URL}admin/live-project/store-ticket-case`, {
        
          data: $scope.case,
          project_id: project_id,
          image: image,
          assign: assign,
          requester: requester,
          tag : tag_input
        })
        
        .then((res) => {

          Message('success', 'Issue Created Successfully');
          if (res.data.status == true && res.data.variation == true) {
            let variationticketid = res.data.titketid;
            $scope.case = '';
            $('#rasieTicketDetails').modal('hide');
            location.href = `${API_URL}admin/create-project-ticket/${project_id}-${variationticketid}`;
          } else if (res.data.status == true) {
            window.location.reload();
          }
          console.log(res.data.status);
          //$location.path('platform');
        })
  
  
      //console.log( $scope.case);
    }
  
    $scope.submitcreatevariationForm = () => {
      var id = $scope.ticket.projectid;
      var ticket_comment_id = $('#ticket_comment_id').val();
      //console.log(ticket_comment_id);
  
      var description = $(".dx-htmleditor-content").html();
      var variationchanges = $(".variationchanges ").html();

     
  
      $http.post(`${API_URL}admin/api/v2/live-project-ticket`, {
          data: $scope.ticket,
          type: 'create_project_ticket',
          description: description,
          variationchange: variationchanges,
          ticket_comment    : ticket_comment_id,
        })
        .then((res) => {
          Message('success', 'Ticket Created Successfully');
          if (res.data.status == true) {
            //$location.path('ticket');
            location.href = `${API_URL}admin/live-projects/${id}#!/tickets`;
          }
          console.log(res.data.status);
          //$location.path('platform');
        })
    }
    $scope.projectticketshow = (id) => {
  
      $http.get(`${API_URL}admin/api/v2/projectticketfind/${id}`).then((res) => {
  
        $scope.modelptickets = res.data.ticket == null ? [] : res.data.ticket
        $scope.modelcustomer = res.data.project == null ? false : res.data.project
        

  
        if (res.data.ticket != '') {
          $('#Variation_mdal-box').modal('show');
  
        }
  
  
  
  
      });
  
  
  
    }
  
  
    $scope.sendMailToCustomerticket = function(proposal_id, Vid) {
  
      $http.post(API_URL + 'admin/live-project/sendticket/send-mail-ticket/' + proposal_id + '/customerid/' + Vid).then(function(response) {
        Message('success', response.data.msg);
        // $scope.getWizradStatus();
        //$scope.getProposesalData();
      });
    }
  
    $scope.showCommentsToggle = function(modalstate, type, header, id) {
  
      $scope.modalstate = modalstate;
      $scope.module = null;
      $scope.chatHeader = header;
      $scope.id = id;
  
  
  
      switch (modalstate) {
  
        case 'viewConversations':
  
          $http.get(API_URL + 'admin/api/v2/live-project/show-ticket-comment/' + $scope.id + '/type/' + type).then(function(response) {
            $scope.commentsData = response.data.chatHistory;
            $scope.chatType = response.data.chatType;
            $scope.projectticket = response.data.projectticket;
            $scope.header = response.data.header;
  
            $('#viewTicketDetails').modal('show');
          });
          break;
        default:
          break;
      }
    }
    $scope.showTicketComments = function(id, type) {
      //console.log(type);
      $http.get(`${API_URL}admin/api/v2/projectticketsearch/${id}/${type}`).then((res) => {
        $scope.ptickets_model = res.data.ticket == null ? [] : res.data.ticket
        $scope.customer_model = res.data.project == null ? false : res.data.project;
        $scope.pticketcomment_model = res.data.ticketmodel == null ? false : res.data.ticketmodel;
        $scope.commentsData = res.data.chatHistory;
        $('#ticket_mdal-box').modal('show');
      });
    }
  
    $scope.sendprojectticketComments = function(type, chatSection) {
      $scope.sendCommentsData = {
        "comments": $scope.inlineComments,
        "project_ticket_id": $scope.id,
        "type": chatSection,
        "created_by": type,
        "role_by": `Cost Estimater ${type}`
      }
  
      $http({
        method: "POST",
        url: `${API_URL}admin/live-project/add-comments`,
        data: $.param($scope.sendCommentsData),
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        }
      }).then(function successCallback(response) {
        document.getElementById("Inbox__commentsForm").reset();
        $scope.showCommentsToggle('viewConversations', 'project_ticket_comment', chatSection, $scope.id);
        Message('success', response.data.msg);
      }, function errorCallback(response) {
        Message('danger', response.data.errors);
      });
    }
    $scope.ticket_type = function(value) {
      if (value == 'internal') {
        $('.customer_variation').css("display", "none")
        $http.get(`${API_URL}admin/get-employee-by-slug/project_manager/${value}/${project_id}`).then((res) => {
          $scope.projectManagers = res.data.team;
          $scope.Requester = [{
            id: res.data.user.id,
            first_name: res.data.user.first_name
          }];
        });
      } else {
        $http.get(`${API_URL}admin/get-employee-by-slug/project_manager/${value}/${project_id}`).then((res) => {
          $scope.projectManagers = [{
            id: res.data.user.id,
            first_name: res.data.user.first_name
          }];
          $scope.Requester = [{
            id: res.data.user.id,
            first_name: res.data.user.first_name
          }];
  
        });
  
  
        //$('#example-select_project option:eq(2)').prop('selected', true);
        //console.log($scope.projectManagers.length);
        $('.customer_variation').css("display", "block")
  
  
      }
  
    }
  
    $scope.deleteImageBtn = false;
  
    // ******* image show ******
    //  $scope.SelectFile = function (e) {
    //     alert('hello');
    //     var reader = new FileReader();
    //     reader.onload = function (e) {
    //         $scope.PreviewImage = e.target.result;
    //         $scope.deleteImageBtn = true;
  
    //         $scope.$apply();
    //     };
  
    //     reader.readAsDataURL(e.target.files[0]);
    // };
  
  
    $scope.upload = function() {
  
      //alert('kumar');
  
      var fd = new FormData();
      angular.forEach($scope.uploadfiles, function(file) {
        fd.append('file[]', file);
  
        console.log(fd);
  
      });
  
  
      $http({
        method: 'POST',
        url: `${API_URL}admin/live-project/add-image`,
        data: fd,
        headers: {
          'Content-Type': undefined
        },
      }).then(function successCallback(response) {
        // Store response data
        $scope.response = response.data;
      });
    }
  
    //search tale
    $scope.tablesearch = function(type) {
      // $scope.CallToDB = false;
      if ($scope.todate != 'Invalid Date' && $scope.fromdate === 'Invalid Date') {
        alert('hello');
        Message('danger', 'Please Select End Date');
        //$scope.CallToDB = false;
        return false
      }
  
      console.log();
      if (project_id != null && type == 'filtersearch') {
        $scope.filterData = {
          "id": project_id,
          "type": 'filtersearch',
          "duedate": $('#due_date').val(),
          "requesterdate": $('#requester_date').val(),
          "priority": $scope.priority,
          "status": $scope.status,
          "refno": $scope.refno,
          "tickettype": $scope.tickettype
        }
        $http({
          method: 'POST',
          url: `${API_URL}admin/api/v2/projectticketfiltersearch`,
          data: $.param($scope.filterData),
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          }
        }).then(function successCallback(res) {
          // Store response data
          $scope.ptickets = res.data.ticket == null ? [] : res.data.ticket
          $scope.customer = res.data.project == null ? false : res.data.project
          $scope.pticketcomment = res.data.ticketcase == null ? false : res.data.ticketcase
          $('#right-modal').modal('hide');
        });
        //console.log($.param($scope.filterData));
  
  
      } else if (project_id != null) {
        $http.get(`${API_URL}admin/api/v2/projectticketsearch/${project_id}/${type}`).then((res) => {
          $scope.ptickets = res.data.ticket == null ? [] : res.data.ticket
          $scope.customer = res.data.project == null ? false : res.data.project
          $scope.pticketcomment = res.data.ticketcase == null ? false : res.data.ticketcase
        });
      }
    }
  
  
  
  
    $scope.issuesreplaycomment = function(type, ticketid, project_id) {
      //console.log(project_id);
  
      $scope.sendCommentsData = {
        "comments": $scope.inlineComments,
        "project_ticket_id": ticketid,
        "project_id": project_id,
        "created_by": type,
        "role_by": `Cost Estimater ${type}`
      }
  
  
      $scope.CallToDB = false;
      if ($scope.inlineComments === undefined || $scope.inlineComments == '') {
        Message('danger', 'Your Issues comment is empty');
        $scope.CallToDB = false;
        return false
      }
      $http({
        method: "POST",
        url: `${API_URL}admin/live-project/replay-comments`,
        data: $.param($scope.sendCommentsData),
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        }
      }).then(function successCallback(response) {
        //document.getElementById("Inbox__commentsForm").reset();
        $scope.showCommentsToggle('viewConversations', 'project_ticket_comment', 'Ticket Comment', ticketid);
        Message('success', response.data.msg);
        $scope.inlineComments = '';
  
  
      }, function errorCallback(response) {
        Message('danger', response.data.errors);
      });
    }
  
    $scope.updateticketstatus = function(ticketid) {
      $scope.sendCommentsData = {
  
        "project_ticket_id": ticketid,
        "priority": $scope.header.priority,
        "project_status": $scope.header.status,
      }
  
      $scope.CallToDB = false;
      /* if (   $scope.ticked_update.priority === undefined ||   $scope.ticked_update.priority == '') {
           Message('danger', 'Please Select priority');
           $scope.CallToDB = false;
           return false
       }
       if (   $scope.ticked_update.status === undefined ||   $scope.ticked_update.status == '') {
           Message('danger', 'Please Select Status');
           $scope.CallToDB = false;
           return false
       }*/
      $http({
        method: "POST",
        url: `${API_URL}admin/live-project/replay-comments_update`,
        data: $.param($scope.sendCommentsData),
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        }
      }).then(function successCallback(response) {
        //document.getElementById("Inbox__commentsForm").reset();
        //$scope.showCommentsToggle('viewConversations', 'project_ticket_comment', chatSection,$scope.id);
        Message('success', response.data.msg);
        window.location.reload();
      }, function errorCallback(response) {
        Message('danger', response.data.errors);
      });
  
    }
  
    $scope.ticketdelete = function(ticketid) {
  
      Swal.fire({
        title: `Are you sure want to Delete ?`,
        showDenyButton: false,
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonText: 'Yes',
      }).then((result) => {
        if (result.isConfirmed) {
          $http.get(`${API_URL}admin/api/v2/projectticketdelete/${ticketid}`).then((res) => {
            Message('success', res.data.msg);
            window.location.reload();
  
  
          }, function errorCallback(res) {
            Message('danger', res.data.errors);
          });
        }
      });
    }
  
    $scope.discardticket = function() {
      window.location.reload();
      //$('#rasieTicketDetails').modal('hide');
    }
    $scope.showhide = function() {
      console.log($scope);
    }
  
  
  
  
  });
  
  
  app.controller('GendralController', function($scope, $http, API_URL, $timeout, $location) {
    let project_id = $('#project_id').val();
    $scope.projectId = project_id;
  
    $scope.multilineToolbar = true;
  
    $scope.htmlEditorOptions = {
      bindingOptions: {
        'toolbar.multiline': 'multilineToolbar',
      },
      height: 725,
      value: '',
      toolbar: {
        items: [
          'undo', 'redo', 'separator',
          {
            name: 'size',
            acceptedValues: ['8pt', '10pt', '12pt', '14pt', '18pt', '24pt', '36pt'],
          },
          {
            name: 'font',
            acceptedValues: ['Arial', 'Courier New', 'Georgia', 'Impact', 'Lucida Console', 'Tahoma', 'Times New Roman', 'Verdana'],
          },
          'separator', 'bold', 'italic', 'strike', 'underline', 'separator',
          'alignLeft', 'alignCenter', 'alignRight', 'alignJustify', 'separator',
          'orderedList', 'bulletList', 'separator',
          {
            name: 'header',
            acceptedValues: [false, 1, 2, 3, 4, 5],
          }, 'separator',
          'color', 'background', 'separator',
          'link', 'image', 'separator',
          'clear', 'codeBlock', 'blockquote',
        ],
      },
      mediaResizing: {
        enabled: true,
      },
    };
  
  
    $scope.submitgeneralinfo = () => {

      Swal.fire({
        title: `Do you want to complete the project?`,
        showDenyButton: false,
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonText: 'Yes',
      }).then((result) => {
        if (result.isConfirmed) {
         
      $http({
        method: 'POST',
        url: `${API_URL}admin/live-project/store-notes`,
        data: {
          project_id: project_id,
          'data': $(".dx-htmleditor-content").html()
        }
      }).then(function(res) {
        $location.path('/review');
        Message('success', `Notes added successfully`);
      }, function(error) {
  
        Message('danger', `General info ${error}`);
  
      });
        }
      });



    }

    $scope.storegeneralinfo = () => {

      Swal.fire({
        title: `Saved successfully`,
        showDenyButton: false,
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonText: 'Yes',
      }).then((result) => {
        if (result.isConfirmed) {
         
      $http({
        method: 'POST',
        url: `${API_URL}admin/live-project/store-notes`,
        data: {
          project_id: project_id,
          'data': $(".dx-htmleditor-content").html()
        }
      }).then(function(res) {
        $location.path('/review');
        Message('success', `Notes added successfully`);
      }, function(error) {
  
        Message('danger', `General info ${error}`);
  
      });
        }
      });



    }
  
  
  });
  app.controller('ReviewAndSubmit', function($scope, $http, API_URL, $timeout) {
  
    $http.get(`${API_URL}project/wizard/create_project`)
      .then((res) => {
        $scope.project = formatData(res.data);
        projectActiveTabs($scope.project.wizard_status);
      });
  
    $http.get(`${API_URL}get-project-session-id`).then((res) => {
      $scope.project_id = res.data;
      var project_id = $scope.project_id;
      let fileSystem = [];
      $scope.teamSetups = [];
  
      $http.get(`${API_URL}admin/get-employee-by-slug/project_manager`).then((res) => {
        $scope.projectManagers = res.data;
      });
      $http.get(`${API_URL}project/overview/${project_id}`).then((res) => {
        let connect_platform_access = res.data.connect_platform_access;
        if (connect_platform_access.sharepoint_status == 1) {
          $("#switch0").prop('checked', true);
        }
        if (connect_platform_access.bim_status == 1) {
          $("#switch1").prop('checked', true);
        }
        if (connect_platform_access.tf_office_status == 1) {
          $("#switch2").prop('checked', true);
        }
        $scope.review = res.data;
        $scope.teamSetups = res.data.team_setup;
        $scope.project = formatData(res.data.project);
        $scope.project['address_one'] = res.data.project.site_address;
        $scope.check_list_items = JSON.parse(res.data.gantt_chart_data) == null ? [] : JSON.parse(res.data.gantt_chart_data)
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
            items: [{
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
    });
  
  
    $scope.submitProject = (e) => {
      e.preventDefault();
      $http.post(`${API_URL}project`, {
          data: '',
          type: 'review_and_submit'
        })
        .then((res) => {
          $timeout(function() {
            window.onbeforeunload = null;
          });
          if (res.data.status == true) {
            Swal.fire({
              icon: 'success',
              html: `<h3>Project Established Successfully..!!</h3>`,
              showConfirmButton: false,
              timer: 3000
            });
            $timeout(() => {
              location.href = `${API_URL}admin/list-projects`;
            }, 3000);
          }
        })
    }
  
    $scope.saveProject = (e) => {
      e.preventDefault();
      $http.post(`${API_URL}project`, {
          data: '',
          type: 'review_and_save'
        })
        .then((res) => {
          $timeout(function() {
            window.onbeforeunload = null;
          });
          if (res.data.status == true) {
            Swal.fire({
              html: `<h3>Project Saved Successfully </br> Do you want to leave the page ?</h3>`,
              showDenyButton: false,
              showCancelButton: true,
              cancelButtonText: 'No',
              confirmButtonText: 'Yes',
              icon: 'question',
            }).then((result) => {
              if (result.isConfirmed) {
                location.href = `${API_URL}admin/list-projects`;
              }
            });
          }
        })
    }
  
  });
  
  app.directive('calculateAmount', ['$http', function($http, $scope, $apply) {
    return {
      restrict: 'A',
      link: function(scope, element, attrs) {
        element.on('change', function() {
          if (invoicePlan.percentage > 100) {
            invoicePlan.percentage = 100;
          }
          if (invoicePlan.percentage < 0) {
            invoicePlan.percentage = 1;
          }
          scope.invoicePlans.totalPercentage = 100;
          scope.invoicePlans.totalAmount = 0;
          let result = {};
          let projectCost = scope.project.project_cost;
          let invoices = scope.invoicePlans.invoices.map((invoicePlan, index) => {
            if (scope.project.no_of_invoice == index + 1) {
              projectCost -= scope.invoicePlans.totalAmount;
              return {
                index: index + 1,
                amount: Number.parseFloat(projectCost).toFixed(2),
                invoice_date: invoicePlan.invoice_date,
                percentage: scope.invoicePlans.totalPercentage,
              }
            }
            let totalPercentage = scope.invoicePlans.totalPercentage - invoicePlan.percentage;
            if (totalPercentage < 0) {
              return {
                index: index + 1,
                amount: 0,
                invoice_date: invoicePlan.invoice_date,
                percentage: 0,
              };
            } else {
              scope.invoicePlans.totalPercentage -= invoicePlan.percentage;
              scope.invoicePlans.totalAmount += (scope.project.project_cost / 100) * invoicePlan.percentage;
              return {
                index: index + 1,
                amount: Number.parseFloat((scope.project.project_cost / 100) * invoicePlan.percentage).toFixed(2),
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
        scope.$watchGroup(['project.no_of_invoice', 'project.project_cost'], function() {
          let totalPercentage = 100;
          scope.invoicePlans.invoices = scope.invoicePlans.invoices.map((invoicePlan, index) => {
            if (scope.project.no_of_invoice == 1) {
              totalPercentage = 100;
              invoice_date = scope.project.start_date;
            } else if (scope.project.no_of_invoice != index + 1) {
              totalPercentage -= invoicePlan.percentage;
            }
            if (scope.project.no_of_invoice == index + 1) {
              return {
                index: index + 1,
                amount: Number.parseFloat((scope.project.project_cost / 100) * invoicePlan.percentage).toFixed(2),
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
  
  
  app.directive('getRoleUser', function getRoleUser($http, API_URL) {
    return {
      restrict: 'A',
      link: function(scope, element, attrs) {
        let selectedValues = Object.values(scope.teamSetups[attrs.value].team);
        $http.get(`${API_URL}admin/get-role-user/${scope.teamSetup.role.id}`).then((res) => {
          if (selectedValues) {
            scope.tagBox = {
              customTemplate: {
                dataSource: res.data.data,
                displayExpr: 'first_name',
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
  
  
  app.directive('fileModel', function($parse) {
    return {
      restrict: 'A',
      link: function(scope, element, attrs) {
        var model, modelSetter;
        attrs.$observe('fileModel', function(fileModel) {
          model = $parse(attrs.fileModel);
          modelSetter = model.assign;
        });
  
        element.bind('change', function() {
          scope.$apply(function() {
            modelSetter(scope.$parent, element[0].files[0]);
          });
        });
      }
    };
  });
  
  app.controller('InvoiceController', function($scope, $http, API_URL, $location) {
  
    let project_id = $('#project_id').val();
  
    $http.get(`${API_URL}project/overview/${project_id}`).then((res) => {
      $scope.review = res.data;
  
      //console.log($scope.review);
  
    })
    //console.log(project_id);
  
  });
  app.controller('OverviewController', function($scope, $http, API_URL, $location, $rootScope) {
    let project_id = $('#project_id').val();
    $http.get(`${API_URL}project/overview/${project_id}`).then((res) => {
      $scope.overview = res.data;
    })

    $http.get(`${API_URL}project/liveprojectlist/${project_id}`).then((res) => {
      
     
      $scope.countper = res.data.completed == null ? [] : res.data.completed;
      $scope.overall = res.data.overall;
      $scope.lead = res.data.lead;
      $scope.intervelday = res.data.intervelday;
      //console.log($scope.intervelday);
      var pname = [];
      var pnamevalue = [];
		  $scope.teamSetups = $scope.countper.map((item) => {
          //console.log(item.first_name);
          pname.push(item.name);
          pnamevalue.push(item.completed);
  
        })
        $scope.projectstag = pname;
        $scope.projectscompletetag = pnamevalue;
      console.log($scope.projectstag);
      var options = {
        series: [{
            data: $scope.projectscompletetag
        }],
        chart: {
            type: 'bar',
            height: 230
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories:   $scope.projectstag ,
        }
    };
    var chart = new ApexCharts(document.querySelector("#project-completion-chart"), options);
    chart.render();
    $scope.categories = res.data.categories;
    $scope.Series = res.data.series;
    console.log($scope.categories);

    $(function() {
      $('#estimated-utilized-chart').highcharts({
          chart: {
              zoomType: 'xy'
          },
          title: {
              text: ' '
          },
          xAxis: [{
              categories: $scope.categories,
              crosshair: true
          }],
          yAxis: [{ // Primary yAxis
              labels: {

              },
              title: {
                  text: '',
              }
          }, { // Secondary yAxis
              title: {
                  text: 'Estimated Hours',
              },
              labels: {
                  format: '{value}',
                  style: {
                      color: Highcharts.getOptions().colors[0]
                  }
              },
              opposite: true
          }],
          tooltip: {
              shared: true
          },
          plotOptions: {
              column: {
                  stacking: 'normal'
              }
          },
          credits: {
              enabled: false,
          },
          legend: {
              enabled: false
          },
          series: [{
              name: 'Overall hours ',
              type: 'column',
              stack: 1,
              yAxis: 1,
              data:  $scope.Series ,


          }, {
              name: 'Delay Hours',
              type: 'spline',
              data: $scope.intervelday,

          }]
      });
    });
    apexcharts.min.js
  });
    $http.get(`${API_URL}admin/api/v2/projectticket/${project_id}`).then((res) => {
      $scope.overviewinternal = res.data.internaloverview == null ? false : res.data.internaloverview
      $scope.overviewcustomer = res.data.customeroverview == null ? false : res.data.customeroverview
      $scope.overview         = res.data.overview == null ? false : res.data.overview 
      console.log($scope.overview);
      const project_status = document.getElementById('project-status').getContext('2d');

      const data = {
          labels: ['New', 'Open', 'Closed','Pending'],
          datasets: [{
              label: 'Dataset 1',
              data: [$scope.overview.new, $scope.overview.open, $scope.overview.close,$scope.overview.pending],
              backgroundColor: ["#20CF98", "#FDBC2A", "#F85A7E"]
          }]
      };
      const config = new Chart(project_status, {
          type: 'doughnut',
          data: data,
          options: {
              responsive: true,
              legend: {
                  display: true
              },
              title: {
                  display: true,
                  text: ' '
              },
          },
      });

      var data2 = {
          datasets: [{
              data: [34, 66],
              backgroundColor: [
                  "#20CF98",
                  "#eee",
              ]
          }]
      };

      var ctx = document.getElementById("budgetChart");

      // And for a doughnut chart
      var myDoughnutChart = new Chart(ctx, {
          type: 'doughnut',
          data: data2,
          options: {
              rotation: 1 * Math.PI,
              circumference: 1 * Math.PI,
              responsive: true,
              legend: {
                  display: false
              },
              title: {
                  display: false,
                  text: 'Project Tasks'
              },
          }
      });
  
      //console.log($scope.overviewinternal);
     
    });

    //projecttask

    $scope.completiontask = (type) => {
      $('#project-completion-chart').empty();

      $http.get(`${API_URL}project/overview/${project_id}`).then((res) => {
        $scope.overview = res.data;
      })
  
      $http.get(`${API_URL}project/searchchart/${project_id}/${type}`).then((res) => {
        
       
        $scope.countper = res.data.completed == null ? [] : res.data.completed;
        $scope.overall = res.data.overall;
        $scope.lead = res.data.lead;
        var pname = [];
        var pnamevalue = [];
        $scope.teamSetups = $scope.countper.map((item) => {
            //console.log(item.first_name);
            pname.push(item.name);
            pnamevalue.push(item.completed);
    
          })
          $scope.projectstag = pname;
          $scope.projectscompletetag = pnamevalue;
        //console.log($scope.projectstag);
        var options = {
          series: [{
              data: $scope.projectscompletetag
          }],
          chart: {
              type: 'bar',
              height: 230
          },
          plotOptions: {
              bar: {
                  borderRadius: 4,
                  horizontal: true,
              }
          },
          dataLabels: {
              enabled: false
          },
          xaxis: {
              categories:   $scope.projectstag ,
          }
      };
      var chart = new ApexCharts(document.querySelector("#project-completion-chart"), options);
      chart.render();
      
  
    
      //apexcharts.min.js
    });
      //alert(type);

    }


  });
 

  
  
  
  // app.directive('ngFile', ['$parse', function ($parse) {
  //     return {
  //      restrict: 'A',
  //      link: function(scope, element, attrs) {
  //       element.bind('change', function(){
  
  //        $parse(attrs.ngFile).assign(scope,element[0].files)
  //        scope.$apply();
  //        var fd = new FormData();
  //         fd.append('file', file);
  
  //        $http({
  //           method: 'POST',
  //           url: `${API_URL}admin/live-project/add-image`,
  //           data: fd,
  //           headers: {'Content-Type': undefined},
  //         }).then(function successCallback(response) {  
  //           // Store response data
  //           $scope.response = response.data;
  //         });
  //       });
  //      }
  //     };
  // }]);