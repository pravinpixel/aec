<?php

use App\Http\Controllers\Bim360\BIM360CompanyController;
use App\Http\Controllers\Bim360\Bim360ProjectController;
use App\Http\Controllers\Bim360\Bim360UserController;
use App\Http\Controllers\sharePointFolderMasterController;
use App\Models\SharepointFolder;
use Illuminate\Support\Facades\Route;

Route::get('/bim360/projects/live', [Bim360ProjectController::class, 'liveProjects'])->name('/bim360/projects/live');
Route::get('/bim360/projects/inactive', [Bim360ProjectController::class, 'inactiveProjects'])->name('/bim360/projects/inactive');
Route::get('/bim360/projects/pending', [Bim360ProjectController::class, 'pendingProjects'])->name('/bim360/projects/pending');
Route::get('/bim360/projects/archived', [Bim360ProjectController::class, 'archivedProjects'])->name('/bim360/projects/archived');

// Routes for BIM360 Project create, edit and detail
Route::get('/bim360/projects/create', [Bim360ProjectController::class, 'createProject'])->name('/bim360/projects/create');
Route::get('/bim360/projects/detail', [Bim360ProjectController::class, 'getProject'])->name('/bim360/projects/detail');
Route::get('/bim360/projects/edit', [Bim360ProjectController::class, 'editProject'])->name('/bim360/projects/edit');

// Routes for BIM360 Projects - ajax calls
Route::post('/bim360/projects/getliveprojects', [Bim360ProjectController::class, 'getLiveProjects'])->name('/bim360/projects/getliveprojects');
Route::post('/bim360/projects/getpendingprojects', [Bim360ProjectController::class, 'getPendingProjects'])->name('/bim360/projects/getpendingprojects');
Route::post('/bim360/projects/getinactiveprojects', [Bim360ProjectController::class, 'getInactiveProjects'])->name('/bim360/projects/getinactiveprojects');
Route::post('/bim360/projects/getarchivedprojects', [Bim360ProjectController::class, 'getArchivedProjects'])->name('/bim360/projects/getarchivedprojects');
Route::get('/bim360/projects/saveproject', [Bim360ProjectController::class, 'saveProject'])->name('/bim360/saveproject');

Route::post('/bim360/projects/getaccountusers', [Bim360ProjectController::class, 'getAccountUsers'])->name('/bim360/projects/getaccountusers');
Route::post('/bim360/projects/getprojectusers', [Bim360ProjectController::class, 'getProjectUsers'])->name('/bim360/projects/getprojectusers');

Route::get('/bim360/companies/create', [BIM360CompanyController::class, 'create'])->name('/bim360/companies/create');
Route::get('/bim360/companies/detail', [Bim360CompanyController::class, 'getCompany'])->name('/bim360/companies/detail');
Route::get('/bim360/companies/edit', [Bim360CompanyController::class, 'edit'])->name('/bim360/companies/edit');
Route::get('/bim360/companies/list', [Bim360CompanyController::class, 'list'])->name('/bim360/Companies/list');
Route::get('/bim360/companies/save', [Bim360CompanyController::class, 'save'])->name('/bim360/companies/save');
Route::get('/bim360/companies/getcompanylist', [Bim360CompanyController::class, 'getCompanyList'])->name('/bim360/companies/getcompanylist');

Route::get('/bim360/Companies/create', [Bim360CompanyController::class, 'create'])->name('/bim360/Companies/create');
Route::get('/bim360/Companies/detail', [Bim360CompanyController::class, 'getCompany'])->name('/bim360/Companies/detail');
Route::get('/bim360/Companies/edit', [Bim360CompanyController::class, 'edit'])->name('/bim360/Companies/edit');
Route::get('/bim360/Companies/list', [Bim360CompanyController::class, 'list'])->name('/bim360/Companies/list');
Route::post('/bim360/Companies/save', [Bim360CompanyController::class, 'save'])->name('/bim360/Companies/save');
Route::post('/bim360/Companies/getcompanylist', [Bim360CompanyController::class, 'getCompanyList'])->name('/bim360/Companies/getcompanylist');

Route::get('/bim360/users/create', [Bim360UserController::class, 'create'])->name('/bim360/users/create');
Route::get('/bim360/users/detail', [Bim360UserController::class, 'getUser'])->name('/bim360/users/detail');
Route::get('/bim360/users/edit', [Bim360UserController::class, 'edit'])->name('/bim360/users/edit');
Route::get('/bim360/users/list', [Bim360UserController::class, 'list'])->name('/bim360/Users/list');
Route::get('/bim360/users/save', [Bim360UserController::class, 'save'])->name('/bim360/users/save');
Route::post('/bim360/users/getuserlist', [Bim360UserController::class, 'getUserList'])->name('/bim360/users/getuserlist');

Route::get('/bim360/Users/create', [Bim360UserController::class, 'create'])->name('/bim360/Users/create');
Route::get('/bim360/Users/detail', [Bim360UserController::class, 'getUser'])->name('/bim360/Users/detail');
Route::get('/bim360/Users/edit', [Bim360UserController::class, 'edit'])->name('/bim360/Users/edit');
Route::get('/bim360/Users/list', [Bim360UserController::class, 'list'])->name('/bim360/Users/list');
Route::post('/bim360/Users/save', [Bim360UserController::class, 'save'])->name('/bim360/Users/save');
Route::post('/bim360/Users/getuserlist', [Bim360UserController::class, 'getUserList'])->name('/bim360/Users/getuserlist');


Route::get('bim360/projects-type', function(){
    return config('project.project_types');
    // return 'hello';
    // $arr=[];
    // $folders=SharepointFolder::all();
    // foreach($folders as $f){
        // $arr[]=$f->name;
        // array_push($arr,$f->name);
        // $f->name;
    // }
    // return response()->json([
    //     'folder'=>$arr
    // ]);
    // return $f;
})->name('bim360/projects-type');