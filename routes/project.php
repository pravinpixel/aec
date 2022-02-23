<?php  use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/projects', function () {
        return   view('admin.projects.index');
    })->name('projects');
});