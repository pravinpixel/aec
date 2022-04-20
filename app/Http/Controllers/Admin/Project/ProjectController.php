<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use App\Interfaces\CustomerRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Services\GlobalService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    protected $projectRepo;
    protected $customerEnquiryRepo;
    protected $customerRep;

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
        return Session::get('project_id');
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
        } else if($type == 'project_scheduler') {
            return $this->projectRepo->getGranttChartTaskLink($project_id);
        } else if($type == 'invoice_plan') {
            return $this->projectRepo->getInvoicePlan($project_id);
        } else if('connection_platform') {
            $project = $this->projectRepo->getSharePointFolder($project_id);
            return isset($project->sharepointFolder->folder) ? json_decode($project->sharepointFolder->folder) : [];
        }
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
        } else if('connection_platform') {
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
        $data = [
            'folder' => json_encode($request->data),
            'project_id' => $project_id,
            'created_by' => Admin()->id
        ];
        // $sharepoint = new SharepointController();
        $sharepoint = $this->projectRepo->getSharePointFolder($project_id);
        if(!empty($sharepoint)){
            $old = json_decode($project->sharepointFolder->folder);
            $new = $request->data;
            array_diff( $new , $old  );
        }
        $response = $this->projectRepo->updateFolder($project_id, $data);
    }

    public function updateFolder($project_id, Request $request)
    {
        $data = [
            'folder'      => json_encode($request->data),
            'project_id'  => $project_id,
            'created_by' => Admin()->id,
            'modified_by' => Admin()->id
        ];
        // $sharepoint = $this->projectRepo->getSharePointFolder($project_id);
        // if(!empty($sharepoint)){
        //     $old = json_decode($project->sharepointFolder->folder);
        //     $new = $request->data;
        //     dd(array_diff( $new , $old));
        // }
        $response = $this->projectRepo->updateFolder($project_id, $data);
        if($response) {
            return response(['status' => true, 'msg' => __('global.template_added')]);
        }
        return response(['status' => false, 'msg' => __('global.something')]);
    }

}
