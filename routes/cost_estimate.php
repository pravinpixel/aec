<?php

use App\Http\Controllers\CostEstimate\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cost-estimate', 'as' => 'cost-estimate.', 'middleware' => 'common'], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('show/{enquiry_id}', [DashboardController::class, 'show'])->name('show');
    Route::get('get-assigned-enquiries', [DashboardController::class, 'getAssignedEnquiry'])->name('get-assigned-enquiries');
});