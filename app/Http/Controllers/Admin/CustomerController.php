<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\CustomerProfileRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        $customer->destroy();
        return false;
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
        if($customer ) {
            Flash::info(__('global.updated'));
        }
        return redirect(route('customers-dashboard'));
    }

    public function datatable(Request $request)
    {

        if ($request->ajax() == true) {
         
            $dataDb = Customer::query();
            return DataTables::eloquent($dataDb)
                    ->editColumn('is_active', function($dataDb){
                        if($dataDb->is_active == 0){
                            $status = '<small class="px-1 bg-danger text-white rounded-pill text-center">In active</small>';
                        }
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
                                        <a type="button" class="dropdown-item delete-modal" data-header-title="Activate Enquiry" data-title="'.trans('Change status',['enquiry_no' => $dataDb->id]).'" data-action="'.route('admin.customer.status',[$dataDb->id]).'" data-method="POST" data-bs-toggle="modal" data-bs-target="#primary-header-modal">'.trans('enquiry.active').'</a>
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
        return $customer->save();
    }
}
