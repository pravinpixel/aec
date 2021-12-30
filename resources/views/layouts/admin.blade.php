
<!DOCTYPE html>
<html lang="en">
    
    <head>
        @include('admin.layouts.head')
        
        @stack('custom-styles')
        <style>
            /* Custom style */
            .invert {
                filter: invert(1) !important
            }
            .accordion-button::after {
                position: absolute;
                content: "";
                height: 7px;
                width: 2px;
                background: white;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%)
            }
            .accordion-button::before {
                position: absolute;
                content: "";
                height: 7px;
                width: 2px;
                background: white;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) rotate(90deg)
            }
            .accordion-button:not(.collapsed)::after {
                position: absolute;
                content: "";
                height: 7px;
                width: 2px;
                background: white;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) rotate(90deg)
            }
            .accordion-button{
                padding: 7px 6px;
                position: relative;
                cursor: pointer;
            }
            .icon {
                margin-right: 10px !important
            }
            .linear-activity {
                overflow: hidden;
                width: 100%;
                height: 4px;
                background-color: #E6E7FC;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 11111111111 !important;
            }

            .determinate {
                position: relative;
                max-width: 100%;
                height: 100%;
                -webkit-transition: width 200ms ease-out .5s;
                -moz-transition: width 200ms ease-out .5s;
                    -o-transition: width 200ms ease-out .5s;
                        transition: width 200ms ease-out .5s;
                background-color: #757CF2;
            }

            .indeterminate {
                position: relative;
                width: 100%;
                height: 100%;
            }

            .indeterminate:before {
                content: '';
                position: absolute;
                height: 100%;
                background-color: #757CF2;
                animation: indeterminate_first .5s infinite ease-out;
            }

            .indeterminate:after {
                content: '';
                position: absolute;
                height: 100%;
                background-color: #757CF2;
                animation: indeterminate_second .5s infinite ease-in;
            }

            @keyframes indeterminate_first {
                0% {
                    left: -100%;
                    width: 100%;
                }
                100% {
                    left: 100%;
                    width: 10%;
                }
            }

            @keyframes indeterminate_second {
                0% {
                    left: -150%;
                    width: 100%;
                }
                100% {
                    left: 100%;
                    width: 10%;
                }
            }
        </style>         
    </head>
    

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

        
        <!-- Begin page -->
        <div class="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
                @include('admin.layouts.side-bar')
            <!--========== Left Sidebar End ========== -->

            <!--========== Start Page Content here ==========-->
                @yield('admin-content')
            <!--========== End Page content ==========-->

            <!--========== Start Page Footer ==========-->
                @include('admin.layouts.footer')
            <!--========== End Page Footer ==========-->

        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
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
        <!-- /End-bar -->

         

        <!-- bundle -->
        <script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/app.min.js') }}"></script>
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
        <script> FilePond.parse(document.body); </script>
        {{-- Push Scripts --}}
        @stack('custom-scripts')
       
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </body>
</html>
