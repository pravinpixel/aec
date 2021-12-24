<?php

use Illuminate\Support\Facades\Auth;

function Customer() {
    return Auth::guard('customers')->user();
}