<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\ModuleMenuController;
use Illuminate\Support\Facades\Route;
    
Route::get('menu/get-drop-down', [ModuleController::class,'getDropDownModule'] )->name('module.get-drop-down');
Route::resource('menu', MenuController::class);

Route::get('module/get-drop-down', [ModuleController::class,'getDropDownModule'] )->name('module.get-drop-down');
Route::resource('module', ModuleController::class);

Route::resource('module-menu', ModuleMenuController::class);
   
?>