<?php

   
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Admin\TechEstimateController;
    use App\Http\Controllers\Admin\Enquiry\CostEstimateController;
    use App\Http\Controllers\Admin\Enquiry\EnquiryController;
    use App\Http\Controllers\Admin\Enquiry\ProposalController;
    use App\Http\Controllers\Admin\Project\ProjectController;
    use App\Http\Controllers\Admin\Project\TicketCommentsController;
    use App\Http\Controllers\Sharepoint\SharepointController;

    Route::prefix('admin/api/v2')->group(function () {
        Route::post('customers-enquiry', [EnquiryController::class,'store']); 
        Route::get('customers-enquiry', [EnquiryController::class,'index']); 
        Route::get('customers-enquiry/{id}', [EnquiryController::class,'singleIndex']);
        Route::get('customers-technical-estimate/{id}', [TechEstimateController::class,'index']);
        Route::post('customers-technical-estimate/{id}', [TechEstimateController::class,'update'])->name("Update_technical_Estimate");

        Route::get('get-denied-proposal/{id}', [ProposalController::class,'getDeniedProposal']);
        Route::get('get-approved-proposal/{id}', [ProposalController::class,'getApprovedProposal']);
        
        // ========== Costestimate ==========
        Route::get('cost-estimate-view/{id}', [CostEstimateController::class,'index'])->name("CostEstimateView");
        Route::get('EnquiryCostEstimate', [CostEstimateController::class,'CostEstimateData'])->name("CostEstimateData");
        Route::get('CostEstimateMasterValue', [CostEstimateController::class,'CostEstimateMasterValue'])->name("CostEstimateMasterValue");
        Route::post('store-cost-estimation', [CostEstimateController::class,'store'])->name("enquiry-create.cost-estimate-value");

        //=========Live Project =========

        Route::get('get-live-project-type/{id}', [ProjectController::class,'liveprojectdata'])->name('project-live.get');
        Route::post('store-task-list', [ProjectController::class,'storetasklit'])->name('store-task-list');
        Route::post('delete-task-list', [ProjectController::class,'deleteTaskList'])->name('delete-task-list');
        Route::post('live-project-ticket', [ProjectController::class,'ticketcreate'])->name('live-project-ticket');
        Route::post('VariationUpdate', [ProjectController::class,'VariationUpdate'])->name('Variation-Update');
        Route::get('projectticket/{id}', [ProjectController::class,'ticketlist'])->name('live-project-ticket-list');
        Route::get('project-ticket-variation/{id}', [ProjectController::class,'TicketVariationList'])->name('live-project-ticket-variation-list');
        
        Route::get('projectticketdelete/{id}', [ProjectController::class,'ticketlistdelete'])->name('live-project-ticket-listdelete');
        Route::get('projectticketsearch/{id}/{type}', [ProjectController::class,'ticketsearchlist'])->name('live-project-ticket-search-list');
        Route::Post('projectticketfiltersearch', [ProjectController::class,'ticketfiltersearch'])->name('live-project-ticket-filter-list');
        Route::get('projectticketfind/{id}', [ProjectController::class,'projectticketfind'])->name('live-project-ticket-find');
        Route::get('variationticketfind/{id}', [ProjectController::class,'variationticketfind'])->name('live-project-ticket-find');
        Route::get('live-project/show-ticket-comment/{id}/type/{type}',[TicketCommentsController::class,'sendprojectticket']);
        Route::get('liveprojectnote/{id}',[ProjectController::class,'liveprojectnote']);
        Route::get('projectdocument/{id}', [SharepointController::class,'listAllFolder'])->name('list-All-Folder');
        Route::put('/DuplicateVariation/{id}/duplicate',[ProjectController::class,'Duplicatevariation'])->name('duplicate.variation');
        Route::put('/SendVariation/{id}',[ProjectController::class,'SendVariation'])->name('send.variation');

        
        

    }); 
?>