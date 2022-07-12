
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
                @include('admin.includes.side-bar')
            <!--========== Left Sidebar End ========== -->

            <!--========== Start Page Content here ==========-->
  
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

        {{-- <!-- Right Sidebar -->
            <div class="end-bar">

                <div class="rightbar-title">
                    <a href="javascript:void(0);" class="end-bar-toggle float-end">
                        <i class="dripicons-cross noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <div class="rightbar-content h-100" data-simplebar>

                    <div class="p-3">
                     

                        <!-- Settings -->
                        <h5 class="mt-3">Color Scheme</h5>
                        <hr class="mt-1" />

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked>
                            <label class="form-check-label" for="light-mode-check">Light Mode</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                            <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                        </div>
        

                        <!-- Width -->
                        <h5 class="mt-4">Width</h5>
                        <hr class="mt-1" />
                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                            <label class="form-check-label" for="fluid-check">Fluid</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                            <label class="form-check-label" for="boxed-check">Boxed</label>
                        </div>
            

                        <!-- Left Sidebar-->
                        <h5 class="mt-4">Left Sidebar</h5>
                        <hr class="mt-1" />
                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                            <label class="form-check-label" for="default-check">Default</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                            <label class="form-check-label" for="light-check">Light</label>
                        </div>

                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                            <label class="form-check-label" for="dark-check">Dark</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                            <label class="form-check-label" for="fixed-check">Fixed</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                            <label class="form-check-label" for="condensed-check">Condensed</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                            <label class="form-check-label" for="scrollable-check">Scrollable</label>
                        </div>

                        <div class="d-grid mt-4">
                            <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                        </div>
                    </div> <!-- end padding-->

                </div>
            </div> 
            <div class="rightbar-overlay"></div>
        <!-- /End-bar --> --}}
 
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
    </body>
</html>
