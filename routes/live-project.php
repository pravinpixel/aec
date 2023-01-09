<?php

use App\Http\Controllers\Admin\Project\LiveProjectController as OldLiveProjectController;
use App\Http\Controllers\LiveProjectController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'live', 'middleware' => 'common'], function () {
    Route::get('/project/{menu_type}/{id}', [LiveProjectController::class, 'index'])->name('live-project.menus-index');
    Route::post('/project/{menu_type}/{id}', [LiveProjectController::class, 'store'])->name('live-project.menus-store');
    Route::get('/get-milestones/{project_id?}', [LiveProjectController::class, 'milestones_index'])->name('live-project.milestones_index');
});

Route::group(['prefix' => 'admin', 'middleware' => 'common'], function () {
    Route::get('live-projects', [OldLiveProjectController::class, 'index'])->name('live-projects');
    Route::post('add-project-comments', [OldLiveProjectController::class, 'commentsstore'])->name("liveproject.project-comments");
    Route::get('project-show-comments/{id}/type/{type}', [OldLiveProjectController::class, 'show'])->name("liveproject.project-show-comments");
    Route::get('project-comments-count/{id}', [OldLiveProjectController::class, 'getCommentsCountByType'])->name("project.comments-count");
    Route::get('project-active-comments-count/{id}', [OldLiveProjectController::class, 'getActiveCommentsCountByType'])->name("project.active-comments-count");
});
