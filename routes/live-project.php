<?php

use App\Http\Controllers\Admin\Project\LiveProjectController as OldLiveProjectController;
use App\Http\Controllers\LiveProjectController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'live', 'middleware' => 'common'], function () {
    Route::get('/project/{menu_type}/{id}', [LiveProjectController::class, 'index'])->name('live-project.menus-index');
    Route::post('/project/{menu_type}/{id}', [LiveProjectController::class, 'store'])->name('live-project.menus-store');
    Route::get('/get-milestones/{project_id?}', [LiveProjectController::class, 'milestones_index'])->name('live-project.milestones-index');
    Route::get('/task-list/{project_id}', [LiveProjectController::class, 'task_list_index'])->name('live-project.task-list-index');
    Route::get('/sub-task-list/{task_id?}', [LiveProjectController::class, 'sub_task_index'])->name('live-project.sub-task-index');
    Route::post('/update-sub-sub-task/{sub_sub_task_id?}', [LiveProjectController::class, 'update_sub_sub_task'])->name('live-project.sub-sub-task.update');
    Route::delete('/delete-sub-sub-task/{sub_sub_task_id?}', [LiveProjectController::class, 'delete_sub_sub_task'])->name('live-project.sub-sub-task.delete');
    Route::post('/create-sub-task/{sub_sub_task_id?}', [LiveProjectController::class, 'create_sub_task'])->name('live-project.sub-task.create');
    Route::delete('/delete-sub-task/{sub_sub_task_id?}', [LiveProjectController::class, 'delete_sub_task'])->name('live-project.sub-task.delete');
    Route::post('/set-progress/{project_id?}', [LiveProjectController::class, 'set_progress'])->name('live-project.set-progress');

    // Issue 
    Route::get('/issues/{project_id?}', [LiveProjectController::class, 'issues'])->name('live-project.issues.ajax');
    Route::delete('/delete-issues/{id?}', [LiveProjectController::class, 'delete_issues'])->name('live-project.delete-issues.ajax');
    Route::put('/change-status-issues/{id?}', [LiveProjectController::class, 'change_status_issues'])->name('live-project.change-status-issues.ajax');
    Route::get('/get-issue/{id?}', [LiveProjectController::class, 'show_issues'])->name('live-project.show-issues.ajax');
    Route::get('/create-issue-variation/{issue_id?}', [LiveProjectController::class, 'create_issue_variation'])->name('live-project.create-issue-variation.ajax'); 
    Route::post('/store-issue-variation/{issue_id?}', [LiveProjectController::class, 'store_issue_variation'])->name('live-project.create-issue-variation'); 
    Route::get('/get-issue-variation/{id}', [LiveProjectController::class, 'variation_order'])->name('live-project.index-issue-variation.ajax'); 
    Route::get('/show-variation-order/{id?}', [LiveProjectController::class, 'show_variation_order'])->name('live-project.show-variation.ajax');  
    Route::delete('/delete-variation-order/{id?}', [LiveProjectController::class, 'delete_variation_order'])->name('live-project.delete-variation.ajax');  
});

Route::group(['prefix' => 'admin', 'middleware' => 'common'], function () {
    Route::get('live-projects', [OldLiveProjectController::class, 'index'])->name('live-projects');
    Route::post('add-project-comments', [OldLiveProjectController::class, 'commentsstore'])->name("liveproject.project-comments");
    Route::get('project-show-comments/{id}/type/{type}', [OldLiveProjectController::class, 'show'])->name("liveproject.project-show-comments");
    Route::get('project-comments-count/{id}', [OldLiveProjectController::class, 'getCommentsCountByType'])->name("project.comments-count");
    Route::get('project-active-comments-count/{id}', [OldLiveProjectController::class, 'getActiveCommentsCountByType'])->name("project.active-comments-count");
});
