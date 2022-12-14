
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
         <script>
            window.onload = () => {
                var password         = document.querySelector('input[validate-password]')
                var confirm_password = document.querySelector('input[validate-confirm-password]')
                removeErrorMessage = (element) => {
                    Object.entries(element.target.offsetParent.childNodes).map(item => {
                        if(item[1]['localName'] == 'small') {
                            item[1].remove()
                        }
                    })
                }
                createMessage = (element,type,message) => {
                    const small = document.createElement("small");
                    small.innerText = message;
                    small.classList.add(type == 'error' ? 'validation-message' : 'success-message')
                    element.target.offsetParent.appendChild(small);
                    element.target.offsetParent.classList.add('position-relative')
                }
                password.addEventListener('keyup', (element) => {
                    var password        = element.target.value;
                    if(password.length > 12) {
                        element.target.value = password.slice(0, 12)
                        removeErrorMessage(element)
                        createMessage(element,"error","Password Max Length 12 Characters")
                        setTimeout(() => {
                            removeErrorMessage(element)
                        }, 1000);
                    }
                    if(password.length < 7) {
                        removeErrorMessage(element)
                        createMessage(element,"error","Password Must have a 8 Characters")
                    }
                    if(password.length > 7 && password.length < 12 ) {
                        removeErrorMessage(element)
                    }
                })
                confirm_password.addEventListener('keyup',(element) => {
                    if(element.target.value == password.value) {
                        removeErrorMessage(element)
                        createMessage(element,"success","Password Matched")
                        setTimeout(() => {
                            removeErrorMessage(element)
                        }, 1000);
                    } else {
                        removeErrorMessage(element)
                        createMessage(element,"error","Password Does not Match")
                    }
                })
            }
        </script>
        <script src="{{ asset('public/assets/js/file-viewer.js') }}"></script>
        <script src="{{ asset('public/assets/js/light-box.js') }}"></script>
        @include('common.firbase-setup')
    </body>
</html>
