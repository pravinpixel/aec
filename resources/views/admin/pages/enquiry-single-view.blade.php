@extends('layouts.admin')

@section('admin-content')
   

    <div class="content-page">
        <div class="content">

            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.includes.page-navigater')

                <!-- end page title --> 
                
                <div class="row m-0">
                    <div class="col-12">
                        <h3 class="text-center">Enquiry ID : ENQ0251</h3>
                        <div>					
                            <div class="row mx-0 container ">
                                <div class="col-12 text-center">
                                    <h4 class="f-20 m-0 p-3">Project Information</h4>
                                </div>
                                <div class="col-md-6 p-3">
                                    <table class="table custom m-0 table-striped">
                                        <tbody><tr class="border">
                                            <th width="50" class=" ">Project Name
                                            </th><td width="50" class="bg-white">XXXXXXXXXXXXXXXXXXX</td>
                                        </tr> 
                                        <tr class="border">
                                            <th width="50" class=" ">Construction Site Address
                                            </th><td width="50" class="bg-white">XXXXXXXXXXXXXXXXXXX</td>
                                        </tr> 
                                        <tr class="border">
                                            <th width="50" class=" ">Zip Code
                                            </th><td width="50" class="bg-white">XXXXXXXXXXXXXXXXXXX</td>
                                        </tr> 
                                        <tr class="border">
                                            <th width="50" class=" ">Place
                                            </th><td width="50" class="bg-white">XXXXXXXXXXXXXXXXXXX</td>
                                        </tr> 
                                        <tr class="border">
                                            <th width="50" class=" ">State
                                            </th><td width="50" class="bg-white">XXXXXXXXXXXXXXXXXXX</td>
                                        </tr> 
                                        <tr class="border">
                                            <th width="50" class=" ">Country
                                            </th><td width="50" class="bg-white">XXXXXXXXXXXXXXXXXXX</td>
                                        </tr> 
                                        <tr class="border">
                                            <th width="50" class=" ">Type of Project
                                            </th><td width="50" class="bg-white">XXXXXXXXXXXXXXXXXXX</td>
                                        </tr> 
                                    </tbody></table>
                                </div>
                                <div class="col-md-6 p-3">
                                    <table class="table custom m-0  table-striped">
                                    <tbody><tr class="border">
                                            <th width="50" class=" ">Project Name
                                            </th><td width="50" class="bg-white">XXXXXXXXXXXXXXXXXXX</td>
                                        </tr> 
                                        <tr class="border">
                                            <th width="50" class=" ">Construction Site Address
                                            </th><td width="50" class="bg-white">XXXXXXXXXXXXXXXXXXX</td>
                                        </tr> 
                                        <tr class="border">
                                            <th width="50" class=" ">Zip Code
                                            </th><td width="50" class="bg-white">XXXXXXXXXXXXXXXXXXX</td>
                                        </tr> 
                                        <tr class="border">
                                            <th width="50" class=" ">Place
                                            </th><td width="50" class="bg-white">XXXXXXXXXXXXXXXXXXX</td>
                                        </tr> 
                                        <tr class="border">
                                            <th width="50" class=" ">State
                                            </th><td width="50" class="bg-white">XXXXXXXXXXXXXXXXXXX</td>
                                        </tr> 
                                        <tr class="border">
                                            <th width="50" class=" ">Country
                                            </th><td width="50" class="bg-white">XXXXXXXXXXXXXXXXXXX</td>
                                        </tr> 
                                        <tr class="border">
                                            <th width="50" class=" ">Type of Project
                                            </th><td width="50" class="bg-white">XXXXXXXXXXXXXXXXXXX</td>
                                        </tr> 
                                    </tbody></table>
                                </div>
                            </div>
                            <div class="row mx-0 container ">
                                <div class="col-12 text-center">
                                    <h4 class="f-20 m-0 p-3">Selected Services</h4>
                                </div>
                                <div class="col-md-6 p-3 mx-auto">
                                    <table class="table custom m-0  table-striped">
                                        <tbody><tr class="border">
                                            <th class=" ">S.no
                                            </th><th class="bg-white">Services</th>
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
                                <div class="col-md-12 p-3 mx-auto">
                                    <table class="table custom m-0  table-striped">
                                       
                                        <tbody>
                                            <tr>
                                                <th class="">S.no
                                                </th><th class="">File Name</th>
                                                <th class="">Type</th>
                                                <th class="">Action</th>
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
                                    <h4 class="f-20 m-0 p-3">Selected Services</h4>
                                </div>
                                <div class="col-md-8 p-3 mx-auto">
                                    <table class="table custom m-0 table-striped">
                                        
                                        <tbody>
                                            <tr>
                                                <th class="">EW_DEWS
                                                </th><th class="">
                                                    Delivery Type : Element Type
                                                </th>
                                                <th class="">
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
                
            </div> <!-- container -->

        </div> <!-- content -->


    </div> 

@endsection
 