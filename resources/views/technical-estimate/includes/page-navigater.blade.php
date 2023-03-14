<div class="row ">
    <div class="col-12">
        <div class="page-title-box mt-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0">
                @if (Route::is('technical-estimate.show') || Route::is('technical-estimate.dashboard'))
                    <b>Technical Estimate</b>
                @endif
            </h5>
            <div class="page-title-right mt-0">
                <ol class="breadcrumb align-items-center m-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('technical-estimate.dashboard') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">
                        @if (Route::is('technical-estimate.show') || Route::is('technical-estimate.dashboard'))
                            Technical Estimate
                        @endif
                    </li>
                    @if (Route::is('view-enquiry'))
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin-dashboard') }}">Overview</a>
                        </li>
                    @endif
                    <li class="breadcrumb- ms-2">
                        <i type="button" onclick="goBack()" class="mdi mdi-backspace text-danger fa-2x"></i>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@include('flash::message')
