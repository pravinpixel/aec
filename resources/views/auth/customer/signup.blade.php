@extends('auth.layouts.customer')

@section('customer-content')
    <div class="card col-lg-3 col-md-4 col-sm-8 shadow-lg border">  
        <div class="card-header text-center py-3 border-0">
            <img src="{{ asset("public/assets/images/logo_customer.png") }}" width="150px" class="mb-2">
            <p class="lead" style="font-weight: 400;">Welcome to AEC Prefab Create Account</p>
            <b>Already have an account ?  <a href="{{ route('login') }}">Sign In</a></b>
        </div>
        <div class="card-body pt-0 p-4">                            
            <form class="form-horizontal" method="post" action="{{ route('signup') }}">
                @csrf
                <div class="mb-3">
                    <div class="input-group flex-nowrap border rounded">
                        <span class="input-group-text border-0 bg-none"><i class="fa fa-user"></i></span>
                        <input type="text" name="first_name" class="form-control border-0 ps-0" placeholder="First Name" required  value="{{ old('first_name') }}">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="input-group flex-nowrap border rounded">
                        <span class="input-group-text border-0 bg-none"><i class="fa fa-user"></i></span>
                        <input type="text" name="last_name" class="form-control border-0 ps-0" placeholder="Last Name" required value="{{ old('last_name') }}">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="input-group flex-nowrap border rounded">
                        <span class="input-group-text border-0 bg-none"><i class="fa fa-envelope"></i></span>
                        <input type="text" name="email" class="form-control border-0 ps-0" placeholder="Email" pattern="{{ config('global.email') }}" required value="{{ old('email') }}">
                    </div>
                    @if($errors->has('email'))
                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <div class="input-group flex-nowrap border rounded">
                        <span class="input-group-text border-0 bg-none"><i class="fa fa-key"></i></span>
                        <input type="password" name="password" id="password" class="form-control border-0 ps-0" placeholder="Password"  required>
                        <div class="input-group-text border-0" data-password="false">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                    @if($errors->has('password'))
                        <span class="text-danger"> {{ $errors->first('password') }}</span>
                    @endif
                </div> 
                <div class="mb-3">
                    <div class="input-group flex-nowrap border rounded">
                        <span class="input-group-text border-0 bg-none"><i class="fa fa-key"></i></span>
                        <input type="text" name="password_confirmation" id="password_confirmation" class="form-control border-0 ps-0" placeholder="Conform Password"  required>
                        <div class="input-group-text border-0" data-password="false">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                    @if($errors->has('password_confirmation'))
                        <span class="text-danger"> {{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>           
                <div class="mb-0 text-center">
                    <button class="btn btn-primary w-100" type="submit"> Sign  In </button>
                </div>
            </form>
        </div>
    </div>
@endsection