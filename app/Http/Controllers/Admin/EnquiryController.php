<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Services\GlobalService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Customer::get();
    }

    public function getEnquiryNumber(Request $request)    {
       
            
       $enq_number  =   GlobalService::enquiryNumber();

       return view("admin.pages.create-sales-enquiries")->with('enq_number', $enq_number);
         
       
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
        // dd($request->all());
         
         
        $latest_enquiry_number = GlobalService::enquiryNumber();
        
        if($request->enq_number != $latest_enquiry_number) {
            return response(['status' => false, 'data' => '' ,'msg' => trans('enquiry.number_mismatch')], Response::HTTP_OK);
        }

        
        // Random Password Generater
        $password   =   Str::random(10);

        $customer = new Customer;
        $customer->company_name     =   $request->company_name;
        $customer->contact_person   =   $request->contact_person;
        $customer->mobile_no        =   $request->mobile_number;
        $customer->email            =   $request->email;
        $customer->enquiry_date     =   $request->enquiry_date;
        $customer->full_name        =   $request->user_name;
        $customer->password         =   $password;
        $customer->is_active        =   1;
        $customer->created_by       =   001;
        $customer->enquiry_number   =   $request->enq_number;
        $customer->remarks          =   $request->remarks;


        $res = $customer->save();
        if($res) {
            return response(['status' => true, 'data' => $res ,'msg' => trans('enquiry.created')], Response::HTTP_OK);
        }
        return response(['status' => false ,'msg' => trans('global.something')], Response::HTTP_INTERNAL_SERVER_ERROR );
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
    public function destroy($id)
    {
        //
    }


    public function status($id)
    {
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
