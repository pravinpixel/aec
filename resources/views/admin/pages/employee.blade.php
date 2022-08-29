<!doctype html>
    <html ng-app="app">
      <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>

      </head>
      <body>
        <div ng-controller="FormCtrl">
        <form class="needs-validations"  novalidate name="module" >
                                
            <div class="row m-0">
            
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" >First name<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control"  name="name" id="validationCustom02"  value=""   ng-model="epm_fname" placeholder="Type Here..." ng-required="true">
                    </div>
            </div>

            <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" >Image<sup class="text-danger">*</sup></label>
                        <label for="files">Select Image File</label>
                        <input type="file" class="form-control" id="file" ng-model="file" name="file" />
                    </div>
            </div>

            <div>@{{epm_fname}}</div>
            <div class="text-end mt-3">
                <button type="reset" class="btn btn-outline-danger "><i class="fa fa-ban "></i> Cancel</button>
                <button ng-click="submit()"class="btn btn-primary "><i class="fa fa-check-circle "></i> Send </button>
            </div>
        </form>
            </div>

         <script>
             
             var app = angular.module('app', []); 

                app.controller('FormCtrl', function ($scope, $http) {    

                     $scope.epm_fname = "dfsdfdsfdf";
                    console.log( document.getElementById('file').files[0]);
                    $scope.submit = function () {
                        
                            var formData = new FormData();
                            formData.append('name',  $scope.epm_fname);
                            formData.append('file',   document.getElementById('file').files[0]);
                            for(let [name, value] of formData) {
                                alert(`${name} = ${value}`); // key1 = value1, then key2 = value2
                            }
                            url="dummyEmployee";                                
                        $http({
                            method: "POST",
                            url:  url,
                            // data: $.param($scope.module),
                            data: formData,
                            headers: { 'Content-Type': undefined},
                            transformRequest: angular.identity
                            
                        }).then(function (response) {
                            // $scope.getItems();

                            alert(JSON.stringify(response))

                        });
                     }  

                });

          </script>


      </body>
    </html>
