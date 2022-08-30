app.controller('projectController', function ($scope, $http, API_URL, $compile) {
      
    $scope.projectTypes = [];
    $http.get(`${API_URL}get-project-type`).then((res) => {  $scope.projectTypes = res.data; });
    $http.get(`${API_URL}admin/get-employee-by-slug/project_manager`).then((res)=> {
        $scope.projectManagers = res.data;
    });
    formatData = (project) => {
        return {...project, ...{'start_date': new Date(project.start_date), 'delivery_date' : new Date(project.start_date)}}
    }

    var unestablish = $('#unestablished-table').DataTable({
        aaSorting     : [[0, 'desc']],
        responsive: true,
        processing: true,    
        pageLength: 50,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        serverSide: true,
        ajax          : {
            url     :  API_URL +'admin/project-unestablished-list',
            dataType: 'json',
            data: function (d) {
                d.from_date      = $scope.from_date;
                d.to_date        = $scope.to_date;
                d.project_type   = $scope.project_type;
            }
        },
        columns       : [
            {data: 'reference_number', name: 'reference_number'},
            {data: 'company_name', name: 'company_name'},
            {data: 'project_name', name: 'project_name'},
            {data: 'contact_person', name: 'contact_person'},
            {data: 'start_date', name: 'start_date'},
            {data: 'delivery_date', name: 'delivery_date'},
            {data: 'pipeline', name: 'pipeline'},
            {
                data         : 'action', name: 'action', orderable: false, searchable: false,
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                    $("a", nTd).tooltip({container: 'body'});
                }
            }
        ],
        rowCallback: function( row, data ) {
           if(data.is_new_project == 1){
                $(row).addClass('active-table-row');
           }
        },
        createdRow: function ( row, data, index ) {
            $compile(row)($scope);  //add this to compile the DOM
        }
    });

    var live = $('#live-project-table').DataTable({
        aaSorting     : [[0, 'desc']],
        responsive: true,
        processing: true,    
        pageLength: 50,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        serverSide: true,
        ajax          : {
            url     :  API_URL +'admin/project-live-list',
            dataType: 'json',
            data: function (d) {
              d.from_date      = $scope.from_date;
              d.to_date        = $scope.to_date;
              d.project_type   = $scope.project_type;
            }
        },
        columns       : [
            {data: 'reference_number', name: 'reference_number'},
            {data: 'company_name', name: 'company_name'},
            {data: 'project_name', name: 'project_name'},
            {data: 'contact_person', name: 'contact_person'},
            {data: 'start_date', name: 'start_date'},
            {data: 'delivery_date', name: 'delivery_date'},
            {data: 'pipeline', name: 'pipeline'},
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
        },
        createdRow: function ( row, data, index ) {
            $compile(row)($scope);  //add this to compile the DOM
        }
    });

    $http({
        method: 'GET',
        url: API_URL+'admin/get-project-count',
    }).then(function (res){ 
        $("#project-unestablished-count").html(res.data.unestablishedCount);
    }, function (error) {
        console.log('get project type error');
    });

    $scope.projectFilter = () => {
        $scope.from_date = $("#from_date").val();
        $scope.to_date = $("#to_date").val();
        unestablish.draw();
        live.draw();
        $scope.from_date = '';
        $scope.to_date = '';
        $scope.project_type = '';
        $("#project-filter-modal").modal('hide');
    }

    $scope.getQuickProject = (title, id) => {
        
       //console.log(title);
       if(title != ''){
        $(".quickview").removeClass("show");
        $("."+title).attr("aria-expanded","true");
        $("#"+title).addClass("show");

       }

        $http.get(`${API_URL}admin/get-employee-by-slug/project_manager`).then((res) => {
            $scope.projectManagers = res.data;
            
        });
        $http.get(`${API_URL}admin/api/v2/get-live-project-type/` + id).then((res) => {
            //console.log(res.data);
            $scope.projectTypes = res.data;

        });
        $http.get(`${API_URL}project/liveprojectlist/${id}`).then((res) => {
            //console.log(res);

            $scope.project = formatData(res.data.project);
            
            $scope.countper =res.data.completed == null ? [] : res.data.completed;
            $scope.overall = res.data.overall;
            $scope.lead = res.data.lead;
            //console.log(res.data.overall );
           
            
        });


        $http.get(`${API_URL}project/${id}`).then((res) => {

            $scope.project = formatData(res.data);
            //console.log(res.data.gantt_chart_data);
            $scope.check_list_items = JSON.parse(res.data.gantt_chart_data) == null ? [] : JSON.parse(res.data.gantt_chart_data)
            $scope.check_list_items_status = JSON.parse(res.data.gantt_chart_data) == null ? false : true

        });

        $http.get(`${API_URL}admin/api/v2/projectticket/${id}`).then((res) => {
            //console.log('raj');

          
            $scope.ptickets = res.data.ticket == null ? [] : res.data.ticket
            $scope.customer = res.data.project == null ? false : res.data.project
            $scope.pticketcomment = res.data.ticketcase == null ? false : res.data.ticketcase
        });
        $http.get(`${API_URL}admin/api/v2/liveprojectnote/${id}`).then((res) => {
            
            // $scope.notes = res.data == null ? [] :res.data;
            
            $scope.htmlEditorOptions = {
                height: 300,
                value: res.data.notes,
                contentEditable: false,
                mediaResizing: {
                enabled: true,
                },
            };
           
        });

        $http.get(`${API_URL}project/overview/${id}`).then((res)=> {
            $scope.review  =  res.data;
            //console.log( $scope.review);
            $scope.teamSetups = res.data.team_setup;
            $scope.project_active_comments = res.data.project_active_comments;
            $scope.project_comments = res.data.project_comments;
            console.log( $scope.project_active_comments);
            
            $scope.project = formatData(res.data.project);
            $scope.project['address_one'] =  res.data.project.site_address;
            $scope.check_list_items     =   JSON.parse(res.data.gantt_chart_data)  == null ? [] :  JSON.parse(res.data.gantt_chart_data)
            fileSystem = res.data.sharepoint;
            var dp = new gantt.dataProcessor(`${API_URL}api/project/${id}`);
            //console.log(dp);
        dp.init(gantt);
        dp.setTransactionMode("REST");

        ganttModules.zoom.setZoom("months");
        gantt.init("gantt_here");
        ganttModules.menu.setup();
        gantt.load(`${API_URL}project/edit/${id}/project_scheduler`);
        $("#project-quick-modal-view").modal('show');  
        }); 
        $scope.sendComments  = function(type, created_by, seen_id) { 
          
            $scope.sendCommentsData = {
                "comments"        :   $scope[`${type}__comments`],
                "project_id"      :   id,
                "type"            :   type,
                "created_by"      :   created_by,
                "seen_by"         :   1,
                "send_by"         :   seen_id,
            } 
            $http({
                method: "POST",
                url:  API_URL + 'admin/add-project-comments', 
                data: $.param($scope.sendCommentsData),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded' 
                }
            }).then(function successCallback(response) {
                console.log(type);
                if(type == 'building_components'){
                    document.getElementById(`building_component__commentsForm`).reset();
                }
                document.getElementById(`${type}__commentsForm`).reset();
                getprojectCommentsCountById(id);
                getprojectActiveCommentsCountById(id);
                Message('success',response.data.msg);
            }, function errorCallback(response) {
                Message('danger',response.data.errors);
            });
        }
    
        $scope.showCommentsToggle = function (modalstate, type, header) {
           
            $scope.modalstate = modalstate;
            $scope.module = null;
            $scope.chatHeader   = header; 
            $scope.project_id =id;
            switch (modalstate) {
                case 'viewConversations':
                    $http.get(API_URL + 'admin/project-show-comments/'+$scope.project_id+'/type/'+type ).then(function (response) {
                        $scope.commentsData = response.data.chatHistory; 
                        
                        $scope.chatType     = response.data.chatType;  
                        $('#viewConversations-modal').modal('show');
                        getprojectCommentsCountById($scope.project_id);
                        getprojectActiveCommentsCountById($scope.project_id);
                    });
                    break;
                default:
                    break;
            } 
        }
        

        $scope.sendInboxComments  = function(type) {
            var login_id = $('#login_id').val();
            $scope.sendCommentsData = {
                "comments"        :   $scope.inlineComments,
                "project_id"      :   $scope.project_id,
                "type"            :   $scope.chatType,
                "created_by"      :   type,
                "seen_by"         :   1,
                "send_by"         :   login_id,
            }
            //console.log($scope.sendCommentsData);
            $http({
                method: "POST",
                url:  API_URL + 'admin/add-project-comments', 
                data: $.param($scope.sendCommentsData),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded' 
                }
            }).then(function successCallback(response) {
                document.getElementById("Inbox__commentsForm").reset();
                $scope.showCommentsToggle('viewConversations', $scope.chatType);
                Message('success',response.data.msg);
            }, function errorCallback(response) {
                Message('danger',response.data.errors);
            });
          }
        getprojectCommentsCountById = (id) => {
            $http({
                method: "get",
                url:  API_URL + 'admin/project-comments-count/'+id ,
            }).then(function successCallback(response) {
                $scope.enquiry_comments     = response.data;
            }, function errorCallback(response) {
                Message('danger',response.data.errors);
            });
        }
    
        getprojectActiveCommentsCountById = (id) => {
            $http({
                method: "get",
                url:  API_URL + 'admin/project-active-comments-count/'+id ,
            }).then(function successCallback(response) {
                $scope.enquiry_active_comments     = response.data;
            }, function errorCallback(response) {
                Message('danger',response.data.errors);
            });
        }
    
    }

}); 