@extends('auth.layouts.customer')

@section('customer-content')
@include('flash::message')
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5 pt-md-5">
                    <div class="card " style="backDrop-filter:blur(3px)">
  
                        <div class="card-body pt-0 p-4">
                            
                            <div class="text-center pt-4 mb-3 w-75 m-auto">
                                <span><img src="{{ config('app.logo_src') }}" alt="{{ env('APP_NAME') }}" width="150px"></span>
                            </div>

                            <form class="form-horizontal needs-validation" novalidate method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <h4 class="text-dark-50 bg-light p-2 text-center text-primary  mb-3"> <i class="fa fa-user"></i> Admin Login</h4>


                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" name="email" id="emailaddress" required placeholder="Enter your email">
                                </div>

                                <div class="mb-3">
                                    
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control rounded" required placeholder="Enter your password">
                                        <div class="input-group-text rounded position-absolute" data-password="false" style="right: 0">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div> 

                                <div class="  mb-0 text-center">
                                    <button class="btn btn-primary  w-100" type="submit"> Log In </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div> 
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
          © {{ now()->year }} AEC Prefab. All Rights Reserved.
    </footer>
    
</body>
@endsection

