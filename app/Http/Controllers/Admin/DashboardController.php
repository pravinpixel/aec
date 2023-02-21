<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Employees;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Customer;
use App\Models\DeliveryType;
use App\Models\InvoicePlan;
use App\Models\Project;
use App\Models\ProjectType;
use App\Services\GlobalService;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function enquiryDashboard(Request $request)
    {
        if ($request->input('start_date') && $request->input('end_date')) {
            $fromDate = GlobalService::DBSDateFormat($request->input('start_date'));;
            $toDate = GlobalService::DBEDateFormat($request->input('end_date'));
        } else {
            $fromDate = Carbon::now()->subDays(30)->startOfDay();
            $toDate = Carbon::now()->endOfDay();
        }
        $previousMonthFromDate = Carbon::now()->parse('first day of last month');
        $previousMonthToDate = Carbon::now()->parse('last day of last month');
        $now = Carbon::now();
        $result['new_enquiries'] = Enquiry::where('status', 'Submitted')
            ->whereBetween('enquiry_date', [$fromDate, $toDate])
            ->whereNull('project_id')
            ->count();
        $result['unattended_enquiries'] = Enquiry::where(['status' => 'Submitted', 'project_status' => 'Unattended'])
            ->where('enquiry_number', '!=', 'Draft')
            ->where('proposal_email_status', 0)
            ->WhereNotIn('project_status', ['Active'])
            ->whereBetween('enquiry_date', [$fromDate, $toDate])
            ->count();
        $result['ready_for_projects'] = Enquiry::where('customer_response', 1)
            ->whereBetween('enquiry_date', [$fromDate, $toDate])
            ->whereNull('project_id')
            ->count();
        $result['waiting_for_customer_response'] = Enquiry::where(['proposal_email_status'=> 1])
            ->whereBetween('enquiry_date', [$fromDate, $toDate])
            ->whereNull('project_id')->count();
        $result['new_enquiries_last_month'] = Enquiry::where('status', 'Submitted')
            ->whereBetween('enquiry_date', [$previousMonthFromDate, $now])
            ->count();
        $result['lost_enquiries_last_month'] = Enquiry::whereNotNull('deleted_at')
            ->whereBetween('enquiry_date', [$fromDate, $toDate])
            ->count();
        $result['type_of_projects'] = ProjectType::get();
        $result['type_of_deliveries'] = DeliveryType::get();
        $result['customers'] = Customer::select('full_name', 'id')->get();
        $result['projects'] = Project::select('project_name', 'id')->get();
        $date['start_date'] = GlobalService::dateFormat($fromDate);
        $date['end_date'] = GlobalService::dateFormat($toDate);
        $monthList = GlobalService::getMonthListFromDate($fromDate, $toDate);
        $monthCount = [];
        $enquiryCount = Enquiry::whereBetween('enquiry_date', [$fromDate, $toDate])
            ->select(DB::raw('count(id) as id, DATE_FORMAT(enquiry_date, "%Y-%b") AS enquiryDate'))
            ->groupBy('enquiryDate')
            ->pluck('id', 'enquiryDate');
        $result['category'] = $monthList;
        $result['total_enquiry'] = $enquiryCount->values()->sum();
        $result['current_month_amount'] = InvoicePlan::whereBetween('created_at', [$fromDate, $toDate])
            ->sum('project_cost');

        $result['previous_month_amount'] = InvoicePlan::whereBetween('created_at', [$previousMonthFromDate, $previousMonthToDate])
            ->sum('project_cost');
        foreach ($monthList as $value) {
            $monthCount[] = $enquiryCount[$value] ?? 0;
        }
        $result['category_count'] = $monthCount;
        return view('admin.dashboard.enquiry', compact('result', 'date'));
    }

    public function getEnquirySummary(Request $request)
    {
        if ($request->ajax() == true) {

            if (request('start_date') && request('end_date')) {
                $fromDate = GlobalService::DBSDateFormat(request('start_date'));;
                $toDate = GlobalService::DBEDateFormat(request('end_date'));
            } else {
                $fromDate = Carbon::now()->subDays(30)->startOfDay();
                $toDate = Carbon::now()->endOfDay();
            }
            $dataDb = Enquiry::with(['customer','projectType','buildingType'])
                ->when(request('type_of_project'), function ($q) {
                    $q->where('project_type_id', request('type_of_project'));
                })
                ->when(request('type_of_delivery'), function ($q) {
                    $q->where('project_type_id', request('type_of_delivery'));
                })
                ->when(request('project_name'), function ($q) {
                    $q->where('project_name', 'like', "%" . request('project_name') . "%");
                })
                ->when(request('customer'), function ($q) {
                    $q->where('project_type_id', request('customer'));
                })
                ->when(request('search_by'), function ($q) {
                    $q->where('enquiry_number', 'like', "%" . request('search_by') . "%");
                })
                ->when(request('from_date'), function ($q) use ($fromDate, $toDate) {
                    $q->whereBetween('enquiry_date', [$fromDate, $toDate]);
                })
                ->where(['status' => 'Submitted'])
                ->orderBy('id', 'desc');
            return DataTables::eloquent($dataDb)
                ->editColumn('enquiry_number', function ($dataDb) {
                    return '
                    <button type="button" class="btn-quick-view" onclick="EnquiryQuickView(' . $dataDb->id . ' , this)" >
                        <b>' . $dataDb->enquiry_number . '</b></button>';
                })

                ->editColumn('enquiry_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->enquiry_date)->format($format);
                })

                ->addColumn('email', function ($dataDb) {
                    return $dataDb->customer->email ?? '';
                })
                ->addColumn('projectType', function($dataDb){
                    return $dataDb->projectType->project_type_name ?? '';
                })
                ->addColumn('buildingType', function($dataDb){
                    return $dataDb->buildingType->building_type_name ?? '';
                })
                ->addColumn('action', function ($dataDb) {
                    return '<div class="dropdown">
                            <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="' . route('view-enquiry', $dataDb->id) . '">View / Edit</a>
                                <a type="button" class="dropdown-item delete-modal" data-header-title="Delete" data-title="Are you sure to delete this enquiry" data-action="' . route('enquiry.delete', $dataDb->id) . '" data-method="DELETE" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Delete</a>
                            </div>
                        </div>';
                })
                ->rawColumns(['action', 'enquiry_number'])
                ->make(true);
        }
    }

    public function projectDashboard()
    {
        $result['new_project'] = Project::where('status', 'Un-Established')->count();
        $result['current_project'] = Project::where('status', 'Live')->count();
        $result['completed_project'] = Project::where('status', 'Completed')->count();
        $result['new_variation_orders'] = 0;
        $result['ready_for_project'] = Project::where(['status'=> 'Un-Established','is_new_project'=> 1])->count();
        $fromDate = Carbon::now()->startOfYear();
        $toDate = Carbon::now()->endOfYear();

        $monthList = GlobalService::getMonthListFromDate($fromDate, $toDate);
        $monthCount = [];

        $sales = Project::join('invoice_plans', 'invoice_plans.project_id', '=','projects.id')
            ->join('customers', 'customers.id', '=','projects.customer_id')
            ->select(DB::raw('SUM(project_cost) as projectCost,
                full_name as customerName
            '))
            ->whereBetween('projects.created_at', [$fromDate, $toDate])
            ->groupBy('customer_id')
            ->pluck('projectCost','customerName');

        $result['sale_by_series'] = $sales->values();
        $result['sale_by_customer'] = $sales->keys();


        $estimatedHours = Project::join('customers', 'customers.id', '=','projects.customer_id')
            ->select(DB::raw('from_unixtime( SUM(TIMESTAMPDIFF(SECOND, start_date, delivery_date)), "%H:%i:%s") AS hours,
            full_name'))
            ->whereBetween('projects.created_at', [$fromDate, $toDate])
            ->groupBy('customer_id')
            ->pluck('hours','full_name');

        $result['estimated_customers'] = $estimatedHours->keys();
        $result['estimated_hours'] = $estimatedHours->values();

        $running_projects = Project::whereBetween('created_at', [$fromDate, $toDate])
                ->whereIn('status', ['In-Progress','Live'])
                ->select('progress_percentage',
                'project_name', 
                 DB::raw('TIMEDIFF(delivery_date, start_date) AS time_diff'))
                ->get();
        $result['running_projects'] = $running_projects;
        return view('admin.dashboard.project', with($result));
    }


    public function getFromAndToDate($value)
    {
        switch ($value){
            case 'one_quarter':
                $fromDate = Carbon::now()->subMonth(3)->startOfMonth();
                $toDate = Carbon::now()->endOfMonth();
                break;
            case 'one_year':
                $fromDate = Carbon::now()->startOfYear();
                $toDate = Carbon::now()->endOfYear();
                break;
            case 'two_year':
                $fromDate = Carbon::now()->subYear(1)->startOfMonth();
                $toDate = Carbon::now()->endOfMonth();
                break;
            default:
                $fromDate = Carbon::now()->startOfMonth();
                $toDate = Carbon::now()->endOfMonth();
                break;
        }
        return [$fromDate, $toDate];
    }

    public function totalSale(Request $request)
    {
        $date = $request->input('filter');
        list($fromDate, $toDate) = $this->getFromAndToDate($date);
        $monthList = GlobalService::getMonthListFromDate($fromDate, $toDate);
        $monthCount = [];
        $projectCount = Project::whereBetween('created_at', [$fromDate, $toDate])
            ->select(DB::raw('count(id) as id, DATE_FORMAT(created_at, "%Y-%b") AS projectDate'))
            ->groupBy('projectDate')
            ->pluck('id', 'projectDate');
        $result['category'] = $monthList;
        foreach ($monthList as $value) {
            $monthCount[] = $projectCount[$value] ?? 0;
        }
        $result['category'] = $monthList;
        $result['category_count'] = $monthCount;
        return $result;
    }

    public function saleByCustomer(Request $request)
     {
        $date = $request->input('filter');
        list($fromDate, $toDate) = $this->getFromAndToDate($date);
        $sales = Project::join('invoice_plans', 'invoice_plans.project_id', '=','projects.id')
            ->join('customers', 'customers.id', '=','projects.customer_id')
            ->select(DB::raw('SUM(project_cost) as projectCost,
                full_name as customerName
            '))
            ->whereBetween('projects.created_at', [$fromDate, $toDate])
            ->groupBy('customer_id')
            ->pluck('projectCost','customerName');

        $result['sale_by_series'] = $sales->values();
        $result['sale_by_customer'] = $sales->keys();
        return $result;
     }

    public function getProjectSummary(Request $request)
    {
        if ($request->ajax() == true) {
            $format = config('global.model_date_format');
            if (request('start_date') && request('end_date')) {
                $fromDate = GlobalService::DBSDateFormat(request('start_date'));;
                $toDate = GlobalService::DBEDateFormat(request('end_date'));
            } else {
                $fromDate = Carbon::now()->subDays(30)->startOfDay();
                $toDate = Carbon::now()->endOfDay();
            }
            $dataDb = Project::with(['customer','deliveryType','invoicePlan','enquiry'])
                ->orderBy('id', 'desc');
            return DataTables::eloquent($dataDb)
                ->editColumn('reference_number', function ($dataDb) {
                    return '
                    <button type="button" class="btn-quick-view">
                        <b>' . $dataDb->reference_number . '</b></button>';
                })
                ->addColumn('customer', function($dataDb) {
                    return $dataDb->customer->full_name;
                })
                ->addColumn('deliveryType', function($dataDb) {
                    return $dataDb->deliveryType->delivery_type_name;
                })
                ->addColumn('original_price', function($dataDb) {
                    return $dataDb->enquiry->costEstimate->total_cost ?? 0;
                })
                ->addColumn('vr', function($dataDb) {
                    return '';
                })
                ->addColumn('invoicePlan', function($dataDb) {
                    return $dataDb->invoicePlan->project_cost ?? 0;
                })
                ->addColumn('engineering_hours', function($dataDb) {
                    $totalDuration = Carbon::parse($dataDb->delivery_date)->diffInMinutes($dataDb->start_date);
                    return gmdate('H:i:s', $totalDuration);
                })
                ->editColumn('start_date', function ($dataDb) use($format) {
                
                    return Carbon::parse($dataDb->enquiry_date)->format($format);
                })
                ->editColumn('delivery_date', function ($dataDb) use($format) {
                   
                    return Carbon::parse($dataDb->enquiry_date)->format($format);
                })
                ->editColumn('created_at', function ($dataDb) use($format) {
                    
                    return Carbon::parse($dataDb->enquiry_date)->format($format);
                })
                ->editColumn('progress_percentage',  function ($dataDb){
                    return $dataDb->progress_percentage.'%';
                })
                ->rawColumns(['action', 'reference_number'])
                ->make(true);
        }
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
