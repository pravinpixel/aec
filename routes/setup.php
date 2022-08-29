<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/setup', function () {
    return  redirect()->route('setup.role-permission');
})->name('admin-settings');

Route::prefix('admin/setup')->middleware('common')->group(function () {
    Route::get('/role-and-permission', function () {
        return  view('admin.setup.role-permission.index');
    })->name('setup.role-permission');
});