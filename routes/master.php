<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Master\ModuleController;
use App\Http\Controllers\Admin\CostEstimationController;
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
use App\Http\Controllers\Admin\Master\TaskListController;
use App\Http\Controllers\Admin\Master\CheckListController;
use App\Http\Controllers\Admin\Master\WoodEstimateController;
use App\Http\Controllers\Admin\PermissionController;

Route::get('module-file',  function() {
    return view('admin.setting-tabs.Module.module');
})->name('module-file');
Route::get('role-file',  function() {
    return view('admin.setting-tabs.Role.role');
})->name('role-file');
Route::get('masterEstimation-file',[CostEstimationController::class,'getMasterCalculation'])->name('masterEstimation-file');
Route::get('component-file',  function() {
    return view('admin.setting-tabs.Building-Component.component');
})->name('component-file');
Route::get('type-file',  function() {
    return view('admin.setting-tabs.Building-Type.type');
})->name('type-file');
Route::get('documentType-file',  function() {
    return view('admin.setting-tabs.Document-Type.document');
})->name('documentType-file');
Route::get('projectType-file',  function() {
    return view('admin.setting-tabs.Project-Type.project_type');
})->name('projectType-file');
Route::get('layer-file',  function() {
    return view('admin.setting-tabs.Layer.layer');
})->name('layer-file');
Route::get('deliveryType-file',  function() {
    return view('admin.setting-tabs.Delivery-Type.deliveryLayer');
})->name('deliveryType-file');
Route::get('layerType-file',  function() {
    return view('admin.setting-tabs.Layer-Type.layerType');
})->name('layerType-file');
Route::get('output-file',  function() {
    return view('admin.setting-tabs.Output.output');
})->name('output-file');

Route::get('service-file',  function() {
    return view('admin.setting-tabs.Service.service');
})->name('service-file');

Route::get('task-list-view',  function() {
    return view('admin.setting-tabs.Task-List.task-list');
})->name('task-list-view');

Route::get('check-list',  function() {
    return view('admin.setting-tabs.Check-list.check-list');
})->name('check-list-file');

Route::get('wood-estimation',  function() {
    return view('admin.setting-tabs.wood-estimation.wood-estimation-list');
})->name('wood-estimation');


Route::get('permission/{id}',  [PermissionController::class,'permission'])->name('permission');
Route::put('set-permission/{id}',  [PermissionController::class,'setPermission'])->name('setPermission');
Route::get('get-permission/{id}',  [PermissionController::class,'getPermission'])->name('getPermission');



Route::put('module/status/{id}', [ModuleController::class,'status'] )->name('module.status');
Route::resource('module', ModuleController::class);
// Route::get('module-file', [ModuleController::class,'moduleFile'])->name('module-file');

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

Route::get('get-task-list', [TaskListController::class,'get'])->name('task-list.get');

Route::resource('task-list-master', TaskListController::class);
 
Route::resource('check-list-master', CheckListController::class);


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
Route::post('layer/store-layer-from-customer', [LayerController::class,'storeLayerFromCustomer'] )->name('layer.store-layer-from-customer');
Route::resource('layer', LayerController::class);



Route::get('get-customer-layer', [CustomerLayerController::class,'get'])->name('customer-layer.get');


