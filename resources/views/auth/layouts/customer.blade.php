<!DOCTYPE html>
<html lang="en">
<head>
    @include('customer.includes.head')
</head>
        
    <!-- Begin page -->
    <div class="wrapper" ng-app="App">

        <!-- ========== Left Sidebar Start ========== -->
        <!--========== Left Sidebar End ========== -->

        <!--========== Start Page Content here ==========-->
            @yield('customer-content')
        <!--========== End Page content ==========-->

        <!--========== Start Page Footer ==========-->
        
        <!--========== End Page Footer ==========-->

    </div>

</html>
@include('customer.includes.footer-scripts')
@stack('custom-scripts')