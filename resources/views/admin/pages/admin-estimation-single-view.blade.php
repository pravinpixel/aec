@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page">
        <div class="content">

            @include('admin.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.layouts.page-navigater')

                <!-- end page title --> 
                <div class="content">
                    
                   
                    <div class="row m-0 ">
                        <div class="col-lg-9 ">
                            <div class="card shadow-lg">
                                <div class="card-header p-3">
                                    <h4 class="header-title my-2 mb-3 text-center">Estimation for ENQ001 - New Building Project - Ada Lovelace</h4>
                                    <table class="table m-0 bg-white  table-bordered ">
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
                                                <td>10  Nov 2021</td>
                                                <td>Arun Prahash</td>
                                                <td>New Construction</td>
                                                <td>In Estimation</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-body p-3">
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
                                                <td>Panel</td>
                                                <td><input type="text" class="form-control"></td>
                                                <td class="text-center">
                                                    <a href="" class="btn text-primary"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Interior Wall</td>
                                                <td>Panel</td>
                                                <td><input type="text" class="form-control"></td>
                                                <td class="text-center">
                                                    <a href="" class="btn text-primary"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1st Floor Wall</td>
                                                <td>Panel</td>
                                                <td><input type="text" class="form-control"></td>
                                                <td class="text-center">
                                                    <a href="" class="btn text-primary"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Roof</td>
                                                <td>Panel</td>
                                                <td><input type="text" class="form-control"></td>
                                                <td class="text-center">
                                                    <a href="" class="btn text-primary"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>   
                                            <tr>
                                                <td>Flooring</td>
                                                <td>Structural Design &amp; Lifting</td>
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
                                    <div class="text-end">
                                        <button type="reset" class="btn btn-outline-secondary font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
                                        <a class="btn btn-primary" onclick="submit()" href=""><i class="uil-sync"></i> Update</a>
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
                            
                                {{-- <div class="card shadow-sm mb-3">
                                    <div class="crad-header">
                                        <img style="height:50px; object-fit:cover" class="w-100" src="https://static.toiimg.com/thumb/msid-82276439,width-1200,height-900,resizemode-4/.jpg" alt="image cap">
                                    </div>
                                    <div class="card-body py-2">
                                        <div class="card-text">Site plan diagram </div>
                                    </div>
                                    <div class="card-footer btn-group p-0">
                                        <a href="" class="btn btn-outline-info "><i class=" fa fa-eye"></i></a>
                                        <a href="" class="btn btn-primary "data-bs-toggle="modal" data-bs-target="#right-modal"><i class="uil-comment-alt-lines"></i></a>
                                    </div>
                                </div>
                                <div class="card shadow-sm mb-3">
                                    <div class="crad-header">
                                        <img style="height:50px; object-fit:cover" class="w-100" src="https://static.toiimg.com/thumb/msid-82276439,width-1200,height-900,resizemode-4/.jpg" alt="image cap">
                                    </div>
                                    <div class="card-body py-2">
                                        <div class="card-text">Site plan diagram </div>
                                    </div>
                                    <div class="card-footer btn-group p-0">
                                        <a href="" class="btn btn-outline-info "><i class=" fa fa-eye"></i></a>
                                        <a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#right-modal"><i class="uil-comment-alt-lines"></i></a>
                                    </div>
                                </div>
                                <div class="card shadow-sm">
                                    <div class="crad-header">
                                        <img style="height:50px; object-fit:cover" class="w-100" src="https://static.toiimg.com/thumb/msid-82276439,width-1200,height-900,resizemode-4/.jpg" alt="image cap">
                                    </div>
                                    <div class="card-body py-2">
                                        <div class="card-text">Site plan diagram </div>
                                    </div>
                                    <div class="card-footer btn-group p-0">
                                        <a href="" class="btn btn-outline-info "><i class=" fa fa-eye"></i></a>
                                        <a href="" class="btn btn-primary "data-bs-toggle="modal" data-bs-target="#right-modal"><i class="uil-comment-alt-lines"></i></a>
                                    </div>
                                </div> --}}
                                 
                            </div>
                        </div>
                    </div>
                </div>
                
            </div> <!-- container -->

        </div> <!-- content -->


    </div> 
    <div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-right" style="width:100% !important">
            <div class="modal-content p-3 h-100 d-flex justify-content-center align-items-center" >
                <div>
                    <div class="border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <ul class="conversation-list" data-simplebar="init" style="max-height: 537px"><div class="simplebar-wrapper" style="margin: 0px -15px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px 15px;">
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" class="rounded" alt="Shreyu N">
                                        <i>10:00</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Hello!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" class="rounded" alt="dominic">
                                        <i>10:01</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                Hi, How are you? What about our next meeting?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" class="rounded" alt="Shreyu N">
                                        <i>10:01</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Yeah everything is fine
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" class="rounded" alt="dominic">
                                        <i>10:02</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                Wow that's great
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" alt="Shreyu N" class="rounded">
                                        <i>10:02</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Let's have it today if you are free
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" alt="dominic" class="rounded">
                                        <i>10:03</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                Sure thing! let me know if 2pm works for you
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" alt="Shreyu N" class="rounded">
                                        <i>10:04</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Sorry, I have another meeting scheduled at 2pm. Can we have it
                                                at 3pm instead?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" alt="Shreyu N" class="rounded">
                                        <i>10:04</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                We can also discuss about the presentation talk format if you have some extra mins
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" alt="dominic" class="rounded">
                                        <i>10:05</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                3pm it is. Sure, let's discuss about presentation format, it would be great to finalize today. 
                                                I am attaching the last year format and assets here...
                                            </p>
                                        </div>
                                        <div class="card mt-2 mb-1 shadow-none border text-start">
                                            <div class="p-2">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title rounded">
                                                                .ZIP
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col ps-0">
                                                        <a href="javascript:void(0);" class="text-muted fw-bold">Hyper-admin-design.zip</a>
                                                        <p class="mb-0">2.3 MB</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <!-- Button -->
                                                        <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                                            <i class="dripicons-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                            </div></div></div></div><div class="simplebar-placeholder" style="width: 479px; height: 924px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 312px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></ul>

                            <div class="row">
                                <div class="col">
                                    <div class="mt-2 bg-light p-3 rounded">
                                        <form class="needs-validation" novalidate="" name="chat-form" id="chat-form">
                                            <div class="row">
                                                <div class="col mb-2 mb-sm-0">
                                                    <input type="text" class="form-control border-0" placeholder="Enter your text" required="">
                                                    <div class="invalid-feedback">
                                                        Please enter your messsage
                                                    </div>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-light"><i class="uil uil-paperclip"></i></a>
                                                        <a href="#" class="btn btn-light"> <i class="uil uil-smile"></i> </a>
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-success chat-send"><i class="uil uil-message"></i></button>
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row-->
                                        </form>
                                    </div> 
                                </div> <!-- end col-->
                            </div>
                            <!-- end row -->
                        </div> <!-- end card-body -->
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
     
@endsection

@push('custom-styles')
    <link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('custom-scripts')
    <script src="{{ asset('public/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/demo.datatable-init.js') }}"></script>
@endpush