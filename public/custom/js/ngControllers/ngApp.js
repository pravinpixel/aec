var app = angular.module('App', ['ngRoute','datatables','luegg.directives','textAngular','psi.sortable','dx']).constant('API_URL', $("#baseurl").val());
 
app.directive('deleteTemplate', function(API_URL ,$http){
    return {
        restrict: 'A',
        scope: {
            data: '=deleteTemplate',
        },
        link: function(scope, element, attrs) {
            element.on('click', function(){
                console.log(scope);
                if(scope.data.template == '' || scope.data.template == null || scope.data.template == 'undefined') {
                    Message('danger', 'Template field is required'); return false;
                }
                $http.delete(`${API_URL}admin/cost-estimate-template/${scope.data.template}`)
                .then(function successCallback(res){
                    console.log(scope);
                    if(res.data.status) {
                        if(scope.data.type =='wood') {
                            scope.$parent.$parent.costEstimateWoodTemplates = scope.$parent.$parent.costEstimateWoodTemplates.filter(object => {
                                return object.id !== scope.data.template;
                            });
                        } else {
                            scope.$parent.$parent.costEstimatePrecastTemplates = scope.$parent.$parent.costEstimatePrecastTemplates.filter(object => {
                                return object.id !== scope.data.template;
                            });
                        }
                        Message('success', res.data.msg);
                        return false;
                    }
                    Message('danger', res.data.msg);
                    return false;
                });
                scope.$apply();
            });
        }
    };
});

app.directive('overwriteTemplate', function(API_URL ,$http){
    return {
        restrict: 'A',
        scope: {
            data: '=overwriteTemplate',
        },
        link: function(scope, element, attrs) {
            element.on('click', function(){
                if(scope.data.template == '' || scope.data.template == null || scope.data.template == 'undefined') {
                    Message('danger', 'Template field is required'); return false;
                }
                if(scope.data.type == 'wood') {
                    var template = scope.$parent.CostEstimate;
                } else {
                    var template = scope.$parent.PrecastEstimate;
                }
                $http.put(`${API_URL}admin/cost-estimate-template/${scope.data.template}`, { template: template})
                .then(function successCallback(res){
                    if(res.data.status) {
                        if(scope.data.type =='wood') {
                            $http({
                                method: 'GET',
                                url: `${API_URL}admin/cost-estimate-wood-template`
                                }).then(function success(res) {
                                    scope.$parent.$parent.costEstimateWoodTemplates = res.data.data;
                                }, function error(response) {
                            });
                        } else {
                            $http({
                                method: 'GET',
                                url: `${API_URL}admin/cost-estimate-precast-template`
                                }).then(function success(res) {
                                    scope.$parent.$parent.costEstimatePrecastTemplates = res.data.data;
                                }, function error(response) {
                            });
                        }
                        Message('success', res.data.msg);
                        return false;
                    }
                    Message('danger', res.data.msg);
                    return false;
                });
               
            });
        }
    };
});

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

app.directive('getTotalComponentsDelete',   ['$http' ,function ($http, $scope,$apply) {  
    return {
        restrict: 'A',
        link : function (scope, element, attrs) {
            element.on('click', function () {
                var index       = scope.index;
                var secindex    = scope.secindex;
                scope.building_building[index].building_component_number.splice(secindex,1);

                let bcd = scope.building_building[index].building_component_number.map((item,i) => {
                    return item.sqfeet;
                }); 
                let result =  bcd.reduce(function(previousValue, currentValue){
                    if(typeof(previousValue) == 'undefined') {
                        previousValue = 0;
                    }
                    if(typeof(currentValue) == 'undefined') {
                        currentValue = 0;
                    }
                    return previousValue + currentValue
                }, 0);
                scope.building_building[index].total_component_area = result; 
                scope.$apply();
            });
        },
    };
}]);  

app.directive('getTotalComponents',   ['$http' ,function ($http, $scope,$apply) {  
    return {
        restrict: 'A',
        link : function (scope, element, attrs) {
            element.on('keyup', function () {
                if($("#_technical_").val() == 1) {
                    $(this).addClass('bg-info');
                } else {
                    $(this).addClass('bg-warning');
                }
                var index   = scope.index;
                let bcd = scope.building_building[index].building_component_number.map((item,i) => {
                    return item.sqfeet;
                }); 
                let result =  bcd.reduce(function(previousValue, currentValue){
                    if(typeof(previousValue) == 'undefined') {
                        previousValue = 0;
                    }
                    if(typeof(currentValue) == 'undefined') {
                        currentValue = 0;
                    }
                    return previousValue + currentValue
                }, 0);
                scope.building_building[index].total_component_area = result; 
                scope.$apply();
            });
        },
    };
}]);

app.directive('selectOnClick', ['$window', function ($window) {
    return function (scope, element, attrs) {
      element.bind('click', function () {
        if (!$window.getSelection().toString()) {
          this.setSelectionRange(0, this.value.length)
        }
      });
    };
}]);

app.directive('pris', function () {
    return {
        restrict: 'E',
        template: `{{ sumVal }}`,
        scope: {
            data: '=data',
            type: '=pristype'
        },
        link: function(scope, element, attrs) {
            scope.$watch('data', function(newVal, oldVal){
                console.log(scope);
                if(scope.type == 'detail'){
                    let prisVal =  scope.data.ComponentsTotals.Statistics.Sum;
                    scope.prisVal =  isNaN(prisVal) == false ? prisVal : 0;
                } 
                else if(scope.type == 'statistics') {
                    let prisVal = scope.data.ComponentsTotals.Statistics.Sum ;
                    scope.prisVal =  isNaN(prisVal) == false ? prisVal : 0;
                } else if(scope.type == 'cad') {
                    let prisVal = scope.data.ComponentsTotals.CadCam.PriceM2 ;
                    scope.prisVal =  isNaN(prisVal) == false ? prisVal : 0;
                } else if(scope.type == 'logistics') {
                    let prisVal = scope.data.ComponentsTotals.Logistics.Sum ;
                    scope.prisVal =  isNaN(prisVal) == false ? prisVal : 0;
                } else if(scope.type == 'totalcost') {
                    let prisVal = scope.data.ComponentsTotals.TotalCost.Sum ;
                    scope.prisVal =  isNaN(prisVal) == false ? prisVal : 0;
                }
            }, true);
            
        }
    };
});

app.directive('proposalStatus', function () {
    return {
        restrict: 'E',
        template: `<div ng-bind-html="status"></div>`,
        scope: {
            data: '=data',
        },
        link: function(scope, element, attrs) {
            scope.status = statusBadge(scope.data);
        }
    };
});

angular.module('psi.sortable', [])
    .value('psiSortableConfig', {
        placeholder: "placeholder",
        opacity: 0.8,
        axis: "y",
        helper: 'clone',
        forcePlaceholderSize: true
    })
    .directive("psiSortable", ['psiSortableConfig', '$log', function(psiSortableConfig, $log) {
        return {
        require: '?ngModel',
        link: function(scope, element, attrs, ngModel) {

            if(!ngModel) {
            $log.error('psiSortable needs a ng-model attribute!', element);
            return;
            }

            var opts = {};
            angular.extend(opts, psiSortableConfig);
            opts.update = update;

            // listen for changes on psiSortable attribute
            scope.$watch(attrs.psiSortable, function(newVal) {
            angular.forEach(newVal, function(value, key) {
                element.sortable('option', key, value);
            });
            }, true);

            // store the sortable index
            scope.$watch(attrs.ngModel+'.length', function() {
            element.children().each(function(i, elem) {
                jQuery(elem).attr('sortable-index', i);
            });
            });

            // jQuery sortable update callback
            function update(event, ui) {
            // get model
            var model = ngModel.$modelValue;
            // remember its length
            var modelLength = model.length;
            // rember html nodes
            var items = [];

            // loop through items in new order
            element.children().each(function(index) {
                var item = jQuery(this);

                // get old item index
                var oldIndex = parseInt(item.attr("sortable-index"), 10);

                // add item to the end of model
                model.push(model[oldIndex]);

                if(item.attr("sortable-index")) {
                // items in original order to restore dom
                items[oldIndex] = item;
                // and remove item from dom
                item.detach();
                }
            });

            model.splice(0, modelLength);

            // restore original dom order, so angular does not get confused
            element.append.apply(element, items);

            // notify angular of the change
            scope.$digest();
            }

            element.sortable(opts);
        }
        };
    }]);

// angular.module('psi.sortablex', [])
//     .value('psiSortableConfig', {
//         placeholder: "placeholder",
//         opacity: 1,
//         axis: "x",
//         helper: 'clone',
//         forcePlaceholderSize: true
//     })
//     .directive("psiSortablex", ['psiSortableConfig', '$log', function(psiSortableConfig, $log) {
//         return {
//         require: '?ngModel',
//         link: function(scope, element, attrs, ngModel) {

//             if(!ngModel) {
//             $log.error('psiSortable needs a ng-model attribute!', element);
//             return;
//             }

//             var opts = {};
//             angular.extend(opts, psiSortableConfig);
//             opts.update = update;

//             // listen for changes on psiSortable attribute
//             scope.$watch(attrs.psiSortable, function(newVal) {
//             angular.forEach(newVal, function(value, key) {
//                 element.sortable('option', key, value);
//             });
//             }, true);

//             // store the sortable index
//             scope.$watch(attrs.ngModel+'.length', function() {
//             element.children().each(function(i, elem) {
//                 console.log(i);
//                 jQuery(elem).attr('sortable-index', i);
//             });
//             });

//             // jQuery sortable update callback
//             function update(event, ui) {
//             // get model
//             var model = ngModel.$modelValue;
//             // remember its length
//             var modelLength = model.length;
//             // rember html nodes
//             var items = [];

//             // var Component = [];
//             // var ComponentLength = scope.CostEstimate.Components.length;

//             // loop through items in new order
//             element.children().each(function(index) {
//                 var item = jQuery(this);
             
//                 // get old item index
//                 var oldIndex = parseInt(item.attr("sortable-index"), 10);
//                 // console.log(oldIndex)
//                 // // add item to the end of model
              
//                 //     // console.log(item.Dynamics[oldIndex]);
//                 // Component.push(oldIndex);
            
                
//                 // console.log(scope.CostEstimate.Components) ;
    
//                 model.push(model[oldIndex]);

//                 if(item.attr("sortable-index")) {
//                 // items in original order to restore dom
//                 items[oldIndex] = item;
//                 // and remove item from dom
//                 item.detach();
//                 }
//             });
//             // var final = [];
//             // Component.forEach((index) => {
//             //     var comps = [];
//             //     scope.CostEstimate.Components.forEach((item) => {
//             //         comps.push(item.Dynamics[index]);
//             //     })
//             //     final.push(comps);
//             // })
//             // console.log('final',final);
//             // console.log(Component);
            
//             model.splice(0, modelLength);

//             // restore original dom order, so angular does not get confused
//             element.append.apply(element, items);

//             // notify angular of the change
//             scope.$digest();
//             }

//             element.sortable(opts);
//         }
//         };
//     }]);
app.config(function() {
    angular.lowercase = angular.$$lowercase;  
});

app.constant("isActiveConfig", {
    activeClass: "active"
});
app.directive("isActive", function($location, $rootScope, isActiveConfig) {
    return {
        restrict: "A",
        link: function(scope, element, attr) {
            if (element[0].nodeName.toLowerCase() !== "a") {
                return;
            }
            var locWatch = $rootScope.$on("$locationChangeSuccess", function(event, newUrl){
                var href = element.prop('href');
                if (newUrl !== href) {
                    attr.$removeClass(name);
                } else {
                    attr.$addClass(name);
                }
            });
            var name = attr.isActive || isActiveConfig.activeClass || "active";
            scope.$on("$destroy", locWatch);
        }
    }
});
