<!DOCTYPE html>
<html lang="en">
<head>
    @include('customers.layouts.head')
</head>
        
    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <!--========== Left Sidebar End ========== -->

        <!--========== Start Page Content here ==========-->
            @yield('customer-content')
        <!--========== End Page content ==========-->

        <!--========== Start Page Footer ==========-->
        
        <!--========== End Page Footer ==========-->

    </div>

</html>
<script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('public/assets/js/app.min.js') }}"></script>