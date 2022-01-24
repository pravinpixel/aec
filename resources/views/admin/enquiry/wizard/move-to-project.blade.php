<div class="row m-0 py-5">
    <div class="col-12 ">
        <div class="cardz">
            <div class="card-body py-4">
                <div class="img-box bg-primary d-flex justify-content-center rounded-pill mx-auto position-relative align-items-center p-3" style="width: 100px;height:100px">
                    <img src="{{ asset("public/assets/icons/clipboard.png") }}" class="invert w-100">
                </div>
                <h5 class="text-secondary text-center my-3">Click to proceed to move this enquiry to project.!</h5>
                <div class="col-md-6 mx-auto mb-3">
                    <select name="" id="" class="form-select shadow" style="padding: 10px 20px  !important; border: 1px solid lightgray !important" >
                        <option class="text-center bg-white text-white ">-- Choose the delivery manager to assign to this project --</option>
                        <option value="">Mr. Alexander</option>
                        <option value="">Mr. Torbjørn</option>
                        <option value="">Mr. Marius</option>
                        <option value="">Mr. Asbjørn</option>
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-light me-2 p-3 py-2">Cancel</button>
                    <button class="btn btn-success p-3 py-2"> <i class="fa fa-check-circle me-1 text-white"></i> Proceed</button>
                </div>
            </div>
        </div>
    </div> 
</div> 

@if (Route::is('enquiry.move-to-project')) 
    <style>
        .admin-Delivery-wiz .timeline-step .inner-circle{
            background: var(--primary-bg) !important;
            transform: scale(1.2);
            box-shadow: 0px 5px 10px #4f4f4fb2 !important
        } 
    </style>
@endif