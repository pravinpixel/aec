<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;


class DashboardController extends Controller
{
    public function enquiryDashborad() {
        $data           =   Enquiry::where("customer_id", Customer()->id)->get();
        $totaNewEnq     =   Enquiry::where("customer_id", Customer()->id)->count();
        $totaActiveEnq  =   Enquiry::where("customer_id", Customer()->id)->count();

        return view('customers.dashboard.enquiry',
                    compact(
                        'data',  $data , 
                        'totaNewEnq', $totaNewEnq,
                        'totaActiveEnq', $totaActiveEnq,
                    )); 
    }
    public function projectDashborad() {
        return view('customers.dashboard.project');
        
    }
}
