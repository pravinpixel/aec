<?php
include 'menu.php';
include 'master.php';
include 'adminAPI.php';
include 'master.php';
include 'customer.php';
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\EnquiryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CostEstimationController;
use App\Http\Controllers\Admin\GanttChartController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});




/** ===== Admin Routes ======*/
    
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect(route('admin-login'));
    });

    Route::get('/settings', function () {
        return  view('admin.settings');
    })->name('admin-settings');

    Route::get('/login', function () {
        return view('auth.admin.login');
    })->name('admin-login');

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin-dashboard');

    

    Route::get('/project-dashboard', function () {
        return view('admin.project-dashboard');
    })->name('admin-project-dashboard');

    Route::get('/sales-view-enquiries', function () {
        return view('admin.pages.view-sales-enquiries');
    })->name('admin-view-sales-enquiries');         

    // Enquiry Wiz
        Route::get('/admin-enquiry', function () {
            return view('admin.pages.enqiry-wiz.enquiry');
        })->name('admin-enquiry-wiz');

        Route::get('/admin-project-info', function () {
            return view('admin.pages.enqiry-wiz.project-info');
        })->name('admin-project-info-wiz');

        Route::get('/admin-Technical_Estimate', function () {
            return view('admin.pages.enqiry-wiz.Technical_Estimate');
        })->name('admin-Technical_Estimate-wiz');

        Route::get('/admin-Cost_Estimate', function () {
            return view('admin.pages.enqiry-wiz.Cost_Estimate');
        })->name('admin-Cost_Estimate-wiz');

        Route::get('/admin-Project_Schedule', function () {
            return view('admin.pages.enqiry-wiz.Project_Schedule');
        })->name('admin-Project_Schedule-wiz');

        Route::get('/admin-Proposal_Sharing', function () {
            return view('admin.pages.enqiry-wiz.Proposal_Sharing');
        })->name('admin-Proposal_Sharing-wiz');

        Route::get('/admin-Project_Award', function () {
            return view('admin.pages.enqiry-wiz.Project_Award');
        })->name('admin-Project_Award-wiz');
        
        Route::get('/admin-Delivery', function () {
            return view('admin.pages.enqiry-wiz.Delivery');
        })->name('admin-Delivery-wiz');

        
    // wiz Enquiry Wiz

  

    Route::get('sales-view-enquiry/{id?}', [EnquiryController::class,'singleIndexPage'])->name("view-enquiry");
    
    // Route::get('sales-view-enquiry', [EnquiryController::class,'singleIndexPage']);

    Route::get('/quotation', function () {
        return view('admin.pages.quotation'); 
    })->name('quotation');

    

    Route::get('/sales-create-enquiries', function () {
        return view("admin.pages.create-sales-enquiries");
    })->name('admin-create-sales-enquiries');


    Route::get('/estimation-view', function () {
        return view('admin.pages.estimation-view');
    })->name('admin-estimation-view');

    Route::get('/admin-estimation-single-view', function () {
        return view('admin.pages.admin-estimation-single-view');
    })->name('admin-estimation-single-view');

    Route::get('/admin-cost-estimation-view', function () {
        return view('admin.pages.cost-estimation-view');
    })->name('admin-cost-estimation-view');
    
    // Route::get('/cost-estimation-single-view', function () {
    //     // return view('admin.pages.admin-cost-estimation-single-view');
    // })->name('admin-cost-estimation-single-view');
    Route::get('/admin-cost-estimation-single-view', [CostEstimationController::class,'cost_estimation_single_view'])->name('cost-estimation-single-view');
    Route::get('/admin-gantt-chart-single-view', [GanttChartController::class,'gantt_chart_single_view'])->name('admin-gantt-chart-single-view');
    Route::get('/admin-employee-control-view', [EmployeeController::class,'employee_control_view'])->name('admin-employee-control-view');

    Route::get('/proposal-conversation', function () {
        return view('admin.pages.proposal-conversation');
    })->name('proposal-conversation');
    
    // Route::get('/admin-gantt-chart-single-view', [GanttChartController::class,'gantt_chart_single_view'])->name('admin-gantt-chart-single-view');

    Route::get('/gantt-chart',[GanttChartController::class,'gantt_chart_single_view'] )->name('gantt-chart');
    
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){ 
    Route::get('getEnquiryNumber', [EnquiryController::class,'getEnquiryNumber'])->name('getEnquiryNumber');;
    Route::resource('customer', CustomerController::class);
    Route::get('enquiry/get-number', [EnquiryController::class,'getEnquiryNumber'])->name('enquiry.get-number');
    Route::post('costEstimationSingleForm', [CostEstimationController::class,'costEstimationSingleForm'])->name('costEstimationSingleForm');
    Route::get('costEstimationEdit', [CostEstimationController::class,'costEstimationEdit'])->name('costEstimationEdit');
    Route::get('estimate/list', [CostEstimationController::class, 'getEstimate'])->name('estimate.list');
    Route::get('costEstimationDelete', [CostEstimationController::class,'costEstimationDelete'])->name('costEstimationDelete');
    Route::resource('enquiry', EnquiryController::class);
   
    Route::post('ganttChartForm', [GanttChartController::class,'ganttChartForm'])->name('ganttChartForm');
    Route::get('ganttChart/list', [GanttChartController::class, 'ganttChart'])->name('ganttChart.list');
    Route::post('ganttChart/list/task', [GanttChartController::class, 'createGanttChart'])->name('ganttChart.list.task');
    Route::put('ganttChart/list/task/{id}', [GanttChartController::class, 'updateGanttChart'])->name('ganttChart.list.task');
    Route::delete('ganttChart/list/task/{id}', [GanttChartController::class, 'deleteGanttChart'])->name('ganttChart.list.task');
    Route::get('ganttChartEdit', [GanttChartController::class, 'ganttChartEdit'])->name('ganttChartEdit');
    Route::get('ganttChartDelete', [GanttChartController::class, 'ganttChartDelete'])->name('ganttChartDelete');

    Route::post('add_role', [EmployeeController::class, 'add_role'])->name('add_role');
    Route::post('update_role/{id}', [EmployeeController::class, 'update_role'])->name('update_role');
    Route::get('get_role', [EmployeeController::class, 'get_role'])->name('get_role');
    // Route::get('get_role', [EmployeeController::class, 'get_role'])->name('get_role');
    Route::put('status/{id}', [EmployeeController::class, 'status'])->name('status');
    Route::get('edit_role/{id}', [EmployeeController::class, 'edit_role'])->name('edit_role');
    Route::delete('delete_role/{id}', [EmployeeController::class, 'delete_role'])->name('delete_role');

    Route::get('employee_role', [EmployeeController::class, 'employee_role'])->name('employee_role');
    Route::get('employee_add', [EmployeeController::class, 'employee_add'])->name('employee-add');
    Route::post('add_employee', [EmployeeController::class, 'add_employee'])->name('add_employee');
    Route::get('getEmployeeId', [EmployeeController::class, 'getEmployeeId'])->name('getEmployeeId');
    Route::get('get_employee', [EmployeeController::class, 'get_employee'])->name('get_employee');
    Route::delete('employee_delete/{id}', [EmployeeController::class, 'employee_delete'])->name('employee_delete');
    Route::get('employeeEdit/{id}', [EmployeeController::class, 'employeeEdit'])->name('employeeEdit');
    Route::get('get_EditEmployee/{id}', [EmployeeController::class, 'get_EditEmployee'])->name('get_EditEmployee');
    
    Route::put('update_employee/{id}', [EmployeeController::class, 'update_employee'])->name('update_employee');

});
Route::get('customers/login',[ AuthController::class, 'getCustomerLogin'])->name('customers.login');
Route::post('customers/login',[ AuthController::class, 'postCustomerLogin'])->name('customers.login');
Route::post('customers/logout',[ AuthController::class, 'customerLogout'])->name('customers.logout');

/** ===== End : Customers Routes ======*/
