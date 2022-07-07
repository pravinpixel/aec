<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PasswordReset;
use Illuminate\Http\Request; 
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
          $request->validate([
              'email' => 'required|email|exists:customers',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
          Mail::send('emails.customer.forget-password-mail', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
  
          return back()->with('message', 'We have e-mailed your password reset link!');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('auth.customer.forget-password-link', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:customers',
              'password' => 'required|string|min:8|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = PasswordReset::
                              where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
                          
          if(!$updatePassword){
            Flash::error('Invalid token!');
            return redirect()->back();
          }
  
          $customer = Customer::where('email', $request->email)->first();
          $customer->password = $request->password;
          $customer->save();
          PasswordReset::where(['email'=> $request->email])->delete();
          Flash::success('Your password has been changed!');
          return redirect(route('login'));
      }
}