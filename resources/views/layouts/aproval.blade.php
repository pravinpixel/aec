
<!DOCTYPE html>
<html lang="en">
    
    <head>
        @include('admin.includes.head')
    </head> 
    <body>

        <!-- Begin page -->
        <div class="wrapper" ng-app="App">

            {{--===========  AJAX LOADER ======== --}}
                <div data-loading></div>
            {{--===========  AJAX LOADER ======== --}}

            {{-- ======= Alert Part ========== --}}
            <div class="alert-container" id="alert"></div>
            {{-- ======= Alert Part ========== --}}

        
            <!--========== Start Page Content here ==========-->
  
                <div class="main-content-rapper" >
                    @yield('content')
                </div>
            <!--========== End Page content ==========-->

            <!--========== Start Page Footer ==========-->
                @include('admin.includes.footer')
            <!--========== End Page Footer ==========-->

        </div> 

        <!--  Footer Scripts  -->
        @include('admin.includes.footer-scripts') 
    </body>
</html>
