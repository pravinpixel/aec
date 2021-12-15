<div class="leftside-menu">
    
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light shadow-lg"  style="background:white !important">
        <span class="logo-lg font-weight-bold">
            <span class="page-title text-danger">
                {{-- <b>AEC</b> <span class="text-white">Prefab</span> --}}
                <img src="{{ asset('public/assets/images/logo_customer.png') }}" alt="AEC Prefab" width="150px">
            </span>
        </span>
        <span class="logo-sm font-weight-bold ">
            {{-- <b class="page-title text-danger" style="font-size: 15px">AEC</b> --}}
            <img src="{{ asset('public/assets/images/logo_sm.png') }}" alt="AEC Prefab" width="20px" style="filter: drop-shadow(2px 4px 6px #555555);">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark"  style="background:gray !important">
        <span class="logo-lg font-weight-bold">
            <span class="page-title text-danger">
                {{-- <b>AEC</b> <span class="text-white">Prefab</span> --}}
                <img src="{{ asset('public/assets/images/logo_customer.png') }}" alt="AEC Prefab" width="100px" style="filter: drop-shadow(2px 4px 6px #555555);">
            </span>
        </span>
        <span class="logo-sm font-weight-bold ">
            {{-- <b class="page-title text-danger" style="font-size: 15px">AEC</b> --}}
            <img src="{{ asset('public/assets/images/logo_sm.png') }}" alt="AEC Prefab" width="20px"  style="filter: drop-shadow(2px 4px 6px #555555);">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav py-3">

            <li class="side-nav-item ">
                <a href="{{ route('customers-dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a> 
            </li>
  
            <li class="side-nav-item @if(Route::is(['customers-my-enquiries','customers-create-enquiries'])) menuitem-active @endif ">
                <a  href="{{ route('customers-my-enquiries') }}" class="side-nav-link">
                    <i class="uil-suitcase-alt"></i>
                    <span>Enquiry </span>
                </a>
            </li> 

        </ul>
 
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>