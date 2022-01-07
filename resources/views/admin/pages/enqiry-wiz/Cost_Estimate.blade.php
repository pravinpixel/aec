<form class="card shadow-none p-0" >
    <div class="card-header pb-2 p-3 text-center border-0">
        <h4 class="header-title text-secondary">Estimation for <span class="text-primary">@{{ E.enquiry_number }}</span> | <span class="text-success">@{{ E.project_name }}</span> | <span class="text-info">@{{ E.customer.contact_person }}</span></h4>
    </div>
    <div class="card-body pt-0 p-0">
        <table class="table shadow-none border m-0 table-bordered ">
            <thead class="bg-light">
                <tr>
                    <th>Enquiry Date</th>
                    <th>Person Contact</th>
                    <th>Type of Project</th>
                    <th>Enquiry Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>@{{ E.enquiry_date }}</td>
                    <td>@{{ E.customer.contact_person }}</td>
                    <td>New Construction</td>
                    <td>In Estimation</td>
                </tr>
            </tbody>
        </table>
        <div class="row m-0 mt-3" >
            <table class="table table-bordered border">
                <thead>
                    <tr class="bg-light-primary">
                        <td colspan="15" class="text-center text-primary"><h5>Engineering Estimation</h5></td>
                    </tr>
                    <tr class="font-weight-bold ">
                        <th>Component</th>
                        <th>Type</th>
                        <th>Sq.M</th>
                        <th>Complexity</th>
                        <th colspan="2">Details</th>
                        <th colspan="2">Statistics</th>
                        <th colspan="2">CAD/CAM</th>
                        <th colspan="2">Logistics</th>
                        <th colspan="2">Total Cost</th>
                        <td colspan="2">Action</td>
                    </tr>
                    <tr class="bg-light-primary border" >
                        <th colspan="4"></th>
                        <th ><small>Price/M2</small></th>
                        <th ><small>Sum</small></th> 
                        <th ><small>Price/M2</small></th>
                        <th ><small>Sum</small></th> 
                        <th ><small>Price/M2</small></th>
                        <th ><small>Sum</small></th> 
                        <th ><small>Price/M2</small></th>
                        <th ><small>Sum</small></th> 
                        <th ><small>Price/M2</small></th>
                        <th ><small>Sum</small></th> 
                        <th>
                             <i class="fa fa-plus text-light btn-sm btn"  ng-click="create()"></i> 
                        </th>
                    </tr>
                </thead>
                <tbody >
                    <tr ng-repeat="(index,C) in CostEstimate" > 
                        <td>
                            <select class="form-select select" data-toggle="select">
                                <option>-- Select --</option>
                                <option value="External"  >External</option>
                                <option value="Internal">Internal</option>
                                <option value="Ground Floor" >Ground Floor</option>
                                <option value="Roof" >Roof</option>
                                <option value="Loadbearing" >Loadbearing</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select select">
                                <option>-- Select --</option>
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                                <option value="OR">Oregon</option>
                                <option value="WA">Washington</option>
                            </select>
                        </td>
                        <td><input  type="number" class="my-control"></td>
                        <td><input  type="number" class="my-control"></td>
                        {{-- Details --}}
                        <td><input  type="number" class="my-control"></td>
                        <td><input  type="number" class="my-control"></td>
                        {{-- Statistics --}}
                        <td><input  type="number" class="my-control"></td>
                        <td><input  type="number" class="my-control"></td>
                        {{-- CAD/CAM --}}
                        <td><input  type="number" class="my-control"></td>
                        <td><input  type="number" class="my-control"></td>
                        {{-- Logistics --}}
                        <td><input  type="number" class="my-control"></td>
                        <td><input  type="number" class="my-control"></td>
                        {{-- Total Cost --}}
                        <td><input  type="number" class="my-control"></td>
                        <td><input  type="number" class="my-control"></td>
                        <td class="text-center">
                            <i ng-click="delete(index)" class="fa fa-trash btn btn-sm text-danger"></i>
                        </td>
                    </tr>
                    <tr>
                        {{-- <td colspan="4" class="bg-light-primary border">Sub Totals</td>
                        <td>@{{  }}</td>
                        <td>@{{  }}</td>
                        <td>@{{  }}</td>
                        <td>@{{  }}</td>
                        <td>@{{  }}</td>
                        <td>@{{  }}</td>
                        <td>@{{  }}</td>
                        <td>@{{  }}</td>
                        <td>@{{  }}</td>
                        <td>{{ total }}</td> --}}
                    </tr> 
                </tbody>
                
            </table>
             
            <div class="col-12 shadow text-dark bg-white border p-2 rounded">
                <h4 class="m-0"><span class="text-secondary">Total Cost :</span>    <b>XXXXX</b> </h4>
            </div>
        </div>
    </div>
    <div class="card-footer border-0">
        <div class="row m-0">
            <div class="col-md-8 p-0">
                <div class="input-group ">
                    <label class="input-group-text bg-white font-weight-bold" for="inputGroupSelect01">Assign to</label>
                    <select class="form-select border" id="inputGroupSelect01">
                      <option selected>Choose...</option>
                      <option value="1">User One</option> 
                      <option value="1">User Two</option> 
                      <option value="1">User Three</option> 
                    </select>
                    <label class="input-group-text btn btn-info" for="inputGroupSelect01">Send</label>
                </div>
            </div>
            <div class="col-md-4 p-0">
                <div class="text-end">
                    <button type="reset" class="btn btn-light font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
                    <a class="btn btn-success" onclick="submit()" href=""><i class="uil-sync"></i> Update</a>
                </div>
            </div>
        </div>
         
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <div>
                <a href="#!/Technical_Estimate" class="btn btn-outline-primary">Prev</a>
            </div>
            <div>
                <a href="#!/Project_Schedule" class="btn btn-primary">Next</a>
            </div>
        </div>
    </div> 
</form>

<style>
  
    .table tbody tr td {
        padding: 2px !important
    }
    .my-control {
        border-radius: 0 !important;
        display: flex !important;
        justify-content: center ;
        align-content: center ;
        width: 100%;
        height: 100%;
        margin: 0 !important;
        border: 1px !important;
        outline: 0 !important;
    }
    .form-select {
       padding: 2px 2px 2px 10px !important;
       /* border:0px !important; */
       min-width: 120px !important;
       background-size: 9px 14px !important;
       font-size: 12px !important;
    }
    .form-select option {
        appearance: none !important;
    }
    
</style>
@if (Route::is('admin-Cost_Estimate-wiz')) 
    <style>
        .admin-Cost_Estimate-wiz .timeline-step .inner-circle{
            background: #757CF2 !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        }
    </style>
@endif