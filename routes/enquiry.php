<?php

use App\Http\Controllers\Admin\Enquiry\CostEstimateController;
use App\Http\Controllers\Admin\Enquiry\CustomerResponseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Enquiry\EnquiryController;
use App\Http\Controllers\Admin\Enquiry\MailTemplateController;
use App\Http\Controllers\Admin\Enquiry\EnquiryCommentsController;
use App\Http\Controllers\Admin\Enquiry\ProposalController;
use App\Http\Controllers\Admin\TechEstimateController;


Route::group(['prefix' => 'admin', 'middleware'=> 'admin'], function(){ 

    Route::get('/enquiry-list', [EnquiryController::class, 'index'])->name('admin.enquiry-list'); 

    Route::get('/create-enquiries', function () {
        return view("admin.enquiry.create");
    })->name('admin.enquiry-create');

    Route::get('show-enquiry/{id?}', [EnquiryController::class,'singleIndexPage'])->name("view-enquiry");
 
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

   
    Route::get('/admin-proposal-sharing', function () {
        return view('admin.enquiry.wizard.proposal-sharing');
    })->name('enquiry.proposal-sharing');

    Route::get('/admin-response-status', function () {
        return view('admin.enquiry.wizard.response-status');
    })->name('enquiry.response-status');
    
    Route::get('/admin-move-to-project', function () {
        return view('admin.enquiry.wizard.move-to-project');
    })->name('enquiry.move-to-project'); 

    Route::get('/calculate-cost-estimation', function () {
        return view('admin.enquiry.wizard.calculate-cost-estimate');
    })->name('enquiry.calculate-cost-estimation');


    //  ****** Enquiery Proposal ******
    Route::get('/get-documentaryData', [MailTemplateController::class,'getDocumentaryData'])->name("get-documentaryData");
    Route::get('/get-documentaryOneData', [MailTemplateController::class,'getDocumentaryOneData'])->name("get-documentaryOneData");
    Route::get('/pdfGen', [MailTemplateController::class,'pdfGenrate'])->name("pdfGen");
    
    Route::get('/proposal/view/{id}',[ProposalController::class,'index'])->name('index.proposal-sharing');
    Route::get('/proposal/enquiry/{id}/edit/{proposal_id}',[ProposalController::class,'edit'])->name('edit.proposal-sharing');
    Route::put('/proposal/enquiry/{id}/edit/{proposal_id}',[ProposalController::class,'update'])->name('update.proposal-sharing');

    Route::get('/proposal/enquiry/{id}/edit/{proposal_id}/version/{Vid}',[ProposalController::class,'editVersions']);
    Route::put('/proposal/enquiry/{id}/edit/{proposal_id}/version/{Vid}',[ProposalController::class,'updateVersions']);
    Route::delete('/proposal/enquiry/{id}/edit/{proposal_id}/version/{Vid}',[ProposalController::class,'deleteVersions']);

    Route::put('/proposal/enquiry/{id}/duplicate/{proposal_id}',[ProposalController::class,'duplicate'])->name('duplicate.proposal-sharing');
    Route::put('/proposal/enquiry/{id}/duplicate-version/{proposal_id}', [ProposalController::class,'duplicateVersion'])->name('duplicate.version');
    Route::delete('/proposal/enquiry/{id}/edit/{proposal_id}',[ProposalController::class,'destroy'])->name('delete.proposal-sharing');
    Route::get('/proposal/enquiry/{id}/versions/{proposal_id}',[ProposalController::class,'versions']);

    Route::post('/proposal/enquiry/{id}/send-mail/{proposal_id}',[ProposalController::class,'sendMail']);
    Route::post('/proposal/enquiry/{id}/send-mail/{proposal_id}/version/{Vid}',[ProposalController::class,'sendMailVersion']);
 
});

Route::get('/approve/{id}/enquiry/{proposal_id}/proposal/{Vid}',[ProposalController::class,'approve'])->name('proposal-approve');

Route::get('customer-approval/{id}/approval-type/{type}',[ProposalController::class,'customerApproval'])->name('customer-approval');
Route::post('proposal-move-to-project/{id}',[ProposalController::class,'moveToProject'])->name('proposal-move-to-project');

Route::group(['prefix' => 'admin'], function(){ 
    Route::get('get-unattended-enquiries', [EnquiryController::class, 'getUnattendedEnquiries'])->name('get-unattended-enquiries');
    Route::get('get-active-enquiries', [EnquiryController::class, 'getActiveEnquiries'])->name('get-active-enquiries');
    Route::get('get-cancelled-enquiries', [EnquiryController::class, 'getCancelledEnquiries'])->name('get-cancelled-enquiries');
    Route::delete('enquiry/{id}/delete', [EnquiryController::class, 'destroy'])->name('enquiry.delete');
    Route::post('update-followup', [EnquiryController::class, 'updateFollowUp'])->name('enquiry.update-followup');
    Route::get('get-active-comments-count',[EnquiryController::class,'getActiveCommentsCount'])->name('get-active-comments-count');

    
});

Route::group(['prefix' => 'admin', 'middleware' => 'common'], function(){
    Route::post('add-comments', [EnquiryCommentsController::class,'store'])->name("enquiry.comments");
    Route::get('show-comments/{id}/type/{type}', [EnquiryCommentsController::class,'show'])->name("enquiry.show-comments");
    Route::get('show-comments/{id}/{version}/{proposal_id}', [EnquiryCommentsController::class,'showProposalComment'])->name("enquiry.show-proposal-comments");
    Route::get('comments-count/{id}', [EnquiryCommentsController::class,'getCommentsCountByType'])->name("enquiry.comments-count");
    Route::get('active-comments-count/{id}', [EnquiryCommentsController::class,'getActiveCommentsCountByType'])->name("enquiry.active-comments-count");
    Route::get('show-tech-comments/{id}/type/{type}', [EnquiryCommentsController::class,'showTechChat'])->name("enquiry.show-tech-comments");
});

Route::group(['prefix' => 'technical-estimate', 'middleware' => 'common', 'route' => 'technical-estimate'], function(){
    Route::post('assign-user/{enquiry_id}', [TechEstimateController::class,'assignUser'])->name("assign-user");
    Route::post('update-status/{enquiry_id}',[TechEstimateController::class,'updateStatus'])->name("update-status");
});

Route::group(['prefix' => 'cost-estimate', 'middleware' => 'common', 'route' => 'cost-estimate'], function(){
    Route::post('assign-user/{enquiry_id}', [CostEstimateController::class,'assignUser'])->name("assign-user");
    Route::post('remove-user/{enquiry_id}', [CostEstimateController::class,'removeUser'])->name("remove-user");
    Route::post('update-status/{enquiry_id}', [CostEstimateController::class,'updateStatus'])->name("update-user");
    Route::get('get-history/{id}/{type}', [CostEstimateController::class, 'getHistory'])->name('get-history');
});

Route::group(['prefix' => 'customer-response', 'middleware' => 'common', 'route' => 'customer-response'], function(){
    Route::post('move-to-project', [CustomerResponseController::class,'moveToProject'])->name('move-to-project');
    Route::post('assign-to-project', [CustomerResponseController::class,'assignToProject'])->name('assign-to-project');
});