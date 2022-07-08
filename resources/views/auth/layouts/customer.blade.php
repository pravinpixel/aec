<!DOCTYPE html>
<html lang="en">
<head>
    @include('customer.includes.head')
</head>
@include('flash::message')
    
    <body ng-app="App" class="wrapper d-flex justify-content-center align-items-center"  style="min-height: 100vh">
        <!--========== Start Page Content here ==========-->
                @yield('customer-content')
        <!--========== End Page content ==========-->
        <footer class="footer footer-alt">
            © {{ now()->year }} All rights reserved | AecPrefab
        </footer>
    </body>
    @include('customer.includes.footer-scripts')
</html>
@stack('custom-scripts')