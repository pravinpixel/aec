<?php

use App\Http\Controllers\Admin\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('common')->group(function () {
    Route::get('/employees',  function() {
        return view('livewire.employee.index');
    })->name('employee.index');

    Route::get('/employee/create',  function() {
        return view('livewire.employee.create.index');
    })->name('create.employee');

    Route::get('/employee/edit/{id}',  function($id) {
        return view('livewire.employee.edit.index');
    })->name('edit.employee');

    Route::get('/employee/change-password/{id}',  function($id) {
        return view('livewire.employee.change-password-index');
    })->name('employee.change-password');

    Route::post('/employee/{id}/status', [EmployeeController::class, 'updateStatus'])->name('employee.update-status');
});