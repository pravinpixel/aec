
<!DOCTYPE html>
<html lang="en">
    
    <head>
        @include('customer.includes.head')
        
        @stack('custom-styles')

    </head>

    <body ng-app="App">
        
        {{-- ======= Alert Part ========== --}}
            <div class="alert-container" id="alert"></div>
        {{-- ======= Alert Part ========== --}}

        {{--===========  AJAX LOADER ======== --}}
            <div data-loading></div>
        {{--===========  AJAX LOADER ======== --}}

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
        @include('modal.delete');
        @include('customer.includes.footer-scripts')
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <div class="modal fade" id="EnquiryQuickViewPopUp" tabindex="-1" aria-labelledby="EnquiryQuickViewPopUpLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-right w-100">
                <div class="modal-header">
                    <h5 class="modal-title" id="EnquiryQuickViewPopUpLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-content h-100 p-4" style="overflow: auto"> 
                    <div id="EnquiryQuickViewPopUpContent"></div> 
                </div>
            </div>
        </div>
        <script src="{{ asset('public/assets/js/file-viewer.js') }}"></script> 
        @stack('custom-scripts')
       
        <script>
            function goBack() {
                window.history.back();
            } 
            getTimeStamp = (event) => {
                for (const iterator of event.parentNode.childNodes) {
                    if(iterator.nodeName == 'SMALL') {
                        iterator.innerHTML = ` <b>last update</b> - <small >${moment(new Date()).format('DD-MM-YY / hh:mm A')}</small>`
                    }
                }
            }
        </script>
    </body>
</html>