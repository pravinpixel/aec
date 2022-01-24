<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GanttChartController;

use App\Http\Controllers\Admin\Enquiry\GanttChart\GanttController;
use App\Http\Controllers\Admin\Enquiry\GanttChart\GanttTaskController;
use App\Http\Controllers\Admin\Enquiry\GanttChart\GanttLinkController;

use App\Http\Controllers\Admin\CostGanttTaskController;
use App\Http\Controllers\Admin\CostGanttLinkController;


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
 


Route::get('enquiry/data',[ GanttController::class, 'get'])->name('enquiry.data'); 
Route::resource('enquiry/task', GanttTaskController::class);
Route::resource('enquiry/link', GanttLinkController::class); 


Route::get('/costData',[ GanttChartController::class, 'get'])->name('costData'); 
Route::resource('cost/task', CostGanttTaskController::class);
Route::resource('cost/link', CostGanttLinkController::class); 