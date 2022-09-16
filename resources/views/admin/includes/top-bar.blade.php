<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">
        <li class="notification-list">
            <a class="nav-link end-bar-toggle"  title="background process" href="{{ url('/jobs') }}">
                <i class="dripicons-calendar noti-icon"></i>
            </a>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                <span class="noti-icon-badge"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-end">
                            <a href="javascript: void(0);" class="text-dark">
                                <small>Clear All</small>
                            </a>
                        </span>Notification
                    </h5>
                </div>

                <div style="max-height: 230px;" data-simplebar>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="text-center">There is no new notification.!</div>
                    </a>
                </div>
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                    View All
                </a>
            </div>
        </li>

        @if(userHasAccess('gantt_chart_index') || userHasAccess('cost_estimate_calculation_index'))
            <li class="dropdown notification-list d-none d-sm-inline-block">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-view-apps noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                    <div class="p-2 shadow-sm border">
                        
                        <div class="row g-0 p-0 m-0">
                            @if(userHasAccess('gantt_chart_index'))
                                <div class="col p-2">
                                    <a class="dropdown-icon-item" href="{{ route('admin-gantt-chart-single-view') }}">
                                        <img src="{{ asset('public/assets/images/gantt-chart.png') }}" alt="slack">
                                        <span>Gantt chart</span>
                                    </a>
                                </div>
                            @endif
                            @if(userHasAccess('cost_estimate_calculation_index'))
                                <div class="col p-2">
                                    <a class="dropdown-icon-item" href="{{ route('enquiry.calculate-cost-estimation') }}">
                                        <img src="{{ asset('public/assets/images/calculator.png') }}" alt="slack">
                                        <span>Calculator</span>
                                    </a>
                                </div>
                            @endif
                            {{-- <div class="col p-2">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ asset('public/assets/images/brands/g-suite.png') }}" alt="G Suite">
                                    <span>E search</span>
                                </a>
                            </div> --}}
                        </div> <!-- end row-->
                    </div>
                    
                </div>
            </li>
        @endif

        <li class="notification-list">
            <a class="nav-link end-bar-toggle" href="{{ route('setup.roles') }}">
                <i class="dripicons-gear noti-icon"></i>
            </a>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0 d-flex align-items-center justify-content-between" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span class="account-user-avatar"> 
                    <img src="{{ Admin()->image }}" alt="user-image" style="object-fit: cover" class="rounded-circle">
                </span>
                <span class="account-user-name text-capitalize">{{ Admin()->full_name ?? 'Avatar' }}</span>
                <i class="bi bi-chevron-down ms-2"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <a href="{{ route('admin.my-account') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle me-1"></i>
                    <span>My Account</span>
                </a>
                <a href="javascript:void(0);" class="dropdown-item notify-item"  onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>
    </ul>
    <form id="admin-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
</div>