<?php


Route::get('/create/employee',  function() {
    return view('livewire.employee.create.index');
})->name('create.employee');