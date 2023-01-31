
<!DOCTYPE html>
<html lang="en">
    
    <head>
        @include('admin.includes.head')
        @stack('live-project-custom-styles')
    </head> 
    <body>
        <ul class="notifications"></ul>
        <!-- Begin page -->
        <div class="wrapper"> 
            <!-- ========== Left Sidebar Start ========== -->
                @include('admin.includes.side-bar')
            <!--========== Left Sidebar End ========== -->
            <!--========== Start Page Content here ==========-->
                <div class="main-content-rapper" >
                    <div class="content-page">
                        @include('admin.includes.top-bar')
                        @yield('admin-content')
                    </div>
            </div>
            <!--========== End Page content ==========-->

            <!--========== Start Page Footer ==========-->
                @include('admin.includes.footer')
            <!--========== End Page Footer ==========-->
        </div>
        <script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/app.js') }}"></script>
        <script src="{{ asset('public/assets/js/custom.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('public/custom/js/ngControllers/alerts.js') }}"></script>
        <script>
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    cancelButton: 'btn btn-light border',
                    confirmButton: 'btn btn-danger ms-2'
                },
                buttonsStyling: false
            })
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
        </script>
        @stack('live-project-custom-scripts')
        @if (session()->get('success'))<script>Alert.success("{{ session()->get('success') }}")</script>@endif
        @if (session()->get('danger'))<script>Alert.danger("{{ session()->get('danger') }}")</script>@endif
    </body>
</html>