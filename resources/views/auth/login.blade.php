@extends('auth.layouts.customer')
@section('customer-content')
@include('flash::message') 
<div class="card col-xl-3 col-lg-4 col-md-6 col-sm-8 shadow-lg border">  
    <div class="card-header text-center py-3 border-0">
        <img src="{{ asset("public/assets/images/logo_customer.png") }}" width="150px" class="mb-2">
        <p class="lead" style="font-weight: 400;">Welcome to AEC Prefab My Account</p>
        <b>Don't have an account ? <a href="{{ route('signup') }}">Sign up</a></b>
    </div>
    <div class="card-body pt-0 p-4">                            
        <form class="form-horizontal" method="post" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <div class="input-group flex-nowrap border rounded">
                    <span class="input-group-text border-0 bg-none"><i class="fa fa-envelope"></i></span>
                    <input type="text" name="email" class="form-control border-0 ps-0" placeholder="Email" pattern="{{ config('global.email') }}" required>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group flex-nowrap border rounded">
                    <span class="input-group-text border-0 bg-none"><i class="fa fa-key"></i></span>
                    <input type="password" name="password" id="password" class="form-control border-0 ps-0" placeholder="Password"  required>
                    <div class="input-group-text border-0" data-password="false">
                        <span class="password-eye"></span>
                    </div>
                </div>
            </div> 
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <label for="keep_me" class="text-secondary">
                   <input type="checkbox" class="me-1 form-check-input" id="keep_me"> Keep me signed in
                </label>  
                <a href="{{route('forget.password.get')}}"> Forgot password ? </a>  
            </div>
            <div class="  mb-0 text-center">
                <button class="btn btn-primary w-100" type="submit"> Sign  In </button>
            </div>
            <p class="fw-bold text-center mt-3">Sign in with <a href="#"> Facebook  </a> or <a href="#"> Google </a></p>
        </form>
    </div>
</div>
@endsection