     
@extends('layouts.customer')

@section('customer-content')
         
    
    <div class="content-page" ng-app="App">
        <div class="content">

            @include('customers.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('customers.layouts.page-navigater') 
            </div>                

            <div class="card border">
                <div class="card-body  pb-0">
                    <div class="row   mb-2 m-0">
                        <div class="col" style="overflow: auto">
                            <div class="timeline-steps " data-aos="fade-up">
                                <div class="time-bar"></div>
                                <div class="timeline-step">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-success">
                                            <i class="fa fa-address-book "></i>
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Enquiry</p>
                                </div>
                                <div class="timeline-step">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-success">
                                            <i class="fa fa-building "></i>
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Project Info</p>
                                </div>
                                <div class="timeline-step">
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-success">
                                            <i class="fa fa-briefcase "></i>
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Technical Estimate</p>
                                </div>
                                <div class="timeline-step">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-success">
                                            <i class="fa fa-money"></i>
                                        </div>
                                    </div>
                                    <p class="h5 mt-2">Cost Estimate</p>
                                </div>
                                <div class="timeline-step">
                                    <div class="timeline-content">
                                        <div class="inner-circle  bg-primary">
                                            <i class="fa fa-share-alt "></i>
                                        </div>                                                                        
                                    </div>
                                    <p class="h5 mt-2">Proposal Sharing</p>
                                </div>
                                <div class="timeline-step">
                                    <div class="timeline-content ">
                                        <div class="inner-circle  bg-secondary">
                                            <i class="fa fa-trophy "></i>
                                        </div>
                                    </div>
                                    <p class="h5  mt-2">Project Award</p>
                                </div>
                                <div class="timeline-step mb-0">
                                    <div class="timeline-content">
                                        <div class="inner-circle bg-secondary">
                                            <i class="fa  fa-truck "></i>
                                        </div>
                                    </div>
                                    <p class="h5  mts-2">Delivery</p>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div id="rootwizard">
                            <ul class="nav nav-pills nav-justified form-wizard-header bg-light">
                                <li class="nav-item" data-target-form="#projectInfo">
                                    <a href="#first" data-bs-toggle="tab" data-toggle="tab" style="min-height: 40px;" class="d-flex justify-content-center align-items-center nav-link text-center rounded-0 p-0 active">
                                        <i class="uil-angle-double-right me-1"></i>
                                        <span class="d-none d-sm-inline">Project Information</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-target-form="#profileForm">
                                    <a href="#second" data-bs-toggle="tab" data-toggle="tab" style="min-height: 40px;" class="d-flex justify-content-center align-items-center nav-link text-center rounded-0 p-0">
                                        <i class="uil-angle-double-right me-1"></i>
                                        <span class="d-none d-sm-inline">Service Selection</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-target-form="#profileForm">
                                    <a href="#four" data-bs-toggle="tab" data-toggle="tab" style="min-height: 40px;" class="d-flex justify-content-center align-items-center nav-link text-center rounded-0 p-0">
                                        <i class="uil-angle-double-right me-1"></i>
                                        <span class="d-none d-sm-inline">IFC Model & Uploads</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-target-form="#profileForm">
                                    <a href="#five" data-bs-toggle="tab" data-toggle="tab" style="min-height: 40px;" class="d-flex justify-content-center align-items-center nav-link text-center rounded-0 p-0">
                                        <i class="uil-angle-double-right me-1"></i>
                                        <span class="d-none d-sm-inline">Building  Components</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-target-form="#profileForm">
                                    <a href="#six" data-bs-toggle="tab" data-toggle="tab" style="min-height: 40px;" class="d-flex justify-content-center align-items-center nav-link text-center rounded-0 p-0">
                                        <i class="uil-angle-double-right me-1"></i>
                                        <span class="d-none d-sm-inline">Additional Informations</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-target-form="#otherForm">
                                    <a href="#third" data-bs-toggle="tab" data-toggle="tab"style="min-height: 40px;"  class="d-flex justify-content-center align-items-center nav-link text-center rounded-0 p-0">
                                        <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                        <span class="d-none d-sm-inline">Review &  Submit </span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content my-3" ng-controller="wizard">
                                <div class="tab-pane active" id="first" ng-controller="ProjectInfo">
                                    @include('customers.pages.enquiryWizard.project-info')
                                </div>
                                <div class="tab-pane fade " id="second" ng-controller="ServiceSelection">
                                    @include('customers.pages.enquiryWizard.service-selection')
                                </div>
                                <div class="tab-pane fade " id="four">
                                    @include('customers.pages.enquiryWizard.ifc-model-uploads')
                                </div>
                                <div class="tab-pane p-0 h-100 fade " id="five" ng-controller="CrudCtrl">
                                    @include('customers.pages.enquiryWizard.building-component')
                                </div>
                                <div class="tab-pane fade" id="six">
                                    @include('customers.pages.enquiryWizard.additional-info')
                                </div>
                                <div class="tab-pane fade" id="third">
                                        <div class="row m-0">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <h2 class="mt-0">
                                                        <i class="mdi mdi-check-all"></i>
                                                    </h2>
                                                    <h3 class="mt-0">Review And Submit</h3>                                                        
                                                </div>
                                                <div>					
                                                    <div class="row mx-0 container ">
                                                        <div class="col-12 text-center">
                                                            <h4 class="f-20 m-0 p-3">Project Information</h4>
                                                        </div>
                                                        <div class="col-md-6 p-3">
                                                            <table class="table m-0  table-bordered">
                                                                <tbody>
                                                                        <tr class="border">
                                                                            <th  class=" ">Project Name
                                                                            </th><td  class="bg-white">ABCD Building</td>
                                                                        </tr> 
                                                                        <tr class="border">
                                                                            <th  class=" ">Construction Site Address
                                                                            </th><td  class="bg-white">Strandgata-12</td>
                                                                        </tr> 
                                                                        <tr class="border">
                                                                            <th  class=" ">Post Code
                                                                            </th><td  class="bg-white">2134</td>
                                                                        </tr> 
                                                                        <tr class="border">
                                                                            <th  class=" ">Place
                                                                            </th><td  class="bg-white">Austvath</td>
                                                                        </tr> 
                                                                        <tr class="border">
                                                                            <th  class=" ">State
                                                                            </th><td  class="bg-white">Hedmark</td>
                                                                        </tr> 
                                                                        <tr class="border">
                                                                            <th  class=" ">Country
                                                                            </th><td  class="bg-white">Norway</td>
                                                                        </tr> 
                                                                        <tr class="border">
                                                                            <th  class=" ">Type of Project
                                                                            </th><td  class="bg-white">1</td>
                                                                        </tr> 
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-md-6 p-3">
                                                            <table class="table m-0   table-bordered">
                                                            <tbody><tr class="border">
                                                                    <th  class=" ">Type of Building
                                                                    </th><td  class="bg-white">2</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th  class=" ">Number of Buildings
                                                                    </th><td  class="bg-white">2</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th  class=" ">Type of Delivery
                                                                    </th><td  class="bg-white">1</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th  class=" ">Deliveryd Date 
                                                                    </th><td  class="bg-white">2021-02-25</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th  class=" ">State
                                                                    </th><td  class="bg-white">non</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th  class=" ">Contact Person name
                                                                    </th><td  class="bg-white">XXXXXXX </td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th  class=" ">E-post
                                                                    </th><td  class="bg-white">dummyemail@gmail.com</td>
                                                                </tr> 
                                                            </tbody></table>
                                                        </div>
                                                    </div>
                                                    <div class="row mx-0 container ">
                                                        <div class="col-12 text-center">
                                                            <h4 class="f-20 m-0 p-3">Selected Services</h4>
                                                        </div>
                                                        <div class="col-md-6 p-3 mx-auto">
                                                            <table class="table m-0   table-bordered">
                                                                <tbody>
                                                                    <tr class="border">
                                                                        <th class="bg-primary text-white">S.no</th>
                                                                        <th class="bg-primary text-white">Services</th>
                                                                    </tr> 
                                                                <tr class="border">
                                                                    <th class=" ">1
                                                                    </th><td class="bg-white">CAD / CAM Modelling</td>
                                                                </tr>  
                                                                <tr class="border">
                                                                    <th class=" ">2
                                                                    </th><td class="bg-white">Approval Drawings</td>
                                                                </tr>  
                                                            </tbody></table>
                                                        </div>
                                                    </div>
                                                    <div class="row mx-0 container ">
                                                        <div class="col-12 text-center">
                                                            <h4 class="f-20 m-0 p-3">IFC Models &amp; Uploaded Documents</h4>
                                                        </div>
                                                        <div class="col-md-8 p-3 mx-auto">
                                                            <table class="table m-0 table-bordered ">
                                                                
                                                                <tbody>
                                                                    <tr class="border">
                                                                        <th  class="bg-primary text-white">S.no
                                                                        </th><th  class="bg-primary text-white">File Name</th>
                                                                        <th class="bg-primary text-white" >Type</th>
                                                                        <th  class="bg-primary text-white">Action</th>
                                                                    </tr> 
                                                                    <tr class="border">
                                                                    <th class="bg-white">1
                                                                    </th><td class="bg-white">Modelling</td>
                                                                    <td class="bg-white">IFC Modelling</td>
                                                                    <td width="8%">
                                                                        <i class="feather-eye text-success mr-3"></i>
                                                                        <i class="feather-trash text-danger"></i>
                                                                    </td>
                                                                </tr>  
                                                                <tr class="border">
                                                                    <th class="bg-white">1
                                                                    </th><td class="bg-white">Modelling</td>
                                                                    <td class="bg-white">IFC Modelling</td>
                                                                    <td>
                                                                        <i class="feather-eye text-success mr-3"></i>
                                                                        <i class="feather-trash text-danger"></i>
                                                                    </td>
                                                                </tr>  
                                                                <tr class="border">
                                                                    <th class="bg-white">1
                                                                    </th><td class="bg-white">Modelling</td>
                                                                    <td class="bg-white">IFC Modelling</td>
                                                                    <td>
                                                                        <i class="feather-eye text-success mr-3"></i>
                                                                        <i class="feather-trash text-danger"></i>
                                                                    </td>
                                                                </tr>  
                                                                <tr class="border">
                                                                    <th class="bg-white">1
                                                                    </th><td class="bg-white">Modelling</td>
                                                                    <td class="bg-white">IFC Modelling</td>
                                                                    <td>
                                                                        <i class="feather-eye text-success mr-3"></i>
                                                                        <i class="feather-trash text-danger"></i>
                                                                    </td>
                                                                </tr>  
                                                                <tr class="border">
                                                                    <th class="bg-white">1
                                                                    </th><td class="bg-white">Modelling</td>
                                                                    <td class="bg-white">IFC Modelling</td>
                                                                    <td>
                                                                        <i class="feather-eye text-success mr-3"></i>
                                                                        <i class="feather-trash text-danger"></i>
                                                                    </td>
                                                                </tr>  
                                                            </tbody></table>
                                                        </div>
                                                    </div>
                                                    <div class="row mx-0 container ">
                                                        <div class="col-12 text-center">
                                                            <h4 class="f-20 m-0 p-3">Building components</h4>
                                                        </div>
                                                        <div class="col-md-8 p-3 mx-auto">
                                                            <table class="table m-0 table-bordered ">
                                                                
                                                                <tbody>
                                                                    <tr>
                                                                        <th  class="bg-primary text-white">EW_DEWS
                                                                        </th>
                                                                        <th  class="bg-primary text-white">
                                                                            Delivery Type : Element Type
                                                                        </th>
                                                                        <th  class="bg-primary text-white">
                                                                            Total : 10
                                                                        </th>
                                                                    </tr> 
                                                                <tr class="border  ">
                                                                    <td>Layer Details</td>
                                                                    <td>Dimensions ( mm )</td>
                                                                    <td>Estimates length ( mm )</td>
                                                                </tr>
                                                                <tr class="border">
                                                                    <td>Horizontal Nails</td>
                                                                    <td>250X298</td>
                                                                    <td>0.58</td>
                                                                </tr>  
                                                                <tr class="border">
                                                                    <td>Horizontal Nails</td>
                                                                    <td>250X298</td>
                                                                    <td>0.58</td>
                                                                </tr>  
                                                                <tr class="border">
                                                                    <td>Horizontal Nails</td>
                                                                    <td>250X298</td>
                                                                    <td>0.58</td>
                                                                </tr>  
                                                                <tr class="border">
                                                                    <td>Horizontal Nails</td>
                                                                    <td>250X298</td>
                                                                    <td>0.58</td>
                                                                </tr>  
                                                                <tr class="border">
                                                                    <td>Horizontal Nails</td>
                                                                    <td>250X298</td>
                                                                    <td>0.58</td>
                                                                </tr>  
                                                                <tr class="border">
                                                                    <td>Horizontal Nails</td>
                                                                    <td>250X298</td>
                                                                    <td>0.58</td>
                                                                </tr>  
                                                                <tr class="border">
                                                                    <td>Horizontal Nails</td>
                                                                    <td>250X298</td>
                                                                    <td>0.58</td>
                                                                </tr>  
                                                            </tbody></table>
                                                        </div>
                                                    </div>
                                                    <div class="row mx-0 container ">
                                                        <div class="col-12 text-center">
                                                            <h4 class="f-20 m-0 p-3">Additional Info</h4>
                                                        </div>
                                                        <div class="col-md-10 p-0 mx-auto  border">
                                                            <div class="col-12  text-center p-2  ">
                                                                Additional Info
                                                            </div>
                                                            <div class="p-2">
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus numquam illum sint perspiciatis tempore cumque ipsa asperiores tempora earum molestias aperiam doloremque facere placeat officiis iure, ea eum architecto sunt?
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-center mt-4">
                                                            <button class="btn button_print btn-info mx-2 px-3 btn-rounded">
                                                                Print
                                                            </button> 
                                                        </div>
                                                    </div>
                                                </div>   
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                </div>

                                <div class="card-footer border-0 p-0 " >
                                    <ul class="list-inline wizard mb-0 pt-3">
                                        <li class="previous list-inline-item disabled" ng-click="gotoStep(currentStep - 1)"><a href="#" class="btn btn-primary">Previous @{{ currentStep }}</a></li>
                                        <li class="next list-inline-item float-end" ng-click="gotoStep(currentStep + 1)"><a href="#" class="btn btn-primary">Next</a></li>
                                    </ul>
                                </div>

                            </div> <!-- tab-content -->
                        </div> <!-- end #rootwizard-->
                    

                </div> <!-- end card-body -->
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
                                                Yeah everyThickness g is fine
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
                                                Sure Thickness g! let me know if 2pm works for you
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
                                                        <a href="#" class="btn btn-secondary"><i class="uil uil-paperclip"></i></a>
                                                        <a href="#" class="btn btn-secondary"> <i class="uil uil-smile"></i> </a>
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
    <style>
        .table tbody tr td {
            padding: 5px !important
        }
        @media (min-width: 1200px) {
            .modal-xxl {
                width: 100% !important
            }
        }
        .x-y-center {
            display: flex !important;
            justify-content: center;
            align-items: center 
        } 
        thead, tbody, tfoot, tr, td, th {
            vertical-align: middle !important;
        }
        .accordion-button::after {
            margin:0px auto !important
        }
        .table > :not(caption) > * > * {
            padding: 0 !important
        }
        .table tr th  {
            padding: 0 10px !important
        }
        .form-lable {
            background: #f1f2fe;
            border-radius: 5px;
            padding: 0 5px;
            top: -10px;
            left: 10px;
            font-size:12px;
        }
        .form-group {
            position: relative;
        }
        .form-control-sm,.form-select-sm {
            padding-top:  15px !important
        }
        .accordion-body .table tbody tr:nth-child(1) .form-lable {
            display: block !important
        }
        
        .accordion-body .table tbody tr  .form-lable {
           display: none
        }
        .accordion-body .table tbody tr  .form-control-sm,.form-select-sm {
            padding-top: 7px !important
        }
        .accordion-body .table tbody tr:nth-child(1)  .form-control-sm,.form-select-sm {
            padding-top:  13px !important
        }
        .accordion-body .table tbody tr td {
            padding:  0 10px 5px 0  !important
        }
        .accordion-body .table tbody tr td .form-select,.form-control,.input-group-text  {
            line-height: 1.2 !important
        } 
        .wall-delete-btn {
            padding: 8px 10px;
            right: 0;
            z-index: 11;
            border-radius:0 3px 0 10px !important
        }
        .more-btn-layer.collapsed .fa {
            transform: rotate(0deg) !important;
            transition: all .5s
        }  
        .more-btn-layer .fa {
            transform: rotate(180deg) !important;
            transition: all .5s
        }   
        .p1 {
            padding: 5px !important
        }     
       
    </style>
     <style>
        .time-bar {
            width: 100% !important;
            height: 1px;
            position: absolute;
            border: 1px dashed  gray;
            top: 45px
        }
        .timeline-steps  {
            display: flex;
            justify-content:space-between;
            /* align-items: center; */
            position: relative;
         
        }
        .timeline-step {
            padding: 10px;
            z-index: 1;
            border-radius: 15px;
            margin: 10px
        }
        .inner-circle {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            box-shadow: 0px 0px 10px #bdbdbd;
            background: white;
            display: flex;
            justify-content:center;
            align-items: center;
            color: white;
            border: 3px solid white
        }
        .timeline-content {
            display: flex;
            justify-content:center;
            align-items: center;
            flex-direction: column;
        }
 
        .table td,th {
            padding: 5px 10px !important ;
            vertical-align: middle !important
        }
        .table thead,th {
            background: #757CF2 !important;
            color: white
        }
        
         .table tbody thead,th {
            background: #757CF2 !important
        }
        .daterangepicker .calendar-table th, .daterangepicker .calendar-table td {
            background:  white !important
        }
        .daterangepicker td.active, .daterangepicker td.active:hover {
            background: #757CF2 !important
        }
        .dashboard-icon {
            font-size: 3rem !important;
        }
        #SvgjsText1885 {
            display: none !important;
        }
    </style>   
@endpush

@push('custom-scripts')

    

    <!-- end demo js-->
    <script src="{{ asset('public/assets/js/pages/demo.form-wizard.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/ui/component.fileupload.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.angularjs.org/1.2.16/angular.js"></script>
    <script >
        var app = angular.module('App', []).constant('API_URL', $("#baseurl").val());           
    </script>
    <script>
        // const result = [];
        app.controller('wizard', function($scope, $http) {
            $scope.result = []
            $scope.currentStep = 1;
            $scope.gotoStep = function(newStep) {
                $scope.$broadcast('callProjectInfo');
                $scope.$broadcast('callServiceSelection');
                $scope.$broadcast('buildingComponent');
                console.log( $scope.result);
                $scope.currentStep = newStep;
            }
          
        });
    
       	app.controller('ProjectInfo', function ($scope, $http) {
           
            $scope.$on('callProjectInfo', function(e) {  
                $scope.$parent.result['project_info'] = ($scope.getProjectInfoInptuData());            
            });
                
            $scope.getProjectInfoInptuData = function() {
                $scope.data = {
                    'secondary_mobile_no'  : $scope.projectInfo.secondary_mobile_no,
                    'project_name'         : $scope.projectInfo.project_name,
                    'zipcode'              : $scope.projectInfo.zipcode,
                    'state'                : $scope.projectInfo.state,
                    'building_type'        : $scope.projectInfo.building_type,
                    'project_type'         : $scope.projectInfo.project_type,
                    'project_date'         : $scope.projectInfo.project_date,
                    'site_address'         : $scope.projectInfo.site_address,
                    'place'                : $scope.projectInfo.place,
                    'country'              : $scope.projectInfo.country,
                    'no_of_building'       : $scope.projectInfo.no_of_building,
                    'delivery_type'        : $scope.projectInfo.delivery_type,
                    'project_delivery_date': $scope.projectInfo.project_delivery_date,
                };
                return  $scope.data;
            }

            let projectTypefiredOnce = false;
            let deliveryTypefiredOnce = false;
            let buildingTypefiredOnce = false;

            $scope.getProjectType = () => {
                if(projectTypefiredOnce){ return; }
                $http({
                    method: 'GET',
                    url: '{{ route("project-type.index") }}'
                }).then(function (res) {
                    projectTypefiredOnce = true;
                    $scope.projectTypes = res.data;		
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 

            $scope.getDeliveryType = () => {
                if(deliveryTypefiredOnce){ return; }
                $http({
                    method: 'GET',
                    url: '{{ route("delivery-type.index") }}'
                }).then(function (res) {
                    deliveryTypefiredOnce = true;
                    $scope.deliveryTypes = res.data;		
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 

            $scope.getBuildingType = () => {
                if(buildingTypefiredOnce){ return; }
                $http({
                    method: 'GET',
                    url: '{{ route("building-type.index") }}'
                }).then(function (res) {
                    buildingTypefiredOnce = true;
                    $scope.buildingTypes = res.data;		
                }, function (error) {
                    console.log('This is embarassing. An error has occurred. Please check the log for details');
                });
            } 

        }); 

        app.controller('ServiceSelection', function ($scope, $http) {
           
           $scope.$on('callServiceSelection', function(e) {  
               $scope.$parent.result['services'] = ($scope.getServiceSelectionInptuData());            
           });
           $scope.selectService  = (service) => {
                // var id = service.attributes['data-service-id'].value;
                var id =  angular.element(service).data('id');
                console.log(id);
           }
           $scope.getServiceSelectionInptuData = function() {
                $scope.servicesArray = [];
                angular.forEach($scope.services, function(service){
                    if (!!service.selected) $scope.servicesArray.push(service.id);
                })
               return Object.assign({}, $scope.servicesArray);
           }
           let servicefireOnce = false;
           $scope.getProjectType = () => {
               if(servicefireOnce){ return; }
               $http({
                   method: 'GET',
                   url: '{{ route("service.index") }}'
               }).then(function (res) {
                   console.log(res);
                    servicefireOnce = true;
                   $scope.services = res.data;		
               }, function (error) {
                   console.log('This is embarassing. An error has occurred. Please check the log for details');
               });
           } 
           $scope.getProjectType();
        }); 

        app.controller('CrudCtrl', function ($scope, $http) { 

            $scope.$on('callServiceSelection', function(e) {  
               $scope.$parent.result['building_component'] = ($scope.getBuildingComponentInptuData());            
            });

            $scope.getBuildingComponentInptuData = function() {
                return $scope.wallGroup;
           }

            $scope.wallGroup  = [
                {
                    "WallName" : "External Wall",
                    "WallIcon" : "dripicons-store", 
                    "Details": [
                        {
                            "FloorName" : "Ground Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } 
                            ] 
                        } 
                    ]
                },
                {
                    "WallName" : "Internal Wall",
                    "WallIcon" : "uil uil-store-alt", 
                    "Details": [
                        {
                            "FloorName" : "First Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } 
                            ] 
                        } 
                    ]
                },
                {
                    "WallName" : "Partition Wall",
                    "WallIcon" : "uil uil-wall", 
                    "Details": [
                        {
                            "FloorName" : "New Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } 
                            ] 
                        } 
                    ]
                },
                {
                    "WallName" : "Ceiling",
                    "WallIcon" : "uil uil-layers", 
                    "Details": [
                        {
                            "FloorName" : "Top Right Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } 
                            ] 
                        } 
                    ]
                },
                {
                    "WallName" : "Roof",
                    "WallIcon" : "uil uil-mountains-sun", 
                    "Details": [
                        {
                            "FloorName" : "Top Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } 
                            ] 
                        } 
                    ]
                },
                {
                    "WallName" : "test Wall",
                    "WallIcon" : "dripicons-store", 
                    "Details": [
                        {
                            "FloorName" : "Ground Floor",
                            "FloorNumber" : "1",
                            "TotalArea" : "2500",
                            "DeliveryType" : "Fire Proof",
                            
                            "Layers": [ 
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                } ,
                                {
                                    "LayerName": '',
                                    "LayerType": '',
                                    "Thickness ": '',
                                    "Breadth": '',
                                }   
                            ] 
                        } 
                    ]
                }


            ]; 
            
            

            $scope.AddWall  =   function() {
                $scope.wallGroup.unshift({
                    "WallName" : "",
                    "Details": [{
                        "Layers": [] 
                    }]
                });
            }
            $scope.AddWallDetails  =   function(index) {
                $scope.wallGroup[index].Details.push({
                    "FloorName" : "Ground Floor",
                    "FloorNumber" : "1",
                    "TotalArea" : "2500",
                    "DeliveryType" : "Fire Proof",
                    "Layers": [
                        {
                            "LayerName": '',
                            "LayerType": '',
                            "Thickness ": '',
                            "Breadth": '',
                        }
                    ] 
                });
            } 
            $scope.AddLayers  =   function(fIndex, index) {
                $scope.wallGroup[fIndex].Details[index].Layers.unshift({
                    "LayerName": '',
                    "LayerType": '',
                    "Thickness ": '',
                    "Breadth": '',
                });
            }    
            $scope.delWall = function(index){
                
                $scope.wallGroup.splice(index,1);
            } 
            $scope.delWallTwo = function(fIndex){
                $scope.wallGroup.splice(fIndex,1);
            }  
            $scope.RemoveDetails = function(fIndex, Secindex){
                $scope.wallGroup[fIndex].Details.splice(Secindex,1);                
            }

            $scope.removeLayer = function(fIndex, Secindex, ThreeIndex){
                console.log(  fIndex , Secindex , ThreeIndex);
                $scope.wallGroup[fIndex].Details[Secindex].Layers.splice(ThreeIndex,1);
            } 
        });
    </script>
   
@endpush