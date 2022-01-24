
app.controller('EnqController', function ($scope, $http, API_URL) {
    getData = function($http, API_URL) {
        $http({
            method: 'GET',
            url: API_URL + "admin/api/v2/customers-enquiry"
        }).then(function (response) {
            $scope.module_get = response.data;
        }, function (error) {
            console.log(error);
        });
    } 
    getData($http, API_URL);
    
    $scope.fiterData = function () {
        
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
                $('#right-modal-progress').modal('show');
                break;
            case 'edit':
                $scope.form_title = "Edit an Update";
                $scope.form_color = "success";
                $scope.id = id;
                angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                $http.get(API_URL + 'admin/api/v2/customers-enquiry/' + id )

                    .then(function (response) {
                        
                        $scope.enqData = response.data;

                        console.log( $scope.enqData);

                        $('#right-modal-progress').modal('show');

                        angular.element(document.querySelector("#loader")).addClass("d-none"); 
                        
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

                $('#right-modal-progress').modal('hide');


                Message('success', response.data.msg);

            }), (function (error) {
                console.log(error);
                console.log('This is embarassing. An error has occurred. Please check the log for details');
            });
        }
        
    }

}); 