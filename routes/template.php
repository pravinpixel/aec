<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'template'], function () {
    Route::get('comment', function(){
        return view('customer.enquiry.models.chat-box');
    })->name('comment');

    Route::get('proposal-comment', function(){
        return view('customer.enquiry.models.chat-box');
    })->name('proposal-comment');
});

