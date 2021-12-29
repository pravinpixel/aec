<?php

use App\Http\Controllers\Customer\EnquiryController;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'customers', 'middleware'=> 'guest:customers'], function(){

    Route::get('dashboard', function () {
        return view('customers.index');
    })->name('customers-dashboard');
  
    Route::get('my-enquiries', [EnquiryController::class, 'index'])->name('customers-my-enquiries');

    Route::get('create-enquiries', [EnquiryController::class, 'create'])->name('customers-create-enquiries');

    Route::get('view-enquiry',  [EnquiryController::class, 'show'])->name('customers-view-enquiry');

    Route::post('store-enquiry',  [EnquiryController::class, 'store'])->name('customers.store-enquiry');

    Route::get('edit-enquiry/{id}',  [EnquiryController::class, 'edit'])->name('customers.edit');

    Route::put('update-enquiry/{id}',  [EnquiryController::class, 'update'])->name('customers.update');
    
    Route::post('store-enquiry-files',  [EnquiryController::class, 'storeFiles'])->name('customers.store-enquiry-files');

    Route::get('get-customer-enquiry/{id}',  [EnquiryController::class, 'getEnquiry'])->name('customers.get-enquiry');

    Route::get('get-plan-view',  [EnquiryController::class, 'getPlanViewList'])->name('customers.plan-view');

    Route::get('get-facade-view',  [EnquiryController::class, 'getFacadeViewList'])->name('customers.facade-view');

    Route::get('get-ifc-view',  [EnquiryController::class, 'getIFCViewList'])->name('customers.ifc-view');

    Route::get('get-others-view',  [EnquiryController::class, 'getOthersViewList'])->name('customers.others-view');


});