<!DOCTYPE html>
<html lang="en">
<head>
    @include('customer.includes.head')
</head>
    <body ng-app="App" class="wrapper d-flex justify-content-center align-items-center"  style="min-height: 100vh">
        <!--========== Start Page Content here ==========-->
            <main class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                @yield('customer-content')
            </main>
        <!--========== End Page content ==========-->
        <footer class="footer footer-alt">
            © {{ now()->year }} All rights reserved | AecPrefab
        </footer>
    </body>
    @include('customer.includes.footer-scripts')
</html>
@stack('custom-scripts')