<div class="row ">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb align-items-center m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">AEC Prefab</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">
                        @if (Route::is('admin-dashboard')) Admin Dashboard @endif
                        @if (Route::is('admin-view-sales-enquiries')) List Of Enquiries @endif
                        @if (Route::is('admin-create-sales-enquiries')) Create Sales Enquiries @endif
                        @if (Route::is('admin-estimation-view')) List of Estimation's @endif
                        @if (Route::is('admin-estimation-single-view')) Estimation View @endif
                        @if (Route::is('admin-cost-estimation-view')) List of Cost Estimation's  @endif
                        @if (Route::is('admin-cost-estimation-single-view'))Cost Estimation View @endif
                        @if (Route::is('proposal-conversation')) Proposal Conversation @endif
                        @if (Route::is('gran-chart')) Gran Chart @endif
                    </li>
                    <li class="breadcrumb- ms-2">
                        <i type="button" onclick="goBack()" class="mdi mdi-backspace text-danger fa-2x"></i> 
                    </li>
                </ol>
            </div>
            <h4 class="page-title">
                @if (Route::is('admin-dashboard')) Admin Dashboard @endif
                @if (Route::is('admin-view-sales-enquiries')) List Of Enquiries @endif
                @if (Route::is('admin-create-sales-enquiries')) Create Sales Enquiries @endif
                @if (Route::is('admin-estimation-view')) List of Estimation's @endif
                @if (Route::is('admin-estimation-single-view')) Estimation View @endif
                @if (Route::is('admin-cost-estimation-view')) List of Cost Estimation's  @endif
                @if (Route::is('admin-cost-estimation-single-view'))Cost Estimation View @endif
                @if (Route::is('proposal-conversation')) Proposal Conversation @endif
                @if (Route::is('gran-chart')) Gran Chart @endif

            </h4>
        </div>
    </div>
</div>
 