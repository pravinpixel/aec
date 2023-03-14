<?php

namespace App\Http\Controllers\TechnicalEstimate;

use App\Http\Controllers\Controller;
use App\Interfaces\EnquiryCommentRepositoryInterface;
use App\Models\Enquiry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    protected $enquiryCommentRepo;

    public function __construct(EnquiryCommentRepositoryInterface $enquiryCommentRepo)
    {
        $this->enquiryCommentRepo = $enquiryCommentRepo;
    }

    public function getEnquiryByTechStatus($status)
    {
        return Enquiry::with('technicalEstimate')->whereHas('technicalEstimate', function ($q) use ($status) {
            $q->where('assign_to', Admin()->id)
                ->when(!is_null($status), function ($techQ) use ($status) {
                    $techQ->where('assign_for_status', $status);
                });
        })->get();
    }

    public function index()
    {
        $verifed = 0;
        $pending = 0;
        foreach($this->getEnquiryByTechStatus(1) as $row) {
            $verifed += 1;
        }
        foreach($this->getEnquiryByTechStatus(0) as $row) {
            $pending += 1;
        }
        $total   = $verifed + $pending;
        return view('technical-estimate.dashboard', compact('pending', 'verifed', 'total'));
    }

    public function enquiries()
    {

        return view('technical-estimate.enquiries');
    }

    public function getAssignedEnquiry(Request $request)
    {
        if ($request->ajax() == true) {
            $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now()->subDays(config('global.date_period'));
            $toDate = isset($request->from_date) ? Carbon::parse($request->to_date)->format('Y-m-d') : now();
            $enquiryNumber = isset($request->enquiry_number) ? $request->enquiry_number : false;

            $dataDb = Enquiry::with('technicalEstimate')
                ->whereHas('technicalEstimate', function ($q) {
                    $q->where('assign_to', Admin()->id);
                })
                ->where(['status' => 'Submitted', 'project_status' => 'Unattended', 'technical_estimation_status' => 0])
                ->whereBetween('enquiry_date', [$fromDate, $toDate])
                ->when($enquiryNumber, function ($q) use ($enquiryNumber) {
                    $q->where('enquiry_number', $enquiryNumber);
                });

            return DataTables::eloquent($dataDb)
                ->editColumn('enquiry_number', function ($dataDb) {
                    return '
                        <button type="button" class="btn-quick-view" onclick="EnquiryQuickView('.$dataDb->id.' , this)">
                            <b>' . $dataDb->enquiry_number . '</b>
                        </button>
                    ';
                })

                ->addColumn('projectType', function ($dataDb) {
                    return $dataDb->projectType->project_type_name ?? '';
                })

                ->editColumn('status', function ($dataDb) {
                    $status = ($dataDb->technicalEstimate->assign_for_status == 0 ? 'Pending' : 'Verified');
                    $statusColor = ($dataDb->technicalEstimate->assign_for_status == 0 ? 'bg-danger' : 'bg-success');
                    return '<small class="px-1  text-white rounded-pill text-center ' . $statusColor . ' ">' . $status  . '</small>';
                })

                ->editColumn('enquiry_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->enquiry_date)->format($format);
                })

                ->addColumn('action', function ($dataDb) {
                    return '<a href="' . route('technical-estimate.show', $dataDb->id) . '" class="btn btn-primary btn-sm"> View / Update </button>';
                })
                ->rawColumns(['action', 'enquiry_number', 'status'])
                ->make(true);
        }
    }

    public function show($enquiry_id)
    {
        $dataDb = Enquiry::with(['technicalEstimate' =>  function ($q) {
            $q->where('assign_to', Admin()->id);
        }])->findOrFail($enquiry_id);

        $comments = $this->enquiryCommentRepo->getTechnicalEstimateCount($enquiry_id)->pluck('comments_count', 'created_by');
        if (is_null($dataDb->technicalEstimate)) {
            abort(404);
        }
        return view('technical-estimate.show', compact('enquiry_id', 'comments'));
    }
}
