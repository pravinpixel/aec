<?php
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
});