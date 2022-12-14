<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sharepoint\SharepointController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\Project;
use App\Models\Role;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function postLogin(Request $request)
    {
        session()->put('remember',$request->remember);
        try {
            $requestInput = array_merge($request->only(['email','password']),['is_active'=> true]);
            $employeeInput = array_merge($request->only(['email','password']),['status'=> true]);
            if (Auth::guard('customers')->attempt(($requestInput), false)) {
                Flash::success( __('auth.login_successful'));
                return redirect()->route('customers-dashboard');
            } else if (Auth::attempt(($employeeInput), false)){
                $role = Role::find(Admin()->job_role)->slug;
                if($role == config('global.cost_estimater')) {
                    $sharepoint = new SharepointController();
                    $sharepoint->getToken();
                    Flash::success(__('auth.login_successful'));
                    return redirect()->route('cost-estimate.dashboard');
                } else if($role == config('global.technical_estimater')) {
                    Flash::success( __('auth.login_successful'));
                    return redirect()->route('technical-estimate.dashboard');
                } else {
                    $sharepoint = new SharepointController();
                    $sharepoint->getToken();
                    Flash::success( __('auth.login_successful'));
                    return redirect()->route('admin-dashboard');
                }
            } else {
                Flash::error( __('auth.incorrect_email_id_and_password'));
                return redirect()->route('login');
            }
        } catch  (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->route('login');
        }
    }

    public function getLogin(Request $request)
    {
        if(Auth::check()) {
            return redirect(route('admin-dashboard'));
        }
        else if(Auth::guard('customers')->check()) {
            return redirect(route('customers-dashboard'));
        }
        return view('auth.login');
    }

    public function Logout() {
        Auth::guard('customers')->logout();
        Auth::logout();
        $remember = session()->get('remember');
        Session::flush();
        session()->put('remember',$remember);
        Flash::success(__('auth.logout_successful'));
        return redirect(route('login'));
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
            Flash::success(__('auth.password_change_success'));
        }
        Flash::Error(__('auth.password_change_fail'));
        return redirect()->back();
    }

    public function deactivateAccount(Request $request)
    {
        $id = Customer()->id;
        $totalProject = Project::where(['customer_id'=> $id, 'status'=> 'live'])->get()->count();
        if($totalProject > 0) {
            Flash::error('Can not deactivate your account');
            return redirect(route('customers-dashboard'));
        }
        $customer = Customer::find($id);
        $customer->is_active = false;
        $customer->save();
        return view('auth.customer.deactivate-account');
    }

    public function getAdminLogin(Request $request)
    {
        if(Auth::check()) {
            return redirect(route('admin-dashboard'));
        }
        else if(Auth::guard('customers')->check()) {
            return redirect(route('customers-dashboard'));
        }
        return view('auth.admin.login');
    }

}
