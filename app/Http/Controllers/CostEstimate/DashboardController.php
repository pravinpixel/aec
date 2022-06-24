<?php

namespace App\Http\Controllers\CostEstimate;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {   
        return view('cost-estimate.dashboard');
    }

    public function getAssignedEnquiry(Request $request)
    {
        if ($request->ajax() == true) {
            $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now()->subDays(config('global.date_period'));
            $toDate = isset($request->from_date) ? Carbon::parse($request->to_date)->format('Y-m-d') : now();
            $enquiryNumber = isset($request->enquiry_number) ? $request->enquiry_number : false;

            $dataDb = Enquiry::with('costEstimate')
                                ->whereHas('costEstimate', function($q){
                                    $q->where('assign_to', Admin()->id);
                                })
                                ->where(['status' => 'Submitted' , 'project_status' => 'Unattended', 'cost_estimation_status' => 0])
                                ->whereBetween('enquiry_date', [$fromDate, $toDate])
                                ->when( $enquiryNumber, function($q) use($enquiryNumber){
                                    $q->where('enquiry_number', $enquiryNumber);
                                });
                            
            return DataTables::eloquent($dataDb)

            ->editColumn('enquiry_number', function($dataDb){
                return '
                    <button type="button" class="badge badge-primary-lighten text-primary btn p-2 position-relative border-primary">
                        <b>'. $dataDb->enquiry_number.'</b>
                    </button>
                ';
            })

            ->addColumn('projectType', function($dataDb){
                return $dataDb->projectType->project_type_name ?? '';
            })

            ->editColumn('status', function($dataDb){
                $status = ($dataDb->costEstimate->assign_for_status == 0 ? 'Pending' : 'Verified');
                $statusColor = ($dataDb->costEstimate->assign_for_status == 0 ? 'bg-danger' : 'bg-success');
                return '<small class="px-1  text-white rounded-pill text-center '.$statusColor.' ">'. $status  .'</small>';
            })
    
            ->editColumn('enquiry_date', function($dataDb) {
                $format = config('global.model_date_format');
                return Carbon::parse($dataDb->enquiry_date)->format($format);
            })
        
            ->addColumn('action', function($dataDb){
                return '<a href="'.route('cost-estimate.show', $dataDb->id).'" class="btn btn-primary btn-sm"> View / Update </button>';
            })
            ->rawColumns(['action','enquiry_number','status'])
            ->make(true);
        }
    }

    public function show($enquiry_id)
    {
        $dataDb = Enquiry::with(['costEstimate' =>  function($q){
            $q->where('assign_to', Admin()->id);
        }])->findOrFail($enquiry_id);
        if(is_null($dataDb->costEstimate)){
            abort(404);
        }
        return view('cost-estimate.show', compact('enquiry_id'));
    }
}
