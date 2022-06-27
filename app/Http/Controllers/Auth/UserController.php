<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getSignUp()
    {
        return view('auth.customer.signup');
    }

    public function postSignUp(Request $request)
    {
        
    }
    
} 