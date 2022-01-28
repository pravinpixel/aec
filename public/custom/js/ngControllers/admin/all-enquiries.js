app.controller('EnqController', function ($scope, $http, API_URL) {
            
    //fetch users listing from 
    
    getData = function($http, API_URL) {

        angular.element(document.querySelector("#loader")).removeClass("d-none"); 
    
        $http({
            method: 'GET',
            url: API_URL + "admin/api/v2/customers-enquiry"
        }).then(function (response) {

            // angular.element(document.querySelector("#loader")).addClass("d-none");
            
            $scope.module_get = response.data;
               
        }, function (error) {
            console.log(error);
            console.log('This is embarassing. An error has occurred. Please check the log for details');
        });
    } 
    getData($http, API_URL);
    //delete record
    
    $scope.fiterData = function () {
            
            // admin/api/v2/customers-enquiry
        
        var url = API_URL + "admin/api/v2/customers-enquiry" 

        var FormData = {
            from_date   :   $scope.filter.from_date,
            to_date     :   $scope.filter.to_date,
            status      :   $scope.filter.status,
            type        :   $scope.filter.type,
            others      :   $scope.filter.others
        }
        alert( $scope.filter.from_date, 'DD/MM/YY');

        $http({
            method: "POST",
            url: url,
            data: $.param(FormData),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

            }).then(function (response) {
                
            // getData($http, API_URL);
            $scope.module_get = response.data;	

            Message('success',response.msg);

            }), (function (error) {
                console.log(error);
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
        
        }
        // getData($http, API_URL);
    // getMenuData($http, API_URL);

    $scope.checkIt = function (index , id) {

        var url = API_URL + "module" + "/status";
        // getData($http, API_URL);

        if (id) {

            url += "admin/api/v2/customers-enquiry/" + id;
            method = "PUT";

            $http({
                method: method,
                url: url,
                data: $.param({'is_active':0}),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

            }).then(function (response) {
                
                getData($http, API_URL);

                Message('success',response.data.msg);

            }), (function (error) {
                console.log(error);
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });

        }
    }

        
    //show modal form
    $scope.toggle = function (modalstate, id) {
        $scope.modalstate = modalstate;
        $scope.module = null;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Create New";
                $scope.form_color = "primary";
                $('#enquiry-qucik-view-model').modal('show');
                break;
            case 'edit':
                $scope.form_title = "Edit an Update";
                $scope.form_color = "success";
                $scope.id = id;
                angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + id )

                    .then(function (response) {
                        $scope.enquiry_number       = response.data.enquiry_number;
                        $scope.enquiry_comments     = response.data.enquiry_comments;
                        $scope.enquiry_id           = response.data.enquiry_id;
                        $scope.customer_info        = response.data.customer_info;
                        $scope.project_info         = response.data.project_info;
                        $scope.services             = response.data.services;
                        $scope.ifc_model_uploads    = response.data.ifc_model_uploads;
                        $scope.building_components  = response.data.building_component;
                        $scope.additional_infos     = response.data.additional_infos;
                        $scope.enqData = response.data;
                        $('#enquiry-qucik-view-model').modal('show');
                    });
                
                
                break;
            
            default:
                break;
        } 
        
    }

    //save new record and update existing record
    $scope.save = function (modalstate, id) {
        
        var url = API_URL + "module";
        var method = "POST";

        //append module id to the URL if the form is in edit mode
        if (modalstate === 'edit') {
            url += "/" + id;
            method = "PUT";

            $http({
                method: method,
                url: url,
                data: $.param($scope.module),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

            }).then(function (response) {
                    
                getData($http, API_URL);

                    $('#right-modal-progress').modal('hide');

                    Message('success',response.data.msg);

            }), (function (error) {
                console.log(error);
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });

        }else {

            $http({
                method: method,
                url: url,
                data: $.param($scope.module),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

            }).then(function (response) {
                    
                getData($http, API_URL);

                //location.reload();

                $('#enquiry-qucik-view-model').modal('hide');


                Message('success', response.data.msg);

            }), (function (error) {
                console.log(error);
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
        }
        
    } 
     
    $scope.showCommentsToggle = function (modalstate, type, header) {
        $scope.modalstate = modalstate;
        $scope.module = null;
        $scope.chatHeader   = header; 
        switch (modalstate) {
            case 'viewConversations':
                $http.get(API_URL + 'admin/show-comments/'+$scope.enquiry_id+'/type/'+type ).then(function (response) {
                    $scope.commentsData = response.data.chatHistory; 
                    $scope.chatType     = response.data.chatType;  
                    $('#viewConversations-modal').modal('show');
                });
                break;
            default:
                break;
        } 
    }
    // $scope.GetCommentsData();

     
    $scope.sendInboxComments  = function(type) { 
        $scope.sendCommentsData = {
            "comments"        :   $scope.inlineComments,
            "enquiry_id"      :   $scope.enquiry_id,
            "type"            :   $scope.chatType,
            "created_by"      :   type,
        }
    
        $http({
            method: "POST",
            url:  API_URL + 'admin/add-comments' ,
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
    
    $scope.sendComments  = function(type, created_by) { 
        $scope.sendCommentsData = {
            "comments"        :   $scope[`${type}__comments`],
            "enquiry_id"      :   $scope.enquiry_id,
            "type"            :   type,
            "created_by"      :   created_by,
        }
      
        $http({
            method: "POST",
            url:  API_URL + 'admin/add-comments' ,
            data: $.param($scope.sendCommentsData),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded' 
            }
        }).then(function successCallback(response) {
            document.getElementById(`${type}__commentsForm`).reset();
            // $scope.GetCommentsData();
            Message('success',response.data.msg);
        }, function errorCallback(response) {
            Message('danger',response.data.errors);
        });
    }
}); 