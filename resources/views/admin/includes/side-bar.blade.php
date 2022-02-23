<div class="leftside-menu menuitem-active">
    
    <!-- LOGO -->
    <a href="#" class="logo text-center logo-light shadow-lg"  style="background:white !important">
        <span class="logo-lg font-weight-bold">
            <span class="page-title text-danger">
                {{-- <b>AEC</b> <span class="text-white">Prefab</span> --}}
                <img src="{{ asset('public/assets/images/admin/logo.png') }}" alt="AEC Prefab" width="150px">
            </span>
        </span>
        <span class="logo-sm font-weight-bold ">
            {{-- <b class="page-title text-danger" style="font-size: 15px">AEC</b> --}}
            <img src="{{ asset('public/assets/images/logo_sm.png') }}" alt="AEC Prefab" width="20px" style="filter: drop-shadow(2px 4px 6px #555555);">
        </span>
    </a>

    <!-- LOGO -->
    <a href="#" class="logo text-center logo-dark"  style="background:gray !important">
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
                    <i class="fa fa-tachometer-alt"></i>
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

            <li class="side-nav-item {{ Route::is(["view-enquiry","admin.enquiry-create"]) ? "menuitem-active" : ""}}">
                <a data-bs-toggle="collapse" href="#Sales" aria-expanded="false" aria-controls="Sales" class="side-nav-link">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    <span> Sales </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ Route::is("view-enquiry","admin.enquiry-create") ? "show" : ""}}" id="Sales">
                    <ul class="side-nav-second-level">
                        <li class="{{ Route::is("view-enquiry","admin.enquiry-create") ? "menuitem-active" : ""}}">
                            <a href="{{ route('admin.enquiry-list') }}">Enquiries</a>
                        </li>
                        <li class="{{ Route::is(["admin-documentary-view","admin.admin-documentary-view","admin.admin-documentary-view"]) ? "menuitem-active" : ""}}">
                            <a href="{{ route('admin-documentary-view') }}">Contract </a>
                        </li> 
                    </ul>
                </div>
                
            </li> 
 

            <li class="side-nav-item {{ Route::is("projects") ? "menuitem-active" : ""}}">
                <a href="{{ route('projects') }}" class="side-nav-link">
                    <i class="fa fa-layer-group" aria-hidden="true"></i>
                    <span> Projects </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-server" aria-hidden="true"></i>
                    <span> Projects Schedule </span>
                </a> 
            </li> 

            <li class="side-nav-item {{ Route::is(["admin-employee-control-view","admin.employee-add","admin.employeeEdit"]) ? "menuitem-active" : ""}}">
                <a data-bs-toggle="collapse" href="#Administration" aria-expanded="false" aria-controls="Administration" class="side-nav-link">
                    <i class="fa fa-fingerprint" aria-hidden="true"></i>
                    <span>Administration</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ Route::is(["admin-employee-control-view","admin.employee-add","admin.employeeEdit"]) ? "show" : ""}}" id="Administration">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('cost-estimation-single-view') }}">Cost Estimation</a>
                        </li>
                        <li>
                            <a href="{{ route('gantt-chart') }}">Gantt Chart</a>
                        </li>
                        <li class="{{ Route::is(["admin-employee-control-view","admin.employee-add","admin.employeeEdit"]) ? "menuitem-active" : ""}}">
                            <a href="{{ route('admin-employee-control-view') }}">Employee Control </a>
                        </li> 
                    </ul>
                </div>
            </li> 
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-tasks" aria-hidden="true"></i>
                    <span> Tasks </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-globe-americas" aria-hidden="true"></i>
                    <span> Economy </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-address-book" aria-hidden="true"></i>
                    <span> Customer Details </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-users-cog" aria-hidden="true"></i>
                    <span> Supplier Details </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-calendar-check" aria-hidden="true"></i>
                    <span> Calendar </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="{{ route('admin-settings') }}" class="side-nav-link">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span> Setup </span>
                </a> 
            </li> 
        </ul>
 
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div> 