<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Master\BuildingTypeController;
use App\Http\Controllers\Admin\Master\DeliveryTypeController;
use App\Http\Controllers\Admin\Master\DocumentTypeController;
use App\Http\Controllers\Admin\Master\ProjectTypeController;
use App\Http\Controllers\Admin\Master\ServiceController;
use App\Http\Controllers\Admin\Master\BuildingComponentController;
use App\Http\Controllers\Admin\Master\LayerController;
use App\Http\Controllers\Admin\Master\LayerTypeController;

Route::resource('building-type', BuildingTypeController::class);

Route::resource('delivery-type', DeliveryTypeController::class);

Route::resource('project-type', ProjectTypeController::class);

Route::resource('service', ServiceController::class);

Route::resource('document-type', DocumentTypeController::class);

Route::resource('building-component', BuildingComponentController::class);

Route::resource('layer', LayerController::class);

Route::resource('layer-type', LayerTypeController::class);


