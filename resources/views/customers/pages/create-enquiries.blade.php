     
@extends('customers.layouts.app')

@section('customer-content')
         
    
    <div class="content-page">
        <div class="content">

            @include('customers.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('customers.layouts.page-navigater') 
            </div>                

            <div class="card border">
                <div class="card-body  pb-0">
                        <div id="rootwizard">
                            <ul class="nav nav-pills nav-justified form-wizard-header bg-light">
                                <li class="nav-item" data-target-form="#accountForm">
                                    <a href="#first" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span class="d-none d-sm-inline">Project Infomation</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-target-form="#profileForm">
                                    <a href="#second" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-face-profile me-1"></i>
                                        <span class="d-none d-sm-inline">Service Selection</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-target-form="#profileForm">
                                    <a href="#four" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-face-profile me-1"></i>
                                        <span class="d-none d-sm-inline">IFC Model & Uploads</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-target-form="#profileForm">
                                    <a href="#five" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-face-profile me-1"></i>
                                        <span class="d-none d-sm-inline">Building  Components</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-target-form="#profileForm">
                                    <a href="#six" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-face-profile me-1"></i>
                                        <span class="d-none d-sm-inline">Additional Info</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-target-form="#otherForm">
                                    <a href="#third" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                        <span class="d-none d-sm-inline">Finish</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content my-3">

                                <div class="tab-pane active" id="first">
                                    
                                    <form id="accountForm" method="post" action="#" class="form-horizontal">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-floating  mb-2">
                                                    <input disabled value="xxxx" type="text" class="form-control form-control-sm" id="floating" placeholder="Password" required/>
                                                    <label for="floating">Enquiry Date</label>
                                                </div>
                                                <div class="form-floating  mb-2">
                                                    <input disabled value="xxxx" type="text" class="form-control form-control-sm" id="floating" placeholder="Password" required/>
                                                    <label for="floating">Enquiry Number</label>
                                                </div>
                                                <div class="form-floating  mb-2">
                                                    <input disabled value="xxxx" type="text" class="form-control form-control-sm" id="floating" placeholder="Password" required/>
                                                    <label for="floating">Campany Name</label>
                                                </div> 
                                                <div class="form-floating  mb-2">
                                                    <input disabled value="xxxx" type="text" class="form-control form-control-sm" id="floating" placeholder="Password" required/>
                                                    <label for="floating">Contact Person</label>
                                                </div> 
                                                <div class="form-floating  mb-2">
                                                    <input disabled value="xxxx" type="text" class="form-control form-control-sm" id="floating" placeholder="Password" required/>
                                                    <label for="floating">Mobile Number</label>
                                                </div> 
                                                <div class="form-floating  mb-2">
                                                    <input   type="text" class="form-control form-control-sm" id="floating" placeholder="Password" required/>
                                                    <label for="floating">Secondary Mobile Number</label>
                                                </div> 
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="form-floating  mb-2">
                                                    <input type="text" class="form-control form-control-sm" id="floating" placeholder="Password" required/>
                                                    <label for="floating">Project Name</label>
                                                </div>
                                                <div class="form-floating  mb-2">
                                                    <input type="text" class="form-control form-control-sm" id="floating" placeholder="Password" required/>
                                                    <label for="floating">Zipcode</label>
                                                </div>
                                                <div class="form-floating  mb-2">
                                                    <input type="text" class="form-control form-control-sm" id="floating" placeholder="Password" required/>
                                                    <label for="floating">State</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                                                        <option value="">--</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                    <label for="floatingSelect">Type of Building</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                                                        <option value="">--</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                    <label for="floatingSelect">Type of Project</label>
                                                </div>
                                                <div class="form-floating  mb-2">
                                                    <input type="date" class="form-control form-control-sm" id="floating" placeholder="Password" required/>
                                                    <label for="floating">Project Start Date</label>
                                                </div>
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="form-floating  mb-2">
                                                    <input type="text" class="form-control form-control-sm" id="floating" placeholder="Password" required/>
                                                    <label for="floating">Site Address</label>
                                                </div>
                                                <div class="form-floating  mb-2">
                                                    <input type="text" class="form-control form-control-sm" id="floating" placeholder="Password" required/>
                                                    <label for="floating">Place</label>
                                                </div>
                                                <div class="form-floating  mb-2">
                                                    <input type="text" class="form-control form-control-sm" id="floating" placeholder="Password" required/>
                                                    <label for="floating">Country</label>
                                                </div>
                                                <div class="form-floating  mb-2">
                                                    <input type="text" class="form-control form-control-sm" id="floating" placeholder="Password" required/>
                                                    <label for="floating">No of Buildings</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                                                        <option value="">--</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                    <label for="floatingSelect">Type of Delivery</label>
                                                </div>
                                                <div class="form-floating  mb-2">
                                                    <input type="date" class="form-control"    required/>
                                                    <label for="floating">Project Delivery Date</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade " id="second">
                                    <form id="profileForm" method="post" action="#" class="form-horizontal">
                                    
                                        <div class="row m-0 justify-content-center ">
                                            <label class="col-md-4 p-2" for="one_1_check">
                                                <div class="lable-check  p-3 shadow-sm border"> 
                                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="one_1_check">
                                                    <span>CAD/CAM Modelling</span>
                                                </div>
                                            </label> 		
                                            <label class="col-md-4 p-2" for="one_2_check">
                                                <div class="lable-check  p-3 shadow-sm border"> 
                                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="one_2_check">
                                                    <span>Construction Logistics</span>
                                                </div>
                                            </label>         
                                            <label class="col-md-4 p-2" for="three_3_check">
                                                <div class="lable-check  p-3 shadow-sm border"> 
                                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2 " id="three_3_check">
                                                    <span>Approval Drawings, Sections &amp; Plans</span>
                                                </div>
                                            </label> 		
                                            <label class="col-md-4 p-2" for="four_4_check">
                                                <div class="lable-check  p-3 shadow-sm border"> 
                                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="four_4_check">
                                                    <span>CNC Machine Data for pre-cut</span>
                                                </div>
                                            </label> 
                                        
                                            <label class="col-md-4 p-2" for="one_check">
                                                <div class="lable-check  p-3 shadow-sm border"> 
                                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="one_check">
                                                    <span>Details for connections</span>
                                                </div>
                                            </label> 		
                                            <label class="col-md-4 p-2" for="two_check">
                                                <div class="lable-check  p-3 shadow-sm border"> 
                                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="two_check">
                                                    <span>Pre-cut assembly drawings</span>
                                                </div>
                                            </label> 
                                        
                                            <label class="col-md-4 p-2" for="three_check">
                                                <div class="lable-check  p-3 shadow-sm border"> 
                                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="three_check">
                                                    <span>Structural Engineering</span>
                                                </div>
                                            </label> 		
                                            <label class="col-md-4 p-2" for="four_check">
                                                <div class="lable-check  p-3 shadow-sm border"> 
                                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="four_check">
                                                    <span>Element Production drawings</span>
                                                </div>
                                            </label> 
                                        
                                            <label class="col-md-4 p-2" for="five_check">
                                                <div class="lable-check  p-3 shadow-sm border"> 
                                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="five_check">
                                                    <span>Bill of Materials</span>
                                                </div>
                                            </label> 		
                                            <label class="col-md-4 p-2" for="six_check">
                                                <div class="lable-check  p-3 shadow-sm border"> 
                                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="six_check">
                                                    <span>Element Installation drawings</span>
                                                </div>
                                            </label> 
                                            <label class="col-md-4 p-2" for="Procedure">
                                                <div class="lable-check  p-3 shadow-sm border"> 
                                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="Procedure">
                                                    <span>Construction Procedure</span>
                                                </div>
                                            </label>   
                                            <label class="col-md-4 p-2" for="Others">
                                                <div class="lable-check  p-3 shadow-sm border"> 
                                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="Others">
                                                    <span>Others</span>
                                                </div>
                                            </label>   
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade " id="four">
                                    <div id="profileForm" class="form-horizontal">
                                        <div class="row pt-5 mx-0">
                                            <div class="col-md-3">
                                                <div class="card rounded ">
                                                    <div class="card-header ">
                                                        <div class="page-title ">Plan view <sup class="text-danger">*</sup> </div>
                                                    </div>
                                                    <div class="card-body pbs-0">
                                                        <div class="filepond--root filepond filepond--hopper" data-style-button-remove-item-position="left" data-style-button-process-item-position="right" data-style-load-indicator-position="right" data-style-progress-indicator-position="right" data-style-button-remove-item-align="false" style="height: 76px;"><input class="filepond--browser" type="file" id="filepond--browser-at9vm4gw5" name="filepond" aria-controls="filepond--assistant-at9vm4gw5" aria-labelledby="filepond--drop-label-at9vm4gw5"><a class="filepond--credits" aria-hidden="true" href="https://pqina.nl/" target="_blank" rel="noopener noreferrer" style="transform: translateY(68px);">Powered by PQINA</a><div class="filepond--drop-label" style="transform: translate3d(0px, 0px, 0px); opacity: 1;"><label for="filepond--browser-at9vm4gw5" id="filepond--drop-label-at9vm4gw5" aria-hidden="true">Drag &amp; Drop your files or <span class="filepond--label-action" tabindex="0">Browse</span></label></div><div class="filepond--list-scroller" style="transform: translate3d(0px, 0px, 0px);"><ul class="filepond--list" role="list"></ul></div><div class="filepond--panel filepond--panel-root" data-scalable="true"><div class="filepond--panel-top filepond--panel-root"></div><div class="filepond--panel-center filepond--panel-root" style="transform: translate3d(0px, 8px, 0px) scale3d(1, 0.6, 1);"></div><div class="filepond--panel-bottom filepond--panel-root" style="transform: translate3d(0px, 68px, 0px);"></div></div><div class="filepond--drip"></div><span class="filepond--assistant" id="filepond--assistant-at9vm4gw5" role="status" aria-live="polite" aria-relevant="additions"></span><fieldset class="filepond--data"></fieldset></div>
                                                        <div class="pb-2 text-center">(or)</div>
                                                        <input class="form-control form-control-sm" type="text" placeholder="Paste Here..">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-header">
                                                        <div class="page-title ">FACADE  view <sup class="text-danger">*</sup> </div>
                                                    </div>
                                                    <div class="card-body pbs-0">
                                                        <div class="filepond--root filepond filepond--hopper" data-style-button-remove-item-position="left" data-style-button-process-item-position="right" data-style-load-indicator-position="right" data-style-progress-indicator-position="right" data-style-button-remove-item-align="false" style="height: 76px;"><input class="filepond--browser" type="file" id="filepond--browser-ggby9tofl" name="filepond" aria-controls="filepond--assistant-ggby9tofl" aria-labelledby="filepond--drop-label-ggby9tofl"><a class="filepond--credits" aria-hidden="true" href="https://pqina.nl/" target="_blank" rel="noopener noreferrer" style="transform: translateY(68px);">Powered by PQINA</a><div class="filepond--drop-label" style="transform: translate3d(0px, 0px, 0px); opacity: 1;"><label for="filepond--browser-ggby9tofl" id="filepond--drop-label-ggby9tofl" aria-hidden="true">Drag &amp; Drop your files or <span class="filepond--label-action" tabindex="0">Browse</span></label></div><div class="filepond--list-scroller" style="transform: translate3d(0px, 0px, 0px);"><ul class="filepond--list" role="list"></ul></div><div class="filepond--panel filepond--panel-root" data-scalable="true"><div class="filepond--panel-top filepond--panel-root"></div><div class="filepond--panel-center filepond--panel-root" style="transform: translate3d(0px, 8px, 0px) scale3d(1, 0.6, 1);"></div><div class="filepond--panel-bottom filepond--panel-root" style="transform: translate3d(0px, 68px, 0px);"></div></div><div class="filepond--drip"></div><span class="filepond--assistant" id="filepond--assistant-ggby9tofl" role="status" aria-live="polite" aria-relevant="additions"></span><fieldset class="filepond--data"></fieldset></div>
                                                        <div class="pb-2 text-center">(or)</div>
                                                        <input class="form-control form-control-sm" type="text" placeholder="Paste Here..">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-header">
                                                        <div class="page-title ">IFC Model <sup class="text-danger">*</sup> </div>
                                                    </div>
                                                    <div class="card-body pbs-0">
                                                        <div class="filepond--root filepond filepond--hopper" data-style-button-remove-item-position="left" data-style-button-process-item-position="right" data-style-load-indicator-position="right" data-style-progress-indicator-position="right" data-style-button-remove-item-align="false" style="height: 76px;"><input class="filepond--browser" type="file" id="filepond--browser-8gt7r82mq" aria-controls="filepond--assistant-8gt7r82mq" aria-labelledby="filepond--drop-label-8gt7r82mq" name="filepond"><a class="filepond--credits" aria-hidden="true" href="https://pqina.nl/" target="_blank" rel="noopener noreferrer" style="transform: translateY(68px);">Powered by PQINA</a><div class="filepond--drop-label" style="transform: translate3d(0px, 0px, 0px); opacity: 1;"><label for="filepond--browser-8gt7r82mq" id="filepond--drop-label-8gt7r82mq" aria-hidden="true">Drag &amp; Drop your files or <span class="filepond--label-action" tabindex="0">Browse</span></label></div><div class="filepond--list-scroller" style="transform: translate3d(0px, 0px, 0px);"><ul class="filepond--list" role="list"></ul></div><div class="filepond--panel filepond--panel-root" data-scalable="true"><div class="filepond--panel-top filepond--panel-root"></div><div class="filepond--panel-center filepond--panel-root" style="transform: translate3d(0px, 8px, 0px) scale3d(1, 0.6, 1);"></div><div class="filepond--panel-bottom filepond--panel-root" style="transform: translate3d(0px, 68px, 0px);"></div></div><div class="filepond--drip"></div><span class="filepond--assistant" id="filepond--assistant-8gt7r82mq" role="status" aria-live="polite" aria-relevant="additions"></span><fieldset class="filepond--data"></fieldset></div>
                                                        <div class="pb-2 text-center">(or)</div>
                                                        <input class="form-control form-control-sm" type="text" placeholder="Paste Here..">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card rounded">
                                                    <div class="card-header">
                                                        <div class="page-title ">Others </div>
                                                    </div>
                                                    <div class="card-body pbs-0"> 
                                                        <div class="filepond--root filepond filepond--hopper" data-style-button-remove-item-position="left" data-style-button-process-item-position="right" data-style-load-indicator-position="right" data-style-progress-indicator-position="right" data-style-button-remove-item-align="false" style="height: 76px;"><input class="filepond--browser" type="file" id="filepond--browser-oeqf1ra94" name="filepond" aria-controls="filepond--assistant-oeqf1ra94" aria-labelledby="filepond--drop-label-oeqf1ra94"><a class="filepond--credits" aria-hidden="true" href="https://pqina.nl/" target="_blank" rel="noopener noreferrer" style="transform: translateY(68px);">Powered by PQINA</a><div class="filepond--drop-label" style="transform: translate3d(0px, 0px, 0px); opacity: 1;"><label for="filepond--browser-oeqf1ra94" id="filepond--drop-label-oeqf1ra94" aria-hidden="true">Drag &amp; Drop your files or <span class="filepond--label-action" tabindex="0">Browse</span></label></div><div class="filepond--list-scroller" style="transform: translate3d(0px, 0px, 0px);"><ul class="filepond--list" role="list"></ul></div><div class="filepond--panel filepond--panel-root" data-scalable="true"><div class="filepond--panel-top filepond--panel-root"></div><div class="filepond--panel-center filepond--panel-root" style="transform: translate3d(0px, 8px, 0px) scale3d(1, 0.6, 1);"></div><div class="filepond--panel-bottom filepond--panel-root" style="transform: translate3d(0px, 68px, 0px);"></div></div><div class="filepond--drip"></div><span class="filepond--assistant" id="filepond--assistant-oeqf1ra94" role="status" aria-live="polite" aria-relevant="additions"></span><fieldset class="filepond--data"></fieldset></div>
                                                        <div class="pb-2 text-center">(or)</div>
                                                        <input class="form-control form-control-sm" type="text" placeholder="Paste Here..">
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="container">
                                            <h3>Plan View </h3>
                                            
                                            <table class="table table-bordered" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>File Name</th>
                                                        <th>File Type</th>
                                                        <th>Comments</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="panel">
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>1</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">Pdf</td>
                                                        <td class="text-success">
                                                            <a onclick="comments();">Add Comments</a>
                                                        </td>
                                                        <td>In progress</td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn  btn-info"  data-bs-toggle="collapse" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapseOne_1" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>in progress</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>Reviewing</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>obsolete</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>2</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">Pdf</td>
                                                        <td class="text-success">
                                                            <a onclick="comments();">Add Comments</a>
                                                        </td>
                                                        <td>In progress</td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn  btn-info"  data-bs-toggle="collapse" href="#collapseOne_2" aria-expanded="true" aria-controls="collapseOne_2"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapseOne_2" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>in progress</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>Reviewing</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>obsolete</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>3</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">Pdf</td>
                                                        <td class="text-success">
                                                            <a onclick="comments();">Add Comments</a>
                                                        </td>
                                                        <td>In progress</td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn  btn-info"  data-bs-toggle="collapse" href="#collapseOne_3" aria-expanded="true" aria-controls="collapseOne_3"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapseOne_3" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>in progress</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>Reviewing</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>obsolete</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>4</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">Pdf</td>
                                                        <td class="text-success">
                                                            <a onclick="comments();">Add Comments</a>
                                                        </td>
                                                        <td>In progress</td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn  btn-info"  data-bs-toggle="collapse" href="#collapseOne_4" aria-expanded="true" aria-controls="collapseOne_4"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapseOne_4" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>in progress</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>Reviewing</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>obsolete</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>5</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">Pdf</td>
                                                        <td class="text-success">
                                                            <a onclick="comments();">Add Comments</a>
                                                        </td>
                                                        <td>In progress</td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn  btn-info"  data-bs-toggle="collapse" href="#collapseOne_5" aria-expanded="true" aria-controls="collapseOne_5"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapseOne_5" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>in progress</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>Reviewing</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>obsolete</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                            
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="container">
                                            <h3>FACADE View </h3>
                                            
                                            <table class="table table-bordered" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>File Name</th>
                                                        <th>File Type</th>
                                                        <th>Comments</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="panel">
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>1</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">Pdf</td>
                                                        <td class="text-success">
                                                            <a onclick="comments();">Add Comments</a>
                                                        </td>
                                                        <td>In progress</td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_1" aria-expanded="true" aria-controls="collapsene_1"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapsene_1" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>in progress</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>Reviewing</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>obsolete</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>2</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">Pdf</td>
                                                        <td class="text-success">
                                                            <a onclick="comments();">Add Comments</a>
                                                        </td>
                                                        <td>In progress</td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_2" aria-expanded="true" aria-controls="collapsene_2"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapsene_2" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>in progress</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>Reviewing</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>obsolete</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>3</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">Pdf</td>
                                                        <td class="text-success">
                                                            <a onclick="comments();">Add Comments</a>
                                                        </td>
                                                        <td>In progress</td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_3" aria-expanded="true" aria-controls="collapsene_3"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapsene_3" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>in progress</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>Reviewing</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>obsolete</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                            
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="container">
                                            <h3>IFC Model </h3>
                                            
                                            <table class="table table-bordered" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>File Name</th>
                                                        <th>File Type</th>
                                                        <th>Comments</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="panel">
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>1</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">Pdf</td>
                                                        <td class="text-success">
                                                            <a onclick="comments();">Add Comments</a>
                                                        </td>
                                                        <td>In progress</td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_1" aria-expanded="true" aria-controls="collapsene_1"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapsene_1" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>in progress</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>Reviewing</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>obsolete</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>2</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">Pdf</td>
                                                        <td class="text-success">
                                                            <a onclick="comments();">Add Comments</a>
                                                        </td>
                                                        <td>In progress</td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_2" aria-expanded="true" aria-controls="collapsene_2"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapsene_2" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>in progress</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>Reviewing</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>obsolete</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>3</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">Pdf</td>
                                                        <td class="text-success">
                                                            <a onclick="comments();">Add Comments</a>
                                                        </td>
                                                        <td>In progress</td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_3" aria-expanded="true" aria-controls="collapsene_3"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapsene_3" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>in progress</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>Reviewing</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>obsolete</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                            
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="container">
                                            <h3>Others</h3>
                                            
                                            <table class="table table-bordered" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>File Name</th>
                                                        <th>File Type</th>
                                                        <th>Comments</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="panel">
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>1</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">Pdf</td>
                                                        <td class="text-success">
                                                            <a onclick="comments();">Add Comments</a>
                                                        </td>
                                                        <td>In progress</td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_1" aria-expanded="true" aria-controls="collapsene_1"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapsene_1" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>in progress</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>Reviewing</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>obsolete</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>2</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">Pdf</td>
                                                        <td class="text-success">
                                                            <a onclick="comments();">Add Comments</a>
                                                        </td>
                                                        <td>In progress</td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_2" aria-expanded="true" aria-controls="collapsene_2"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapsene_2" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>in progress</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>Reviewing</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>obsolete</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>3</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">Pdf</td>
                                                        <td class="text-success">
                                                            <a onclick="comments();">Add Comments</a>
                                                        </td>
                                                        <td>In progress</td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_3" aria-expanded="true" aria-controls="collapsene_3"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapsene_3" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>in progress</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>Reviewing</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>Pdf</td>
                                                                        <td>obsolete</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                            
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane p-0 h-100 fade" id="five"  >
                                    <div class="row">
                                        <div class="col-sm mb-2 mb-sm-0">
                                            <div class="nav flex-column nav-pills shadow-sm rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active show d-flex flex-column align-items-center justify-content-center" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                                    aria-selected="true">
                                                    <i class="uil uil-wall" style="font-size: 25px"></i>
                                                    <div>External Wall</div>
                                                </a>
                                                <a class="nav-link d-flex flex-column align-items-center justify-content-center" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                                    aria-selected="false">
                                                    <i class="dripicons-home" style="font-size: 25px"></i>
                                                    <div>Internal Wall</div>
                                                </a>
                                                <a class="nav-link d-flex flex-column align-items-center justify-content-center" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                                    aria-selected="false">
                                                    <i class="mdi mdi-office-building-outline" style="font-size: 25px"></i>
                                                    <div>Partition Wall</div>
                                                </a>
                                                <a class="nav-link d-flex flex-column align-items-center justify-content-center" id="v-pills-Ceiling-tab" data-bs-toggle="pill" href="#v-pills-Ceiling" role="tab" aria-controls="v-pills-settings"
                                                    aria-selected="false">
                                                    <i class="mdi mdi-distribute-vertical-top" style="font-size: 25px"></i>
                                                    <div>Ceiling</div>
                                                </a>
                                                <a class="nav-link d-flex flex-column align-items-center justify-content-center" id="v-pills-Roof-tab" data-bs-toggle="pill" href="#v-pills-Roof" role="tab" aria-controls="v-pills-settings"
                                                    aria-selected="false">
                                                    <i class="mdi mdi-home-roof" style="font-size: 25px"></i>
                                                    <div>Roof</div>
                                                </a>
                                            </div>
                                        </div> <!-- end col-->
                                    
                                        <div class="col-sm-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                    <h3>External Wall</h3>
                                                    <div class=" bg-white ">
                                                        <div class="group-input-box ">
                                                            <table class="table table-bordered " id="myTable">
                                                                <thead class="bg-dark text-light">
                                                                    <tr>
                                                                        <th>Floor Name</th>
                                                                        <th>Floor Number</th>
                                                                        <th>Total Area</th>
                                                                        <th>Choose</th>
                                                                        <th>3D View</th>
                                                                        <th>Layers</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="external_wall_parent_outer" >
                                                                    <tr class="external_wall_parent_outer_row">
                                                                        <td>
                                                                            <input type="text" name="" id="" placeholder="Enter the Floor" class="form-control  border-0  form-control-sm">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="" id="" placeholder="Enter the Floor" class="form-control  border-0  form-control-sm">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="" id="" placeholder="Enter the Floor" class="form-control  border-0  form-control-sm">
                                                                        </td>
                                                                        <td>
                                                                            <select class="form-control-sm  border-0  form-control">
                                                                                <option value="">-- Select --</option>
                                                                                <option value="ea">Option 1</option>
                                                                                <option value="ea">Option 2</option>
                                                                                <option value="ea">Option 3</option>
                                                                                <option value="ea">Option 4</option>
                                                                                <option value="ea">Option 5</option>
                                                                            </select> 
                                                                        </td>
                                                                        <td class="text-center">
                                                                                <a class="btn-info btn">
                                                                                    <i class="mdi mdi-rotate-3d "></i>
                                                                                </a>
                                                                        </td>
                                                                        <td class="text-center"> 
                                                                            <i></i>
                                                                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseOne_layers"
                                                                                aria-expanded="true" aria-controls="collapseOne_layers">
                                                                                    <i class="fa  fa-chevron-down  "></i>
                                                                                </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr id="collapseOne_layers" class="collapse show">
                                                                        <td colspan="6" class="hiddenRow p-3">
                                                                            <div class="p-2">
                                                                                <table class="table shadow-sm m-0" id="tblLocations"> 
                                                                                    <thead>
                                                                                        <tr class="bg-light">
                                                                                            <th>Layer Name</th>
                                                                                            <th>Type</th>
                                                                                            <th>Size</th>
                                                                                            <th class="text-center">Add New</th>
                                                                                            <th class="text-center">Delete</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody class="external_outer">
                                                                                        <tr class="external_outer_row">
                                                                                            <td>
                                                                                                <select name="" class="form-control form-control-sm  border-0">
                                                                                                    <option value="q">-- Select -- </option>
                                                                                                    <option value="q">Opition</option>
                                                                                                    <option value="q">Opition</option>
                                                                                                    <option value="q">Opition</option>
                                                                                                    <option value="q">Opition</option>
                                                                                                    <option value="q">Opition</option>
                                                                                                </select>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control form-control-sm w_90 border-0 layer_name" name="mobileb_no[]" id="mobileb_no_1" placeholder="Type Here">
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control form-control-sm w_90  border-0 layer_size" name="mobileb_no[]" id="size_1" placeholder="Type Here">
                                                                                            </td> 
                                                                                            
                                                                                            <td class="text-center">
                                                                                                <a class="external_add_table_row  mr-2" title="Copy or clone this row">
                                                                                                    <i class="btn-success btn fa fa-plus"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                            <td class="text-center"> 
                                                                                                <a class="external_remove_table_row" disabled=""><i class="btn-outline-danger btn  fa fa-trash"></i></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>  
                                                        <div class="text-center ">
                                                            <button style="font-size: 14px; font-family: Inter, sans-serif !important;" title="Remove Last Row" type="button" class="btn btn-outline-danger remove_external_wall_btn"><i class="fa fa-trash add_icon "></i></button>
                                                            <button style="font-family: 'Inter', sans-serif !important;font-size:14px" type="button" class="btn btn-primary  add_new_external_wall_btn"><i class="fa fa-plus add_icon"></i> Add New Floor</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                    <h3>Internal Wall</h3>
                                                    <div class=" bg-white ">
                                                        <div class="group-input-box ">
                                                            <table class="table table-bordered " id="myTable">
                                                                <thead class="bg-dark text-light">
                                                                    <tr>
                                                                        <th>Floor Name</th>
                                                                        <th>Floor Number</th>
                                                                        <th>Total Area</th>
                                                                        <th>Choose</th>
                                                                        <th>3D View</th>
                                                                        <th>Layers</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="internal_wall_parent_outer" >
                                                                    <tr class="internal_wall_parent_outer_row">
                                                                        <td>
                                                                            <input type="text" name="" id="" placeholder="Enter the Floor" class="form-control  border-0  form-control-sm">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="" id="" placeholder="Enter the Floor" class="form-control  border-0  form-control-sm">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="" id="" placeholder="Enter the Floor" class="form-control  border-0  form-control-sm">
                                                                        </td>
                                                                        <td>
                                                                            <select class="form-control-sm  border-0  form-control">
                                                                                <option value="">-- Select --</option>
                                                                                <option value="ea">Option 1</option>
                                                                                <option value="ea">Option 2</option>
                                                                                <option value="ea">Option 3</option>
                                                                                <option value="ea">Option 4</option>
                                                                                <option value="ea">Option 5</option>
                                                                            </select> 
                                                                        </td>
                                                                        <td class="text-center">
                                                                                <a class="btn-info btn">
                                                                                    <i class="mdi mdi-rotate-3d "></i>
                                                                                </a>
                                                                        </td>
                                                                        <td class="text-center"> 
                                                                            <i></i>
                                                                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseOne_layers"
                                                                                aria-expanded="true" aria-controls="collapseOne_layers">
                                                                                    <i class="fa  fa-chevron-down  "></i>
                                                                                </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr id="collapseOne_layers" class="collapse show">
                                                                        <td colspan="6" class="hiddenRow p-3">
                                                                            <div class="p-2">
                                                                                <table class="table shadow-sm m-0" id="tblLocations"> 
                                                                                    <thead>
                                                                                        <tr class="bg-light">
                                                                                            <th>Layer Name</th>
                                                                                            <th>Type</th>
                                                                                            <th>Size</th>
                                                                                            <th class="text-center">Add New</th>
                                                                                            <th class="text-center">Delete</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody class="internal_outer">
                                                                                        <tr class="internal_outer_row">
                                                                                            <td>
                                                                                                <select name="" class="form-control form-control-sm  border-0">
                                                                                                    <option value="q">-- Select -- </option>
                                                                                                    <option value="q">Opition</option>
                                                                                                    <option value="q">Opition</option>
                                                                                                    <option value="q">Opition</option>
                                                                                                    <option value="q">Opition</option>
                                                                                                    <option value="q">Opition</option>
                                                                                                </select>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control form-control-sm w_90 border-0 layer_name" name="mobileb_no[]" id="mobileb_no_1" placeholder="Type Here">
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control form-control-sm w_90  border-0 layer_size" name="mobileb_no[]" id="size_1" placeholder="Type Here">
                                                                                            </td> 
                                                                                            
                                                                                            <td class="text-center">
                                                                                                <a class="internal_add_table_row  mr-2" title="Copy or clone this row">
                                                                                                    <i class="btn-success btn fa fa-plus"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                            <td class="text-center"> 
                                                                                                <a class="internal_remove_table_row" disabled=""><i class="btn-outline-danger btn  fa fa-trash"></i></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>  
                                                        <div class="text-center ">
                                                            <button style="font-size: 14px; font-family: Inter, sans-serif !important;" title="Remove Last Row" type="button" class="btn btn-outline-danger remove_internal_wall_btn"><i class="fa fa-trash add_icon "></i></button>
                                                            <button style="font-family: 'Inter', sans-serif !important;font-size:14px" type="button" class="btn btn-primary  add_new_internal_wall_btn"><i class="fa fa-plus add_icon"></i> Add New Floor</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                    <h3>Partition Wall</h3>
                                                    <div class="partition_wall_parent_outer">
                                                        <div class="partition_wall_parent_outer_row mb-2">
                                                            <div class="accordion-item">
                                                                <div class="accordion-header p-0 m-0" id="flush-headingTwo">
                                                                    <div class="d-flex bg-light bg-light align-items-center ">
                                                                        <div class="row align-items-center p-0 m-0">
                                                                            <div class="p-0 col-md">
                                                                                <div class="form-floating">
                                                                                    <input type="email" class="form-control bg-light" style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                                                                    <label for="floatingInput">Floor Name</label>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="p-0 col-md">
                                                                                <div class="form-floating">
                                                                                    <input type="email" class="form-control bg-light" style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                                                                    <label for="floatingInput">Floor Name</label>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="p-0 col-md">
                                                                                <div class="form-floating">
                                                                                    <input type="email" class="form-control bg-light" style="border-radius: 0 !important"id="floatingInput" placeholder="name@example.com" />
                                                                                    <label for="floatingInput">Floor Name</label>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="p-0 col-md">
                                                                                <div class="form-floating">
                                                                                    <input type="email" class="form-control bg-light"style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                                                                    <label for="floatingInput">Floor Name</label>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="p-0 col-md">
                                                                                <div class="form-floating">
                                                                                    <select class="form-select bg-light" id="floatingSelectGrid" aria-label="Floating label select example"style="border-radius: 0 !important">
                                                                                        <option selected>-- Choose --</option>
                                                                                        <option value="1">One</option>
                                                                                        <option value="2">Two</option>
                                                                                        <option value="3">Three</option>
                                                                                    </select>
                                                                                    <label for="floatingSelectGrid">Delivery Type</label>
                                                                                </div>
                                                                            </div>  
                                                                        </div>
                                                                        <div class="col" >
                                                                            <button class="collapsed accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo_partition" aria-expanded="false" aria-controls="flush-collapseTwo_partitionl"></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="flush-collapseTwo_partition" class="accordion-collapse " aria-labelledby="flush-collapseTwo_partition" data-bs-parent="#accordionFlushExample">
                                                                    <div class="accordion-body">
                                                                    <table class="table table-hover table-bordered m-0"  > 
                                                                        <thead  >
                                                                            <tr >
                                                                                <th>Layer Name</th>
                                                                                <th>Type</th>
                                                                                <th>Size</th>
                                                                                <th  class="text-center">Add New</th>
                                                                                <th class="text-center">Delete</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="partition_outer">
                                                                            <tr class="partition_outer_row">
                                                                                <td>
                                                                                    <select name="" class="form-control form-control-sm  border-0">
                                                                                        <option value="q">-- Select -- </option>
                                                                                        <option value="q">Opition</option>
                                                                                        <option value="q">Opition</option>
                                                                                        <option value="q">Opition</option>
                                                                                        <option value="q">Opition</option>
                                                                                        <option value="q">Opition</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control form-control-sm w_90 border-0 layer_name" name="mobileb_no[]" id="mobileb_no_1" placeholder="Type Here" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control form-control-sm w_90  border-0 layer_size" name="mobileb_no[]" id="size_1" placeholder="Type Here" />
                                                                                </td> 
                                                                                
                                                                                <td class="text-center">
                                                                                    <a class="partition_add_table_row  mr-2" title="Copy or clone this row">
                                                                                        <i class="btn-success btn dripicons-plus"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td class="text-center"> 
                                                                                    <a class="partition_remove_table_row" disabled><i class="mdi mdi-delete btn-outline-danger btn"></i> </a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center ">
                                                        <button style="font-family: 'Inter', sans-serif !important;font-size:14px" title="Remove Last Row" type="button" class="btn btn-outline-danger remove_partition_wall_btn"><i class="mdi mdi-delete add_icon"></i></button>
                                                        <button style="font-family: 'Inter', sans-serif !important;font-size:14px" type="button"  class="btn btn-primary  add_new_partition_wall_btn"><i class="dripicons-plus add_icon"></i> Add New Floor</button> 
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-Ceiling" role="tabpanel" aria-labelledby="v-pills-Ceiling-tab">
                                                    <h3>Ceiling </h3>
                                                    <div class="Ceiling_wall_parent_outer">
                                                        <div class="Ceiling_wall_parent_outer_row mb-2">
                                                            <div class="accordion-item">
                                                                <div class="accordion-header p-0 m-0" id="flush-headingTwo">
                                                                    <div class="d-flex bg-light bg-light align-items-center ">
                                                                        <div class="row align-items-center p-0 m-0">
                                                                            <div class="p-0 col-md">
                                                                                <div class="form-floating">
                                                                                    <input type="email" class="form-control bg-light" style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                                                                    <label for="floatingInput">Floor Name</label>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="p-0 col-md">
                                                                                <div class="form-floating">
                                                                                    <input type="email" class="form-control bg-light" style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                                                                    <label for="floatingInput">Floor Name</label>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="p-0 col-md">
                                                                                <div class="form-floating">
                                                                                    <input type="email" class="form-control bg-light" style="border-radius: 0 !important"id="floatingInput" placeholder="name@example.com" />
                                                                                    <label for="floatingInput">Floor Name</label>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="p-0 col-md">
                                                                                <div class="form-floating">
                                                                                    <input type="email" class="form-control bg-light"style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                                                                    <label for="floatingInput">Floor Name</label>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="p-0 col-md">
                                                                                <div class="form-floating">
                                                                                    <select class="form-select bg-light" id="floatingSelectGrid" aria-label="Floating label select example"style="border-radius: 0 !important">
                                                                                        <option selected>-- Choose --</option>
                                                                                        <option value="1">One</option>
                                                                                        <option value="2">Two</option>
                                                                                        <option value="3">Three</option>
                                                                                    </select>
                                                                                    <label for="floatingSelectGrid">Delivery Type</label>
                                                                                </div>
                                                                            </div>  
                                                                        </div>
                                                                        <div class="col" >
                                                                            <button class="collapsed accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo_Ceiling" aria-expanded="false" aria-controls="flush-collapseTwo_Ceilingl"></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="flush-collapseTwo_Ceiling" class="accordion-collapse " aria-labelledby="flush-collapseTwo_Ceiling" data-bs-parent="#accordionFlushExample">
                                                                    <div class="accordion-body">
                                                                    <table class="table table-hover table-bordered m-0"  > 
                                                                        <thead  >
                                                                            <tr >
                                                                                <th>Layer Name</th>
                                                                                <th>Type</th>
                                                                                <th>Size</th>
                                                                                <th  class="text-center">Add New</th>
                                                                                <th class="text-center">Delete</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="Ceiling_outer">
                                                                            <tr class="Ceiling_outer_row">
                                                                                <td>
                                                                                    <select name="" class="form-control form-control-sm  border-0">
                                                                                        <option value="q">-- Select -- </option>
                                                                                        <option value="q">Opition</option>
                                                                                        <option value="q">Opition</option>
                                                                                        <option value="q">Opition</option>
                                                                                        <option value="q">Opition</option>
                                                                                        <option value="q">Opition</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control form-control-sm w_90 border-0 layer_name" name="mobileb_no[]" id="mobileb_no_1" placeholder="Type Here" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control form-control-sm w_90  border-0 layer_size" name="mobileb_no[]" id="size_1" placeholder="Type Here" />
                                                                                </td> 
                                                                                
                                                                                <td class="text-center">
                                                                                    <a class="Ceiling_add_table_row  mr-2" title="Copy or clone this row">
                                                                                        <i class="btn-success btn dripicons-plus"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td class="text-center"> 
                                                                                    <a class="Ceiling_remove_table_row" disabled><i class="mdi mdi-delete btn-outline-danger btn"></i> </a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center ">
                                                        <button style="font-family: 'Inter', sans-serif !important;font-size:14px" title="Remove Last Row" type="button" class="btn btn-outline-danger remove_Ceiling_wall_btn"><i class="mdi mdi-delete add_icon"></i></button>
                                                        <button style="font-family: 'Inter', sans-serif !important;font-size:14px" type="button"  class="btn btn-primary  add_new_Ceiling_wall_btn"><i class="dripicons-plus add_icon"></i> Add New Floor</button> 
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-Roof" role="tabpanel" aria-labelledby="v-pills-Roof-tab">
                                                    <div class="Roof_wall_parent_outer">
                                                        <div class="Roof_wall_parent_outer_row mb-2">
                                                            <div class="accordion-item">
                                                                <div class="accordion-header p-0 m-0" id="flush-headingTwo">
                                                                    <div class="d-flex bg-light bg-light align-items-center ">
                                                                        <div class="row align-items-center p-0 m-0">
                                                                            <div class="p-0 col-md">
                                                                                <div class="form-floating">
                                                                                    <input type="email" class="form-control  border-0  bg-light" style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                                                                    <label for="floatingInput">Floor Name</label>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="p-0 col-md">
                                                                                <div class="form-floating">
                                                                                    <input type="email" class="form-control  border-0  bg-light" style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                                                                    <label for="floatingInput">Floor Name</label>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="p-0 col-md">
                                                                                <div class="form-floating">
                                                                                    <input type="email" class="form-control  border-0  bg-light" style="border-radius: 0 !important"id="floatingInput" placeholder="name@example.com" />
                                                                                    <label for="floatingInput">Floor Name</label>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="p-0 col-md">
                                                                                <div class="form-floating">
                                                                                    <input type="email" class="form-control  border-0  bg-light"style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                                                                    <label for="floatingInput">Floor Name</label>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="p-0 col-md">
                                                                                <div class="form-floating">
                                                                                    <select class="form-select   border-0  bg-light" id="floatingSelectGrid" aria-label="Floating label select example"style="border-radius: 0 !important">
                                                                                        <option selected>-- Choose --</option>
                                                                                        <option value="1">One</option>
                                                                                        <option value="2">Two</option>
                                                                                        <option value="3">Three</option>
                                                                                    </select>
                                                                                    <label for="floatingSelectGrid">Delivery Type</label>
                                                                                </div>
                                                                            </div>  
                                                                        </div>
                                                                        <div class="col" >
                                                                            <button class="collapsed accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo_Roof" aria-expanded="false" aria-controls="flush-collapseTwo_Roofl"></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="flush-collapseTwo_Roof" class="accordion-collapse " aria-labelledby="flush-collapseTwo_Roof" data-bs-parent="#accordionFlushExample">
                                                                    <div class="accordion-body">
                                                                    <table class="table table-hover table-bordered m-0"  > 
                                                                        <thead  >
                                                                            <tr >
                                                                                <th>Layer Name</th>
                                                                                <th>Type</th>
                                                                                <th>Size</th>
                                                                                <th  class="text-center">Add New</th>
                                                                                <th class="text-center">Delete</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="Roof_outer">
                                                                            <tr class="Roof_outer_row">
                                                                                <td>
                                                                                    <select name="" class="form-control form-control-sm  border-0">
                                                                                        <option value="q">-- Select -- </option>
                                                                                        <option value="q">Opition</option>
                                                                                        <option value="q">Opition</option>
                                                                                        <option value="q">Opition</option>
                                                                                        <option value="q">Opition</option>
                                                                                        <option value="q">Opition</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control form-control-sm w_90 border-0 layer_name" name="mobileb_no[]" id="mobileb_no_1" placeholder="Type Here" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control form-control-sm w_90  border-0 layer_size" name="mobileb_no[]" id="size_1" placeholder="Type Here" />
                                                                                </td> 
                                                                                
                                                                                <td class="text-center">
                                                                                    <a class="Roof_add_table_row  mr-2" title="Copy or clone this row">
                                                                                        <i class="btn-success btn dripicons-plus"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td class="text-center"> 
                                                                                    <a class="Roof_remove_table_row" disabled><i class="mdi mdi-delete btn-outline-danger btn"></i> </a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center ">
                                                        <button style="font-family: 'Inter', sans-serif !important;font-size:14px" title="Remove Last Row" type="button" class="btn btn-outline-danger remove_Roof_wall_btn"><i class="mdi mdi-delete add_icon"></i></button>
                                                        <button style="font-family: 'Inter', sans-serif !important;font-size:14px" type="button"  class="btn btn-primary  add_new_Roof_wall_btn"><i class="dripicons-plus add_icon"></i> Add New Floor</button> 
                                                    </div>
                                                </div>
                                            </div> 
                                        </div> 
                                    </div> 
                                    
                                </div>
                                <div class="tab-pane fade" id="six">
                                    <div class="row m-0">
                                        <div class="col-sm-6 mx-auto">
                                            <div >
                                                
                                                <h3 class="text-center">Specify additional details</h3>
                                
                                                <div class="py-3">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;"></textarea>
                                                        <label for="floatingTextarea">Comments</label>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="card p-3 my-3 shadow rounded">
                                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo blanditiis eos quidem iure voluptates, ipsam vel dolore rem facere, alias doloribus dignissimos iste in a. Eveniet tenetur dignissimos molestiae perferendis?</p>
                                                    <div class="text-right d-flex align-items-center   justify-content-end ">
                                                        <i class="fas fa-calendar-day mr-2"></i>
                                                        <small class="float-right">25/11/2021</small>
                                                    </div>
                                                </div>
                                                <div class="card p-3 my-3 shadow rounded">
                                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo blanditiis eos quidem iure voluptates, ipsam vel dolore rem facere, alias doloribus dignissimos iste in a. Eveniet tenetur dignissimos molestiae perferendis?</p>
                                                    <div class="text-right d-flex align-items-center   justify-content-end ">
                                                        <i class="fas fa-calendar-day mr-2"></i>
                                                        <small class="float-right">25/11/2021</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
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
                                                            <table class="table m-0 table-striped">
                                                                <tbody><tr class="border">
                                                                    <th width="50" class=" ">Project Name
                                                                    </th><td width="50" class="bg-white">non</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th width="50" class=" ">Construction Site Address
                                                                    </th><td width="50" class="bg-white">non</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th width="50" class=" ">Post Code
                                                                    </th><td width="50" class="bg-white">non</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th width="50" class=" ">Place
                                                                    </th><td width="50" class="bg-white">non</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th width="50" class=" ">State
                                                                    </th><td width="50" class="bg-white">non</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th width="50" class=" ">Country
                                                                    </th><td width="50" class="bg-white">non</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th width="50" class=" ">Type of Project
                                                                    </th><td width="50" class="bg-white">non</td>
                                                                </tr> 
                                                            </tbody></table>
                                                        </div>
                                                        <div class="col-md-6 p-3">
                                                            <table class="table m-0  table-striped">
                                                            <tbody><tr class="border">
                                                                    <th width="50" class=" ">Project Name
                                                                    </th><td width="50" class="bg-white">non</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th width="50" class=" ">Construction Site Address
                                                                    </th><td width="50" class="bg-white">non</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th width="50" class=" ">Post Code
                                                                    </th><td width="50" class="bg-white">non</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th width="50" class=" ">Place
                                                                    </th><td width="50" class="bg-white">non</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th width="50" class=" ">State
                                                                    </th><td width="50" class="bg-white">non</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th width="50" class=" ">Country
                                                                    </th><td width="50" class="bg-white">non</td>
                                                                </tr> 
                                                                <tr class="border">
                                                                    <th width="50" class=" ">Type of Project
                                                                    </th><td width="50" class="bg-white">non</td>
                                                                </tr> 
                                                            </tbody></table>
                                                        </div>
                                                    </div>
                                                    <div class="row mx-0 container ">
                                                        <div class="col-12 text-center">
                                                            <h4 class="f-20 m-0 p-3">Selected Services</h4>
                                                        </div>
                                                        <div class="col-md-6 p-3 mx-auto">
                                                            <table class="table m-0  table-striped">
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
                                                            <table class="table m-0  table-striped">
                                                                
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
                                                            <table class="table m-0 table-striped">
                                                                
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
                                        <!-- end row -->
                                </div>

                                <div class="card-footer border-0 p-0 ">
                                    <ul class="list-inline wizard mb-0 pt-3">
                                        <li class="previous list-inline-item disabled"><a href="#" class="btn btn-primary">Previous</a></li>
                                        <li class="next list-inline-item float-end"><a href="#" class="btn btn-primary">Next</a></li>
                                    </ul>
                                </div>

                            </div> <!-- tab-content -->
                        </div> <!-- end #rootwizard-->
                    

                </div> <!-- end card-body -->
            </div>   
            </div> <!-- container -->

        </div> <!-- content -->


    </div> 
      
@endsection
          
@push('custom-styles')
<style>
    .table tbody tr td {
        padding: 5px !important
    }
</style>
@endpush

@push('custom-scripts')


    <!-- end demo js-->
    <script src="{{ asset('public/assets/js/pages/demo.form-wizard.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/ui/component.fileupload.js') }}"></script>


    <script>
        $(".remove_external_wall_btn").hide();
            const section = [];
            $(document).ready(function(){
                $("body").on("click",".add_new_external_wall_btn", function (){ 
                let count = section.length+1;
                section.push(count);
                $(".remove_external_wall_btn").show();
                var index = $(".external_wall_parent_outer").find(".external_wall_parent_outer_row").length + 1;
                $(".external_wall_parent_outer").append(`  
                 
                    <tr class="external_wall_parent_outer_row" id="section-${count}">
                        <td>
                            <input type="text" name="" id="" placeholder="Enter the Floor" class="form-control  border-0  form-control-sm">
                        </td>
                        <td>
                            <input type="text" name="" id="" placeholder="Enter the Floor" class="form-control  border-0  form-control-sm">
                        </td>
                        <td>
                            <input type="text" name="" id="" placeholder="Enter the Floor" class="form-control  border-0  form-control-sm">
                        </td>
                        <td>
                            <select class="form-control-sm  border-0  form-control">
                                <option value="">-- Select --</option>
                                <option value="ea">Option 1</option>
                                <option value="ea">Option 2</option>
                                <option value="ea">Option 3</option>
                                <option value="ea">Option 4</option>
                                <option value="ea">Option 5</option>
                            </select> 
                        </td>
                        <td class="text-center">
                                <a class="btn-info btn">
                                    <i class="mdi mdi-rotate-3d "></i>
                                </a>
                        </td>
                        <td class="text-center"> 
                            <i
                            ></i>
                            <a   class="btn btn-primary" 
                                data-bs-toggle="collapse" href="#collapseOne_layers_${count}"
                                aria-expanded="true" aria-controls="collapseOne_layers_${count}">
                                    <i class="fa  fa-chevron-down  "></i>
                                </a>
                        </td>
                    </tr>
                    <tr id="collapseOne_layers_${count}" class="collapse">
                        <td colspan="6" class="hiddenRow p-3">
                            <div class="p-2">
                                <table class="table shadow-sm m-0" id="tblLocations"> 
                                    <thead>
                                        <tr class="bg-light">
                                            <th>Layer Name</th>
                                            <th>Type</th>
                                            <th>Size</th>
                                            <th class="text-center">Add New</th>
                                            <th class="text-center">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class="external_outer">
                                        <tr class="external_outer_row">
                                            <td>
                                                <select name="" class="form-control form-control-sm  border-0">
                                                    <option value="q">-- Select -- </option>
                                                    <option value="q">Opition</option>
                                                    <option value="q">Opition</option>
                                                    <option value="q">Opition</option>
                                                    <option value="q">Opition</option>
                                                    <option value="q">Opition</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-control-sm w_90 border-0 layer_name" name="mobileb_no[]" id="mobileb_no_1" placeholder="Type Here">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-control-sm w_90  border-0 layer_size" name="mobileb_no[]" id="size_1" placeholder="Type Here">
                                            </td> 
                                            
                                            <td class="text-center">
                                                <a class="external_add_table_row  mr-2" title="Copy or clone this row">
                                                    <i class="btn-success btn fa fa-plus"></i>
                                                </a>
                                            </td>
                                            <td class="text-center"> 
                                                <a class="external_remove_table_row" disabled=""><i class="btn-outline-danger btn  fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                `);
                $(".external_outer").find(".external_remove_table_row:not(:first)").prop("disabled", false);
                $(".external_outer").find(".external_remove_table_row").first().prop("disabled", true);
            });
        });

        ///======Clone method
        $(document).ready(function(){
            $("body").on("click", ".external_add_table_row", function (e) {

                var index = $(e.target).closest(".external_outer").find(".external_outer_row").length + 1;
                var cloned_el = $(e.target).closest(".external_outer_row").clone(true);
            
                $(e.target).closest(".external_outer").last().append(cloned_el).find(".external_remove_table_row:not(:first)").prop("disabled", false);
                $(e.target).closest(".external_outer").find(".external_remove_table_row").first().prop("disabled", true);
            
                
                //change id
                $(e.target).closest(".external_outer").find(".external_outer_row").last().find(".layer_name").attr("id", "mobileb_no_"+index);
                $(e.target).closest(".external_outer").find(".external_outer_row").last().find(".layer_size").attr("id", "size_"+index);
                $(e.target).closest(".external_outer").find(".external_outer_row").last().find("select").attr("id", "no_type_"+index);
            
                console.log(cloned_el);
                $(`#mobileb_no_${index}`).val('');
                $(`#size_${index}`).val('');
                //count++;
            });
        });

        $(document).ready(function(){
            //===== delete the form fieed row
            $("body").on("click", ".external_remove_table_row", function () {
            $(this).closest(".external_outer_row").remove();
            console.log("success");
            });
        });

        $(document).on('click', '.remove_external_wall_btn', function() {
            console.log("pop");
            let id = section.length;
            $(`#section-${id}`).remove();
            section.pop();
            if(section.length == 0) {
                $(".remove_external_wall_btn").hide();
            } else {
                $(".remove_external_wall_btn").show();
            }
            
        });
    </script>

    <script>
    $(".remove_internal_wall_btn").hide();
    const section_internal_wall = [];
    $(document).ready(function(){
        $("body").on("click",".add_new_internal_wall_btn", function (){ 
            let internal_count = section_internal_wall.length+1;
            section_internal_wall.push(internal_count);
            $(".remove_internal_wall_btn").show();
            var internal_index = $(".internal_wall_parent_outer").find(".internal_wall_parent_outer_row").length + 1;
            $(".internal_wall_parent_outer").append(`  
            <tr class="internal_wall_parent_outer_row" id="section_internal_wall-${internal_count}">
                <td>
                    <input type="text" name="" id="" placeholder="Enter the Floor" class="form-control  border-0  form-control-sm">
                </td>
                <td>
                    <input type="text" name="" id="" placeholder="Enter the Floor" class="form-control  border-0  form-control-sm">
                </td>
                <td>
                    <input type="text" name="" id="" placeholder="Enter the Floor" class="form-control  border-0  form-control-sm">
                </td>
                <td>
                    <select class="form-control-sm  border-0  form-control">
                        <option value="">-- Select --</option>
                        <option value="ea">Option 1</option>
                        <option value="ea">Option 2</option>
                        <option value="ea">Option 3</option>
                        <option value="ea">Option 4</option>
                        <option value="ea">Option 5</option>
                    </select> 
                </td>
                <td class="text-center">
                        <a class="btn-info btn">
                            <i class="mdi mdi-rotate-3d "></i>
                        </a>
                </td>
                <td class="text-center"> 
                    <i
                    ></i>
                    <a   class="btn btn-primary" 
                        data-bs-toggle="collapse" href="#Internal_wall${internal_count}"
                        aria-expanded="true" aria-controls="Internal_wall${internal_count}">
                            <i class="fa  fa-chevron-down  "></i>
                        </a>
                </td>
            </tr>
            
            <td colspan="6" class="collapse p-3" id="Internal_wall${internal_count}"  >
                <div class="p-2">
                    <table class="table shadow-sm m-0" id="tblLocations"> 
                        <thead>
                            <tr class="bg-light">
                                <th>Layer Name</th>
                                <th>Type</th>
                                <th>Size</th>
                                <th class="text-center">Add New</th>
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="internal_outer">
                            <tr class="internal_outer_row">
                                <td>
                                    <select name="" class="form-control form-control-sm  border-0">
                                        <option value="q">-- Select -- </option>
                                        <option value="q">Opition</option>
                                        <option value="q">Opition</option>
                                        <option value="q">Opition</option>
                                        <option value="q">Opition</option>
                                        <option value="q">Opition</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm w_90 border-0 layer_name" name="mobileb_no[]" id="mobileb_no_1" placeholder="Type Here">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm w_90  border-0 layer_size" name="mobileb_no[]" id="size_1" placeholder="Type Here">
                                </td> 
                                
                                <td class="text-center">
                                    <a class="internal_add_table_row  mr-2" title="Copy or clone this row">
                                        <i class="btn-success btn fa fa-plus"></i>
                                    </a>
                                </td>
                                <td class="text-center"> 
                                    <a class="internal_remove_table_row" disabled=""><i class="btn-outline-danger btn  fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </td>
          
                                    
            `);
            $(".internal_outer").find(".internal_remove_table_row:not(:first)").prop("disabled", false);
            $(".internal_outer").find(".internal_remove_table_row").first().prop("disabled", true);
        });
    });

    ///======Clone method
    $(document).ready(function(){
        $("body").on("click", ".internal_add_table_row", function (e) {

            var index = $(e.target).closest(".internal_outer").find(".internal_outer_row").length + 1;
            console.log(index);
            var cloned_el = $(e.target).closest(".internal_outer_row").clone(true);
        
            $(e.target).closest(".internal_outer").last().append(cloned_el).find(".internal_remove_table_row:not(:first)").prop("disabled", false);
            $(e.target).closest(".internal_outer").find(".internal_remove_table_row").first().prop("disabled", true);
        
            
            //change id
            $(e.target).closest(".internal_outer").find(".internal_outer_row").last().find(".layer_name").attr("id", "mobileb_no_"+index);
            $(e.target).closest(".internal_outer").find(".internal_outer_row").last().find(".layer_size").attr("id", "size_"+index);
            $(e.target).closest(".internal_outer").find(".internal_outer_row").last().find("select").attr("id", "no_type_"+index);
        
            console.log(cloned_el);

            $(`#mobileb_no_${index}`).val('');
            $(`#size_${index}`).val('');
            //count++;
        });
    });

    $(document).ready(function(){
        //===== delete the form fieed row
        $("body").on("click", ".internal_remove_table_row", function () {
        $(this).closest(".internal_outer_row").remove();
        // console.log("success");
        });
    });

    $(document).on('click', '.remove_internal_wall_btn', function() {
        internal_wall${internal_count}
        let internal_id = section_internal_wall.length;
        $(`#section_internal_wall-${internal_id}`).remove();
        section_internal_wall.pop();
        if(section_internal_wall.length == 0) {
            $(".remove_internal_wall_btn").hide();
        } else {
            $(".remove_internal_wall_btn").show();
        }
    });
    </script>

    <script>
    $(".remove_partition_wall_btn").hide();
    const section_partition_wall = [];
    $(document).ready(function(){
        $("body").on("click",".add_new_partition_wall_btn", function (){ 
            let partition_count = section_partition_wall.length+1;
            section_partition_wall.push(partition_count);
            $(".remove_partition_wall_btn").show();
            var partition_index = $(".partition_wall_parent_outer").find(".partition_wall_parent_outer_row").length + 1;
            $(".partition_wall_parent_outer").append(`  
            <div class="partition_wall_parent_outer_row shadow-sm mb-2" id="section_partition_wall-${partition_count}">
                <div class="accordion-item">
                    <div class="accordion-header p-0 m-0" id="flush-headingTwo">
                        <div class="d-flex align-items-center bg-light">
                            <div class="row align-items-center p-0 m-0">
                                <div class="p-0 col-md">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light" style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                        <label for="floatingInput">Floor Name</label>
                                    </div>
                                </div> 
                                <div class="p-0 col-md">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light" style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                        <label for="floatingInput">Floor Name</label>
                                    </div>
                                </div> 
                                <div class="p-0 col-md">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light" style="border-radius: 0 !important"id="floatingInput" placeholder="name@example.com" />
                                        <label for="floatingInput">Floor Name</label>
                                    </div>
                                </div> 
                                <div class="p-0 col-md">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light"style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                        <label for="floatingInput">Floor Name</label>
                                    </div>
                                </div> 
                                <div class="p-0 col-md">
                                    <div class="form-floating">
                                        <select class="form-select bg-light" id="floatingSelectGrid" aria-label="Floating label select example"style="border-radius: 0 !important">
                                            <option selected>-- Choose --</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <label for="floatingSelectGrid">Delivery Type</label>
                                    </div>
                                </div>  
                            </div>
                            <div class="col" >
                                <button class="collapsed accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#partition_wall_flush-collapse${partition_count}" aria-expanded="false" aria-controls="partition_wall_flush-collapse${partition_count}"></button>
                            </div>
                        </div>
                    </div>
                    <div id="partition_wall_flush-collapse${partition_count}" class="accordion-collapse collapse" aria-labelledby="partition_wall_flush-collapse${partition_count}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="max-height: 300px !important; overflow:auto">
                        <table class="table table-hover m-0" id="partition_wall_table"> 
                            <thead  >
                                <tr >
                                    <th>Layer Name</th>
                                    <th>Type</th>
                                    <th>Size</th>
                                    <th  class="text-center">Add New</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="partition_outer">
                                <tr class="partition_outer_row">
                                    <td>
                                        <select name=""   class="form-control form-control-sm  border-0">
                                            <option value="q">-- Select -- </option>
                                            <option value="q">Opition</option>
                                            <option value="q">Opition</option>
                                            <option value="q">Opition</option>
                                            <option value="q">Opition</option>
                                            <option value="q">Opition</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm w_90 border-0 layer_name" name="mobileb_no[]" id="mobileb_no_1" placeholder="Type Here" />
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm w_90  border-0 layer_size" name="mobileb_no[]" id="size_1" placeholder="Type Here" />
                                    </td> 
                                        
                                    <td class="text-center">
                                        <a class="partition_add_table_row  mr-2" title="Copy or clone this row">
                                            <i class="btn-success btn dripicons-plus"></i>
                                        </a>
                                    </td>
                                    <td class="text-center"> 
                                        <a class="partition_remove_table_row" disabled><i class="mdi mdi-delete btn-outline-danger btn"></i> </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
                                    
            `);
            $(".partition_outer").find(".partition_remove_table_row:not(:first)").prop("disabled", false);
            $(".partition_outer").find(".partition_remove_table_row").first().prop("disabled", true);
        });
    });

    ///======Clone method
    $(document).ready(function(){
        $("body").on("click", ".partition_add_table_row", function (e) {

            var index = $(e.target).closest(".partition_outer").find(".partition_outer_row").length + 1;
            var cloned_el = $(e.target).closest(".partition_outer_row").clone(true);
        
            $(e.target).closest(".partition_outer").last().append(cloned_el).find(".partition_remove_table_row:not(:first)").prop("disabled", false);
            $(e.target).closest(".partition_outer").find(".partition_remove_table_row").first().prop("disabled", true);
        
            
            //change id
            $(e.target).closest(".partition_outer").find(".partition_outer_row").last().find(".layer_name").attr("id", "mobileb_no_"+index);
            $(e.target).closest(".partition_outer").find(".partition_outer_row").last().find(".layer_size").attr("id", "size_"+index);
            $(e.target).closest(".partition_outer").find(".partition_outer_row").last().find("select").attr("id", "no_type_"+index);
        
            console.log(cloned_el);

            $(`#mobileb_no_${index}`).val('');
            $(`#size_${index}`).val('');
            //count++;
        });
    });

    $(document).ready(function(){
        //===== delete the form fieed row
        $("body").on("click", ".partition_remove_table_row", function () {
        $(this).closest(".partition_outer_row").remove();
        // console.log("success");
        });
    });

    $(document).on('click', '.remove_partition_wall_btn', function() {
        
        let partition_id = section_partition_wall.length;
        $(`#section_partition_wall-${partition_id}`).remove();
        section_partition_wall.pop();
        if(section_partition_wall.length == 0) {
            $(".remove_partition_wall_btn").hide();
        } else {
            $(".remove_partition_wall_btn").show();
        }
    });
    </script>

    <script>
    $(".remove_Ceiling_wall_btn").hide();
    const section_Ceiling_wall = [];
    $(document).ready(function(){
        $("body").on("click",".add_new_Ceiling_wall_btn", function (){ 
            let Ceiling_count = section_Ceiling_wall.length+1;
            section_Ceiling_wall.push(Ceiling_count);
            $(".remove_Ceiling_wall_btn").show();
            var Ceiling_index = $(".Ceiling_wall_parent_outer").find(".Ceiling_wall_parent_outer_row").length + 1;
            $(".Ceiling_wall_parent_outer").append(`  
            <div class="Ceiling_wall_parent_outer_row shadow-sm mb-2" id="section_Ceiling_wall-${Ceiling_count}">
                <div class="accordion-item">
                    <div class="accordion-header p-0 m-0" id="flush-headingTwo">
                        <div class="d-flex align-items-center bg-light">
                            <div class="row align-items-center p-0 m-0">
                                <div class="p-0 col-md">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light" style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                        <label for="floatingInput">Floor Name</label>
                                    </div>
                                </div> 
                                <div class="p-0 col-md">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light" style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                        <label for="floatingInput">Floor Name</label>
                                    </div>
                                </div> 
                                <div class="p-0 col-md">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light" style="border-radius: 0 !important"id="floatingInput" placeholder="name@example.com" />
                                        <label for="floatingInput">Floor Name</label>
                                    </div>
                                </div> 
                                <div class="p-0 col-md">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light"style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                        <label for="floatingInput">Floor Name</label>
                                    </div>
                                </div> 
                                <div class="p-0 col-md">
                                    <div class="form-floating">
                                        <select class="form-select bg-light" id="floatingSelectGrid" aria-label="Floating label select example"style="border-radius: 0 !important">
                                            <option selected>-- Choose --</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <label for="floatingSelectGrid">Delivery Type</label>
                                    </div>
                                </div>  
                            </div>
                            <div class="col" >
                                <button class="collapsed accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#Ceiling_wall_flush-collapse${Ceiling_count}" aria-expanded="false" aria-controls="Ceiling_wall_flush-collapse${Ceiling_count}"></button>
                            </div>
                        </div>
                    </div>
                    <div id="Ceiling_wall_flush-collapse${Ceiling_count}" class="accordion-collapse collapse" aria-labelledby="Ceiling_wall_flush-collapse${Ceiling_count}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="max-height: 300px !important; overflow:auto">
                        <table class="table table-hover m-0" id="Ceiling_wall_table"> 
                            <thead  >
                                <tr >
                                    <th>Layer Name</th>
                                    <th>Type</th>
                                    <th>Size</th>
                                    <th  class="text-center">Add New</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="Ceiling_outer">
                                <tr class="Ceiling_outer_row">
                                    <td>
                                        <select name=""   class="form-control form-control-sm  border-0">
                                            <option value="q">-- Select -- </option>
                                            <option value="q">Opition</option>
                                            <option value="q">Opition</option>
                                            <option value="q">Opition</option>
                                            <option value="q">Opition</option>
                                            <option value="q">Opition</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm w_90 border-0 layer_name" name="mobileb_no[]" id="mobileb_no_1" placeholder="Type Here" />
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm w_90  border-0 layer_size" name="mobileb_no[]" id="size_1" placeholder="Type Here" />
                                    </td> 
                                        
                                    <td class="text-center">
                                        <a class="Ceiling_add_table_row  mr-2" title="Copy or clone this row">
                                            <i class="btn-success btn dripicons-plus"></i>
                                        </a>
                                    </td>
                                    <td class="text-center"> 
                                        <a class="Ceiling_remove_table_row" disabled><i class="mdi mdi-delete btn-outline-danger btn"></i> </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
                                    
            `);
            $(".Ceiling_outer").find(".Ceiling_remove_table_row:not(:first)").prop("disabled", false);
            $(".Ceiling_outer").find(".Ceiling_remove_table_row").first().prop("disabled", true);
        });
    });

    ///======Clone method
    $(document).ready(function(){
        $("body").on("click", ".Ceiling_add_table_row", function (e) {

            var index = $(e.target).closest(".Ceiling_outer").find(".Ceiling_outer_row").length + 1;
            var cloned_el = $(e.target).closest(".Ceiling_outer_row").clone(true);
        
            $(e.target).closest(".Ceiling_outer").last().append(cloned_el).find(".Ceiling_remove_table_row:not(:first)").prop("disabled", false);
            $(e.target).closest(".Ceiling_outer").find(".Ceiling_remove_table_row").first().prop("disabled", true);
        
            
            //change id
            $(e.target).closest(".Ceiling_outer").find(".Ceiling_outer_row").last().find(".layer_name").attr("id", "mobileb_no_"+index);
            $(e.target).closest(".Ceiling_outer").find(".Ceiling_outer_row").last().find(".layer_size").attr("id", "size_"+index);
            $(e.target).closest(".Ceiling_outer").find(".Ceiling_outer_row").last().find("select").attr("id", "no_type_"+index);
        
            console.log(cloned_el);

            $(`#mobileb_no_${index}`).val('');
            $(`#size_${index}`).val('');
            //count++;
        });
    });

    $(document).ready(function(){
        //===== delete the form fieed row
        $("body").on("click", ".Ceiling_remove_table_row", function () {
        $(this).closest(".Ceiling_outer_row").remove();
        // console.log("success");
        });
    });

    $(document).on('click', '.remove_Ceiling_wall_btn', function() {
        
        let Ceiling_id = section_Ceiling_wall.length;
        $(`#section_Ceiling_wall-${Ceiling_id}`).remove();
        section_Ceiling_wall.pop();
        if(section_Ceiling_wall.length == 0) {
            $(".remove_Ceiling_wall_btn").hide();
        } else {
            $(".remove_Ceiling_wall_btn").show();
        }
    });
    </script>

    <script>
    $(".remove_Roof_wall_btn").hide();
    const section_Roof_wall = [];
    $(document).ready(function(){
        $("body").on("click",".add_new_Roof_wall_btn", function (){ 
            let Roof_count = section_Roof_wall.length+1;
            section_Roof_wall.push(Roof_count);
            $(".remove_Roof_wall_btn").show();
            var Roof_index = $(".Roof_wall_parent_outer").find(".Roof_wall_parent_outer_row").length + 1;
            $(".Roof_wall_parent_outer").append(`  
            <div class="Roof_wall_parent_outer_row shadow-sm mb-2" id="section_Roof_wall-${Roof_count}">
                <div class="accordion-item">
                    <div class="accordion-header p-0 m-0" id="flush-headingTwo">
                        <div class="d-flex align-items-center bg-light">
                            <div class="row align-items-center p-0 m-0">
                                <div class="p-0 col-md">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light" style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                        <label for="floatingInput">Floor Name</label>
                                    </div>
                                </div> 
                                <div class="p-0 col-md">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light" style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                        <label for="floatingInput">Floor Name</label>
                                    </div>
                                </div> 
                                <div class="p-0 col-md">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light" style="border-radius: 0 !important"id="floatingInput" placeholder="name@example.com" />
                                        <label for="floatingInput">Floor Name</label>
                                    </div>
                                </div> 
                                <div class="p-0 col-md">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light"style="border-radius: 0 !important" id="floatingInput" placeholder="name@example.com" />
                                        <label for="floatingInput">Floor Name</label>
                                    </div>
                                </div> 
                                <div class="p-0 col-md">
                                    <div class="form-floating">
                                        <select class="form-select bg-light" id="floatingSelectGrid" aria-label="Floating label select example"style="border-radius: 0 !important">
                                            <option selected>-- Choose --</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <label for="floatingSelectGrid">Delivery Type</label>
                                    </div>
                                </div>  
                            </div>
                            <div class="col" >
                                <button class="collapsed accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#Roof_wall_flush-collapse${Roof_count}" aria-expanded="false" aria-controls="Roof_wall_flush-collapse${Roof_count}"></button>
                            </div>
                        </div>
                    </div>
                    <div id="Roof_wall_flush-collapse${Roof_count}" class="accordion-collapse collapse" aria-labelledby="Roof_wall_flush-collapse${Roof_count}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body" style="max-height: 300px !important; overflow:auto">
                        <table class="table table-hover m-0" id="Roof_wall_table"> 
                            <thead  >
                                <tr >
                                    <th>Layer Name</th>
                                    <th>Type</th>
                                    <th>Size</th>
                                    <th  class="text-center">Add New</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="Roof_outer">
                                <tr class="Roof_outer_row">
                                    <td>
                                        <select name=""   class="form-control form-control-sm  border-0">
                                            <option value="q">-- Select -- </option>
                                            <option value="q">Opition</option>
                                            <option value="q">Opition</option>
                                            <option value="q">Opition</option>
                                            <option value="q">Opition</option>
                                            <option value="q">Opition</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm w_90 border-0 layer_name" name="mobileb_no[]" id="mobileb_no_1" placeholder="Type Here" />
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm w_90  border-0 layer_size" name="mobileb_no[]" id="size_1" placeholder="Type Here" />
                                    </td> 
                                        
                                    <td class="text-center">
                                        <a class="Roof_add_table_row  mr-2" title="Copy or clone this row">
                                            <i class="btn-success btn dripicons-plus"></i>
                                        </a>
                                    </td>
                                    <td class="text-center"> 
                                        <a class="Roof_remove_table_row" disabled><i class="mdi mdi-delete btn-outline-danger btn"></i> </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
                                    
            `);
            $(".Roof_outer").find(".Roof_remove_table_row:not(:first)").prop("disabled", false);
            $(".Roof_outer").find(".Roof_remove_table_row").first().prop("disabled", true);
        });
    });

    ///======Clone method
    $(document).ready(function(){
        $("body").on("click", ".Roof_add_table_row", function (e) {

            var index = $(e.target).closest(".Roof_outer").find(".Roof_outer_row").length + 1;
            var cloned_el = $(e.target).closest(".Roof_outer_row").clone(true);
        
            $(e.target).closest(".Roof_outer").last().append(cloned_el).find(".Roof_remove_table_row:not(:first)").prop("disabled", false);
            $(e.target).closest(".Roof_outer").find(".Roof_remove_table_row").first().prop("disabled", true);
        
            
            //change id
            $(e.target).closest(".Roof_outer").find(".Roof_outer_row").last().find(".layer_name").attr("id", "mobileb_no_"+index);
            $(e.target).closest(".Roof_outer").find(".Roof_outer_row").last().find(".layer_size").attr("id", "size_"+index);
            $(e.target).closest(".Roof_outer").find(".Roof_outer_row").last().find("select").attr("id", "no_type_"+index);
        
            console.log(cloned_el);

            $(`#mobileb_no_${index}`).val('');
            $(`#size_${index}`).val('');
            //count++;
        });
    });

    $(document).ready(function(){
        //===== delete the form fieed row
        $("body").on("click", ".Roof_remove_table_row", function () {
        $(this).closest(".Roof_outer_row").remove();
        // console.log("success");
        });
    });

    $(document).on('click', '.remove_Roof_wall_btn', function() {
        
        let Roof_id = section_Roof_wall.length;
        $(`#section_Roof_wall-${Roof_id}`).remove();
        section_Roof_wall.pop();
        if(section_Roof_wall.length == 0) {
            $(".remove_Roof_wall_btn").hide();
        } else {
            $(".remove_Roof_wall_btn").show();
        }
    });
    </script>

@endpush