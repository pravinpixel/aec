@extends('admin.setup.index')
@section('setup-content')
    <section ng-controller="WoodEstimateController">
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a href="{{ route('setup.wood-estimation') }}" class="nav-link">Service</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('setup.wood-estimation-cost-preset') }}" class="nav-link active fw-bold text-primary">Cost Preset</a>
            </li>
        </ul>
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-around">
                <div class="col me-2">
                    <small for="" class="mb-2">Building Component</small>
                    <select name="" class="form-select form-select-sm cl_country" id="ddlCountry">
                        <option value="all">Select</option>    
                        <option ng-repeat="buildingComponent in buildingComponents" value="@{{ buildingComponent.building_component_name}}">
                            @{{ buildingComponent.building_component_name }}
                        </option>
                    </select>
                </div>
                <div class="col me-2">
                    <small for="" class="mb-2">Type of Delivery</small>
                    <select name="" id="ddlAge" class="form-select form-select-sm cl_age">
                        <option value="all">Select</option>                    
                        <option ng-repeat="deliveryType in deliveryTypes" value="@{{ deliveryType.delivery_type_name}}">
                            @{{ deliveryType.delivery_type_name }}
                        </option>
                    </select>
                </div>
                <div class="cols" >
                    <small for="" class="mb-2" style="opacity:0">Building Type</small>
                    <div>
                        <button class="btn btn-light btn-sm" onclick="reset_dropdown()">
                            <i class="fa fa-refresh"></i> Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div style="max-height: 450px;overflow:auto">
            <table class="table table-hover" id="table11" >
                <thead style="position: sticky;top:0" class="bg-primary-light text-white">
                    <tr>
                        <th><small>S.No</small> </th>
                        <th><small>Component</small> </th>
                        <th><small>Type of Delivery</small> </th>
                        <th><small>Details Price</small> </th>
                        <th><small>Statistics Price</small> </th>
                        <th><small>CAD/CAM Price</small> </th>
                        <th><small>Logistics Price</small> </th>
                        <th><small>Sum</small> </th>
                        <th><small>Action</small> </th>
                    </tr>
                </thead> 
                <tbody> 
                    <tr class="needs-validations " name="cal_frm"  ng-repeat="calculation in calculations">
                        <td class="text-left wood_estimation_td"><small>@{{ $index + 1}}</small></td>
                        <td class="text-left wood_estimation_td"><small> @{{  calculation.component }}</small></td>
                        <td class="wood_estimation_td"><small> @{{  calculation.type }}</small></td> 
                        <td class="text-left wood_estimation_td">
                            <input class="border text-center wood_estimation_td_data" update-master="calculation" min="0" type="number" ng-model="calculation.detail_price" > 
                        </td>
                        <td class="text-left wood_estimation_td">
                            <input class="border text-center wood_estimation_td_data" update-master="calculation"  min="0" type="number" ng-model="calculation.statistic_price" > 
                        </td>
                        <td class="text-left wood_estimation_td">
                            <input class="border text-center wood_estimation_td_data" update-master="calculation"  min="0" type="number" ng-model="calculation.cad_cam_price" > 
                        </td>
                        <td class="text-left wood_estimation_td">
                            <input class="border text-center wood_estimation_td_data text-left" update-master="calculation"  min="0" type="number" ng-model="calculation.logistic_price"> 
                        </td>
                        <td class="text-center wood_estimation_td"><small> @{{ calculation.total_sum }}</small></td>
                        <td class="text-left wood_estimation_td">
                           <i ng-show="calculation.status == '1'"  ng-click="deleteCalculation(calculation.id)" class="fa fa-refresh text-danger bg-light shadow-sm border p-1"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section> 
@endsection
@push('custom-scripts') 
    <script>
        app.controller('WoodEstimateController', function($scope, $http,API_URL){
            $http.get(`${API_URL}get-for-cost-estimate`).then((res) => {
                $scope.buildingComponents = res.data;
            });

            $http.get(`${API_URL}get-delivery-type`).then((res) => {
                $scope.deliveryTypes = res.data;
            });

            $http.get(`${API_URL}wood-estimation-values`).then((res) => {
                    $scope.calculations = res.data.map( (item) => {
                        return { ...item, ...{
                            detail_price: Number(item.detail_price),
                            detail_sum: Number(item.detail_sum),
                            statistic_price: Number(item.statistic_price),
                            statistic_sum:Number(item.statistic_sum),
                            cad_cam_price: Number(item.cad_cam_price),
                            cad_cam_sum:Number(item.cad_cam_sum),
                            logistic_price: Number(item.logistic_price),
                            logistic_sum: Number(item.logistic_sum),
                            total_price:Number(item.total_price)}
                        }
                    });
            });

            $scope.deleteCalculation =  (id) => {
                $http.delete(`${API_URL}admin/cal-wood-estimation/${id}`).then((res) => {
                    if(res.data.status) {
                        Message('success',res.data.msg);
                        $scope.calculations = $scope.calculations.map((obj) => {
                            if (obj.component_id == res.data.data.component_id && obj.type_id == res.data.data.type_id) {
                                return {...obj, ...{
                                            detail_price: 0,
                                            detail_sum: 0,
                                            statistic_price: 0,
                                            statistic_sum:0,
                                            cad_cam_price:0,
                                            cad_cam_sum:0,
                                            logistic_price:0,
                                            logistic_sum: 0,
                                            total_price:0,
                                            total_sum:0,
                                            status: 2
                                        }
                                    }
                                };
                            
                            return obj;
                        });
                    }
                });
            }
            function getWoodEstimates() {
                $http.get(`${API_URL}wood-estimate`).then((res)=> {
                    $scope.woodEstimations = res.data; 
                });
            }
            getWoodEstimates();

            $scope.toggleModalForm = function (modalstate, id) {
                $scope.modalstate = modalstate;
                switch (modalstate) {
                    case 'add':
                        $scope.form_title = "Create Task";
                        $scope.form_color = "primary";
                        $scope.modalstate   =   'add'
                        $scope.task_list_item = {};
                        $('#woodestimate-form-popup').modal('show');
                        break;
                    case 'edit':
                        $scope.form_title = "Edit Task";
                        $scope.form_color = "success";
                        $scope.id = id; 
                        $scope.task_list_item = {};
                        $http.get(`${API_URL}wood-estimate/${id}`)
                            .then(function (response) {
                                $scope.wood_estimate_item = response.data.data;
                                $('#woodestimate-form-popup').modal('show');
                            });
                        break;
                    
                    default:
                        break;
                } 
            }

            $scope.storeModalWoodForm = (modalstate, id) => { 
                $http({
                    method: `${modalstate == 'edit' ? 'PUT' : 'POST'}`,
                    url: `${API_URL}wood-estimate${modalstate == 'edit' ? '/'+id : ''}`,
                    data:$.param($scope.wood_estimate_item),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function successCallback(response) {
                    $('#woodestimate-form-popup').modal('hide');
                    Message('success',response.data.msg);
                    $scope.wood_estimate_item = {};
                    getWoodEstimates();
                }, function errorCallback(response) {
                    Message('danger',response.data.errors.name[0]);
                });
            }

            $scope.changeWoodEstimateStatus = (id , params) =>{
                $http({
                    method: "put",
                    url: `${API_URL}wood-estimate/${id}/status`,
                    data: $.param({'is_active':params == 1 ? 0 : 1}),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function (response) {
                    getWoodEstimates();
                    Message('success',response.data.msg);
                }), (function (error) {
                    console.log(error);
                });
            }

            $scope.delete   =   (id) => {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if(willDelete) {
                        $http.delete(`${API_URL}wood-estimate/${id}`).then(function (response) {
                            getWoodEstimates();
                            Message('success',response.data.msg);
                        }); 
                    }
                });
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#ddlCountry,#ddlAge").on("change", function () {
                var country = $('#ddlCountry').find("option:selected").val();
                var age = $('#ddlAge').find("option:selected").val();
                SearchData(country, age)
            });
        });
        function reset_dropdown()   {
            $("#ddlCountry")[0].selectedIndex = 0;  
            $("#ddlAge")[0].selectedIndex = 0;  
            $('#table11 tbody tr').show();
        }
        function SearchData(selectComponent, selectType) {
            if (selectComponent.toUpperCase() == 'ALL' && selectType.toUpperCase() == 'ALL') {
                $('#table11 tbody tr').show();
            } else {
                $('#table11 tbody tr:has(td)').each(function () {
                    var component = $.trim($(this).find('td:eq(1)').text());
                    var type = $.trim($(this).find('td:eq(2)').text());
                    if(selectType == '' && selectComponent == component){
                        $(this).show();
                    } else if(selectComponent == '' && selectType == type ){
                        $(this).show();
                    }else if (selectComponent.toUpperCase() != 'ALL' && selectType.toUpperCase() != 'ALL') {
                        if (component.toUpperCase() == selectComponent.toUpperCase() && type == selectType) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    } else if ($(this).find('td:eq(0)').text() != '' || $(this).find('td:eq(1)').text() != '') {
                        if (selectComponent != 'all') {
                            if (selectComponent.toUpperCase() == component.toUpperCase()) {
                                $(this).show();
                            } else {
                                $(this).hide();
                            }
                        }
                        if (selectType != 'all') {
                            if (selectType == type) {
                                $(this).show();
                            }
                            else {
                                $(this).hide();
                            }
                        }
                    }
                });
            }
        }
    </script>
@endpush