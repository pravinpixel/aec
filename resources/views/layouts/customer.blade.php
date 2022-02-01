
<!DOCTYPE html>
<html lang="en">
    
    <head>
        @include('customer.includes.head')
        
        @stack('custom-styles')

    </head>

    <body>
        {{-- ======= Alert Part ========== --}}
        <div class="alert-container" id="alert"></div>
        {{-- ======= Alert Part ========== --}}
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
        <!-- Typehead -->
        <script src="{{ asset('public/assets/js/vendor/handlebars.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/vendor/typeahead.bundle.min.js') }}"></script>

        <!-- Demo -->
        <script src="{{ asset('public/assets/js/pages/demo.typehead.js') }}"></script>

        <!-- Timepicker -->
        <script src="{{ asset('public/assets/js/pages/demo.timepicker.js') }}"></script>

        
        
    
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
        <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular-sanitize.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/textAngular/1.1.2/textAngular.min.js'></script>
        
        <!-- =========  Alerts JS ======== JS -->

        <script src="{{ asset("public/custom/js/ngControllers/alerts.js") }}"></script>

        <script src="{{ asset('public/assets/js/angularjs/ui-notification.js') }}"></script>

        <script>
            var app = angular.module('App', ['ui-notification','ngRoute','textAngular']).constant('API_URL', $("#baseurl").val());           
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
