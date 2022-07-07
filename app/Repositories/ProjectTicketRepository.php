<?php

namespace App\Repositories;

use App\Interfaces\ProjectTicketRepositoryInterface;
use App\Models\ProjectTicket;
use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectTicketRepository implements ProjectTicketRepositoryInterface {
    protected $model;
    protected $projectModel;

    public function __construct(
        ProjectTicket $ProjectTicket,
        Project $projectModel
        ){
        $this->model = $ProjectTicket;
        $this->Project   = $projectModel;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
      

        return $this->model->create($data);
    
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        $taskList = $this->model->find($id);
        $taskList->delete();
    }


    public function find($id)
    {
        if (null == $ProjectTicket = $this->model->find($id)) {
            throw new ModelNotFoundException("Ticket not found");
        }
        return $ProjectTicket;
    }
    
    public function get($request)
    {
        return $this->model->where('is_active',1)->get();
    }
    public function getprojectticket($id)
    {
      
        if (null == $ProjectTicket['ticket'] = $this->model->where('project_id',$id)->get()) {
            throw new ModelNotFoundException("Ticket not found");
        }
        $ProjectTicket['project'] = $this->Project ::with('customerdatails') ->find($id);
       
        //$this->projectModel->find($id);
      
        return $ProjectTicket;
    }

    public function findprojectticket($id)
    {

        $ticket =  $this->model->find($id);
      
        if (null == $ProjectTicket['ticket'] = $this->model->find($id)) {
            throw new ModelNotFoundException("Ticket not found");
        }
        $ProjectTicket['project'] = $this->Project ::with('customerdatails') ->find($ticket->project_id);
       
        //$this->projectModel->find($id);
      
        return $ProjectTicket;
    }

    
    
}