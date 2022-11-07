@extends('auth.layouts.customer')

@section('customer-content')
    <div class="card col-xl-3 col-lg-4 col-md-6 col-sm-8 col-6 shadow-lg border">  
        <div class="card-header text-center py-3 border-0">
            <img src="{{ asset("public/assets/images/logo_customer.png") }}" width="150px" class="mb-2">
            <p class="lead" style="font-weight: 400;">Welcome to AEC Prefab </p>
            <p class="lead text-center" style="font-weight: 400;">Create Account</p>
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
                        <div class="border border-danger rounded text-danger mt-3 shadow-sm small d-flex align-items-center justify-content-around">
                            <span class="p-1 ps-2">{{ $errors->first('email') }}</span>
                            <a href="{{ route('signup_resend', old('email')) }}" class="pe-2"><b>Resend</b></a>
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <div class="input-group flex-nowrap border rounded">
                        <span class="input-group-text border-0 bg-none"><i class="fa fa-key"></i></span>
                        <input type="password" minlength="8"  name="password" id="password" class="form-control border-0 ps-0" placeholder="Password"  required onkeyup="pswdchangeeve(this.value)">
                        <div class="input-group-text border-0" data-password="false">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                    <small class="text-danger" style="display:none;" id="pswd"><i class="fa fa-info-circle"></i> (Min 8 to 12 Characters)</small>
                    @if($errors->has('password'))
                        <span class="text-danger"> {{ $errors->first('password') }}</span>
                    @endif
                </div> 
                <div class="mb-3">
                    <div class="input-group flex-nowrap border rounded">
                        <span class="input-group-text border-0 bg-none"><i class="fa fa-key"></i></span>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control border-0 ps-0" placeholder="Confirm Password"  required onkeyup="confirmpswdchange()">
                        <div class="input-group-text border-0" data-password="false">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                    <small class="text-danger" id="re_passwd"><i class="fa fa-info-circle"></i> (Re-Enter the same password)</small>
                    <small class="text-success" style="display:none" id="success_pswd">(Password Matched)</small>
                    @if($errors->has('password_confirmation'))
                        <span class="text-danger"> {{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>           
                <div class="mb-0 text-center">
                    <button class="btn btn-primary w-100" type="submit"> Sign Up </button>
                </div>
            </form>
        </div>
    </div>
    @push('custom-scripts')
        <script>
            function pswdchangeeve(text){
                // console.log(text.length);
                if(text.length <=8 || text.length >=12)
                {
                    document.getElementById('pswd').style.display="block";
                }
                else{
                    document.getElementById('pswd').style.display="none";
                }
            }
            function confirmpswdchange(){
                var passwd=document.getElementById('password');
                var c_passwd=document.getElementById('password_confirmation');
                if(passwd.value==c_passwd.value){
                    console.log('matched')
                    // successPasserr.style.display='block';
                     successPasserr=document.getElementById('success_pswd').style.display="block";
                     rePasserr=document.getElementById('re_passwd').style.display="none";
                    // rePasserr.style.display='none';
                }
                else{
                     rePasserr=document.getElementById('re_passwd').style.display="block";
                     successPasserr=document.getElementById('success_pswd').style.display="none";
                    // rePasserr.style.display='block';
                    // successPasserr.style.display='none';
                }
            }
        </script>
    @endpush
@endsection