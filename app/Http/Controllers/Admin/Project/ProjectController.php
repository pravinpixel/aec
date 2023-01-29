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
use App\Interfaces\RoleRepositoryInterface;
use App\Jobs\SharepointFileCreation;
use App\Jobs\SharePointFolderCreation;
use App\Jobs\SharepointFolderDelete;
use App\Models\Admin\Employees;
use App\Models\CheckList;
use App\Models\Customer;
use App\Models\DeliveryType;
use App\Models\InvoicePlan;
use App\Models\Project;
use App\Models\ProjectGranttTask;
use App\Models\GeneralNote;
use App\Models\ProjectType;
use App\Models\ProjectTicket;
use App\Models\ProjectTeamSetup;
use App\Models\Role;
use Illuminate\Http\Response;
use App\Repositories\CustomerRepository;
use App\Repositories\DocumentTypeEnquiryRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\RoleRepository;
use App\Services\GlobalService;
use App\Models\Admin\PropoalVersions as ProposalVersions;
use App\Models\Admin\MailTemplate;
use App\Models\TicketcommentsReplay;

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
use App\Interfaces\ProjectChatRepositoryInterface;
use App\Models\LiveProjectGranttLink;
use App\Models\LiveProjectGranttTask;
use App\Models\projectsFolders;
use App\Models\TeamSetupTemplate;
use App\Models\sharePointMasterFolder;
use Autodesk\Forge\Client\Model\Projects;
use CreateSharePointMasterFoldersTable;

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
    protected $roleRepository;
    protected $projectChatRepo;
    protected $customerRepo;

    public function __construct(
        ProjectRepository $projectRepo,
       
        ProjectTicketRepositoryInterface $ProjectTicket,
        CustomerEnquiryRepositoryInterface $customerEnquiryRepo,
        CustomerRepositoryInterface $customerRepo,
        DocumentTypeEnquiryRepository $documentTypeEnquiryRepo,
        RoleRepositoryInterface $roleRepository,
        ProjectChatRepositoryInterface $projectChatRepo

    ) {
        $this->projectRepo        = $projectRepo;
        $this->customerEnquiryRepo = $customerEnquiryRepo;
        $this->customerRepo        = $customerRepo;
        $this->ProjectTicket       = $ProjectTicket;
        $this->documentTypeEnquiryRepo = $documentTypeEnquiryRepo;
        $this->roleRepository = $roleRepository;
        $this->projectChatRepo = $projectChatRepo;
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
                "project_id" => $request->id,
                "id"         => $subParent,
                "text"       => $row_one['name'],
                "duration"   => 72,
                "progress"   => 0,
                "start_date" => $row_one['project_start_date'],
                "end_date"   => $row_one['project_end_date'],
                "parent"     => 0,
                "type"       => "project",
            ];

            foreach ($row_one['data'] as $row_two) {

                $subParentTwo      =    $this->updateIndex();

                $result[] = [
                    "project_id" => $request->id,
                    "id"         => $subParentTwo,
                    "parent"     => $subParent,
                    "text"       => $row_two['name'],
                    "duration"   => 72,
                    "progress"   => 0,
                    "start_date" => $row_two['start_date'],
                    "end_date"   => $row_two['end_date'],
                    "type"       => "project",
                ];

                foreach ($row_two['data'] as  $row_three) {

                    $result[] = [
                        "project_id"  =>   $request->id,
                        "id"          =>   $this->updateIndex(),
                        "parent"      =>   $subParentTwo,
                        "text"        =>   $row_three['task_list'],
                        "duration"    =>   0,
                        "progress"    =>   0,
                        "start_date"  =>    $row_three['start_date'],
                        "end_date"    =>    $row_three['end_date'],
                        "type"        =>   "project",
                    ];
                }
            }
        }

        
        if ($request->update === true) {
            ProjectGranttTask::where('project_id', $request->id)->delete();
            foreach ($result as $task) {
                $task['start_date'] = Carbon::parse(str_replace('/','-',$task['start_date']))->format('Y-m-d');
                $task['end_date']   = Carbon::parse(str_replace('/','-',$task['end_date']))->format('Y-m-d');
                ProjectGranttTask::create($task); 
            }
        } else {
            foreach ($result as $task) {
                $task['start_date'] = Carbon::parse(str_replace('/','-',$task['start_date']))->format('Y-m-d');
                $task['end_date']   = Carbon::parse(str_replace('/','-',$task['end_date']))->format('Y-m-d');
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
       
      
        $total_completed_count = 0;
        $total_overall = [];
        $final_status_percentage = [];
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
                //dd($loop_one);


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
                   
                    $total_overall[] = 1; 

                    $statuscon =  isset($row_three['status'])  ? 1 : 0;
                    if($statuscon == 1) {
                        $final_status_percentage[] = $statuscon;
                    }
                    $deliverydate =  isset($row_three['delivery_date'])  ? new DateTime($row_three['delivery_date']) : NULL;
                    
                    $result[] = [
                        "project_id"  =>   $request->id,
                        "id"          =>   $this->updateIndex(),
                        "parent"      =>   $subParentTwo,
                        "text"        =>   $row_three['task_list'],
                        "duration"    =>   0,
                        "progress"    =>   0,
                        // "start_date"  =>   new DateTime($row_three['start_date']),
                        // "end_date"    =>   new DateTime($row_three['end_date']),
                        "delivery_date"    =>   $deliverydate,
                        "type"        =>   "project",
                        "status"      =>   $statuscon, 
                    ];
                }
                $total_completed_count = array_sum($final_status_percentage);
            }
        } 
       
    
        $percentage = round((($total_completed_count / array_sum($total_overall))*100),2);
        $project->progress_percentage = $percentage;
        $project->save();

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
    public function updateTODo(Request $req){
        $project=Project::find($req->input('id'));
        $project->gantt_chart_data=$req->input('data');
        $project->save();
        return response()->json(['status' => true,'data' => $req->input('data')], 201);
    }

    public function checkListMasterGroupList(Request $request)
    {
        $project              =     Project::findOrFail($request->project_id);
        $project_manager_id   =     Role::where('slug', config('global.project_manager'))->first();
        $project_manager      =     Employees::where('job_role', $project_manager_id->id)->where('status',1)->first();

        $start_date     =   $project->start_date;
        $end_date       =   $project->delivery_date;
        $list           =   CheckList::where("name",  '=', $request->data)->with('getTaskList')->latest()->get();

        $grouped    =   $list->groupBy('task_list_category')->map(function ($item) use($start_date, $end_date, $project_manager) {
            $tasks  =   $item->map( function($task) use($start_date, $end_date, $project_manager) {
                $task->{"start_date"}    = SetDateFormat($start_date);
                $task->{"end_date"}      = SetDateFormat($end_date);
                // $task->assign_to = (string)$project_manager->id ?? "";
                $task->assign_to =$project_manager->id ?? null;
                return $task;
            });
            return ['name'          => $item[0]->getTaskList->task_list_name, 
                    'data'          => $tasks,
                    'start_date'    => $item[0]->start_date,
                    'end_date'      => $item[count($item)-1]->end_date
                ];
        });

        $result = [
            "name"               => $request->data,
            "project_start_date" => SetDateFormat($project->start_date),
            "project_end_date"   => SetDateFormat($project->delivery_date),
            "data"               => $grouped
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
        Session::put('current_project', Project::find($id));

        if ($this->projectRepo->getProjectById($id)->is_submitted == 1) {
            Flash::info(__('global.can_not_edit_project_move_to_live'));
            return redirect()->route('list-projects');
        }
        return view('admin.projects.edit', compact('id'));
    }

    public function live($id){
        Session::put('current_project', Project::find($id));
        if(!empty(Customer()->id)){
            $seen_user = 'Customer';
        }else{
            $seen_user = 'Admin';
        }
       $issuescount =  TicketcommentsReplay :: Where('project_id',$id)
                                ->Where('seen_user',$seen_user)
                                ->where('status',0)
                                ->count();
        $data =array('issues' => ($issuescount != '0') ? $issuescount : '');
       
        return view('admin.projects.live-project.index', compact('id','data')); 
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
                        <button type="button" class="btn-quick-view" onclick="ProjectQuickView('.$dataDb->id.' , this)" >
                            <b>'. $dataDb->reference_number.'</b>
                            '.getModuleChatCount('ADMIN','project',$dataDb->id).'
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
            $dataDb = Project::with(['LiveProjectTasks','comments'=> function($q){
                $q->where(['status' => 0, 'created_by' => 'Customer']);
            }]);
           
            return DataTables::eloquent($dataDb)
                ->editColumn('reference_number', function ($dataDb) {
                    $commentCount = $dataDb->comments->count();
                    $projectComments = $commentCount == 0 ? '' : $commentCount;
                     return '
                    <button type="button" ng-click=getQuickProject("create_project",' . $dataDb->id . ') class="btn-quick-view" ng-click=toggle("edit",' . $dataDb->id . ')>
                        <b>' . $dataDb->reference_number . '</b>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">'.$projectComments.'</span>
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
                    if(count($dataDb->LiveProjectTasks) !== 0) {
                        $progress_percentage = 0;
                        foreach ($dataDb->LiveProjectTasks as $key => $task) {
                            $progress_percentage += $task->progress_percentage;
                        }
                        return generateProgressBar(intval($progress_percentage / count($dataDb->LiveProjectTasks)));
                    }
                    $totaloverall = array();
                    $result = array();
                    $projechtchart =  isset($dataDb->gantt_chart_data) ? json_decode($dataDb->gantt_chart_data) :array();
                    foreach($projechtchart as $projectdata){
                        foreach($projectdata->data as $key=>$prodata){
                           
                            $finalstatuspercentage = array();
                            $overall = count($prodata->data);
                            $totaloverall[] = $overall;
                            foreach($prodata->data as $finaldata){
                                
                                $delivery_date = isset($finaldata->delivery_date) ? Carbon::parse($finaldata->delivery_date)->format('Y-m-d') : '';
                                             
                                if(isset($finaldata->status) &&  $finaldata->status !=  ''){
                                    $finalstatuspercentage[] =   $finaldata->status;
                                } 
                              
                                $gnttname[] = $finaldata->task_list ?? "";
                                // why i m commanding above line is this line makes inital error of live project page
                                
                                $date_now = date("Y-m-d"); // this format is string comparable
                                
                                if (isset($delivery_date) && $date_now > $delivery_date) {
                                    $datetime1 = new DateTime($date_now);
                                    $datetime2 = new DateTime($delivery_date);
                                    $intervalday[] = $datetime1->diff($datetime2)->days * 24;
                                }else{
                                    $intervalday[] = 0;
                                }
                                 
                              
             
                                $days = (strtotime($finaldata->start_date) - strtotime($finaldata->end_date)) / (60 * 60 * 24);
                                $start = date_create(str_replace('/','-',$finaldata->start_date));
                                $end   = date_create(str_replace('/','-', $finaldata->end_date));   // Current time and date
                                $diff   = date_diff( $start, $end );
                                $seriesdata[] = array('y'=>$diff->days * 24,
                                                     'color'=>'#008ffb' );
                                
                            
                                $overall= $overall == 0 ? 1 : $overall; //this line is edited by surendhar for make 1 purpose
                                $completecount = count($finalstatuspercentage);
                                $totalcompletecount[] = $completecount;
                                // dd( $finaldata->get_task_list->task_list_name  );
                                $rearr[] = array('name' => $finaldata->get_task_list->task_list_name ?? '' ,
                                             'completed'=> round(($completecount /$overall )*100),2);
                            }
                        }

                    }
                    if(count($projechtchart) > 0){
         
                        $result = array('overall'=> round(((array_sum($totalcompletecount) / array_sum($totaloverall))*100),2),
                        'completed' => $rearr);
                        //dd($result);
                    }else{
                        $result = array('overall'=> 0,
                        'completed' => 0);
                    }
                    $OverAllData =  $result['overall'];
                    $width = $result['overall'] == 0 ? '0%' : $result['overall'].'%';
                    $color = $result['overall'] == 0 ? 'bg-danger' : 'bg-success';
                    return '
                        <div class="progress bg-light border" style="position:relative;"> 
                            <div class="progress-bar '.$color.' progress-bar-striped progress-bar-animated" role="progressbar" style="width: '.$width.';" aria-valuenow="'. $result['overall'].'" aria-valuemin="0" aria-valuemax="100">
                                <small class="smallTag">'. $result['overall'].'%</small>
                            </div>
                        </div>
                    ';
                })
                ->addColumn('action', function ($dataDb) { 
                    return '<div class="dropdown">
                            <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="'.route('live-projects-data', $dataDb->id).'">View/Edit</a>
                                <a class="dropdown-item" onclick="EnquiryQuickView('.$dataDb->id.' , this)" >View Enquiry</a>
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
        $project = $this->projectRepo->getProjectById($id);
        $project->is_new_project = false;
        $project->save();
        if(!$project->wizard_connect_platform) {
            $project->is_move_to_customer_input_folder = 1;
        }
        return $project;
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
            $project = $this->projectRepo->getProjectById($project_id);
            if($project->is_submitted == 1) {
                $sharepointObj = new SharepointController();
                $response['folders'] = $sharepointObj->listAllFolder($project_id);
            } else {
                $project = $this->projectRepo->getSharePointFolder($project_id);  
                $response['folders']= json_decode($project->sharepointFolder->folder);
            }
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

        $project_id = $this->getProjectId();
        $arr         = Project::whereId($project_id)->with('folders')->get(); 
        $narr=[];
        foreach($arr[0]['folders'] as $a){
            $a->setAttribute('isDirectory',true);
            array_push($narr,$a);
        }
        $sharepoint['folders']=$narr;
        // $sharepoint =  isset($project->sharepointFolder->folder) ? json_decode($project->sharepointFolder->folder) : [];

        $team_setup = [];
       
        if (!empty($project_team_setups)) {
            foreach ($project_team_setups as $project_team) {
                $employee = Employees::find($project_team->team);
                $team = $employee->map(function ($user) {
                    return $user->first_name;
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
            "project_comments"  => $this->projectChatRepo->getCommentsCountByType($id)->pluck('comments_count', 'type'),
            "project_active_comments" => $this->projectChatRepo->getActiveCommentsCountByType($id)->pluck('comments_count', 'type')
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
            $project = $this->projectRepo->getProjectById($id);
            $project = $this->projectRepo->getProjectById($id);
            if($project->is_submitted == 1) {
                $sharepointObj = new SharepointController();
                $response['folders'] = $sharepointObj->listAllFolder($id);
            } else {
                $project = $this->projectRepo->getSharePointFolder($id);  
                $response['folders']= json_decode($project->sharepointFolder->folder);
            }
            $response['platform_access'] = $this->projectRepo->getConnectionPlatform($id)  ?? json_encode(['sharepoint_status', 'bim_status', 'tf_office_status']);
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
        session()->put('current_project',$project);
        if ($type == 'create_project') {
            if (empty($project->customer_id)) {
                $customer = $this->formatCustomerData($data);
                $data['customer_id'] = $this->customerRepo->create($customer)->id;
            }
            $data['reference_number'] = GlobalService::getProjectNumber();
            $project = $this->projectRepo->storeProjectCreation($project_id, $data);
            $this->setProjectId($project->id);
            $sharepointFolders = $this->projectRepo->getSharePointMasterFolders();
            $data = [
                'folder'      => json_encode($sharepointFolders),
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
            $this->projectRepo->EstablishNewProject($project_id); 
            // $this->projectRepo->getToDoListData($project_id);
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
                if($project->is_move_to_customer_input_folder) {
                    $res = $this->moveFileToSharepoint($project->enquiry_id, $project);
                }
                
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
        $folders=sharePointMasterFolder::get();
        if ($type == 'create_project') {
            $project = $this->projectRepo->storeProjectCreation($id, $data);
            $sharepointFolders = $this->projectRepo->getSharePointMasterFolders();
            if (!$project->sharepointFolder()->exists()) {
                $data = [
                    'folder'      => json_encode($sharepointFolders),
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
            if($request->input('data.is_move_to_customer_input_folder')==true){
                projectsFolders::where('pid',$project->id)->delete();
                foreach($folders as $folder){
                  $folder=sharePointMasterFolder::find($folder->id);
                    $project->folders()->attach($folder);
                }
            }
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
            $this->projectRepo->EstablishNewProject($id); 
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
                if($project->is_move_to_customer_input_folder) {
                    $res = $this->moveFileToSharepoint($project->enquiry_id, $project);
                }
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
            'password'       => '12345678',
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

    public function updateTeamSetupTemplate(Request $request , $id)
    {
        $result = TeamSetupTemplate::findOrFail($id)->update([
            'template_name' => $request->template_name,
            'template_data' => json_encode($request['data'])
        ]);
        if ($result) {
            return response(['status' => true, 'msg' => "Template updated successfully"]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function deleteTeamSetupTemplate($id)
    {
        try {
            $response = $this->projectRepo->deleteTeamSetupTemplate($id);
            if ($response) {
                return response(['status' => true, 'msg' => "Template deleted successfully"]);
            }
        } catch (\Throwable $th) {
            return response(['status' => false, 'msg' => __('global.something')]);
        } 
    }

    public function editTeamSetupTemplate($id)
    {
        return TeamSetupTemplate::findOrFail($id);
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
        // $sharePoint = new SharepointController();
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
    public function deleteFolderWithoutId(Request $req){
        $project_id = $this->getProjectId();
        $folder=$req->path;
        // deletion row from a table 
        $folder_detail=sharePointMasterFolder::where('name',$folder)->first();
        $folder_id=$folder_detail['id'];
        $deleted=ProjectsFolders::where('pid',$project_id)->where('fid',$folder_id)->delete();
        if($deleted){
            return response(['status' => true, 'msg' => __('global.deleted')]);
        }
        else{
            return response(['status' => false, 'msg' => __('global.something')]);
        }
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
            $folderPath = GlobalService::getSharepointPath($reference_number, 'Customer Input');
            $ifcDocuments = $this->documentTypeEnquiryRepo->getDocumentByEnquiryId($enquiry_id);
            $buildingDocuments = $this->documentTypeEnquiryRepo->geBuildingDocumentByEnquiryId($enquiry_id);
            if (!empty($ifcDocuments)) {
                foreach ($ifcDocuments as $ifcdocument) {
                    $filePath = asset('public/uploads/'.$ifcdocument->file_name);
                    Log::info(' $filePath '. $filePath );
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
        try {
            Log::info("add member to project start");
            $employees = [];
            $teamSetups = $this->projectRepo->getProjectTeamSetup($project->id);
            foreach ($teamSetups as $teamSetup) {
                if (!empty($teamSetup->team)) {
                    $employees[] = $teamSetup->team;
                }
            }
            $employees_id = Arr::flatten($employees);
            $employees = Employees::find($employees_id);
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
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
        }
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
        $commentid = $request->ticket_comment_id;
        try{
            $maildata = "<html> <body><table class='table custom table-bordered'> <thead> <tr> <td colspan='2' class='text-center' style='background: #F4F4F4'><b class='h4'>Variation Request - 01</b></td> </tr> <tr> <td colspan='2' class='text-center'><b class='h4'>Architectural Support for Hytte Norefiell</b></td> </tr> </thead> <tbody> <tr> <td width='200px'><b>Project Name</b></td> <td>Hytte Norefiell</td> </tr> <tr> <td><b>Client Name</b></td> <td>Modul Pluss</td> </tr> <tr> <td><b>Project Incharge</b></td> <td>Mariusz Pierzgalski</td> </tr> <tr> <td><b>Date of Change Request</b></td> <td>22/05/2021</td> </tr> </tbody> </table> <table class='table custom table-bordered'> <tbody> <tr><td colspan='2' class='text-center' style='background: #F4F4F4'><b>Change Request Overview</b></td></tr> <tr> <td width='250px'><b>Description of Variation / Change</b></td> <td>Architectural support for over all building design & detailing</td> </tr> <tr> <td><b>Reason for Variation / Change</b></td> <td>There was no Architectural design for the building</td> </tr> </tbody> </table> <table class='table custom table-bordered'> <tbody> <tr><td colspan='4'class='text-center' style='background: #F4F4F4'><b>Change in Contract Price</b></td></tr> <tr> <td><b>Estimated Hours</b></td> <td><b>Price/Hr</b></td> <td rowspan='2'></td> <td rowspan='2' class='text-center'>kr 30, 000</td> </tr> <tr> <td>60</td> <td>kr 500</td> </tr> </tbody> <tfoot> <tr> <td colspan='2'></td> <td rowspan='2' class='text-end'><b>Total Price</b></td> <td rowspan='2' class='text-center'><b>kr 30, 000</b></td> </tr> </tfoot> </table></body></html>";
             $data = [
                'project_id'     => $request->data['projectid'],
                'ticket_comment_id'=> $commentid, 
                'title'          => $request->data['title'],
                'description'    => $request->description,
                'response'       => $request->variationchange,
                'change_date'    =>  date('Y-m-d', strtotime($request->data['change_date'])),
                'project_hrs'    => $request->data['hours'],
                'project_price'  => $request->data['price'],
                'total_price'    =>$request->data['hours'] * $request->data['price'] ,
                'status'         =>  1,
                'is_mail_sent'   => $maildata,
                'is_sent'        => 1,
                'customer_response' => 1,
                'variation_status' => 'Void',
                'variation_email_status' =>1];
          
            //dd($data);
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
        
        
      
	    
        $data = array('project_id' => $request->id,
                     'duedate' => (($request->duedate != '') ? $request->duedate :''),
                     'requesterdate' => (($request->requesterdate != '') ? $request->requesterdate :''),
                     'priority' =>$request->priority,
                     'status'   =>$request->status ?? '',
                     'refno'   =>$request->refno ?? '',
                     'tickettype' => $request->tickettype ?? '',
                    

    );
        
        
        return $this->ProjectTicket->getprojectticketfiltersearch($data);
    }

    public function projectticketfind($id){
       
        return $this->ProjectTicket->findprojectticket($id);

    }
    public function variationticketfind($id){
       
        return $this->ProjectTicket->findvariationticket($id);

    }

    public function sendcustomerMail($projectid,$cid){
       $data =  ProjectTicket::find($projectid);
       $data-> variation_email_status = 1;
       $data->update();
       //dd($data['ticket_comment_id']);

       
        $project_ticket = $this->ProjectTicket->findprojectticket($data['ticket_comment_id']);
       
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
    public function storeNotes(Request $request){
        //dd($request->data);
        GeneralNote::create(array('notes'=>$request->data,
                                  'project_id' =>$request->project_id,
                                ));
                                return response(['status' => true, 'msg' => 'Generel Note Added'],  Response::HTTP_OK);
    }
     public function liveprojectnote($id)
    {
        return GeneralNote ::where('project_id',$id)
                    ->first();
    }
     public function getRoleByProjectSlug($name,$type,$project_id){

        list($seenBy, $role_id,$created_by) = $this->getUser();
      
        if($type == 'internal' &&  $role_id == ''){
            $result['team'] = $this->roleRepository->getRoleBySlug($name);
            $projectdata  = $this->projectRepo->liveprojectdata($project_id);
            $result['user'] =  $projectdata->customerdatails;

        }
        else if($type == 'internal'){
            $result['team'] = $this->roleRepository->getRoleBySlug($name);
            $result['user'] =  Employees :: find(Admin()->id);
        }else{
            $result['team'] = array(); 
            $projectdata  = $this->projectRepo->liveprojectdata($project_id);
            //dd($projectdata->customerdatails);
            $result['user'] =  $projectdata->customerdatails;
        }
        return $result;


    }
    //Search Chart
    public function searchchart($id,$type){
        //dd($type);
        return $this->projectRepo->getliveProjectchart($id,$type);
    }

    public function getUser()
    {

        //dd(Admin());
        if (!empty(Customer()->id)) {
            $seenBy = Customer()->id;
            $role_id = '';
            $created_by = 'Admin';
        } else {
            $seenBy =  Admin()->id;
            $role_id = Admin()->job_role;

            $created_by = 'Customer';
        }
        return [$seenBy, $role_id,$created_by];
    }
    
    public function ShowVeriationComment(Request $request, $version, $id, $proposal_id)
    {
        return $this->ProjectTicket->showVeriationComment($request, $version, $id, $proposal_id);
    }
    public function veriationcomments(Request $request){
        $role_by        =   1;
        $seen_by        =   1; 
        $result         =   $this->ProjectTicket->veriationcomments($request, $request->created_by, $role_by,$seen_by);
        return  response(['status' => true, 'data' => 'Success', 'msg' => 'Comment Updated'], Response::HTTP_OK);
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
    public function VariationUpdate(Request $request){
        $id = $request->ticket_comment;
        //dd($request->data['id']);
       $data =  ProjectTicket :: find($request->data['id']);
       $data->description = $request->description;
       $data->response    = $request->variationchange;
       $data->project_hrs = $request->project_hrs;
       $data->project_price = $request->estimate_hrs;
       $data->change_date   = $request->changedate;
       $data-> total_price = $request->total;
       $data->update();
       return response(['status' => true, 'data'=>  $data, 'msg' => 'updated'], Response::HTTP_OK);

        //dd($request->input());
    }



    public function getProjectCount()
    {
        $unestablishedCount = Project::where(['status'=>'In-Progress', 'is_new_project' => 1])->get()->count();
        return ['unestablishedCount'=>$unestablishedCount];
    }

    public function Duplicatevariation($id){
        $result                 =    ProjectTicket :: find($id);
        $totalvariationVersion  =    ProjectTicket::where(["ticket_comment_id" => $result->ticket_comment_id ])->get()->count();
        $duplicate              =    new ProjectTicket;
        $duplicate->ticket_comment_id =  $result->ticket_comment_id;
        $duplicate->variation_version = $result->variation_version +1;
        $duplicate->project_id        = $result->project_id ;
        $duplicate->title             = $result->title;
        $duplicate->description       = $result->description;
        $duplicate->response         =  $result->response;
        $duplicate->change_date      = $result->change_date;
        $duplicate->project_hrs      = $result->project_hrs;
        $duplicate->project_price   =  $result->project_price;
        $duplicate->total_price     = $result->total_price;
        $duplicate->status          = $result->status;
        $duplicate->variation_status = 'Waiting for send!';
        $duplicate->is_mail_sent    = $result->is_mail_sent;
        $duplicate->is_active       = $result->is_active;
        $duplicate  ->  save();  
        return response(['status' => true, 'msg' => 'Variation Order Duplication Created'], Response::HTTP_CREATED);
    }
    public function TicketVariationList($id){
        return $this->ProjectTicket->getprojectticketvariation($id);
        //dd($id);
    }
    public function VariationView($id){
        $project_ticket_show= ProjectTicket :: Where('ticket_comment_id', $id)
                                           ->latest()->first();
        $data['project'] = $this->projectRepo->liveprojectdata($project_ticket_show->project_id);
        $getveriationorder  = ProjectTicket :: Where('ticket_comment_id', $id)
                                            ->orderBy('id','desc')
                                                ->get();
                                               
        $data['getveriationorder']  = $getveriationorder;
       
        $enquiry = $this->customerEnquiryRepo->getEnquiry($id);
        if(empty($project_ticket_show)) {
            Flash::error('Not found');
            return redirect(route('customers-enquiry-dashboard'));
        }
        $data['proposals'] = array();
        $data['countvariation']  = ProjectTicket :: Where('ticket_comment_id', $id)
                                                    ->count();
        $data['ticket_comment_id']      = $id;
        $data['ticket_id']              = $project_ticket_show->id;
        $data['version_id']              =  ProjectTicket :: Where('ticket_comment_id', $id)
                                                             ->count();                                            


        //$id = 3;
        $latestVersion = $this->getLatestVariation($project_ticket_show->id);
        if(empty($project_ticket_show )) {
            Flash::error('No proposal found.');
            return redirect(route('customers-enquiry-dashboard'));
        }
      
       
        $data['latest_proposal'] = $latestVersion;
        return view('customer.projects.live-project.view-variation-orders', with($data),compact('project_ticket_show','id'));
    }
    public function getLatestVariation($id){

        $veriation = ProjectTicket :: find($id);

        return $veriation;
       // dd($id);
    }
    public function getLatestProposal($enquiry_id)
    {
        $proposal  = ProposalVersions::where(['enquiry_id'=> $enquiry_id, 'status' => 'sent'])->latest()->first();
        if(empty($proposal)) {
            $proposal  = MailTemplate::where(['enquiry_id'=> $enquiry_id, 'status' => 'sent'])->latest()->first();
            if(empty($proposal)) {
                $proposal = ProposalVersions::where('enquiry_id', $enquiry_id)
                                            ->where('status','!=','awaiting')
                                            ->orderBy('id','desc')->first() 
                            ?? MailTemplate::where('enquiry_id', $enquiry_id)
                                            ->where('status','!=','awaiting')
                                            ->orderBy('proposal_id','desc')->first();
            }
        }
        return $proposal;
    }
    public function SendVariation($id){
       
        $data =  ProjectTicket::find($id);
        $data-> variation_email_status = 1;
        $data-> customer_response = 1;
        $data-> is_sent = 1;
        $data->variation_status = 'Void';
        $data->update();
        //dd($data['ticket_comment_id']);
 
        
         $project_ticket = $this->ProjectTicket->findprojectticket($data['ticket_comment_id']);
        
         $project        = $this->projectRepo->liveprojectdata($project_ticket['ticket']['project_id']);
        
         $details = [
             'ticket_id'         =>'TIC-00'.$id,
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
            
            return response(['status' => true, 'msg' => trans('Variation sent successfuly !')],  Response::HTTP_OK);
         
 
     
    }
  public function sharePointCreateDelete(){
    $project_id = $this->getProjectId();
    if(projectsFolders::where('pid',$project_id)->exists()){
        projectsFolders::where('pid',$project_id)->delete();
        return 'ok';
    }
  }
}
