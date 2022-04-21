<form id="invoicePlan" name="invoicePlanForm" ng-submit="handleSubmitInvoicePlan()">
<div class="card m-0">
    <div class="card-body">
        <div class="row mb-3 align-items-center">
            <div class="col-8">
                <div class="row align-items-center mb-2 m-0">
                    <div class="col-3"><strong>Project Cost</strong></div>
                    <div class=" col-9"><input calculate-amount type="text" class="form-control" onkeypress="return isNumber(event)"  ng-model="project.project_cost" placeholder="type here.."></div>
                </div>
                <div class="row align-items-center mb-2 m-0">
                    <div class="col-3"><strong>No.of Invoices</strong></div>
                    <div class=" col-9"><input type="number" class="form-control" onkeypress="return isNumber(event)"  ng-change="handleInvoiceChange()" ng-model="project.no_of_invoice" placeholder="type here.."></div>
                </div>
                <div class="row align-items-center mb-2 m-0">
                    <div class="col-3"><strong>Project Start Date</strong></div>
                    <div class=" col-9"><input type="date" class="form-control" ng-model="project.start_date" placeholder="type here.."></div>
                </div>
                <div class="row align-items-center mb-2 m-0">
                    <div class="col-3"><strong>Project End Date</strong></div>
                    <div class=" col-9"><input type="date" class="form-control" ng-model="project.delivery_date" placeholder="type here.."></div>
                </div>
            </div>
            <div class="col-4 text-center">
                <div data-provide="datepicker-inline"></div>
            </div>
        </div> 
        <table class="table m-0 custom table-bordered">
            <thead>
                <tr>
                    <th class="text-center">S.No</th>
                    <th class="text-center">Invoice Date</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Percentage %</th>
                </tr>
            </thead>
            
            <tbody calculate-amount>
                <tr ng-repeat="invoicePlan in invoicePlans track by $index">
                    <td class="text-center">@{{  invoicePlan.index }}</td>
                    <td class="text-center"><input required type="date" name="invoice_date" id="" ng-model="invoicePlan.invoice_date" class="form-control form-control-sm border-0 bg-none w-auto mx-auto"></td>
                    <td class="text-center">@{{ invoicePlan.amount }}</td>
                    <td class="text-center"><input required type="number" onkeypress="return isNumber(event)" name="percentage" ng-model="invoicePlan.percentage"  class="text-center form-control form-control-sm border-0 bg-none w-auto mx-auto"></td>
                </tr> 
                <tr>
                    <td class="text-center">@{{ invoicePlans.length + 1 }}</td>
                    <td class="text-center"></td>
                    <td class="text-center">@{{  project.project_cost - invoicePlans.totalAmount }}</td>
                    <td class="text-center">@{{ invoicePlans.totalPercentage }}</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                    <th class="text-center">@{{  project.project_cost }}</th>
                    <th class="text-center">100</th>
                </tr>
            <thead>
        </table>
    </div>
    
</div>
<div class="card-footer text-end">
    <a href="#!/project-scheduling" class="btn btn-light float-start">Prev</a>
    <input ng-disabled ="invoicePlanForm.$invalid" class="btn btn-primary" type="submit" name="submit" value="Next"/>
</div>
</form>
<style>
    .datepicker-inline , .datepicker-inline table {
        width: 100%  !important;
    }
    .datepicker td {
        border-radius: 0 !important
    }
</style>
<script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>
<script>
    $("#timepicker").timepicker({showSeconds:!0,icons:{up:"mdi mdi-chevron-up",down:"mdi mdi-chevron-down"},appendWidgetTo:"#timepicker-input-group1"}),$("#timepicker2").timepicker({showSeconds:!0,showMeridian:!1,icons:{up:"mdi mdi-chevron-up",down:"mdi mdi-chevron-down"},appendWidgetTo:"#timepicker-input-group2"}),$("#timepicker3").timepicker({showSeconds:!0,minuteStep:15,icons:{up:"mdi mdi-chevron-up",down:"mdi mdi-chevron-down"},appendWidgetTo:"#timepicker-input-group3"});
</script>