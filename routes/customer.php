<?php

use App\Http\Controllers\Customer\EnquiryController;
use App\Http\Controllers\Customer\DashboardController;

use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'customers', 'middleware'=> 'guest:customers'], function(){
 
    Route::get('dashboard', [DashboardController::class,'enquiryDashborad'])->name("customers-enquiry-dashboard");
    Route::get('/enquirydashboard', [DashboardController::class,'enquiryDashborad'])->name("customers-dashboard");


    Route::get('project-dashboard', [DashboardController::class,'projectDashborad'])->name("customers-project-dashboard");

  
    Route::get('my-enquiries', [EnquiryController::class,'myEnquiries'])->name("customers-my-enquiries");

    Route::get('my-projects', [EnquiryController::class,'myProjects'])->name("customers-my-projects");    

    Route::get('my-enquiry/{id}', [EnquiryController::class,'myEnquiriesEdit'])->name("customers.edit");

    Route::get('create-enquiries', [EnquiryController::class, 'create'])->name('customers.create-enquiry');

    Route::get('view-enquiry',  [EnquiryController::class, 'show'])->name('customers-view-enquiry');

    Route::post('store-enquiry',  [EnquiryController::class, 'store'])->name('customers.store-enquiry');     

    Route::put('update-enquiry/{id}',  [EnquiryController::class, 'update'])->name('customers.update');
    
    Route::post('store-enquiry-files',  [EnquiryController::class, 'storeFiles'])->name('customers.store-enquiry-files');

    Route::get('get-customer-enquiry/{id}',  [EnquiryController::class, 'getEnquiry'])->name('customers.get-enquiry');

    Route::get('get-plan-view',  [EnquiryController::class, 'getPlanViewList'])->name('customers.plan-view');

    Route::get('get-facade-view',  [EnquiryController::class, 'getFacadeViewList'])->name('customers.facade-view');

    Route::get('get-ifc-view',  [EnquiryController::class, 'getIFCViewList'])->name('customers.ifc-view');

    Route::get('get-others-view',  [EnquiryController::class, 'getOthersViewList'])->name('customers.others-view');

    Route::get('get-view-list',  [EnquiryController::class, 'getViewList'])->name('customers.get-view-list');

    Route::delete('enquiry-document',  [EnquiryController::class, 'delete'])->name('customers.enquiry-document');

    Route::get('view-list',  function() {
        return view('customers.pages.enquiryWizard.view-list');
    });
   
});