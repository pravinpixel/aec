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
    public function ticketdelete($id){

        return $this->Projectticketcase->where('id', $id)->delete();
        
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


    public function getprojectticketsearch($id,$type){
        
        if($type == 'show'){
            $projectticket = $this->Projectticketcase->find($id);
            $projectcollection = $projectticket->project_id;
            $ProjectTicket['ticket'] = $this->model->where('project_id',$projectcollection)->get();
            $ProjectTicket['project'] = $this->Project ::with('customerdatails') ->find($projectcollection);
            $searchticket = $this->Projectticketcase->with('assigndetails')
            ->where('project_id',$projectcollection);
            
          
            $ProjectTicket['ticketcase'] =  $searchticket->orderBy('id','desc')->get();


        }
        else{

        if (null == $ProjectTicket['ticket'] = $this->model->where('project_id',$id)->get()) {
            throw new ModelNotFoundException("Ticket not found");
        }
        $ProjectTicket['project'] = $this->Project ::with('customerdatails') ->find($id);
        $searchticket = $this->Projectticketcase->with('assigndetails')
                                                ->where('project_id',$id);
                                                if($type != 'all'){
                                                    $searchticket->where('type',$type);

                                                }
                                              
                                                $ProjectTicket['ticketcase'] =  $searchticket->orderBy('id','desc')->get();

        //dd($ProjectTicket['ticketcase']);
       
        //$this->projectModel->find($id);
                                            }
      
        return $ProjectTicket;
     

    }
    public function getprojectticketfiltersearch(array $data){
        $projectid = $data['project_id'];

       
        $ProjectTicket['ticket'] = $this->model->where('project_id',$projectid)->get();
        $ProjectTicket['project'] = $this->Project ::with('customerdatails') ->find($projectid);
        $searchticket = $this->Projectticketcase->with('assigndetails');
        
       
           if($data['project_id'] != ''){
            $searchticket->where('project_id',$data['project_id']);

           }
           if($data['fromdate'] != ''){
            
            $searchticket->whereDate('created_at', '=', $data['fromdate']);

           }
           if($data['todate'] != ''){
            $searchticket->whereDate('updated_at', '=',$data['todate']);

           }
           if($data['priority'] != ''){
            $searchticket->where('priority','LIKE','%'.$data['priority'].'%');

           }
           if($data['status'] != ''){
            $searchticket->where('project_status',$data['status']);

           }
           if($data['refno'] != ''){
            $searchticket->where('id',$data['refno']);
           }
        
           $ProjectTicket['ticketcase'] =  $searchticket->orderBy('id','desc')->get();
           return $ProjectTicket;
    }

    
    
}