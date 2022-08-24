<div class="card ">       
    <div class="card-body pt-0 p-4">
        <form class="form-horizontal pt-4 ng-pristine ng-valid" wire:submit="changePassword()">
            <div class="mb-3 row">
                <label for="colFormLabelSm" class="col-sm-3  col-form-label">New Password</label>
                <div class="col-sm-9">
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" name="password" wire:model.lazy="password" class="form-control p-2" placeholder="Enter your new password" required="">
                        <div class="input-group-text" data-password="false">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="colFormLabelSm" class="col-sm-3  col-form-label">Confirm Password</label>
                <div class="col-sm-9">
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" name="password_confirmation" wire:model.lazy="password_confirmation" class="form-control p-2" placeholder="Confirm your new password" required="">
                        <div class="input-group-text" data-password="false">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                    @error('confirm_password') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div> 

            <div class="  mb-0 text-end">
                <button class="btn btn-primary " type="submit"> Change </button>
            </div>
        </form>
    </div> <!-- end card-body -->
</div>