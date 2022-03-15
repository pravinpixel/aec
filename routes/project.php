<?php  use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::get('/list-projects', function () {
        return view('admin.projects.index');
    })->name('list-projects');

    Route::get('/create-projects', function () {
        return view('admin.projects.create');
    })->name('create-projects');

    //=========  Wizard Flow Views =========
        Route::get('create-project', function () {
            return view('admin.projects.wizard.create-project');
        })->name('create-project');

        Route::get('platform', function () {
            return view('admin.projects.wizard.platform');
        })->name('platform');

        Route::get('team-setup', function () {
            return view('admin.projects.wizard.team-setup');
        })->name('team-setup');

        Route::get('/project-schedule', function () {
            return view('admin.projects.wizard.project-schedule');
        })->name('project-schedule');
    
        Route::get('/to-do-listing', function () {
            return view('admin.projects.wizard.to-do-listing');
        })->name('to-do-listing');

        Route::get('invoice-plan', function () {
            return view('admin.projects.wizard.invoice-plan');
        })->name('invoice-plan');

        Route::get('review-n-submit', function () {
            return view('admin.projects.wizard.review-n-submit');
        })->name('review-n-submit');

        
    //========= END :  Wizard Flow Views =========
});