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

Route::get('get-building-type', [BuildingTypeController::class,'get'])->name('building-type.get');
Route::resource('building-type', BuildingTypeController::class);

Route::get('get-delivery-type', [DeliveryTypeController::class,'get'])->name('delivery-type.get');
Route::resource('delivery-type', DeliveryTypeController::class);

Route::put('projectTypeStatus/{id}', [ProjectTypeController::class,'updateStatus'])->name('project-type.update-status');
Route::get('get-project-type', [ProjectTypeController::class,'get'])->name('project-type.get');
Route::resource('project-type', ProjectTypeController::class);

Route::get('get-output-type', [OutputTypeController::class,'get'])->name('output-type.get');
Route::resource('output-type', OutputTypeController::class);

Route::get('get-service', [ServiceController::class,'get'])->name('service.get');
Route::resource('service', ServiceController::class);

Route::get('get-document-type', [DocumentTypeController::class,'get'])->name('document-type.get');
Route::resource('document-type', DocumentTypeController::class);

Route::get('get-building-component', [BuildingComponentController::class,'get'])->name('building-component.get');
Route::resource('building-component', BuildingComponentController::class);

Route::get('get-layer', [LayerController::class,'get'])->name('layer.get');
Route::resource('layer', LayerController::class);
Route::get('layer-type/get-layer-type', [LayerTypeController::class,'getLayerTypeByComponentId'])->name('layer-type.get-layer-type');
Route::resource('layer-type', LayerTypeController::class);


