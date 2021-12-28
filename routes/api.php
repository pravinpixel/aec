<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\GanttController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





Route::get('/data',[ GanttController::class, 'getData'])->name('data');

Route::post('/data/task',[ GanttController::class, 'storeData']);
Route::put('/data/task/{id}',[ GanttController::class, 'updateData']);
Route::delete('/data/task/{id}',[ GanttController::class, 'deleteData']);

 