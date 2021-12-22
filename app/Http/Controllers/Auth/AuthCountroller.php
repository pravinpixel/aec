<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;

class AuthCountroller extends Controller
{

    public function getCustomerLogin(Request $request)
    {
        if(Auth::guard('customers')->check()) {
            return redirect(route('customers-dashboard'));
        }
        return view('auth.customer.login');
    }

    public function postCustomerLogin(Request $request)
    {
        try {
            if (Auth::guard('customers')->attempt($request->only(['email','password']), false)) {
                Flash::success( __('auth.login_successful'));
                return redirect()->route('customers-dashboard');
            } else {
                Flash::error( __('auth.incorrect_email_id_and_password'));
                return redirect()->route('customers.login');
            }
        } catch  (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->route('customers.login');
        }
       
    }

    public function customerLogout() {
        Auth::guard('customers')->logout();
        Flash::success(__('auth.logout_successful'));
        return redirect(route('customers.login'));
    }
}
