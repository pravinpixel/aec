
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
        @stack('custom-scripts')
       
        <script>
            function goBack() {
                window.history.back();
            } 
            
            getTimeStamp = (event) => {
                for (const iterator of event.parentNode.childNodes) {
                    if(iterator.nodeName == 'SMALL') {
                        iterator.innerHTML = ` <b>last update</b> - <small >${moment(new Date()).format('Y-m-d h:m:s')}</small>`
                    }
                }
            }
        </script>  
    </body>
</html>
