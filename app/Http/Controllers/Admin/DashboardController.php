<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Employees;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Customer;
use App\Models\DeliveryType;
use App\Models\Project;
use App\Models\ProjectType;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{ 
    public function enquiryDashboard()
    {
        $result['new_enquiries'] = Enquiry::where('status','Submitted')->whereNull('project_id')->count();
        $result['unattended_enquiries'] = Enquiry::where(['status' => 'Submitted' , 'project_status' => 'Unattended'])
                                        ->where('enquiry_number', '!=','Draft')
                                        ->where('proposal_email_status', 0)
                                        ->WhereNotIn('project_status', ['Active'])
                                        ->count();
        $result['ready_for_projects'] = Enquiry::where('customer_response',1)->whereNull('project_id')->count();
        $result['waiting_for_customer_response'] = Enquiry::where('proposal_sharing_status',1)->whereNull('project_id')->count();

        $fromDate = Carbon::now()->parse('first day of last month')->format('Y-m-d'); 
        $toDate = Carbon::now()->parse('last day of last month');
        $result['new_enquiries_last_month'] = Enquiry::where('status','Submitted')->whereBetween('enquiry_date', [$fromDate, $toDate])->count();
        $result['lost_enquiries_last_month'] = Enquiry::whereNotNull('deleted_at')->whereBetween('enquiry_date', [$fromDate, $toDate])->count();
        $result['type_of_projects'] = ProjectType::get();
        $result['type_of_deliveries'] = DeliveryType::get();
        $result['customers'] = Customer::select('full_name','id')->get();
        $result['projects'] = Project::select('project_name','id')->get();

        return view('admin.dashboard.enquiry',compact('result'));
    }

    public function getEnquirySummary(Request $request) 
    {
        if ($request->ajax() == true) {
            $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now();
            $toDate = now();
            $dataDb = Enquiry::with('customer')
                            ->when(request('type_of_project'), function($q){
                                $q->where('project_type_id',request('type_of_project'));
                            })
                            ->when(request('type_of_delivery'), function($q){
                                $q->where('project_type_id',request('type_of_delivery'));
                            })
                            ->when(request('project_name'), function($q){
                                $q->where('project_name','like',"%".request('project_name')."%");
                            })
                            ->when(request('customer'), function($q){
                                $q->where('project_type_id',request('customer'));
                            })
                            ->when(request('search_by'), function($q){
                                $q->where('enquiry_number','like',"%".request('search_by')."%");
                            })
                            ->when(request('from_date'), function($q) use($fromDate, $toDate){
                                $q->whereBetween('enquiry_date',[$fromDate, $toDate]);
                            })
                            ->where(['status' => 'Submitted' , 'project_status' => 'Unattended'])
                            ->orderBy('id', 'desc');
            return DataTables::eloquent($dataDb)
            ->editColumn('enquiry_number', function($dataDb){
                return '
                    <button type="button" class="btn-quick-view" onclick="EnquiryQuickView('.$dataDb->id.' , this)" >
                        <b>'. $dataDb->enquiry_number.'</b></button>';
            })

            ->editColumn('enquiry_date', function($dataDb) {
                $format = config('global.model_date_format');
                return Carbon::parse($dataDb->enquiry_date)->format($format);
            })

            ->addColumn('email', function($dataDb){
                return $dataDb->customer->email ?? '';
            })
            
            ->addColumn('action', function($dataDb){
                return '<div class="dropdown">
                            <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="'.route('view-enquiry', $dataDb->id).'">View / Edit</a>
                                <a type="button" class="dropdown-item delete-modal" data-header-title="Delete" data-title="Are you sure to delete this enquiry" data-action="'.route('enquiry.delete', $dataDb->id).'" data-method="DELETE" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Delete</a>
                            </div>
                        </div>';
            })
            ->rawColumns(['action','enquiry_number'])
            ->make(true);
        }
    }

    public function projectDashboard()
    { 
        $result['new_project'] = Project::where('status','Un-Established')->count();
        $result['current_project'] = Project::where('status','Live')->count();
        $result['completed_project'] = Project::where('status','Completed')->count();
        $result['new_variation_orders'] = 0;
        $result['ready_for_project'] = 0;
        return view('admin.dashboard.project', with($result));
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
