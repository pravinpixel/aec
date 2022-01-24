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
use App\Http\Controllers\Admin\Master\OutputTypeController;

Route::resource('building-type', BuildingTypeController::class);

Route::resource('delivery-type', DeliveryTypeController::class);

Route::put('projectTypeStatus/{id}', [ProjectTypeController::class,'updateStatus'])->name('project-type.update-status');

Route::resource('project-type', ProjectTypeController::class);

Route::resource('output-type', OutputTypeController::class);

Route::resource('service', ServiceController::class);

Route::resource('document-type', DocumentTypeController::class);

Route::resource('building-component', BuildingComponentController::class);

Route::resource('layer', LayerController::class);

Route::get('layer-type/get-layer-type', [LayerTypeController::class,'getLayerTypeByComponentId'])->name('layer-type.get-layer-type');
Route::resource('layer-type', LayerTypeController::class);


