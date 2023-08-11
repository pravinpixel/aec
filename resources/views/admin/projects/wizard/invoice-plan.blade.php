<form id="invoicePlan" name="invoicePlanForm" ng-submit="handleSubmitInvoicePlan()">
    <div class="card m-0">
        <div class="card-body">
            <table class="table custom table-bordered mb-2">
                <thead>
                    <tr>
                        <th class="fw-normal"><i class="me-2 fa fa-calendar"></i> Start date</th>
                        <th class="fw-normal"><i class="me-2 fa fa-calendar"></i> End date</th>
                        <th class="fw-normal"><i class="me-2 fa fa-usd"></i> Project Cost</th>
                        <th class="fw-normal text-center"><i class="me-2 fa fa-file-text"></i>No.of Invoices</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td ng-bind="project.start_date"></td>
                        <td ng-bind="project.delivery_date"></td>
                        <td>
                            <input type="text" class="form-control-sm border rounded w-100"
                                onkeypress="return isNumber(event)" ng-model="project.project_cost"
                                placeholder="type here..">
                        </td>
                        <td>
                            <div class="input-group justify-content-center">
                                <input type="number" class="form-control-sm border rounded" min=1 max=100
                                onkeypress="return isNumber(event)"  ng-model="project.no_of_invoice">
                                <button type="button" ng-click="handleInvoiceChange()" class="btn-sm btn btn-success"><i class="fa fa-refresh"></i> Generate</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table> 
            <table class="table border table-hover m-0" ng-if="invoicePlans.invoices.length > 0">
                <thead class="bg-light">
                    <tr>
                        <th class="text-center">S.No</th>
                        <th class="text-center">24/7 Project</th>
                        <th class="text-center">24/7 Invoice Name <span class="text-danger">*<span></th>
                        <th class="text-center">Invoice Date <span class="text-danger">*<span></th>
                        <th class="text-end">Amount</th>
                        <th class="text-end">Percentage %</th>
                    </tr>
                </thead>
                <tbody calculate-amount>
                    <tr ng-repeat="invoicePlan in invoicePlans.invoices track by $index">
                        <td class="text-center" ng-bind="invoicePlan.index"></td>
                        <td class="text-center">
                            <select ng-model="invoicePlan.project_24_id" class="form-select-sm form-select" ng-required="true">
                                <option ng-value="product24.Id" value="@{{ product24.Id }}"
                                    ng-repeat="product24 in project24SevenList" ng-bind="product24.Name"> </option>
                            </select>
                        </td>
                        <td>
                            <input type="text" ng-model="invoicePlan.invoice_name" class="form-control form-control-sm" placeholder="Type here..."   ng-required="true" />
                        </td>
                        <td>
                            <md-datepicker ng-model="invoicePlan.invoice_date" md-placeholder="Invoice date" />
                        </td>
                        <td class="text-end" ng-bind="invoicePlan.amount"></td>
                        <td class="text-end">
                            <input ng-if="!(invoicePlans.invoices.length == $index + 1)" 
                                ng-required="true"
                                type="text" 
                                select-on-click 
                                onkeypress="return isNumber(event)" name="percentage"
                                ng-model="invoicePlan.percentage"
                                class="text-end w-50 border form-control-sm"
                            />
                            <span ng-if="invoicePlans.invoices.length == $index + 1" ng-bind="invoicePlan.percentage"></span>
                        </td>
                    </tr>
                    <tfoot>
                        <tr>
                            <th class="text-end" ng-bind="project.project_cost" colspan="5"></th>
                            <th class="text-end">100%</th>
                        </tr>
                    <tfoot>
            </table>
        </div>
    </div>
    <div class="card-footer text-end">
        <a href="#!/team-setup" class="btn btn-light float-start">Prev</a>
        <input ng-disabled="invoicePlanForm.$invalid" class="btn btn-primary" type="submit" name="submit"
            value="Next" />
    </div>
</form>
<style>
    .datepicker-inline,
    .datepicker-inline table {
        width: 100% !important;
    }

    .datepicker td {
        border-radius: 0 !important
    }
</style>
<style>
    .Invoice_Plan .timeline-step .inner-circle {
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style>
