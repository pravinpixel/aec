<div class="row m-0">
    <div class="col-md-6"> 
        <div class="mb-3">                                             
            <label class="form-label"> Employee ID <sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" wire:model="reference_number" readonly>
        </div> 
    </div> 
    <div class="col-md-6">
        <div class="mb-3">
            <div class="mb-3">
                <label class="form-label" >Display Name​<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" placeholder="Type Here..."  wire:model="display_name" required>
                @error('display_name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" >First name<sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" placeholder="Type Here..."  wire:model="first_name" required>
            @error('first_name') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" >Last name<sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" placeholder="Type Here..."  wire:model="last_name" required>
            @error('last_name') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>    
    <div class="col-md-6">
        <div class="mb-3">                                             
            <label class="form-label">Job Role <sup class="text-danger">*</sup></label>
            <select wire:model="job_role" class="form-select form-select-sm" required>
                <option value="">Select Role</option>
                @foreach($roles as $key => $value)
                    <option value="{{ $value->id }}"> {{ $value->name }}</option>
                @endforeach
            </select>
            @error('job_role') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">                              
            <label class="form-label">Job title</label>
            <input type="text" wire:model="job_title" class="form-control form-control-sm">
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" >Email Id<sup class="text-danger">*</sup></label>
            <input type="email" class="form-control" placeholder="Type Here..."  wire:model="email" readonly required>
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>  

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" >Mobile Number<sup class="text-danger">*</sup></label>
            <input type="text" required pattern="{{ config('global.mobile_no_pattern') }}" onkeypress="return isNumber(event)" maxlength="{{ config('global.mobile_no_length') }}" wire:model="mobile_number" class="form-control"> 
            @error('mobile_number') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div> 

    <div class="col-md-6">
        <div class="cardx row m-0">
            <div class="col-9 p-0">
                <label for="file" class="form-label" >Select Image<sup class="text-danger"></sup></label>
                <input type="file" class="form-control"  wire:model="image"/>   
                @error('image') <span class="error"> {{ $message }}</span> @enderror
            </div>
            <div class="card-body col-3">
                <div class="position-relative" style="width: 100px"> 
                    @if($is_uploaded) 
                        <img src="{{ asset('public/uploads/'.$uploaded_image) }}"  class="w-100">
                    @else
                        <img src="{{ $image->temporaryUrl() }}"  class="w-100">
                    @endif
                </div>
            </div> 
        </div>
    </div>
</div> 