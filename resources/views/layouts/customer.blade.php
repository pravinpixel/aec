
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
        @include('customer.enquiry.models.view-proposal-modal')
        @include('customer.includes.footer-scripts')
        <script src="{{ asset('public/assets/js/cdns/admin/highcharts.js') }}"></script>
        <script src="{{ asset('public/assets/js/cdns/admin/highcharts-more.js') }}"></script>

        <div class="modal fade" id="EnquiryQuickViewPopUp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
            <div class="modal-dialog modal-xl modal-right w-100">
                <div class="modal-content h-100 p-0" style="overflow: auto"> 
                    <div id="EnquiryQuickViewPopUpContent"></div> 
                </div>
            </div>
        </div>
        
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
        <script src="{{ asset('public/assets/js/file-viewer.js') }}"></script> 
        <script src="{{ asset('public/assets/js/light-box.js') }}"></script> 
        @include('common.firbase-setup')
    </body>
</html>