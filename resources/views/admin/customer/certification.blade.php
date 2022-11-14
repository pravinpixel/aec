@extends('auth.layouts.customer')

@section('customer-content')
    <div class="card col-lg-4 col-md-5 col-sm-10 shadow-lg border">  
        <div class="card-header text-center pt-3 border-0">
            <img src="{{ asset("public/assets/images/logo_customer.png") }}" width="150px" class="mb-2"> <br>
        </div>
        <div class="card-body pt-0 p-4">       
            <h3>
                <img src="{{ asset('public/assets/images/red-tick.png') }}" height="75" width="auto" alt="">
                Activation Succeeded
            </h3> 
            <hr>
            <i class="fa fa-check-circle text-primary"  aria-hidden="true"></i><b>Congradulations !</b>
            <p class="pt-2">
              <a href="{{ route('login') }}"> Click here</a> to go back to our login page to proceed further to use <b>{{ $_ENV['APP_NAME'] }}</b> services.
            </p>
        </div>
    </div> 
@endsection