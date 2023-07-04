<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Admin\NewCustomerMail;
use App\Mail\certificationMail;
use App\Mail\RegisterCustomerMail;
use App\Mail\RemainderCustomerMail;
use App\Models\AecUsers;
use App\Models\Customer;
use App\Services\GlobalService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Validator;

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
            'email'      => ['required', 'email', 'regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', 'unique:customers'],
            'password'   => ['required', 'confirmed', 'min:8']
        ], [
            "email.unique" => "Verification mail already sent, check your inbox"
        ]);
        try {

            $AecUsers = AecUsers::create([
                'first_name' => request()->first_name,
                'job_role'   => 6,
                'last_name'  => request()->last_name,
                'full_name'  => request()->first_name . " " . request()->last_name,
                'email'      => request()->email,
                'password'   => Hash::make(12345678),
                'image'      => "https://ui-avatars.com/api/?background=random&name=" . request()->first_name . " " . request()->last_name,
            ]);
            $customerData = array_merge(request([
                'first_name', 'last_name', 'email', 'password'
            ]), ['is_active' => false, 'aec_user_id' =>  $AecUsers->id]);

            $insert = Customer::create($customerData);

            if ($insert) {
                $customer = Customer::find($insert->id);
                $this->sendMail([
                    'full_name' => $customer->full_name,
                    'route'     => route('company-info', encrypt($customer->id)),
                    'email'     => $customer->email
                ]);
                Flash::success(__('auth.email_send_for_verification'));
                return redirect()->route('login');
            }
            Flash::success(__('global.something'));
            return redirect()->route('admin-dashboard');
        } catch (Exception $e) {
            Flash::error(__('global.something'));
            Log::info($e->getMessage());
            return redirect()->route('login');
        }
    }

    public function signup_resend($email)
    {
        try {
            $customer = Customer::where('email', $email)->first();
            $this->sendMail([
                'full_name' => $customer->full_name,
                'route'     => route('company-info', encrypt($customer->id)),
                'email'     => $customer->email
            ]);
            Flash::success(__('auth.resend_email_success'));
        } catch (\Throwable $th) {
            Flash::error('Invalid Action');
        }
        return redirect()->route('login');
    }

    public function sendMail($details)
    {
        return Mail::to($details['email'])->send(new \App\Mail\RegisterCustomerMail($details));
    }
    public function sendRemainderMail($details)
    {
        return Mail::to($details['email'])->send(new \App\Mail\RemainderCustomerMail($details));
    }

    public function CompanyInfo($id)
    {
        $id                = decrypt($id);
        $customer          = Customer::findOrFail($id);
        $data['id']        = encrypt($id);
        $data['email']     = $customer->email;
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
            'mobile_no'       => ['required', 'regex:/^\d{8}$|^\d{12}$/']
        ]);

        $response         = Http::get('https://hotell.difi.no/api/json/brreg/enhetsregisteret?query=' . $request->company_name);
        if (count($response->json()['entries'])) {
            $GetDataByZipCode = Http::get('https://api.zippopotam.us/NO/' . $response->json()['entries'][0]['forradrpostnr']);
        }

        $id = decrypt($id);
        $customer                  = Customer::with('AecUsers')->findOrFail($id);
        if (!is_null($customer->organization_no)) {
            Flash::error(__('This Email ID is already registered with our portal... Please login with your credentials'));
            return back();
        }
        $customer->AecUsers()->update([
            "email" => $request->email
        ]);
        $customer->company_name    = $request->company_name;
        $customer->organization_no = $request->organization_no;
        $customer->mobile_no       = $request->mobile_no;
        $customer->phone_no        = $request->phone_no;
        $customer->fax             = $request->fax;
        $customer->website         = $request->website;
        $customer->invoice_email   = $request->invoice_email;
        $customer->is_active       = true;
        $customer->isRegistered    = '1';

        if (count($response->json()['entries'])) {
            $customer->address         = "NO-" . $GetDataByZipCode->json()['post code'] . " " . $GetDataByZipCode->json()['places'][0]['place name'] . ", " . $GetDataByZipCode->json()['places'][0]['state'] . ", " . $GetDataByZipCode->json()['country'] . ".";
            $customer->postal_code     = $GetDataByZipCode->json()['post code'];
            $customer->city            = $GetDataByZipCode->json()['places'][0]['place name'];
            $customer->state           = $GetDataByZipCode->json()['places'][0]['state'];
            $customer->country         = $GetDataByZipCode->json()['country'];
        }


        if ($customer->save()) {
            $this->createEnquiry($customer);
            Flash::success(__('setup completed successfully'));

            Mail::to($customer['email'])->send(new \App\Mail\WelcomeEmail([
                "name"         => $customer->full_name,
                "email"        => $customer->email,
                "mobile_no"    => $customer->mobile_no,
                "company_name" => $customer->company_name,
            ]));

            Mail::to(config('mail.admin'))->send(new NewCustomerMail($customer->toArray()));
            return view('admin.customer.certification');
        }
        Flash::error(__('global.something'));
        // return redirect(route('login'));
        return view('admin.customer.certification');
    }

    private function createEnquiry($customer)
    {
        try {
            $customerEnquiryNo = GlobalService::customerEnquiryNumber();
            $customer->enquiry()->create([
                'initiate_from'           => 'customer',
                'customer_enquiry_number' => $customerEnquiryNo,
                'enquiry_number'          => 'Draft',
                'project_delivery_date'   => now()->addDays(1),
                'contact_person'          => $customer->contact_person ?? $customer->first_name,
                'project_name'            => $customer->project_name ?? '',
                'mobile_no'               => $customer->mobile_no,
                'enquiry_date'            => now()
            ]);
            GlobalService::updateConfig('CENQ');
            return $customer->enquiry;
        } catch (\Exception $ex) {
            Log::info($ex->getMessage());
        }
    }
    function checkEmailExists(Request $req)
    {
        $emailExists = Customer::where('email', $req->input('email'))->exists();
        if ($emailExists) {
            $getCustomer = Customer::where('email', $req->input('email'))->first();
            if ($getCustomer->isRegistered == '0') {
                return response()->json([
                    'msg' => 'exists'
                ]);
            } else {
                return response()->json([
                    'msg' => 'registered'
                ]);
            }
        }
        return response()->json([
            'msg' => 'not exists'
        ]);
    }
    function emailExistResendEmail(Request $req)
    {
        $validate = Validator::make(
            $req->all(),
            [
                'first_name' => 'required',
                'last_name' => 'required'

            ],
            [
                'first_name.required' => 'please fill out the first name',
                'last_name.required' => 'please fill out the last name'
            ]
        );
        if ($validate->fails()) {
            return response()->json([
                'msg' => 'errors',
                'errors' => $validate->errors()->toArray()
            ]);
        } else {
            $customer = customer::where('email', $req->email)->first();

            $this->sendMail([
                'full_name' => $customer->full_name,
                'route'     => route('company-info', encrypt($customer->id)),
                'email'     => $customer->email
            ]);

            return response()->json([
                'msg' => 'send'
            ]);
        }
    }
    public function sendRemainder(Request $req)
    {
        $customer = Customer::find($req->id);
        $customerData = [
            'full_name' => $customer->full_name,
            'route'     => route('company-info', encrypt($customer->id)),
            'email'     => $customer->email
        ];

        $mail = Mail::to($customerData['email'])->send(new RemainderCustomerMail($customerData));

        return response()->json([
            'id is' => $customer
        ]);
    }
}
