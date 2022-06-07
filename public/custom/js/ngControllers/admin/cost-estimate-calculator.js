   app.controller('Cost_Estimate', function ($scope, $http, $timeout, API_URL) {
        $scope.editable = false;
        $scope.wood_estimate_edit_id = false;
        $scope.precast_estimate_edit_id = false;
        $scope.wood_estimate_name = '';
        $scope.precast_estimate_name = '';
        $scope.price_calculation = 'wood_engineering_estimation';
        $scope.EngineeringEstimate = [];
        const CostEstimate = {
            'type'     : 'Building Type 1',
            'totalArea': 0,
            'totalPris': 0,
            'totalSum' : 0,
           
            "Components" : [ 
                {
                    'building_component_id': '',
                    'type_id': '',
                    'DesignScope': 0,
                    "Component"     : "",
                    "Type"          : "", 
                    "sqm"           : "",
                    "Complexity"    : "", 
                    'Dynamics': [
                        {
                            "name":"Details",
                            "PriceM2"   : 0,
                            "Sum"       : 0
                        },
                        {
                            "name":"Statistics",
                            "PriceM2"   : 0, 
                            "Sum"       : 0, 
                        },
                        {
                            "name":"CadCam",
                            "PriceM2"   : 0,
                            "Sum"       : 0, 
                        }
                    ],
                    "TotalCost" : {
                        "PriceM2"   : 0, 
                        "Sum"       : 0, 
                    },
                    "Rib": {
                        "Sum" : ""
                    }
                }
            ],
            "ComponentsTotals" : {
                "sqm"           : '',
                "complexity"    : '', 
                'Dynamics': [
                    {
                        "name":"Details",
                        "PriceM2"   : 0,
                        "Sum"       : 0
                    },
                    {
                        "name":"Statistics",
                        "PriceM2"   : 0, 
                        "Sum"       : 0, 
                    },
                    {
                        "name":"CadCam",
                        "PriceM2"   : 0,
                        "Sum"       : 0, 
                    }
                ],
                "TotalCost" :{
                    "PriceM2"   : 0, 
                    "Sum"       : 0, 
                },
                "Rib": {
                    "Sum" : ""
                },
                "grandTotal"    : '', 
            },
        }
        $http.get(`${API_URL}get-cost-estimate-types`).then((res) => {
            $scope.costEstimateTypes = res.data;
        });
        $scope.EngineeringEstimate.push(CostEstimate);

        $scope.addDynamicColumn = (index, columnName) => {
            $scope.editable = false;
            if(columnName == '') return false;
            $scope.EngineeringEstimate[index].ComponentsTotals.Dynamics.push({
                    "name"   : columnName,
                    "PriceM2": 0,
                    "Sum"    : 0
            });

            $scope.EngineeringEstimate[index].Components.forEach( (Component) => {
                Component.Dynamics.push({
                    "name"   : columnName,
                    "PriceM2": 0,
                    "Sum"    : 0
                });
            });
            $scope.columnName = '';
        }

        $scope.deleteDynamic = (rootIndex, dynamicIndex) => {
            $scope.EngineeringEstimate[rootIndex].ComponentsTotals.Dynamics.splice(dynamicIndex, 1);

            $scope.EngineeringEstimate[rootIndex].Components.forEach( (Component) => {
                Component.Dynamics.splice(dynamicIndex, 1);
            });
        }

        $scope.addEngineeringEstimate = () => {
            $scope.EngineeringEstimate.push({
                'type'     : 'Building Type 1',
                'totalArea': 0,
                'totalPris': 0,
                'totalSum' : 0,
               
                "Components" : [ 
                    {
                        'building_component_id': '',
                        'type_id': '',
                        'DesignScope': 0,
                        "Component"     : "",
                        "Type"          : "", 
                        "sqm"           : "",
                        "Complexity"    : "", 
                        'Dynamics': [
                            {
                                "name":"Details",
                                "PriceM2"   : 0,
                                "Sum"       : 0
                            },
                            {
                                "name":"Statistics",
                                "PriceM2"   : 0, 
                                "Sum"       : 0, 
                            },
                            {
                                "name":"CadCam",
                                "PriceM2"   : 0,
                                "Sum"       : 0, 
                            }
                        ],
                        "TotalCost" : {
                            "PriceM2"   : 0, 
                            "Sum"       : 0, 
                        },
                        "Rib": {
                            "Sum" : ""
                        }
                    }
                ],
                "ComponentsTotals" : {
                    "sqm"           : '',
                    "complexity"    : '', 
                    'Dynamics': [
                        {
                            "name":"Details",
                            "PriceM2"   : 0,
                            "Sum"       : 0
                        },
                        {
                            "name":"Statistics",
                            "PriceM2"   : 0, 
                            "Sum"       : 0, 
                        },
                        {
                            "name":"CadCam",
                            "PriceM2"   : 0,
                            "Sum"       : 0, 
                        }
                    ],
                    "TotalCost" :{
                        "PriceM2"   : 0, 
                        "Sum"       : 0, 
                    },
                    "Rib": {
                        "Sum" : ""
                    },
                    "grandTotal"    : '', 
                },
            });
            console.log( $scope.EngineeringEstimate)
        }

        $scope.deleteEngineeringEstimate = (index) => {
            $scope.EngineeringEstimate.splice(index,1);
            Message('success', 'Engineering estimation deleted successfully');
            $timeout(function() {
                angular.element('.sqm_').triggerHandler('keyup');
            });
            if($scope.EngineeringEstimate.length == 0){
                $scope.EngineeringEstimate.totalArea = 0;
                $scope.EngineeringEstimate.totalSum =  0;
                $scope.EngineeringEstimate.totalPris = 0;
            }
        }

        $scope.cloneCostEstimate = (index, CostEstimate) => {
            let cloneObject = JSON.parse(JSON.stringify(CostEstimate));
            $scope.EngineeringEstimate.splice(index, 0, cloneObject);
            $timeout(function() {
                angular.element('.sqm_').triggerHandler('keyup');
            });
        }
       
        $scope.addComponent  = function(index) {
            $scope.EngineeringEstimate[index].Components.unshift({
                'building_component_id': '',
                'type_id': '',
                'DesignScope': 0,
                "Component"     : "",
                "Type"          : "", 
                "sqm"           : "",
                "Complexity"    : "", 
                'Dynamics': [
                    {
                        "name":"Details",
                        "PriceM2"   : 0,
                        "Sum"       : 0
                    },
                    {
                        "name":"Statistics",
                        "PriceM2"   : 0, 
                        "Sum"       : 0, 
                    },
                    {
                        "name":"CadCam",
                        "PriceM2"   : 0,
                        "Sum"       : 0, 
                    }
                ],
                "TotalCost" : {
                    "PriceM2"   : 0, 
                    "Sum"       : 0, 
                },
                "Rib": {
                    "Sum" : ""
                }
            });
        }

        $scope.delete   =   function(rootKey, index) { 
            $scope.EngineeringEstimate[rootKey].Components.splice(index,1);
            if($scope.EngineeringEstimate[rootKey].Components.length == 0) {
                $scope.EngineeringEstimate.splice(rootKey,1);
            } 
            $timeout(function() {
                angular.element('.sqm_').triggerHandler('keyup');
            });
            Message('success', 'Component deleted successfully');
        }
        
        $http.get(`${API_URL}building-type`)
        .then((res)=> {
            $scope.buildingTypes = res.data;
        });

        $http.get(`${API_URL}building-component`)
        .then((res)=> {
            $scope.buildingComponents = res.data;
        });

        $scope.getNum = (val) => {

            if (isNaN(val) || val == '') {
                return 0;
            }
            return Number.parseFloat(val).toFixed(2);
        }

        // Precast
        $scope.PrecastComponent = [];
        let precastComponent = {
                "type"                       : "Building Type 1",
                "total_sqm"                  : 0,
                "total_std_work_hours"       : 0,
                "total_additional_work_hours": 0,
                "total_hourly_rate"          : 0,
                "total_work_hours"           : 0,
                "engineering_cost"     : 0,
                "total_central_approval"     : 0,
                'total_engineering_cost' : 0,
                "Components" : [    
                    {
                        'precast_component': '',
                        'no_of_staircase': '',
                        'no_of_new_component':'',
                        'no_of_different_floor_height': '',
                        'sqm'           : '',
                        'complexity'    : '', 
                        'std_work_hours': '',
                        'additional_work_hours': '',
                        'hourly_rate': '',
                        'total_work_hours': '',
                        'engineering_cost': '',
                        'total_central_approval': '',
                        'total_engineering_cost': ''
                    }
                ]
            
        };
        $scope.PrecastComponent.push(precastComponent);
        $scope.addPrecasEstimate = () => {
            $scope.PrecastComponent.push({
                "type"                       : "Building Type 1",
                "total_sqm"                  : 0,
                "total_std_work_hours"       : 0,
                "total_additional_work_hours": 0,
                "total_hourly_rate"          : 0,
                "total_work_hours"           : 0,
                "engineering_cost"     : 0,
                "total_central_approval"     : 0,
                "Components" : [ 
                    {
                        'precast_component': '',
                        'no_of_staircase': '',
                        'no_of_new_component':'',
                        'no_of_different_floor_height': '',
                        'sqm'           : '',
                        'complexity'    : '', 
                        'std_work_hours': '',
                        'additional_work_hours': '',
                        'hourly_rate': '',
                        'total_work_hours': '',
                        'engineering_cost': '',
                        'total_central_approval': '',
                        'total_engineering_cost': ''
                    }
                ]
            });
            console.log($scope.PrecastComponent);
        }

        $scope.addPrecastComponent =  (rootKey) => {
            $scope.PrecastComponent[rootKey].Components.unshift(
                {
                        'precast_component': '',
                        'no_of_staircase': '',
                        'no_of_new_component':'',
                        'no_of_different_floor_height': '',
                        'sqm'           : '',
                        'complexity'    : '', 
                        'std_work_hours': '',
                        'additional_work_hours': '',
                        'hourly_rate': '',
                        'total_work_hours': '',
                        'engineering_cost': '',
                        'total_central_approval': '',
                        'total_engineering_cost':''
                    }
            );
        }

        $scope.deletePrecastComponent = (rootKey, index) => {
            $scope.PrecastComponent[rootKey].Components.splice(index,1);
            if($scope.PrecastComponent[rootKey].Components.length == 0){
                $scope.PrecastComponent.splice(rootKey,1);
                $timeout(function() {
                    angular.element('.psqm_').triggerHandler('keyup');
                });
            }
            Message('success','Precast component deleted Successfully');
        }

        $scope.deletePrecastEstimate = (rootKey) => {
            $scope.PrecastComponent.splice(rootKey,1);
            Message('success','Precast estimation deleted Successfully');
            $timeout(function() {
                angular.element('.psqm_').triggerHandler('keyup');
            });
        }

        $scope.clonePrecastEstimate = (index, precastEstimate) => {
            let cloneObject = JSON.parse(JSON.stringify(precastEstimate));
            $scope.PrecastComponent.splice(index, 0, cloneObject);
            $timeout(function() {
                angular.element('.psqm_').triggerHandler('keyup');
            });
        }

        
        getlist = (type) => {
            $http.get(`${API_URL}admin/calculate-cost-estimate/${type}/list`)
            .then(function successCallback(res){
                if(type == 'wood') {
                    $scope.WoodEstimateList = res.data;
                } else {
                    $scope.PrecastEstimateList = res.data;
                }
             
            });
        }
        getlist('wood');
        getlist('precast');
        
        $scope.EstimateStore = (type) => {
            if(type == 'wood') {
                var data = $scope.EngineeringEstimate;
                var name =  $scope.wood_estimate_name;
                if($scope.EngineeringEstimate.length == 0) {
                    Message('danger','Please add building');
                    return false;
                }
                if($scope.wood_estimate_name == '') {
                    Message('danger','Please add name');
                    return false;
                }
            } else {
                var data = $scope.PrecastComponent;
                var name =  $scope.precast_estimate_name;
                if($scope.PrecastComponent.length == 0) {
                    Message('danger','Please add building');
                    return false;
                }
                if($scope.precast_estimate_name == '') {
                    Message('danger','Please add name');
                    return false;
                }
            }
            
   
            $http.post(`
                ${API_URL}admin/calculate-cost-estimate/store`,
                {data: data, type: type, name: name}
            ).then(function successCallback(res){
                if(res.data.status) {
                    Message('success', res.data.msg);
                    getlist(type);
                    return false;
                }
                Message('danger', res.data.msg);
                return false;
            });
        }

        $scope.EstimateUpdate = (id, type) => {
            if(type == 'wood') {
                var data = $scope.EngineeringEstimate;
                var name =  $scope.wood_estimate_name;
                if($scope.EngineeringEstimate.length == 0) {
                    Message('danger','Please add building');
                    return false;
                }
                if($scope.wood_estimate_name == '') {
                    Message('danger','Please add name');
                    return false;
                }
            } else {
                var data = $scope.PrecastComponent;
                var name =  $scope.precast_estimate_name;
                if($scope.PrecastComponent.length == 0) {
                    Message('danger','Please add building');
                    return false;
                }
                if($scope.precast_estimate_name == '') {
                    Message('danger','Please add name');
                    return false;
                }
            }
            $http.post(`
                ${API_URL}admin/calculate-cost-estimate/update/${id}`,
                {data: data, type:type ,name: name}
            ).then(function successCallback(res){
                if(res.data.status) {
                    Message('success', res.data.msg);
                    getlist(type);
                    return false;
                }
                Message('danger', res.data.msg);
                return false;
            });
        }

        $scope.EstimateEdit = (Estimate, type) => {
            if(type == 'wood'){
                $scope.EngineeringEstimate.length = 0;
                $scope.wood_estimate_edit_id = Estimate.id;
                $scope.wood_estimate_name = Estimate.name;
                $scope.EngineeringEstimate  = JSON.parse(Estimate.calculation_json);
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
            } else {
                console.log(JSON.parse(Estimate.calculation_json));
                $scope.PrecastComponent.length = 0;
                $scope.precast_estimate_edit_id = Estimate.id;
                $scope.precast_estimate_name = Estimate.name;
                $scope.PrecastComponent  = JSON.parse(Estimate.calculation_json);
                $timeout(function() {
                    angular.element('.psqm_').triggerHandler('keyup');
                });
            }
           
        }

        $scope.EstimateDelete = (id, type) => {
            $http.post(`
                ${API_URL}admin/calculate-cost-estimate/delete/${id}/${type}`,
            ).then(function successCallback(res){
                if(res.data.status) {
                    Message('success', res.data.msg);
                    getlist(type);
                    return false;
                }
                Message('danger', res.data.msg);
                return false;
            });
        }


    })
 
    .directive('getCostDetailsTotal',   ['$http' ,function ($http, $scope, $apply) {  
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    element.on('keyup', function () {
                      
                        let $TotalPriceM2   = 0
                        let $TotalSum       = 0
                        let $SumOfTotal     = 0;
                        let $PriceM2ofTotal = 0;

                        scope.CostEstimate.ComponentsTotals.Dynamics.forEach( (item, index) => {
                            scope.CostEstimate.Components[scope.index].Dynamics[index].Sum  = getNum(((scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Dynamics[index].PriceM2  ) * scope.CostEstimate.Components[scope.index].DesignScope) / 100);
                            $TotalPriceM2   += Number(scope.CostEstimate.Components[scope.index].Dynamics[index].PriceM2);
                            $TotalSum       += Number(scope.CostEstimate.Components[scope.index].Dynamics[index].Sum);
                        });

                        scope.CostEstimate.Components[scope.index].TotalCost.PriceM2 = $TotalPriceM2;
                        scope.CostEstimate.Components[scope.index].TotalCost.Sum = $TotalSum;
                    // for column total
                        scope.EngineeringEstimate.forEach( (Estimates, estimateIndex) => {
                            let $totalPrice = 0;
                            let $totalSum = 0;
                            Estimates.ComponentsTotals.Dynamics.forEach((dynamic) => {
                                dynamic.PriceM2 = 0;
                                dynamic.Sum = 0;
                               
                            })
                            Estimates.Components.forEach( (Component, componentIndex) => {
                                Component.Dynamics.forEach( (Dynamic, dynamicIndex) => {
                                    Estimates.ComponentsTotals.Dynamics[dynamicIndex].PriceM2 += Number(Dynamic.PriceM2);
                                    Estimates.ComponentsTotals.Dynamics[dynamicIndex].Sum += Number(Dynamic.Sum);
                                    $totalPrice += Number(Dynamic.PriceM2);
                                    $totalSum += Number(Dynamic.Sum);
                                });
                            });
                            Estimates.ComponentsTotals.TotalCost.Sum  = $totalSum;
                            Estimates.ComponentsTotals.TotalCost.PriceM2  = $totalPrice;
                        });
                        scope.$apply();
                    });
                },
            };
    }]).directive('getCostEstimateData',   ['$http' ,function ($http, $scope , $apply) {  
        return {
            restrict: 'A',
            link : function (scope, element, attrs) {
                element.on('change', function () {
                    if(scope.C.type_id == 'undefined' || scope.C.type_id == '' || scope.C.building_component_id == 'undefined' || scope.C.building_component_id == '' ){
                        return false;
                    }
                    $http({ 
                        method: 'GET',
                        url: '{{ route("CostEstimateMasterValue") }}',
                        params : {component_id: scope.C.building_component_id, type_id: scope.C.type_id}
                        }).then(function success(response) {
                           
                            scope.masterData = response.data;
                            console.log( scope.CostEstimate);
                            scope.CostEstimate.Components[scope.index].Component            =   response.data.component_id;  
                            scope.CostEstimate.Components[scope.index].Type                 =   response.data.type_id;  

                            scope.CostEstimate.Components[scope.index].sqm                  =   response.data.sqm;  
                            scope.CostEstimate.Components[scope.index].Complexity           =   response.data.complexity; 

                            scope.CostEstimate.Components[scope.index].Details.PriceM2      =   response.data.detail_price;  
                            scope.CostEstimate.Components[scope.index].Details.Sum          =   getNum(response.data.sqm * response.data.complexity * response.data.detail_price);

                            scope.CostEstimate.Components[scope.index].Statistics.PriceM2  =   response.data.statistic_price;  
                            scope.CostEstimate.Components[scope.index].Statistics.Sum      =  getNum(response.data.sqm * response.data.complexity * response.data.statistic_price);

                            scope.CostEstimate.Components[scope.index].CadCam.PriceM2      =   response.data.cad_cam_price;  
                            scope.CostEstimate.Components[scope.index].CadCam.Sum          =   getNum(response.data.sqm * response.data.complexity * response.data.cad_cam_price);

                            scope.CostEstimate.Components[scope.index].Logistics.PriceM2   =   response.data.logistic_price;  
                            scope.CostEstimate.Components[scope.index].Logistics.Sum       =   getNum(response.data.sqm * response.data.complexity * response.data.logistic_price);

                            scope.CostEstimate.Components[scope.index].TotalCost.PriceM2   =   getNum(parseInt(response.data.detail_price)    + 
                                                                                                parseInt(response.data.statistic_price) + 
                                                                                                parseInt(response.data.cad_cam_price)   + 
                                                                                                parseInt(response.data.logistic_price))
                            
                            scope.CostEstimate.Components[scope.index].TotalCost.Sum       =   getNum(parseInt(response.data.detail_price)    + 
                                                                                                parseInt(response.data.statistic_price) + 
                                                                                                parseInt(response.data.cad_cam_price)   + 
                                                                                                parseInt(response.data.logistic_price))
                                scope.CostEstimate.Components[scope.index].Details.Sum          =    getNum(((scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Details.PriceM2  ) * scope.CostEstimate.Components[scope.index].DesignScope) / 100);

                                scope.CostEstimate.Components[scope.index].Statistics.Sum       =    getNum(((scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Statistics.PriceM2 ) * scope.CostEstimate.Components[scope.index].DesignScope) / 100);

                                scope.CostEstimate.Components[scope.index].Logistics.Sum        =    getNum(((scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Logistics.PriceM2 ) * scope.CostEstimate.Components[scope.index].DesignScope) / 100);

                                scope.CostEstimate.Components[scope.index].CadCam.Sum           =    getNum(((scope.CostEstimate.Components[scope.index].sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].CadCam.PriceM2) * scope.CostEstimate.Components[scope.index].DesignScope) / 100);


                                scope.CostEstimate.Components[scope.index].TotalCost.PriceM2    =   getNum(Number(scope.CostEstimate.Components[scope.index].Details.PriceM2)     + 
                                                                                                    Number(scope.CostEstimate.Components[scope.index].Statistics.PriceM2)  + 
                                                                                                    Number(scope.CostEstimate.Components[scope.index].CadCam.PriceM2)      + 
                                                                                                    Number(scope.CostEstimate.Components[scope.index].Logistics.PriceM2) );
                        
                                scope.CostEstimate.Components[scope.index].TotalCost.Sum        =   getNum(Number(scope.CostEstimate.Components[scope.index].Details.Sum)     + 
                                                                                                    Number(scope.CostEstimate.Components[scope.index].Statistics.Sum)  + 
                                                                                                    Number(scope.CostEstimate.Components[scope.index].CadCam.Sum)      + 
                                                                                                    Number(scope.CostEstimate.Components[scope.index].Logistics.Sum));
                                let $sqmTotal           =   0;
                                let $complexity         =   0;
                                let $DetailsPriceM2     =   0;
                                let $DetailsSum         =   0;
                                let $StatisticsPriceM2  =   0;
                                let $StatisticsSum      =   0;
                                let $CadCamPriceM2      =   0;
                                let $CadCamSum          =   0;
                                let $LogisticsPriceM2   =   0;
                                let $LogisticsSum       =   0;
                                let $TotalCostPriceM2   =   0;
                                let $TotalCostSum       =   0;
                                let $RibSum             =   0;

                                scope.CostEstimate.Components.map( (item, index) => {
                                    $sqmTotal           +=  Number(item.sqm); 
                                    $complexity         +=  Number(item.Complexity);
                                    $DetailsPriceM2     +=  Number(item.Details.PriceM2); 
                                    $DetailsSum         +=  Number(item.Details.Sum);
                                    $StatisticsPriceM2  +=  Number(item.Statistics.PriceM2);
                                    $StatisticsSum      +=  Number(item.Statistics.Sum);
                                    $CadCamPriceM2      +=  Number(item.CadCam.PriceM2);
                                    $CadCamSum          +=  Number(item.CadCam.Sum);
                                    $LogisticsPriceM2   +=  Number(item.Logistics.PriceM2);
                                    $LogisticsSum       +=  Number(item.Logistics.Sum);
                                    $TotalCostPriceM2   +=  Number(item.TotalCost.PriceM2);
                                    $TotalCostSum       +=  Number(item.TotalCost.Sum);
                                    $RibSum             +=  Number(item.Rib.Sum);
                                });

                                scope.CostEstimate.ComponentsTotals.sqm                 = $sqmTotal;
                                scope.CostEstimate.ComponentsTotals.complexity          = $complexity;
                                scope.CostEstimate.ComponentsTotals.Details.PriceM2     = $DetailsPriceM2;
                                scope.CostEstimate.ComponentsTotals.Details.Sum         = $DetailsSum;
                                scope.CostEstimate.ComponentsTotals.Statistics.PriceM2  = $StatisticsPriceM2;
                                scope.CostEstimate.ComponentsTotals.Statistics.Sum      = $StatisticsSum;
                                scope.CostEstimate.ComponentsTotals.CadCam.PriceM2      = $CadCamPriceM2;
                                scope.CostEstimate.ComponentsTotals.CadCam.Sum          = $CadCamSum;
                                scope.CostEstimate.ComponentsTotals.Logistics.PriceM2   = $LogisticsPriceM2;
                                scope.CostEstimate.ComponentsTotals.Logistics.Sum       = $LogisticsSum;
                                scope.CostEstimate.ComponentsTotals.TotalCost.PriceM2   = $TotalCostPriceM2;
                                scope.CostEstimate.ComponentsTotals.TotalCost.Sum       = $TotalCostSum;
                                scope.CostEstimate.ComponentsTotals.Rib.Sum             = $RibSum;

                                scope.CostEstimate.ComponentsTotals.grandTotal       =  $sqmTotal +
                                                                                        $complexity +
                                                                                        $DetailsPriceM2 +
                                                                                        $DetailsSum +
                                                                                        $StatisticsPriceM2 +
                                                                                        $StatisticsSum +
                                                                                        $CadCamPriceM2 +
                                                                                        $CadCamSum +
                                                                                        $LogisticsPriceM2 +
                                                                                        $LogisticsSum +
                                                                                        $TotalCostPriceM2 +
                                                                                        $TotalCostSum;
                        let $toalArea_ = 0;
                        let $totalSum_ = 0;
                        scope.EngineeringEstimate.forEach((item) => {
                            $toalArea_ += Number(item.ComponentsTotals.sqm);
                            $totalSum_ +=Number(item.ComponentsTotals.TotalCost.Sum);
                        });
                        scope.EngineeringEstimate.totalArea = $toalArea_;
                        scope.EngineeringEstimate.totalSum =  $totalSum_;
                        scope.EngineeringEstimate.totalPris = $totalSum_ / $toalArea_;
                                                                                
                        }, function error(response) { 
                            console.log("Code Eror")
                        }); 
                });
            },
        };
    }]).directive('getPrecastDetailsTotal',   ['$http' ,function ($http, $scope, $apply) {  
        return {
            restrict: 'A',
            link : function (scope, element, attrs) {
                element.on('keyup', function () {
                    if(scope.PrecastEstimate.Components[scope.index].no_of_staircase != 0) {
                        scope.PrecastEstimate.Components[scope.index].std_work_hours = getNum( scope.PrecastEstimate.Components[scope.index].no_of_staircase * scope.PrecastEstimate.Components[scope.index].precast_component );
                    } else {
                        console.log(scope.PrecastEstimate.Components[scope.index].no_of_staircase);
                        scope.PrecastEstimate.Components[scope.index].std_work_hours = getNum( scope.PrecastEstimate.Components[scope.index].no_of_new_component * scope.PrecastEstimate.Components[scope.index].precast_component );
                    }
                    console.log( scope.PrecastEstimate.Components[scope.index].std_work_hours);
                    scope.PrecastEstimate.Components[scope.index].total_work_hours = getNum(Number( scope.PrecastEstimate.Components[scope.index].std_work_hours) +  
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].additional_work_hours));                                                              
                    scope.PrecastEstimate.Components[scope.index].engineering_cost = getNum(
                                                                                            (Number( scope.PrecastEstimate.Components[scope.index].std_work_hours) +  
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].additional_work_hours)) * 
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].hourly_rate) * 
                                                                                            Number(scope.PrecastEstimate.Components[scope.index].complexity)
                              
                                                                                            );
                    scope.PrecastEstimate.Components[scope.index].total_engineering_cost   = Number(scope.PrecastEstimate.Components[scope.index].engineering_cost)+ Number(scope.PrecastEstimate.Components[scope.index].total_central_approval)
                    let $total_sqm                   = 0;
                    let $total_std_work_hours        = 0;
                    let $total_additional_work_hours = 0;
                    let $total_hourly_rate           = 0;
                    let $total_work_hours            = 0;
                    let $engineering_cost      = 0;
                    let $total_central_approval      = 0;
                    let $total_engineering_cost = 0;

                    scope.PrecastEstimate.Components.forEach((row) => {
                        console.log(row);
                        $total_sqm                   += Number(row.sqm);
                        $total_std_work_hours        += Number(row.std_work_hours);
                        $total_additional_work_hours += Number(row.additional_work_hours);
                        $total_hourly_rate           += Number(row.hourly_rate);
                        $total_work_hours            += Number(row.total_work_hours);
                        $engineering_cost      += Number(row.engineering_cost);
                        $total_central_approval      += Number(row.total_central_approval);
                        $total_engineering_cost     += Number(row.total_engineering_cost);
                    });

                    scope.PrecastEstimate.total_sqm                   = $total_sqm;
                    scope.PrecastEstimate.total_std_work_hours        = $total_std_work_hours;
                    scope.PrecastEstimate.total_additional_work_hours = $total_additional_work_hours;
                    scope.PrecastEstimate.total_hourly_rate           = $total_hourly_rate;
                    scope.PrecastEstimate.total_work_hours            = $total_work_hours;
                    scope.PrecastEstimate.engineering_cost      = $engineering_cost;
                    scope.PrecastEstimate.total_central_approval      = $total_central_approval;
                    scope.PrecastEstimate.total_engineering_cost     = $total_engineering_cost;
                    let $totalArea = 0;
                    let $totalPris = 0;
                    let $totalSum  = 0;

                    scope.PrecastComponent.forEach( (row) => {
                        $totalArea += row.total_sqm;
                        $totalSum  += row.total_engineering_cost;
                    });
                    scope.PrecastComponent.totalArea = $totalArea;
                    scope.PrecastComponent.totalSum  = $totalSum;
                    scope.PrecastComponent.totalPris = $totalSum / $totalArea;
                
                    scope.$apply();
                });
            },
        };
    }]);