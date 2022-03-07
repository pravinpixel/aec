<ul id="myDIV" class="nav nav-pills nav-justified form-wizard-header mt-0 pt-0 bg-light timeline-steps">
    <li class="time-bar"></li>
        <li class="nav-item Project_Info">
            <a href="#/project-summary" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle @{{ project_summary_status == 'Active' ? 'bg-primary' :'bg-secondary' }}">
                        <img src="{{ asset("public/assets/icons/information.png") }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5 mt-2">Project summary</p>
            </a>
        </li>
        <li class="nav-item  admin-Technical_Estimate-wiz">
            <a href="#/technical-estimation" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle @{{ technical_estimation_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                        <img src="{{ asset("public/assets/icons/technical-support.png") }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5 mt-2">Technical Estimate</p>
            </a>
        </li>
        <li class="nav-item admin-Cost_Estimate-wiz"  style="pointer-events: @{{ technical_estimation_status ==  0 ? 'none' :'unset' }}">
            <a href="#/cost-estimation" style="min-height: 40px;" class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle  @{{ cost_estimation_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                        <img src="{{ asset("public/assets/icons/budget.png") }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5 mt-2">Cost Estimate</p>
            </a>
        </li> 
        <li class="nav-item admin-Proposal_Sharing-wiz" style="pointer-events: @{{ cost_estimation_status ==  0 ? 'none' :'unset' }}">
            <a href="#/proposal-sharing" style="min-height: 40px;"  class="timeline-step">
                <div class="timeline-content">
                    <div class="inner-circle @{{ proposal_sharing_status == '1' ? 'bg-primary' :'bg-secondary' }}">
                        <img src="{{ asset("public/assets/icons/share.png") }}" ng-click="getDocumentaryFun();" class="w-50 invert">
                    </div>                                                                        
                </div>
                <p class="h5 mt-2">Proposal Sharing</p>
            </a>
        </li> 
        <li class="nav-item admin-Delivery-wiz" style="pointer-events: @{{ customer_response ==  null ? 'none' :'unset' }}">
            <a href="#/move-to-project" style="min-height: 40px;"  class="timeline-step" >
                <div class="timeline-content">
                    <div class="inner-circle @{{ customer_response == '1' ? 'bg-primary' :'bg-secondary' }}">
                        <img src="{{ asset("public/assets/icons/arrow-right.png") }}" class="w-50 invert">
                    </div>
                </div>
                <p class="h5  mts-2">Customer Response</p>
            </a>
        </li>
    </ul>
    <div class="card shadow mx-auto shadow col-md-8 my-4"  ng-show="enquiry_status == 0">
    <div class="row border-bottom m-0">
        <div class="p-0 col-md-4 bg-warning d-flex justify-content-center align-items-center">
            <i class="fa fa-warning fa-3x text-white"></i>
        </div>
        <div class="col-md-8">
            <div class="card-body p-2">
                <small class="card-text text-secondary">Response status</small>
                <h3 class="card-title m-0">Waiting for response</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row m-0">
            <div class="col">
                <strong class="card-text text-secondary"><i class="text-secondary mdi-chevron-right-circle mdi " aria-hidden="true"></i> Status</strong>
                <select name="" class="form-select mt-2" id="">
                    <option>-- choose -- </option>
                    <option value="Approved">Approved</option>
                </select>
            </div>
            <div class="col">
                <strong class="card-text text-secondary"><i class="text-secondary mdi-chevron-right-circle mdi " aria-hidden="true"></i> Next Follow Up date</strong>
                <input type="date" class="form-control mt-2" data-date-inline-picker="true">
            </div>
        </div>
        <div class="d-flex justify-content-center pt-3">
            <button class="btn btn-light me-2 p-3 py-2">Cancel</button>
            <button class="btn btn-primary p-3 py-2"> <i class="fa fa-check-circle me-1 text-white"></i> Submit </button>
        </div>
    </div>
</div>
 
<div class="card shadow mx-auto shadow col-md-8 my-4" ng-show="enquiry_status == 1">
    <div class="row border-bottom m-0" >
        <div class="p-0 col-md-4 bg-success d-flex justify-content-center align-items-center">
            <i class="fa fa-check-circle fa-3x text-white"></i>
        </div>
        <div class="col-md-8">
            <div class="card-body p-2">
                <small class="card-text text-secondary">Response status</small>
                <h3 class="card-title m-0">Approved</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class=" mb-3">
            <strong class="card-text text-secondary"><i class="text-primary mdi-file-replace mdi" aria-hidden="true"></i> Assign to</strong>
            <select name="" id="" class="form-select shadow mt-2" style="padding: 10px 20px  !important; border: 1px solid lightgray !important" >
                <option class="text-center bg-white text-white ">-- Choose the delivery manager to assign to this project --</option>
                <option value="">Mr. Alexander</option>
                <option value="">Mr. Torbjørn</option>
                <option value="">Mr. Marius</option>
                <option value="">Mr. Asbjørn</option>
            </select>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-light me-2 p-3 py-2">Cancel</button>
            <button class="btn btn-primary p-3 py-2 me-2 "> <i class="fa fa-check-circle me-1 text-white"></i> Assign </button>
            <button class="btn btn-success p-3 py-2"> <i class="fa fa-check-circle me-1 text-white"></i> Move to Project </button>
        </div>
    </div>
</div> 

<div class="card shadow mx-auto col-md-4 my-4" ng-show="enquiry_status == 2">
    <div class="row border-bottom m-0">
        <div class="p-0 col-md-12 py-2 bg-danger d-flex justify-content-center align-items-center">
            <i class="fa fa-times-circle fa-3x text-white"></i>
        </div>
        <div class="col-md-12">
            <div class="card-body text-center p-2">
                <small class="card-text text-secondary">Response status</small>
                <h3 class="card-title m-0">Denined</h3>
            </div>
        </div>
    </div> 
</div> 

<div class="card mx-auto col-md-12" ng-show="deniedComments.length && enquiry_status == 2">
    <table class="table table-centered mb-0">
        <thead class="table-dark">
            <tr>
                <th>File Name</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="deniedComment in deniedComments">
               <td ng-show="deniedComment.template_name != 'template_name'"> @{{ deniedComment.template_name}}</td>
               <td ng-show="deniedComment.template_name == 'template_name'"> @{{ deniedComment.parent_id}}</td>
               <td> @{{ deniedComment.comment }}</td>
            </tr>
        </tbody>
    </table>
</div>

@if (Route::is('enquiry.move-to-project')) 
    <style>
        .admin-Delivery-wiz .timeline-step .inner-circle{
            background: var(--secondary-bg) !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        } 
    </style>
@endif