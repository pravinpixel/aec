 @extends('layouts.customer')

@section('customer-content')
   
    <div class="content-page">
        <div class="content">

            @include('customer.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('customer.layouts.page-navigater')

                <div class="card ">
              
                    <div class="card-body pt-0 p-4">
                        
                       
                        <form class="form-horizontal  pt-4" method="post" action="{{ route("customer.changePassword") }}">
                            @csrf
                            <div class="mb-3 row">
                                <label for="colFormLabelSm" class="col-sm-3  col-form-label">Old Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="old_password" class="form-control p-2" placeholder="Enter your old password" required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="colFormLabelSm" class="col-sm-3  col-form-label">New Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control p-2" placeholder="Enter your new password" required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="colFormLabelSm" class="col-sm-3  col-form-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="confirm_password" class="form-control p-2" placeholder="Confirm your new password" required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="  mb-0 text-end">
                                <button class="btn btn-primary " type="submit"> Change </button>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div> 
                 
            </div> <!-- container -->

        </div> <!-- content --> 
    </div>  

@endsection 