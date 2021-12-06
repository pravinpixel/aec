<div class="leftside-menu">
    
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg font-weight-bold">
            <span class="page-title text-danger" style="font-size: 20px"><b>AEC</b> <span class="text-white">Prefab</span></span>
        </span>
        <span class="logo-sm font-weight-bold">
            <b class="page-title text-danger" style="font-size: 15px">AEC</b>
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg font-weight-bold">
            <span class="page-title text-danger" style="font-size: 20px"><b>AEC</b> <span class="text-white">Prefab</span>
            <br>
            <span class="badge bg-succes">Customer</span>
        </span>
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
                <a href="{{ route('admin-dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a> 
            </li>
            
            <li class="side-nav-title side-nav-item mt-1">Sales</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps" class="side-nav-link">
                    <i class="uil-location-point"></i>
                    <span> Enquiries </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMaps">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin-view-sales-enquiries') }}">View Enquiries</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-create-sales-enquiries') }}">Create Enquiry</a>
                        </li>
                    </ul>
                </div>
            </li> 

            <li class="side-nav-title side-nav-item mt-1">Estimation</li>
  
            <li class="side-nav-item ">
                <a data-bs-toggle="collapse" href="#sidebarMapxs" aria-expanded="false" aria-controls="sidebarMapxs" class="side-nav-link">
                    <i class="uil-location-point"></i>
                    <span> Estimation </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMapxs">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin-estimation-view') }}">View Estimation</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-estimation-single-view') }}">Single Estimation</a>
                        </li>
                    </ul>
                </div>
                
            </li> 

            <li class="side-nav-item ">
                <a data-bs-toggle="collapse" href="#costestimate" aria-expanded="false" aria-controls="costestimate" class="side-nav-link">
                    <i class="uil-location-point"></i>
                    <span>Cost Estimation </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="costestimate">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin-cost-estimation-view') }}">View Cost Estimation</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-cost-estimation-single-view') }}">Single Cost Estimation</a>
                        </li>
                    </ul>
                </div>
            </li> 

            <li class="side-nav-title side-nav-item mt-1">Admin Flow</li>
  
            <li class="side-nav-item ">
                <a href="{{ route('proposal-conversation') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Proposal Conversation </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="{{ route('gran-chart') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span>Gantt Chart </span>
                </a> 
            </li>
        </ul>
 
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>

{{-- <style>
    .menuitem-active .collapse {
        display: block !important
    }
</style> --}}