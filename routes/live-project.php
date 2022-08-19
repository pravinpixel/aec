<?php

use App\Http\Controllers\Admin\Project\LiveProjectController;
use App\Http\Controllers\Admin\Project\TicketCommentsController;

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware'=>'common'], function () {

    /*Route::get('/live-projects', function () {

        return view('admin.projects.live-project.index');
    })->name('live-projects');*/

    Route::get('live-projects', [LiveProjectController::class, 'index'])->name('live-projects');
    Route::post('add-project-comments', [LiveProjectController::class,'commentsstore'])->name("liveproject.project-comments");
    Route::get('project-show-comments/{id}/type/{type}', [LiveProjectController::class,'show'])->name("liveproject.project-show-comments");
    Route::get('project-comments-count/{id}', [LiveProjectController::class,'getCommentsCountByType'])->name("project.comments-count");
    Route::get('project-active-comments-count/{id}', [LiveProjectController::class,'getActiveCommentsCountByType'])->name("project.active-comments-count");



    

   
});?>