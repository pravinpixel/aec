<div class="card shadow-none p-0" class="accordion accordion-flush" id="accordionFlushExample">
    <div class="row align-items-center">
       
     
        <div class="text-end my-3  ">
            <span><strong class="text-secondary">Response status  : </strong></span>
            <div class="badge badge-outline-success" style="font-size: 22px"> Approved</div>
        </div>
           
        <div class="col-8 mx-auto py-3">
            <div class="row mb-3">
                <label  class="col-3" for="">Response status </label>
                <div class="col-9">                
                    <div class="form-control">Approved</div>
                </div>
            </div> 
            <div class="row mb-3">
                <label  class="col-3" for="">Select a Contract type</label>
                <div class="col-9">                
                    <select class="form-select">
                        <option>PO</option>
                        <option>Contract </option>
                    </select>
                </div>
            </div> 
            <div class="row ">
                <label  class="col-3" for="">Select a mail type</label>
                <div class="col-9">                
                    <select class="form-select">
                        <option>Offer letter</option>
                        <option>Thankyou letter</option>
                        <option>Invite Mail</option>
                        <option>Contract letter</option>
                    </select>
                </div>
            </div>
            <div class="row pt-3">
                <div class="offset-3 col-9">                
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-primary btn-sm  w-100 me-2 py-2 "  data-bs-toggle="modal" data-bs-target="#bs-Preview-modal-lg"> <i class="fa fa-eye"></i> Preview</button>
                        <button  data-bs-toggle="modal" data-bs-target="#createMail-modal" class=" py-2 w-100 btn btn-primary float-right btn-sm  " ><small><i class="fa fa-plus"></i> Create</small></button>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="card-body">
        <div class="container p-0"> 
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>List of contract  mail's </h4>
                
            </div>
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th width="15px">S.no</th>
                        <th>Date</th>
                        <th>File Name</th>
                        <th>File Type</th>
                       
                        <th>Status</th>
                        <th width="15px">Action</th>
                    </tr>
                </thead>
                <tbody class="panel"> 
                    <tr>
                        <td>
                            <div class="d-flex">
                                <div class="icon"><i  class="feather-minus text-white toggle-btn"></i></div>
                                <div>1</div>                                                    
                            </div>
                        </td>
                        <td>05 May 2013</td>
                        <td>Dummy Name</td>
                        <td class="text-primary">XXXX</td>
                        <td><span class="badge badge-outline-success rounded-pill">Approved</span></td>
                        <td> 
                            <div class="dropdown">
                                <button type="button" class="toggle-btn btn-light btn btn-light btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <td>
                            <div class="d-flex">
                                <div class="icon">
                                    <i data-bs-toggle="collapse" href="#collapseOne_2" 
                                        aria-expanded="true" aria-controls="collapseOne_2" 
                                        class="custom-accordion-button accordion-button collapsed bg-primary text-white toggle-btn">
                                    </i> 
                                </div>
                                <div>2</div>                                                    
                            </div>
                        </td>
                        <td>05 May 2013</td>
                        <td>Dummy Name</td>
                        <td class="text-primary">XXXX</td>

                        
                     
                        <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                        <td>
                            
                            <div class="dropdown">
                                <button type="button" class="toggle-btn btn-light btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                            <td><span class="badge badge-outline-success rounded-pill">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <td>2.2</td>
                                            <td>04-06-2021</td>
                                            <td>YYY</td>
                                            <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                                        </tr>
                                        <tr>
                                            <td>2.1</td>
                                            <td>03-06-2021</td>
                                            <td>ZZZ</td>
                                            <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                                        </tr>
                                </tbody>
                            </table>
                            </div>
                        </td>
                    </tr>  
                    <tr>
                        <td>
                            <div class="d-flex">
                                <div class="icon"><i  class="custom-accordion-button accordion-button collapsed text-white toggle-btn"></i></div>
                                <div>3</div>                                                    
                            </div>
                        </td>
                        <td>05 May 2013</td>
                        <td>Dummy Name</td>
                        <td class="text-primary">XXXX</td>
                       
                        <td><span class="badge badge-outline-success rounded-pill">Approved</span></td>
                        <td>
                            
                            <div class="dropdown">
                                <button type="button" class="toggle-btn btn-light btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <td>
                            <div class="d-flex">
                                <div class="icon"><i data-bs-toggle="collapse" href="#collapseOne_4" aria-expanded="true" aria-controls="collapseOne_2" class="custom-accordion-button accordion-button collapsed bg-primary text-white toggle-btn"></i></div>
                                <div>4</div>                                                    
                            </div>
                        </td>
                        <td>05 May 2013</td>
                        <td>Dummy Name</td>
                        <td class="text-primary">XXXX</td>
                      
                        <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                        <td>
                            
                            <div class="dropdown">
                                <button type="button" class="toggle-btn btn-light btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                            <td><span class="badge badge-outline-success rounded-pill">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <td>4.2</td>
                                            <td>04-06-2021</td>
                                            <td>YYY</td>
                                            <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                                        </tr>
                                        <tr>
                                            <td>4.1</td>
                                            <td>03-06-2021</td>
                                            <td>ZZZ</td>
                                            <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                                        </tr>
                                </tbody>
                            </table>
                            </div>
                        </td>
                    </tr>    
                    <tr>
                        <td>
                            <div class="d-flex">
                                <div class="icon"><i class="custom-accordion-button accordion-button collapsed text-white toggle-btn"></i></div>
                                <div>5</div>                                                    
                            </div>
                        </td>
                        <td>05 May 2013</td>
                        <td>Dummy Name</td>
                        <td class="text-primary">XXXX</td> 
                        <td><span class="badge badge-outline-success rounded-pill">Approved</span></td>
                        <td>
                            
                            <div class="dropdown">
                                <button type="button" class="toggle-btn btn-light btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <td>
                            <div class="d-flex">
                                <div class="icon"><i  class="custom-accordion-button accordion-button collapsed text-white toggle-btn"></i></div>
                                <div>6</div>                                                    
                            </div>
                        </td>
                        <td>05 May 2013</td>
                        <td>Dummy Name</td>
                        <td class="text-primary">XXXX</td> 
                        <td><span class="badge badge-outline-success rounded-pill">Approved</span></td>
                        <td>
                            
                            <div class="dropdown">
                                <button type="button" class="toggle-btn btn-light btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <td>
                            <div class="d-flex">
                                <div class="icon"><i data-bs-toggle="collapse" href="#collapseOne_6" aria-expanded="true" aria-controls="collapseOne_6" class="custom-accordion-button accordion-button collapsed bg-primary text-white toggle-btn"></i></div>
                                <div>7</div>                                                    
                            </div>
                        </td>
                        <td>05 May 2013</td>
                        <td>Dummy Name</td>
                        <td class="text-primary">XXXX</td> 
                        <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                        <td>
                            
                            <div class="dropdown">
                                <button type="button" class="toggle-btn btn-light btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                            <td>7.3</td>
                                            <td>05-06-2021</td>
                                            <td>XXx</td>
                                            <td><span class="badge badge-outline-success rounded-pill">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <td>7.2</td>
                                            <td>04-06-2021</td>
                                            <td>YYY</td>
                                            <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                                        </tr>
                                        <tr>
                                            <td>7.1</td>
                                            <td>03-06-2021</td>
                                            <td>ZZZ</td>
                                            <td><span class="badge badge-outline-secondary rounded-pill">Obsolete</span></td>
                                        </tr>
                                </tbody>
                            </table>
                            </div>
                        </td>
                    </tr> 
                </tbody>
            </table>
        </div>
        <div class="btn-gr text-end">
                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#bs-PreviewAwared-modal-lg"><i class="fa fa-eye me-1"></i>view summary</button>
            <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal"> <i class="fa fa-envelope"></i> Send Mail</button>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <div>
                <a href="#!/proposal-sharing" class="btn btn-outline-primary">Prev</a>
            </div>
            <div>
                <a href="#!/move-to-project" class="btn btn-primary">Next</a>
            </div>
        </div>
    </div> 
</div> 


<div id="createMail-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-right h-100" style="width:100% !important">
        <div class="modal-content h-100">
            <div class="modal-header border modal-colored-header bg-primary">
                <h3 class="text-center ps-3">ADD MAIL TEMPLATE FORM</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body "  style="overflow: auto">
                <div class="p-2">
                             
                    <div class="form-floatingx mb-3">
                        <label for="floatingInput" class="mb-2">Mail Title </label>
                        <input type="text" class="form-control" id="floatingInput" placeholder="Type here...." />

                    </div>

                    <div class="form-floatingx mb-3">
                        <label for="floatingPassword" class="mb-2">Mail Type </label>
                        <input type="text" class="form-control" id="floatingPassword" placeholder="Type here...." />

                    </div>

                    <div class="form-floatingx">
                        <label for="floatingPassword" class="mb-2">Mail Template Message  </label>
                        {{-- <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;"></textarea> --}}
                        
                        <div id="editor" >
                            
                            <div class="card p-3">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>
                                            <img width="150px" src="{{ asset("public/assets/images/logo_customer.png") }}" alt="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Offer: 2021-1 Revision: 1</td>
                                        <td width="20%">Dato: 15.12.2021</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                TilTREFAB AS (ORG. 916161514), 
                                                Stålverkveien , <br>
                                                4100 JØRPELAND 
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Our ref: Sigbjørn Daasvatn</td>
                                        <td>Yourref: Tom-Øystein Angelsen</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Re.: Engineering for framework elements for Fjelltun skole, Jørpeland</strong></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>1.	Delivery Price</strong>
                                            <p>
                                                Thank you for your request for engineering services. We hereby submit an offer for engineering for manufacturing of elements and associated documentation for installation for your timber framework elementdelivery as specified in this offer to Fjelltunskole at Jørpeland.
                                            </p> 
                                            <ol>
                                                <li>Price NOK XXper gross m2for XXXXXm2ofOuter Wallareas, summing up to XXX XXX NOK.</li>
                                                <li>Price for engineering with respect to loadbearing relates only to building parts that are a part of the delivery.</li>
                                                <li>All prices are ex VAT.</li>
                                            </ol>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><strong>2. Delivery description</strong></p>
                                            <strong>2.1.	Design of timberframework walls for TEK17 standard</strong>
                                            <p>We will deliver outer wall façade elements according to project specifications as shown in Attachment-1</p>
                                            <p>Design is performed according to agreed details and layers as part of project.</p>
                                        </td>                                    
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><strong>2.2	Delivery Schedule </strong></p> 
                                            <p>The typical delivery schedule for engineering work shall be agreed in each individual case. Typical minimum time from contract signature to first delivery will be minimum 4 weeks. Special agreements can be made otherwise.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>2.3. Electronic deliveries</strong>
                                            <p>All products delivered by AEC Prefab will be in electronic format. Such deliveries are:</p>
                                            <ul>
                                                <li> General arrangement drawings for elements layout</li>
                                                <li>Connection details</li>
                                                <li>3D model of construction in IFC format.</li>
                                                <li>Static calculations and report delivered structures.</li>
                                                <li>CNC machine files for precut.</li>
                                                <li>Element production drawings.</li>
                                                <li>Element installation drawings.</li>
    
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>2.4. Doors and windows</strong>
                                            <p>Openingsfor doors and windows are designed using 15mm spacing between given window object in IFC model or drawing.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>2.5. Anchoringthestructure</strong>
                                            <p>It is assumed that the construction company at the building site, with their own carpenters, have the skills required to connect the building parts together, and mechanical means for anchoring the framework to the foundation. </p>
                                            <p>Angles, steel bolts and fixtures are considered for anchoring bolts for fixing elements against the concrete structure, only when ordered particularly.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>2.6. Transport to ConstructionSite</strong>
                                            <p>Not included from AEC Prefab AS, except generation of element transport packagedrawing. </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>2.7. Rigging and Lifting Design</strong>
                                            <p>Not included from AEC Prefab AS, except calculation of CoGfor individual elements in the fabrication drawing.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>2.8. Assembly Works</strong>
                                            <p>Not included from AEC Prefab AS.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>3.	Prerequisites, agreement and delivery schedule</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>3.1.	Prerequisites for offers</strong>
                                            <p>The offer is based on some assumptions and caveats as follows below. If these assumptions and caveats are not satisfied, this may result in adjustments in both total and partial prices, as well as obligations related to progress and fulfilment of deadlines as given in the contract.</p>
                                            <p>
                                                The following prerequisites are stated in connection with the offer:
                                            </p>
                                            <ol>
                                                <li>
                                                    Re-concealed project implementation plan - It is assumed that we will arrive at a reconciled progress plan that is feasible for both parties. AEC Prefab AS needs at least 4 weeks from the control measurement result provided by Client to start precut production. In addition, the parties must agree on a decision plan that has realistic deadlines for feedback and/or confirmations of factors that AEC Prefab AS needs to clarify in order to maintain deliverables in accordance with the reconciled progress plan.
                                                </li>
                                                <li>secondaryrmation about existing buildings - It is assumed that AEC Prefab  receives  the IFC model and sufficient secondaryrmation about existing buildings,including building engineering details,  for modeling the element structures onto the concrete construction and carrying out static calculations. This means that electronic models and reports from previous works are made available to AEC Prefab within 3 weeks before production startup.</li>
                                                <li>Measurement - It is assumed that relevant measurement data are available for the construction that may give us variation in real construction in relation to theoretical construction as provided in the regular IFC files.</li>
                                                <li>Tolerances in measurement data- It is assumed that measuring the anchor points of the construction will take place within an accuracy of +/- 10 mm in relation to theoretical location. If measures are outside +/- 10 mm as predicted in the element production, this will result in additional work on the construction site to adapt the individual elements that will then not immediately fit onto the construction.</li>
                                                <li>Measurement data format - It is assumed that measurement data can be digitally transferred from measurement station to text file with coordinate ID, X (Northing, Y (Easting), and Z (height) coordinates.</li>
                                                <li>The timing of the delivery of relevant measurement data - It is assumed, that relevant measurement data for existing concrete construction in a foundation or a façade in a block has been transferred to AEC Prefab no later than 3 weeks before corresponding prefab data deliveries. If measurement data to AEC Prefab is delayed in time or the required scope changes, this could have further consequences for progress and thus AEC Prefab's ability to meet deadlines set out in the contract. This may require the need for progress or an agreement on extended delivery date. </li>
                                                <li>Payment schedule – AEC Prefab AS assumes that a reconciled payment plan is reached that provides liquidity surplus for AEC Prefab AS.</li>
                                            </ol>
                                            <p>
                                                The caveats and assumptions contained in this offer are repeated in the contract or clarified in other satisfactory manner e.g.  before the contract is signed.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><strong>3.2.	Validity of offers and confirmation.</strong></p>
                                            <p>The offer is valid until 14 days from the day of issued. If you wish to accept the offeror to proceed into contract negotiations, we ask that you confirm this in e-mail before the end of this period.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><strong>3.3.	Contract signature and delivery schedule</strong></p>
                                            <p>The project's start date is defined at contract signature whichinitiate our production planning. An internal progress plan is being created for the project, in accordance with the aforementioned reconciled project implementation plan (customers's project plan) and the project then enters into our production plan.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><strong>4. Attachments to quotations</strong></p>
                                            <p>Uploaddrawing as an Attachment 1: Wall element layers</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><strong>5. Signature</strong></p>
                                            <p>
                                                <b>For AEC Prefab AS</b> <br>
    
                                                Kind regards, <br>
                                                Sigbjørn Daasvatn <br>
                                                Managing Director <br>
    
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div> 
                    </div>  

                    <div class="form-floatingx mt-4">
                      
                        <button class="btn btn-primary"> Submit to Save</button>
                    </div>
                </div>
            </div> 
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="bs-Preview-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-right h-100" style="width:100% !important">
        <div class="modal-content  h-100">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Sales Offer Letter</h4>
                <button class="fa fa-edit btn btn-primary text-end me-5" ></button>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body"  style="overflow: auto">
                
                {{-- <textarea name="" id="editor2" > --}}
                    <div class="card p-3">
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <img width="150px" src="{{ asset("public/assets/images/logo_customer.png") }}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>Offer: 2021-1 Revision: 1</td>
                                <td width="20%">Dato: 15.12.2021</td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        TilTREFAB AS (ORG. 916161514), 
                                        Stålverkveien , <br>
                                        4100 JØRPELAND 
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Our ref: Sigbjørn Daasvatn</td>
                                <td>Yourref: Tom-Øystein Angelsen</td>
                            </tr>
                            <tr>
                                <td><strong>Re.: Engineering for framework elements for Fjelltun skole, Jørpeland</strong></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>1.	Delivery Price</strong>
                                    <p>
                                        Thank you for your request for engineering services. We hereby submit an offer for engineering for manufacturing of elements and associated documentation for installation for your timber framework elementdelivery as specified in this offer to Fjelltunskole at Jørpeland.
                                    </p> 
                                    <ol>
                                        <li>Price NOK XXper gross m2for XXXXXm2ofOuter Wallareas, summing up to XXX XXX NOK.</li>
                                        <li>Price for engineering with respect to loadbearing relates only to building parts that are a part of the delivery.</li>
                                        <li>All prices are ex VAT.</li>
                                    </ol>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><strong>2. Delivery description</strong></p>
                                    <strong>2.1.	Design of timberframework walls for TEK17 standard</strong>
                                    <p>We will deliver outer wall façade elements according to project specifications as shown in Attachment-1</p>
                                    <p>Design is performed according to agreed details and layers as part of project.</p>
                                </td>                                    
                            </tr>
                            <tr>
                                <td>
                                    <p><strong>2.2	Delivery Schedule </strong></p> 
                                    <p>The typical delivery schedule for engineering work shall be agreed in each individual case. Typical minimum time from contract signature to first delivery will be minimum 4 weeks. Special agreements can be made otherwise.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>2.3. Electronic deliveries</strong>
                                    <p>All products delivered by AEC Prefab will be in electronic format. Such deliveries are:</p>
                                    <ul>
                                        <li> General arrangement drawings for elements layout</li>
                                        <li>Connection details</li>
                                        <li>3D model of construction in IFC format.</li>
                                        <li>Static calculations and report delivered structures.</li>
                                        <li>CNC machine files for precut.</li>
                                        <li>Element production drawings.</li>
                                        <li>Element installation drawings.</li>

                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>2.4. Doors and windows</strong>
                                    <p>Openingsfor doors and windows are designed using 15mm spacing between given window object in IFC model or drawing.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>2.5. Anchoringthestructure</strong>
                                    <p>It is assumed that the construction company at the building site, with their own carpenters, have the skills required to connect the building parts together, and mechanical means for anchoring the framework to the foundation. </p>
                                    <p>Angles, steel bolts and fixtures are considered for anchoring bolts for fixing elements against the concrete structure, only when ordered particularly.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>2.6. Transport to ConstructionSite</strong>
                                    <p>Not included from AEC Prefab AS, except generation of element transport packagedrawing. </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>2.7. Rigging and Lifting Design</strong>
                                    <p>Not included from AEC Prefab AS, except calculation of CoGfor individual elements in the fabrication drawing.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>2.8. Assembly Works</strong>
                                    <p>Not included from AEC Prefab AS.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>3.	Prerequisites, agreement and delivery schedule</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>3.1.	Prerequisites for offers</strong>
                                    <p>The offer is based on some assumptions and caveats as follows below. If these assumptions and caveats are not satisfied, this may result in adjustments in both total and partial prices, as well as obligations related to progress and fulfilment of deadlines as given in the contract.</p>
                                    <p>
                                        The following prerequisites are stated in connection with the offer:
                                    </p>
                                    <ol>
                                        <li>
                                            Re-concealed project implementation plan - It is assumed that we will arrive at a reconciled progress plan that is feasible for both parties. AEC Prefab AS needs at least 4 weeks from the control measurement result provided by Client to start precut production. In addition, the parties must agree on a decision plan that has realistic deadlines for feedback and/or confirmations of factors that AEC Prefab AS needs to clarify in order to maintain deliverables in accordance with the reconciled progress plan.
                                        </li>
                                        <li>secondaryrmation about existing buildings - It is assumed that AEC Prefab  receives  the IFC model and sufficient secondaryrmation about existing buildings,including building engineering details,  for modeling the element structures onto the concrete construction and carrying out static calculations. This means that electronic models and reports from previous works are made available to AEC Prefab within 3 weeks before production startup.</li>
                                        <li>Measurement - It is assumed that relevant measurement data are available for the construction that may give us variation in real construction in relation to theoretical construction as provided in the regular IFC files.</li>
                                        <li>Tolerances in measurement data- It is assumed that measuring the anchor points of the construction will take place within an accuracy of +/- 10 mm in relation to theoretical location. If measures are outside +/- 10 mm as predicted in the element production, this will result in additional work on the construction site to adapt the individual elements that will then not immediately fit onto the construction.</li>
                                        <li>Measurement data format - It is assumed that measurement data can be digitally transferred from measurement station to text file with coordinate ID, X (Northing, Y (Easting), and Z (height) coordinates.</li>
                                        <li>The timing of the delivery of relevant measurement data - It is assumed, that relevant measurement data for existing concrete construction in a foundation or a façade in a block has been transferred to AEC Prefab no later than 3 weeks before corresponding prefab data deliveries. If measurement data to AEC Prefab is delayed in time or the required scope changes, this could have further consequences for progress and thus AEC Prefab's ability to meet deadlines set out in the contract. This may require the need for progress or an agreement on extended delivery date. </li>
                                        <li>Payment schedule – AEC Prefab AS assumes that a reconciled payment plan is reached that provides liquidity surplus for AEC Prefab AS.</li>
                                    </ol>
                                    <p>
                                        The caveats and assumptions contained in this offer are repeated in the contract or clarified in other satisfactory manner e.g.  before the contract is signed.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><strong>3.2.	Validity of offers and confirmation.</strong></p>
                                    <p>The offer is valid until 14 days from the day of issued. If you wish to accept the offeror to proceed into contract negotiations, we ask that you confirm this in e-mail before the end of this period.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><strong>3.3.	Contract signature and delivery schedule</strong></p>
                                    <p>The project's start date is defined at contract signature whichinitiate our production planning. An internal progress plan is being created for the project, in accordance with the aforementioned reconciled project implementation plan (customers's project plan) and the project then enters into our production plan.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><strong>4. Attachments to quotations</strong></p>
                                    <p>Uploaddrawing as an Attachment 1: Wall element layers</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><strong>5. Signature</strong></p>
                                    <p>
                                        <b>For AEC Prefab AS</b> <br>

                                        Kind regards, <br>
                                        Sigbjørn Daasvatn <br>
                                        Managing Director <br>

                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                {{-- </textarea> --}}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="bs-PreviewAwared-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-right h-100" style="width:100% !important">
        <div class="modal-content  h-100">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Sales Offer Letter</h4>
                <button class="fa fa-edit btn btn-primary text-end me-5" ></button>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body"  style="overflow: auto">
                
                {{-- <textarea name="" id="editor2" > --}}
                    <div class="card p-3">
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
                                                            <th class=" ">Project Name
                                                            </th><td class="bg-white">ABCD Building</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th class=" ">Construction Site Address
                                                            </th><td class="bg-white">Strandgata-12</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th class=" ">Post Code
                                                            </th><td class="bg-white">2134</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th class=" ">Place
                                                            </th><td class="bg-white">Austvath</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th class=" ">State
                                                            </th><td class="bg-white">Hedmark</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th class=" ">Country
                                                            </th><td class="bg-white">Norway</td>
                                                        </tr> 
                                                        <tr class="border">
                                                            <th class=" ">Type of Project
                                                            </th><td class="bg-white">1</td>
                                                        </tr> 
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6 p-3">
                                            <table class="table m-0   table-bordered">
                                            <tbody><tr class="border">
                                                    <th class=" ">Type of Building
                                                    </th><td class="bg-white">2</td>
                                                </tr> 
                                                <tr class="border">
                                                    <th class=" ">Number of Buildings
                                                    </th><td class="bg-white">2</td>
                                                </tr> 
                                                <tr class="border">
                                                    <th class=" ">Type of Delivery
                                                    </th><td class="bg-white">1</td>
                                                </tr> 
                                                <tr class="border">
                                                    <th class=" ">Deliveryd Date 
                                                    </th><td class="bg-white">2021-02-25</td>
                                                </tr> 
                                                <tr class="border">
                                                    <th class=" ">State
                                                    </th><td class="bg-white">non</td>
                                                </tr> 
                                                <tr class="border">
                                                    <th class=" ">Contact Person name
                                                    </th><td class="bg-white">XXXXXXX </td>
                                                </tr> 
                                                <tr class="border">
                                                    <th class=" ">E-post
                                                    </th><td class="bg-white">dummyemail@gmail.com</td>
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
                                                        <th class="bg-primary text-white">S.no
                                                        </th><th class="bg-primary text-white">File Name</th>
                                                        <th class="bg-primary text-white">Type</th>
                                                        <th class="bg-primary text-white">Action</th>
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
                                                        <th class="bg-primary text-white">EW_DEWS
                                                        </th>
                                                        <th class="bg-primary text-white">
                                                            Delivery Type : Element Type
                                                        </th>
                                                        <th class="bg-primary text-white">
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
                    </div>
                {{-- </textarea> --}}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create( document.querySelector( '#editor' ) ).catch( error => {
        console.error( error );
    } );
    ClassicEditor.create( document.querySelector( '#editor2' ) ).catch( error => {
        console.error( error );
    } );
</script>
 

<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create( document.querySelector( '#editor' ) ).catch( error => {
        console.error( error );
    } );
    ClassicEditor.create( document.querySelector( '#editor2' ) ).catch( error => {
        console.error( error );
    } );
</script>

@if (Route::is('enquiry.response-status')) 
    <style>
       .admin-Project_Award-wiz .timeline-step .inner-circle{
            background: var(--primary-bg) !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        }
        .table tbody tr td {
            padding: 6px !important
        }
    </style>
@endif