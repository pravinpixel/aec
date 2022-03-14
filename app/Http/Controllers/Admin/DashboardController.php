<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Customer;
use App\Models\Employee;


class DashboardController extends Controller
{ 
    public function enquiryDashboard()
    {
        $enquiryCount   =   Enquiry::count();
        $customerCount  =   Customer::count();
        $EnqData        =   Enquiry::with('customer')                        
                                ->join("customers", "customers.id", "=" ,"enquiries.customer_id")
                                ->get();
        $adminData          =   Employee::where('id', Admin()->id)->firstOrFail();
         
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
    public function allowNotification(Request $request)
    {
        $adminData                  =   Employee::where('id', Admin()->id)->firstOrFail();
        $adminData->notification    =   1;
        $adminData->save();
        return redirect()->back();
    }
}
