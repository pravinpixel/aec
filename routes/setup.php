<?php

use App\Http\Controllers\IfcFileIconController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\sharePointFolderMasterController;
use Illuminate\Support\Facades\Route;

Route::get('admin/setup', function () {
    return  redirect()->route('setup.roles');
})->name('admin-settings');

Route::prefix('admin/setup')->middleware('common')->group(function () {
    //   Admin
    Route::get('/roles',[SetupController::class, 'role_index'])->name('setup.roles');
    Route::get('/permissions/{id?}',[SetupController::class, 'permission_index'])->name('setup.permissions');
    Route::get('/wood-estimation-service',[SetupController::class, 'wood_estimation'])->name('setup.wood-estimation');
    Route::get('/wood-estimation-cost-preset',[SetupController::class, 'wood_estimation_cost_preset'])->name('setup.wood-estimation-cost-preset');
    Route::get('/precast-estimation-service',[SetupController::class, 'precast_estimation'])->name('setup.precast-estimation');
    Route::get('/precast-estimation-cost-preset',[SetupController::class, 'precast_estimation_cost_preset'])->name('setup.precast-estimation-cost-preset');
    Route::get('/check-list',[SetupController::class, 'check_list'])->name('setup.check-list');
    Route::get('/check-sheet',[SetupController::class, 'check_sheet'])->name('setup.check-sheet');

    Route::get('/general-file-icon',[SetupController::class, 'ifc_file_icon'])->name('setup.ifc-file-icon');
    Route::get('/general-file-icon/create',[IfcFileIconController::class, 'create'])->name('setup.ifc-file-icon.create');
    Route::post('/general-file-icon/create',[IfcFileIconController::class, 'store'])->name('setup.ifc-file-icon.store');
    Route::delete('/general-file-icon/destroy',[IfcFileIconController::class, 'destroy'])->name('setup.ifc-file-icon.destroy');
    Route::get('/general-file-icon/edit/{id}',[IfcFileIconController::class, 'edit'])->name('setup.ifc-file-icon.edit');
    Route::post('/general-file-icon/update/{id}',[IfcFileIconController::class, 'update'])->name('setup.ifc-file-icon.update');

    

    // Customer
    Route::get('/project-type',[SetupController::class, 'project_type'])->name('setup.project-type'); 
    Route::get('/service',[SetupController::class, 'service'])->name('setup.service');
    Route::get('/building-type',[SetupController::class, 'building_type'])->name('setup.building-type');
    Route::get('/building-component',[SetupController::class, 'building_component'])->name('setup.building-component');
    Route::get('/construction-type',[SetupController::class, 'construction_type'])->name('setup.construction-type');
    Route::get('/delivery-type',[SetupController::class, 'delivery_type'])->name('setup.delivery-type');
    Route::get('/document-type',[SetupController::class, 'document_type'])->name('setup.document-type');



    // SharePoint Folder Master
    // index get all folders
    Route::get('/all-files',[sharePointFolderMasterController::class,'all']);
    // update status 
    Route::resource('/files',sharePointFolderMasterController::class);
    Route::post('/state-change',[sharePointFolderMasterController::class,'stateChange']);
    Route::post('/final-delivery/{id}',[sharePointFolderMasterController::class,'finalDelivery']);
    Route::post('get-edit-folder',[sharePointFolderMasterController::class,'getFolder']);
    Route::post('get-update-folder',[sharePointFolderMasterController::class,'folderUpdate']);
    Route::post('delete-folder',[sharePointFolderMasterController::class,'deleteFolder']);
});