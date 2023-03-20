 @extends('layouts.customer')

@section('customer-content')

    <div class="content-page">
        <div class="content">

            @include('customer.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->

                @include('customer.includes.page-navigater')
                <div class="col-12">
                    <div class="card border shadow-sm">
                        <div class="card-header px-3 text-primary"><b>Change Password</b></div>
                        <div class="card-body p-3">
                            <form action="{{ route('customer.changePassword') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <label class="small mb-1" for="inputPhone"><i class="fa fa-key me-1"></i>Current Passowrd</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="current_password" name="current_password" class="form-control form-control-sm" placeholder="Enter your password" required>
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-md">
                                        <label class="small mb-1" for="inputPhone"><i class="fa fa-key me-1"></i>New Passowrd</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="new_password" name="new_password" class="form-control form-control-sm" placeholder="Enter your new password" required>
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-md">
                                        <label class="small mb-1" for="inputPhone"><i class="fa fa-key me-1"></i>Confirm Passowrd</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="confirm_password" class="form-control form-control-sm" placeholder="Confirm your new passowrd" required>
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <button type="submit" class="btn btn-primary float-end btn-sm" type="button"><i class="fa fa-key me-1"></i>Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>  
            </div> <!-- container -->

        </div> <!-- content -->
    </div>

@endsection 
