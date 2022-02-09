<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class AuthController extends Controller
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

    public function changePasswordGet() {
        if(Auth::guard('customers')->check()) {
            return view('auth.customer.changePassword');
        }
        return view('auth.customer.login');
    }
    public function changePasswordPost(Request  $request) {

        $user = Customer::find(Customer()->id);
    
        $userPassword = $user->password;
        
        $request->validate([
            'old_password'      =>  'required',
            'password'          =>  'required|same:confirm_password|min:6',
            'confirm_password'  =>  'required',
        ]);

        if (!Hash::check($request->old_password, $userPassword)) {
            Flash::Error(__('auth.password_change_fail'));
        }   else {
            $user   ->  password    =   Hash::make($request->password);
            $user   ->  save();
        }
        Flash::success(__('auth.password_change_success'));
        return redirect()->back();
    }



    public function getAdminLogin(Request $request)
    {
        if(Auth::check()) {
            return redirect(route('admin-dashboard'));
        }
        return view('auth.admin.login');
    }

    public function postAdminLogin(Request $request)
    {
        try {
            if (Auth::attempt($request->only(['email','password']), false)) {
                Flash::success( __('auth.login_successful'));
                return redirect()->route('admin-dashboard');
            } else {
                Flash::error( __('auth.incorrect_email_id_and_password'));
                return redirect()->route('admin.login');
            }
        } catch  (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->route('admin.login');
        }
    }

    public function adminLogout() {
        Auth::logout();
        Flash::success(__('auth.logout_successful'));
        return redirect(route('admin.login'));
    }
}
