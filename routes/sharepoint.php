<?php

use App\Http\Controllers\Sharepoint\SharepointController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'sharepoint', 'middleware'=>'admin', 'as' => 'sharepoint.'], function () { 
    Route::get('list-all-folders/{id}',[SharepointController::class,'listAllFolder']);
    Route::get('list-files', [SharepointController::class,'getProjectFiles']);
    Route::get('list-folders/{id}', [SharepointController::class,'getProjectFolders']);
});