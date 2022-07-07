<div class="p-2">
    <div class="card shadow-sm bg-light mb-0 shadow-sm border">
        <div class="card-header border-0 pb-0 bg-light text-center">
            <strong class="fw-bold"> Variation Orders Overview</strong>
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
    <div class="my-2">
        <h3 class="h4">Variation Order Summary</h3>
    </div>
    <table class="table custom custom table-bordered table-hover m-0">
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


            <tr ng-repeat="(index,pticketsdata) in ptickets">
                <td>@{{ index+1 }}</td>
                <td>
                    <button type="button" ng-click="projectticketshow(pticketsdata.id)" class="btn btn-sm py-0 btn-outline-primary" data-bs-toggle="modal" data-bs-target="#Variation_mdal-box">
                        TIC-00@{{ index+1 }} 
                    </button>
                </td>
                <td> @{{customer.customerdatails.first_name}} @{{customer.customerdatails.first_name}}</td>
                <td ng-bind-html="pticketsdata.title">@{{ pticketsdata.title }}</td>
                <td>-</td>
                <td>@{{ pticketsdata.change_date }}</td>
                <td><span class="badge bg-success">open</span></td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm py-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="dripicons-dots-3 "></i>
                        </button>
                        
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" ng-click="projectticketshow(pticketsdata.id)" >View</a>
                            <a class="btn dropdown-item" ng-click="sendMailToCustomerticket(pticketsdata.id,customer.customerdatails.id)">Send Mail</a>
                            <a class="dropdown-item" ng-click="showCommentsToggle('viewConversations', 'project_ticket_comment', 'Ticket Comment',pticketsdata.id)">Reply comment</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>





        </tbody>
    </table>
</div>
 
<div id="Variation_mdal-box" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-right h-100" style="width:100% !important">
        <div class="modal-content h-100">
            <div class="modal-header border-0">
                <h4 class="modal-title" id="myLargeModalLabel"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body  "  style="overflow: auto">
                {{-- <div class="card pt-3">
                    <div id="mail_content_first_text_editor">
                        <div text-angular="text-angular" name="mail_content_first" ng-model="mail_content_first" ta-disabled='disabled'></div>      
                    </div>
                </div> --}}
                <table class="table custom table-bordered">
                    <thead>
                        <tr>
                            <td colspan="2" class="text-center" style="background: #F4F4F4"><b class="h4">Variation Request - 01</b></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center"><b class="h4">Architectural Support for Hytte Norefiell</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="200px"><b>Project Name</b></td>
                            <td>Hytte Norefiell</td>
                        </tr>
                        <tr>
                            <td><b>Client Name</b></td>
                            <td>Modul Pluss</td>
                        </tr>
                        <tr>
                            <td><b>Project Incharge</b></td>
                            <td>Mariusz Pierzgalski</td>
                        </tr>
                        <tr>
                            <td><b>Date of Change Request</b></td>
                            <td>22/05/2021</td>
                        </tr> 
                    </tbody>
                </table>
                <table class="table custom table-bordered">
                    <tbody>
                        <tr><td colspan="2" class="text-center" style="background: #F4F4F4"><b>Change Request Overview</b></td></tr>
                        <tr>
                            <td width="250px"><b>Description of Variation / Change</b></td>
                            <td>Architectural support for over all building design & detailing</td>
                        </tr> 
                        <tr>
                            <td><b>Reason for Variation / Change</b></td>
                            <td>There was no Architectural design for the building</td>
                        </tr>  
                    </tbody>
                </table>
                <table class="table custom table-bordered">
                    <tbody>
                        <tr><td colspan="4"class="text-center" style="background: #F4F4F4"><b>Change in Contract Price</b></td></tr>
                        <tr>
                            <td><b>Estimated Hours</b></td>
                            <td><b>Price/Hr</b></td>
                            <td rowspan="2"></td> 
                            <td rowspan="2" class="text-center">kr 30, 000</td> 
                        </tr> 
                        <tr>
                            <td>60</td>
                            <td>kr 500</td> 
                        </tr> 
                    </tbody>
                    <tfoot>
                        <tr>
                           <td colspan="2"></td>
                            <td rowspan="2" class="text-end"><b>Total Price</b></td> 
                            <td rowspan="2" class="text-center"><b>kr 30, 000</b></td> 
                        </tr> 
                    </tfoot>
                </table>
            </div>
            {{-- <div class="modal-footer"> 
                <button class="btn btn-primary"  ><i class="fa fa-save me-2"></i>Update</button>
            </div> --}}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->