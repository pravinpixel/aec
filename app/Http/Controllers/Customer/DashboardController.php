<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function enquiryDashboard() {
        $customerId = Customer()->id;
        $totalActiveEnquiries  = Enquiry::where("customer_id",$customerId)
                                ->where('status', 'Submitted')
                                ->count();
        $root = DB::select("select count(*) as count from aec_enquiry_proposal aep left join aec_enquiries ae  on ae.id = aep.enquiry_id where aep.proposal_status = 'awaiting' AND  ae.customer_id = {$customerId}")[0];
        $child = DB::select("select count(*) as count from aec_propoal_versions apv left join aec_enquiries ae  on ae.id = apv.enquiry_id where  apv.proposal_status = 'awaiting' AND ae.customer_id = {$customerId}")[0];
        $totalWaitingApprovals = $root->count + $child->count;
        $totalNewInvoices      = 0;
        $totalUnpaidInvoices   = 0;
        $data['totalActiveEnquiries']  = $totalActiveEnquiries;
        $data['totalWaitingApprovals'] = $totalWaitingApprovals;
        $data['totalNewInvoices']      = $totalNewInvoices;
        $data['totalUnpaidInvoices']   = $totalUnpaidInvoices;
        return view('customer.dashboard.enquiry')->with($data); 
    }
    public function projectDashboard() {
        return view('customer.dashboard.project');
        
    }
}
