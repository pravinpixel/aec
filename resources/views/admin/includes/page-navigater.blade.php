<div class="row ">
    <div class="col-12">
        <div class="page-title-box mt-3">
            <div class="page-title-right mt-0">
                <ol class="breadcrumb align-items-center m-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route("admin-dashboard") }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">
                        @if (Route::is('admin-dashboard')) Admin Dashboard @endif
                        @if (Route::is('admin.enquiry-list')) List Of Enquiries @endif
                        @if (Route::is('view-enquiry')) Enquiries detail @endif
                        @if (Route::is('admin.enquiry-create')) @lang('menu_module.customer_intro')  @endif
                        @if (Route::is('admin-estimation-view')) List of Estimation's @endif
                        @if (Route::is('admin-estimation-single-view')) Estimation View @endif
                        @if (Route::is('admin-cost-estimation-view')) List of Cost Estimation's  @endif
                        @if (Route::is('cost-estimation-single-view'))Estimation Calculation View @endif
                        @if (Route::is('proposal-conversation')) Proposal Conversation @endif
                        @if (Route::is('gantt-chart')) Gantt Chart @endif
                        @if (Route::is('admin-settings')) Setup @endif
                        @if (Route::is('admin-employee-control-view')) List of Employee @endif
                        @if (Route::is('admin.employee-add')) Create Employee @endif
                        @if (Route::is('admin.employeeEdit')) Edit Employee @endif 
                        @if (Route::is('admin-documentary-view')) Document @endif 
                        @if (Route::is('admin.add-documentary')) Document Library @endif
                        @if (Route::is('list-projects')) List Projects @endif                
                        @if (Route::is('create-projects')) Create Projects @endif                
                    </li>
                    @if (Route::is('view-enquiry')) 
                        <li class="breadcrumb-item">
                            <a href="{{ route("admin-dashboard") }}">Overview</a>
                        </li>
                    @endif 
                    <li class="breadcrumb- ms-2">
                        <i type="button" onclick="goBack()" class="mdi mdi-backspace text-danger fa-2x"></i> 
                    </li>
                </ol>
            </div>
            <h4 class="page-title">
                @if (Route::is('admin-dashboard')) Admin Dashboard @endif
                @if (Route::is('admin.enquiry-list')) List Of Enquiries @endif
                @if (Route::is('view-enquiry')) Enquiries detail @endif
                @if (Route::is('admin.enquiry-create')) @lang('menu_module.customer_intro')  @endif
                @if (Route::is('admin-estimation-view')) List of Estimation's @endif
                @if (Route::is('admin-estimation-single-view')) Estimation View @endif
                @if (Route::is('admin-cost-estimation-view')) List of Cost Estimation's  @endif
                @if (Route::is('cost-estimation-single-view')) Estimation Calculation View @endif
                @if (Route::is('proposal-conversation')) Proposal Conversation @endif
                @if (Route::is('gantt-chart')) Gantt Chart @endif
                @if (Route::is('admin-settings')) Setup @endif
                @if (Route::is('admin-employee-control-view')) List of Employee @endif
                @if (Route::is('admin.employee-add')) Create Employee @endif
                @if (Route::is('admin.employeeEdit')) Edit Employee @endif
                @if (Route::is('admin-documentary-view')) Document @endif
                @if (Route::is('admin.add-documentary'))  Document Library @endif
                @if (Route::is('list-projects')) List Projects @endif                
                @if (Route::is('create-projects')) Create Projects @endif                   
            </h4>
        </div>
    </div>
</div>
@include('flash::message')