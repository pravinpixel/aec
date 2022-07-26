<?php

use App\Http\Controllers\Admin\Project\LiveProjectController;
use App\Http\Controllers\Admin\Project\TicketCommentsController;

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware'=>'common'], function () {

    /*Route::get('/live-projects', function () {

        return view('admin.projects.live-project.index');
    })->name('live-projects');*/

    Route::get('live-projects', [LiveProjectController::class, 'index'])->name('live-projects');

   
});?>