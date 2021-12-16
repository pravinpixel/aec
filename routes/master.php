<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Master\BuildingTypeController;
use App\Http\Controllers\Admin\Master\DeliveryTypeController;
use App\Http\Controllers\Admin\Master\ProjectTypeController;
use App\Http\Controllers\Admin\Master\ServiceController;


Route::resource('building-type', BuildingTypeController::class);

Route::resource('delivery-type', DeliveryTypeController::class);

Route::resource('project-type', ProjectTypeController::class);

Route::resource('service', ServiceController::class);