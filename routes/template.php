<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'template', 'middleware' => 'common'], function () {
    Route::get('comment', function(){
        return view('customer.enquiry.models.chat-box');
    })->name('comment');
    Route::get('open-comment', function(){
        return view('customer.enquiry.open-comment');
    })->name('open-comment');

});

