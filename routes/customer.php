<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Customer\EnquiryController;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\EnquiryTemplateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PushNotificationController;
Route::group(['prefix' => 'customers', 'middleware'=> 'customer'], function(){

    Route::get('profile', [CustomerController::class,'profile'])->name("customers-profile");

    Route::put('update-profile', [CustomerController::class,'updateProfile'])->name('customers-update-profile');

    Route::get('dashboard', [DashboardController::class,'enquiryDashborad'])->name("customers-enquiry-dashboard");
    
    Route::post('save-customer-token', [PushNotificationController::class,'storeToken'])->name("save-customer-token");

    Route::get('/enquirydashboard', [DashboardController::class,'enquiryDashborad'])->name("customers-dashboard");


    Route::get('project-dashboard', [DashboardController::class,'projectDashborad'])->name("customers-project-dashboard");

  
    Route::get('my-enquiries', [EnquiryController::class,'myEnquiries'])->name("customers-my-enquiries");

    Route::get('my-projects', [EnquiryController::class,'myProjects'])->name("customers-my-projects");    

    Route::get('my-enquiry/{id}/{type}', [EnquiryController::class,'myEnquiriesEdit'])->name("customers.edit-enquiry");

    Route::get('approve-enquiry/{type}/{id}', [EnquiryController::class,'myEnquiriesApprove'])->name("customers.approve-enquiry");


    Route::get('create-enquiries', [EnquiryController::class, 'create'])->name('customers.create-enquiry');

    Route::get('view-enquiry',  [EnquiryController::class, 'show'])->name('customers-view-enquiry');

    Route::post('move-to-cancel/{id}',  [EnquiryController::class, 'moveToCancel'])->name('customers.move-to-cancel');

    Route::post('move-to-active/{id}',  [EnquiryController::class, 'moveToActive'])->name('customers.move-to-active');

    Route::post('store-enquiry',  [EnquiryController::class, 'store'])->name('customers.store-enquiry');     

    Route::match(['put', 'post'],'update-enquiry/{id}',  [EnquiryController::class, 'update'])->name('customers.update-enquiry');

    Route::delete('delete-enquiry/{id}',  [EnquiryController::class, 'delete'])->name('customers.delete-enquiry');
    
    Route::post('store-enquiry-files',  [EnquiryController::class, 'storeFiles'])->name('customers.store-enquiry-files');

    Route::get('get-customer-enquiry/{id}/{type}',  [EnquiryController::class, 'getEnquiry'])->name('customers.get-enquiry');

    Route::get('get-plan-view',  [EnquiryController::class, 'getPlanViewList'])->name('customers.plan-view');

    Route::get('get-facade-view',  [EnquiryController::class, 'getFacadeViewList'])->name('customers.facade-view');

    Route::get('get-ifc-view',  [EnquiryController::class, 'getIFCViewList'])->name('customers.ifc-view');

    Route::get('get-others-view',  [EnquiryController::class, 'getOthersViewList'])->name('customers.others-view');

    Route::get('get-view-list',  [EnquiryController::class, 'getViewList'])->name('customers.get-view-list');

    Route::delete('enquiry-document',  [EnquiryController::class, 'deleteDocument'])->name('customers.enquiry-document');

    Route::delete('enquiry-building-component-document',  [EnquiryController::class, 'deleteBuildingComponentDocument'])->name('customers.enquiry-building-component-document');

    Route::get('enquiry-review',  [EnquiryController::class, 'getEnquiryReview'])->name('customers.enquiry-review');

    Route::get('edit-enquiry-review/{id}',  [EnquiryController::class, 'getEditEnquiryReview'])->name('customers.edit-enquiry-review');

    Route::get('get-login-customer', [CustomerController::class,'getLoginCustomer'])->name('get-login-customer');

    Route::get('get-customer-enquiry',[EnquiryController::class,'getCurrentEnquiry'])->name('get-customer-enquiry');

    Route::get('get-customer-new-enquiries',[EnquiryController::class,'getNewEnquiries'])->name('get-customer-new-enquiries');

    Route::get('get-customer-active-enquiries',[EnquiryController::class,'getActiveEnquiries'])->name('get-customer-active-enquiries');
    
    Route::get('get-customer-completed-enquiries',[EnquiryController::class,'getClosedEnquiries'])->name('get-customer-completed-enquiries');

    Route::get('get-document',[EnquiryController::class,'getDocumentById'])->name('get-document');

    Route::resource('enquiry-template', EnquiryTemplateController::class);

    Route::get('get-template-by-building-component-id', [EnquiryTemplateController::class, 'getTemplateByBuildingComponentId'])->name('get-template-by-building-component-id');
  
    Route::get('view-list',  function() {
        return view('customer.enquiry.table.view-list');
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

Route::group(['prefix' => '', 'middleware' => 'common'], function(){
    Route::get('get-enquiry-document/{id}', [EnquiryController::class, 'getDocumentView'])->name('get-enquiry-document');
    Route::post('get-document-modal',[EnquiryController::class, 'getDocumentModal'])->name('get-enquiry-modal');
    Route::get('get-cost-estimate-types', function(){
        return config('global.cost_estimate_types');
    })->name('get-cost-estimate-types');
});