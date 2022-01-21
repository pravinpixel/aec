<form class="card shadow-none p-0" >
    <div class="card-header pb-2 p-3 text-center border-0">
        <h4 class="header-title text-secondary">Estimation for <span class="text-primary">@{{ enquiry.enquiry.enquiry_number }}</span> | <span class="text-success">@{{ enquiry.enquiry.project_name }}</span> | <span class="text-info">@{{ enquiry.customer_info.contact_person }}</span></h4>
    </div>
    <div class="card-body pt-0 p-0">
        <table class="table shadow-none border m-0 table-bordered">
            <thead class="bg-light">
                <tr >
                    <th style="background: #0071A8 !important">Enquiry Date</th>
                    <th style="background: #0071A8 !important">Project Name</th>
                    <th style="background: #0071A8 !important">Type of Project</th>
                    <th style="background: #0071A8 !important">Enquiry Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>@{{ enquiry.enquiry.enquiry_date }}</td>
                    <td>@{{ enquiry.enquiry.customer.contact_person }}</td>
                    <td>@{{ enquiry.enquiry.project_type.project_type_name  }}</td>
                    <td class="text-center"><span class="px-2 rounded-pill bg-success"><small class="text-white">In Estimation</small></span></td>
                </tr>
            </tbody>
        </table>
        <div class="row m-0 mt-3 " >
            <div class="table-responsive p-0">
                <table class="table table-bordered border">
                    <thead>
                        <tr  style="background: #0D2E67 !important">
                            <td colspan="16" class="text-center"><h5 class="m-0 py-1">Engineering Estimation</h5></td>
                        </tr>
                        <tr class="font-weight-bold ">
                            <th rowspan="2" class="text-center " style="background: #1d336b !important">
                                <span class="mb-1 font-12">Component</span>
                                <button class="btn-sm btn font-12 btn-info shadow-0 w-100 py-0" ng-click="create()"><i class="fa fa-plus"></i> Add </button>
                            </th>
                            <th rowspan="2" class="text-center font-12" style="background: #1d336b !important">Type</th>
                            <th rowspan="2" class="text-center font-12" style="background: #1d336b !important" >Sq.M</th>
                            <th class="text-center font-12" style="background: #1d336b !important" >1 to 2</th>
                            <th colspan="2" class="font-12 text-center" style="background: #0071A8 !important">Details</th>
                            <th colspan="2" class="font-12 text-center" style="background: #0071A8 !important">Statistics</th>
                            <th colspan="2" class="font-12 text-center" style="background: #0071A8 !important">CAD/CAM</th>
                            <th colspan="2" class="font-12 text-center" style="background: #0071A8 !important">Logistics</th>
                            <th colspan="2" class="font-12 text-center" style="background: #1d336b !important">Total Cost</th>
                            <td rowspan="2" class="font-12 text-center" style="background: #1d336b !important">Action</td>
                        </tr>
                        <tr class="bg-light-primary border" >
                            <th class="text-center font-12" style="background: #1d336b !important" >Complexity</th> 
                            <th class="text-center" style="background: #046b9e !important"><small>Nok/M<sup>2</sup></small></th>
                            <th class="text-center" style="background: #0571a7 !important"><small>Sum</small></th> 
                            <th class="text-center" style="background: #046b9e !important"><small>Nok/M<sup>2</sup></small></th>
                            <th class="text-center" style="background: #0571a7 !important"><small>Sum</small></th> 
                            <th class="text-center" style="background: #046b9e !important"><small>Nok/M<sup>2</sup></small></th>
                            <th class="text-center" style="background: #0571a7 !important"><small>Sum</small></th> 
                            <th class="text-center" style="background: #046b9e !important"><small>Nok/M<sup>2</sup></small></th>
                            <th class="text-center" style="background: #0571a7 !important"><small>Sum</small></th> 
                            <th class="text-center" style="background: #1d336b !important"><small>Nok/M<sup>2</sup></small></th>
                            <th class="text-center" style="background: #1d336b !important"><small>Sum</small></th>  
                        </tr>
                    </thead>
                    
                    <tbody >
                        <tr ng-repeat="(index,C) in CostEstimate" > 
                            <td>
                                <select class="form-select form-select-sm" id="floatingSelect" aria-label="Floating label select example" required>
                                        <option value="">-- Select ---</option>
                                        <option>-- Select --</option>
                                        <option value="External"  >External</option>
                                        <option value="Internal">Internal</option>
                                        <option value="Ground Floor" >Ground Floor</option>
                                        <option value="Roof" >Roof</option>
                                        <option value="Loadbearing" >Loadbearing</option>
                                </select>
                            </td>
                            <td style="padding: 0 !important">
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
                            {{-- <td style="padding: 0 !important">
                                <select class="form-select select" data-toggle="select">
                                    <option>-- Select --</option>
                                    <option value="External"  >External</option>
                                    <option value="Internal">Internal</option>
                                    <option value="Ground Floor" >Ground Floor</option>
                                    <option value="Roof" >Roof</option>
                                    <option value="Loadbearing" >Loadbearing</option>
                                </select>
                            </td>
                           --}}
                            <td style="padding:0px !important"><input  type="number" class="my-control"></td>
                            <td style="padding:0px !important"><input  type="number" class="my-control"></td>

                            {{-- Details --}}
                            <td style="background: #E5EEF4 !important">
                                <input  type="number" class="my-control"  style="background: #E5EEF4 !important">
                            </td>
                            <td style="background: #E5EEF4 !important">
                                <input  type="number" class="my-control"  style="background: #E5EEF4 !important">
                            </td>

                            {{-- Statistics --}}
                            <td style="background:  #E5EEF4 !important">
                                <input type="number" class="my-control" style="background: #E5EEF4 !important">
                            </td>
                            <td style="background:  #E5EEF4 !important">
                                <input  type="number" class="my-control" style="background: #E5EEF4 !important">
                            </td>

                            {{-- CAD/CAM --}}
                            <td style="background:  #E5EEF4 !important">
                                <input  type="number" class="my-control" style="background: #E5EEF4 !important">
                            </td>
                            <td style="background:  #E5EEF4 !important">
                                <input  type="number" class="my-control" style="background: #E5EEF4 !important">
                            </td>

                            {{-- Logistics --}}
                            <td style="background:  #E5EEF4 !important">
                                <input  type="number" class="my-control" style="background: #E5EEF4 !important">
                            </td>
                            <td style="background:  #E5EEF4 !important">
                                <input  type="number" class="my-control" style="background: #E5EEF4 !important">
                            </td>

                            {{-- Total Cost --}}
                            <td><input  type="number" class="my-control"></td>
                            <td><input  type="number" class="my-control"></td>
                            <td class="text-center" style="padding: 0 !important">
                                <i ng-click="delete(index)" class="fa fa-trash btn rounded-pill btn-sm btn-outline-danger px-1 py-0"></i>
                            </td>
                        </tr>
                        <tr class="text-white " style="background: #0D2E67"> 
                            <td colspan="2" class="text-center">
                                <b>Total</b>
                            </td>
                            <td class="font-12 text-end">01</td>
                            <td class="font-12 text-end">01</td>
                            <td class="font-12 text-end">01</td>
                            <td class="font-12 text-end">01</td>
                            <td class="font-12 text-end">01</td>
                            <td class="font-12 text-end">01</td>
                            <td class="font-12 text-end">01</td>
                            <td class="font-12 text-end">01</td>
                            <td class="font-12 text-end">01</td>
                            <td class="font-12 text-end">01</td>
                            <td class="font-12 text-end">01</td>
                            <td class="font-12 text-end">01</td>
                            <td class="text-center">-</td>
                        </tr> 
                    </tbody>
                </table>
            </div>
            
             
            <div class="col-12 shadow text-dark bg-white border p-2 rounded">
                <h4 class="m-0"><span class="text-secondary">Total Cost :</span> <b>XXXXX</b> </h4>
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
    .font-12 {
        font-size: 12px !important;
    }
    small {
        font-weight: lighter !important

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
        text-align: right !important;
        font-size: 12px !important;
    }
    .form-select {
       padding: 2px 2px 2px 10px !important;
       /* border:0px !important; */
       min-width: 100px !important;
       background-size: 9px 14px !important;
       font-size: 12px !important;
       cursor: pointer;

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