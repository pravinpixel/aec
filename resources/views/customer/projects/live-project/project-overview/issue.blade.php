<table class="table custom table-striped table-bordered" datatable="ng" id="tablebqup" dt-options="vm.dtOptions">
    <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Type</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Due by</th>
            <th>Priority</th>
            <th>Modifed at</th>
            
        </tr>
    </thead>
    <tbody>
       
            <tr ng-repeat="(ptcindex,pticketscomment) in pticketcomment">
                <td>@{{ ptcindex+1 }}</td>
                <td style="padding: 0 !important" class="text-center"><button class="btn btn-sm btn-outline-primary p-0 px-1"><a class="dropdown-item fw-bold" data-bs-toggle="modal" ng-click="showTicketComments(pticketscomment.id,'show')"><small>@{{customer.reference_number}} / TIKXX-0@{{ pticketscomment.id }}</small></a></button></td>
                <td>
                    <div class="d-flex align-items-center">
                       
                        <div>
                            <h5 class="m-0 font-14">
                               @{{pticketscomment.type}}
                            </h5>
                        </div>
                    </div>
                </td>
                <td>@{{pticketscomment.summary}}</td>
                <td>
                    <div class="d-flex align-items-center">
                        
                        <div>
                            <h5 class="m-0 font-14">
                                @{{pticketscomment.assigndetails.first_name}} 
                            </h5>
                        </div>
                    </div>
                </td>
                <td><span class="badge bg-success">@{{pticketscomment.project_status}}</span></td>
                <td> <small>@{{ pticketscomment.ticket_date | date:"MM/dd/yyyy'T' h:mm" }}<br> <!--<small class="text-secondary">(Due in 1d)</small>--></small></td>
                <td style="padding: 0 !important" class="text-center">@{{pticketscomment.priority}} <i class="fa fa-arrow-up text-danger ms-1"></i></td>
              
                <td><small>@{{ pticketscomment.updated_at | date:"dd-MM-yyyy h:mm" }}</small> </td>
               
            </tr>
           
    </tbody>
</table>