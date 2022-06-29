<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\CustomerProfileRequest;
use App\Http\Requests\UpdateCustomerDetailRequest;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.customer.index');
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
        $customer =   Customer::findOrFail($id);
        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerDetailRequest $request, $id)
    {
        $customer                  = Customer::findOrFail($id);
        $customer->first_name      = $request->input('first_name');
        $customer->last_name       = $request->input('last_name');
        $customer->company_name    = $request->input('company_name');
        $customer->organization_no = $request->input('organization_no');
        $customer->fax             = $request->input('fax');
        $customer->phone_no        = $request->input('phone_no');
        $customer->mobile_no       = $request->input('mobile_no');
        $customer->website         = $request->input('website');
        $customer->email           = $request->input('email');
        $customer->invoice_email   = $request->input('invoice_email');
        $customer->is_active       = true;
        if ($request->password) {
            $validator = Validator::make($request->all(), [
                'password' => 'min:8',
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $customer->password   = $request->input('password');
            try {
                $details = [
                    'title'      => 'Reset Password',
                    'password'   => $request->input('password'),
                    'url'        => route('login'),
                    'first_name' => $customer->first_name ?? ''
                ];
                Mail::to($customer->email)->send(new \App\Mail\UpdateCustomerMail($details));
            }catch (Exception $ex){
                Log::info($ex->getMessage());
            }
        }
        $result                    = $customer->save();
        if($result) {
            Flash::success(__('global.updated'));
            return redirect(route('admin.customer.index'));
        }
        Flash::error(__('global.something'));
        return redirect(route('admin.customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        if($customer->delete()) {
            Flash::success(__('global.deleted'));
            return redirect(route('admin.customer.index'));
        }
        Flash::error(__('global.something'));
        return redirect(route('admin.customer.index'));
    }

    public function getLoginCustomer()
    {
        $customer =  Customer::find(Customer()->id);
        return response(['status' => true, 'customer' =>  $customer]);
    }

    public function profile()
    {
        $id = Customer()->id;
        $customer = Customer::find($id);
        return view('customer.pages.profile', compact('customer'));
    }

    public function updateProfile(CustomerProfileRequest $request)
    {
        $id = Customer()->id;
        $data = $request->except(['_token','_method']);
        $customer = Customer::find($id)->update($data);
        if($customer) {
            Flash::info(__('global.updated'));
        }
        return redirect(route('customers-dashboard'));
    }

    public function inActiveDatatable(Request $request)
    {
        if ($request->ajax() == true) {
            $dataDb = Customer::where('is_active',0);
            return DataTables::eloquent($dataDb)
                    ->editColumn('is_active', function($dataDb){
                        $status = '';
                        if($dataDb->is_active == 0){
                            $status = '<small class="px-1 bg-danger text-white rounded-pill text-center">In active</small>';
                        }
                        return $status;
                    })
                    ->addColumn('action', function($dataDb){
                        return '
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a type="button" class="dropdown-item" href="'.route('admin.customer.edit', $dataDb->id).'"> Edit </a>
                                        <a type="button" class="dropdown-item delete-modal" data-header-title="Delete Customer" data-title="'.trans('enquiry.delete_customer', ['customer' => $dataDb->first_name]).'"data-action="'.route('admin.customer.destroy',[$dataDb->id]).'" data-method="DELETE" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Delete</a>
                                    </div>
                                    
                                </div>
                            ';
                    })
                    ->rawColumns(['action', 'is_active'])
                    ->make(true);
        }
    }

    public function activeDatatable(Request $request)
    {
        if ($request->ajax() == true) {
            $dataDb = Customer::where('is_active',1);
            return DataTables::eloquent($dataDb)
                    ->editColumn('is_active', function($dataDb){
                        $status = '';
                        if($dataDb->is_active == 1){
                            $status = '<small class="px-1 bg-success text-white rounded-pill text-center">Active</small>';
                        }
                        return $status;
                    })
                    ->addColumn('action', function($dataDb){
                        return '
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a type="button" class="dropdown-item" href="'.route('admin.customer.edit', $dataDb->id).'"> Edit </a>
                                        <a type="button" class="dropdown-item delete-modal" data-header-title="Inactive Customer" data-title="'.trans('enquiry.inactive_customer', ['customer' => $dataDb->first_name]).'"data-action="'.route('admin.customer.status',[$dataDb->id]).'" data-method="PUT" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Inactive</a>
                                        <a type="button" class="dropdown-item delete-modal" data-header-title="Delete Customer" data-title="'.trans('enquiry.delete_customer', ['customer' => $dataDb->first_name]).'"data-action="'.route('admin.customer.destroy',[$dataDb->id]).'" data-method="DELETE" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Delete</a>
                                    </div>
                                </div>
                            ';
                    })
                    ->rawColumns(['action', 'is_active'])
                    ->make(true);
        }
    }

    public function status($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->is_active = !$customer->is_active;
        if($customer->save()) {
            Flash::success(__('global.updated'));
            return redirect(route('admin.customer.index'));
        }
        Flash::error(__('global.something'));
        return redirect(route('admin.customer.index'));
    }
}
