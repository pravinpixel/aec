<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sharepoint\SharepointController;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\CustomerRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Jobs\SharePointFolderCreation;
use App\Models\CheckList;
use App\Models\DeliveryType;
use App\Models\InvoicePlan;
use App\Models\Project;
use App\Models\ProjectGranttTask;
use App\Models\ProjectType;
use App\Models\SharepointFolder;
use App\Services\GlobalService;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    protected $projectRepo;
    protected $customerEnquiryRepo;
    protected $customerRep;
    protected $index = 0;
    protected $parentFolder = '';
    protected $rootFolder = '/DataBase Test';
    protected $fileDir = [];

    public function __construct(
       ProjectRepositoryInterface $projectRepo,
       CustomerEnquiryRepositoryInterface $customerEnquiryRepo,
       CustomerRepositoryInterface $customerRepo
    ){
        $this->projectRepo        = $projectRepo;
        $this->customerEnquiryRepo = $customerEnquiryRepo;
        $this->customerRepo        = $customerRepo;
    }

    public function index()
    { 
        return view('admin.projects.index');
    }

    public function checkListMasterGroup ()
    {
        $list       =   CheckList::with('getTaskList')->latest()->get();
        $collection =   collect($list);
        $grouped    =   $collection->groupBy('name');
        $grouped    ->  all();
        $result     =    [];

        foreach($grouped as $row) {
            $check_lists = CheckList::where("name",  '=' , $row[0]->name)->with('getTaskList')->get();
            $check_lists_data = [];
            foreach($check_lists as $check_row) {
                $tasks  =   CheckList::where('task_list_category', $check_row->getTaskList->id)->select('id','task_list')->get();
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
  
        return response()->json(['status' => true,'data' => $result], Response::HTTP_OK);
    }
    public function updateIndex()
    {
        return $this->index +=1;
    }
    public function checkIndex()
    { 
        $statement  =   DB::select("SHOW TABLE STATUS LIKE 'aec_project_grantt_tasks'");
        return $this->index = $statement[0]->Auto_increment-1;
    }
    public function storeToDoList(Request $request)
    {  

        $this->checkIndex();
        $loop_one =  $request->data;
        $result = [];

        Project::find($request->id)->update(["gantt_chart_data" => json_encode($request->data)]);
       
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
 
        return response()->json(['status' => true,'data' => $result], Response::HTTP_OK);
    }

    public function checkListMasterGroupList (Request $request) {

        $list           =   CheckList::where("name",  '=' , $request->data)->with('getTaskList')->latest()->get();

        $grouped        =   $list->groupBy('task_list_category')->map(function($item){
            return ['name' => $item[0]->getTaskList->task_list_name, 'data' => $item ];
        });
 
        $result = [
            "name" => $request->data,
            "data" => $grouped
        ];
 
        return response()->json(['status' => true,'data' => $result], Response::HTTP_OK);
    }

    public function create()
    {
        Session::forget('project_id');
        $this->projectRepo->checkReferenceNumber();
        return view('admin.projects.create');
    }

    public function edit($id)
    {
        return view('admin.projects.edit', compact('id'));
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

    public function show($id)
    {
        return $this->projectRepo->getProjectById($id);
    }

    public function getReferenceNumber()
    {
        return GlobalService::getProjectNumber();
    }

    public function getProjectId(){
        return Session::get('project_id') ?? "Session is Out";
    }

    public function setProjectId($id){
        Session::forget('project_id');
        return Session::put('project_id', $id);
    }

    public function getProject($type)
    {
         
        $project_id = $this->getProjectId();
        if(empty($project_id)) return false;
        if($type == 'create_project') {
            return $this->projectRepo->getProjectById($project_id);
        } else if($type == 'team_setup') {
            return $this->projectRepo->getProjectTeamSetup($project_id);
        } else  if($type == 'project_scheduler') {
            return $this->projectRepo->getGranttChartTaskLink($project_id);
        } else if($type == 'invoice_plan') {
            return $this->projectRepo->getInvoicePlan($project_id);
        } else if($type ==  'connection_platform') {
            $project = $this->projectRepo->getSharePointFolder($project_id);
            return isset($project->sharepointFolder->folder) ? json_decode($project->sharepointFolder->folder) : [];
        }else if ($type ==  'to_do_listing') {
            return $this->projectRepo->getToDoListData($project_id);
        }
    }

    public function overViewProject($id)
    {
        $project_data   =   Project::find($id)->toArray();
        $invoice_plan   =   InvoicePlan::where('project_id', $id)->first();
        $invoice_data   =   json_decode($invoice_plan->invoice_data ?? '');
        $data   =  [
            "project_type"   =>  ProjectType::find($project_data['project_type_id'])->project_type_name,
            "delivery_type"  =>  DeliveryType::find($project_data['delivery_type_id'])->delivery_type_name,
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
        if($type == 'create_project') {
            return $this->projectRepo->getProjectById($id);
        } else if($type == 'team_setup') {
            return $this->projectRepo->getProjectTeamSetup($id);
        } else if($type == 'project_scheduler') {
            return $this->projectRepo->getGranttChartTaskLink($id);
        } else if($type == 'invoice_plan') {
            return $this->projectRepo->getInvoicePlan($id);
        } else if($type == 'to-do-list') {
            return $this->projectRepo->getToDoList($id);
        } else if($type == 'connection_platform') {
            $project = $this->projectRepo->getSharePointFolder($id);
            return isset($project->sharepointFolder->folder) ? json_decode($project->sharepointFolder->folder) : [];
        }
    }

    public function store(Request $request)
    {
        $type          = $request->input('type');
        $data          = $request->input('data');
        $project_id    = $this->getProjectId();

        $project = $this->projectRepo->getProjectById($project_id);
        
        if($type == 'create_project') {
            if(empty($project->customer_id)){
                $customer = $this->formatCustomerData($data);
                $data['customer_id'] = $this->customerRepo->create($customer)->id;
            }
            $data['reference_number'] = GlobalService::getProjectNumber();
            $project = $this->projectRepo->storeProjectCreation($project_id, $data);
            $this->setProjectId($project->id);
            try {
                $reference_number = str_replace('/','-',$project->reference_number);
                $folderPath = ["path"=> "{$this->rootFolder}/{$reference_number}"];
                $job = (new SharePointFolderCreation($folderPath))->delay(config('global.job_delay'));
                $this->dispatch($job);
            } catch(Exception $ex) {
                Log::info($ex->getMessage());
            }
            $data = [
                'folder'      => json_encode(config('project.default_folder')),
                'project_id'  => $project->id,
                'created_by' => Admin()->id,
                'modified_by' => Admin()->id
            ];
            $this->projectRepo->updateFolder($project_id, $data);
            return $project;
        } else if($type == 'connect_platform') {
            return $this->projectRepo->storeConnectPlatform($project_id, $data);
        } else if($type == 'team_setup'){
            return $this->projectRepo->storeTeamSetupPlatform($project_id, $data);
        } else if($type == 'task') {
            return $this->storeGrandChartTask($project_id, $request);
        } else if($type == 'link') {
            return $this->storeGrandChartLink($project_id, $request);
        } else if($type == 'invoice_plan') {
            return $this->projectRepo->storeInvoicePlan($project_id, $data);
        } else if($type == 'review_and_submit') {
            $result = $this->createSharepointFolder($project_id);
            $this->projectRepo->draftOrSubmit($project_id, ['is_submitted' =>$result['status']]);
            return  response($result);
        } else if($type == 'review_and_save') {
            $this->projectRepo->draftOrSubmit($project_id, ['is_submitted' => false]);
            return  response(['status'=> true, 'msg'=> 'Project saved successfully']);
        }
        return $request->all();
    }

    public function update($id, Request $request)
    {
        $type = $request->input('type');
        $data = $request->input('data');
        if($type == 'create_project') {
            $project = $this->projectRepo->storeProjectCreation($id, $data);
            $this->setProjectId($project->id);
        } else if($type == 'connect_platform') {
            return $this->projectRepo->storeConnectPlatform($id, $data);
        } else if($type == 'team_setup') {
            return $this->projectRepo->storeTeamSetupPlatform($id, $data);
        } else if($type == 'invoice_plan') {
            return $this->projectRepo->storeInvoicePlan($id, $data);
        } else if($type == 'review_and_submit') {
            $result = $this->createSharepointFolder($id);
            $this->projectRepo->draftOrSubmit($id, ['is_submitted' => $result['status']]);
            return response($result);
        } else if($type == 'review_and_save') {
            $this->projectRepo->draftOrSubmit($id, ['is_submitted' => false]);
            return response(['status'=> true, 'msg'=> 'Project saved successfully']);
        }
        return $request->all();
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
        if(empty($project_id)) return false;
        $projectTask = new ProjectGranttChartTaskController();
        return $projectTask->store($project_id , $request);
    }

    public function storeGrandChartLink(Request $request)
    {
        $project_id = $this->getProjectId();
        if(empty($project_id)) return false;
        $projectLink = new ProjectGranttChartLinkController();
        return $projectLink->store($project_id , $request);
    }

    public function updateGrandChartTask($id, Request $request)
    {
        $project_id = $this->getProjectId();
        if(empty($project_id)) return false;
        $projectTask = new ProjectGranttChartTaskController();
        return $projectTask->update($project_id, $id, $request);
    }

    public function updateGrandChartLink($id, Request $request)
    {
        $project_id = $this->getProjectId();
        if(empty($project_id)) return false;
        $projectLink = new ProjectGranttChartLinkController();
        return $projectLink->update($project_id ,$id,  $request);
    }

    public function deleteGrandChartTask($id)
    {
        $project_id = $this->getProjectId();
        if(empty($project_id)) return false;
        $projectLink = new ProjectGranttChartLinkController();
        return $projectLink->update($project_id ,$id);
    }

    public function deleteGrandChartLink($id)
    {
        $project_id = $this->getProjectId();
        if(empty($project_id)) return false;
        $projectLink = new ProjectGranttChartLinkController();
        return $projectLink->destroy($project_id ,$id);
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
        if($response) {
            return response(['status' => true, 'msg' => __('global.template_added')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function getFolderById($id) {
        $response = $this->projectRepo->getFolderById($id);
    }

    public function storeFolder(Request $request)
    {
        $project_id = $this->getProjectId();
        // $requestPath = $request->path;
        $data = [
            'folder' => json_encode($request->data),
            'project_id' => $project_id,
            'created_by' => Admin()->id
        ];
        // $project = $this->projectRepo->getProjectById($project_id);
        // if(substr($request->path,0,1) != '/') {
        //     $requestPath = '/'. $request->path;
        // }
        // try {
        //     $reference_number = str_replace('/','-',$project->reference_number);
        //     $folderPath = ["path"=> "{$this->rootFolder}/{$reference_number}{$requestPath}"];
        //     $job = (new SharePointFolderCreation($folderPath))->delay(60);
        //     $this->dispatch($job);
        // } catch (Exception $ex) {
        //     Log::error($ex->getMessage());
        //     return response(['status' => false, 'msg' => __('global.something')]);
        // }
        $response = $this->projectRepo->updateFolder($project_id, $data);
        if($response) {
            return response(['status' => true, 'msg' => __('global.created')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function updateFolder($project_id, Request $request)
    {
        // $project = $this->projectRepo->getProjectById($project_id);
        // $requestPath = $request->path;
        $data = [
            'folder'      => json_encode($request->data),
            'project_id'  => $project_id,
            'created_by' => Admin()->id,
            'modified_by' => Admin()->id
        ];
        // if(substr($request->path,0,1) != '/') {
        //     $requestPath = '/'. $request->path;
        // }
        // try {
        //     $reference_number = str_replace('/','-',$project->reference_number);
        //     $folderPath = ["path"=> "{$this->rootFolder}/{$reference_number}{$requestPath}"];
        //     $job = (new SharePointFolderCreation($folderPath))->delay(config('global.job_delay'));
        //     $this->dispatch($job);
        // } catch (Exception $ex) {
        //     Log::error($ex->getMessage());
        //     return response(['status' => false, 'msg' => __('global.something')]);
        // }
        $response = $this->projectRepo->updateFolder($project_id, $data);
        if($response) {
            return response(['status' => true, 'msg' => __('global.updated')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function deleteFolder($project_id = null, Request $request)
    {
        $sharePoint = new SharepointController();
        if(is_null($project_id)){
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
            $reference_number = str_replace('/','-',$project->reference_number);
            $folderPath = "{$this->rootFolder}/{$reference_number}/{$requestPath}";
            $sharePoint->delete($folderPath);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return response(['status' => false, 'msg' => __('global.something')]);
        }
        $response = $this->projectRepo->updateFolder($project_id, $data);
        if($response) {
            return response(['status' => true, 'msg' => __('global.deleted')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

    public function createSharepointFolder($project_id)
    {
        $project = $this->projectRepo->getProjectById($project_id);
        $sharepoint = SharepointFolder::where('project_id', $project_id)->first();
        if(!empty($sharepoint)) {
            $dirs = json_decode($sharepoint->folder);
            try {
                $reference_number = str_replace('/','-',$project->reference_number);
                foreach( $dirs as $dir ){
                    $this->myRecursive($dir);
                }
                foreach($this->fileDir as $path) {
                    $data = ['path' => "{$this->rootFolder}/{$reference_number}".$path];
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

    public function myRecursive($dir, $rootPath = '')
    {
        if(!is_array($dir)) {
            $dir = [$dir];
        }
        foreach ($dir as  $item) {
            if(!isset($item->items)){
                $this->fileDir[] =  $rootPath.'/'.$item->name;
                $rootPath = '';
                break;
            } else {
                $rootPath =  $rootPath.'/'.$item->name;
                $this->fileDir[] =  $rootPath;
                $this->myRecursive($item->items, $rootPath);
            }
        }
        return $this->fileDir;
    }
}
