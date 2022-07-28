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
        <div class="my-2 col-md-12 px-2">                                             
            <label class="form-label">Email<sup class="text-danger">*</sup></label>
            <input type="text" wire:model="email" class="form-control form-control-sm">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="my-2 col-md-12 px-2">                                             
            <label class="form-label">Password<sup class="text-danger">*</sup></label>
            <input type="password" wire:model="password" class="form-control form-control-sm">
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="px-2 my-3">
            <div class="form-check mb-2"> 
                <input type="checkbox" class="form-check-input" id="customCheck1" wire:click="generatePassword"  wire:model="user_password">
                <label class="form-check-label" for="customCheck1">Automatically create a password</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="customCheck2" wire:model="sign_in_password_change">
                <label class="form-check-label" for="customCheck2">Require this user to change their password when they first sign in</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck3" wire:model="send_password_to_email">
                <label class="form-check-label" for="customCheck3">Send password in email upon completion</label>
            </div>
        </div>
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
            <label class="form-label">Mobile Number <sup class="text-danger">*</sup></label>
            <input type="text"  pattern="{{ config('global.mobile_no_pattern') }}" maxlength="{{ config('global.mobile_no_length') }}" onkeypress="return isNumber(event)" wire:model="mobile_number" class="form-control form-control-sm">
            @error('mobile_number') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
</div>