<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;


class DashboardController extends Controller
{
    public function enquiryDashborad() {
        // Total Enq
        $totaCancelledEnquiry = Enquiry::where("customer_id", Customer()->id) 
                        ->where('status', 'Closed')
                        ->count();

        $totaActiveEnquiry  =   Enquiry::where("customer_id", Customer()->id)
                                ->where('status', 'Submitted')
                                ->count();

        $totalNewEnquiry     =   Enquiry::where("customer_id", Customer()->id)
                            ->where('status' ,'In-Complete')            
                            ->count();

        $totalEnquiry = $totalNewEnquiry   + $totaActiveEnquiry + $totaCancelledEnquiry ;
        return view('customer.dashboard.enquiry', compact('totalEnquiry', 'totalNewEnquiry','totaActiveEnquiry','totaCancelledEnquiry' )); 
    }
    public function projectDashborad() {
        return view('customer.dashboard.project');
        
    }
}
