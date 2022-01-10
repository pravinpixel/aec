<div class="row mx-0 mt-3 ">
    <div class="col-lg-9 p-0">
        <div class="card shadow-none p-0">
            <div class="card-header ">
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
                </div>
            </div>
            <div class="card-body ">
                <table class="table m-0 table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th>Component Name</th>
                            <th>Type of component</th>
                            <th>Sq. Mt. Estimate</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                            <td>Exterior Wall</td>
                            <td>
                                <select name="" id="" class="form-select">
                                    <option value="">Panel</option>
                                    <option value="">Precut</option>
                                    <option value="">Panel</option>
                                    <option value="">Precut</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control"></td>
                            <td class="text-center">
                                <a href="" class="btn text-primary"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Interior Wall</td>
                            <td>
                                <select name="" id="" class="form-select">
                                    <option value="">Panel</option>
                                    <option value="">Precut</option>
                                    <option value="">Panel</option>
                                    <option value="">Precut</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control"></td>
                            <td class="text-center">
                                <a href="" class="btn text-primary"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1st Floor Wall</td>
                            <td>
                                <select name="" id="" class="form-select">
                                    <option value="">Panel</option>
                                    <option value="">Precut</option>
                                    <option value="">Panel</option>
                                    <option value="">Precut</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control"></td>
                            <td class="text-center">
                                <a href="" class="btn text-primary"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Roof</td>
                            <td>
                                <select name="" id="" class="form-select">
                                    <option value="">Panel</option>
                                    <option value="">Precut</option>
                                    <option value="">Panel</option>
                                    <option value="">Precut</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control"></td>
                            <td class="text-center">
                                <a href="" class="btn text-primary"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>   
                        <tr>
                            <td>Flooring</td>
                            <td>
                                <select name="" id="" class="form-select">
                                    <option value="">Panel</option>
                                    <option value="">Precut</option>
                                    <option value="">Panel</option>
                                    <option value="">Precut</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control"></td>
                            <td class="text-center">
                                <a href="" class="btn text-primary"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr> 
                    </tbody> 
                </table>
                <button class="btn btn-outline-primary mt-3"><i class="fa fa-plus"></i> Add Component</button>

            </div>
            <div class="card-footer ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="input-group ">
                            <label class="input-group-text bg-white font-weight-bold" for="inputGroupSelect01">Assign to</label>
                            <select class="form-select" id="inputGroupSelect01">
                              <option selected>Choose...</option>
                              <option value="1">User One</option> 
                              <option value="1">User Two</option> 
                              <option value="1">User Three</option> 
                            </select>
                            <label class="input-group-text btn btn-info" for="inputGroupSelect01">send</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-end">
                            <button type="reset" class="btn btn-outline-secondary font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
                            <a class="btn btn-success" onclick="submit()" href=""><i class="uil-sync"></i> Update</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="border bg-white shadow p-3">
            <h4 class="text-center border-bottom pb-2 ">Reference Doc's </h4>
            <div class="alert alert-primary" role="alert">
               
                <div class="d-flexs ">
                    <div>
                        <strong>01/04/2021  - </strong> 
                        <div>Site plan diagram</div>
                    </div>
                    <div class="mt-2">
                        <a href=""  style="border-radius: 0px !important" class="btn btn-primary btn-sm"data-bs-toggle="modal" data-bs-target="#right-modal"><i class="uil-comment-alt-lines"></i></a>
                        <a href=""  style="border-radius: 0px !important" class="btn btn-outline-primary btn-sm" ><i class=" fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <div class="alert alert-primary" role="alert">
               
                <div class="d-flexx">
                    <div>
                        <strong>01/04/2021  - </strong> 
                        <div>Site plan diagram</div>
                    </div>
                    <div class="mt-2">
                        <a href=""  style="border-radius: 0px !important" class="btn btn-primary btn-sm"data-bs-toggle="modal" data-bs-target="#right-modal"><i class="uil-comment-alt-lines"></i></a>
                        <a href=""  style="border-radius: 0px !important" class="btn btn-outline-primary btn-sm" ><i class=" fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <div class="alert alert-primary" role="alert">
               
                <div class="d-flexx ">
                    <div>
                        <strong>01/04/2021  - </strong> 
                        <div>Site plan diagram</div>
                    </div>
                    <div class="mt-2">
                        <a href=""  style="border-radius: 0px !important" class="btn btn-primary btn-sm"data-bs-toggle="modal" data-bs-target="#right-modal"><i class="uil-comment-alt-lines"></i></a>
                        <a href=""  style="border-radius: 0px !important" class="btn btn-outline-primary btn-sm" ><i class=" fa fa-eye"></i></a>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <div>
                <a href="#!/Project_Info" class="btn btn-outline-primary">Prev</a>
            </div>
            <div>
                <a href="#!/Cost_Estimate" class="btn btn-primary">Next</a>
            </div>
        </div>
    </div> 
</div>

@if (Route::is('admin-Technical_Estimate-wiz'))
    <style>
        .admin-Technical_Estimate-wiz .timeline-step .inner-circle{
            background: #757CF2 !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        }
        .table tbody tr td {
            padding: 6px !important
        }
    </style>
@endif