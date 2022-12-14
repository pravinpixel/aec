<!DOCTYPE html>
<html lang="en">
<head>
    @include('customer.includes.head')
</head>
    <body ng-app="App" class="wrapper d-flex justify-content-center align-items-center"  style="min-height: 100vh">
        <!--========== Start Page Content here ==========-->
                @yield('customer-content')
        <!--========== End Page content ==========-->
        <footer class="footer footer-alt">
             © {{ now()->year }} AEC Prefab. All Rights Reserved.
        </footer>
        @include('customer.includes.footer-scripts')
        @include('vendor.flash.message')
        @stack('custom-scripts')
    </body>
</html>
