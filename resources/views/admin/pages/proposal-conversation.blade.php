@extends('admin.layouts.app')

@section('admin-content')
   
    <div class="content-page">
        <div class="content">

            @include('admin.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.layouts.page-navigater')
              
                <div class="card shadow-lg border" class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="card-header pt-3 text-center">
                        <h3 class="header-title"> Proposal conversation</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-light">
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Project Name</th>
                                <th>Offer Letter Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>XX-YY-ZZZZ</td>
                                    <td>XXX</td>
                                    <td>OFF123</td>
                                    <td>
                                        <span class="badge badge-outline-success rounded-pill">In Progress</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="dropdown">
                                                <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="dripicons-dots-3 "></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">View</a>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                    <a class="dropdown-item" href="#">Send Mail</a>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"> </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <td colspan="6">
                                        <table class="table table-bordered">
                                                <tbody><tr class="bg-light">
                                                    <td><b>Date</b></td>
                                                    <td><b>Offer Letter Number</b></td>
                                                    <td><b>Status</b></td>
                                                    <td><b>Action</b></td>
                                                </tr>
                                                <tr>
                                                    <td>12-12-2021</td>
                                                    <td>12</td>
                                                    <td class="text-success"><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="dripicons-dots-3 "></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">View</a>
                                                                <a class="dropdown-item" href="#">Remove</a>
                                                                <a class="dropdown-item" href="#">Send Mail</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>11-12-2021</td>
                                                    <td>11</td>
                                                    <td class="text-success"><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="dripicons-dots-3 "></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">View</a>
                                                                <a class="dropdown-item" href="#">Remove</a>
                                                                <a class="dropdown-item" href="#">Send Mail</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>10-12-2021</td>
                                                    <td>5</td>
                                                    <td class="text-danger"><span class="badge badge-outline-warning rounded-pill">obsolete</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="dripicons-dots-3 "></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">View</a>
                                                                <a class="dropdown-item" href="#">Remove</a>
                                                                <a class="dropdown-item" href="#">Send Mail</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>XX-YY-ZZZZ</td>
                                    <td>XXX</td>
                                    <td>OFF123</td>
                                    <td>
                                        <span class="badge badge-outline-success rounded-pill">In Progress</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="dropdown">
                                                <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="dripicons-dots-3 "></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">View</a>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                    <a class="dropdown-item" href="#">Send Mail</a>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne2" aria-expanded="false" aria-controls="flush-collapseOne2"> </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="flush-collapseOne2" class="accordion-collapse collapse" aria-labelledby="flush-headingOne2" data-bs-parent="#accordionFlushExample">
                                    <td colspan="6">
                                        <table class="table table-bordered">
                                                <tbody><tr class="bg-light">
                                                    <td><b>Date</b></td>
                                                    <td><b>Offer Letter Number</b></td>
                                                    <td><b>Status</b></td>
                                                    <td><b>Action</b></td>
                                                </tr>
                                                <tr>
                                                    <td>12-12-2021</td>
                                                    <td>12</td>
                                                    <td class="text-success"><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="dripicons-dots-3 "></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">View</a>
                                                                <a class="dropdown-item" href="#">Remove</a>
                                                                <a class="dropdown-item" href="#">Send Mail</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>11-12-2021</td>
                                                    <td>11</td>
                                                    <td class="text-success"><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="dripicons-dots-3 "></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">View</a>
                                                                <a class="dropdown-item" href="#">Remove</a>
                                                                <a class="dropdown-item" href="#">Send Mail</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>10-12-2021</td>
                                                    <td>5</td>
                                                    <td class="text-danger"><span class="badge badge-outline-warning rounded-pill">obsolete</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="dripicons-dots-3 "></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">View</a>
                                                                <a class="dropdown-item" href="#">Remove</a>
                                                                <a class="dropdown-item" href="#">Send Mail</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div> <!-- container -->

        </div> <!-- content -->


    </div>  

@endsection 