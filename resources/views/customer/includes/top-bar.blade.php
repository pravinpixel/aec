<div class="navbar-custom d-flex justify-content-between align-items-center">
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
    <h1 class="text-center h3"> {{ Customer()->company_name ?? '' }}</h1>
    <ul class="list-unstyled topbar-menu float-end mb-0">
        <li class="dropdown notification-list d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                <form class="p-3">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                </form>
            </div>
        </li>
        <li class="dropdown notification-list topbar-dropdown">
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu">
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHcAAABWCAMAAADCF/krAAAAS1BMVEW6DC8AIFv///8AAEy8v8y2ABPv0dUAAEUAE1bw8vVmbo62ABr++/vBPEy5ACvgpK2yAADenqe+LT21AAr46euxtcQAGVhLVn3CxdD2K1KHAAAAoUlEQVRoge3Wyw6CQAxG4c6AgKgoF9H3f1I1ETcQ2gRCEzxnx+LPtxsqMt/pGt8d8/CtKD/f50ul7JaGi4uLi4uLi4uLi4uLu1P3MN+tnnSbVtlpSabUTblRW6lJtDRyF4e7kZtauieD2z+epoWWJKbCr9420JLgEy4u7gqu17vh9U56/Rdwt3G97jqvO9brbsfFxcXFxcXFxcXFxcX9S/cF4yk6Vej5ZroAAAAASUVORK5CYII=" alt="user-image" class="me-1" height="12"> <span class="align-middle">Norway</span>
                </a> 
            </div>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none" onclick="initFirebaseMessagingRegistration()" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                <span class="noti-icon-badge"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">
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
                    {{-- <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info">
                            <i class="mdi mdi-heart"></i>
                        </div>
                        <p class="notify-details">Carlos Crouch liked
                            <b>Admin</b>
                            <small class="text-muted">13 days ago</small>
                        </p>
                    </a> --}}
                </div>
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                    View All
                </a>
            </div>
        </li> 
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span class="account-user-avatar"> 
                    <i class="mdi mdi-account-circle" style="font-size: 25px"></i>
                </span>
                <span class="account-user-name pt-2">
                    {{ ucfirst(Customer()->first_name ?? Customer()->contact_person)  }}
                    {{ ucfirst(Customer()->last_name ?? '') }}
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <a href="{{ route('customers-profile') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account me-1"></i>
                    <span>Profile</span>
                </a> 
                <a href="{{ route('customer.changePassword') }}" class="dropdown-item notify-item">
                    <i class="fa fa-key me-1"></i>
                    <span>Change Password</span>
                </a> 
                <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="deactivateAccount()">
                    <i class="fa fa-window-close" aria-hidden="true"></i>
                    <span>Deactivate Account</span>
                </a>
                <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <form id="deactivate-form" action="{{ route('customer.deactivate-account') }}" method="POST" class="d-none">
        @csrf
    </form>
</div> 