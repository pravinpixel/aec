<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Employees;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Customer;


class DashboardController extends Controller
{ 
    public function enquiryDashboard()
    {
        $enquiryCount   =   Enquiry::count();
        $customerCount  =   Customer::count();
        $EnqData        =   Enquiry::with('customer')                        
                                ->join("customers", "customers.id", "=" ,"enquiries.customer_id")
                                ->get();
        $adminData          =   Employees::where('id', Admin()->id)->firstOrFail();
         
        return view('admin.dashboard.enquiry',
                        compact(
                            'enquiryCount',
                            'customerCount',
                            'EnqData',
                            'adminData'
                        ));
    }
    public function projectDashboard()
    { 
        return view('admin.dashboard.project');
    }

    public function economyDashboard()
    {
        return view('admin.dashboard.economy');

    }

    public function allowNotification(Request $request)
    {
        $adminData                  =   Employees::where('id', Admin()->id)->firstOrFail();
        $adminData->notification    =   1;
        $adminData->save();
        return redirect()->back();
    }
}
