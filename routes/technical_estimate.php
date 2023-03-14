<?php
use App\Http\Controllers\TechnicalEstimate\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'technical-estimate', 'as' => 'technical-estimate.', 'middleware' => 'common'], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('enquiries', [DashboardController::class, 'enquiries'])->name('enquiries');
    Route::get('show/{enquiry_id}', [DashboardController::class, 'show'])->name('show');
    Route::get('get-assigned-enquiries', [DashboardController::class, 'getAssignedEnquiry'])->name('get-assigned-enquiries');
});