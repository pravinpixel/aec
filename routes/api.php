<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GanttChartController;


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


Route::get('/data',[ GanttController::class, 'getData'])->name('data');

Route::post('/data/task',[ GanttController::class, 'storeData']);
Route::put('/data/task/{id}',[ GanttController::class, 'updateData']);
Route::delete('/data/task/{id}',[ GanttController::class, 'deleteData']);

// Route::get('ganttChart/list', [GanttChartController::class, 'ganttChart'])->name('ganttChart.list');
// Route::post('ganttChart/list/task', [GanttChartController::class, 'createGanttChart'])->name('ganttChart.list.task');
// Route::put('ganttChart/list/task/{id}', [GanttChartController::class, 'updateGanttChart'])->name('ganttChart.list.task');
// Route::delete('ganttChart/list/task/{id}', [GanttChartController::class, 'deleteGanttChart'])->name('ganttChart.list.task');