    app.controller('Cost_Estimate', function ($scope, $http, $timeout, API_URL) {
        $scope.editable = false;
        $scope.wood_estimate_edit_id = false;
        $scope.precast_estimate_edit_id = false;
        $scope.wood_estimate_name = '';
        $scope.precast_estimate_name = '';
        $scope.price_calculation = 'wood_engineering_estimation';
        $scope.EngineeringEstimate = [];
        $scope.editorEnabled = false; // precast
        $scope.template_name = '';
        $scope.is_template_update = false;
        $scope.is_precast_template_update = false;
        $scope.estimation = {};
        $scope.formSubmit = false;
        $scope.enquiries = [];

        $scope.callWoodTemplate = (pos) => {
            $scope.costEstimateWoodTemplate = $scope.EngineeringEstimate[pos];
            $("#cost-estimate-wood-template-modal").modal('show');
        }

        $scope.addWoodTemplate = (type) => {
            if($scope.template_name == '') {
                Message('danger','Template field is required');
                return false;
            }
            let templateData = {
                name: $scope.template_name,
                template: $scope.costEstimateWoodTemplate,
                type: type
            }
            $http.post(`${API_URL}admin/cost-estimate-template`, {data:templateData})
            .then(function successCallback(res){
                if(res.data.status) {
                    $scope.is_template_update = !$scope.is_template_update;
                    Message('success', res.data.msg);
                    $("#cost-estimate-wood-template-modal").modal('hide');
                    return false;
                }
                Message('danger', res.data.msg);
            });
        }

        $scope.getWoodTemplate= (id, pos) => {
            if(id != '' && $scope.costEstimateWoodTemplates.length != 0) {
                let template = $scope.costEstimateWoodTemplates.find(obj => obj.id === id);
                $scope.EngineeringEstimate[pos] = JSON.parse(template.json);
            }
            $timeout(function() {
                angular.element('.sqm_').triggerHandler('keyup');
            });
            Message('success','Templated selected successfully');
        }

        $scope.$watch('is_template_update', function() {
            $http({
                method: 'GET',
                url: `${API_URL}admin/cost-estimate-wood-template`
                }).then(function success(res) {
                    $scope.costEstimateWoodTemplates = res.data.data;
                }, function error(response) {
            });
        });

//  precast
        $scope.callPrecastTemplate = (pos) => {
            $scope.costEstimatePrecastTemplate = $scope.PrecastComponent[pos];
            $("#cost-estimate-precast-template-modal").modal('show');
        }

        $scope.addPrecastTemplate = (type) => {
            if($scope.template_name == '') {
                Message('danger','Template field is required');
                return false;
            }
            let templateData = {
                name: $scope.template_name,
                template: $scope.costEstimatePrecastTemplate,
                type: type
            }
            $http.post(`${API_URL}admin/cost-estimate-template`, {data:templateData})
            .then(function successCallback(res){
                if(res.data.status) {
                    $scope.is_precast_template_update = !$scope.is_precast_template_update;
                    Message('success', res.data.msg);
                    $("#cost-estimate-precast-template-modal").modal('hide');
                    return false;
                }
                Message('danger', res.data.msg);
            });
        }

        $scope.getPrecastTemplate= (id, pos) => {
            if(id != '' && $scope.costEstimatePrecastTemplates.length != 0) {
                let template = $scope.costEstimatePrecastTemplates.find(obj => obj.id === id);
                $scope.PrecastComponent[pos] = JSON.parse(template.json);
            }
            $timeout(function() {
                angular.element('.psqm_').triggerHandler('keyup');
            });
        }

        $scope.$watch('is_precast_template_update', function() {
            $http({
                method: 'GET',
                url: `${API_URL}admin/cost-estimate-precast-template`
                }).then(function success(res) {
                    $scope.costEstimatePrecastTemplates = res.data.data;
                }, function error(response) {
            });
        });


        $http.get(`${API_URL}wood-estimate-json`).then((res) => {
            $scope.CostEstimate = res.data.json;
            let newCostEstimate = JSON.parse(JSON.stringify($scope.CostEstimate));
            $scope.EngineeringEstimate.push(newCostEstimate);
            $timeout(function() {
                angular.element('.sqm_').triggerHandler('keyup');
            });
        });

        $scope.ResultEngineeringEstimate = {'total': {totalArea: 0, totalSum: 0, totalPris: 0}, 'costEstimate': $scope.EngineeringEstimate};

        $http.get(`${API_URL}precast-estimate`).then((res) => {
            $scope.precastEstimateTypes = res.data;
        });

        $http.get(`${API_URL}get-cost-estimate-types`).then((res) => {
            $scope.costEstimateTypes = res.data;
        });

        $scope.createNewCalculation = (type) => {
            if(type == 'wood') {
                $scope.wood_estimate_edit_id = false;
                $scope.wood_estimate_name = '';
                $scope.EngineeringEstimate.length = 0;
                let newCostEstimate = JSON.parse(JSON.stringify($scope.CostEstimate));
                $scope.EngineeringEstimate.push(newCostEstimate);
            } else {
                $scope.precast_edit_id = false;
                $scope.precast_estimate_name = '';
                $scope.PrecastComponent.length = 0;
                let newPrecastComponent = JSON.parse(JSON.stringify(precastComponent));
                $scope.PrecastComponent.push(newPrecastComponent);
                $scope.PrecastComponent.totalArea = 0;
                $scope.PrecastComponent.totalSum  = 0;
                $scope.PrecastComponent.totalPris = 0;
            }

        }

        $scope.addDynamicColumn = (index, columnName) => {
            $scope.editable = false;
            if(columnName == '' || typeof(columnName) == 'undefined') return false;
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
            $http.post(`${API_URL}wood-estimate`,{name:columnName}).then((res) => {
                console.log(res.data);
            })
            $scope.column_name = '';
            Message('success','Column added successfully');
        }

        $scope.deleteDynamic = (rootIndex, dynamicIndex) => {
            $scope.EngineeringEstimate[rootIndex].ComponentsTotals.Dynamics.splice(dynamicIndex, 1);

            $scope.EngineeringEstimate[rootIndex].Components.forEach( (Component) => {
                Component.Dynamics.splice(dynamicIndex, 1);
            });
            $timeout(function() {
                angular.element('.sqm_').triggerHandler('keyup');
            });
            Message('success','Column removed successfully');
        }

        $scope.addEngineeringEstimate = () => {
            Message('success', 'Building component added successfully');
            let newCostEstimate = JSON.parse(JSON.stringify($scope.CostEstimate));
            $scope.EngineeringEstimate.push(newCostEstimate);
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
            Message('success', 'Building component cloned successfully');
            let cloneObject = JSON.parse(JSON.stringify(CostEstimate));
            $scope.EngineeringEstimate.splice(index, 0, cloneObject);
            $timeout(function() {
                angular.element('.sqm_').triggerHandler('keyup');
            });
        }

        $scope.addComponent  = function(index) {
            let componentFirstObj = JSON.parse(JSON.stringify($scope.EngineeringEstimate[index].Components[0]));
            let removeVal = componentFirstObj.Dynamics.map((obj) => {
                return {...obj, PriceM2: 0, Sum: 0};
            });
            let newObj = {...$scope.CostEstimate.Components[0],  ...{Dynamics: removeVal}}
            $scope.EngineeringEstimate[index].Components.push(JSON.parse(JSON.stringify(newObj)));
            $timeout(function() {
                angular.element('.sqm_').triggerHandler('keyup');
            });
            Message('success', 'Component added successfully');

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

        $http.get(`${API_URL}delivery-type`)
        .then((res)=> {
            $scope.deliveryTypes = res.data;
        });

        $http.get(`${API_URL}get-for-cost-estimate`)
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
                        'precast_component': null,
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
        $scope.ResultPrecastComponent = { total:{totalArea: 0, totalSum: 0, totalPris: 0}, precastEstimate:  $scope.PrecastComponent};
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

        }

        $scope.addPrecastComponent =  (rootKey) => {
            $scope.PrecastComponent[rootKey].Components.push(
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
            }
            $timeout(function() {
                angular.element('.psqm_').triggerHandler('keyup');
            });
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
            $("#cost_estimate").removeClass('d-none');
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
                var data = $scope.ResultEngineeringEstimate;
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
                var data = $scope.ResultPrecastComponent;
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
                var data = $scope.ResultEngineeringEstimate;
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
                $scope.EngineeringEstimate  = JSON.parse(Estimate.calculation_json).costEstimate;
                $timeout(function() {
                    angular.element('.sqm_').triggerHandler('keyup');
                });
            } else {
                $scope.PrecastComponent.length = 0;
                $scope.precast_estimate_edit_id = Estimate.id;
                $scope.precast_estimate_name = Estimate.name;
                $scope.PrecastComponent  = JSON.parse(Estimate.calculation_json).precastEstimate;
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

        $scope.EstimateAssignToEnquiry = (id, type) => {
            $scope.estimation.type = type;
            $scope.estimation.calculation_id = id;
            $("#estimate-assign-enquiry-modal").modal('show');
        }
        getActiveEnquiry = () => {
            $http.get(`
                ${API_URL}admin/active-enquiries`,
            ).then(function successCallback(res){
                if(res.data.status) {
                    $scope.enquiries = res.data.data;
                }
                return false;
            });
        }
        getActiveEnquiry();

        $scope.submitAssignEnquiry = () => {
            if(typeof($scope.enquiry_id) == 'undefined' || $scope.enquiry_id == '') {
                $scope.formSubmit = true;
                return false;
            }
            $http.post(`
                ${API_URL}admin/assign-estimation-to-enquiry/${$scope.enquiry_id}`,
                $scope.estimation
            ).then(function successCallback(res){
                if(res.data.status) {
                    Message('success', res.data.msg);
                    $scope.enquiry_id = '';
                    $scope.formSubmit = false;
                    $("#estimate-assign-enquiry-modal").modal('hide');
                    return false;
                }
                Message('danger', res.data.msg);
                return false;
            });
        }

        $scope.savePrecastComponent = () => {
            $http.post(`${API_URL}precast-estimate`,{name:$scope.precast_component_name, hours:  $scope.precast_component_hours})
            .then(function successCallback(response) {
                Message('success',response.data.msg);
                $scope.editorEnabled = false;
                $http.get(`${API_URL}precast-estimate`).then((res) => {
                    $scope.precastEstimateTypes = res.data;
                });
            }, function errorCallback(response) {
                Message('danger',response.data.errors.name[0]);
            });
        }

    })
    .directive('getCostDetailsTotal',   ['$http' ,function ($http, $scope, $apply, API_URL) {
            return {
                restrict: 'A',
                link : function (scope, element, attrs) {
                    let woodEventHandler = () => {
                        let $TotalPriceM2   = 0;
                        let $TotalSum       = 0;
                        let $TotalRibSum    = 0;
                        scope.CostEstimate.ComponentsTotals.Dynamics.forEach( (item, index) => {
                            // designScope percentage validation
                            if(scope.CostEstimate.Components[scope.index].DesignScope > 100) {
                                scope.CostEstimate.Components[scope.index].DesignScope = 100;
                            } else if(scope.CostEstimate.Components[scope.index].DesignScope < 0) {
                                scope.CostEstimate.Components[scope.index].DesignScope = 1;
                            }

                            // complexity validation
                            if(scope.CostEstimate.Components[scope.index].Complexity > 2) {
                                scope.CostEstimate.Components[scope.index].Complexity = 2;
                            } else if(scope.CostEstimate.Components[scope.index].Complexity < 1) {
                                scope.CostEstimate.Components[scope.index].Complexity = 1;
                            }

                            scope.CostEstimate.Components[scope.index].Dynamics[index].Sum  = getNum(((scope.CostEstimate.Components[scope.index].Sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Dynamics[index].PriceM2  ) * scope.CostEstimate.Components[scope.index].DesignScope) / 100);
                            $TotalPriceM2   += Number(scope.CostEstimate.Components[scope.index].Dynamics[index].PriceM2);
                            $TotalSum       += Number(scope.CostEstimate.Components[scope.index].Dynamics[index].Sum);
                        });
                        if(scope.CostEstimate.Components[scope.index].Rib.Sum != 0 && scope.CostEstimate.Components[scope.index].Rib.Sum != ''){
                            scope.CostEstimate.Components[scope.index].Sqm = 0;
                            $TotalRibSum = scope.CostEstimate.Components[scope.index].Rib.Sum * scope.CostEstimate.Components[scope.index].TotalCost.PriceM2 ;
                            scope.CostEstimate.Components[scope.index].TotalCost.Sum = getNum($TotalRibSum);
                        } else {
                            scope.CostEstimate.Components[scope.index].TotalCost.Sum = getNum($TotalSum);
                            scope.CostEstimate.Components[scope.index].TotalCost.PriceM2 = getNum($TotalPriceM2);
                        }

                    // for column total
                        let $totalEstimateArea = 0;
                        let $totalEstimateSum = 0;
                        scope.EngineeringEstimate.forEach( (Estimates, estimateIndex) => {
                            let $totalPrice = 0;
                            let $totalSum = 0;
                            let $sqmTotal = 0;
                            let $ribTotal = 0;
                            var $totalSql_ = 0;
                            Estimates.ComponentsTotals.Dynamics.forEach((dynamic) => {
                                dynamic.PriceM2 = 0;
                                dynamic.Sum = 0;
                            })
                            Estimates.Components.forEach( (Component, componentIndex) => {
                                $totalSql_ += Number(Component.Sqm);
                            });

                            Estimates.Components.forEach( (Component, componentIndex) => {

                                $sqmTotal += Number(Component.Sqm);
                                $totalEstimateArea += Number(Component.Sqm);
                                $ribTotal += Number(Component.Rib.Sum);
                                if(Component.Rib.Sum !=0 && Component.Rib.Sum != ''){
                                    $totalSum += Number(Component.Rib.Sum * Component.TotalCost.PriceM2);
                                    $totalEstimateSum += Number(Component.Rib.Sum * Component.TotalCost.PriceM2);
                                }else {
                                    Component.Dynamics.forEach( (Dynamic, dynamicIndex) => {
                                        Estimates.ComponentsTotals.Dynamics[dynamicIndex].Sum += Number(Dynamic.Sum);
                                        Estimates.ComponentsTotals.Dynamics[dynamicIndex].PriceM2 = getNum(Estimates.ComponentsTotals.Dynamics[dynamicIndex].Sum / $totalSql_);
                                        $totalPrice += Number(Dynamic.PriceM2);
                                        $totalSum += Number(Dynamic.Sum);
                                        $totalEstimateSum += Number(Dynamic.Sum);
                                    });
                                }

                            });
                            Estimates.ComponentsTotals.TotalCost.Sum     = getNum($totalSum);
                            Estimates.ComponentsTotals.TotalCost.PriceM2 = getNum($totalSum / $sqmTotal);
                            Estimates.ComponentsTotals.Sqm               = getNum($sqmTotal);
                            Estimates.ComponentsTotals.Rib.Sum           = getNum($ribTotal);

                        });
                        scope.ResultEngineeringEstimate.total.totalArea = getNum($totalEstimateArea);
                        scope.ResultEngineeringEstimate.total.totalSum = getNum($totalEstimateSum);
                        scope.ResultEngineeringEstimate.total.totalPris = getNum($totalEstimateSum /  $totalEstimateArea);
                        scope.ResultEngineeringEstimate.costEstimate =  scope.EngineeringEstimate;
                        scope.$apply();
                    };
                    element.on('keyup', function () {
                        woodEventHandler();
                    });
                },
            };
    }])
    .directive('getMasterData',   ['$http',function ($http, $scope, $apply, API_URL) {
        return {
            restrict: 'A',
            link : function (scope, element, attrs, API_URL) {
                element.on('change', function () {
                    var response;
                    if(scope.C.building_component_id == 6) {
                        scope.C.type_id = 5
                    }
                    if(scope.C.building_component_id == "" || scope.C.type_id == "") {
                        return false;
                    }
                    $http({
                    method: 'GET',
                    url: $("#baseurl").val()+'admin/api/v2/CostEstimateMasterValue',
                    params : {component_id: scope.C.building_component_id, type_id: scope.C.type_id}
                    }).then(function success(res) {
                        response = res.data;
                        scope.EngineeringEstimate.forEach( (Estimates, estimateIndex) => {
                            Estimates.Components.forEach( (Component, componentIndex) => {
                                if(scope.index == componentIndex) {
                                    let Sqm = Estimates.Components[componentIndex].Sqm;
                                    Component.Dynamics.forEach( (Dynamic, dynamicIndex) => {
                                        if(Estimates.Components[componentIndex].Dynamics[dynamicIndex].name == 'Details') {
                                            Estimates.Components[componentIndex].Dynamics[dynamicIndex].PriceM2 = Number(response.detail_price) || 0;
                                            Estimates.Components[componentIndex].Dynamics[dynamicIndex].Sum = 0;
                                        } else if(Estimates.Components[componentIndex].Dynamics[dynamicIndex].name == 'Statics') {
                                            Estimates.Components[componentIndex].Dynamics[dynamicIndex].PriceM2 = Number(response.statistic_price) || 0;
                                            Estimates.Components[componentIndex].Dynamics[dynamicIndex].Sum =  0;
                                        } else if(Estimates.Components[componentIndex].Dynamics[dynamicIndex].name == 'CAD/CAM') {
                                            Estimates.Components[componentIndex].Dynamics[dynamicIndex].PriceM2 = Number(response.cad_cam_price) || 0;
                                            Estimates.Components[componentIndex].Dynamics[dynamicIndex].Sum = 0;
                                        } else if(Estimates.Components[componentIndex].Dynamics[dynamicIndex].name == 'Logistics') {
                                            Estimates.Components[componentIndex].Dynamics[dynamicIndex].PriceM2 = 0;
                                            Estimates.Components[componentIndex].Dynamics[dynamicIndex].Sum = 0 ;
                                        } else {
                                            Estimates.Components[componentIndex].Dynamics[dynamicIndex].PriceM2 =  0;
                                            Estimates.Components[componentIndex].Dynamics[dynamicIndex].Sum =  0 ;
                                        }
                                    });
                                    Estimates.Components[componentIndex].Complexity = 1;
                                    Estimates.Components[componentIndex].Sqm = Sqm;
                                    Estimates.Components[componentIndex].TotalCost.PriceM2 = Number(response.total_sum);
                                }
                            });
                        });
                        let finalJson = {...scope.ResultEngineeringEstimate.costEstimate, ...scope.EngineeringEstimate};
                        scope.ResultEngineeringEstimate.costEstimate =   JSON.parse(JSON.stringify(finalJson));
                        
                        // copy from woodEventHandler function 
                        setTimeout(() => {
                            let $TotalPriceM2   = 0;
                            let $TotalSum       = 0;
                            let $TotalRibSum    = 0;
                            scope.CostEstimate.ComponentsTotals.Dynamics.forEach( (item, index) => {
                                // designScope percentage validation
                                if(scope.CostEstimate.Components[scope.index].DesignScope > 100) {
                                    scope.CostEstimate.Components[scope.index].DesignScope = 100;
                                } else if(scope.CostEstimate.Components[scope.index].DesignScope < 0) {
                                    scope.CostEstimate.Components[scope.index].DesignScope = 1;
                                }
    
                                // complexity validation
                                if(scope.CostEstimate.Components[scope.index].Complexity > 2) {
                                    scope.CostEstimate.Components[scope.index].Complexity = 2;
                                } else if(scope.CostEstimate.Components[scope.index].Complexity < 1) {
                                    scope.CostEstimate.Components[scope.index].Complexity = 1;
                                }
    
                                scope.CostEstimate.Components[scope.index].Dynamics[index].Sum  = getNum(((scope.CostEstimate.Components[scope.index].Sqm * scope.CostEstimate.Components[scope.index].Complexity * scope.CostEstimate.Components[scope.index].Dynamics[index].PriceM2  ) * scope.CostEstimate.Components[scope.index].DesignScope) / 100);
                                $TotalPriceM2   += Number(scope.CostEstimate.Components[scope.index].Dynamics[index].PriceM2);
                                $TotalSum       += Number(scope.CostEstimate.Components[scope.index].Dynamics[index].Sum);
                            });
                            if(scope.CostEstimate.Components[scope.index].Rib.Sum != 0 && scope.CostEstimate.Components[scope.index].Rib.Sum != ''){
                                scope.CostEstimate.Components[scope.index].Sqm = 0;
                                $TotalRibSum = scope.CostEstimate.Components[scope.index].Rib.Sum * scope.CostEstimate.Components[scope.index].TotalCost.PriceM2 ;
                                scope.CostEstimate.Components[scope.index].TotalCost.Sum = getNum($TotalRibSum);
                            } else {
                                scope.CostEstimate.Components[scope.index].TotalCost.Sum = getNum($TotalSum);
                                scope.CostEstimate.Components[scope.index].TotalCost.PriceM2 = getNum($TotalPriceM2);
                            }
    
                        // for column total
                            let $totalEstimateArea = 0;
                            let $totalEstimateSum = 0;
                            scope.EngineeringEstimate.forEach( (Estimates, estimateIndex) => {
                                let $totalPrice = 0;
                                let $totalSum = 0;
                                let $sqmTotal = 0;
                                let $ribTotal = 0;
                                var $totalSql_ = 0;
                                Estimates.ComponentsTotals.Dynamics.forEach((dynamic) => {
                                    dynamic.PriceM2 = 0;
                                    dynamic.Sum = 0;
                                })
                                Estimates.Components.forEach( (Component, componentIndex) => {
                                    $totalSql_ += Number(Component.Sqm);
                                });
    
                                Estimates.Components.forEach( (Component, componentIndex) => {
    
                                    $sqmTotal += Number(Component.Sqm);
                                    $totalEstimateArea += Number(Component.Sqm);
                                    $ribTotal += Number(Component.Rib.Sum);
                                    if(Component.Rib.Sum !=0 && Component.Rib.Sum != ''){
                                        $totalSum += Number(Component.Rib.Sum * Component.TotalCost.PriceM2);
                                        $totalEstimateSum += Number(Component.Rib.Sum * Component.TotalCost.PriceM2);
                                    }else {
                                        Component.Dynamics.forEach( (Dynamic, dynamicIndex) => {
                                            Estimates.ComponentsTotals.Dynamics[dynamicIndex].Sum += Number(Dynamic.Sum);
                                            Estimates.ComponentsTotals.Dynamics[dynamicIndex].PriceM2 = getNum(Estimates.ComponentsTotals.Dynamics[dynamicIndex].Sum / $totalSql_);
                                            $totalPrice += Number(Dynamic.PriceM2);
                                            $totalSum += Number(Dynamic.Sum);
                                            $totalEstimateSum += Number(Dynamic.Sum);
                                        });
                                    }
    
                                });
                                Estimates.ComponentsTotals.TotalCost.Sum     = getNum($totalSum);
                                Estimates.ComponentsTotals.TotalCost.PriceM2 = getNum($totalSum / $sqmTotal);
                                Estimates.ComponentsTotals.Sqm               = getNum($sqmTotal);
                                Estimates.ComponentsTotals.Rib.Sum           = getNum($ribTotal);
    
                            });
                            scope.ResultEngineeringEstimate.total.totalArea = getNum($totalEstimateArea);
                            scope.ResultEngineeringEstimate.total.totalSum = getNum($totalEstimateSum);
                            scope.ResultEngineeringEstimate.total.totalPris = getNum($totalEstimateSum /  $totalEstimateArea);
                            scope.ResultEngineeringEstimate.costEstimate =  scope.EngineeringEstimate;
                            scope.$apply();
                        
                        }, 1000);


                    })
                });
            },
        };
    }])
    .directive('getPrecastDetailsTotal',   ['$http' ,function ($http, $scope, $apply) {
        return {
            restrict: 'A',
            link : function (scope, element, attrs) {
                let eventHandle = () => {
                    scope.PrecastEstimate.Components[scope.index].hourly_rate = 550
                    // complexity validation
                    const precast_component = scope.precastEstimateTypes.find(precastEstimateType => scope.PrecastEstimate.Components[scope.index].precast_component == precastEstimateType.id);
                    if(scope.PrecastEstimate.Components[scope.index].complexity > 2) {
                        scope.PrecastEstimate.Components[scope.index].complexity= 2;
                    } else if(scope.PrecastEstimate.Components[scope.index].complexity< 1) {
                        scope.PrecastEstimate.Components[scope.index].complexity= 1;
                    }
                    if(typeof(precast_component) == 'undefined') {
                        scope.$apply();
                        return false;
                    }
                    if(scope.PrecastEstimate.Components[scope.index].no_of_staircase != 0) {
                        scope.PrecastEstimate.Components[scope.index].std_work_hours = getNum( scope.PrecastEstimate.Components[scope.index].no_of_staircase * precast_component.hours);
                    } else {
                        scope.PrecastEstimate.Components[scope.index].std_work_hours = getNum( scope.PrecastEstimate.Components[scope.index].no_of_new_component *  precast_component.hours );
                    }
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
                    let $totalWorkHours = 0;

                    scope.PrecastComponent.forEach( (row) => {
                        $totalArea += row.total_hourly_rate;
                        $totalSum  += row.total_engineering_cost;
                        $totalWorkHours += row.total_work_hours;
                    });
                    scope.ResultPrecastComponent.total.totalWorkHours = $totalWorkHours;
                    scope.ResultPrecastComponent.total.totalSum  = $totalSum;
                    // scope.ResultPrecastComponent.total.totalPris = $totalSum / $totalArea;
                    scope.ResultPrecastComponent.precastEstimate =  scope.PrecastComponent;
                    scope.$apply();
                }
                element.on('keyup', function () {
                    eventHandle();
                });
                element.on('change', function () {
                    eventHandle();
                });
            },
        };
    }]);
