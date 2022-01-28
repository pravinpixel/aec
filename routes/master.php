<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Master\ModuleController;
use App\Http\Controllers\Admin\Master\BuildingTypeController;
use App\Http\Controllers\Admin\Master\DeliveryTypeController;
use App\Http\Controllers\Admin\Master\DocumentTypeController;
use App\Http\Controllers\Admin\Master\ProjectTypeController;
use App\Http\Controllers\Admin\Master\ServiceController;
use App\Http\Controllers\Admin\Master\BuildingComponentController;
use App\Http\Controllers\Admin\Master\LayerController;
use App\Http\Controllers\Admin\Master\LayerTypeController;
use App\Http\Controllers\Admin\Master\OutputTypeController;
use App\Http\Controllers\Customer\Master\CustomerLayerController;
use App\Http\Controllers\Admin\Master\RoleController;


Route::put('module/status/{id}', [ModuleController::class,'status'] )->name('module.status');
Route::resource('module', ModuleController::class);


Route::put('role/status/{id}', [RoleController::class,'status'] )->name('role.status');
Route::resource('role', RoleController::class);

Route::put('service/status/{id}', [ServiceController::class,'status'] )->name('service.status');
Route::resource('service', ServiceController::class);

Route::get('layer-type/get-layer-type', [LayerTypeController::class,'getLayerTypeByComponentId'])->name('layer-type.get-layer-type');
Route::put('layer-type/status/{id}', [LayerTypeController::class,'status'] )->name('layer-type.status');
Route::resource('layer-type', LayerTypeController::class);



Route::get('get-delivery-type', [DeliveryTypeController::class,'get'])->name('delivery-type.get');
Route::put('delivery-type/status/{id}', [DeliveryTypeController::class,'status'] )->name('delivery-type.status');
Route::resource('delivery-type', DeliveryTypeController::class);



Route::get('component-data', [LayerTypeController::class, 'componentData'])->name('component-data');
Route::get('layer-data', [LayerTypeController::class, 'layerData'])->name('layer-data');
Route::get('output-data', [ServiceController::class, 'outputData'])->name('output-data');



Route::get('get-building-type', [BuildingTypeController::class,'get'])->name('building-type.get');
Route::put('building-type/status/{id}', [BuildingTypeController::class,'status'] )->name('building-type.status');
Route::resource('building-type', BuildingTypeController::class);



Route::put('projectTypeStatus/{id}', [ProjectTypeController::class,'updateStatus'])->name('project-type.update-status');
Route::get('get-project-type', [ProjectTypeController::class,'get'])->name('project-type.get');
Route::resource('project-type', ProjectTypeController::class);


Route::put('output-type/status/{id}', [OutputTypeController::class,'status'])->name('output-type.status');
Route::get('get-output-type', [OutputTypeController::class,'get'])->name('output-type.get');
Route::resource('output-type', OutputTypeController::class);

Route::get('get-service', [ServiceController::class,'get'])->name('service.get');
Route::resource('service', ServiceController::class);





Route::get('get-document-type', [DocumentTypeController::class,'get'])->name('document-type.get');
Route::put('document-type/status/{id}', [DocumentTypeController::class,'status'] )->name('document-type.status');
Route::put('document-type/mandatoryStatus/{id}', [DocumentTypeController::class,'mandatory'] )->name('document-type.mandatoryStatus');
Route::resource('document-type', DocumentTypeController::class);







Route::get('get-building-component', [BuildingComponentController::class,'get'])->name('building-component.get');
Route::put('building-component/status/{id}', [BuildingComponentController::class,'status'] )->name('building-component.status');
Route::resource('building-component', BuildingComponentController::class);

Route::get('get-layer', [LayerController::class,'get'])->name('layer.get');
Route::get('get-layer-by-building-component', [LayerController::class,'getByBuildingComponentId'])->name('layer.get-layer-by-building-component');
Route::put('layer/status/{id}', [LayerController::class,'status'] )->name('layer.status');
Route::resource('layer', LayerController::class);



Route::get('get-customer-layer', [CustomerLayerController::class,'get'])->name('customer-layer.get');


