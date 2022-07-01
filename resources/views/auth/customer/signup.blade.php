@extends('auth.layouts.customer')

@section('customer-content')
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5 pt-md-5">
                    <div class="card ">  
                        <div class="card-header border-primary">
                            <div class="text-center py-2 w-75 m-auto">
                                <span><img src="{{ asset("public/assets/images/logo_customer.png") }}" alt="{{ env('APP_NAME') }}" width="150px"></span>
                            </div>
                        </div>
                        <div class="card-body p-4"> 
                            <form class="form-horizontal" method="post" action="{{ route('signup') }}">
                                @csrf
                                <h4> Create Account</h4>
                                <div class="my-3">
                                    <label for="first_name" class="form-label text-secondary">First Name</label>
                                    <input class="form-control" type="text" name="first_name" id="first_name" required value="{{ old('first_name') }}" placeholder="Enter your firstname">
                                </div>
                                <div class="my-3">
                                    <label for="last_name" class="form-label text-secondary">Last Name</label>
                                    <input class="form-control" type="text" name="last_name" id="last_name" required value="{{ old('last_name') }}" placeholder="Enter your lastname">
                                </div>
                                <div class="my-3">
                                    <label for="emailaddress" class="form-label text-secondary">Email address</label>
                                    <input class="form-control" type="email" name="email"  pattern="{{ config('global.email') }}" id="emailaddress" required value="{{ old('email') }}" placeholder="Enter your email">
                                    @if($errors->has('email'))
                                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                                    @endif
                                </div> 
                                <div class="mb-3"> 
                                    <label for="password" class="form-label text-secondary">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    @if($errors->has('password'))
                                        <span class="text-danger"> {{ $errors->first('password') }}</span>
                                    @endif
                                  
                                </div> 
                                <div class="mb-3"> 
                                    <label for="password" class="form-label text-secondary">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    @if($errors->has('password_confirmation'))
                                        <span class="text-danger"> {{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                  
                                </div> 

                                <div class="mb-0 text-center">
                                    <button class="btn btn-info fw-bold w-100" type="submit"> Sign Up </button>
                                </div>
                                <div class="text-center mt-3">
                                    Already have an account ? <a href="{{ route('login') }}" class="text-info">Sign In </a>
                                </div> 
                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
          © {{ now()->year }} All rights reserved | AecPrefab
    </footer>
    
</body>
@endsection