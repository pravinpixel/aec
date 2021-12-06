<div class="leftside-menu">
    
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg font-weight-bold">
            <span class="page-title text-danger" style="font-size: 20px"><b>AEC</b> <span class="text-white">Prefab</span></span>
        </span>
        <span class="logo-sm font-weight-bold ">
            <b class="page-title text-danger" style="font-size: 15px">AEC</b>
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg font-weight-bold">
            <span class="page-title text-danger" style="font-size: 20px"><b>AEC</b> <span class="text-dark">Prefab</span></span>
        </span>
        <span class="logo-sm font-weight-bold">
            <b class="page-title text-danger" style="font-size: 15px">AEC</b>
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item ">
                <a href="{{ route('customers-dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a> 
            </li>
  
            <li class="side-nav-title side-nav-item mt-1">Services</li>
  
            <li class="side-nav-item menuitem-active">
                <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps" class="side-nav-link">
                    <i class="uil-location-point"></i>
                    <span> Enquiries </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMaps">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('customers-my-enquiries') }}">My Enquiries</a>
                        </li>
                        <li>
                            <a href="{{ route('customers-create-enquiries') }}">Create Enquiry</a>
                        </li>
                    </ul>
                </div>
            </li> 

        </ul>
 
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>