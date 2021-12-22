<?php

   
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Admin\EnquiryController;
     
     
    Route::prefix('admin/api/v2')->group(function () {

        Route::post('customers-enquiry', [EnquiryController::class,'index']); 
        Route::get('customers-enquiry', [EnquiryController::class,'index']); 
        Route::get('customers-enquiry/{id}', [EnquiryController::class,'singleIndex']);

    });
   
?>