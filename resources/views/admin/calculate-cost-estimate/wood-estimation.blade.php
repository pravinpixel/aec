<table class="table text-center border shadow-sm m-0">
    <tr class="bg-success">
        <th colspan="9"><strong>Total Engineering Cost</strong></th>
    </tr>
    <tr>
        <th class="bg-light">Total Area m<sup>2<sup></th>
        <td class="bg-light">:</td>
        <td>@{{ ResultEngineeringEstimate.total.totalArea }}</td>
        <th class="bg-light">Pris / m<sup>2<sup></th>
        <td class="bg-light">:</td>
        <td>@{{ ResultEngineeringEstimate.total.totalPris }}</td>
        <th class="bg-light">Sum (kr)</th>
        <td class="bg-light">:</td>
        <td>@{{ ResultEngineeringEstimate.total.totalSum }} </td>
    </tr>
</table>
{{--    
    <table class="cost-estimate-total-table table table-borderless border table-sm">
        <thead>
            <tr style="background: var(--primary-bg) !important">
                <th colspan="3" class="text-center">
                    <h5 class="m-0 py-1 text-white">Total Engineering Cost</h5>
                </th>
            </tr>
            <tr>
                <th class="text-end"></th>
                <th class="text-end">Pris/m<sup>2<sup></th>
                <th class="text-end">Sum</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-end font-12 p-0"> <b> </b></td>
                <td class="text-end font-12 p-0"><b> @{{ ResultEngineeringEstimate.total.totalPris }}</b></td>
                <td class="text-end font-12 p-0"><b> @{{ ResultEngineeringEstimate.total.totalSum }}</b></td>
            </tr>
        </tbody>
    </table> --}}
 
<section id="wood-cost-estimate">
    {{-- ========= WOOD ESTIMATE TABLE ======== --}}
        @include('admin.calculate-cost-estimate.wood-estimate-table')
    {{-- ========= WOOD ESTIMATE TABLE ======== --}}
</section>
@if (Route::is('enquiry.calculate-cost-estimation'))
    <div ng-show=" EngineeringEstimate.length &&  wood_estimate_edit_id == false && price_calculation == 'wood_engineering_estimation'"
        class="d-flex">
        <div class="col-2">
            Name
        </div>
        <div class="col">
            <input type="text" class="form-control" ng-model="wood_estimate_name" name="wood_estimate_name">
        </div>
        <div class="col text-end">
            <a class="btn btn-danger" ng-click="createNewCalculation('wood')"><i class="uil-sync"> </i>Clear</a>
            <button class="btn btn-info" ng-click="EstimateStore('wood')">Generate</button>
        </div>

    </div>
    <div ng-show="EngineeringEstimate.length &&  wood_estimate_edit_id && price_calculation == 'wood_engineering_estimation'" class="d-flex">
        <div class="col-2">
            Name
        </div>
        <div class="col">
            <input type="text" class="form-control" ng-model="wood_estimate_name" name="wood_estimate_name">
        </div>
        <div class="col text-end">
            <a class="btn btn-danger" ng-click="createNewCalculation('wood')"><i class="uil-sync"> </i>Clear</a>
            <button class="btn btn-info" ng-click="EstimateUpdate(wood_estimate_edit_id, 'wood')">Update
                Estimation</button>
        </div>
    </div>
    <div class="m-0">
        <h3 class="my-2">Wood Estimation List</h3>
        @include('admin.calculate-cost-estimate.wood-list')
    </div>
@endif 