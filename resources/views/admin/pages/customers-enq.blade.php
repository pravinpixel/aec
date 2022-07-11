     
@extends('layouts.admin')

@section('admin-content')
         
    
    <div class="content-page" ng-app="App">
        <div class="content">

            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.includes.page-navigater') 
            </div>                

            <div class="card border">
                <div class="card-body  pb-0">
                        <div id="rootwizard">
                            <ul class="nav nav-pills nav-justified form-wizard-header bg-light">
                                <li class="nav-item" data-target-form="#accountForm">
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
                                                        <option value="Living House">Living House</option> 
                                                        <option value="Cabin">Cabin</option> 
                                                        <option value="Apartments">Apartments</option> 
                                                        <option value="Public Buildings">Public Buildings</option> 
                                                        <option value="Commercial Building">Commercial Building</option> 
                                                        <option value="Others">Others</option>
                                                    </select>
                                                    <label for="floatingSelect">Type of Building</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                                                        <option value="">--</option> 
                                                        <option value="New Construction">New Construction</option> 
                                                        <option value="Renovation">Renovation</option> 
                                                        <option value="Others">Others</option> 
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
                                                        <option value="New Construction">New Construction</option> 
                                                        <option value="Renovation">Renovation</option> 
                                                        <option value="Others">Others</option> 
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
                                        <div class="row mx-0">
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
                                            
                                            <table class="table custom table-bordered" id="myTable">
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
                                                        <td class="text-success">XXXX</td>
                                                        <td class="text-info">
                                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn p-2">Add new</span>
                                                        </td>
                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td>2</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">XXXX</td>
                                                        <td class="text-success">
                                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn p-2">View</span>
                                                        </td>
                                                        <td><span class="badge badge-outline-primary rounded-pill">Approved</span></td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn  btn-info"  data-bs-toggle="collapse" href="#collapseOne_2" aria-expanded="true" aria-controls="collapseOne_2"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapseOne_2" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <div class="p-3 card">
                                                                <table class="table custom table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>XXx</td>
                                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>YYY</td>
                                                                        <td><span class="badge badge-outline-info rounded-pill">Reviewing</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>ZZZ</td>
                                                                        <td><span class="badge badge-outline-secondary rounded-pill">Reviewing</span></td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                            </div>
                                                        </td>
                                                    </tr>                                                       
                                                    
                                                    <tr>
                                                        <td>3</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">XXXX</td>
                                                        <td class="text-success">
                                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                                                        </td>
                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td>4</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">XXXX</td>
                                                        <td class="text-info">
                                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn p-2">Add new</span>
                                                        </td>
                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn  btn-info"  data-bs-toggle="collapse" href="#collapseOne_4" aria-expanded="true" aria-controls="collapseOne_4"></i>
                                                        </td>
                                                    </tr> 
                                                    <tr id="collapseOne_4" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table custom table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-info rounded-pill">Reviewing</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-secondary rounded-pill">Reviewing</span></td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">XXXX</td>
                                                        <td class="text-success">
                                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                                                        </td>
                                                        <td><span class="badge badge-outline-primary rounded-pill">Approved</span></td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                        </td>
                                                    </tr>                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="container">
                                            <h3>FACADE View </h3>
                                            
                                            <table class="table custom table-bordered" id="myTable">
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
                                                        <td class="text-success">XXXX</td>
                                                        <td class="text-info">
                                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn p-2">Add new</span>
                                                        </td>
                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_1" aria-expanded="true" aria-controls="collapsene_1"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapsene_1" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table custom table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-info rounded-pill">Reviewing</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-secondary rounded-pill">Reviewing</span></td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>2</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">XXXX</td>
                                                        <td class="text-info">
                                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn p-2">Add new</span>
                                                        </td>
                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_2" aria-expanded="true" aria-controls="collapsene_2"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapsene_2" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table custom table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-info rounded-pill">Reviewing</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-secondary rounded-pill">Reviewing</span></td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">XXXX</td>
                                                        <td class="text-success">
                                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                                                        </td>
                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                                                                       
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="container">
                                            <h3>IFC Model </h3>
                                            
                                            <table class="table custom table-bordered" id="myTable">
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
                                                        <td class="text-success">XXXX</td>
                                                        <td class="text-success">
                                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                                                        </td>
                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_1" aria-expanded="true" aria-controls="collapsene_1"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapsene_1" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table custom table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-info rounded-pill">Reviewing</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-secondary rounded-pill">Reviewing</span></td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>2</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">XXXX</td>
                                                        <td class="text-success">
                                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                                                        </td>
                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_2" aria-expanded="true" aria-controls="collapsene_2"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapsene_2" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table custom table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-info rounded-pill">Reviewing</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-secondary rounded-pill">Reviewing</span></td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>3</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">XXXX</td>
                                                        <td class="text-success">
                                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                                                        </td>
                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                     
                                                                                                            
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="container">
                                            <h3>Others</h3>
                                            
                                            <table class="table custom table-bordered" id="myTable">
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
                                                        <td class="text-success">XXXX</td>
                                                        <td class="text-success">
                                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                                                        </td>
                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">XXXX</td>
                                                        <td class="text-success">
                                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                                                        </td>
                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_2" aria-expanded="true" aria-controls="collapsene_2"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapsene_2" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table custom table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-info rounded-pill">Reviewing</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-secondary rounded-pill">Reviewing</span></td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                                                                                
                                                    
                                                    <tr>
                                                        <td>3</td>
                                                        <td>05 May 2013</td>
                                                        <td>Dummy Name</td>
                                                        <td class="text-success">XXXX</td>
                                                        <td class="text-success">
                                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                                                        </td>
                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        <td>
                                                            <i class="feather-eye btn-success btn mr-3"></i>
                                                            <i class="feather-trash btn-danger btn  mr-3"></i>
                                                            <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_3" aria-expanded="true" aria-controls="collapsene_3"></i>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr id="collapsene_3" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <td colspan="7" class="hiddenRow">
                                                            <table class="table custom table-border">
                                                                    <tbody><tr>
                                                                        <th>Date</th>
                                                                        <th>File Name</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>05-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>04-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-info rounded-pill">Reviewing</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>03-06-2021</td>
                                                                        <td>XXXX</td>
                                                                        <td><span class="badge badge-outline-secondary rounded-pill">Reviewing</span></td>
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

                                <div class="tab-pane p-0 h-100 fade " id="five" ng-controller="CrudCtrl">
                                    <div class="row">
                                        <div class="col-sm mb-2 mb-sm-0">
                                            <div class="nav flex-column nav-pills shadow-sm rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a ng-repeat="(fIndex,w) in wallGroup" ng-class="{active: $index == 0}" ng-class="{show: $index == 0}" class="nav-link d-flex flex-column align-items-center justify-content-center" id="v-pills-tab_wall_@{{ fIndex }}" data-bs-toggle="pill" href="#v-pills-profile_wall_@{{ fIndex }}" role="tab" aria-controls="v-pills-profile_wall_@{{ fIndex }}"
                                                    aria-selected="false">
                                                    <i class="fa-2x @{{ w.WallIcon }}"></i>
                                                    <div>@{{ w.WallName }}</div>
                                                </a>
                                            </div>
                                        </div> 
                                    
                                        <div class="col-sm-10">
                                            <div class="tab-content" id="v-pills-tabContent">


                                                <div class="tab-pane fade " ng-repeat="(fIndex,w) in wallGroup" ng-class="{show: $index == 0, active: $index == 0}" id="v-pills-profile_wall_@{{ fIndex }}" role="tabpanel" aria-labelledby="v-pills-profile-tab_wall_@{{ fIndex }}">

                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div > <h3> <div> </div></h3> </div>
                                                        <button class="btn btn-info mb-2 float-end" ng-click="AddWallDetails(fIndex)"><i class="fa fa-plus"></i> Add Wall</button>
                                                    </div>

                                                    <div ng-repeat="(Secindex,d) in w.Details">    
                                                                                                           
                                                        <div class="accordion mb-3 " id="accordionTable_@{{ Secindex }}_@{{ fIndex  }}" >
                                                         
                                                           <div class="btn border" style="border-bottom:0px !important;background:#F1F2FE;border-radius: 10px 10px 0 0; transform:translateY(2px)">@{{ w.WallName }} 1.@{{$index + 1}}</div>
                                                           {{-- <button class="btn btn-info float-end"  ng-click="AddWallDetails(fIndex)"><i class="fa fa-plus"></i> Add Floor</button> --}}
                                                            <div class="accordion-item shadow-sm  ">
                                                                
                                                                <div class="accordion-header m-0  " style="background:#f1f2fe" id="headingOne">                                                                    
                                                                    <table class="table custom table-bordered m-0  ">
                                                                        <tr>
                                                                            <th  class="bg-white">
                                                                                <div class="form-group">
                                                                                    <label class="form-lable text-dark shadow-sm position-absolute border">Floor</label>
                                                                                    <input type="text" class="form-control form-control-sm my-2 mt-3" placeholder="Type here...">
                                                                                </div>
                                                                            </th>
                                                                            <th  class="bg-white">
                                                                                <div class="form-group">
                                                                                    <label class="form-lable text-dark shadow-sm position-absolute border">EXD wall number</label>
                                                                                    <input type="text" class="form-control form-control-sm my-2  mt-3" placeholder="Type here...">
                                                                                </div>
                                                                            </th>
                                                                            <th  class="bg-white">
                                                                                <div class="form-group">
                                                                                    <label class="form-lable text-dark shadow-sm position-absolute border">Delivery Type</label>
                                                                                    <select class="form-select  form-select-sm my-2 mt-3">
                                                                                        <option selected >-- Choose --</option>
                                                                                        <option value="Element">Element</option>
                                                                                        <option value="Precut">Precut</option>
                                                                                        <option value="Module">Module</option>
                                                                                        <option value="mix of all">Mix of All</option>
                                                                                        <option value="Others">Others</option>
                                                                                    </select>
                                                                                </div>
                                                                            </th>
                                                                            <th  class="bg-white">
                                                                                <div class="form-group">
                                                                                    <label class="form-lable text-dark shadow-sm position-absolute border">Approx total area</label>
                                                                                    <input type="number" class="form-control form-control-sm my-2  mt-3" >
                                                                                </div>
                                                                            </th> 
                                                                            <th  class="bg-white">
                                                                                <div class="btn-group">
                                                                                    <button class="btn-primary btn more-btn-layer" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneaccordionTable_@{{ Secindex }}_@{{ fIndex  }}" aria-expanded="true" aria-controls="collapseOneaccordionTable_@{{ Secindex }}_@{{ fIndex  }}">
                                                                                        <i class="fa fa-chevron-down"></i>
                                                                                    </button>
                                                                                    
                                                                                    {{-- <span  class="position-absolute wall-delete-btn  badge bg-danger">
                                                                                        <i class="fa fa-trash"></i>
                                                                                    </span>  --}}
                                                                                </div>
                                                                            </th>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div id="collapseOneaccordionTable_@{{ Secindex }}_@{{ fIndex  }}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionTable_@{{ Secindex }}_@{{ fIndex  }}">
                                                                    <div class="accordion-body p-0">
                                                                        <div class=" rounded ">
                                                                            <div class="card-header border-0 shadow p-0 ">
                                                                                <div class="row m-0 p-3 py-2 align-items-center">
                                                                                    <div class="col-md-8 p-0">
                                                                                        <div class="btn-group">
                                                                                            <span class="me-2 shadow-sm badge badge-secondary-lighten d-flex justify-content-center align-items-center">
                                                                                                <img width="25px" src="{{ asset("public/assets/images/icon_wallthickness.png") }}" alt="icon_wallthickness"> 
                                                                                                <span> <b class="px-2"> 0.25</b></span>
                                                                                            </span>
                                                                                            <span class="me-2 shadow-sm badge badge-danger-lighten d-flex justify-content-center align-items-center">
                                                                                                <img width="25px" src="{{ asset("public/assets/images/icon_fire.png") }}" alt="icon_fire">
                                                                                                <span> <b class="px-2"> 1.75</b></span>
                                                                                            </span>
                                                                                            <span class="me-2 shadow-sm badge badge-info-lighten d-flex justify-content-center align-items-center">
                                                                                                <img width="25px" src="{{ asset("public/assets/images/icon_acoustic.png") }}" alt="icon_acoustic">
                                                                                                <span> <b class="px-2"> 4.25</b></span>
                                                                                            </span>
                                                                                            <span class="me-2 shadow-sm badge badge-warning-lighten d-flex justify-content-center align-items-center">
                                                                                                <img width="25px" src="{{ asset("public/assets/images/icon_insulation.png") }}" alt="icon_insulation">
                                                                                                <span> <b class="px-2"> 0.75</b></span>
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md p-0">
                                                                                        <div class="w-100 text-end">
                                                                                            <div class="d-flex justify-content-end">
                                                                                                <button class="btn-sm float-end btn btn-outline-primary me-2" ng-click="AddLayers(fIndex , Secindex)" title="Add New Layer" ><i class="fa fa-plus" ></i> Add Layer</button>
                                                                                                <button ng-click="RemoveDetails(fIndex , Secindex)" class=" btn-danger btn shadow-lg  RemoveDetails" type="button"><i class="fa fa-trash"></i></button>
                                                                                            </div> 
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-body pt-4">
                                                                                <table class="table custom table-borderless m-0 " > 
                                                                                    <tbody>
                                                                                        <tr ng-repeat="(ThreeIndex,l) in d.Layers">
                                                                                            <td>
                                                                                                <div class="form-group shadow-sm">
                                                                                                    <label class="form-lable shadow-sm position-absolute border" style="background: #FFFFFF">Layer Name</label>
                                                                                                    <select class="form-select  form-select-sm" ng-model="layer.LayerName">
                                                                                                        <option value="">-- Choose --</option>
                                                                                                        <option value="1">External Cladding</option>
                                                                                                        <option value="2">Horizontal Nailers</option>
                                                                                                        <option value="3">Vertical Nailers</option>
                                                                                                        <option value="4">External Insulation</option>
                                                                                                        <option value="5">Wind Barrier</option>
                                                                                                        <option value="7">Planking</option>
                                                                                                        <option value="9">Construction</option>
                                                                                                        <option value="10">Insulation</option>
                                                                                                        <option value="12">Planking</option>
                                                                                                        <option value="14">Vapour Barrier</option>
                                                                                                        <option value="17">Insulation</option>
                                                                                                        <option value="18">Internal Planking</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td> 
                                                                                                <div class="form-group shadow-sm">
                                                                                                    <label class="form-lable shadow-sm position-absolute border" style="background: #FFFFFF">Layer Type</label>
                                                                                                    <select class="form-select  form-select-sm" ng-model="layer.Type">
                                                                                                        <option value="">-- Choose --</option>
                                                                                                        <option value="1">External Cladding</option>
                                                                                                        <option value="2">Horizontal Nailers</option>
                                                                                                        <option value="3">Vertical Nailers</option>
                                                                                                        <option value="4">External Insulation</option>
                                                                                                        <option value="5">Wind Barrier</option>
                                                                                                        <option value="7">Planking</option>
                                                                                                        <option value="9">Construction</option>
                                                                                                        <option value="10">Insulation</option>
                                                                                                        <option value="12">Planking</option>
                                                                                                        <option value="14">Vapour Barrier</option>
                                                                                                        <option value="17">Insulation</option>
                                                                                                        <option value="18">Internal Planking</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td width="35%"> 
                                                                                                <div class="btn-group shadow-sm border rounded">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-lable badge-secondary-lighten shadow-sm position-absolute border" style="background: #FFFFFF">Thickness </label>
                                                                                                        <input type="number" class="form-control rounded-0 rounded-start  border-0 form-control-sm" ng-model="layer.Thickness " >
                                                                                                    </div>
                                                                                                    <span class="input-group-text border-0 rounded-0 px-2 justify-content-center" >x</span>
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-lable shadow-sm position-absolute border" style="background: #FFFFFF">Breadth</label>
                                                                                                        <input type="number" class="form-control form-control-sm rounded-0 border-0 " ng-model="layer.Breadth" >
                                                                                                    </div>
                                                                                                    <span class="input-group-text rounded-0 border-0 px-2 rounded-end justify-content-center">.mm</span>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td class="text-center">
                                                                                                <div class="btn-group">
                                                                                                    <button class="btn btn-outline-danger rounded shadow-sm btn-sm" ng-click="removeLayer(fIndex, Secindex , ThreeIndex)"><div class="fa fa-trash " ></div></button>
                                                                                                </div>
                                                                                            </td> 
                                                                                        </tr>
                                                                                    </tbody>
                                                                                    
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                    {{-- <div >
                                                        <h3>@{{ w.WallName }}</h3>
                                                        <button class="btn btn-info float-end mb-2 "  ng-click="AddWallDetails(fIndex)"><i class="fa fa-plus"></i> Add Floor</button>
                                                        <table class="table custom table-bordered ">
                                                            <thead class="badge-primary-lighten">
                                                                <tr>
                                                                    <th>FloorName</th>
                                                                    <th>Floor Number	</th>
                                                                    <th>Total Area	</th>
                                                                    <th>Delivery Type</th> 
                                                                    <th>Layers</th> 
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr ng-repeat="(Secindex,d) in w.Details">
                                                                    <td>
                                                                        <input class="form-control" type="text" ng-model="d.FloorName" placeholder="Type Here..."/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" type="number" ng-model="d.FloorNumber" placeholder="Type Here..."/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" type="text" ng-model="d.TotalArea"  placeholder="Type Here..." />
                                                                    </td>
                                                                    <td  width="20%">
                                                                        <select class="form-select" ng-model="d.DeliveryType">
                                                                            <option value="">-- Choose --</option>
                                                                            <option value="Element">Element</option>
                                                                            <option value="Precut">Precut</option>
                                                                            <option value="Module">Module</option>
                                                                            <option value="mix of all">Mix of All</option>
                                                                            <option value="Others">Others</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#primary-header-modal__@{{ Secindex }}_@{{ fIndex  }}"><i class="fa fa-plus"></i></button>
                                                                        <div id="primary-header-modal__@{{ Secindex }}_@{{ fIndex  }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel__@{{ Secindex }}_@{{ fIndex  }}" aria-hidden="true">
                                                                            <div class="modal-dialog modal-xl">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header modal-colored-header bg-primary">
                                                                                        <h4 class="modal-title" id="primary-header-modalLabel__@{{ Secindex }}_@{{ fIndex  }}"> @{{ d.FloorName }}</h4>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="row m-0 mb-2">
                                                                                            <div class="col-sm-3 shadow-lg border p-2 x-y-center">
                                                                                                <i style="font-size: 35px" class="mdi mdi-ear-hearing-off   text-primary me-2" aria-hidden="true"></i>
                                                                                                <div id="count"><span class="badge badge-primary-lighten rounded-pill">1.35</span></div>
                                                                                            </div>
                                                                                            <div class="col-sm-3 shadow-sm border p-2 x-y-center">
                                                                                                <i style="font-size: 35px" class="fa  fa-snowflake-o   text-info  me-2" aria-hidden="true"></i>
                                                                                                <div id="count"><span class="badge badge-info-lighten rounded-pill">0.5</span></div>
                                                                                            </div>
                                                                                            <div class="col-sm-3 shadow-lg border p-2 x-y-center">
                                                                                                <i style="font-size: 40px" class="mdi mdi-fire  text-danger  me-2" aria-hidden="true"></i>
                                                                                                <div id="count"><span class="badge badge-danger-lighten rounded-pill">0.45</span></div>
                                                                                            </div>
                                                                                            <div class="col-sm-3 shadow-sm border p-2 x-y-center">
                                                                                                <i style="font-size: 35px" class="fa fa-thermometer-half   text-warning  me-2" aria-hidden="true"></i>
                                                                                                <div id="count"><span class="badge badge-warning-lighten rounded-pill">2.05</span></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-horizontal">
                                                                                            <div class="row m-0 text-start">
                                                                                                <div class="col-md-6">
                                                                                                    <div class="row my-3">
                                                                                                        <label for="inputEmail3" class="col-3 col-form-label">Floor Name</label>
                                                                                                        <div class="col-9">
                                                                                                            <input type="text" disabled class="form-control" id="inputEmail3" value="@{{ d.FloorName }}" >
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mb-3">
                                                                                                        <label for="inputPassword3" class="col-3 col-form-label">Floor Number</label>
                                                                                                        <div class="col-9">
                                                                                                            <input type="text" disabled class="form-control" id="inputPassword3" value="@{{ d.FloorNumber }}" >
                                                                                                        </div>
                                                                                                    </div> 
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="row my-3">
                                                                                                        <label for="inputEmail3" class="col-3 col-form-label">Total Area </label>
                                                                                                        <div class="col-9">
                                                                                                            <input type="text" disabled class="form-control" id="inputEmail3" value="@{{ d.TotalArea }}" >
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mb-3">
                                                                                                        <label for="inputPassword3" class="col-3 col-form-label">Delivery Type</label>
                                                                                                        <div class="col-9">
                                                                                                            <input type="text" disabled class="form-control" id="inputPassword3" value="@{{ d.DeliveryType }}" >
                                                                                                        </div>
                                                                                                    </div> 
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                        <div >
                                                                                            <table class="table custom dt-responsive nowrap m-0" >
                                                                                                <tr class="bg-light">
                                                                                                    <th> LayerName </th>
                                                                                                    <th> Type </th>
                                                                                                    <th> Size</th>
                                                                                                    <th><button class="btn btn-primary  btn-sm" ng-click="AddLayers(fIndex , Secindex)"> <i class="fa fa-plus"></i> Add New Layer</button></th>
                                                                                                </tr>
                                                                                                <tbody>
                                                                                                    <tr ng-repeat="(ThreeIndex,l) in d.Layers">
                                                                                                        <td>
                                                                                                            <select class="form-select" ng-model="layer.LayerName">
                                                                                                                <option value="">-- Choose --</option>
                                                                                                                <option value="1">External Cladding</option>
                                                                                                                <option value="2">Horizontal Nailers</option>
                                                                                                                <option value="3">Vertical Nailers</option>
                                                                                                                <option value="4">External Insulation</option>
                                                                                                                <option value="5">Wind Barrier</option>
                                                                                                                <option value="7">Planking</option>
                                                                                                                <option value="9">Construction</option>
                                                                                                                <option value="10">Insulation</option>
                                                                                                                <option value="12">Planking</option>
                                                                                                                <option value="14">Vapour Barrier</option>
                                                                                                                <option value="17">Insulation</option>
                                                                                                                <option value="18">Internal Planking</option>
                                                                                                            </select>
                                                                                                        </td>
                                                                                                        <td> 
                                                                                                            <input class="form-control" type="text" ng-model="layer.Type" placeholder="Type Here..."  />
                                                                                                        </td>
                                                                                                        <td> 
                                                                                                            <input class="form-control" type="text" ng-model="layer.Size" placeholder="Type Here..." />
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="btn-group">
                                                                                                                <button class="btn btn-outline-danger" ng-click="removeLayer(fIndex, Secindex , ThreeIndex)"><div class="fa fa-trash"></div></button>
                                                                                                            </div>
                                                                                                        </td> 
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                                
                                                                                            </table>
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
                                                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save & Close</button>
                                                                                    </div>
                                                                                </div> 
                                                                            </div> 
                                                                        </div> 
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <button class="btn btn-danger" ng-click="RemoveDetails(fIndex , Secindex)"><i class="fa fa-trash"></i></button>
                                                                    </td> 
                                                                </tr>
                                                            </tbody>
                                                        </table> 
                                                    </div> --}}
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
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa fa-user me-2"></i> <span class="float-start"> Nishanth ( <small>Sales Admin</small> )</span>
                                                    </div>

                                                </div>
                                                <div class="card p-3 my-3 shadow rounded">
                                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo blanditiis eos quidem iure voluptates, ipsam vel dolore rem facere, alias doloribus dignissimos iste in a. Eveniet tenetur dignissimos molestiae perferendis?</p>
                                                    <div class="text-right d-flex align-items-center   justify-content-end ">
                                                        <i class="fas fa-calendar-day mr-2"></i>
                                                        <small class="float-right">25/11/2021</small>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fa fa-user me-2"></i> <span class="float-start"> Nishanth ( <small>Sales Admin</small> )</span>
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
                                                            <table class="table custom m-0  table-bordered">
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
                                                                            <th  class=" ">Zip Code
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
                                                            <table class="table custom m-0   table-bordered">
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
                                                            <table class="table custom m-0   table-bordered">
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
                                                            <table class="table custom m-0 table-bordered ">
                                                                
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
                                                            <table class="table custom m-0 table-bordered ">
                                                                
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
@endpush

@push('custom-scripts')

    

    <!-- end demo js-->
    <script src="{{ asset('public/assets/js/pages/demo.form-wizard.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/ui/component.fileupload.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.angularjs.org/1.2.16/angular.js"></script>
    <script>
        angular.module('App', []).controller('CrudCtrl', ['$scope', function($scope) {
          
            
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

            // $scope.RemoveDetails = function (fIndex, Secindex){

            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //         if (result.value) { 

            //             Swal.fire(
            //                 'Deleted!',
            //                 'Your file has been deleted.',
            //                 'success'
            //             )
                        
            //         }
            //     }); 
            // } 
            $scope.removeLayer = function(fIndex, Secindex, ThreeIndex){
                console.log(  fIndex , Secindex , ThreeIndex);
                $scope.wallGroup[fIndex].Details[Secindex].Layers.splice(ThreeIndex,1);
            } 
        }]);
    </script>
   
@endpush