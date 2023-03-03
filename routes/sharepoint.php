<?php

use App\Http\Controllers\Sharepoint\SharepointController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'sharepoint', 'middleware'=>'common', 'as' => 'sharepoint.'], function () { 
    Route::get('list-all-folders/{id}',[SharepointController::class,'listAllFolder'])->name('listAllFolder');
    Route::get('list-files', [SharepointController::class,'getProjectFiles']);
    Route::get('list-folders/{id}', [SharepointController::class,'getProjectFolders']);
    Route::get('folder-has-permission', [SharepointController::class,'folderHasPermission']);
    Route::get('download-files',[SharepointController::class, 'downloadFile']);
});