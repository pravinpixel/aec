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
        <ul class="side-nav pt-3">
 
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#dashboard" aria-expanded="false" aria-controls="dashboard" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="dashboard">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin-dashboard') }}">Enquiries</a>
                        </li> 
                        <li>
                            <a href="{{ route('admin-project-dashboard') }}">Projects</a>
                        </li> 
                        <li>
                            <a href="#">Economy</a>
                        </li> 
                        <li>
                            <a href="#">Employee performance</a>
                        </li> 
                    </ul>
                </div>
            </li> 



            
            {{-- <li class="side-nav-title side-nav-item mt-1">Sales</li> --}}

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps" class="side-nav-link">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span> Sales </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMaps">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin-view-sales-enquiries') }}">Enquiries</a>
                        </li>
                        
                        <li>
                            <a href="{{ route('admin-create-sales-enquiries') }}">Contracts</a>
                        </li>
                    </ul>
                </div>
            </li> 
 

            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span> Projects </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span> Projects Schedule </span>
                </a> 
            </li> 

            <li class="side-nav-item ">
                <a data-bs-toggle="collapse" href="#costestimate" aria-expanded="false" aria-controls="costestimate" class="side-nav-link">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span>Administration</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="costestimate">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin-cost-estimation-view') }}">Cost Estimation</a>
                        </li>
                        <li>
                            <a href="{{ route('gantt-chart') }}">Gantt Chart</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-employee-control-view') }}">Employee Control</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.employee-add') }}">Add Employee</a>
                        </li>
                    </ul>
                </div>
            </li> 
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span> Tasks </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span> Economy </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span> Customer Details </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span> Supplier Details </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span> Calendar </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="{{ route('admin-settings') }}" class="side-nav-link">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span> Setup </span>
                </a> 
            </li> 
        </ul>
 
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div> 