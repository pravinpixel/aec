<?php

namespace App\Http\Controllers\Admin\Project;

use App\Helper\Bim360\Bim360CompaniesApi;
use App\Helper\Bim360\Bim360Company;
use App\Helper\Bim360\Bim360ProjectsApi;
use App\Helper\Bim360\Bim360UsersApi;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Sharepoint\SharepointController;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\CustomerRepositoryInterface;
use App\Interfaces\ProjectTicketRepositoryInterface;
use App\Jobs\SharepointFileCreation;
use App\Jobs\SharePointFolderCreation;
use App\Jobs\SharepointFolderDelete;
use App\Models\CheckList;
use App\Models\Customer;
use App\Models\DeliveryType;
use App\Models\Employee;
use App\Models\InvoicePlan;
use App\Models\Project;
use App\Models\ProjectGranttTask;
use App\Models\ProjectType;
use App\Models\ProjectTicket;
use App\Models\ProjectTeamSetup;
use Illuminate\Http\Response;
use App\Repositories\CustomerRepository;
use App\Repositories\DocumentTypeEnquiryRepository;
use App\Repositories\ProjectRepository;
use App\Services\GlobalService;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;
use RicorocksDigitalAgency\Soap\Facades\Soap;
use Illuminate\Support\Facades\Mail;

class ProjectController extends Controller
{
    protected $projectRepo;
    protected $customerEnquiryRepo;
    protected $documentTypeEnquiryRepo;
    protected $customerRep;
    protected $ProjectTicket;
    protected $index = 0;
    protected $parentFolder = '';
    protected $rootFolder = '/DataBase Test';
    protected $fileDir = [];
    protected $ProjectTeamSetup;

    public function __construct(
        ProjectRepository $projectRepo,
       
        ProjectTicketRepositoryInterface $ProjectTicket,
        CustomerEnquiryRepositoryInterface $customerEnquiryRepo,
        CustomerRepositoryInterface $customerRepo,
        DocumentTypeEnquiryRepository $documentTypeEnquiryRepo
    ) {
        $this->projectRepo        = $projectRepo;
        $this->customerEnquiryRepo = $customerEnquiryRepo;
        $this->customerRepo        = $customerRepo;
        $this->ProjectTicket       = $ProjectTicket;
        $this->documentTypeEnquiryRepo = $documentTypeEnquiryRepo;
    }

    public function index()
    {
        return view('admin.projects.index');
    }

    

    public function checkListMasterGroup()
    {
        $list       =   CheckList::with('getTaskList')->latest()->get();
        $collection =   collect($list);
        $grouped    =   $collection->groupBy('name');
        $grouped->all();
        $result     =    [];

        foreach ($grouped as $row) {
            $check_lists = CheckList::where("name",  '=', $row[0]->name)->with('getTaskList')->get();
            $check_lists_data = [];
            foreach ($check_lists as $check_row) {
                $tasks  =   CheckList::where('task_list_category', $check_row->getTaskList->id)->select('id', 'task_list')->get();
                $check_lists_data       =  [
                    "text"  =>  $check_row->getTaskList->task_list_name,
                    "data"  =>  $tasks
                ];
            }
            $result[]   =   [
                "name"          =>  $row[0]->name,
                "check_list"    =>  $check_lists_data
            ];
        }

        return response()->json(['status' => true, 'data' => $result], 201);
    }
    public function updateIndex()
    {
        return $this->index += 1;
    }
    public function checkIndex()
    {
        $statement  =   DB::select("SHOW TABLE STATUS LIKE 'aec_project_grantt_tasks'");
        return $this->index = $statement[0]->Auto_increment - 1;
    }
    public function storeToDoList(Request $request)
    {

        $this->checkIndex();
        $loop_one =  $request->data;
        $result = [];

        $project = Project::find($request->id);
        $project->update(["gantt_chart_data" => json_encode($request->data)]);

        foreach ($loop_one as $row_one) {

            $subParent = $this->updateIndex();

            $result[] = [
                "project_id"    =>   $request->id,
                "id"            =>  $subParent,
                "text"          =>  $row_one['name'],
                "duration"      =>  72,
                "progress"      =>  0,
                "start_date"    =>  "2022-04-20 12:45:07",
                "parent"        =>  0,
                "type"          =>  "project",
            ];

            foreach ($row_one['data'] as $row_two) {

                $subParentTwo      =    $this->updateIndex();

                $result[] = [
                    "project_id"    =>  $request->id,
                    "id"            =>  $subParentTwo,
                    "parent"        =>  $subParent,
                    "text"          =>  $row_two['name'],
                    "duration"      =>  72,
                    "progress"      =>  0,
                    "start_date"    =>  "2022-04-20 12:45:07",
                    "type"          =>  "project",
                ];

                foreach ($row_two['data'] as  $row_three) {

                    $result[] = [
                        "project_id"  =>   $request->id,
                        "id"          =>   $this->updateIndex(),
                        "parent"      =>   $subParentTwo,
                        "text"        =>   $row_three['task_list'],
                        "duration"    =>   0,
                        "progress"    =>   0,
                        "start_date"  =>   new DateTime($row_three['start_date']),
                        "end_date"    =>   new DateTime($row_three['end_date']),
                        "type"        =>   "project",
                    ];
                }
            }
        }

        if ($request->update === true) {
            ProjectGranttTask::where('project_id', $request->id)->delete();

            foreach ($result as $task) {
                ProjectGranttTask::create($task);
            }
        } else {
            foreach ($result as $task) {
                ProjectGranttTask::create($task);
            }
        }
        $this->projectRepo->updateWizardStatus($project, 'wizard_todo_list', 1);
        $wizardStatus = $this->FormatWizardValue((array)$project->wizard_status, ['todo_list','project_scheduling']);
        $this->projectRepo->updateWizardStatus($project, 'wizard_status', $wizardStatus);
        return response()->json(['status' => true, 'data' => $result], 201);
    }
    //live project task update

    public function storetasklit(Request $request)
    {  

        $this->checkIndex();
        $loop_one =  $request->data;

      
      
        $result = [];

        $project = Project::find($request->id);

        
        $project->update(["gantt_chart_data" => json_encode($request->data)]);

        
       
        foreach ($loop_one as $row_one) {

            $subParent = $this->updateIndex();

            $result[] = [
                "project_id"    =>   $request->id,
                "id"            =>  $subParent,
                "text"          =>  $row_one['name'],
                "duration"      =>  72,
                "progress"      =>  0,
                "start_date"    =>  "2022-04-20 12:45:07",
                "end_date"      =>  "2022-04-20 12:45:07",
                "parent"        =>  0,
                "type"          =>  "project",
                "status"        =>  0
            ];

            foreach ($row_one['data'] as $row_two) {
                 
                $subParentTwo      =    $this->updateIndex();

                $result[] = [
                    "project_id"    =>  $request->id,
                    "id"            =>  $subParentTwo,
                    "parent"        =>  $subParent,
                    "text"          =>  $row_two['name'],
                    "duration"      =>  72,
                    "progress"      =>  0,
                    "start_date"    =>  "2022-04-20 12:45:07",
                    "end_date"      =>  "2022-04-20 12:45:07",
                    "type"          =>  "project",
                    "status"        => 0
                ];

                foreach ($row_two['data'] as  $row_three) {

                  

                   
                    $statuscon =  isset($row_three['status'])  ? 1 : 0;
                    $deliverydate =  isset($row_three['delivery_date'])  ? new DateTime($row_three['delivery_date']) : NULL;
                    
                    $result[] = [
                        "project_id"  =>   $request->id,
                        "id"          =>   $this->updateIndex(),
                        "parent"      =>   $subParentTwo,
                        "text"        =>   $row_three['task_list'],
                        "duration"    =>   0,
                        "progress"    =>   0,
                        "start_date"  =>   new DateTime($row_three['start_date']),
                        "end_date"    =>   new DateTime($row_three['end_date']),
                        "delivery_date"    =>   $deliverydate,
                        "type"        =>   "project",
                        "status"      =>   $statuscon, 
                    ];
                }
            }
        } 

   

        if($request->update === true) {

            ProjectGranttTask::where('project_id', $request->id)->delete();
              
            foreach ($result as $task) {
                
              
                ProjectGranttTask::create($task);
               
            }
        } else {
          

            foreach ($result as $task) {
                ProjectGranttTask::create($task);
            }
        }
        $this->projectRepo->updateWizardStatus($project,'wizard_todo_list',1);
        return response()->json(['status' => true,'data' => $result], 201);
    }


    public function checkListMasterGroupList(Request $request)
    {

        $list           =   CheckList::where("name",  '=', $request->data)->with('getTaskList')->latest()->get();

        $grouped        =   $list->groupBy('task_list_category')->map(function ($item) {
            $tasks =  $item->map( function($task) {
                $task->{"start_date"} = now();
                $task->{"end_date"} = now();
                return $task;
            });
            return ['name' => $item[0]->getTaskList->task_list_name, 'data' => $tasks];
        });

        $result = [
            "name" => $request->data,
            "data" => $grouped
        ];

        return response()->json(['status' => true, 'data' => $result], 201);
    }

    public function create()
    {
        Session::forget('project_id');
        $this->projectRepo->checkReferenceNumber();
        return view('admin.projects.create');
    }

    public function edit($id)
    {
        if ($this->projectRepo->getProjectById($id)->is_submitted == 1) {
            Flash::info(__('global.can_not_edit_project_move_to_live'));
            return redirect()->route('list-projects');
        }
        return view('admin.projects.edit', compact('id'));
    }

    public function live($id){
       
        return view('admin.projects.live-project.index', compact('id')); 
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
                                <a class="dropdown-item" href="'.route('live-projects-data', $dataDb->id).'">View/Edit</a>
                                <a type="button" class="dropdown-item delete-modal" data-header-title="Delete" data-title="Are you sure to delete this enquiry" data-action="'.route('enquiry.delete', $dataDb->id).'" data-method="DELETE" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Delete</a>
                            </div>
                        </div>';
                })
                ->rawColumns(['action', 'pipeline', 'reference_number'])
                ->make(true);
        }
    }

    public function completedProjectList()
    {
    }

    public function show($id)
    {
        
        return $this->projectRepo->getProjectById($id);
        
    }

    public function livetaskshow($id){
        return $this->projectRepo->getliveProjectById($id);
    }

    public function getReferenceNumber()
    {
        return GlobalService::getProjectNumber();
    }

    public function getProjectId()
    {
        return Session::get('project_id') ?? "Session is Out";
    }

    public function setProjectId($id)
    {
        Session::forget('project_id');
        return Session::put('project_id', $id);
    }

    public function getProject($type)
    {

        $project_id = $this->getProjectId();
        if (empty($project_id)) return false;
        if ($type == 'create_project') {
            return $this->projectRepo->getProjectById($project_id);
        } else if ($type == 'team_setup') {
            return $this->projectRepo->getProjectTeamSetup($project_id);
        } else  if ($type == 'project_scheduler') {
            return $this->projectRepo->getGranttChartTaskLink($project_id);
        } else if ($type == 'invoice_plan') {
            return $this->projectRepo->getInvoicePlan($project_id);
        } else if ($type ==  'connection_platform') {
            $projectSharepoint = $this->projectRepo->getSharePointFolder($project_id);
            $response['folders'] =  isset($projectSharepoint->sharepointFolder->folder) ? json_decode($projectSharepoint->sharepointFolder->folder) : [];
            $response['platform_access'] =  $this->projectRepo->getConnectionPlatform($project_id)  ?? json_encode(['sharepoint_status', 'bim_status', 'tf_office_status']);
            return $response;
        } else if ($type ==  'to_do_listing') {
            return $this->projectRepo->getToDoListData($project_id);
        }
    }

    public function overViewProject($id)
    {
        $project_data   =   Project::find($id)->toArray();
        $invoice_plan   =   InvoicePlan::where('project_id', $id)->first();
        $invoice_data   =   json_decode($invoice_plan->invoice_data ?? '');
        $project_team_setups =   $this->projectRepo->getProjectTeamSetup($id);
        $project = $this->projectRepo->getSharePointFolder($id);
        $sharepoint =  isset($project->sharepointFolder->folder) ? json_decode($project->sharepointFolder->folder) : [];
        $team_setup = [];
        if (!empty($project_team_setups)) {
            foreach ($project_team_setups as $project_team) {
                $employee = Employee::find($project_team->team);
                $team = $employee->map(function ($user) {
                    return $user->first_Name;
                });
                $project_team->team = $team;
                $team_setup[] =  $project_team;
            }
        }
        $data   =  [
            "project_type"     => ProjectType::find($project_data['project_type_id'])->project_type_name,
            "delivery_type"    => DeliveryType::find($project_data['delivery_type_id'])->delivery_type_name,
            "project"          => $this->projectRepo->getProjectById($id),
            "team_setup"       => $team_setup,
            "connect_platform" => $team_setup,
            "connect_platform_access" => $this->projectRepo->getConnectionPlatform($project->id),
            "sharepoint"       => $sharepoint,
            "invoice_plan"   =>  [
                'project_cost'  =>  $invoice_plan->project_cost ?? '',
                'no_of_invoice' =>  $invoice_plan->no_of_invoice ?? '',
                'invoice_data'  =>  $invoice_data == '' ? [] : $invoice_data,
            ],
        ];

        return array_merge($project_data, $data);
    }

    public function getEditProject($id, $type)
    {
        if ($type == 'create_project') {
            return $this->projectRepo->getProjectById($id);
        } else if ($type == 'team_setup') {
            return $this->projectRepo->getProjectTeamSetup($id);
        } else if ($type == 'project_scheduler') {
            return $this->projectRepo->getGranttChartTaskLink($id);
        } else if ($type == 'invoice_plan') {
            return $this->projectRepo->getInvoicePlan($id);
        } else if ($type == 'to-do-list') {
            return true;
        } else if ($type == 'connection_platform') {
            $projectSharepoint = $this->projectRepo->getSharePointFolder($id);
            $response['folders'] =  isset($projectSharepoint->sharepointFolder->folder) ? json_decode($projectSharepoint->sharepointFolder->folder) : [];
            $response['platform_access'] =  $this->projectRepo->getConnectionPlatform($id)  ?? json_encode(['sharepoint_status', 'bim_status', 'tf_office_status']);
            return $response;
        }
    }

    private  function FormatWizardValue($wizards, $currentWizard, $value= 1)
    {
        $wizardArray = is_array($currentWizard) ? $currentWizard : [$currentWizard];
        foreach($wizardArray as $wizard) {
            $wizards[$wizard] = $value;
        }
        return $wizards;
    }

    public function store(Request $request)
    {
        $type          = $request->input('type');
        $data          = $request->input('data');
        $project_id    = $this->getProjectId();

        $project = $this->projectRepo->getProjectById($project_id);

        if ($type == 'create_project') {
            if (empty($project->customer_id)) {
                $customer = $this->formatCustomerData($data);
                $data['customer_id'] = $this->customerRepo->create($customer)->id;
            }
            $data['reference_number'] = GlobalService::getProjectNumber();
            $project = $this->projectRepo->storeProjectCreation($project_id, $data);
            $this->setProjectId($project->id);
            $data = [
                'folder'      => json_encode(config('project.default_folder')),
                'project_id'  => $project->id,
                'created_by' => Admin()->id,
                'modified_by' => Admin()->id
            ];
            $this->projectRepo->updateFolder($project->id, $data);
            $wizardStatus = $this->FormatWizardValue((array)$project->wizard_status, 'create_project');
            $this->projectRepo->updateWizardStatus($project, 'wizard_status', $wizardStatus);
            return $project;
        } else if ($type == 'connect_platform') {
            $wizardStatus = $this->FormatWizardValue((array)$project->wizard_status, 'connect_platform');
            $this->projectRepo->updateWizardStatus($project, 'wizard_status', $wizardStatus);
            return $this->projectRepo->storeConnectPlatform($project_id, $data);
        } else if ($type == 'team_setup') {
            $wizardStatus = $this->FormatWizardValue((array)$project->wizard_status, 'team_setup');
            $this->projectRepo->updateWizardStatus($project, 'wizard_status', $wizardStatus);
            return $this->projectRepo->storeTeamSetupPlatform($project_id, $data);
        } else if ($type == 'task') {
            return $this->storeGrandChartTask($project_id, $request);
        } else if ($type == 'link') {
            return $this->storeGrandChartLink($project_id, $request);
        } else if ($type == 'invoice_plan') {
            $wizardStatus = $this->FormatWizardValue((array)$project->wizard_status, 'invoice_plan');
            $this->projectRepo->updateWizardStatus($project, 'wizard_status', $wizardStatus);
            return $this->projectRepo->storeInvoicePlan($project_id, $data);
        } else if ($type == 'review_and_submit') {
            $connectionPlatform = $this->projectRepo->getConnectionPlatform($project->id);
            if (isset($connectionPlatform->bim_status) && $connectionPlatform->bim_status == 1) {
                // $this->createBimCompany($project);
                $this->createBimProject($project);
                $this->addMemberToProject($project);
            }

            if (isset($connectionPlatform->sharepoint_status) && $connectionPlatform->sharepoint_status == 1) {
                $reference_number = str_replace('/', '-', $project->reference_number);
                $folderPath = ["path" => GlobalService::getSharepointPath($reference_number)];
                $job = (new SharePointFolderCreation($folderPath))->delay(config('global.job_delay'));
                $this->dispatch($job);
                $result = $this->projectRepo->createSharepointFolder($project_id); // get all root and children folder
                foreach ($result  as $path) {
                    $data = ['path' =>  GlobalService::getSharepointPath($reference_number, trim($path, '/'))];
                    $job = (new SharePointFolderCreation($data))->delay(config('global.job_delay'));
                    $this->dispatch($job);
                }
                $res = $this->moveFileToSharepoint($project->enquiry_id, $project);
            }
            $this->projectRepo->draftOrSubmit($project_id, ['is_submitted' => 1, 'status' => 'Live']);
            return  response(['status' => true, 'msg' => 'Project submitted successfully']);
        } else if ($type == 'review_and_save') {
            $this->projectRepo->draftOrSubmit($project_id, ['is_submitted' => 0]);
            return  response(['status' => true, 'msg' => 'Project saved successfully']);
        }
        return $request->all();
    }

    public function update($id, Request $request)
    {
        $type = $request->input('type');
        $data = $request->input('data');
        $project = $this->projectRepo->getProjectById($id);
        if ($type == 'create_project') {
            $project = $this->projectRepo->storeProjectCreation($id, $data);
            if (!$project->sharepointFolder()->exists()) {
                $data = [
                    'folder'      => json_encode(config('project.default_folder')),
                    'project_id'  => $project->id,
                    'created_by' => Admin()->id,
                    'modified_by' => Admin()->id
                ];
                $this->projectRepo->updateFolder($project->id, $data);
            }
            $this->setProjectId($project->id);
            $wizardStatus = $this->FormatWizardValue((array)$project->wizard_status, 'create_project');
            $this->projectRepo->updateWizardStatus($project, 'wizard_status', $wizardStatus);
            return $project;
        } else if ($type == 'connect_platform') {
            $wizardStatus = $this->FormatWizardValue((array)$project->wizard_status, 'connect_platform');
            $this->projectRepo->updateWizardStatus($project, 'wizard_status', $wizardStatus);
            return $this->projectRepo->storeConnectPlatform($id, $data);
        } else if ($type == 'team_setup') {
            $wizardStatus = $this->FormatWizardValue((array)$project->wizard_status, 'team_setup');
            $this->projectRepo->updateWizardStatus($project, 'wizard_status', $wizardStatus);
            return $this->projectRepo->storeTeamSetupPlatform($id, $data);
        } else if ($type == 'invoice_plan') {
            $wizardStatus = $this->FormatWizardValue((array)$project->wizard_status, 'invoice_plan');
            $this->projectRepo->updateWizardStatus($project, 'wizard_status', $wizardStatus);
            return $this->projectRepo->storeInvoicePlan($id, $data);
        } else if ($type == 'review_and_submit') {
            $connectionPlatform = $this->projectRepo->getConnectionPlatform($project->id);
            $reference_number = str_replace('/', '-', $project->reference_number);
            $folderPath = ["path" => GlobalService::getSharepointPath($reference_number)];
            if (isset($connectionPlatform->sharepoint_status) && $connectionPlatform->sharepoint_status == 1) {
                $job = (new SharePointFolderCreation($folderPath))->delay(config('global.job_delay'));
                $this->dispatch($job);
                $result = $this->projectRepo->createSharepointFolder($id); // get all root and children folder
                foreach ($result  as $path) {
                    $data = ['path' =>  GlobalService::getSharepointPath($reference_number, trim($path, '/'))];
                    $job = (new SharePointFolderCreation($data))->delay(config('global.job_delay'));
                    $this->dispatch($job);
                }
                $res = $this->moveFileToSharepoint($project->enquiry_id, $project);
            }
            if (isset($connectionPlatform->bim_status) && $connectionPlatform->bim_status == 1) {
                // $this->createBimCompany($project);
                $this->createBimProject($project);
                $this->addMemberToProject($project);
            }
            $this->projectRepo->draftOrSubmit($id, ['is_submitted' => true, 'status' => 'Live']);
            return response(['status' => true, 'msg' => 'Project submitted successfully']);
        } else if ($type == 'review_and_save') {
            $this->projectRepo->draftOrSubmit($id, ['is_submitted' => false]);
            return response(['status' => true, 'msg' => 'Project saved successfully']);
        }
        return $request->all();
    }

    public function createBimCompany($project)
    {
        try {
            $customer = Customer::find($project->customer_id);
            $enquiry = $this->customerEnquiryRepo->getEnquiryByID($project->enquiry_id);
            $input = [];
            $input["name"]              = $customer->first_name;
            $input["trade"]             = $customer->company_name;
            $input["website_url"]       = '';
            $input["description"]       = '';
            $input["erp_id"]            = '';
            $input["tax_id"]            = '';
            $input["phone"]             = $customer->mobile_no;
            $input["address_line_1"]    = '';
            $input["address_line_2"]    = '';
            $input["postal_code"]       = $customer->postal_code ?? $enquiry->zipcode;
            $input["city"]              = $customer->city ?? $enquiry->city;
            $input["state_or_province"] = $customer->state ?? $enquiry->state;
            $input["country"]           = $customer->country ?? $enquiry->country;
            $api = new  Bim360CompaniesApi();
            if (is_null($customer->bim_id)) {
                $createJson = json_encode($input);
                Log::info(' input data ' . $createJson);
                $result = $api->createCompany($createJson);
                Log::info(' $result ' . $result);
                $response = json_decode($result);
            } else {
                $createJson = json_encode($input);
                Log::info(' input data ' . $createJson);
                $result = $api->editCompany($customer->bim_id, $createJson);
                Log::info(' $result ' . $result);
                $response = json_decode($result);
            }
            $customer->bim_account_id = $response->account_id;
            $customer->bim_id = $response->id;
            $customer->save();
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
        }
    }

    public function createBimProject($project)
    {
        try {
            $input = [];
            $input["name"]         = "{$project->reference_number}-{$project->project_name}";
            $input["start_date"]   = Carbon::parse($project->start_date)->format('Y-m-d');
            $input["end_date"]     = Carbon::parse($project->delivery_date)->format('Y-m-d');
            $input["project_type"] = $project->bim_project_type;
            $input["currency"]     = 'USD';
            $input["value"]        = floatval(0);
            $input["language"]     = $project->language ?? "en";
            $api = new  Bim360ProjectsApi();
            if (isset($project->bim_id) && !empty($project->bim_id)) {
                $input["id"] = $project->bim_id;
                $editJson = json_encode($input);
                Log::info(' edit input data ' . $editJson);
                $result = $api->editProject($project->bim_id, $editJson);
                Log::info('edit project result ' . $result);
                $response = json_decode($result);
            } else {
                $createJson = json_encode($input);
                Log::info(' create input data  ' . $createJson);
                $result = $api->createProject($createJson);
                Log::info(' create project result ' . $result);
                $response = json_decode($result);
            }
            $project->bim_account_id = $response->account_id;
            $project->bim_id = $response->id;
            $project->save();
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
        }
    }

    public function getEnquiry($id)
    {
        return $this->customerEnquiryRepo->getEnquiryByID($id);
    }

    public function formatCustomerData($data)
    {
        return  [
            'first_name'     => $data['contact_person'],
            'last_name'      => $data['contact_person'],
            'full_name'      => $data['contact_person'],
            'email'          => $data['email'],
            'password'       => Hash::make('12345678'),
            'mobile_no'      => $data['mobile_number'],
            'contact_person' => $data['contact_person'],
            'company_name'   => $data['company_name'],
            'city'           => $data['city'],
            'state'          => $data['state'],
            'country'        => $data['country'],
            'postal_code'    => $data['zipcode'],
            'created_by'     => Admin()->id,
            'updated_by'     => Admin()->id
        ];
    }

    public function getGranttChartTaskLink($project_id)
    {
        return $this->projectRepo->getGranttChartTaskLink($project_id);
    }

    public function storeGrandChartTask(Request $request)
    {
        $project_id = $this->getProjectId();
        if (empty($project_id)) return false;
        $projectTask = new ProjectGranttChartTaskController();
        return $projectTask->store($project_id, $request);
    }

    public function storeGrandChartLink(Request $request)
    {
        $project_id = $this->getProjectId();
        if (empty($project_id)) return false;
        $projectLink = new ProjectGranttChartLinkController();
        return $projectLink->store($project_id, $request);
    }

    public function updateGrandChartTask($id, Request $request)
    {
        $project_id = $this->getProjectId();
        if (empty($project_id)) return false;
        $projectTask = new ProjectGranttChartTaskController();
        return $projectTask->update($project_id, $id, $request);
    }

    public function updateGrandChartLink($id, Request $request)
    {
        $project_id = $this->getProjectId();
        if (empty($project_id)) return false;
        $projectLink = new ProjectGranttChartLinkController();
        return $projectLink->update($project_id, $id,  $request);
    }

    public function deleteGrandChartTask($id)
    {
        $project_id = $this->getProjectId();
        if (empty($project_id)) return false;
        $projectLink = new ProjectGranttChartLinkController();
        return $projectLink->update($project_id, $id);
    }

    public function deleteGrandChartLink($id)
    {
        $project_id = $this->getProjectId();
        if (empty($project_id)) return false;
        $projectLink = new ProjectGranttChartLinkController();
        return $projectLink->destroy($project_id, $id);
    }

    public function getTeamsetupTemplate(Request $request)
    {
        return $this->projectRepo->getTeamsetupTemplate($request);
    }

    public function getTeamsetupTemplateById($id)
    {
        $template = $this->projectRepo->getTeamsetupTemplateById($id);
        return json_decode($template->template_data);
    }

    public function storeTeamsetupTemplate(Request $request)
    {
        $response = $this->projectRepo->storeTeamsetupTemplate($request);
        if ($response) {
            return response(['status' => true, 'msg' => __('global.template_added')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function getFolderById($id)
    {
        $response = $this->projectRepo->getFolderById($id);
    }

    public function storeFolder(Request $request)
    {
        $project_id = $this->getProjectId();
        $requestPath = $request->path;
        $data = [
            'folder' => json_encode($request->data),
            'project_id' => $project_id,
            'created_by' => Admin()->id
        ];
        $project = $this->projectRepo->getProjectById($project_id);
        if (substr($request->path, 0, 1) != '/') {
            $requestPath = '/' . $request->path;
        }
        try {
            $reference_number = str_replace('/', '-', $project->reference_number);
            $folderPath = ["path" => "{$this->rootFolder}/{$reference_number}{$requestPath}"];
            $job = (new SharePointFolderCreation($folderPath))->delay(60);
            $this->dispatch($job);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return response(['status' => false, 'msg' => __('global.something')]);
        }
        $response = $this->projectRepo->updateFolder($project_id, $data);
        if ($response) {
            return response(['status' => true, 'msg' => __('global.created')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function updateFolder($project_id, Request $request)
    {
        $project = $this->projectRepo->getProjectById($project_id);
        $requestPath = $request->path;
        $data = [
            'folder'      => json_encode($request->data),
            'project_id'  => $project_id,
            'created_by' => Admin()->id,
            'modified_by' => Admin()->id
        ];
        if (substr($request->path, 0, 1) != '/') {
            $requestPath = '/' . $request->path;
        }
        try {
            $reference_number = str_replace('/', '-', $project->reference_number);
            $folderPath = ["path" => "{$this->rootFolder}/{$reference_number}{$requestPath}"];
            $job = (new SharePointFolderCreation($folderPath))->delay(config('global.job_delay'));
            $this->dispatch($job);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return response(['status' => false, 'msg' => __('global.something')]);
        }
        $response = $this->projectRepo->updateFolder($project_id, $data);
        if ($response) {
            return response(['status' => true, 'msg' => __('global.updated')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function deleteFolder($project_id = null, Request $request)
    {
        $sharePoint = new SharepointController();
        if (is_null($project_id)) {
            $project_id = $this->getProjectId();
        }
        $requestPath = $request->path;
        $project = $this->projectRepo->getProjectById($project_id);
        $data = [
            'folder'      => json_encode($request->data),
            'project_id'  => $project_id,
            'created_by' => Admin()->id,
            'modified_by' => Admin()->id
        ];
        try {
            $reference_number = str_replace('/', '-', $project->reference_number);
            $folderPath = ["path" => "{$this->rootFolder}/{$reference_number}/{$requestPath}"];
            $job = (new SharepointFolderDelete($folderPath))->delay(config('global.job_delay'));
            $this->dispatch($job);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return response(['status' => false, 'msg' => __('global.something')]);
        }
        $response = $this->projectRepo->updateFolder($project_id, $data);
        if ($response) {
            return response(['status' => true, 'msg' => __('global.deleted')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function createSharepointFolder($project_id)
    {
        $project = $this->projectRepo->getProjectById($project_id);
        $result = $this->projectRepo->createSharepointFolder($project_id);
        if ($result != false) {
            try {
                $reference_number = str_replace('/', '-', $project->reference_number);
                foreach ($result  as $path) {
                    $data = ['path' => "{$this->rootFolder}/{$reference_number}" . $path];
                    $job = (new SharePointFolderCreation($data))->delay(config('global.job_delay'));
                    $this->dispatch($job);
                }
                return ['status' => true, 'msg' => __('global.project_submitted')];
            } catch (Exception $ex) {
                Log::error($ex->getMessage());
                return ['status' => false, 'msg' => __('global.something')];
            }
        }
    }


    public function moveFileToSharepoint($enquiry_id, $project)
    {
        try {
            Log::info('create file job start');
            $reference_number = str_replace('/', '-', $project->reference_number);
            $folderPath = GlobalService::getSharepointPath($reference_number, 'Custom Input');
            $ifcDocuments = $this->documentTypeEnquiryRepo->getDocumentByEnquiryId($enquiry_id);
            $buildingDocuments = $this->documentTypeEnquiryRepo->geBuildingDocumentByEnquiryId($enquiry_id);
            if (!empty($ifcDocuments)) {
                foreach ($ifcDocuments as $ifcdocument) {
                    $filePath = asset('public/uploads/' . $ifcdocument->file_name);
                    $job = (new SharepointFileCreation($folderPath, $filePath, $ifcdocument->client_file_name))->delay(config('global.job_delay'));
                    $this->dispatch($job);
                }
            }
            if (!empty($buildingDocuments)) {
                foreach ($buildingDocuments as $buildingDocument) {
                    $filePath = asset('public/uploads/' . $buildingDocument->file_path);
                    $job = (new SharepointFileCreation($folderPath, $filePath, $buildingDocument->file_name))->delay(config('global.job_delay'));
                    $this->dispatch($job);
                }
            }

            Log::info('create file job end');
            return true;
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return false;
        }
    }

    public function updateConnectionPlatform($id, $type)
    {
        $response = $this->projectRepo->updateConnectionPlatform($id, $type);
        if ($response) {
            return response(['status' => true, 'msg' => __('global.connection_platform_enabled')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function insertConnectionPlatform($type)
    {
        $id = $this->getProjectId();
        $response = $this->projectRepo->updateConnectionPlatform($id, $type);
        if ($response) {
            return response(['status' => true, 'msg' => __('global.connection_platform_enabled')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function addMemberToProject($project)
    {
        Log::info("add member to project start");
        $employees = [];
        $teamSetups = $this->projectRepo->getProjectTeamSetup($project->id);
        foreach ($teamSetups as $teamSetup) {
            if (!empty($teamSetup->team)) {
                $employees[] = $teamSetup->team;
            }
        }
        $employees_id = Arr::flatten($employees);
        $employees = Employee::find($employees_id);
        $project_id = $project->bim_id;
        $data = [];
        foreach ($employees as $employee) {
            $data[] = [
                'email' => $employee->email,
                "services" => [
                    "document_management" => [
                        "access_level" => "user"
                    ]
                ],
                "company_id" => env('BIMDEFAULTCOMPANY'),
                "industry_roles" => [
                    env('BIMDEFAULTROLE')
                ]
            ];
        }
        $userApi = new  Bim360UsersApi();
        if (isset($employee->bim_id) && !empty($employee->bim_id)) {
            $userJson = $userApi->getUser($employee->bim_id);
            $userObj =  json_decode($userJson);
            $input = json_encode($data);
            Log::info("x-user-id {$input}");
            Log::info("x-user-id {$userObj->uid}");
            $projectApi = new  Bim360ProjectsApi();
            $result = $projectApi->importUser($project_id, $input, $userObj->uid);
            Log::info("add member result  {$result}");
        }
        Log::info("add member to project end");
    }
    //live project model
    public function liveprojecttasklist(){
        return view('admin.projects.live-project.wizard.task-list');

    }

    public function liveprojectdata($id)
    {
        return response()->json($this->projectRepo->liveprojectdata($id));
    }
    public function createticket($id){
        return view("admin.projects.live-project.create-project-ticket", compact('id'));
    }
    
    public function ticketcreate(Request $request){
       
        DB::beginTransaction();
        try{

            $maildata = "<html> <body><table class='table custom table-bordered'> <thead> <tr> <td colspan='2' class='text-center' style='background: #F4F4F4'><b class='h4'>Variation Request - 01</b></td> </tr> <tr> <td colspan='2' class='text-center'><b class='h4'>Architectural Support for Hytte Norefiell</b></td> </tr> </thead> <tbody> <tr> <td width='200px'><b>Project Name</b></td> <td>Hytte Norefiell</td> </tr> <tr> <td><b>Client Name</b></td> <td>Modul Pluss</td> </tr> <tr> <td><b>Project Incharge</b></td> <td>Mariusz Pierzgalski</td> </tr> <tr> <td><b>Date of Change Request</b></td> <td>22/05/2021</td> </tr> </tbody> </table> <table class='table custom table-bordered'> <tbody> <tr><td colspan='2' class='text-center' style='background: #F4F4F4'><b>Change Request Overview</b></td></tr> <tr> <td width='250px'><b>Description of Variation / Change</b></td> <td>Architectural support for over all building design & detailing</td> </tr> <tr> <td><b>Reason for Variation / Change</b></td> <td>There was no Architectural design for the building</td> </tr> </tbody> </table> <table class='table custom table-bordered'> <tbody> <tr><td colspan='4'class='text-center' style='background: #F4F4F4'><b>Change in Contract Price</b></td></tr> <tr> <td><b>Estimated Hours</b></td> <td><b>Price/Hr</b></td> <td rowspan='2'></td> <td rowspan='2' class='text-center'>kr 30, 000</td> </tr> <tr> <td>60</td> <td>kr 500</td> </tr> </tbody> <tfoot> <tr> <td colspan='2'></td> <td rowspan='2' class='text-end'><b>Total Price</b></td> <td rowspan='2' class='text-center'><b>kr 30, 000</b></td> </tr> </tfoot> </table></body></html>";



           
            $data = [
                'project_id'     => $request->data['projectid'],
                'title'          => $request->data['title'],
                'description'    => $request->data['description'],
                'response'       => $request->data['reason_for_variation'],
                'change_date'    =>  date('Y-m-d', strtotime($request->data['change_date'])),
                'project_hrs'    => $request->data['hours'],
                'project_price'  => $request->data['price'],
                'total_price'    =>$request->data['hours'] * $request->data['price'] ,
                'status'         =>  1,
                'is_mail_sent'   => $maildata,
                
            ];
          
            $this->ProjectTicket->create($data);
           
            DB::commit();

        } catch (\Exception $e) {
            dd($e->getMessage());
            Log::info($e->getMessage());
            DB::rollBack();
            Flash::error(__('global.something'));
            return response(['status' => false, 'data' => '' ,'msg' => trans('global.something')], Response::HTTP_OK);
        }

        return response(['status' => true, 'msg' => trans('project.ticketsaved')],  Response::HTTP_OK);

    }


    public function ticketlist($id){
        return $this->ProjectTicket->getprojectticket($id);
       
    }
    public function ticketsearchlist($id,$type){
        return $this->ProjectTicket->getprojectticketsearch($id,$type);
    }

    public function ticketfiltersearch(Request $request){
        if($request->fromdate != 'Invalid Date'){
            $strDate = substr($request->fromdate,4,11 );
            $fromdate = date('Y-m-d', strtotime($strDate));
        } else if($request->todate != 'Invalid Date'){
            $strtoDate = substr($request->todate,4,11 );
            $todate = date('Y-m-d', strtotime($strtoDate));
        }
        
      
	    
        $data = array('project_id' => $request->id,
                     'fromdate' => (($request->fromdate != 'Invalid Date') ? $fromdate :''),
                     'todate' => (($request->todate != 'Invalid Date') ? $todate :''),
                     'priority' =>$request->priority,
                     'status'   =>$request->status ?? '',
                     'refno'   =>$request->refno ?? '',
                    

    );
        
        
        return $this->ProjectTicket->getprojectticketfiltersearch($data);
    }

    public function projectticketfind($id){
        return $this->ProjectTicket->findprojectticket($id);

    }

    public function sendcustomerMail($projectid,$cid){
        $project_ticket = $this->ProjectTicket->findprojectticket($projectid);

        $project        = $this->projectRepo->liveprojectdata($project_ticket['ticket']['project_id']);
       

       
       

      



        $details = [
            'ticket_id'         =>'TIC-00'.$projectid,
            'user_name'         => $project->customerdatails->full_name,
            'email'              =>$project->customerdatails->email,
            'project_name'      => $project->project_name,
            'company_name'      => $project->company_name,
            'incharge'          => 'test',
            'title'             => $project_ticket['ticket']['title'],
            'changedate'        => date("Y-m-d", strtotime($project_ticket['ticket']['change_date'])),
            'description'       => $project_ticket['ticket']['description'],
            'respone'            =>$project_ticket['ticket']['response'],
            'project_hrs'        => $project_ticket['ticket']['project_hrs'] ,
            'project_price'     => $project_ticket['ticket']['project_price'],
            'total_price'       => $project_ticket['ticket']['total_price']  

            ]; 

          
           $res = Mail::to('rajkumarm.pixel@gmail.com')->send(new \App\Mail\projectticketmail($details));
           return response(['status' => true, 'msg' => trans('project.ticketmail')],  Response::HTTP_OK);
        

    }
    public function tagteamsetup($project){
        return $this->ProjectTicket->findprojectteam($project);
    }
    public function ticketlistdelete($ticketid){
         $this->ProjectTicket->ticketdelete($ticketid);
        return response(['status' => true, 'msg' => trans('project.ticketdelete')],  Response::HTTP_OK);
    }

   





    public function testDemo($project)
    {

        // $teamSetups = $this->projectRepo->getProjectTeamSetup($project->id);
        // $employees = [];
        // foreach($teamSetups as $teamSetup) {
        //     if(!empty($teamSetup->team)) {
        //         $employees[] = $teamSetup->team;
        //     }
        // }
        // $employees_id = Arr::flatten($employees);
        // $employees = Employee::find($employees_id);
        // $project_id = $project->bim_id;
        // foreach($employees as $employee) {
        //     $data = [
        //         'email'=> $employee->email,
        //         "services"=> [
        //             "document_management"=> [
        //               "access_level"=> "user"
        //             ]
        //         ],
        //         "industry_roles" => []
        //     ];

        //     $userApi = new  Bim360UsersApi();
        //     if(isset($employee->bim_id) && !empty($employee->bim_id)) {
        //         $userJson = $userApi->getUser($employee->bim_id);
        //         $userObj =  json_decode($userJson);
        //         $input = json_encode([$data]);
        //         Log::info("x-user-id {$input}");
        //         Log::info("x-user-id {$userObj->uid}");
        //         $projectApi = new  Bim360ProjectsApi();
        //         $result = $projectApi->importUser($project_id, $input, $userObj->uid);
        //         dd( $result);
        //         Log::info("result  {$result}");
        //     }
        // }
        // Session('tets', 100);
        // $folderPath = '/DataBase Test/PRO-2022-002/Custom Input';
        // $project = $this->projectRepo->getProjectById($project_id);
        // $reference_number = str_replace('/','-',$project->reference_number);
        // $documents = $this->documentTypeEnquiryRepo
        //                     ->getDocumentByEnquiryId(6);
        // foreach($documents as $document) {
        //     $filePath = asset('public/uploads/'.$document->file_name);
        //     $job = (new SharepointFileCreation($folderPath,$filePath, $document->client_file_name))->delay(config('global.job_delay'));
        //     $this->dispatch($job);
        // }
    }
}
