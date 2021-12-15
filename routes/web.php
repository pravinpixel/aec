<?php
include 'menu.php';

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\EnquiryController;
use Illuminate\Support\Facades\Route;

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
    
    Route::prefix('customers')->group(function () {

        Route::get('/', function () {
            return redirect(route('customers-dashboard'));
        });

        Route::get('/dashboard', function () {
            return view('customers.index');
        })->name('customers-dashboard');

        Route::get('/my-enquiries', function () {
            return view('customers.pages.my-enquiries');
        })->name('customers-my-enquiries');

        Route::get('/create-enquiries', function () {
            return view('customers.pages.create-enquiries');
        })->name('customers-create-enquiries');

        Route::get('/view-enquiry', function () {
            return view('customers.pages.enquiry-single-view');
        })->name('customers-view-enquiry');
        
    });
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

    Route::get('/sales-view-enquiries', function () {
        return view('admin.pages.view-sales-enquiries');
    })->name('admin-view-sales-enquiries');

    // Route::get('/sales-create-enquiries', function () {
        
    //     return view('admin.pages.create-sales-enquiries');

    // })->name('');

    Route::get('sales-create-enquiries', [EnquiryController::class,'getEnquiryNumber'])->name('admin-create-sales-enquiries');

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
    Route::resource('enquiry', EnquiryController::class);
});

/** ===== End : Customers Routes ======*/