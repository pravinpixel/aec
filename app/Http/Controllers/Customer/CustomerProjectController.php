<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class CustomerProjectController extends Controller
{
    protected $projectRepo;
    public function __construct(
        ProjectRepository $projectRepo
    ) {
        $this->projectRepo        = $projectRepo;
       
    }

    public function index(Request $request){
        return view('customer.projects.index');
    }
    public function unestablishedProjectList(Request $request)
    {
       
        if ($request->ajax() == true) {
            $dataDb = $this->projectRepo->unestablishedProjectList($request);
            return DataTables::eloquent($dataDb)
                ->editColumn('reference_number', function ($dataDb) {
                    return '
                    <button type="button" ng-click=getQuickProject("create_project",' . $dataDb->id . ') class="badge badge-primary-lighten text-primary btn p-2 position-relative border-primary" ng-click=toggle("edit",' . $dataDb->id . ')>
                        <b>' . $dataDb->reference_number . '</b>
                    </button>
                ';
                })
                ->editColumn('start_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->start_date)->format($format);
                })
                ->editColumn('delivery_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->delivery_date)->format($format);
                })
                ->addColumn('pipeline', function ($dataDb) {
                    return '<div class="btn-group">
                    <button ng-click=getQuickProject("create_project",' . $dataDb->id . ') class="btn progress-btn ' . ($dataDb->wizard_create_project == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Create"></button> 
                    <button ng-click=getQuickProject("connect_platform",' . $dataDb->id . ') class="btn progress-btn ' . ($dataDb->wizard_teamsetup == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Connect Platform"></button> 
                    <button ng-click=getQuickProject("teamsetup",' . $dataDb->id . ') class="btn progress-btn ' . ($dataDb->wizard_teamsetup == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Team Setup"></button> 
                    <button ng-click=getQuickProject("invoice_plan",' . $dataDb->id . ') class="btn progress-btn ' . ($dataDb->wizard_invoice_plan == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Invoice Plan"></button> 
                    <button ng-click=getQuickProject("to_do_list",' . $dataDb->id . ') class="btn progress-btn ' . ($dataDb->wizard_todo_list == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="To-do List"></button> 
                </div>';
                })
                ->addColumn('action', function ($dataDb) {
                    return '<div class="dropdown">
                            <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="' . route('edit-projects', $dataDb->id) . '">View / Edit</a>
                                <a type="button" class="dropdown-item delete-modal" data-header-title="Delete" data-title="Are you sure to delete this enquiry" data-action="' . route('enquiry.delete', $dataDb->id) . '" data-method="DELETE" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Delete</a>
                            </div>
                        </div>';
                })
                ->rawColumns(['action', 'pipeline', 'reference_number'])
                ->make(true);
        }
    }


    public function liveProjectList(Request $request)
    {
        
        if ($request->ajax() == true) {
            $dataDb = $this->projectRepo->liveProjectList($request);
            return DataTables::eloquent($dataDb)
                ->editColumn('reference_number', function ($dataDb) {
                    return '
                    <button type="button" ng-click=getQuickProject("create_project",' . $dataDb->id . ') class="badge badge-primary-lighten text-primary btn p-2 position-relative border-primary" ng-click=toggle("edit",' . $dataDb->id . ')>
                        <b>' . $dataDb->reference_number . '</b>
                    </button>
                ';
                })
                ->editColumn('start_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->start_date)->format($format);
                })
                ->editColumn('delivery_date', function ($dataDb) {
                    $format = config('global.model_date_format');
                    return Carbon::parse($dataDb->delivery_date)->format($format);
                })
                ->addColumn('pipeline', function ($dataDb) {
                    return '<div class="btn-group">
                    <button ng-click=getQuickProject("create_project",' . $dataDb->id . ') class="btn progress-btn ' . ($dataDb->wizard_create_project == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Create"></button> 
                    <button ng-click=getQuickProject("connect_platform",' . $dataDb->id . ') class="btn progress-btn ' . ($dataDb->wizard_teamsetup == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Connect Platform"></button> 
                    <button ng-click=getQuickProject("teamsetup",' . $dataDb->id . ') class="btn progress-btn ' . ($dataDb->wizard_teamsetup == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Team Setup"></button> 
                    <button ng-click=getQuickProject("invoice_plan",' . $dataDb->id . ') class="btn progress-btn ' . ($dataDb->wizard_invoice_plan == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Invoice Plan"></button> 
                    <button ng-click=getQuickProject("to_do_list",' . $dataDb->id . ') class="btn progress-btn ' . ($dataDb->wizard_todo_list == 1 ? "active" : "") . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="To-do List"></button> 
                </div>';
                })
                ->addColumn('action', function ($dataDb) {
                    return '<div class="dropdown">
                            <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <!-- <a class="dropdown-item" href="'.route('edit-projects', $dataDb->id).'">Edit</a> -->
                                <a class="dropdown-item" href="'.route('customer-live-projects-data', $dataDb->id).'">View/Edit</a>
                                <a type="button" class="dropdown-item delete-modal" data-header-title="Delete" data-title="Are you sure to delete this enquiry" data-action="'.route('enquiry.delete', $dataDb->id).'" data-method="DELETE" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Delete</a>
                            </div>
                        </div>';
                })
                ->rawColumns(['action', 'pipeline', 'reference_number'])
                ->make(true);
        }
    }

    public function live($id){
       
        return view('customer.projects.live-project.index', compact('id')); 
    }

    
}
