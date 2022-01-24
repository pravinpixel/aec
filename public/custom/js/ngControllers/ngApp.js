var app = angular.module('myApp', ['ngRoute','datatables']).constant('API_URL', $("#baseurl").val());

app.directive('loading',   ['$http' ,function ($http, $scope) {  
    return {  
        restrict: 'A',  
        template: `
            <div class="linear-activity">
                <div class="indeterminate"></div>
            </div>
        `,  
        link: function (scope, elm, attrs)  
        {  
            scope.isLoading = function () {   

                return $http.pendingRequests.length > 0;  
            };        
            scope.$watch(scope.isLoading, function (v){  
                if(v){  
                    elm.show();  
                }else{  
                    elm.hide();  
                }  
            });  
        }  
    };
}]);