<?php

use App\Http\Controllers\Autodesk\AutodeskForgeController;
use Illuminate\Support\Facades\Route;

Route::get('forge', [AutodeskForgeController::class, 'view']);
Route::post('getmodelfilelist', [AutodeskForgeController::class, 'getmodelfilelist'])->name('getmodelfilelist');
Route::get('viewmodel', [AutodeskForgeController::class,'viewmodel'])->name('viewmodel');
Route::get('getbuckets', [AutodeskForgeController::class,'getBuckets'])->name('getbuckets');
Route::post('createbucket', [AutodeskForgeController::class, 'createbucket'])->name('createbucket');
Route::get('deletebucket', [AutodeskForgeController::class, 'deletebucket'])->name('deletebucket');
Route::post('uploadfile', [AutodeskForgeController::class,'uploadfile'])->name('uploadfile');
Route::post('translatefile', [AutodeskForgeController::class,'translatefile'])->name('translatefile');
Route::get('test', [AutodeskForgeController::class,'test'])->name('test');

