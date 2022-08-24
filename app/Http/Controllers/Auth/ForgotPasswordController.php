<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\Admin\Employees;
use App\Models\Customer;
use App\Models\PasswordReset;
use App\Services\GlobalService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;

class ForgotPasswordController extends Controller
{
  /**
   * Write code on Method
   *
   * @return response()
   */
  public function showForgotPasswordForm()
  {
    return view('auth.customer.forgot-password');
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function submitForgotPasswordForm(Request $request)
  {

    $validatorCustomer = Validator::make($request->all(), [
      'email' => 'required|email|exists:customers',
    ]);

    // $validatorEmployee = Validator::make($request->all(), [
    //   'email' => 'required|email|exists:employees',
    // ]);
    if ($validatorCustomer->fails()) {
      // $validator = $validatorCustomer->fails() ? $validatorCustomer : $validatorEmployee;
      return redirect()
        ->back()
        ->withErrors($validatorCustomer)
        ->withInput();
    }

    $token = Str::random(64);
    $code = GlobalService::getRandomNumber();

    DB::table('password_resets')->insert([
      'email' => $request->email,
      'token' => $token,
      'temporary_password'=> $code, 
      'created_at' => Carbon::now()
    ]);
 
    Mail::to($request->email)->send(new  ForgotPassword($token, $code));

    return back()->with('message', 'We have e-mailed your password reset link!');
  }
  /**
   * Write code on Method
   *
   * @return response()
   */
  public function showResetPasswordForm($token)
  {
    return view('auth.customer.forgot-password-link', ['token' => $token]);
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function submitResetPasswordForm(Request $request)
  {
    $validatorUser = Validator::make($request->all(), [
      'temporary_password' => 'required|digits:6',
      'password' => 'required|string|min:8|confirmed',
      'password_confirmation' => 'required'
    ]);

    if ($validatorUser->fails()) {
      $validator = $validatorUser;
      return redirect()
        ->back()
        ->withErrors($validator)
        ->withInput();
    }
    $updatePassword = PasswordReset::where([
      'temporary_password' => $request->temporary_password,
      'token' => $request->token
    ])
      ->first();

    if (!$updatePassword) {
      return redirect()
        ->back()
        ->withErrors(['temporary_password' => 'Incorrect temporary password'])
        ->withInput();
      return redirect()->back();
    }

    $customer = Customer::where('email', $updatePassword->email)->first();
    if ($customer) {
      $customer->password = $request->password;
      $customer->save();
    } else {
      $employee = Employees::where('email', $updatePassword->email)->first();
      $employee->password = Hash::make($request->password);
      $employee->save();
    }

    PasswordReset::where(['email' => $updatePassword->email])->delete();
    Flash::success('Changed password successfully!');
    return redirect(route('login'));
  }
}
