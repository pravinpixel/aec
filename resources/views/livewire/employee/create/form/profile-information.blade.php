<div class="row m-0">
    <div class="col-md-6 p-0">
        <div class="row m-0">
            <div class="my-2 col-md-6">                                             
                <label class="form-label">First name<sup class="text-danger">*</sup></label>
                <input type="text" wire:model.lazy="first_name" class="form-control form-control-sm">
                @error('first_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="my-2 col-md-6">                                             
                <label class="form-label">Last name<sup class="text-danger">*</sup></label>
                <input type="text" wire:model="last_name" class="form-control form-control-sm">
                @error('last_name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="my-2 col-md-12 px-2">                                             
            <label class="form-label">Display name <sup class="text-danger">*</sup></label>
            <input type="text" wire:model="display_name" class="form-control form-control-sm">
            @error('display_name') <span class="error">{{ $message }}</span> @enderror
        </div>
<<<<<<< Updated upstream
        <div class="my-2 col-md-12 px-2">                                             
            <label class="form-label">Email<sup class="text-danger">*</sup></label>
            <input type="text" wire:model="email" class="form-control form-control-sm">
            @error('email') <span class="error">{{ $message }}</span> @enderror
=======
        <div class="row m-0">
            <div class="my-2 col-md-6 pe-0">                                             
                <label class="form-label">User name <sup class="text-danger">*</sup></label>
                <input type="text" wire:model="user_name" class="form-control form-control-sm">
                @error('user_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="my-2 col-md-6 ps-0">                                             
                <label class="form-label ps-4">Domains</label>
                <div class="d-flex align-items-center">
                    <span class="mx-2">@</span>
                    <select wire:model="domains" class="form-select form-select-sm">
                        <option value="">- chooes -</option>
                        <option value="aecprefab.net">aecprefab.net</option>
                    </select>
                </div>
                @error('domains') <span class="error">{{ $message }}</span> @enderror
            </div>
>>>>>>> Stashed changes
        </div>

        <div class="my-2 col-md-12 px-2">
            <div class="form-check mb-2"> 
                <input type="checkbox" class="form-check-input" id="customCheck1" wire:click="generatePassword"  wire:model="user_password">
                <label class="form-check-label" for="customCheck1">Automatically create a password</label>
            </div>
        </div>

        <div class="my-2 col-md-12 px-2">                                             
            <label class="form-label">Password<sup class="text-danger">*</sup></label>
            <input type="password" wire:model="password" class="form-control form-control-sm">
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="px-2 my-3">
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="customCheck2" wire:model="sign_in_password_change">
                <label class="form-check-label" for="customCheck2">Require this user to change their password when they first sign in</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck3" wire:model="send_password_to_email">
                <label class="form-check-label" for="customCheck3">Send password in email upon completion</label>
            </div>
        </div>
<<<<<<< Updated upstream
    </div>
    <div class="col-md-6">
        <div class="my-2 col-md-12 px-2">                                             
            <label class="form-label">Job Role <sup class="text-danger">*</sup></label>
            <select wire:model="job_role" class="form-select form-select-sm">
                <option value="">Select Role</option>
                @foreach($roles as $key => $value)
                    <option value="{{ $value->id }}"> {{ $value->name }}</option>
                @endforeach
            </select>
            @error('job_role') <span class="error">{{ $message }}</span> @enderror
=======
        <div class="my-2 col-md-12 px-2">                                             
            <label class="form-label">Email the new password to the following recipients <sup class="text-danger">*</sup></label>
            <input type="email" wire:model="email" class="form-control form-control-sm">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="my-2 col-md-6 ps-0">                                             
            <label class="form-label">Select location</label>
            <select wire:model="location" class="form-select form-select-sm">
                <option value="india">India</option>
                <option value="usa">USA</option>
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
                        <input type="radio"  checked class="form-check-input" id="customCheck5">
                        <label class="form-check-label" for="customCheck5">Assign a user a product license</label>
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
>>>>>>> Stashed changes
        </div>
        <div class="my-2 col-md-12 px-2">                                             
            <label class="form-label">Job title</label>
            <input type="text" wire:model="job_title" class="form-control form-control-sm">
        </div>
        <div class="my-2 col-md-12 px-2">                                             
            <label class="form-label">Department</label>
            <input type="text" wire:model="department" class="form-control form-control-sm">
        </div>
        <div class="my-2 col-md-12 px-2">                                             
<<<<<<< Updated upstream
            <label class="form-label">Mobile Number <sup class="text-danger">*</sup></label>
            <input type="text"  pattern="{{ config('global.mobile_no_pattern') }}" maxlength="{{ config('global.mobile_no_length') }}" onkeypress="return isNumber(event)" wire:model="mobile_number" class="form-control form-control-sm">
            @error('mobile_number') <span class="error">{{ $message }}</span> @enderror
=======
            <label class="form-label">Mobile Phone</label>
            <input type="text" wire:model="mobile_phone" class="form-control form-control-sm">
>>>>>>> Stashed changes
        </div>
    </div>
</div>