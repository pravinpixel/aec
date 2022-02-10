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
            <button class="btn btn-primary p-3 py-2"> <i class="fa fa-check-circle me-1 text-white"></i> Assign </button>
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

@if (Route::is('enquiry.move-to-project')) 
    <style>
        .admin-Delivery-wiz .timeline-step .inner-circle{
            background: var(--secondary-bg) !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        } 
    </style>
@endif