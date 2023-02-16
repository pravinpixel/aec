<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\InvoicePlan;
use App\Models\Project;
use App\Services\GlobalService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    protected $customerId ;
    public function enquiryDashboard(Request $request) {

        if ($request->input('start_date') && $request->input('end_date')) {
            $fromDate = GlobalService::DBSDateFormat($request->input('start_date'));;
            $toDate = GlobalService::DBEDateFormat($request->input('end_date'));
        } else {
            $fromDate = Carbon::now()->subDays(30)->startOfDay();
            $toDate = Carbon::now()->endOfDay();
        }
       
        $customerId = Customer()->id;
        $totalActiveEnquiries  = Enquiry::where("customer_id",$customerId)
                                ->where('status', 'Submitted')
                                ->whereNull('project_id')
                                ->count();
        $root = DB::select("select count(*) as count from aec_enquiry_proposal aep left join aec_enquiries ae  on ae.id = aep.enquiry_id where aep.proposal_status = 'awaiting' AND  ae.customer_id = {$customerId}")[0];
        $child = DB::select("select count(*) as count from aec_propoal_versions apv left join aec_enquiries ae  on ae.id = apv.enquiry_id where  apv.proposal_status = 'awaiting' AND ae.customer_id = {$customerId}")[0];
        $totalWaitingApprovals = $root->count + $child->count;
        $totalNewInvoices      = InvoicePlan::join('projects','projects.id','=', 'invoice_plans.project_id')
                    ->where('projects.customer_id', Customer()->id) 
                    ->select(DB::raw('SUM(no_of_invoice) AS new_invoice' ))
                    ->groupBy('projects.customer_id')
                    ->get();
        if(isset($totalNewInvoices[0]->new_invoice)) {
            $totalNewInvoices =  $totalNewInvoices[0]->new_invoice;
        } else {
            $totalNewInvoices =  0;
        }
       
        $totalUnpaidInvoices   = $totalNewInvoices;
        $completedProject = Project::where('status', 'Completed')->count();

        $data['totalActiveEnquiries']  = $totalActiveEnquiries;
        $data['totalWaitingApprovals'] = $totalWaitingApprovals;
        $data['totalNewInvoices']      = $totalNewInvoices;
        $data['totalUnpaidInvoices']   = $totalUnpaidInvoices;
        $data['completedProject']      = $completedProject;
        $previousMonthFromDate = Carbon::now()->parse('first day of last month');
        $previousMonthToDate = Carbon::now()->parse('last day of last month');
        $monthList = GlobalService::getMonthListFromDate($fromDate, $toDate);
        $monthCount = [];
        $monthProjectCount = [];

        $enquiryCount = Enquiry::whereBetween('enquiry_date', [$fromDate, $toDate])
            ->where("customer_id",$customerId)
            ->select(DB::raw('count(id) as id, DATE_FORMAT(enquiry_date, "%Y-%b") AS enquiryDate'))
            ->groupBy('enquiryDate')
            ->pluck('id', 'enquiryDate');
            
        $data['category'] = $monthList;
        $data['total_enquiry'] = $enquiryCount->values()->sum();
        
        $data['current_month_amount'] = InvoicePlan::with(['project'=> function($q) use($customerId){
            return $q->where('customer_id',$customerId);
        }])->whereBetween('created_at', [$fromDate, $toDate])
            ->sum('project_cost');
        $data['previous_month_amount'] = InvoicePlan::with(['project'=> function($q) use($customerId){
            return $q->where('customer_id',$customerId);
        }])->whereBetween('created_at', [$previousMonthFromDate, $previousMonthToDate])
            ->sum('project_cost');
        foreach ($monthList as $value) {
            $monthCount[] = $enquiryCount[$value] ?? 0;
        }
        $data['category_count'] = $monthCount;


        $projectCount = Project::whereBetween('created_at', [$fromDate, $toDate])
        ->where('customer_id',$customerId)
        ->select(DB::raw('count(id) as id, DATE_FORMAT(created_at, "%Y-%b") AS projectDate'))
        ->groupBy('projectDate')
        ->pluck('id', 'projectDate');

        foreach ($monthList as $value) {
            $monthProjectCount[] = $projectCount[$value] ?? 0;
        }
        $data['total_category'] = $monthList;
        $data['total_category_count'] = $monthProjectCount;
        $start_date= GlobalService::dateFormat($fromDate);
        $end_date = GlobalService::dateFormat($toDate);
        $data['date'] = ['start_date'=> $start_date, 'end_date'=> $end_date];

        return view('customer.dashboard.enquiry')->with($data); 
    }
    public function projectDashboard() {
        $this->customerId = Customer()->id;
        $data['total'] =  Project::where('customer_id', $this->customerId)->count();
        
        $data['completed'] = Project::where(['customer_id'=> $this->customerId,'status'=>'Completed'])->count();
        $data['in_progress'] = Project::where('customer_id', $this->customerId)->whereIn('status',['Live','In-Progress'])->count();
        $data['total_cost'] = InvoicePlan::with(['project'=> function($q){
            return $q->where('customer_id',$this->customerId);
        }])
        ->sum('project_cost');
        $data['total_amount'] = 0;
        return view('customer.dashboard.project',with($data));
        
    }
}
