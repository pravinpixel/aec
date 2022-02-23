<?php  use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/projects', function () {
        return view('admin.projects.index');
    })->name('projects');

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
    //========= END :  Wizard Flow Views =========
});