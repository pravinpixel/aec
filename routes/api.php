<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GanttChartController;
use App\Http\Controllers\Admin\GanttController;
use App\Http\Controllers\Admin\GanttTaskController;
use App\Http\Controllers\Admin\GanttLinkController;


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


Route::post('/ganttChart/data/task',[ GanttChartController::class, 'storeData']);
Route::put('/ganttChart/data/task/{id}',[ GanttChartController::class, 'updateData']);
Route::delete('/ganttChart/data/task/{id}',[ GanttChartController::class, 'deleteData']);
Route::get('/ganttChart/data',[ GanttChartController::class, 'getData'])->name('ganttChart_data');
 


Route::get('/data',[ GanttController::class, 'get'])->name('data');
Route::resource('task', GanttTaskController::class);
Route::resource('link', GanttLinkController::class); 