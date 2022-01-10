<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;


class DashboardController extends Controller
{
    public function enquiryDashborad() {

        // New Enqs
        $data           =   Enquiry::where("customer_id", Customer()->id)
                            ->where("is_active", 0)
                            ->get();


        $totaNewEnq     =   Enquiry::where("customer_id", Customer()->id)
                            ->where("is_active", 0)
                            ->count();

        // Total Enq
        $totaEnq     =   Enquiry::where("customer_id", Customer()->id) 
                        ->count();

        // Active  Enqs
        $dataActive     =   Enquiry::where("customer_id", Customer()->id)
                            ->where("is_active", 1)
                            ->get();
        $totaActiveEnq  =   Enquiry::where("customer_id", Customer()->id)
                                    ->where("is_active", 1)
                                    ->count();

        return view('customers.dashboard.enquiry',
                    compact(
                        'data',  $data , 
                        'dataActive',  $dataActive ,
                        'totaNewEnq', $totaNewEnq,
                        'totaEnq', $totaEnq,
                        'totaActiveEnq', $totaActiveEnq,
                    )); 
    }
    public function projectDashborad() {
        return view('customers.dashboard.project');
        
    }
}
