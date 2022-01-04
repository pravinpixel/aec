<div class="leftside-menu">
    
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light shadow-lg"  style="background:white !important">
        <span class="logo-lg font-weight-bold">
            <span class="page-title text-danger">
                <img src="{{ asset('public/assets/images/customer/logo.png') }}" alt="AEC Prefab" width="150px">
            </span>
        </span>
        <span class="logo-sm font-weight-bold ">
            <img src="{{ asset('public/assets/images/logo_sm.png') }}" alt="AEC Prefab" width="20px" style="filter: drop-shadow(2px 4px 6px #555555);">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark"  style="background:gray !important">
        <span class="logo-lg font-weight-bold">
            <span class="page-title text-danger">
                <img src="{{ asset('public/assets/images/logo_customer.png') }}" alt="AEC Prefab" width="100px" style="filter: drop-shadow(2px 4px 6px #555555);">
            </span>
        </span>
        <span class="logo-sm font-weight-bold ">
            <img src="{{ asset('public/assets/images/logo_sm.png') }}" alt="AEC Prefab" width="20px"  style="filter: drop-shadow(2px 4px 6px #555555);">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav py-3"> 
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#Dashboard" aria-expanded="false" aria-controls="Dashboard" class="side-nav-link">
                    <i class="fa fa-tachometer-alt" aria-hidden="true"></i>
                    <span> Dashboard </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="Dashboard">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('customers-dashboard') }}">Enquiries</a>
                        </li>
                        <li>
                            <a href="#">Project</a>
                        </li>
                        <li>
                            <a href="#">Economy</a>
                        </li>
                         
                    </ul>
                </div>
            </li> 
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#Sales" aria-expanded="false" aria-controls="Sales" class="side-nav-link">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    <span> Sales </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="Sales">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('customers.create-enquiry') }}">Create enquiry</a>
                        </li>
                        <li >
                            <a href="{{ route('customers-my-enquiries') }}" >Enquiries</a>
                        </li> 
                    </ul>
                </div>
            </li> 
            <li class="side-nav-item ">
                <a href="{{ route('customers-my-projects') }}" class="side-nav-link">
                    <i class="fa fa-layer-group" aria-hidden="true"></i>
                    <span> Projects </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-server" aria-hidden="true"></i>
                    <span>  Projects Schedule  </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-tasks" aria-hidden="true"></i>
                    <span> Tasks </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
                    <i class="fa fa-calendar-check" aria-hidden="true"></i>
                    <span> Calender </span>
                </a> 
            </li>
            <li class="side-nav-item ">
                <a href="#" class="side-nav-link">
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