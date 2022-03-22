<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use App\Models\ProjectAssignToUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectRepository implements ProjectRepositoryInterface{
    protected $model;
    protected $project_assign_model;
    public function __construct(Project $project, ProjectAssignToUser $project_assign_model)
    {
        $this->model                = $project;
        $this->project_assign_model = $project_assign_model;
    }

    public function create($enquiry_id, $data)
    {
        return $this->model->updateOrCreate(['enquiry_id'=> $enquiry_id], $data);
    }

    public function assingProjectToUser($enquiry_id, $data)
    {
       return $this->project_assign_model
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

}