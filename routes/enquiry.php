<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Enquiry\EnquiryController;
use App\Http\Controllers\Admin\Enquiry\MailTemplateController;
use App\Http\Controllers\Admin\Enquiry\EnquiryCommentsController;


Route::prefix('admin')->group(function () {

    Route::get('/enquiry-list', function () {
        return view('admin.enquiry.index');
    })->name('admin.enquiry-list'); 

    Route::get('/create-enquiries', function () {
        return view("admin.enquiry.create");
    })->name('admin.enquiry-create');

    Route::get('show-enquiry/{id?}', [EnquiryController::class,'singleIndexPage'])->name("view-enquiry");
    Route::post('add-comments', [EnquiryCommentsController::class,'store'])->name("enquiry.comments");
    Route::get('show-comments/{id}/type/{type}', [EnquiryCommentsController::class,'show'])->name("enquiry.show-comments");

    Route::get('show-tech-comments/{id}/type/{type}', [EnquiryCommentsController::class,'showTechChat'])->name("enquiry.show-tech-comments");

    
    //----- Project Summary ------
    Route::get('/admin-project-summary', function () {
        return view('admin.enquiry.wizard.project-summary');
    })->name('enquiry.project-summary');


    Route::get('/admin-technical-estimation', function () {
        return view('admin.enquiry.wizard.technical-estimation');
    })->name('enquiry.technical-estimation');

    Route::get('/admin-cost-estimation', function () {
        return view('admin.enquiry.wizard.cost-estimate');
    })->name('enquiry.cost-estimation');

    Route::get('/admin-project-schedule', function () {
        return view('admin.enquiry.wizard.project-schedule');
    })->name('enquiry.project-schedule');

    Route::get('/admin-proposal-sharing', function () {
        return view('admin.enquiry.wizard.proposal-sharing');
    })->name('enquiry.proposal-sharing');

    Route::get('/admin-response-status', function () {
        return view('admin.enquiry.wizard.response-status');
    })->name('enquiry.response-status');
    
    Route::get('/admin-move-to-project', function () {
        return view('admin.enquiry.wizard.move-to-project');
    })->name('enquiry.move-to-project'); 


    //  ****** Enquiery Proposal ******
    Route::get('/get-documentaryData', [MailTemplateController::class,'getDocumentaryData'])->name("get-documentaryData");
    Route::get('/get-documentaryOneData', [MailTemplateController::class,'getDocumentaryOneData'])->name("get-documentaryOneData");
    

});