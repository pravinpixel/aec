<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Customer;


class DashboardController extends Controller
{ 
    public function enquiryDashboard()
    {
        $enquiryCount   =   Enquiry::count();
        $customerCount  =   Customer::count();

        return view('admin.dashboard.enquiry',
                        compact(
                            'enquiryCount',
                            'customerCount'
                        ));
    }
    public function projectDashboard()
    {
        
        return view('admin.dashboard.project');
    }
}
