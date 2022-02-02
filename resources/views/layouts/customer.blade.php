
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

        @include('customer.includes.footer-scripts')
        @stack('custom-scripts')
       
        <script>
            function goBack() {
                window.history.back();
            } 
        </script> 
        <script> 
            var objDiv = document.getElementById("chat-scroll");
            objDiv.scrollTop = objDiv.scrollHeight;
        </script>
    </body>
</html>
