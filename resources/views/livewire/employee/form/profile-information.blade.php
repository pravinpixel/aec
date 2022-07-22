<div class="row m-0">
    <div class="col-md-6 p-0">
        <div class="row m-0">
            <div class="my-2 col-md-6">                                             
                <label class="form-label">First name</label>
                <input type="text" wire:model.lazy="first_name" class="form-control form-control-sm">
                @error('first_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="my-2 col-md-6">                                             
                <label class="form-label">Last name</label>
                <input type="text" wire:model="last_name" class="form-control form-control-sm">
            </div>
        </div>
        <div class="my-2 col-md-12 px-2">                                             
            <label class="form-label">Display name <sup class="text-danger">*</sup></label>
            <input type="text" wire:model="display_name" class="form-control form-control-sm">
        </div>
        <div class="row m-0">
            <div class="my-2 col-md-6 pe-0">                                             
                <label class="form-label">User name <sup class="text-danger">*</sup></label>
                <input type="text" wire:model="user_name" class="form-control form-control-sm">
            </div>
            <div class="my-2 col-md-6 ps-0">                                             
                <label class="form-label ps-4">Email id</label>
                <div class="d-flex align-items-center">
                    <span class="mx-2">@</span>
                    <select wire:model="email_id" class="form-select form-select-sm">
                        <option value="">- chooes -</option>
                        <option value="123">aecprefab.net</option>
                        <option value="43221">aecprefab.net</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="px-2 my-3">
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="customCheck1">
                <label class="form-check-label" for="customCheck1">Automatically create a password</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="customCheck2">
                <label class="form-check-label" for="customCheck2">Require this user to change their password when they first sign in</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck3">
                <label class="form-check-label" for="customCheck3">Send password in email upon completion</label>
            </div>
        </div>
        <div class="my-2 col-md-12 px-2">                                             
            <label class="form-label">Email the new password to the following recipients <sup class="text-danger">*</sup></label>
            <input type="email" class="form-control form-control-sm" value="arun.kalyan@aecprefab.net">
        </div>
    </div>
    <div class="col-md-6">
        <div class="my-2 col-md-6 ps-0">                                             
            <label class="form-label">Select location</label>
            <select name="" id="" class="form-select form-select-sm">
                <option value="">India</option>
            </select>
        </div>
        <div class="mb-0 border-top pt-3 mt-3">
            <div class="card-header border-0 p-0 pb-2" id="headingFour">
                <h5 class="m-0">
                    <a class="custom-accordion-title d-block py-1"
                        data-bs-toggle="collapse" href="#collapseFour"
                        aria-expanded="true" aria-controls="collapseFour">
                        Licenses (0) <sup class="text-danger">*</sup>
                        <i class="mdi mdi-chevron-up accordion-arrow  float-end"></i>
                    </a>
                </h5>
            </div>
                
            <div id="collapseFour" class="collapse show"
                aria-labelledby="headingFour"
                data-bs-parent="#custom-accordion-one">
                <div class="card-body pt-0">
                    <div class="form-check mb-2">
                        {{ $create_password }}
                        <input type="radio" wire:model="create_password" checked class="form-check-input" id="customCheck5">
                        <label class="form-check-label" for="customCheck5">Automatically create a password</label>
                    </div>
                    <div class="form-check mb-2 ps-5">
                        <input type="checkbox" class="form-check-input" id="customCheck6">
                        <label class="form-check-label" for="customCheck6">
                            <strong>Microsoft 365 Business Basic</strong>
                            <div class="fw-light">You're out of licenses. if you turn this on, we'll try to buy an additional license for you.</div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-2 col-md-12 px-2">                                             
            <label class="form-label">Job title</label>
            <input type="text" class="form-control form-control-sm">
        </div>
        <div class="my-2 col-md-12 px-2">                                             
            <label class="form-label">Department</label>
            <input type="text" class="form-control form-control-sm">
        </div>
        <div class="my-2 col-md-12 px-2">                                             
            <label class="form-label">Mobile Phone</label>
            <input type="text" class="form-control form-control-sm">
        </div>
    </div>
</div>