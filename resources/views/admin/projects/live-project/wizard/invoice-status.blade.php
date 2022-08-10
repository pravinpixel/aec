{{--<div class="p-2">
    <div class="card border-primary border my-3 col-md-6 mx-auto">
        <div class="card-body">
            <h5 class="card-title h3 text-primary">Invoice Overview </h5>
            <p class="card-text">Status From 24/7</p>
        </div>
    </div>
</div>--}}
<div class="card m-0">
    <div class="card-body">
        <div class="row mb-3 align-items-center">
            <div class="col-6">
                <div class="row align-items-center mb-2 m-0">
                    <div class="col-3"><strong>Project Cost</strong></div>
                    <div class=" col-9">@{{review.invoice_plan.project_cost}}</div>
                </div>
                <div class="row align-items-center mb-2 m-0">
                    <div class="col-3"><strong>No.of Invoices</strong></div>
                    <div class=" col-9"> @{{review.invoice_plan.no_of_invoice}}</div>
                </div>
                <div class="row  align-items-center mb-2 m-0">
                    <div class="col-3"><strong>Project Start Date</strong></div>
                    <div class=" col-9 position-relative">
                       
                        @{{review.project.start_date | date: 'dd-MM-yyyy' }}
                    </div>
                </div>
                <div class="row align-items-center mb-2 m-0">
                    <div class="col-3"><strong>Project End Date</strong></div>
                    <div class="col-9 position-relative">
                       
                        @{{review.project.delivery_date | date: 'dd-MM-yyyy' }}
                    </div>
                </div>
            </div>
            <div class="col-6 row">
                <div class="col text-center">
                    <span class=""><strong>Paid</strong></span>
                    <div class="pie animate" style="--p:90;--c:lightgreen"> 90%</div>
                </div>
                <div class="col text-center">
                    <span class=""><strong>UnPaid</strong></span>
                    <div class="pie animate" style="--p:80;--c:purple"> 80%</div>
                </div>
                <div class="col text-center">
                    <span class=""><strong>Pending</strong></span>
                    <div class="pie animate" style="--p:70;--c:orange"> 70%</div>
                </div>
            </div>
           

           
            <div class="col-4 text-center">
                <div data-provide="datepicker-inline"></div>
            </div>
        </div> 
        <table class="table custom m-0 custom table-bordered">
            <thead>
                <tr>
                    <th class="text-center">S.No</th>
                    <th class="text-center">Invoice Date <span class="text-danger">*<span></th>
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
    </div>
    
</div>
<div class="card-footer text-end">
    <a href="#!@{{ PrevRoute }}" ng-show="indexRoute" class="btn btn-light float-start">Prev</a>
    <a href="#!@{{ NextRoute }}" ng-show="HideNextRoute" class="btn btn-primary">Next</a>
    <a href="#" ng-show="SubmitRoute" class="btn btn-primary">Submit & Save</a>
</div>
<style>
    @property --p{
  syntax: '<number>';
  inherits: true;
  initial-value: 1;
}

.pie {
  --p:20;
  --b:22px;
  --c:darkred;
  --w:150px;

  width: var(--w);
  aspect-ratio: 1;
  position: relative;
  display: inline-grid;
  margin: 5px;
  place-content: center;
  font-size: 25px;
  font-weight: bold;
  font-family: sans-serif;
}
.pie:before,
.pie:after {
  content: "";
  position: absolute;
  border-radius: 50%;
}
.pie:before {
  inset: 0;
  background:
    radial-gradient(farthest-side,var(--c) 98%,#0000) top/var(--b) var(--b) no-repeat,
    conic-gradient(var(--c) calc(var(--p)*1%),#0000 0);
  -webkit-mask: radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
          mask: radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
}
.pie:after {
  inset: calc(50% - var(--b)/2);
  background: var(--c);
  transform: rotate(calc(var(--p)*3.6deg)) translateY(calc(50% - var(--w)/2));
}
.animate {
  animation: p 1s .5s both;
}
.no-round:before {
  background-size: 0 0, auto;
}
.no-round:after {
  content: none;
}
@keyframes p{
  from{--p:0}
}
    </style>