var app = angular.module('App', ['ui-notification','ngRoute','textAngular','luegg.directives']).constant('API_URL', $("#baseurl").val());   
app.directive('loading',   ['$http' ,'$timeout' ,function ($http, $scope, $timeout) {  
    return {  
        restrict: 'A',  
        template: `            
            <div class="progress progress-loader">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
            </div>
        `,  
        link: function (scope, elm, attrs)  
        {  
            scope.isLoading = function () {   

                return $http.pendingRequests.length > 0;  
            };  

            var timestop;

            scope.counter = 0;

            scope.increment = function() {
                scope.counter++;
                // $scope.timeout = $timeout(scope.increment, 1000);
            };   
            
            var i;
            for(i = 0; i < 100; i++) {
                scope.counter++                
            }

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
 