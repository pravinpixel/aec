<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Interfaces\CustomerRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Customer;
use App\Models\Enquiry;
use App\Services\GlobalService;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EnquiryController extends Controller
{
    
    protected $user;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customer = $customerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {

        if ($req->all()) {

            $req_from   =   isset($req->from_date) ?  $req->from_date : Carbon::now()->subDays(6);
            $from       =   Carbon::parse($req_from)->startOfDay();
            $req_to     =   isset($req->to_date) ?  $req->to_date : Carbon::now();
            $to         =   Carbon::parse($req_to)->startOfDay();
            $status     =   $req->status;
            $type       =   $req->type;
            $data       =   Enquiry::whereBetween('created_at', [$from, $to])
                                        ->when($status,  function($q) use($status) {
                                            $q->where('status', $status);
                                        })  
                                        ->when($type,  function($q) use($type) {
                                            $q->where('type', $type);
                                        })
                                    ->latest()
                                    ->get();
            return $data;
        }  
        
        return Enquiry::latest()->limit(20)->get();
        
    }
    public function singleIndex($id) {
        return Enquiry::with('customer')->where('customer_id', $id)->first();
    }
   

    public function singleIndexPage($id=null) {
        if ($id) {
            $data   =   Enquiry::with('customer')->where('customer_id', $id)->first();
            return view('admin.pages.view-enquiry',compact('data',  $data )); 
        }else {
            return redirect()->route('admin-view-sales-enquiries');
        }
    }

    public function getEnquiryNumber(Request $request)    { 
        return  GlobalService::enquiryNumber();  
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCustomerRequest $request)
    {
        DB::beginTransaction();
        try {
            $latest_enquiry_number = GlobalService::enquiryNumber();
            if($request->enquiry_number != $latest_enquiry_number) {
                return response(['status' => false, 'data' => '' ,'msg' => trans('enquiry.number_mismatch')], Response::HTTP_OK);
            }
            $password   =   'customer@123';
            $email      =   $request->email;
            $password   =   Str::random(8);
            $data = [
                'customer_enquiry_date' => Carbon::now(),
                'full_name'             => $request->user_name,
                'company_name'          => $request->company_name,
                'contact_person'        => $request->contact_person,
                'remarks'               => $request->remarks,
                'mobile_no'             => $request->mobile_no,
                'email'                 => strtolower($email),
                'password'              => Hash::make($password),
                'created_by'            => 1,
                'updated_by'            => 1,
                'is_active'             => 1
            ];
            $customer = $this->customer->create($data);
            $customer->enquiry()->create(['enquiry_number' => $latest_enquiry_number, 'enquiry_date' => now()]);
            DB::commit();
            GlobalService::updateConfig('ENQ');
            $details = [
                'customer_name'     => $request->contact_person,
                'customer_email'    => $request->email,
                'customer_pws'      => $password
            ]; 
            Mail::to($request->email)->send(new \App\Mail\Enquiry($details));
            return response(['status' => true, 'data' => $customer ,'msg' => trans('enquiry.created')], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollBack();
            return response(['status' => false, 'data' => '' ,'msg' => trans('global.something')], Response::HTTP_OK);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id)->where('is_active',1);

        if( empty( $customer ) ) {
            return response(['status' => false, 'msg' => trans('enquiry.item_not_found')],  Response::HTTP_OK);
        } 
        return response(['status' => true, 'msg' =>'', 'data' => $customer ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        $customer = Customer::find($id)->where('is_active',1);
        if( empty($customer) ) {
            return response(['status' => false, 'msg' => trans('enquiry.item_not_found')],  Response::HTTP_OK);
        }
        $customer->company_name   = $request->company_name;
        $customer->contact_person = $request->contact_person;
        $customer->mobile_number  = $request->mobile_number;
        $customer->email          = $request->email;
        $customer->enquiry_date   = $request->enquiry_date;
        $customer->full_name      = $request->user_name;
        $res = $customer->save();
        if($res) {
            return response(['status' => true, 'data' => $res ,'msg' => trans('enquiry.updated')], Response::HTTP_OK);
        }
        return response(['status' => false ,'msg' => trans('global.something')], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
 
    public function status($id) {
        $customer = Customer::find($id);
        if( empty($customer) ) {
            return response(['status' => false, 'msg' => trans('enquiry.item_not_found')],  Response::HTTP_OK);
        }
        $customer->is_active = !$customer->is_active;
        $res = $customer->save();
        if( $res ) {
            return response(['status' => true, 'msg' => trans('enquiry.status_updated'), 'data' => $customer], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('enquiry.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    } 
}
