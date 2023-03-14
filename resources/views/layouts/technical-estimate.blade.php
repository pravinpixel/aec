
<!DOCTYPE html>
<html lang="en">
    
    <head>
        @include('admin.includes.head')
        
        @stack('custom-styles')       
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
            
            <!-- ========== Left Sidebar Start ========== -->
                @include('technical-estimate.includes.side-bar')
            <!--========== Left Sidebar End ========== -->

            <!--========== Start Page Content here ==========-->
                <input type="hidden" name="technical" id="_technical_" value=1>
                <div class="main-content-rapper" >
                    {{-- <h1 class="fixed-top ps-5 ms-5" >counter : @{{ counter }}</h1> --}}
                    @yield('admin-content')
                </div>
            <!--========== End Page content ==========-->

            <!--========== Start Page Footer ==========-->
                @include('admin.includes.footer')
            <!--========== End Page Footer ==========-->

        </div>
        <!-- END wrapper -->

     
 
        @include('modal.delete');
        <!--  Footer Scripts  -->
        @include('admin.includes.footer-scripts')

        <!--  Push Scripts  -->        
        @stack('custom-scripts')
        <script>
            function goBack() {
                window.history.back();
            }
            function submit() {
                swal("Good job!", "Project successfully created!", "success");
            }
        </script>
        <script src="{{ asset('public/assets/js/custom.js') }}"></script>
    </body>
</html>
