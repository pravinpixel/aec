@extends('auth.layouts.customer')

@section('customer-content')
@include('flash::message')
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5 pt-md-5">
                    <div class="card ">  
                        <div class="card-body pt-0 p-4">                            
                            <div class="text-center pt-4 mb-3 w-75 m-auto">
                                <span><img src="{{ asset("public/assets/images/logo_customer.png") }}" alt="{{ env('APP_NAME') }}" width="150px"></span>
                            </div>

                            <form class="form-horizontal" method="post" action="{{ route('login') }}">
                                @csrf
                                <h4 class="text-dark-50 bg-light p-2 text-center text-primary  mb-3"> <i class="fa fa-user"></i> Customer Login</h4>


                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                                </div>

                                <div class="mb-3">
                                    
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    {{-- <a href="#" class="text-muted float-end"><small>Forgot your password?</small></a> --}}
                                </div>

                                {{-- <div class="mb-3 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div> --}}

                                <div class="  mb-0 text-center">
                                    <button class="btn btn-primary  w-100" type="submit"> Log In </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    {{-- <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="#" class="text-muted ms-1"><b>Contact us</b></a></p>
                        </div> <!-- end col -->
                    </div> --}}
                    <!-- end row -->

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

