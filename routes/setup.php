<?php

use App\Http\Controllers\SetupController;
use Illuminate\Support\Facades\Route;

Route::get('admin/setup', function () {
    return  redirect()->route('setup.roles');
})->name('admin-settings');

Route::prefix('admin/setup')->middleware('common')->group(function () {
    Route::get('/roles',[SetupController::class, 'role_index'])->name('setup.roles');
    Route::get('/permissions/{id?}',[SetupController::class, 'permission_index'])->name('setup.permissions');
    Route::get('/wood-estimation-service',[SetupController::class, 'wood_estimation'])->name('setup.wood-estimation');
    Route::get('/wood-estimation-cost-preset',[SetupController::class, 'wood_estimation_cost_preset'])->name('setup.wood-estimation-cost-preset');
});