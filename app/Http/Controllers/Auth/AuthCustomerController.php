<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegisterCustomerMail;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;

class AuthCustomerController extends Controller
{
    public function getSignUp()
    {
        return view('auth.customer.signup');
    }

    public function postSignUp()
    {
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|unique:customers|email',
            'password'   => ['required','min:8']
        ]);
        try {
            $insert = Customer::create(request(['first_name', 'last_name', 'email', 'password']));
            if($insert) {
                $customer = Customer::find($insert->id);
                $details = [
                    'full_name' => $customer->full_name,
                    'route'     => route('company-info', encrypt($customer->id))
                ];
                Mail::to($customer->email)->send(new \App\Mail\RegisterCustomerMail($details));
                Flash::success( __('auth.email_send_for_verification'));
                return redirect()->route('login');
            }
            Flash::success( __('global.something'));
            return redirect()->route('admin-dashboard');
            
        } catch  (Exception $e) {
            Flash::error( __('global.something'));
            Log::info($e->getMessage());
            return redirect()->route('login');
        }
    }

    public function CompanyInfo($id)
    {
        $id = decrypt($id);
        $customer                  = Customer::findOrFail( $id );
        $data['id'] = $id;
        $data['email'] = $customer->email;
        $data['mobile_no'] = $customer->mobile_no;
        return view('auth.customer.company-info', compact('data'));
    }

    public function StoreCompanyInfo(Request $request, $id)
    {
        $this->validate(request(), [
            'company_name'    => 'required|unique:customers',
            'organization_no' => 'required',
            'fax'             => 'max:8',
            'phone_no'        => 'max:15',
            'mobile_no'       => 'required|regex:/^([0-9\s\-\+\(\)]*)$/'
        ]);
        $id = decrypt($id);
        $customer                  = Customer::findOrFail( $id );
        $customer->company_name    = $request->company_name;
        $customer->organization_no = $request->organization_no;
        $customer->mobile_no       = $request->mobile_no;
        $customer->phone_no        = $request->phone_no;
        $customer->fax             = $request->fax;
        $customer->website         = $request->website;
        $customer->invoice_email   = $request->invoice_email;
        if($customer->save()) {
            Flash::success(__('setup completed successfully'));
            return redirect(route('login'));
        }
        Flash::error(__('global.something'));
        return redirect(route('login'));
    }
    
} 