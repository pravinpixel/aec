<div class="card  mt-3" ng-controller="WizzardCtrl">
    <div class="card-body  py-0">        
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
                        <span class="d-none d-sm-inline">Additional Info</span>
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
                                    <input ng-disabled="true" type="text" class="form-control form-control-sm" id="floating" ng-value="E.enquiry_date"  />
                                    <label for="floating">Enquiry Date </label>
                                </div>
                                <div class="form-floating  mb-2">
                                    <input  ng-disabled="true" ng-value="E.enquiry_number" type="text" class="form-control form-control-sm" id="floating"  />
                                    <label for="floating">Enquiry Number</label>
                                </div>
                                <div class="form-floating  mb-2">
                                    <input   ng-value="E.customer.company_name" type="text" class="form-control form-control-sm" id="floating"  />
                                    <label for="floating">Campany Name</label>
                                </div> 
                                <div class="form-floating  mb-2">
                                    <input   ng-value="E.customer.contact_person" type="text" class="form-control form-control-sm" id="floating"  />
                                    <label for="floating">Contact Person</label>
                                </div> 
                                <div class="form-floating  mb-2">
                                    <input   ng-value="E.customer.mobile_no" type="text" class="form-control form-control-sm" id="floating"  />
                                    <label for="floating">Mobile Number</label>
                                </div> 
                                <div class="form-floating  mb-2">
                                    <input   ng-value="-" type="text" class="form-control form-control-sm" id="floating"  />
                                    <label for="floating">Secondary Mobile Number</label>
                                </div> 
                            </div> 
                            <div class="col-md-4">
                                <div class="form-floating  mb-2">
                                    <input  ng-value="E.customer.project_name" type="text" class="form-control form-control-sm" id="floating"  />
                                    <label for="floating">Project Name</label>
                                </div>
                                <div class="form-floating  mb-2">
                                    <input  ng-value="E.zipcode" type="text" class="form-control form-control-sm" id="floating"  />
                                    <label for="floating">Zipcode</label>
                                </div>
                                <div class="form-floating  mb-2">
                                    <input  ng-value="E.state" type="text"  class="form-control form-control-sm" id="floating"  />
                                    <label for="floating">State</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <select  class="form-select" id="floatingSelect" aria-label="Floating label select example" >
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
                                    <select  class="form-select" id="floatingSelect" aria-label="Floating label select example" >
                                        <option value="">--</option> 
                                        <option  value="New Construction">New Construction</option> 
                                        <option value="Renovation">Renovation</option> 
                                        <option value="Others">Others</option> 
                                    </select>
                                    <label for="floatingSelect">Type of Project</label>
                                </div>
                                <div class="form-floating  mb-2">
                                    <input  type="date" class="form-control form-control-sm" id="floating"  />
                                    <label for="floating">Project Start Date</label>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-floating  mb-2">
                                    <input  type="text" ng-value="E.site_address" class="form-control form-control-sm" id="floating"  />
                                    <label for="floating">Site Address</label>
                                </div>
                                <div class="form-floating  mb-2">
                                    <input  type="text" ng-value="E.place" class="form-control form-control-sm" id="floating"  />
                                    <label for="floating">Place</label>
                                </div>
                                <div class="form-floating  mb-2">
                                    <input  type="text" ng-value="E.country" class="form-control form-control-sm" id="floating"  />
                                    <label for="floating">Country</label>
                                </div>
                                <div class="form-floating  mb-2">
                                    <input  ng-value="E.no_of_building" type="text" class="form-control form-control-sm" id="floating"  />
                                    <label for="floating">No of Buildings</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <select  class="form-select" id="floatingSelect" aria-label="Floating label select example" >
                                        <option value="">--</option>
                                        <option value="New Construction">New Construction</option> 
                                        <option value="Renovation">Renovation</option> 
                                        <option value="Others">Others</option> 
                                    </select>
                                    <label for="floatingSelect">Type of Delivery</label>
                                </div>
                                <div class="form-floating  mb-2">
                                    <input  type="date" class="form-control"    />
                                    <label for="floating">Project Delivery Date</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating  mb-2">
                                    <div class="form-control bg-light">
                                        @{{ E.customer.remarks }}  
                                    </div>
                                    <label for="floating">Remarks</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade " id="second">
                    <form id="profileForm" method="post" action="#" class="form-horizontal">
                    
                        <div class="row m-0 justify-content-center ">
                            <label class="col-md-4 p-0 ps-2  d-flex justify-content-start border shadow-sm align-items-center " style="min-height: 100px" for="one_1_check">
                                <div class="lable-check p-0 "> 
                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="one_1_check">
                                    <span>CAD/CAM Modelling</span>
                                </div>
                            </label> 		
                            <label class="col-md-4 p-0 ps-2 d-flex justify-content-start border shadow-sm align-items-center " style="min-height: 100px" for="one_2_check">
                                <div class="lable-check p-0 "> 
                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="one_2_check">
                                    <span>Construction Logistics</span>
                                </div>
                            </label>         
                            <label class="col-md-4 p-0 ps-2 d-flex justify-content-start border shadow-sm align-items-center " style="min-height: 100px" for="three_3_check">
                                <div class="lable-check p-0 "> 
                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2 " id="three_3_check">
                                    <span>Approval Drawings, Sections & Plans</span>
                                </div>
                            </label> 		
                            <label class="col-md-4 p-0 ps-2 d-flex justify-content-start border shadow-sm align-items-center " style="min-height: 100px" for="four_4_check">
                                <div class="lable-check p-0 "> 
                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="four_4_check">
                                    <span>CNC Machine Data for pre-cut</span>
                                </div>
                            </label> 
                        
                            <label class="col-md-4 p-0 ps-2 d-flex justify-content-start border shadow-sm align-items-center " style="min-height: 100px" for="one_check">
                                <div class="lable-check p-0 "> 
                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="one_check">
                                    <span>Details for connections</span>
                                </div>
                            </label> 		
                            <label class="col-md-4 p-0 ps-2 d-flex justify-content-start border shadow-sm align-items-center " style="min-height: 100px" for="two_check">
                                <div class="lable-check p-0 "> 
                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="two_check">
                                    <span>Pre-cut assembly drawings</span>
                                </div>
                            </label> 
                        
                            <label class="col-md-4 p-0 ps-2 d-flex justify-content-start border shadow-sm align-items-center " style="min-height: 100px" for="three_check">
                                <div class="lable-check p-0 "> 
                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="three_check">
                                    <span>Structural Engineering</span>
                                </div>
                            </label> 		
                            <label class="col-md-4 p-0 ps-2 d-flex justify-content-start border shadow-sm align-items-center " style="min-height: 100px" for="four_check">
                                <div class="lable-check p-0 "> 
                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="four_check">
                                    <span>Element Production drawings</span>
                                </div>
                            </label> 
                        
                            <label class="col-md-4 p-0 ps-2 d-flex justify-content-start border shadow-sm align-items-center " style="min-height: 100px" for="five_check">
                                <div class="lable-check p-0 "> 
                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="five_check">
                                    <span>Bill of Materials</span>
                                </div>
                            </label> 		
                            <label class="col-md-4 p-0 ps-2 d-flex justify-content-start border shadow-sm align-items-center " style="min-height: 100px" for="six_check">
                                <div class="lable-check p-0 "> 
                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="six_check">
                                    <span>Element Installation drawings</span>
                                </div>
                            </label> 
                            <label class="col-md-4 p-0 ps-2 d-flex justify-content-start border shadow-sm align-items-center " style="min-height: 100px" for="Procedure">
                                <div class="lable-check p-0 "> 
                                    <input style="transform:scale(1.6)" type="checkbox" name="" class="m-2" id="Procedure">
                                    <span>Construction Procedure</span>
                                </div>
                            </label>   
                            <label class="col-md-4 p-0 ps-2 d-flex justify-content-start border shadow-sm align-items-center " style="min-height: 100px" for="Others">
                                <div class="lable-check p-0 "> 
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
                                    <div class="card-header">
                                        <div class="page-title ">Plan View  <sup class="text-danger">*</sup> </div>
                                    </div>
                                    <div class="card-body pbs-0">
                                        <div class="filepond--root filepond filepond--hopper" data-style-button-remove-item-position="left" data-style-button-process-item-position="right" data-style-load-indicator-position="right" data-style-progress-indicator-position="right" data-style-button-remove-item-align="false" style="height: 76px;"><input class="filepond--browser" type="file" id="filepond--browser-at9vm4gw5" name="filepond" aria-controls="filepond--assistant-at9vm4gw5" aria-labelledby="filepond--drop-label-at9vm4gw5"><a class="filepond--credits" aria-hidden="true" href="https://pqina.nl/" target="_blank" rel="noopener noreferrer" style="transform: translateY(68px);">Powered by PQINA</a><div class="filepond--drop-label" style="transform: translate3d(0px, 0px, 0px); opacity: 1;"><label for="filepond--browser-at9vm4gw5" id="filepond--drop-label-at9vm4gw5" aria-hidden="true">Drag &amp; Drop your files or <span class="filepond--label-action" tabindex="0">Browse</span></label></div><div class="filepond--list-scroller" style="transform: translate3d(0px, 0px, 0px);"><ul class="filepond--list" role="list"></ul></div><div class="filepond--panel filepond--panel-root" data-scalable="true"><div class="filepond--panel-top filepond--panel-root"></div><div class="filepond--panel-center filepond--panel-root" style="transform: translate3d(0px, 8px, 0px) scale3d(1, 0.6, 1);"></div><div class="filepond--panel-bottom filepond--panel-root" style="transform: translate3d(0px, 68px, 0px);"></div></div><div class="filepond--drip"></div><span class="filepond--assistant" id="filepond--assistant-at9vm4gw5" role="status" aria-live="polite" aria-relevant="additions"></span><fieldset class="filepond--data"></fieldset></div>
                                        <div class="pb-2 text-center">(or)</div>
                                        <input class="form-control" type="text" placeholder="Paste Here..">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card rounded">
                                    <div class="card-header">
                                        <div class="page-title ">FACADE  View  <sup class="text-danger">*</sup> </div>
                                    </div>
                                    <div class="card-body pbs-0">
                                        <div class="filepond--root filepond filepond--hopper" data-style-button-remove-item-position="left" data-style-button-process-item-position="right" data-style-load-indicator-position="right" data-style-progress-indicator-position="right" data-style-button-remove-item-align="false" style="height: 76px;"><input class="filepond--browser" type="file" id="filepond--browser-ggby9tofl" name="filepond" aria-controls="filepond--assistant-ggby9tofl" aria-labelledby="filepond--drop-label-ggby9tofl"><a class="filepond--credits" aria-hidden="true" href="https://pqina.nl/" target="_blank" rel="noopener noreferrer" style="transform: translateY(68px);">Powered by PQINA</a><div class="filepond--drop-label" style="transform: translate3d(0px, 0px, 0px); opacity: 1;"><label for="filepond--browser-ggby9tofl" id="filepond--drop-label-ggby9tofl" aria-hidden="true">Drag &amp; Drop your files or <span class="filepond--label-action" tabindex="0">Browse</span></label></div><div class="filepond--list-scroller" style="transform: translate3d(0px, 0px, 0px);"><ul class="filepond--list" role="list"></ul></div><div class="filepond--panel filepond--panel-root" data-scalable="true"><div class="filepond--panel-top filepond--panel-root"></div><div class="filepond--panel-center filepond--panel-root" style="transform: translate3d(0px, 8px, 0px) scale3d(1, 0.6, 1);"></div><div class="filepond--panel-bottom filepond--panel-root" style="transform: translate3d(0px, 68px, 0px);"></div></div><div class="filepond--drip"></div><span class="filepond--assistant" id="filepond--assistant-ggby9tofl" role="status" aria-live="polite" aria-relevant="additions"></span><fieldset class="filepond--data"></fieldset></div>
                                        <div class="pb-2 text-center">(or)</div>
                                        <input class="form-control" type="text" placeholder="Paste Here..">
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
                                        <input class="form-control" type="text" placeholder="Paste Here..">
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
                                        <input class="form-control" type="text" placeholder="Paste Here..">
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="container">
                            <h4>Plan View comments </h4>
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
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
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i  class="feather-plus text-white toggle-btn"></i></div>
                                                <div>1</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-info">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn">Add comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i data-bs-toggle="collapse" href="#collapseOne_2" aria-expanded="true" aria-controls="collapseOne_2" class="feather-plus bg-primary text-white toggle-btn"></i></div>
                                                <div>2</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn">View comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i> 
                                        </td>
                                    </tr>
                                    
                                    <tr id="collapseOne_2" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <td colspan="7" class="hiddenRow">
                                            <div class="p-3 card m-0">
                                                <table class="table table-bordered m-0">
                                                    <tbody>
                                                        <tr>
                                                            <th width="15px">s.no</th>
                                                            <th>Date</th>
                                                            <th>File Name</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        <tr  >
                                                            <td>2.3</td>
                                                            <td>05-06-2021</td>
                                                            <td>XXx</td>
                                                            <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.2</td>
                                                            <td>04-06-2021</td>
                                                            <td>YYY</td>
                                                            <td><span class="badge badge-outline-info rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.1</td>
                                                            <td>03-06-2021</td>
                                                            <td>ZZZ</td>
                                                            <td><span class="badge badge-outline-secondary rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </td>
                                    </tr>                                                       
                                    
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i  class="feather-plus text-white toggle-btn"></i></div>
                                                <div>3</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn">Add comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i data-bs-toggle="collapse" href="#collapseOne_4" aria-expanded="true" aria-controls="collapseOne_2" class="feather-plus bg-primary text-white toggle-btn"></i></div>
                                                <div>4</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn">View comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i> 
                                        </td>
                                    </tr>
                                    
                                    <tr id="collapseOne_4" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <td colspan="7" class="hiddenRow">
                                            <div class="p-3 card m-0">
                                                <table class="table table-bordered m-0">
                                                    <tbody>
                                                        <tr>
                                                            <th width="15px">s.no</th>
                                                            <th>Date</th>
                                                            <th>File Name</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        <tr  >
                                                            <td>4.3</td>
                                                            <td>05-06-2021</td>
                                                            <td>XXx</td>
                                                            <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4.2</td>
                                                            <td>04-06-2021</td>
                                                            <td>YYY</td>
                                                            <td><span class="badge badge-outline-info rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4.1</td>
                                                            <td>03-06-2021</td>
                                                            <td>ZZZ</td>
                                                            <td><span class="badge badge-outline-secondary rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i class="feather-plus text-white toggle-btn"></i></div>
                                                <div>5</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn">Add comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i>
                                        </td>
                                    </tr>                                                   
                                </tbody>
                            </table>
                        </div>
                        <div class="container">
                            <h4>FACADE View comments </h4> 
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
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
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i  class="feather-plus text-white toggle-btn"></i></div>
                                                <div>1</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-info">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn">Add comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i data-bs-toggle="collapse" href="#collapseOne_6" aria-expanded="true" aria-controls="collapseOne_6" class="feather-plus bg-primary text-white toggle-btn"></i></div>
                                                <div>2</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn">View comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i> 
                                        </td>
                                    </tr>
                                    
                                    <tr id="collapseOne_6" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <td colspan="7" class="hiddenRow">
                                            <div class="p-3 card m-0">
                                                <table class="table table-bordered m-0">
                                                    <tbody>
                                                        <tr>
                                                            <th width="15px">s.no</th>
                                                            <th>Date</th>
                                                            <th>File Name</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        <tr  >
                                                            <td>2.3</td>
                                                            <td>05-06-2021</td>
                                                            <td>XXx</td>
                                                            <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.2</td>
                                                            <td>04-06-2021</td>
                                                            <td>YYY</td>
                                                            <td><span class="badge badge-outline-info rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.1</td>
                                                            <td>03-06-2021</td>
                                                            <td>ZZZ</td>
                                                            <td><span class="badge badge-outline-secondary rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </td>
                                    </tr>                                                       
                                    
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i  class="feather-plus text-white toggle-btn"></i></div>
                                                <div>3</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn">Add comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i data-bs-toggle="collapse" href="#collapseOne_8" aria-expanded="true" aria-controls="collapseOne_6" class="feather-plus bg-primary text-white toggle-btn"></i></div>
                                                <div>4</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn">View comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i> 
                                        </td>
                                    </tr>
                                    
                                    <tr id="collapseOne_8" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <td colspan="7" class="hiddenRow">
                                            <div class="p-3 card m-0">
                                                <table class="table table-bordered m-0">
                                                    <tbody>
                                                        <tr>
                                                            <th width="15px">s.no</th>
                                                            <th>Date</th>
                                                            <th>File Name</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        <tr  >
                                                            <td>4.3</td>
                                                            <td>05-06-2021</td>
                                                            <td>XXx</td>
                                                            <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4.2</td>
                                                            <td>04-06-2021</td>
                                                            <td>YYY</td>
                                                            <td><span class="badge badge-outline-info rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4.1</td>
                                                            <td>03-06-2021</td>
                                                            <td>ZZZ</td>
                                                            <td><span class="badge badge-outline-secondary rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i class="feather-plus text-white toggle-btn"></i></div>
                                                <div>5</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn">Add comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i>
                                        </td>
                                    </tr>                                                   
                                </tbody>
                            </table>
                        </div>
                        <div class="container">
                            <h4>IFC Model </h4>
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
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
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i  class="feather-plus text-white toggle-btn"></i></div>
                                                <div>1</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-info">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn">Add comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i data-bs-toggle="collapse" href="#collapseOne_10" aria-expanded="true" aria-controls="collapseOne_10" class="feather-plus bg-primary text-white toggle-btn"></i></div>
                                                <div>2</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn">View comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i> 
                                        </td>
                                    </tr>
                                    
                                    <tr id="collapseOne_10" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <td colspan="7" class="hiddenRow">
                                            <div class="p-3 card m-0">
                                                <table class="table table-bordered m-0">
                                                    <tbody>
                                                        <tr>
                                                            <th width="15px">s.no</th>
                                                            <th>Date</th>
                                                            <th>File Name</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        <tr  >
                                                            <td>2.3</td>
                                                            <td>05-06-2021</td>
                                                            <td>XXx</td>
                                                            <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.2</td>
                                                            <td>04-06-2021</td>
                                                            <td>YYY</td>
                                                            <td><span class="badge badge-outline-info rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.1</td>
                                                            <td>03-06-2021</td>
                                                            <td>ZZZ</td>
                                                            <td><span class="badge badge-outline-secondary rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </td>
                                    </tr>                                                       
                                    
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i  class="feather-plus text-white toggle-btn"></i></div>
                                                <div>3</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn">Add comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i data-bs-toggle="collapse" href="#collapseOne_12" aria-expanded="true" aria-controls="collapseOne_10" class="feather-plus bg-primary text-white toggle-btn"></i></div>
                                                <div>4</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn">View comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i> 
                                        </td>
                                    </tr>
                                    
                                    <tr id="collapseOne_12" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <td colspan="7" class="hiddenRow">
                                            <div class="p-3 card m-0">
                                                <table class="table table-bordered m-0">
                                                    <tbody>
                                                        <tr>
                                                            <th width="15px">s.no</th>
                                                            <th>Date</th>
                                                            <th>File Name</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        <tr  >
                                                            <td>4.3</td>
                                                            <td>05-06-2021</td>
                                                            <td>XXx</td>
                                                            <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4.2</td>
                                                            <td>04-06-2021</td>
                                                            <td>YYY</td>
                                                            <td><span class="badge badge-outline-info rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4.1</td>
                                                            <td>03-06-2021</td>
                                                            <td>ZZZ</td>
                                                            <td><span class="badge badge-outline-secondary rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i class="feather-plus text-white toggle-btn"></i></div>
                                                <div>5</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn">Add comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i>
                                        </td>
                                    </tr>                                                   
                                </tbody>
                            </table>
                        </div>
                        <div class="container">
                            <h4>Others</h4> 
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
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
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i  class="feather-plus text-white toggle-btn"></i></div>
                                                <div>1</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-info">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn">Add comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i data-bs-toggle="collapse" href="#collapseOne_14" aria-expanded="true" aria-controls="collapseOne_14" class="feather-plus bg-primary text-white toggle-btn"></i></div>
                                                <div>2</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn">View comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i> 
                                        </td>
                                    </tr>
                                    
                                    <tr id="collapseOne_14" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <td colspan="7" class="hiddenRow">
                                            <div class="p-3 card m-0">
                                                <table class="table table-bordered m-0">
                                                    <tbody>
                                                        <tr>
                                                            <th width="15px">s.no</th>
                                                            <th>Date</th>
                                                            <th>File Name</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        <tr  >
                                                            <td>2.3</td>
                                                            <td>05-06-2021</td>
                                                            <td>XXx</td>
                                                            <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.2</td>
                                                            <td>04-06-2021</td>
                                                            <td>YYY</td>
                                                            <td><span class="badge badge-outline-info rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.1</td>
                                                            <td>03-06-2021</td>
                                                            <td>ZZZ</td>
                                                            <td><span class="badge badge-outline-secondary rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </td>
                                    </tr>                                                       
                                    
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i  class="feather-plus text-white toggle-btn"></i></div>
                                                <div>3</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn">Add comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i data-bs-toggle="collapse" href="#collapseOne_16" aria-expanded="true" aria-controls="collapseOne_14" class="feather-plus bg-primary text-white toggle-btn"></i></div>
                                                <div>4</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn">View comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i> 
                                        </td>
                                    </tr>
                                    
                                    <tr id="collapseOne_16" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <td colspan="7" class="hiddenRow">
                                            <div class="p-3 card m-0">
                                                <table class="table table-bordered m-0">
                                                    <tbody>
                                                        <tr>
                                                            <th width="15px">s.no</th>
                                                            <th>Date</th>
                                                            <th>File Name</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        <tr  >
                                                            <td>4.3</td>
                                                            <td>05-06-2021</td>
                                                            <td>XXx</td>
                                                            <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4.2</td>
                                                            <td>04-06-2021</td>
                                                            <td>YYY</td>
                                                            <td><span class="badge badge-outline-info rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4.1</td>
                                                            <td>03-06-2021</td>
                                                            <td>ZZZ</td>
                                                            <td><span class="badge badge-outline-secondary rounded-pill">ReView commentsing</span></td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="icon"><i class="feather-plus text-white toggle-btn"></i></div>
                                                <div>5</div>                                                    
                                            </div>
                                        </td>
                                        <td>05 May 2013</td>
                                        <td>Dummy Name</td>
                                        <td class="text-primary">XXXX</td>
                                        <td class="text-primary">
                                            <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn">Add comments</span>
                                        </td>
                                        <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                        <td>
                                            <i class="feather-eye bg-success text-white toggle-btn mr-3"></i>
                                            <i class="feather-trash bg-danger text-white toggle-btn  mr-3"></i>
                                        </td>
                                    </tr>                                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    

                <div class="tab-pane p-0 h-100 fade " id="five" >
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
                                                    <table class="table table-bordered m-0  ">
                                                        <tr>
                                                            <th class="bg-light">
                                                                <div class="form-group">
                                                                    <label class="form-lable text-dark shadow-sm position-Obsolete border">Floor</label>
                                                                    <input type="text" class="form-control form-control-sm my-2 mt-3" placeholder="Type here...">
                                                                </div>
                                                            </th>
                                                            <th  class="bg-light">
                                                                <div class="form-group">
                                                                    <label class="form-lable text-dark shadow-sm position-Obsolete border">EXD wall Number</label>
                                                                    <input type="text" class="form-control form-control-sm my-2  mt-3" placeholder="Type here...">
                                                                </div>
                                                            </th>
                                                            <th  class="bg-light">
                                                                <div class="form-group">
                                                                    <label class="form-lable text-dark shadow-sm position-Obsolete border">Delivery type</label>
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
                                                            <th  class="bg-light">
                                                                <div class="form-group">
                                                                    <label class="form-lable text-dark shadow-sm position-Obsolete border">Approx Total Area</label>
                                                                    <input type="number" class="form-control form-control-sm my-2  mt-3" >
                                                                </div>
                                                            </th> 
                                                            <th  class="bg-light">
                                                                <div class="btn-group">
                                                                    <button class="btn-primary btn more-btn-layer" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneaccordionTable_@{{ Secindex }}_@{{ fIndex  }}" aria-expanded="true" aria-controls="collapseOneaccordionTable_@{{ Secindex }}_@{{ fIndex  }}">
                                                                        <i class="fa fa-chevron-down"></i>
                                                                    </button> 
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
                                                                                {{-- <button ng-click="RemoveDetails(fIndex , Secindex)" class=" btn-danger btn shadow-lg  RemoveDetails" type="button"><i class="fa fa-trash"></i></button> --}}
                                                                                
                                                                                <button  type="button" class="btn btn-outline-danger rounded shadow-sm btn-sm" data-bs-toggle="modal" data-bs-target="#ConfirmDeleteWall_@{{ fIndex }}_@{{ Secindex }}"><div class="fa fa-trash " ></div></button>
                                                                                <div id="ConfirmDeleteWall_@{{ fIndex }}_@{{ Secindex }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ConfirmDeleteLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content text-center">
                                                                                            <div class="modal-header modal-colored-header bg-danger">
                                                                                                <h4 class="modal-title" id="ConfirmDeleteLabel">Delete Confirmation</h4>
                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <h2>Are you sure !!</h2>
                                                                                                <p class="lead">You want to delete ? </br> Please put your password for delete action</p>
                                                                                                <input type="text" class="w-75 mx-auto form-control" placeholder="Enter your password" class="form-control">
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel & close</button>
                                                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" ng-click="removeWall(fIndex, Secindex)">Yes, delete it !</button>
                                                                                            </div>
                                                                                        </div><!-- /.modal-content -->
                                                                                    </div><!-- /.modal-dialog -->
                                                                                </div><!-- /.modal -->
                                                                            </div> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body pt-4">
                                                                <table class="table table-borderless m-0 " > 
                                                                    <tbody>
                                                                        <tr ng-repeat="(ThreeIndex,l) in d.Layers">
                                                                            <td>
                                                                                <div class="form-group shadow-sm">
                                                                                    <label class="form-lable shadow-sm position-Obsolete border" style="background: #FFFFFF">Layer Name</label>
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
                                                                                    <label class="form-lable shadow-sm position-Obsolete border" style="background: #FFFFFF">Layer Type</label>
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
                                                                                        <label class="form-lable badge-secondary-lighten shadow-sm position-Obsolete border" style="background: #FFFFFF">Thickness </label>
                                                                                        <input type="number" class="form-control rounded-0 rounded-start  border-0 form-control-sm" ng-model="layer.Thickness " >
                                                                                    </div>
                                                                                    <span class="input-group-text border-0 rounded-0 px-2 justify-content-center" >x</span>
                                                                                    <div class="form-group">
                                                                                        <label class="form-lable shadow-sm position-Obsolete border" style="background: #FFFFFF">Breadth</label>
                                                                                        <input type="number" class="form-control form-control-sm rounded-0 border-0 " ng-model="layer.Breadth" >
                                                                                    </div>
                                                                                    <span class="input-group-text rounded-0 border-0 px-2 rounded-end justify-content-center">.mm</span>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <div class="btn-group">
                                                                                    <!-- Danger Header Modal -->
                                                                                    <button  type="button" class="btn btn-outline-danger rounded shadow-sm btn-sm" data-bs-toggle="modal" data-bs-target="#ConfirmDelete_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}"><div class="fa fa-trash " ></div></button>
                                                                                    <div id="ConfirmDelete_@{{ fIndex }}_@{{ Secindex }}_@{{ ThreeIndex }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ConfirmDeleteLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header modal-colored-header bg-danger">
                                                                                                    <h4 class="modal-title" id="ConfirmDeleteLabel">Delete Confirmation</h4>
                                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                    <h2>Are you sure !!</h2>
                                                                                                    <p class="lead">You want to delete ? </br> Please put your password for delete action</p>
                                                                                                    <input type="text" class="w-75 mx-auto form-control" placeholder="Enter your password" class="form-control">
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel & close</button>
                                                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" ng-click="removeLayer(fIndex, Secindex , ThreeIndex)">Yes, delete it !</button>
                                                                                                </div>
                                                                                            </div><!-- /.modal-content -->
                                                                                        </div><!-- /.modal-dialog -->
                                                                                    </div><!-- /.modal -->
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

                {{-- <div class="card-footer border-0 p-0 ">
                    <ul class="list-inline wizard mb-0 pt-3">
                        <li class="previous list-inline-item "><a href="#" class="btn btn-primary">Previous</a></li>
                        <li class="next list-inline-item float-end"><a href="#" class="btn btn-primary">Next</a></li>
                    </ul>
                </div> --}}

            </div> <!-- tab-content -->
        </div> <!-- end #rootwizard-->
    </div> <!-- end card-body -->
    <div class="card-footerx p-3 pt-0">
        <div class="d-flex justify-content-between">
            <div>
                {{-- <a href="#!/" class="btn btn-outline-primary">Prev</a> --}}
            </div>
            <div>
                <a href="#!/Technical_Estimate" class="btn btn-primary">Next</a>
            </div>
        </div>
    </div>  
</div>
<div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-right" style="width:100% !important">
        <div class="model-header text-end">
             <button type="button" class="feather-x btn btn-light "  data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="modal-content p-0  h-100 d-flex   align-items-center" style="overflow: auto">
            <div class="w-100">
               
                <div class="card">
                    <div class="card-body ">
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

                        <div class="row m-0">
                            <div class="col">
                                <div class="mt-2 bg-light p-3 rounded">
                                    <form class="needs-validation" novalidate="" name="chat-form" id="chat-form">
                                        <div class="row m-0">
                                            <div class="col mb-2 mb-sm-0">
                                                <input type="text" class="form-control border-0" placeholder="Enter your text" ="">
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
 

@if (Route::is('admin-project-info-wiz')) 
    <style>
        .table tbody tr td {
            padding: 6px !important;
        }
        .Project_Info .timeline-step .inner-circle{
            background: #757CF2 !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        }
       
    </style>
@endif