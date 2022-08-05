<?php

namespace App\Repositories;

use App\Interfaces\TicketCommentRepositoryInterface;
use App\Models\TicketComments;
use App\Models\TicketcommentsReplay;
use App\Models\Project;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TicketCommentRepository implements TicketCommentRepositoryInterface
{
    protected $model;
    protected $projectModel;
    protected $ticketcommentsReplay;

    public function __construct(
        TicketComments $TicketComments,
        Project $projectModel,
        TicketcommentsReplay $ticketcommentsReplay
    ) {
        $this->model = $TicketComments;
        $this->Project   = $projectModel;
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


    public function find($id)
    {
        if (null == $ProjectTicket = $this->model->find($id)) {
            throw new ModelNotFoundException("Issue not found");
        }
        return $ProjectTicket;
    }

    public function get($request)
    {
        return $this->model->where('is_active', 1)->get();
    }


    public function findprojectticketcomment($id, $type)
    {
        $ticketcomments = $this->model->find($id);
       
        if($ticketcomments->type == 'internal'){
            $assigndetails = $this->model->with('assigndetails')->find($id);
            $requesterdetails = $this->model->with('requesterdetails')->find($id);

            //dd($assigndetails);

            $header = array('username' => $assigndetails->assigndetails->first_name,
                            'image'     => $assigndetails->assigndetails->image,
                            'email'     => $requesterdetails->assigndetails->email,
                            'ticketid' => $ticketcomments->id,
                            'priority' => $ticketcomments->priority,
                            'status'    => $ticketcomments->project_status,
                            'project_id' =>$ticketcomments->project_id
                        );

        }else{
            $requesterdetails = $this->model->with('requesterdetails')->find($id);
            $assigndetails = $this->model->with('assigndetails')->find($id);
           
            $header = array('username' => $requesterdetails->requesterdetails->first_name,
                            'image'     => $requesterdetails->requesterdetails->image,
                            'email'     => $assigndetails->assigndetails->email ?? '',
                            'ticketid' => $ticketcomments->id,
                            'priority' => $ticketcomments->priority,
                            'status'    => $ticketcomments->project_status,
                            'project_id' =>$ticketcomments->project_id);
        }

        $result['projectticket'] = $this->Project->find($ticketcomments->project_id);
        
        $result['header'] = $header;
        $result["chatHistory"] = $this->TicketcommentsReplay->where(["project_ticket_id" => $id])->oldest()->get();
        $ids = $result["chatHistory"]->pluck('id');
        $this->updateStatus($ids, $type);
        $result["chatType"] =   $type;
        return $result;
    }


    public function updateStatus($ids, $type, $status = 1)
    {
        list($seenBy, $created_by) = $this->getUser();
        return $this->model->whereIn('id', $ids)
            ->where('created_by', $created_by)
            ->update(['status' => $status,  'seen_by' => $seenBy]);
    }


    public function getUser()
    {
        if (!empty(Customer()->id)) {
            $seenBy = Customer()->id;
            $created_by = 'Admin';
        } else {
            $seenBy =  Admin()->id;
            $created_by = 'Customer';
        }
        return [$seenBy, $created_by];
    }

    public function store(Request $request, $created_by, $role_by, $seen_by)
    {

        //dd($request);

        if (!empty(Customer()->id)) {
            $send_by = Customer()->id;
            $created_by = Customer()->id;
           
        } else {
            $send_by =  Admin()->id;
            $created_by = Admin()->id;
            
        }
        if($request->assign == '0'){
            $projectcustomer = $this->Project->find($request->project_id);
            $request->assign = $projectcustomer->customer_id ;
        }


        //dd(Admin());
        $comments = $this->model->create([
            "project_id"    => $request->project_id,
            "type"          => $request->data['type'],
            "summary"       => $request->data['summary'],
            "file_id"       => $request->image ?? " ",
            "description"   => $request->data['description'],
            "priority"      => $request->data['priority'],
            "assigned"      => $request->assign,
            "ticket_date"   =>new DateTime($request->data['ticket_date']),
            "requester"     => $request->requester,
            "created_by"    => $created_by,
            "role_by"       => $role_by,
            "seen_by"       => $seen_by,
            "send_by"       => $send_by,
            "project_status"=>'New',
            "status"        => 0,
            "variation_order"=> $request->data['variation']  ??  "0",
        ]);

        return $comments;
    }

    
    
}
