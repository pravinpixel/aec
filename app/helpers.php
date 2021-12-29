<?php

use Illuminate\Support\Facades\Auth;

if(! function_exists('Customer')) {
    function Customer() {
        return Auth::guard('customers')->user();
    }
}