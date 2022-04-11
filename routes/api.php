<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GanttChartController;

use App\Http\Controllers\Admin\Enquiry\GanttChart\GanttController;
use App\Http\Controllers\Admin\Enquiry\GanttChart\GanttTaskController;
use App\Http\Controllers\Admin\Enquiry\GanttChart\GanttLinkController;

use App\Http\Controllers\Admin\CostGanttTaskController;
use App\Http\Controllers\Admin\CostGanttLinkController;
use App\Http\Controllers\Admin\Project\ProjectController;
use App\Http\Controllers\Admin\Project\ProjectGranttChartLinkController;
use App\Http\Controllers\Admin\Project\ProjectGranttChartTaskController;

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

// project scheduler task for edit wizard
Route::resource('project/{id}/task', ProjectGranttChartTaskController::class);
Route::resource('project/{id}/link', ProjectGranttChartLinkController::class); 
// project scheduler task for create wizard
Route::post('project/task', [ProjectController::class, 'storeGrandChartTask']);
Route::post('project/link', [ProjectController::class,'storeGrandChartLink']); 
Route::put('project/task/{id}', [ProjectController::class, 'updateGrandChartTask']);
Route::put('project/link/{id}', [ProjectController::class,'updateGrandChartLink']); 