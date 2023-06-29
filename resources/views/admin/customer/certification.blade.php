@extends('auth.layouts.customer')

@section('customer-content')
    <div class="card col-lg-4 col-md-5 col-sm-10 shadow-lg border">  
        <div class="card-header text-center pt-3 border-0">
            <img src="{{ config('app.logo_src') }}" width="150px" class="mb-2"> <br>
        </div>
        <div class="card-body pt-0 p-4">   

            <h3 class="text-center">
                <img src="{{ asset('public/assets/images/rainbow-tick.png') }}" style="filter: drop-shadow(5px 5px 5px #222);" height="75" width="auto" alt="">
                Activation Succeeded
            </h3> 
            <hr>
            <b>Congratulations !</b>
            <p class="pt-2">
              <a href="{{ route('login') }}"> Click here</a> to go back to our login page to proceed further to use AECPrefab services.
            </p>
        </div>
    </div> 
@endsection