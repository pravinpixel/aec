<?php

use App\Http\Controllers\Admin\Project\ProjectController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware'=>'common'], function () {

    Route::get('list-projects', [ProjectController::class, 'index'])->name('list-projects');

    Route::get('create-projects',[ProjectController::class, 'create'])->name('create-projects');

    Route::get('edit-projects/{id}',[ProjectController::class, 'edit'])->name('edit-projects');

    Route::get('/live-projects', function () {
        return view('admin.projects.live-project.index');
    })->name('live-projects');

    //=========  Wizard Flow Views =========
        Route::get('create-project',[ProjectController::class, 'createWizard'])->name('create-project');

        Route::get('project-platform', [ProjectController::class, 'platform'])->name('platform');

        Route::get('project-team-setup', [ProjectController::class, 'teamSetup'])->name('team-setup');

        Route::get('project-schedule', [ProjectController::class, 'schedule'])->name('project-schedule');
    
        Route::get('project-to-do-listing', [ProjectController::class, 'todoListing'])->name('to-do-listing');

        Route::get('project-invoice-plan', [ProjectController::class, 'invoicePlan'])->name('invoice-plan');

        Route::get('project-review-n-submit', function () {
            return view('admin.projects.create-project.wizard.review-n-submit');
        })->name('review-n-submit');
        
        Route::get('project-unestablished-list', [ProjectController::class, 'unestablishedProjectList'])->name('project-unestablished-list');
    //========= END :  Wizard Flow Views =========
});

Route::group(['prefix' => 'project', 'middleware'=>'common', 'as' => 'project.'], function () {
    Route::get('get-templates',[ProjectController::class, 'getTeamsetupTemplate'])->name('get-templates');
    Route::get('get-template-by-id/{id}',[ProjectController::class, 'getTeamsetupTemplateById'])->name('get-template-by-id');
    Route::get('reference-number',[ProjectController::class, 'getReferenceNumber'])->name('reference-number');
    Route::get('/{id}',[ProjectController::class, 'show'])->name('get-by-id');
    Route::post('/',[ProjectController::class, 'store'])->name('store');
    Route::get('wizard/{type}',[ProjectController::class, 'getProject'])->name('wizard');
    Route::put('/{id}',[ProjectController::class, 'update'])->name('update');
    Route::get('enquiry/{id}',[ProjectController::class, 'getEnquiry'])->name('get-enquiry');
    Route::get('edit/{id}/{type}',[ProjectController::class, 'getEditProject'])->name('get-edit-project');
    Route::post('store-template',[ProjectController::class, 'storeTeamsetupTemplate'])->name('store-template');
    Route::post('sharepoint-folder',[ProjectController::class, 'storeFolder'])->name('sharepoint-folder');
    Route::put('sharepoint-folder/{id}',[ProjectController::class, 'updateFolder'])->name('sharepoint-folder');
});


Route::group(['prefix' => 'admin', 'middleware'=>'common'], function () {
    
    // ==========  Live PROJECT flow  ================
    Route::get('live-project/overview', function () {
        return view('admin.projects.live-project.wizard.overview');
    })->name('live-project.overview');

    Route::get('live-project/milestone', function () {
        return view('admin.projects.live-project.wizard.milestone');
    })->name('live-project.milestone');

    Route::get('live-project/task-list', function () {
        return view('admin.projects.live-project.wizard.task-list');
    })->name('live-project.task-list');
    
    Route::get('live-project/bim360', function () {
        return view('admin.projects.live-project.wizard.bim360');
    })->name('live-project.bim360');

    Route::get('live-project/tickets', function () {
        return view('admin.projects.live-project.wizard.tickets');
    })->name('live-project.tickets');

    Route::get('live-project/variation-orders', function () {
        return view('admin.projects.live-project.wizard.variation-orders');
    })->name('live-project.variation-orders');

    Route::get('live-project/invoice-status', function () {
        return view('admin.projects.live-project.wizard.invoice-status');
    })->name('live-project.invoice-status');

    Route::get('live-project/doc-management', function () {
        return view('admin.projects.live-project.wizard.doc-management');
    })->name('live-project.doc-management');

    Route::get('live-project/notes', function () {
        return view('admin.projects.live-project.wizard.notes');
    })->name('live-project.notes');
  
    // ========== END  :  Live PROJECT flow  ================
 
}); 

