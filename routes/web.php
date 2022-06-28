<?php
include 'menu.php';
include 'master.php';
include 'adminAPI.php';
include 'master.php';
include 'customer.php';
include 'enquiry.php';
include 'bim.php';
include 'autodesk.php';
include 'project.php';
include 'sharepoint.php';
include 'template.php';
include 'cost-estimate.php';

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Enquiry\EnquiryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CostEstimationController;
use App\Http\Controllers\Admin\GanttChartController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\Master\ProjectTypeController;
use App\Http\Controllers\Admin\Master\DocumentTypeController;
use App\Http\Controllers\Admin\Master\LayerController;
use App\Http\Controllers\Admin\Master\DeliveryTypeController;
use App\Http\Controllers\Admin\Master\LayerTypeController;
use App\Http\Controllers\Admin\Master\ServiceController;
use App\Http\Controllers\Admin\Documentary\DocumentaryController;
use App\Http\Controllers\Admin\Master\RoleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthCustomerController;
use App\Http\Controllers\WebNotificationController;
use App\Http\Controllers\PushNotificationController;



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
    return redirect(route('login'));
});
 
/** ===== Admin Routes ======*/
    
Route::prefix('admin')->middleware('common')->group(function () {

    // ======== Auth========== 

    // Route::get('/', function () {
    //     return redirect(route('admin.login'));
    // });
    Route::get('/settings', function () {
        return  view('admin.settings');
    })->name('admin-settings');

    // Route::get('/login', function () {
    //     return view('auth.admin.login');
    // })->name('admin-login');

    // ======== Auth========== 

    // ======== Dashborads========== 

    Route::get('/dashboard', [DashboardController::class,'enquiryDashboard'])->name("admin-dashboard");
    Route::get('/project-dashboard', [DashboardController::class,'projectDashboard'])->name("admin-project-dashboard");
    Route::post('/allow-notification', [DashboardController::class,'allowNotification'])->name("admin.allow-notification");

  
    // ======== END: Dashborads========== 
  
 
     

    Route::get('/quotation', function () {
        return view('admin.pages.quotation'); 
    })->name('quotation');
 

    Route::get('/estimation-view', function () {
        return view('admin.pages.estimation-view');
    })->name('admin-estimation-view');
    
    Route::get('/admin-estimation-single-view', function () {
        return view('admin.pages.admin-estimation-single-view');
    })->name('admin-estimation-single-view');

    Route::get('/admin-cost-estimation-view', function () {
        return view('admin.pages.cost-estimation-view');
    })->name('admin-cost-estimation-view');

    Route::get('/admin-cost-estimation-single-view', [CostEstimationController::class,'cost_estimation_single_view'])->name('cost-estimation-single-view');
    Route::get('/admin-gantt-chart-single-view', [GanttChartController::class,'gantt_chart_single_view'])->name('admin-gantt-chart-single-view');
    Route::get('/admin-employee-control-view', [EmployeeController::class,'employee_control_view'])->name('admin-employee-control-view');
    Route::get('/admin-documentary-view', [DocumentaryController::class,'ContractView'])->name('admin-documentary-view');


    Route::get('/proposal-conversation', function () {
        return view('admin.pages.proposal-conversation');
    })->name('proposal-conversation');
     
    Route::get('/gantt-chart',[GanttChartController::class,'gantt_chart_single_view'] )->name('gantt-chart');
    
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){ 
    
    Route::get('add-documentary', [DocumentaryController::class, 'create'])->name('add-documentary');
    Route::get('documentary/enquirie',[DocumentaryController::class,'getEnquirie'])->name('documentary.enquirie');
    Route::get('documentary/customer',[DocumentaryController::class,'getCustomer'])->name('documentary.customer');
    Route::get('documentary/userData',[DocumentaryController::class,'getUserData'])->name('documentary.userData');
    Route::put('documentary/status/{id}', [DocumentaryController::class,'status'] )->name('documentary.status');
    Route::get('documentaryEdit/{id}', [DocumentaryController::class, 'documentaryEdit'])->name('documentaryEdit');
    Route::resource('documentary', DocumentaryController::class);
 
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){ 
    
    Route::get('customer/datatable', [CustomerController::class, 'datatable'])->name('customer.datable');
    Route::put('customer/{id}/status', [CustomerController::class, 'status'])->name('customer.status');
    Route::resource('customer', CustomerController::class);
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){ 

    Route::get('getEmployeeId', [EmployeeController::class, 'getEmployeeId'])->name('getEmployeeId');
    Route::post('add-employee', [EmployeeController::class, 'addEmployee'])->name('add-employee');
    Route::put('employee-status/{id}', [EmployeeController::class, 'employeeStatus'])->name('employee-status');
    Route::get('get-employee', [EmployeeController::class, 'getEmployee'])->name('get-employee');
    Route::get('get-editEmployee/{id}', [EmployeeController::class, 'getEditEmployee'])->name('get-editEmployee');
    Route::delete('employee-delete/{id}', [EmployeeController::class, 'employeeDelete'])->name('employee-delete');
    Route::get('get-employee-by-slug/{name}', [RoleController::class,'getRoleBySlug'])->name('get-employee-by-slug');
    Route::get('get-role-user/{id}',[RoleController::class,'getUserByRoleId'])->name('get-role-user');
    Route::get('employee-role', [EmployeeController::class, 'employeeRole'])->name('employee-role');
    
    Route::get('add-employee', [EmployeeController::class, 'employee_add'])->name('employee-add');
    Route::get('employeeEdit/{id}', [EmployeeController::class, 'employeeEdit'])->name('employeeEdit');
    Route::POST('update-employee/{id}', [EmployeeController::class, 'updateEmployee'])->name('update-employee');
    Route::get('employee-enquiry/{id}', [EmployeeController::class, 'employee_enquiry'])->name('employee-enquiry');
    Route::get('employee',[ EmployeeController::class,'employee'])->name('employee');

    Route::get('profile-info',[EmployeeController::class,'profileInfo'])->name('profile-info');

    Route::get('get-technicalestimate-employee',[EmployeeController::class,'getTechnicalEstimateEmployee'])->name('get-technicalestimate-employee');
    Route::get('get-costestimate-employee',[EmployeeController::class,'getCostEstimateEmployee'])->name('get-costestimate-employee');
    Route::get('get-delivery-manager',[EmployeeController::class,'getDeliveryManager'])->name('get-delivery-manager');
    // Route::get('share-ponit-access',[EmployeeController::class,'profileInfo'])->name('share-ponit-access');
    // Route::get('ibm-access',[EmployeeController::class,'profileInfo'])->name('ibm-access');

    // Route::get('profile-info',  function() {
    //     return view('admin.pages.employee.create.employee-add');
    // })->name('profile-info');
    Route::get('share-ponit-access',  function() {
        return view('admin.pages.employee.create.share-point-access');
    })->name('share-ponit-access');
    Route::get('ibm-access',  function() {
        return view('admin.pages.employee.create.ibm-access');
    })->name('ibm-access');


    //edit**********

    Route::get('edit-profile-information',  function() {
        return view('admin.pages.employee.edit.project-information');
    })->name('edit-profile-information');
    // Route::get('profile-info',[EmployeeController::class,'profileInfo'])->name('profile-info');

    Route::get('edit-share-ponit-access',  function() {
        return view('admin.pages.employee.edit.share-point-access');
    })->name('edit-share-ponit-access');
    Route::get('edit-ibm-access',  function() {
        return view('admin.pages.employee.edit.ibm-access');
    })->name('edit-ibm-access');
    
    
    Route::get('get-share-point-acess',[ EmployeeController::class,'sharePointAcess'])->name('get-share-point-acess');
    Route::get('get-share-point-acess/{id}',[ EmployeeController::class,'sharePointAcessId'])->name('get-share-point-acess');

    
    Route::get('get-edit-share-point-acess',[ EmployeeController::class,'sharePointAcess'])->name('get-edit-share-point-acess');
    Route::post('share-point-acess-status',[ EmployeeController::class,'sharePointStatus'])->name('share-point-acess-status');
   
    Route::post('employee-bim-access-status',[ EmployeeController::class,'employeeBIMStatus'])->name('employee-bim-access-status');
    Route::post('employee-share-point-access-status',[ EmployeeController::class,'employeeSharePointAccessStatus'])->name('employee-share-point-access-status');

    
    Route::get('get-employee-detail/{id}',[ EmployeeController::class,'getEmployeeDetail'])->name('get-employee-detail');
    Route::get('employee-mail/{id}',[ EmployeeController::class,'employeeMail'])->name('employee-mail');
    Route::get('get-employeeData',[ EmployeeController::class,'getEmployeeData'])->name('get-employeeData');

    Route::get('delete-employeeImage',[ EmployeeController::class,'deleteEmployeeImage'])->name('delete-employeeImage');
   
});
 

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=> 'admin'], function(){ 
    
    Route::get('getEnquiryNumber', [EnquiryController::class,'getEnquiryNumber'])->name('getEnquiryNumber');
    Route::resource('customer', CustomerController::class);
    Route::get('enquiry/get-number', [EnquiryController::class,'getEnquiryNumber'])->name('enquiry.get-number');
    Route::resource('enquiry', EnquiryController::class);
    Route::get('deleteRowData', [CostEstimationController::class,'deleteRowData'])->name('deleteRowData');
    Route::get('masterCalculation', [CostEstimationController::class, 'masterCalculation'])->name('masterCalculation');
    Route::get('costMasterVal', [CostEstimationController::class, 'costMasterVal'])->name('costMasterVal');
    Route::delete('col-delete', [CostEstimationController::class, 'colDelete'])->name('col-delete');
    Route::get('/ganttChart/list', [GanttChartController::class, 'ganttChart'])->name('ganttChart.list');
    Route::post('/ganttChart/list/task', [GanttChartController::class, 'storeData'])->name('ganttChart.list.task');
    Route::put('/ganttChart/list/task/{id}', [GanttChartController::class, 'updateGanttChart'])->name('ganttChart.list.task');
    Route::delete('/ganttChart/list/task/{id}', [GanttChartController::class, 'deleteGanttChart'])->name('ganttChart.list.task');

    Route::post('data/task',[ GanttChartController::class, 'index'])->name('data.task');

    Route::get('getMasterCalculation', [CostEstimationController::class, 'getMasterCalculation'])->name('getMasterCalculation');
    Route::get('deleteTableData', [CostEstimationController::class,'deleteTableData'])->name('deleteTableData');
     
});


Route::get('admin/calculate-cost-estimation', function () {
    return view('admin.calculate-cost-estimate.calculation');
})->middleware('common')->name('enquiry.calculate-cost-estimation');

//Calculator
Route::group(['prefix' => 'admin/calculate-cost-estimate', 'as' => 'admin.calculate-cost-estimate.', 'middleware'=> 'common'], function(){
    Route::post('costEstimationSingleForm', [CostEstimationController::class,'costEstimationSingleForm'])->name('costEstimationSingleForm');
    Route::get('costEstimationEdit', [CostEstimationController::class,'costEstimationEdit'])->name('costEstimationEdit');
    Route::get('estimate/list', [CostEstimationController::class, 'getEstimate'])->name('estimate.list');
    Route::get('costEstimationDelete', [CostEstimationController::class,'costEstimationDelete'])->name('costEstimationDelete');

    Route::get('/{type}/list', [CostEstimationController::class, 'index'])->name('list');
    Route::post('store', [CostEstimationController::class,'store'])->name('store');
    Route::post('update/{id}', [CostEstimationController::class,'update'])->name('update');
    // Route::get('edit', [CostEstimationController::class,'edit'])->name('edit');
    Route::post('delete/{id}/{type}', [CostEstimationController::class,'delete'])->name('delete');
});

/** ===== Start : Customers Routes ======*/

Route::get('/customers', function () {return redirect(route('login'));});
Route::get('/customer', function () {return redirect(route('login'));});
Route::get('customers/change-password',[ AuthController::class, 'changePasswordGet'])->name('customer.changePassword');
Route::post('customers/change-password',[ AuthController::class, 'changePasswordPost'])->name('customer.changePassword');

/** ===== End : Customers Routes ======*/
/**
 * admin route
 */
/** Job event */
 Route::prefix('jobs')->group(function () {
    Route::queueMonitor();
});

Route::get('getversion',[EnquiryController::class,'getVersion']);

Route::post('/store-token', [WebNotificationController::class, 'storeToken'])->name('store.token');
Route::get('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');
Route::get('/push', [WebNotificationController::class, 'index'])->name('push-notificaiton');

Route::get('/repo', [PushNotificationController::class, 'index']);

Route::post('save-admin-token', [PushNotificationController::class,'storeAdminToken'])->name("save-admin-token");


Route::get('login',[AuthController::class, 'getLogin'])->name('login');
Route::post('login',[AuthController::class, 'postLogin'])->name('login');
Route::post('logout',[AuthController::class, 'Logout'])->name('logout');
Route::get('signup',[AuthCustomerController::class, 'getSignUp'])->name('signup');
Route::post('signup',[AuthCustomerController::class, 'postSignUp'])->name('signup');
Route::get('company-info/{id}',[AuthCustomerController::class, 'companyInfo'])->name('company-info');
Route::post('company-info/{id}',[AuthCustomerController::class, 'StoreCompanyInfo'])->name('company-info');




 