<?php
include 'menu.php';
include 'adminAPI.php';
include 'master.php';
include 'customer.php';

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\EnquiryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CostEstimationController;
use App\Http\Controllers\Auth\AuthCountroller;

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


/** ===== Customers Routes ======*/
    

/** ===== End : Customers Routes ======*/


/** ===== Admin Routes ======*/
    
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect(route('admin-dashboard'));
    });

    Route::get('/settings', function () {
        return  view('admin.settings');
    })->name('admin-settings');

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin-dashboard');

    Route::get('/project-dashboard', function () {
        return view('admin.index');
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

    Route::get('/sales-view-enquiry', function () {
        return view('admin.pages.view-enquiry');
    })->name('view-enquiry');

    Route::get('/quotation', function () {
        return view('admin.pages.quotation');
    })->name('quotation');

    Route::get('getEnquiryNumber', [EnquiryController::class,'getEnquiryNumber']);

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
    
    Route::get('/cost-estimation-single-view', function () {
        return view('admin.pages.admin-cost-estimation-single-view');
    })->name('admin-cost-estimation-single-view');
    Route::get('/admin-cost-estimation-single-view', [CostEstimationController::class,'cost_estimation_single_view'])->name('cost-estimation-single-view');



    Route::get('/proposal-conversation', function () {
        return view('admin.pages.proposal-conversation');
    })->name('proposal-conversation');
    
    Route::get('/gran-chart', function () {
        return view('admin.pages.gran-chart');
    })->name('gran-chart');
    
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){ 
    Route::resource('customer', CustomerController::class);
    Route::get('enquiry/get-number', [EnquiryController::class,'getEnquiryNumber'])->name('enquiry.get-number');
    Route::post('costEstimationSingleForm', [CostEstimationController::class,'costEstimationSingleForm'])->name('costEstimationSingleForm');
    Route::get('costEstimationEdit', [CostEstimationController::class,'costEstimationEdit'])->name('costEstimationEdit');
    Route::get('estimate/list', [CostEstimationController::class, 'getEstimate'])->name('estimate.list');
    Route::get('costEstimationDelete', [CostEstimationController::class,'costEstimationDelete'])->name('costEstimationDelete');
    Route::resource('enquiry', EnquiryController::class);
});


Route::get('customers/login',[ AuthCountroller::class, 'getCustomerLogin'])->name('customers.login');
Route::post('customers/login',[ AuthCountroller::class, 'postCustomerLogin'])->name('customers.login');
Route::post('customers/logout',[ AuthCountroller::class, 'customerLogout'])->name('customers.logout');

/** ===== End : Customers Routes ======*/
