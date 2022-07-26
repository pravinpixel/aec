<?php

use App\Http\Controllers\Autodesk\AutodeskForgeController;
use Illuminate\Support\Facades\Route;

Route::get('forge', [AutodeskForgeController::class, 'view']);
Route::post('getmodelfilelist', [AutodeskForgeController::class, 'getmodelfilelist'])->name('getmodelfilelist');
Route::get('viewmodel/{id}', [AutodeskForgeController::class,'viewmodel'])->name('viewmodel');
Route::get('getbuckets', [AutodeskForgeController::class,'getBuckets'])->name('getbuckets');
Route::post('createbucket', [AutodeskForgeController::class, 'createbucket'])->name('createbucket');
Route::get('deletebucket', [AutodeskForgeController::class, 'deletebucket'])->name('deletebucket');
Route::post('uploadfile', [AutodeskForgeController::class,'uploadfile'])->name('uploadfile');
Route::post('translatefile', [AutodeskForgeController::class,'translatefile'])->name('translatefile');
Route::get('test', [AutodeskForgeController::class,'test'])->name('test');
Route::get('get-autodesk-file-type', [AutodeskForgeController::class,'getAutodeskFileType'])->name('get-autodesk-file-type');

Route::get('autodesk-check-status/{id}', [AutodeskForgeController::class,'checkStatus'])->name('autodesk-check-status');
