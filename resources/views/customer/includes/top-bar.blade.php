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
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                @if ((count(getNotificationMessages()) != 0))
                    <span class="position-relative"> 
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ count(getNotificationMessages()) }}
                        </span>
                    </span>
                @endif 
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">
                <div class="dropdown-item noti-title">
                    <h5 class="m-0"> 
                        Notification
                    </h5>
                </div>
                <div class="list-group">
                    @if ((count(getNotificationMessages()) != 0))
                        @foreach (getNotificationMessages()->take(10) as $msg)
                            <a href="javascript:void(0);" onclick="EnquiryQuickView('{{ $msg->module_id }}' , this)" class="list-group-item list-group-item-action p-2">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <img src="https://cdn-icons-png.flaticon.com/512/547/547133.png" width="25px" alt="">
                                    </div>
                                    <div class="w-100 px-2">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                {{ ucfirst($msg->message) }} 
                                            </div>
                                            <div>
                                                <button type="button" class="btn-quick-view " onclick="EnquiryQuickView('{{ $msg->module_id }}' , this)">
                                                    <b>{{ getEnquiryBtId($msg->module_id)->enquiry_number }}</b> 
                                                </button>
                                            </div>
                                        </div>
                                        <div><small class="text-muted"><small class="text-dark">{{ $msg->created_at->diffForHumans() }}</small> <br> Aec Prefab Support Team</small></div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        @else
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="text-center">There is no new notification.!</div>
                        </a>
                    @endif  
                </div> 
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
    
</div> 