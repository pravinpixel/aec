<div class="row m-0">
    <div class="col-md-6"> 
        <div class="mb-3">                                             
            <label class="form-label"> Employee ID <sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" wire:model="employee_id">
        </div> 
    </div> 
    <div class="col-md-6">
        <div class="mb-3">
            <div class="mb-3">
                <label class="form-label" >Display Name​<sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" placeholder="Type Here..."  wire:model="display_name">
                @error('display_name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" >First name<sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" placeholder="Type Here..."  wire:model="first_Name">
            @error('first_Name') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" >Last name<sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" placeholder="Type Here..."  wire:model="last_name">
            @error('last_name') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>    
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" > Job Title​<sup class="text-danger">*</sup></label>
            <select wire:model="job_title" class="form-select">
                <option >Admin</option>
            </select>
            @error('job_title') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" >Email Id<sup class="text-danger">*</sup></label>
            <input type="email" class="form-control" placeholder="Type Here..."  wire:model="email" readonly>
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>  
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" >Mobile Number<sup class="text-danger">*</sup></label>
            <input type="number" wire:model="number" class="form-control"> 
            @error('number') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div> 
    <div class="col-md-6">
        <div class="cardx row m-0">
            <div class="col-9 p-0">
                <label for="file" class="form-label" >Select Image<sup class="text-danger"></sup></label>
                <input type="file" class="form-control"  wire:model="image" />   
                @error('image') <span class="error"> {{ $message }}</span> @enderror
            </div>
            <div class="card-body col-3">
                <div class="position-relative" style="width: 100px"> 
                    @if ($image) 
                        <img src="{{ $image->temporaryUrl() }}"  class="w-100">
                    @endif
                </div>
            </div> 
        </div>
    </div>
</div> 