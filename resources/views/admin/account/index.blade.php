@extends('layouts.admin')

@section('admin-content')
    <div class="content-page">
        <div class="content">
            @include('admin.includes.top-bar') 
            <div class="py-3 px-2">
                <div class="page-title-box">
                    <div class="page-title-right mt-0">
                        <ol class="breadcrumb align-items-center m-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route("admin-dashboard") }}"><i class="fa fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active"> My Account</li> 
                            <li class="breadcrumb- ms-2">
                                <i type="button" onclick="goBack()" class="mdi mdi-backspace text-danger fa-2x"></i> 
                            </li>
                        </ol>
                    </div>
                    <h4 class="page-title">My Account</h4>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card border shadow-sm">
                            <div class="card-header px-3 text-primary"><b>Account Details</b></div>
                            <div class="card-body p-3">
                                <form action="{{ route('admin.update.my-account') }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="row mb-1">
                                        <div class="col-md-6 mb-2">
                                            <label class="small mb-1" for="inputUsername"><i class="fa fa-user-circle me-1"></i> Display Name </label>
                                            <input class="form-control form-control-sm" id="inputDisplay Name" type="text" placeholder="Enter your Display Name" name="display_name" value="{{ $user->display_name }}">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="small mb-1" for="inputFirstName"><i class="fa fa-user me-1"></i>First name</label>
                                            <input class="form-control form-control-sm" id="inputFirstName" type="text" placeholder="Enter your first name" name="first_name" value="{{ $user->first_name }}">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="small mb-1" for="inputLastName"><i class="fa fa-user me-1"></i>Last name</label>
                                            <input class="form-control form-control-sm" id="inputLastName" type="text" placeholder="Enter your last name" name="last_name" value="{{ $user->last_name }}">
                                        </div> 
                                        <div class="col-md-6 mb-2">
                                            <label class="small mb-1" for="inputPhone"><i class="fa fa-phone me-1"></i> Phone number</label>
                                            <input class="form-control form-control-sm" id="inputPhone" type="tel" placeholder="Enter your phone number" name="mobile_number" value="{{ $user->mobile_number }}">
                                        </div> 
                                        <div class="col-md-6 mb-2">
                                            <label class="small mb-1" for="inputEmailAddress"><i class="fa fa-envelope me-1"></i>Email address</label>
                                            <input class="form-control form-control-sm" id="inputEmailAddress" type="email" placeholder="Enter your email address" name="email" value="{{ $user->email }}">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="small mb-1" for="inputLocation"><i class="fa fa-map me-1"></i>Location</label>
                                            <input class="form-control form-control-sm" id="inputLocation" type="text" placeholder="Enter your location" name="location" value="{{ $user->location }}">
                                        </div>
                                    </div> 
                                    <!-- Save changes button-->
                                    <button type="submit" class="btn btn-primary btn-sm float-end" type="button"><i class="fa fa-save me-1"></i>Save changes</button>
                                </form>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm border">
                            <div class="card-header px-3 text-primary"><b>Profile Picture</b></div>
                            <div class="card-body text-center p-3">
                                <img id="imagePreview" class="img-account-profile rounded-circle mb-2 border-light shadow-sm" src="{{ $user->image }}" alt="">
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 2 MB</div>
                                <form action="{{ route('admin.update.my-account-profile') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group">
                                        <input type="file" class="form-control form-control-sm" required onchange="imagePreview(this)" name="image" id="profile_image" accept="image/png, image/jpeg, image/jpg">
                                        <button type="submit" class="btn btn-primary btn-sm" type="button"><i class="bi bi-upload"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border shadow-sm">
                            <div class="card-header px-3 text-primary"><b>Change Password</b></div>
                            <div class="card-body p-3">
                                <form action="{{ route('admin.change-account-password') }}" method="POST">
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
                </div>
            </div>
        </div>
    </div> 
@endsection
@push('custom-styles')
    <style>
        .img-account-profile {
            height: 149px;
            width: 149px;
            object-fit: cover
        }
    </style>
@endpush
@push('custom-scripts')
    <script>
        
        imagePreview = (input) => {
            if(input.files[0].size > 2000000) {
                Message('danger',"Max File File 2MB")
                return false
            }
            if (input.files && input.files[0]) {

                const Reader = new FileReader();

                Reader.onload = (e) => {
                    $('#imagePreview').attr('src', e.target.result);
                };

                Reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush