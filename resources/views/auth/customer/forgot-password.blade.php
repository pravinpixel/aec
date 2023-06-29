@extends('auth.layouts.customer')

@section('customer-content')
    <div class="card col-lg-3 col-md-4 col-sm-8 shadow-lg border">  
        <div class="card-header text-center pt-3 border-0">
            <img src="{{ config('app.logo_src') }}" width="150px" class="mb-2"> <br>
            <img src="{{ asset("public/assets/images/key.png") }}" width="100px" class="mb-2">
            <p class="lead text-secondary" style="font-weight: 400;">Forgot Password ?</p>
            @if (Session::has('message')) <b class="text-{{ Session::get('state') }}">{{ Session::get('message') }}@endif
            {{-- @if (Session::has('deleted_email')) <b class="text-danger">The given email is not registered in our portal @endif --}}
            @if ($errors->has('email')) <b class="text-danger">The given email is not registered in our portal ! @endif                    
        </div>
        <div class="card-body pt-0 p-4">        
            <form action="{{ route('forgot.password.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="input-group flex-nowrap border rounded border-primary">
                        <span class="input-group-text border-0 bg-none"><i class="fa fa-envelope"></i></span>
                        <input type="text" name="email" autofocus class="form-control border-0 ps-0" placeholder="Email" pattern="{{ config('global.email') }}" required>
                    </div>
                </div>
                <div class="mb-0 text-end">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm col-3"> Back </a>
                    <button class="btn btn-primary btn-sm col-3" type="submit"> Next </button>
                </div>
            </form>
        </div>
    </div> 
@endsection