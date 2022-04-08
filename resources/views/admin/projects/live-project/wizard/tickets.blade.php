<div class="p-2">    
    <div>
        <ul class="nav nav-tabs mb-0 border-bottom-0">
            <li class="nav-item">
                <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link border-bottom-0">
                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                    <span class="d-none d-md-block">Customer Tickets</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link active border-bottom-0">
                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                    <span class="d-none d-md-block">Internal Tickets</span>
                </a>
            </li> 
        </ul>
        
        <div class="tab-content border p-2">
            <div class="tab-pane" id="home">
                <div class="card shadow-sm bg-light mb-0 shadow-sm border">
                    <div class="card-header border-0 pb-0 bg-light text-center">
                        <strong class="fw-bold"> Overview</strong>
                    </div>
                    <div class="card-body p-0 py-2">
                        <div class="row m-0">
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">15</strong>
                                    </div>
                                    <div class="fw-bold text-danger">Open</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">5</strong>
                                    </div>
                                    <div class="fw-bold text-info">Inprogress</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">6</strong>
                                    </div>
                                    <div class="fw-bold text-dark">Answered</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">6</strong>
                                    </div>
                                    <div class="fw-bold text-warning">On Hold</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">6</strong>
                                    </div>
                                    <div class="fw-bold text-success">Closed</div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="my-2 x-y-between">
                    <h3 class="h4">Ticket Summary</h3>
                    <button class="btn btn-sm btn-primary">Raise Ticket</button>
                </div>
                <table class="table custom table-bordered table-hover m-0">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Ticket #</th>
                            <th>Customer Name</th>
                            <th>Subject</th>
                            <th>Details</th>
                            <th>Last Reply</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i=0;$i<6;$i++)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>TIC-00{{ $i+1 }}</td>
                                <td>Kannan EFWE</td>
                                <td>What is the update</td>
                                <td>-</td>
                                <td>1{{ $i+1 }}-0{{ $i+1 }}-2021</td>
                                <td><span class="badge bg-success">open</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm py-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="dripicons-dots-3 "></i>
                                        </button>
                                        
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">View</a>
                                            <a class="dropdown-item" href="#">Reply</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="tab-pane show active" id="profile">
                <div class="card shadow-sm bg-light mb-0 shadow-sm border">
                    <div class="card-header border-0 pb-0 bg-light text-center">
                        <strong class="fw-bold"> Overview</strong>
                    </div>
                    <div class="card-body p-0 py-2">
                        <div class="row m-0">
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">15</strong>
                                    </div>
                                    <div class="fw-bold text-danger">Open</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">5</strong>
                                    </div>
                                    <div class="fw-bold text-info">Inprogress</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">56</strong>
                                    </div>
                                    <div class="fw-bold text-dark">Answered</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">45</strong>
                                    </div>
                                    <div class="fw-bold text-warning">On Hold</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="card shadow-sm border m-0 p-2 text-center">
                                    <div class="x-y-center">
                                        <strong class="lead fw-bold ms-2">1458</strong>
                                    </div>
                                    <div class="fw-bold text-success">Closed</div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="my-2 x-y-between">
                    <h3 class="h4">Ticket on the Project</h3>
                    <button class="btn btn-sm btn-primary">Create Variation Order</button>
                </div>
                <table class="table custom table-bordered table-hover m-0">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Ticket #</th>
                            <th>Customer Name</th>
                            <th>Subject</th>
                            <th>Details</th>
                            <th>Last Reply</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i=0;$i<6;$i++)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>TIC-00{{ $i+1 }}</td>
                                <td>Kannan EFWE</td>
                                <td>What is the update</td>
                                <td>-</td>
                                <td>1{{ $i+1 }}-0{{ $i+1 }}-2021</td>
                                <td><span class="badge bg-success">open</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm py-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="dripicons-dots-3 "></i>
                                        </button>
                                        
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">View</a>
                                            <a class="dropdown-item" href="#">Reply</a>
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
</div> 