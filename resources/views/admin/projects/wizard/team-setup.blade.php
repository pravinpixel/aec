<div class="card-body">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#Sharepoint" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                <span class="d-none d-md-block">Sharepoint</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#BIM-360" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                <span class="d-none d-md-block">BIM 360</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#Project-Leader" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                <span class="d-none d-md-block">Project Leader</span>
            </a>
        </li>
    </ul>
    <div class="tab-content border border-top-0">
        <div class="tab-pane p-3 show active" id="Sharepoint">
            <div class="col-md-10 mx-auto">
                <table class="custom table-bordered table border m-0">
                    <thead>
                        <tr>
                            <th class="text-center">S.No</th>
                            <th class="text-center">Folder Name</th>
                            <th class="text-center">Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">Project Management</td>
                            <td class="text-center">
                                <div>
                                    <input type="checkbox" id="switch3" data-switch="none"/>
                                    <label for="switch3" class="border" data-on-label="" data-off-label=""></label>
                                </div>
                            </td> 
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-center">Engineering</td>
                            <td class="text-center">
                                <div>
                                    <input type="checkbox" id="switch4" data-switch="none"/>
                                    <label for="switch4" class="border" data-on-label="" data-off-label=""></label>
                                </div>
                            </td> 
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-center">Customer Input</td>
                            <td class="text-center">
                                <div>
                                    <input type="checkbox" id="switch5" data-switch="none"/>
                                    <label for="switch5" class="border" data-on-label="" data-off-label=""></label>
                                </div>
                            </td> 
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-center">Procurement</td>
                            <td class="text-center">
                                <div>
                                    <input type="checkbox" id="switch46" data-switch="none"/>
                                    <label for="switch46" class="border" data-on-label="" data-off-label=""></label>
                                </div>
                            </td> 
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-center">CAD settings</td>
                            <td class="text-center">
                                <div>
                                    <input type="checkbox" id="switch7" data-switch="none"/>
                                    <label for="switch7" class="border" data-on-label="" data-off-label=""></label>
                                </div>
                            </td> 
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card my-3">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <strong>Employee Name</strong>
                        </div>
                        <div class="col-10">
                            <div class="input-group">
                                <select name="" id="" class="form-select me-1"placeholder="Default Role">
                                    <option value="">Sales</option>
                                    <option value="">Admin</option>
                                </select>
                                <input type="text" class="form-control me-1" placeholder="Display">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2">
                            <strong>Access Level</strong>
                        </div>
                        <div class="col-10">
                            <div class="input-group justify-content-between">
                               <label class="mx-2" for="Add">Add<input type="checkbox" name="" id="Add" class="form-check-input ms-1"></label>
                               <label class="mx-2" for="Delete">Delete<input type="checkbox" name="" id="Delete" class="form-check-input ms-1"></label>
                               <label class="mx-2" for="Edit">Edit<input type="checkbox" name="" id="Edit" class="form-check-input ms-1"></label>
                               <label class="mx-2" for="comments">comments<input type="checkbox" name="" id="comments" class="form-check-input ms-1"></label>
                               <label class="mx-2" for="Download">Download<input type="checkbox" name="" id="Download" class="form-check-input ms-1"></label>
                               <label class="mx-2" for="View">View<input type="checkbox" name="" id="View" class="form-check-input ms-1"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-body">
                    <table class="table custom table-bordered m-0">
                        <thead>
                            <tr>
                                <th class="text-center" rowspan="2">S.No</th>
                                <th class="text-center" rowspan="2">Employee ID</th>
                                <th class="text-center" rowspan="2">Employee</th>
                                <th class="text-center" rowspan="2">Email</th>
                                <th class="text-center" rowspan="2">Role</th>
                                <th class="text-center" colspan="6">Access Level</th>
                                <th class="text-center" rowspan="2">Action</th>
                            </tr>
                            <tr> 
                                <th class="text-center">Add</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                                <th class="text-center">View</th>
                                <th class="text-center">comments</th>
                                <th class="text-center">Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($key=0;$key<5;$key++)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>EA01</td>
                                    <td>xxxx</td>
                                    <td>testing@gmail.com</td>
                                    <td>XXX</td>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" name="" id=""></td>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" name="" id="" checked></td>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" name="" id=""></td>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" name="" id="" checked></td>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" name="" id=""></td>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" name="" id=""></td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               <i class="dripicons-dots-3"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane p-3" id="BIM-360">
            <div class="card my-3">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <strong>Employee Name</strong>
                        </div>
                        <div class="col-10">
                            <div class="input-group">
                                <select name="" id="" class="form-select me-1"placeholder="Default Role">
                                    <option value="">Sales</option>
                                    <option value="">Admin</option>
                                </select>
                                <input type="text" class="form-control me-1" placeholder="Display">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2">
                            <strong>Access Level</strong>
                        </div>
                        <div class="col-10">
                            <div class="input-group justify-content-between">
                               <label class="mx-2" for="Add">Add<input type="checkbox" name="" id="Add" class="form-check-input ms-1"></label>
                               <label class="mx-2" for="Delete">Delete<input type="checkbox" name="" id="Delete" class="form-check-input ms-1"></label>
                               <label class="mx-2" for="Edit">Edit<input type="checkbox" name="" id="Edit" class="form-check-input ms-1"></label>
                               <label class="mx-2" for="comments">comments<input type="checkbox" name="" id="comments" class="form-check-input ms-1"></label>
                               <label class="mx-2" for="Download">Download<input type="checkbox" name="" id="Download" class="form-check-input ms-1"></label>
                               <label class="mx-2" for="View">View<input type="checkbox" name="" id="View" class="form-check-input ms-1"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-body">
                    <table class="table custom table-bordered m-0">
                        <thead>
                            <tr>
                                <th class="text-center" rowspan="2">S.No</th>
                                <th class="text-center" rowspan="2">Employee ID</th>
                                <th class="text-center" rowspan="2">Employee</th>
                                <th class="text-center" rowspan="2">Email</th>
                                <th class="text-center" rowspan="2">Role</th>
                                <th class="text-center" colspan="6">Access Level</th>
                                <th class="text-center" rowspan="2">Action</th>
                            </tr>
                            <tr> 
                                <th class="text-center">Add</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                                <th class="text-center">View</th>
                                <th class="text-center">comments</th>
                                <th class="text-center">Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($key=0;$key<5;$key++)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>EA01</td>
                                    <td>xxxx</td>
                                    <td>testing@gmail.com</td>
                                    <td>XXX</td>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" name="" id=""></td>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" name="" id="" checked></td>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" name="" id=""></td>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" name="" id="" checked></td>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" name="" id=""></td>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" name="" id=""></td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               <i class="dripicons-dots-3"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane p-3" id="Project-Leader">
            <div class="card mt-4 col-md-10 mx-auto">
                <div class="card-body">
                    <div class="row align-items-center mb-3">
                        <div class="col-2">
                            <strong>Access to</strong>
                        </div>
                        <div class="col-10">
                            <ul>
                               <li> BIM 360</li>
                               <li> Sharepoint Access</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-2">
                            <strong>Folders</strong>
                        </div>
                        <div class="col-10">
                            <select name="" id="" class="form-select me-1"placeholder="Default Role">
                                <option value="">List of projects Folders</option>
                                <option value="">Sales</option>
                                <option value="">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-2">
                            <strong>Team Members</strong>
                        </div>
                        <div class="col-10">
                            <select name="" id="" class="form-select me-1"placeholder="Default Role">
                                <option value="">List of projects Members</option>
                                <option value="">Sales</option>
                                <option value="">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-footer text-end">
    <a href="#/platform" class="btn btn-light float-start">Prev</a>
    <a href="#/project-scheduling" class="btn btn-primary">Next</a>
</div>