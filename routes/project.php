<?php

use App\Http\Controllers\Admin\Project\ProjectController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware'=>'common'], function () {

    Route::get('list-projects', [ProjectController::class, 'index'])->name('list-projects');

    Route::get('create-projects',[ProjectController::class, 'create'])->name('create-projects');

    Route::get('edit-projects/{id}',[ProjectController::class, 'edit'])->name('edit-projects');

    //=========  Wizard Flow Views =========
        Route::get('create-project',[ProjectController::class, 'createWizard'])->name('create-project');

        Route::get('project-platform', [ProjectController::class, 'platform'])->name('platform');

        Route::get('project-team-setup', [ProjectController::class, 'teamSetup'])->name('team-setup');

        Route::get('project-schedule', [ProjectController::class, 'schedule'])->name('project-schedule');
    
        Route::get('project-to-do-listing', [ProjectController::class, 'todoListing'])->name('to-do-listing');

        Route::get('project-invoice-plan', [ProjectController::class, 'invoicePlan'])->name('invoice-plan');

        Route::get('project-review-n-submit', function () {
            return view('admin.projects.wizard.review-n-submit');
        })->name('review-n-submit');

        
        Route::get('project-unestablished-list', [ProjectController::class, 'unestablishedProjectList'])->name('project-unestablished-list');
    //========= END :  Wizard Flow Views =========
});