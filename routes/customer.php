<?php

use App\Http\Controllers\Admin\CustomerController;
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

    Route::match(['put', 'post'],'update-enquiry/{id}',  [EnquiryController::class, 'update'])->name('customers.update-enquiry');
    
    Route::post('store-enquiry-files',  [EnquiryController::class, 'storeFiles'])->name('customers.store-enquiry-files');

    Route::get('get-customer-enquiry/{id}/{type}',  [EnquiryController::class, 'getEnquiry'])->name('customers.get-enquiry');

    Route::get('get-plan-view',  [EnquiryController::class, 'getPlanViewList'])->name('customers.plan-view');

    Route::get('get-facade-view',  [EnquiryController::class, 'getFacadeViewList'])->name('customers.facade-view');

    Route::get('get-ifc-view',  [EnquiryController::class, 'getIFCViewList'])->name('customers.ifc-view');

    Route::get('get-others-view',  [EnquiryController::class, 'getOthersViewList'])->name('customers.others-view');

    Route::get('get-view-list',  [EnquiryController::class, 'getViewList'])->name('customers.get-view-list');

    Route::delete('enquiry-document',  [EnquiryController::class, 'delete'])->name('customers.enquiry-document');

    Route::get('enquiry-review',  [EnquiryController::class, 'getEnquiryReview'])->name('customers.enquiry-review');

    Route::get('edit-enquiry-review/{id}',  [EnquiryController::class, 'getEditEnquiryReview'])->name('customers.edit-enquiry-review');

    Route::get('get-login-customer', [CustomerController::class,'getLoginCustomer'])->name('get-login-customer');

    Route::get('get-customer-enquiry',[EnquiryController::class,'getCurrentEnquiry'])->name('get-customer-enquiry');

    Route::get('get-customer-new-enquiries',[EnquiryController::class,'getNewEnquiries'])->name('get-customer-new-enquiries');

    Route::get('get-customer-active-enquiries',[EnquiryController::class,'getActiveEnquiries'])->name('get-customer-active-enquiries');
    
    Route::get('get-customer-completed-enquiries',[EnquiryController::class,'getCompletedEnquiries'])->name('get-customer-completed-enquiries');

    Route::get('view-list',  function() {
        return view('customer.enquiry.view-list');
    });

    Route::get('enquiry/project-info', function(){
        return view('customer.enquiry.wizard.project-info');
    })->name('enquiry.project-info');
    
    Route::get('enquiry/service', function(){
        return view('customer.enquiry.wizard.service');
    })->name('enquiry.service');

    Route::get('enquiry/ifc-model-upload', function(){
        return view('customer.enquiry.wizard.ifc-model-upload');
    })->name('enquiry.ifc-model-upload');

    Route::get('enquiry/building-component', function(){
        return view('customer.enquiry.wizard.building-component');
    })->name('enquiry.building-component');

    Route::get('enquiry/additional-info', function(){
        return view('customer.enquiry.wizard.additional-info');
    })->name('enquiry.additional-info');

    Route::get('enquiry/review', function(){
        return view('customer.enquiry.wizard.review');
    })->name('enquiry.review');
});