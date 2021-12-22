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

});