<?php

namespace App\Repositories;

use App\Interfaces\ProjectTicketRepositoryInterface;
use App\Models\ProjectTicket;
use App\Models\TicketComments;
use App\Models\Project;
use App\Models\Employee;
use App\Models\ProjectTeamSetup;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectTicketRepository implements ProjectTicketRepositoryInterface {
    protected $model;
    protected $projectModel;
    protected $projectTicketCase;
    protected $projectteamsetup;
    protected $employee;

    public function __construct(
        ProjectTicket $ProjectTicket,
        Project $projectModel,
        TicketComments $projectTicketCase,
        ProjectTeamSetup $projectteamsetup,
        Employee $employee
       
        ){
        $this->model                            = $ProjectTicket;
        $this->Project                          = $projectModel;
        $this->Projectticketcase                = $projectTicketCase;
        $this->projectteamsetup                 = $projectteamsetup;
        $this->employee                         = $employee;
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
        $ProjectTicket['ticketcase'] = $this->Projectticketcase->with('assigndetails')
                                                ->where('project_id',$id)->orderBy('id','desc')->get();

        //dd($ProjectTicket['ticketcase']);
       
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

     public function findprojectteam($projectid)
    {
        $team = array();
        $projectteamsetup =   $this->projectteamsetup->where('project_id',$projectid)->get();

        foreach($projectteamsetup as $projectteam){
            $team[] = implode(",",$projectteam->team);
        }
       
        $employeedata =  $this->employee->select('first_Name')->whereIn('id' ,$team)->get() ;

        
        
        return $employeedata;
    }

    
    
}