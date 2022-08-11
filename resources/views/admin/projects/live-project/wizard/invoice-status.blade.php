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
                        <div class="form-control form-control-sm  border-0  ng-binding">  @{{review.project.start_date | date: 'dd-MM-yyyy' }}</div>  
                    </div> 
                </div>
              
            </div>
            <div class="col-6">
                 <div class="row m-0 align-items-center">
                    <div class="col-3  p-0">
                        <label class="col-form-label">No.of Invoices</label>
                    </div>
                    <div class="col pe-0"> 
                        <div class="form-control form-control-sm  border-0  ng-binding"> @{{review.invoice_plan.no_of_invoice}}</div>  
                    </div> 
                </div>
                <div class="row m-0 align-items-center">
                    <div class="col-3  p-0">
                        <label class="col-form-label">Project End Date</label>
                    </div>
                    <div class="col pe-0"> 
                        <div class="form-control form-control-sm  border-0  ng-binding">  @{{review.project.delivery_date | date: 'dd-MM-yyyy' }}</div>  
                    </div> 
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-4">
               <div class="card">
                  <table class="text-center  m-0  table table-bordered" >
                    <tr>
                        <th colspan="2" > Overall Amount</th>
                    </tr>
                    <tr>
                        <th> Count</th>
                        <th> paid</th>
                    </tr>
                    <tr>
                        <td> 1</td>
                        <td> 100</td>
                    </tr>
                    
                  </table>
               </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <table class="text-center  m-0  table table-bordered" >
                        <tr>
                            <th colspan="2" > paid Amount</th>
                        </tr>
                        <tr>
                            <th> Count</th>
                            <th> paid</th>
                        </tr>
                        <tr>
                            <td> 1</td>
                            <td> 100</td>
                        </tr>
                  </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <table class="text-center m-0  table table-bordered" >
                        <tr>
                            <th colspan="2" > Unpaid Amount</th>
                        </tr>
                        <tr>
                            <th> Count</th>
                            <th> paid</th>
                        </tr>
                        <tr>
                            <td> 1</td>
                            <td> 100</td>
                        </tr>
                    </table>
                </div>
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