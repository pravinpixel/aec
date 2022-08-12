<div class="row my-2 mx-3 align-items-center">
    <div class="col-6">
        <div class="row m-0 align-items-center">
            <div class="col-4 p-0">
                <label class="col-form-label">Project Cost</label>
            </div>
            <div class="col pe-0"> 
                <div class="form-control form-control-sm  border-0  ng-binding">@{{review.invoice_plan.project_cost}}</div>  
            </div> 
        </div>
        <div class="row m-0 align-items-center">
            <div class="col-4 p-0">
                <label class="col-form-label">Project Start Date</label>
            </div>
            <div class="col pe-0"> 
                <div class="form-control form-control-sm  border-0  ng-binding"> @{{project.start_date  | date: 'dd-MM-yyyy' }}</div>  
            </div> 
        </div>
        
    </div>
    <div class="col-6">
            <div class="row m-0 align-items-center">
            <div class="col-3  p-0">
                <label class="col-form-label">No.of Invoices</label>
            </div>
            <div class="col pe-0"> 
                <div class="form-control form-control-sm  border-0  ng-binding">@{{review.invoice_plan.no_of_invoice}}</div>  
            </div> 
        </div>
        <div class="row m-0 align-items-center">
            <div class="col-3  p-0">
                <label class="col-form-label">Project End Date</label>
            </div>
            <div class="col pe-0"> 
                <div class="form-control form-control-sm  border-0  ng-binding"> @{{project.delivery_date  | date: 'dd-MM-yyyy' }}</div>  
            </div> 
        </div>
    </div>
</div> 
<table class="table custom m-0 custom table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Invoice Date</th>
            <th class="text-center">Amount</th>
            <th class="text-center">Percentage %</th>
        </tr>
    </thead>
    <tbody>
        <tr ng-repeat="row in review['invoice_plan'].invoice_data.invoices">
            <td class="text-center"> @{{ $index + 1 }} </td>
            <td class="text-center">@{{ row.invoice_date | date: 'dd-MM-yyyy' }}</td>
            <td class="text-center">@{{ row.amount }}</td>
            <td class="text-center">@{{ row.percentage }}</td>
        </tr> 
        <tr ng-show="review['invoice_plan'].invoice_data.length == 0">
            <td class="text-center" colspan="4"> No data found </td>
        </tr> 
    </tbody>
</table>