<?php

namespace App\Repositories;

use App\Interfaces\ProjectTicketRepositoryInterface;
use App\Models\Admin\Employees;
use App\Models\ProjectTicket;
use App\Models\TicketComments;
use App\Models\TicketcommentsReplay;
use App\Models\Project;
use App\Models\ProjectTeamSetup;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectTicketRepository implements ProjectTicketRepositoryInterface {
    protected $model;
    protected $projectModel;
    protected $projectTicketCase;
    protected $projectteamsetup;
    protected $employee;
    protected $ticketcommentsReplay;

    public function __construct(
        ProjectTicket $ProjectTicket,
        Project $projectModel,
        TicketComments $projectTicketCase,
        ProjectTeamSetup $projectteamsetup,
        Employees $employee,
        TicketcommentsReplay $ticketcommentsReplay
       
        ){
        $this->model                            = $ProjectTicket;
        $this->Project                          = $projectModel;
        $this->Projectticketcase                = $projectTicketCase;
        $this->projectteamsetup                 = $projectteamsetup;
        $this->employee                         = $employee;
        $this->TicketcommentsReplay   = $ticketcommentsReplay;
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
            throw new ModelNotFoundException("Issues not found");
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
            throw new ModelNotFoundException("Issues not found");
        }
        $ProjectTicket['project'] = $this->Project ::with('customerdatails') ->find($id);
        $ProjectTicketCollection = $this->Projectticketcase->with('assigndetails')
                                                                ->with('assigncustomerdetails');
                                                                if(!empty(Customer()->id)){
                                                                    $ProjectTicketCollection->where('cus_tag',Customer()->id)
                                                                        ->where('type','internal')
                                                                        ->orWhere('type','customer');
                                                                }

                                                 $ProjectTicket['ticketcase'] =  $ProjectTicketCollection->where('project_id',$id)->orderBy('updated_at','desc')->get();
                                                //dd( $ProjectTicket['ticketcase']);
        $newissues  = $this->Projectticketcase->where('project_id',$id)->where('project_status','New')->count();                                        
        $openissues  = $this->Projectticketcase->where('project_id',$id)->where('project_status','open')->count();                                        
        $closeissues  = $this->Projectticketcase->where('project_id',$id)->where('project_status','closed')->count();                                        
        $pendingissues  = $this->Projectticketcase->where('project_id',$id)->where('project_status','pending')->count();                                        
        $ProjectTicket['overview'] = array('new' =>$newissues,
                                            'open' => $openissues,
                                            'close' => $closeissues,
                                            'pending' =>$pendingissues);
        $ProjectTicket['internaloverview'] = array('new' => $this->Projectticketcase->where('project_id',$id)->Where('type','internal')->where('project_status','New')->count(),
                                            'open' => $this->Projectticketcase->where('project_id',$id)->Where('type','internal')->where('project_status','open')->count(),
                                            'close' =>$this->Projectticketcase->where('project_id',$id)->Where('type','internal')->where('project_status','closed')->count(),
                                            'pending' =>$this->Projectticketcase->where('project_id',$id)->Where('type','internal')->where('project_status','pending')->count());
         $ProjectTicket['customeroverview'] = array('new' => $this->Projectticketcase->where('project_id',$id)->Where('type','customer')->where('project_status','New')->count(),
                                            'open' => $this->Projectticketcase->where('project_id',$id)->Where('type','customer')->where('project_status','open')->count(),
                                            'close' =>$this->Projectticketcase->where('project_id',$id)->Where('type','customer')->where('project_status','closed')->count(),
                                            'pending' =>$this->Projectticketcase->where('project_id',$id)->Where('type','customer')->where('project_status','pending')->count());
                                    
        $showing = isset($ProjectTicket['ticketcase']['0'])? $ProjectTicket['ticketcase']['0']->showing : '';
       $showingarr = isset($showing) ? explode(',',$showing) :array();
        //$showingarr =explode(',',$showing) ;
        $header = ['Id','Requester','Type','Title','Description','Assignee','Status','Due Date','Priority','Modified at'];
        //dd($showingarr);
        foreach($header as $key=>$data){
            //dd($data);
            $showing = true;
          
                if(in_array($key ,$showingarr)){
                    $showing = false;
                }

            
           
            $shoeresult[] = array('field'=>$key,
                                'title' => $data,
                                'show' => $showing 

        );

        $ProjectTicket['showhide'] = $shoeresult;
        }







        //dd($ProjectTicket['ticketcase']);
       
        //$this->projectModel->find($id);
      
        return $ProjectTicket;
    }

    public function findprojectticket($id)
    {
        $ticket =  $this->model->where('ticket_comment_id',$id)->first();
        //dd($ticket);
        if (null == $ProjectTicket['ticket'] = $this->model->where('ticket_comment_id',$id)->first()) {
            throw new ModelNotFoundException("Issue not found");
        }
        $ProjectTicket['project'] = $this->Project ::with('customerdatails') ->find($ticket->project_id);
        return $ProjectTicket;
    }

     public function findprojectteam($projectid)
    {
        $team = array();
        $projectteamsetup =   $this->projectteamsetup->where('project_id',$projectid)->get();

        foreach($projectteamsetup as $projectteam){
            $team[] = implode(",",$projectteam->team);
        }
       
        $employeedata['emp'] =  $this->employee->select('first_name','id')->whereIn('id' ,$team)->get() ;

        $customer = $this->Project ::with('customerdatails') ->find($projectid);
        $employeedata['cus'] = $customer->customerdatails->first_name;
        $employeedata['cusid'] = $customer->customerdatails->id;



        
        
        return $employeedata;
    }


    public function getprojectticketsearch($id,$type){
        //dd($type);
        
        if($type == 'show'){
           
            $projectticket = $this->Projectticketcase->find($id);
            $projectcollection = $projectticket->project_id;
            $ProjectTicket['ticket'] = $this->model->where('project_id',$projectcollection)->get();
            $ProjectTicket['project'] = $this->Project ::with('customerdatails') ->find($projectcollection);
            $searchticket = $this->Projectticketcase->with('assigndetails')
                             ->where('project_id',$projectcollection);
                             if(!empty(Customer()->id)){
                                $searchticket->where('cus_tag',Customer()->id)
                                    ->where('type','internal')
                                    ->orWhere('type','customer');
                            }
            $ProjectTicket['ticketcase'] =  $searchticket->orderBy('id','desc')->get();
            $ProjectTicket['ticketmodel'] = $projectticket;
            $ProjectTicket["chatHistory"] = $this->TicketcommentsReplay->where(["project_ticket_id" => $id])->oldest()->get();
             $ids = $ProjectTicket["chatHistory"]->pluck('id');


        }
        else{

        if (null == $ProjectTicket['ticket'] = $this->model->where('project_id',$id)->get()) {
            throw new ModelNotFoundException("Issues not found");
        }
        $ProjectTicket['project'] = $this->Project ::with('customerdatails') ->find($id);
        $searchticket = $this->Projectticketcase->with('assigndetails')
                                                ->where('project_id',$id);
                                                if($type == 'all'){
                                                    if(!empty(Customer()->id)){
                                                        $searchticket->where('cus_tag',Customer()->id)
                                                            ->where('type','internal')
                                                            ->orWhere('type','customer')
                                                            ->where('project_id',$id);
                                                    }
                                                }
                                                else if($type == 'internal'){
                                                    if(!empty(Customer()->id)){
                                                        $searchticket->where('cus_tag',Customer()->id);
                                                          
                                                           
                                                    }
                                                    $searchticket->where('type',$type);

                                                }else{
                                                  
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
           if($data['duedate'] != ''){
            $datearr = explode('-',$data['duedate']);
            
           // $searchticket->whereDate('created_at', '=', $data['fromdate']);
            $searchticket->whereBetween('ticket_date', [date('Y-m-d',strtotime($datearr[0])), date('Y-m-d',strtotime($datearr[1]))]);

           }
           if($data['requesterdate'] != ''){
            $reqarrdate = explode('-',$data['requesterdate']);
            $searchticket->whereBetween('ticket_date', [date('Y-m-d',strtotime($reqarrdate[0])), date('Y-m-d',strtotime($reqarrdate[1]))]);

           }
           if($data['priority'] != ''){
            $searchticket->where('priority','LIKE','%'.$data['priority'].'%');

           }
           if($data['status'] != ''){
            $searchticket->where('project_status',$data['status']);

           }
           if($data['refno'] != ''){
            $refno  = explode('-',$data['refno']);
            //dd();

           
            $searchticket->where('id',$refno[1]);
           }if($data['tickettype'] != ''){
            $searchticket->where('type',$data['tickettype']);
           }
        
           $ProjectTicket['ticketcase'] =  $searchticket->orderBy('id','desc')->get();
           return $ProjectTicket;
    }

    
    
}