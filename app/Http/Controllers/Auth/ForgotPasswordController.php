<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\PasswordReset;
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
  public function showForgetPasswordForm()
  {
    return view('auth.customer.forget-password');
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function submitForgetPasswordForm(Request $request)
  {

    $validatorCustomer = Validator::make($request->all(), [
      'email' => 'required|email|exists:customers',
    ]);

    $validatorEmployee = Validator::make($request->all(), [
      'email' => 'required|email|exists:employee',
    ]);
    if ($validatorCustomer->fails()  &&  $validatorEmployee->fails()) {
      $validator = $validatorCustomer->fails() ? $validatorCustomer : $validatorEmployee;
      return redirect()
        ->back()
        ->withErrors($validator)
        ->withInput();
    }

    $token = Str::random(64);

    DB::table('password_resets')->insert([
      'email' => $request->email,
      'token' => $token,
      'created_at' => Carbon::now()
    ]);
 
    Mail::to($request->email)->send(new  ForgotPassword($token));

    return back()->with('message', 'We have e-mailed your password reset link!');
  }
  /**
   * Write code on Method
   *
   * @return response()
   */
  public function showResetPasswordForm($token)
  {
    return view('auth.customer.forget-password-link', ['token' => $token]);
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function submitResetPasswordForm(Request $request)
  {
    $validatorCustomer = Validator::make($request->all(), [
      'email' => 'required|email|exists:customers',
      'password' => 'required|string|min:8|confirmed',
      'password_confirmation' => 'required'
    ]);

    $validatorEmployee = Validator::make($request->all(), [
      'email' => 'required|email|exists:employee',
      'password' => 'required|string|min:8|confirmed',
      'password_confirmation' => 'required'
    ]);

    if ($validatorCustomer->fails() && $validatorEmployee->fails()) {
      $validator = $validatorCustomer->fails() ? $validatorCustomer : $validatorEmployee;
      return redirect()
        ->back()
        ->withErrors($validator)
        ->withInput();
    }

    $updatePassword = PasswordReset::where([
      'email' => $request->email,
      'token' => $request->token
    ])
      ->first();

    if (!$updatePassword) {
      Flash::error('Invalid token!');
      return redirect()->back();
    }

    $customer = Customer::where('email', $request->email)->first();
    if ($customer) {
      $customer->password = $request->password;
      $customer->save();
    } else {
      $employee = Employee::where('email', $request->email)->first();
      $employee->password = Hash::make($request->password);
      $employee->save();
    }

    PasswordReset::where(['email' => $request->email])->delete();
    Flash::success('Your password has been changed!');
    return redirect(route('login'));
  }
}
