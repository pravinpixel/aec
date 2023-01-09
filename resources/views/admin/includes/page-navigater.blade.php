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
                        @if (Route::is('view-enquiry')) Enquiry @endif
                        @if (Route::is('admin.enquiry-create')) @lang('menu_module.customer_intro')  @endif
                        @if (Route::is('admin-estimation-view')) List of Estimations @endif
                        @if (Route::is('admin-estimation-single-view')) Estimation View @endif
                        @if (Route::is('admin-cost-estimation-view')) List of Cost Estimation's  @endif
                        @if (Route::is('cost-estimation-single-view'))Estimation Calculation View @endif
                        @if (Route::is('calculate-cost-estimate'))Estimation Calculation View @endif
                        @if (Route::is('proposal-conversation')) Proposal Conversation @endif
                        @if (Route::is('gantt-chart')) Gantt Chart @endif
                        @if (Route::is('admin-settings')) Setup @endif
                        @if (Route::is('admin-employee-control-view')) Employees Details​ @endif
                        @if (Route::is('admin.employee-add')) Create Employee @endif
                        @if (Route::is('admin.employeeEdit')) Edit Employee @endif 
                        @if (Route::is('admin-documentary-view')) Document @endif 
                        @if (Route::is('admin.add-documentary')) Create Document  @endif
                        @if (Route::is('admin.documentaryEdit')) Edit Document @endif 
                        @if (Route::is('list-projects')) List Projects @endif                
                        @if (Route::is('create-projects')) Create Project @endif         
                        @if (Route::is('enquiry.calculate-cost-estimation')) Price Calculation @endif         
                        @if (Route::is('admin.customer.index')) List of Customers @endif         
                        @if (Route::is('admin.customer.edit')) Edit Customer @endif  
                        @if (Route::is('live-projects')) Live Projects @endif
                        @if (Route::is('admin.contract.view')) Contract View @endif
                        @if (Route::is(['edit-projects','live-projects-data']))
                            <span>
                                {{ session()->get('current_project')->reference_number }}
                                {{ session()->get('current_project')->project_name }}
                            </span>
                        @endif
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
                @if (Route::is('admin-employee-control-view')) Employees Details​ @endif
                @if (Route::is('admin.employee-add')) Create Employee @endif
                @if (Route::is('admin.employeeEdit')) Edit Employee @endif
                @if (Route::is('admin-documentary-view')) Document @endif
                @if (Route::is('admin.documentaryEdit')) Edit Document @endif 
                @if (Route::is('admin.add-documentary')) Create Document @endif
                @if (Route::is('list-projects')) List Projects @endif                
                @if (Route::is('create-projects')) Create Projects @endif               
                @if (Route::is('cost-estimate.show') || Route::is('cost-estimate.dashboard')) Cost Estimate @endif         
                @if (Route::is('admin.customer.index')) Customers @endif           
                @if (Route::is('admin.customer.edit')) Edit Customer @endif     
                @if (Route::is('live-projects')) Live Projects @endif     
                @if (Route::is('admin.contract.view')) Contract View @endif
                @if (Route::is(['edit-projects','live-projects-data']))
                    <span>
                        {{ session()->get('current_project')->reference_number }}
                        {{ session()->get('current_project')->project_name }}
                    </span>
                @endif
            </h4>
        </div>
    </div>
</div>
@include('flash::message')