<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\DeliveryType;
use App\Models\InvoicePlan;
use App\Models\Project;
use App\Models\ProjectAssignToUser;
use App\Models\ProjectGranttLink;
use App\Models\ProjectGranttTask;
use App\Models\ProjectTeamSetup;
use App\Models\ProjectType;
use App\Models\SharepointFolder;
use App\Models\TeamSetupTemplate;
use App\Services\GlobalService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectRepository implements ProjectRepositoryInterface{
    protected $model;
    protected $projectAssignModel;
    protected $projectTeamSetup;
    protected $invoicePlan;
    protected $teamSetupTemplate;
    protected $sharepointFolder;

    public function __construct(
        Project $project, 
        ProjectAssignToUser $projectAssignModel, 
        ProjectTeamSetup $projctTeamSetup, 
        InvoicePlan $invoicePlan,
        TeamSetupTemplate $teamSetupTemplate,
        SharepointFolder $sharepointFolder
    ){
        $this->model                = $project;
        $this->projectAssignModel   = $projectAssignModel;
        $this->projectTeamSetup     = $projctTeamSetup;
        $this->invoicePlan          = $invoicePlan;
        $this->teamSetupTemplate    = $teamSetupTemplate;
        $this->sharepointFolder     = $sharepointFolder;
    }

    public function create($enquiry_id, $data)
    { 
        $result = $this->model->updateOrCreate(['enquiry_id'=> $enquiry_id], $data);
        return $result;
    }

    public function assingProjectToUser($enquiry_id, $data)
    {
       return $this->projectAssignModel
                    ->updateOrCreate(['enquiry_id'=> $enquiry_id],$data);
    }
    
    public function unestablishedProjectList($request)
    {
        $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now()->subDays(config('global.date_period'));
        $toDate = isset($request->from_date) ? Carbon::parse($request->to_date)->format('Y-m-d') : now();
        $projetType = isset($request->projet_type) ? $request->projet_type : false;
        $dataDb =  $this->model::where('status', 'In-Progress') 
                                ->whereBetween('created_at', [$fromDate, $toDate])
                                ->when($projetType, function($q) use($projetType){
                                    $q->where('project_type_id', $projetType);
                                })
                                ->orderBy('id','desc');
        return $dataDb;
    }

    public function liveProjectList($request)
    {
        $fromDate = isset($request->from_date) ? Carbon::parse($request->from_date)->format('Y-m-d') : now()->subDays(config('global.date_period'));
        $toDate = isset($request->from_date) ? Carbon::parse($request->to_date)->format('Y-m-d') : now();
        $projetType = isset($request->projet_type) ? $request->projet_type : false;
        $dataDb =  $this->model::where('status', 'Live')
                                ->whereBetween('created_at', [$fromDate, $toDate])
                                ->when($projetType, function($q) use($projetType){
                                    $q->where('project_type_id', $projetType);
                                })
                                ->orderBy('id','desc');
        return $dataDb;
    }

    public function getProjectById($id)
    {
        return $this->model->find($id);
    }

    public function checkReferenceNumber()
    {
        $referenceNumber = GlobalService::getProjectNumber();
        $project = $this->model->where('reference_number', $referenceNumber)->first();
        if(!empty($project)) {
            GlobalService::updateConfig('PRO');
        }
    }

    public function storeProjectCreation($id, $data)
    {
        return $this->model->updateOrCreate(['id'=>$id], $data);
    }

    public function storeConnectPlatform($id, $data = [])
    {
        
    }

    public function storeTeamSetupPlatform($project_id, $data)
    {   
        $teamSetups = [];
        $project = $this->getProjectById($project_id);
        foreach($data as $row){
            $teamSetup['role_id'] = $row['role']['id'];
            $teamSetup['team'] = json_encode($row['team']);
            $teamSetups[] = $teamSetup;
        }
        $this->projectTeamSetup->where('project_id', $project_id)->delete();
        return $project->teamSetup()->createMany($teamSetups);
    }

    public function getProjectTeamSetup($project_id)
    {
        return $this->projectTeamSetup->with('role')
                                ->where('project_id', $project_id)
                                ->get();
    }

    public function getGranttChartTaskLink($project_id)
    {
        $tasks = new ProjectGranttTask();
        $links = new ProjectGranttLink();
        return [
            "data" => $tasks->where('project_id', $project_id)->get(),
            "links" => $links->where('project_id', $project_id)->get()
        ];
    }

    public function getToDoListData($id)
    {
        return $id;
    }

    public function getInvoicePlan($id)
    {
        return $this->model->with('invoicePlan')->find($id);
    }

    public function storeInvoicePlan($project_id, $data)
    {
        $project = $this->model->find($project_id);
        $insert = [
            "no_of_invoice" => $data['no_of_invoice'] ?? 0,
            "project_cost" => $data['project_cost'] ?? 0,
            "invoice_data" => json_encode($data['invoice_data'] ?? ''),
            "project_id"   => $project->id,
            "created_by"   => Admin()->id
        ];
        return $this->invoicePlan->updateOrCreate(['project_id' => $project->id],$insert);
    }

    public function getTeamsetupTemplate($data)
    {
        return $this->teamSetupTemplate->get();
    }

    function getTeamsetupTemplateById($id)
    {
        return $this->teamSetupTemplate->find($id);
    }

    public function storeTeamsetupTemplate($data)
    {
        $insert = [
            'created_by'    => Admin()->id,
            'template_data' => json_encode($data['data'])
        ];
        return $this->teamSetupTemplate->updateOrcreate(['template_name' => $data['tempalte']],$insert);
    }

    public function getToDoList()
    {
        
    }

    public function getFolderById($id)
    {

    }

    public function storeFolder($data)
    {
        return $this->SharepointFolder->create($data);
    }

    public function updateFolder($id, $data)
    {
        return $this->sharepointFolder->updateOrCreate(['project_id'=> $id], $data);
    }

    public function getSharePointFolder($id)
    {
        return $this->model->with('sharepointFolder')->find($id);
    }

    public function draftOrSubmit($id, $data)
    {
        return $this->model->find($id)->update($data);
    }
}