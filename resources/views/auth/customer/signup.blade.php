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
                        <input type="text" name="first_name" class="form-control border-0 ps-0" placeholder="First Name" id="fname" required  value="{{ old('first_name') }}">
                    </div>
                    <p class="text-danger err" id="err-fname">Please fill out fist name field</p>
                </div>
                <div class="mb-3">
                    <div class="input-group flex-nowrap border rounded">
                        <span class="input-group-text border-0 bg-none"><i class="fa fa-user"></i></span>
                        <input type="text" name="last_name" class="form-control border-0 ps-0" placeholder="Last Name" id="lname" required value="{{ old('last_name') }}">
                    </div>
                    <p class="text-danger err" id="err-lname">Please fill out last name field</p>
                </div>
                <div class="mb-3">
                    <div class="input-group flex-nowrap border rounded" id="emailBorder">
                        <span class="input-group-text border-0 bg-none"><i class="fa fa-envelope"></i></span>
                        <input type="text" name="email" class="form-control border-0 ps-0 " id="email" onkeyup="checkEmailExists(this.value)" placeholder="Email" pattern="{{ config('global.email') }}" required value="{{ old('email') }}">
                    </div>
                    @if($errors->has('email'))
                        <div class="border border-danger rounded text-danger mt-3 shadow-sm small d-flex align-items-center justify-content-around">
                            <span class="p-1 ps-2">{{ $errors->first('email') }}</span>
                            <a href="{{ route('signup_resend', old('email')) }}" class="pe-2"><b>Resend</b></a>
                        </div>
                    @endif
                </div>
                <div id="passwords">
                    <div class="mb-3">
                        <div class="input-group flex-nowrap border rounded">
                            <span class="input-group-text border-0 bg-none"><i class="fa fa-key"></i></span>
                            <input type="password" minlength="8" maxlength="12"  name="password" id="password" class="form-control border-0 ps-0" placeholder="Password"  required onkeyup="pswdchangeeve(this.value)">
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
                </div>
                <div class="py-2 mb-3" style="display: none" id="popupBox">
                    <p class="m-0 p-2 text-danger primary-border">Verification mail already sent,check your inbox</p>
                </div>
                <div class="mb-0 text-center" id="signup">
                    <button class="btn btn-primary w-100" type="submit"> Sign Up </button>
                </div>
                <div class="mb-0 text-center" style="display:none;" id="resend">
                    <button class="btn btn-primary w-100" onclick="reSend()"> Re Send </button>
                </div>
            </form>
        </div>
    </div>
    @push('custom-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
        <script>
            function pswdchangeeve(text){
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
                     successPasserr=document.getElementById('success_pswd').style.display="block";
                     rePasserr=document.getElementById('re_passwd').style.display="none";
                }
                else{
                     rePasserr=document.getElementById('re_passwd').style.display="block";
                     successPasserr=document.getElementById('success_pswd').style.display="none";
                }
            }
            function checkEmailExists(email){
                if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
                  var passwords=document.getElementById('passwords');
                  var signup=document.getElementById('signup');
                  var resend=document.getElementById('resend');
                    $.ajax({
                        method:'post',
                        data:{
                            email:email
                        },
                        url:"{{ route('check-email-exists') }}",
                        success:function(res){
                            console.log(res)
                            var border   = document.getElementById('emailBorder');
                            var popupBox = document.getElementById('popupBox');
                            if(res.msg=='exists'){
                                passwords.style.display = 'none';
                                border.classList.remove('border');
                                border.style.border = '1px solid #4199FC';
                                popupBox.style.display="block ";
                                signup.style.display='none';
                                resend.style.display='block';
                            }
                            else{
                                border.classList.add('border');
                                passwords.style.display='block';
                                popupBox.style.display="none ";
                                signup.style.display='block';
                                resend.style.display='none';
                            }
                        },
                        error:function(){
                            alert('error made by dev');
                        }
                    });
                }
            }


            function reSend(){
                console.log('clicked');
                var fname=document.getElementById('fname').value;
                var lname=document.getElementById('lname').value;
                var reemail=document.getElementById('email').value;
                var errFname=document.getElementById('err-fname');
                var errLname=document.getElementById('err-lname');
                console.log(fname+' '+lname+' '+reemail);
               $.ajax({
                method:'post',
                url:"{{ route('email-exist-resend-email') }}",
                beforeSend:function(){
                    errFname.style.display="none";
                    errLname.style.display="none";
                },
                data:{
                    first_name:fname,
                    last_name:lname,
                    email:reemail,
                },
                success:function(res){
                    console.log(res);
                    if(res.msg="errors"){   
                        $.each(res.errors,(index,value)=>{
                            console.log(index+' '+value)
                            if(index=="first_name"){
                                errFname.style.display="block";
                            }
                            else if(index=="last_name")
                            {
                                errLname.style.display="block";
                            }
                        })
                    }
                    else if(res.msg="mail send"){
                        Message('success','mail Send success');
                    }
                    else{
                        Message('danger','mail Send failed');
                    }
                },
                error:function(){
                    console.log('err made my dev')
                }
               });
            }
        </script>
    @endpush
@endsection