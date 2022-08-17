<div class="card border shadow-sm">
	
	<div class="card-header p-0">
		<ul class="nav nav-pills nav-justified form-wizard-header bg-light m-0" >
			<li class="nav-item projectInfoForm {{ $completed_wizard >= 1 ? '': 'pe-none' }}">
				<a style="min-height: 40px;" class="timeline-step"  wire:click="goTo('project_info')">
					<div class="timeline-content">
						<div class="inner-circle {{ $currentStep === 1 ? 'bg-success' : 'bg-secondary' }} ">
							<i class="fa fa-project-diagram fa-2x"></i>
						</div>       
						<div class="text-end d-none d-sm-inline mt-2">Profile Information</div>                                                                 
					</div> 
				</a>
			</li>
		
			<li class="nav-item {{ $completed_wizard >= 2 ? '': 'pe-none' }}">
				<a style="min-height: 40px;" class="timeline-step"  wire:click="goTo('sharepoint')">
					<div class="timeline-content">
						<div class="inner-circle  {{ $currentStep === 2 ? 'bg-success' : 'bg-secondary' }} ">
							<i class="fa fa-2x fa-file-upload mb-1"></i>
						</div>                                                                        
						<span class="d-none d-sm-inline mt-2">Share Point</span>
					</div>
				</a>
			</li>   
			<li class="nav-item last {{ $completed_wizard >= 3 ? '': 'pe-none' }}">
				<a style="min-height: 40px;" class="timeline-step"  wire:click="goTo('bim')">
					<div class="timeline-content">
						<div class="inner-circle  {{ $currentStep === 3 ? 'bg-success' : 'bg-secondary' }} ">
							<i class="fa fa-2x fa-file-upload mb-1"></i>
						</div>                                                                        
						<span class="d-none d-sm-inline mt-2">BIM 360 Access</span>
					</div>
				</a>
			</li>   
		</ul> 
	</div>
	<div class="card-body"> 
		@switch($currentStep)
			@case(1)
				@include('livewire.employee.edit.form.profile-information')
			@break
			@case(2)
				@include('livewire.employee.edit.form.share-point')
			@break
			@case(3)
				@include('livewire.employee.edit.form.bim')
			@break
			@default @include('livewire.employee.edit.form.bim')
		@endswitch
	</div>
	<div class="card-footer">
		@switch($currentStep)
		
				@case(1)
					<button wire:click="updatePersonalInformation" class="btn btn-primary font-weight-bold px-3 float-end"><i class="mdi-chevron-right mdi"></i> Next </button>
					
				@break
				@case(2)
					<button wire:click="back()"class="btn btn-light font-weight-bold px-3" ><i class="mdi-chevron-left mdi"></i> Prev</button>
					<button wire:click="updateSharePointAccess" class="btn btn-primary font-weight-bold px-3 float-end"><i class="mdi-chevron-right mdi"></i> Next </button>
				@break  
				@case(3)
					<button wire:click="back()"class="btn btn-light font-weight-bold px-3" ><i class="mdi-chevron-left mdi"></i> Prev</button>
					<button wire:click="updateBim" class="btn btn-primary font-weight-bold px-3 float-end"><i class="mdi-check mdi"></i> Submit & Save </button>
				@break  
			@default
					<button wire:click="back()"class="btn btn-light font-weight-bold px-3" ><i class="mdi-chevron-left mdi"></i> Prev</button>
					<button wire:click="updateBim" class="btn btn-primary font-weight-bold px-3 float-end"><i class="mdi-check mdi"></i> Submit & Save </button>
		@endswitch 
	</div>
</div>