
<!DOCTYPE html>
<html lang="en">
    
    <head>
        @include('admin.includes.head')
        @stack('live-project-custom-styles')
    </head> 
    <body>

        <!-- Begin page -->
        <div class="wrapper"> 
            <!-- ========== Left Sidebar Start ========== -->
                @include('admin.includes.side-bar')
            <!--========== Left Sidebar End ========== -->

            <!--========== Start Page Content here ==========-->
                <div class="main-content-rapper" >
                    <div class="content-page">
                        @include('admin.includes.top-bar')
                        @yield('admin-content')
                    </div>
            </div>
            <!--========== End Page content ==========-->

            <!--========== Start Page Footer ==========-->
                @include('admin.includes.footer')
            <!--========== End Page Footer ==========-->
        </div>
        <script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/app.js') }}"></script>
        @stack('live-project-custom-scripts')
    </body>
</html>
