<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Interfaces\ProjectRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    protected $projectRepo;

    public function __construct(
       ProjectRepositoryInterface $projectRepo
    ){
        $this->projectRepo = $projectRepo;
    }

    public function index()
    {
        return view('admin.projects.index');
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function edit($id)
    {
        return view('admin.projects.edit');
    }

    public function createWizard()
    {
        return view('admin.projects.wizard.create-project');
    }

    public function platform()
    {
        return view('admin.projects.wizard.platform');
    }

    public function teamSetup()
    {
        return view('admin.projects.wizard.team-setup');
    }

    public function schedule()
    {
        return view('admin.projects.wizard.project-schedule');
    }

    public function todoListing()
    {
        return view('admin.projects.wizard.to-do-listing');
    }

    public function invoicePlan()
    {
        return view('admin.projects.wizard.invoice-plan');
    }
    
    public function unestablishedProjectList(Request $request)
    {
        if ($request->ajax() == true) {
            $dataDb = $this->projectRepo->unestablishedProjectList($request);
            return DataTables::eloquent($dataDb)
            ->editColumn('reference_number', function($dataDb){
                return '
                    <button type="button" class="badge badge-primary-lighten text-primary btn p-2 position-relative border-primary" ng-click=toggle("edit",'.$dataDb->id.')>
                        <b>'. $dataDb->reference_number.'</b>
                    </button>
                ';
            })
            ->editColumn('start_date', function($dataDb) {
                $format = config('global.model_date_format');
                return Carbon::parse($dataDb->start_date)->format($format);
            })
            ->editColumn('delivery_date', function($dataDb) {
                $format = config('global.model_date_format');
                return Carbon::parse($dataDb->delivery_date)->format($format);
            })
            ->addColumn('pipeline', function($dataDb){
                return '<div class="btn-group" ng-click=toggle("edit",'.$dataDb->id.')>
                    <button  class="btn progress-btn '.($dataDb->status == 'Active' ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Initiation"></button> 
                    <button  class="btn progress-btn '.($dataDb->technical_estimation_status == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Technical Estimation"></button> 
                    <button  class="btn progress-btn '.($dataDb->cost_estimation_status == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cost Estiringmation"></button> 
                    <button  class="btn progress-btn '.($dataDb->proposal_sharing_status == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Proposal Sharing"></button> 
                    <button  class="btn progress-btn '.($dataDb->customer_response == 1 ? "active": "").'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Customer Response"></button>
                </div>';
            })
            ->addColumn('action', function($dataDb){
                return '<div class="dropdown">
                            <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="'.route('edit-projects', $dataDb->id).'">View / Edit</a>
                                <a type="button" class="dropdown-item delete-modal" data-header-title="Delete" data-title="Are you sure to delete this enquiry" data-action="'.route('enquiry.delete', $dataDb->id).'" data-method="DELETE" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Delete</a>
                            </div>
                        </div>';
            })
            ->rawColumns(['action', 'pipeline','reference_number'])
            ->make(true);
        }
    }

    public function liveProjectList()
    {
        
    }

    public function completedProjectList()
    {
        
    }

}
