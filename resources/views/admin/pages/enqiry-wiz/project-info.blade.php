<div ng-controller="WizzardCtrl">
    <div class="summary-group pt-3">
        
        {{-- ProjectInfo --}}
        <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
            <div class="legend shadow-sm border rounded text-primary">Project Information </div>
            <div class="card-body">
                <table class="table m-0  ">
                    <tbody>
                        <tr>
                            <td width="30%"><b>Project Name</b></td>
                            <td>:</td>
                            <td>@{{ E.project_name }}</td>
                        </tr> 
                        <tr>
                            <td><b>Construction Site Address</b></td>
                            <td>:</td>
                            <td>@{{ E.site_address }}</td>
                        </tr> 
                        <tr>
                            <td><b>Contact Person name</b></td>
                            <td>:</td>
                            <td>@{{ E.contact_person }} </td>
                        </tr> 
                        <tr>
                            <td><b>E-post</b></td>
                            <td>:</td>
                            <td>@{{ E.customer.email }}</td>
                        </tr> 
                        <tr>
                            <td><b>Conatct number</b></td>
                            <td>:</td>
                            <td>@{{ E.mobile_no }}</td>
                        </tr> 
                        <tr>
                            <td><b>Secondary conatct number</b></td>
                            <td>:</td>
                            <td>@{{ E.secondary_mobile_no }}</td>
                        </tr> 
                        <tr>
                            <td><b>Post Code</b></td>
                            <td>:</td>
                            <td>@{{ E.zipcode }}</td>
                        </tr> 
                        <tr>
                            <td><b>Place</b></td>
                            <td>:</td>
                            <td>@{{ E.place }}</td>
                        </tr> 
                        <tr>
                            <td><b>State</b></td>
                            <td>:</td>
                            <td>@{{ E.state }}</td>
                        </tr> 
                        <tr>
                            <td><b>Country</b></td>
                            <td>:</td>
                            <td>@{{ E.country }}</td>
                        </tr> 
                        <tr>
                            <td><b>Type of Project</b></td>
                            <td>:</td>
                            <td>@{{ E.project_type_name }}</td>
                        </tr> 
                        <tr>
                            <td><b>Type of Building</b></td>
                            <td>:</td>
                            <td>@{{ E.building_type_name }}</td>
                        </tr> 
                        <tr>
                            <td><b>Number of Buildings</b></td>
                            <td>:</td>
                            <td>@{{ E.no_of_building }}</td>
                        </tr> 
                        <tr>
                            <td><b>Type of Delivery</b></td>
                            <td>:</td>
                            <td>@{{ E.delivery_type_name }}</td>
                        </tr> 
                        <tr>
                            <td><b>Deliveryd Date</b></td>
                            <td>:</td>
                            <td>@{{ E.project_delivery_date }}</td>
                        </tr> 
                        <tr>
                            <td><b>State</b></td>
                            <td>:</td>
                            <td>@{{ E.state }}</td>
                        </tr> 
                        <tr>
                            <td><b>Remarks</b></td>
                            <td>:</td>
                            <td>@{{ E.customer.remarks }}</td>
                        </tr> 
                    </tbody>
                </table>
                <div class="input-group mt-3">
                    <input type="text" class="form-control rounded-pill me-2" placeholder="Type here.! your comments">
                    <button class="btn btn-primary rounded-pill" type="button"><i class="fa fa-send"></i></button>
                </div> 
               
                <div class="text-end pt-2">
                    <a href="" class="text-primary pe-2 pt-2" data-bs-toggle="modal" data-bs-target="#right-modal">
                        <i class="fa fa-eye"></i>  Previous chat history
                    </a>
                </div> 
                  
            </div> 
        </fieldset>
        {{-- ProjectInfo --}}

        {{-- Selected Services --}}
        <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
            <div class="legend shadow-sm border rounded text-primary">Selected Services</div>
            <div class="card-body">
                <ul class="row m-0 ">
                    <li class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> Cras justo odio</li>
                    <li class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> Dapibus ac facilisis in</li>
                    <li class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> Morbi leo risus</li>
                    <li class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> Porta ac consectetur ac</li>
                    <li class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> Vestibulum at eros</li>
                </ul>
                <div class="input-group mt-3">
                    <input type="text" class="form-control rounded-pill me-2" placeholder="Type here.! your comments">
                    <button class="btn btn-primary rounded-pill" type="button"><i class="fa fa-send"></i></button>
                </div>
            </div> 
        </fieldset>
        {{-- Selected Services --}}

        {{-- IFC Models & Uploaded Documents --}}
        <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
            <div class="legend shadow-sm border rounded text-primary">IFC Models & Uploaded Documents</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th><b>S.No</b></th>
                        <th><b>File name</b></th>
                        <th><b>File Type</b></th>
                        <th><b>View Type</b></th>
                        <th class="text-center" width="150px"><b>Action</b></th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Document001</td>
                        <td>.docs</td>
                        <td>Plan view</td>
                        <td class="text-center">
                            <i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i>
                            <i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Files002</td>
                        <td>.pdf</td>
                        <td>Facade view</td>
                        <td class="text-center">
                            <i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i>
                            <i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Files005</td>
                        <td>.png</td>
                        <td>IFC model</td>
                        <td class="text-center">
                            <i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i>
                            <i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>myImage</td>
                        <td>.JPEG</td>
                        <td>others</td>
                        <td class="text-center">
                            <i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i>
                            <i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i>
                        </td>
                    </tr>
                </table>
                <div class="input-group mt-3">
                    <input type="text" class="form-control rounded-pill me-2" placeholder="Type here.! your comments">
                    <button class="btn btn-primary rounded-pill" type="button"><i class="fa fa-send"></i></button>
                </div>
            </div> 
        </fieldset>
        {{-- IFC Models & Uploaded Documents --}}

        {{-- Building Components --}}
        <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
            <div class="legend shadow-sm border rounded text-primary">Building Components</div>
            <div class="card-body">
                <div  style="max-height: 400px; overflow:auto">
                    <table class="table table-bordered" >
                        <tbody>
                            <tr class="table-bold text-center">
                                <th width="150px"> </th>
                                <th style="padding: 0 !important">
                                    <table class="table m-0 ">
                                        <tr>
                                            <th width="50%">
                                                Wall details
                                            </th>
                                            <th style="padding: 0 !important" width="50%">
                                                Layer details
                                            </th>
                                        </tr>
                                    </table>
                                </th>
                            </tr>
                            <tr>
                                <th width="150px"><b>Wall name</b></th>
                                <th style="padding: 0 !important">
                                    <table class="table m-0 ">
                                        <tr>
                                            <td width="50%" style="padding: 0 !important">
                                                <table class="table m-0 table-bordered table-bold">
                                                    <tr>
                                                        <th>Floor</th>
                                                        <th>wall Number</th>
                                                        <th>Delivery type</th>
                                                        <th>Total Area</th>
                                                    </tr> 
                                                </table>
                                            </td>
                                            <td style="padding: 0 !important" width="50%">
                                                <table class="table m-0 table-bordered">
                                                    <tr class="table-bold">
                                                        <th>Name</th>
                                                        <th>Type</th>
                                                        <th>Thickness</th>
                                                        <th>Breadth</th>
                                                    </tr> 
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </th>
                            </tr>
                            <tr width="150px">
                                <tr width="180px">
                                    <td>Internal  Wall</td>
                                    <td style="padding: 0 !important"  >
                                        <table class="table m-0 ">
                                            <tr>
                                                <td width="50%">
                                                    <table class="table m-0 table-bordered">
                                                        <tr>
                                                            <td>kids floor</td>
                                                            <td>1</td>
                                                            <td>quick</td>
                                                            <td>1250</td>
                                                        </tr> 
                                                    </table>
                                                </td>
                                                <td style="padding: 0 !important" width="50%">
                                                    <table class="table m-0 table-bordered">
                                                        <tr>
                                                            <td>fire proof</td>
                                                            <td>precut</td>
                                                            <td>25.54</td>
                                                            <td>254</td>
                                                        </tr>
                                                        <tr>
                                                            <td>cold proof</td>
                                                            <td>precut</td>
                                                            <td>25.54</td>
                                                            <td>254</td>
                                                        </tr>
                                                        <tr>
                                                            <td>noice proof</td>
                                                            <td>precut</td>
                                                            <td>25.54</td>
                                                            <td>254</td>
                                                        </tr>
                                                        <tr>
                                                            <td>abcd proof</td>
                                                            <td>precut</td>
                                                            <td>25.54</td>
                                                            <td>254</td>
                                                        </tr>
                                                        <tr>
                                                            <td>others proof</td>
                                                            <td>precut</td>
                                                            <td>25.54</td>
                                                            <td>254</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%">
                                                    <table class="table m-0 table-bordered">
                                                        <tr>
                                                            <td>kids floor</td>
                                                            <td>1</td>
                                                            <td>quick</td>
                                                            <td>1250</td>
                                                        </tr> 
                                                    </table>
                                                </td>
                                                <td style="padding: 0 !important" width="50%">
                                                    <table class="table m-0 table-bordered">
                                                        <tr>
                                                            <td>fire proof</td>
                                                            <td>precut</td>
                                                            <td>25.54</td>
                                                            <td>254</td>
                                                        </tr>
                                                        <tr>
                                                            <td>cold proof</td>
                                                            <td>precut</td>
                                                            <td>25.54</td>
                                                            <td>254</td>
                                                        </tr>
                                                        <tr>
                                                            <td>noice proof</td>
                                                            <td>precut</td>
                                                            <td>25.54</td>
                                                            <td>254</td>
                                                        </tr>
                                                        <tr>
                                                            <td>abcd proof</td>
                                                            <td>precut</td>
                                                            <td>25.54</td>
                                                            <td>254</td>
                                                        </tr>
                                                        <tr>
                                                            <td>others proof</td>
                                                            <td>precut</td>
                                                            <td>25.54</td>
                                                            <td>254</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr> 
                                <td>External  Wall</td>
                                <td style="padding: 0 !important"  >
                                    <table class="table m-0 ">
                                        <tr>
                                            <td width="50%">
                                                <table class="table m-0 table-bordered">
                                                    <tr>
                                                        <td>kids floor</td>
                                                        <td>1</td>
                                                        <td>quick</td>
                                                        <td>1250</td>
                                                    </tr> 
                                                </table>
                                            </td>
                                            <td style="padding: 0 !important" width="50%">
                                                <table class="table m-0 table-bordered">
                                                    <tr>
                                                        <td>fire proof</td>
                                                        <td>precut</td>
                                                        <td>25.54</td>
                                                        <td>254</td>
                                                    </tr>
                                                    <tr>
                                                        <td>cold proof</td>
                                                        <td>precut</td>
                                                        <td>25.54</td>
                                                        <td>254</td>
                                                    </tr>
                                                    <tr>
                                                        <td>noice proof</td>
                                                        <td>precut</td>
                                                        <td>25.54</td>
                                                        <td>254</td>
                                                    </tr>
                                                    <tr>
                                                        <td>abcd proof</td>
                                                        <td>precut</td>
                                                        <td>25.54</td>
                                                        <td>254</td>
                                                    </tr>
                                                    <tr>
                                                        <td>others proof</td>
                                                        <td>precut</td>
                                                        <td>25.54</td>
                                                        <td>254</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%">
                                                <table class="table m-0 table-bordered">
                                                    <tr>
                                                        <td>kids floor</td>
                                                        <td>1</td>
                                                        <td>quick</td>
                                                        <td>1250</td>
                                                    </tr> 
                                                </table>
                                            </td>
                                            <td style="padding: 0 !important" width="50%">
                                                <table class="table m-0 table-bordered">
                                                    <tr>
                                                        <td>fire proof</td>
                                                        <td>precut</td>
                                                        <td>25.54</td>
                                                        <td>254</td>
                                                    </tr>
                                                    <tr>
                                                        <td>cold proof</td>
                                                        <td>precut</td>
                                                        <td>25.54</td>
                                                        <td>254</td>
                                                    </tr>
                                                    <tr>
                                                        <td>noice proof</td>
                                                        <td>precut</td>
                                                        <td>25.54</td>
                                                        <td>254</td>
                                                    </tr>
                                                    <tr>
                                                        <td>abcd proof</td>
                                                        <td>precut</td>
                                                        <td>25.54</td>
                                                        <td>254</td>
                                                    </tr>
                                                    <tr>
                                                        <td>others proof</td>
                                                        <td>precut</td>
                                                        <td>25.54</td>
                                                        <td>254</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 
                        </tbody>
                    </table> 
                </div>
                <div class="input-group mt-3">
                    <input type="text" class="form-control rounded-pill me-2" placeholder="Type here.! your comments">
                    <button class="btn btn-primary rounded-pill" type="button"><i class="fa fa-send"></i></button>
                </div>
            </div> 
        </fieldset>
        {{-- Building Components --}}

        {{-- Additional Info --}}
        <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
            <div class="legend shadow-sm border rounded text-primary">Additional Info</div>
            <div class="card-body pt-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus numquam illum sint perspiciatis tempore cumque ipsa asperiores tempora earum molestias aperiam doloremque facere placeat officiis iure, ea eum architecto sunt?</p>
                <div class="input-group mt-3">
                    <input type="text" class="form-control rounded-pill me-2" placeholder="Type here.! your comments">
                    <button class="btn btn-primary rounded-pill" type="button"><i class="fa fa-send"></i></button>
                </div>
            </div> 
        </fieldset>
        {{-- Additional Info --}}
    </div>
</div>
<style>
   
    fieldset:hover ,   fieldset:hover  .legend {
        border: 1px solid #757CF2 !important
    }
    .legend {
      top: -15px;
      position: absolute;
      font-weight: bold;
      line-height: 25px;
      padding: 0px 10px;
      background: white;
      left: 25px;
    } 
    .table-bold {
        font-weight: bold !important
    }
    .Project_Info .timeline-step .inner-circle{
        background: #757CF2 !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style>