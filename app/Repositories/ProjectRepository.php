<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use App\Models\ProjectAssignToUser;
use App\Models\ProjectGranttLink;
use App\Models\ProjectGranttTask;
use App\Models\ProjectTeamSetup;
use App\Services\GlobalService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectRepository implements ProjectRepositoryInterface{
    protected $model;
    protected $projectAssignModel;
    protected $projectTeamSetup;

    public function __construct(Project $project, ProjectAssignToUser $projectAssignModel, ProjectTeamSetup $projctTeamSetup)
    {
        $this->model                = $project;
        $this->projectAssignModel   = $projectAssignModel;
        $this->projectTeamSetup     = $projctTeamSetup;
    }

    public function create($enquiry_id, $data)
    {
        return $this->model->updateOrCreate(['enquiry_id'=> $enquiry_id], $data);
    }

    public function assingProjectToUser($enquiry_id, $data)
    {
       return $this->projectAssignModel
                    ->updateOrCreate(['enquiry_id'=> $enquiry_id],$data);
    }
    
    public function unestablishedProjectList($request)
    {
        $dataDb =  $this->model::where('status', 'In-Progress');
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

    public function storeConnectPlatform($id, $data)
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

    public function getInvoicePlan($id)
    {
        return $this->model->with('invoicePlan')->find($id);
    }
}