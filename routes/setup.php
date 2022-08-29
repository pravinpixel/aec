<?php

use App\Http\Controllers\SetupController;
use Illuminate\Support\Facades\Route;

Route::get('admin/setup', function () {
    return  redirect()->route('setup.role-permission');
})->name('admin-settings');

Route::prefix('admin/setup')->middleware('common')->group(function () {
    Route::get('/role-and-permission',[SetupController::class, 'role_permission_index'])->name('setup.role-permission');
});