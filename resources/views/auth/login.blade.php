
<!DOCTYPE html>
<html lang="en">
<head>
     
<meta charset="utf-8" />
<title> AEC Prefab | Sign in</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">
 
<!-- App css -->
<link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/app.css') }}"  rel="stylesheet" type="text/css"  />
{{-- <link href="{{ asset('public/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" /> --}}
 
<!-- Icons Css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
<link rel="stylesheet" href="https://dropways.github.io/feathericons/assets/themes/twitter/css/feather.css"> 

<input type="hidden" name="baseurl" value="{{URL::to('/')}}/" id="baseurl">
<link rel="stylesheet" href="{{ asset('public/custom/css/variable.css') }}"> 
<link rel="stylesheet" href="{{ asset('public/custom/css/alert.css') }}"> 
<link rel="stylesheet" href="{{ asset('public/custom/css/app.css') }}"> 
<link rel="stylesheet" href="{{ asset('public/custom/css/table.css') }}"> 
<link rel="stylesheet" href="{{ asset('public/custom/css/wizz.css') }}"> 
<link rel="stylesheet" href="{{ asset('public/assets/css/pages/customer-enquiry.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/css/angularjs/ui-notification.css') }}">

<!-- SimpleMDE css -->
<link href="{{ asset('public/assets/css/vendor/simplemde.min.css') }}" rel="stylesheet" type="text/css" />

<!-- ====== Ajax Call Loader Css ========== -->
<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/angular-loading-bar/0.9.0/loading-bar.min.css' type='text/css' media='all' />
<!-- ========= Alert js Notifications ========== -->

<style>
   
    .conversation-list  li.Customer_odd {
        flex-direction: row-reverse;
    }
    .conversation-list  li.Customer_odd  .conversation-text {
        background: #BFDDFE;
        padding: 15px;
        font-size: 14px;
        font-weight: bold ;
        border-radius: 5px;
        text-align: right;
        position: relative;
    } 

    .conversation-list  li.Admin_odd  .conversation-text {
        background: #eee;
        padding: 15px;
        font-size: 14px;
        font-weight: bold ;
        border-radius: 5px;
        text-align: left;
        position: relative;
    }  
    .conversation-list  li.Customer_odd  .conversation-text::after{
        position: absolute;
        content: '';
        width: 25px;
        height: 25px;
        background: #BFDDFE;
        top: 0;
        clip-path:polygon(0 100%, 0 0, 100% 0, 37% 100%)       
    } 
    .conversation-list  li.Admin_odd  .conversation-text::after{
        position: absolute;
        content: '';
        width: 25px;
        height: 25px;
        background: #eee;
        top: 0;
        clip-path:polygon(0 9%, 0 0, 100% 0, 103% 100%) ;
        left:-11px !important
    }    
    .form-control.ng-valid.ng-touched ,
    .form-select.ng-valid.ng-touched {
    border-bottom: 1px solid #008a60 !important
    }
</style>
</head>
    <body>
        <!-- Begin page -->
        <div class="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <!--========== Left Sidebar End ========== -->

            <!--========== Start Page Content here ==========-->
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
                                        <h4 class="text-dark-50 bg-light p-2 text-center text-primary  mb-3"> <i class="fa fa-user"></i> Sign in</h4>
        
        
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
                                        
                                        </div>
        
                                        <div class="  mb-0 text-center">
                                            <button class="btn btn-outline-primary  w-100" type="submit"> Sign  In </button>
                                        </div>
                                        <div class="text-center my-3">
                                            Forgot password ?  
                                        </div> 
                                        <div class=" mb-0 text-center">
                                            <a class="btn btn-info  w-100" href="{{ route('signup') }}"> Create Account </a>
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
            

            <!--========== End Page content ==========-->

            <!--========== Start Page Footer ==========-->
            
            <!--========== End Page Footer ==========-->
        </div>
    </body>
</html>
<script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('public/assets/js/app.min.js') }}"></script>