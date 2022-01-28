
<!DOCTYPE html>
<html lang="en">
    
    <head>
        @include('customer.includes.head')
        
        @stack('custom-styles')

    </head>

    <body data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        
        <!-- Begin page -->
        <div class="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
                @include('customer.includes.side-bar')
            <!--========== Left Sidebar End ========== -->

            <!--========== Start Page Content here ==========-->
                @yield('customer-content')
            <!--========== End Page content ==========-->

            <!--========== Start Page Footer ==========-->
                @include('customer.includes.footer')
            <!--========== End Page Footer ==========-->

        </div>
        <!-- END wrapper --> 

        <!-- bundle -->
        <script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/app.min.js') }}"></script>
        <!-- end demo js-->
        <script src="{{ asset('public/assets/js/pages/demo.form-wizard.js') }}"></script>
        <script src="{{ asset('public/assets/js/vendor/dropzone.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/ui/component.fileupload.js') }}"></script>
    
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.angularjs.org/1.2.16/angular.js"></script>

        <script src="{{ asset('public/assets/js/angularjs/ui-notification.js') }}"></script>

        <script>
            var app = angular.module('App', ['ui-notification']).constant('API_URL', $("#baseurl").val());           
        </script> 
        <script src="{{ asset('public/assets/js/pages/customers/directives.js') }}"></script>
        {{-- Push Scripts --}}

        @stack('custom-scripts')
       
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </body>
</html>
