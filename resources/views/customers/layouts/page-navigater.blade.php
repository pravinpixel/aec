<div class="row ">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb align-items-center m-0 m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">AEC Prefab</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">
                        @if (Route::is('customers-my-enquiries')) My Enquiries @endif
                        @if (Route::is('customers-create-enquiries')) Create Enquiries @endif
                    </li>
                    <li class="breadcrumb- ms-2">
                        <i type="button" onclick="goBack()" class="mdi mdi-backspace text-danger fa-2x"></i> 
                    </li>
                </ol>
            </div>
            <h4 class="page-title">
                @if (Route::is('customers-dashboard')) Dashboard @endif
                @if (Route::is('customers-my-enquiries')) My Enquiries @endif
                @if (Route::is('customers-create-enquiries')) Create Enquiries @endif
            </h4>
        </div>
    </div>
</div>
 