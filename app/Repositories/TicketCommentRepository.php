<?php

namespace App\Repositories;

use App\Interfaces\TicketCommentRepositoryInterface;
use App\Models\TicketComments;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TicketCommentRepository implements TicketCommentRepositoryInterface
{
    protected $model;
    protected $projectModel;

    public function __construct(
        TicketComments $TicketComments,
        Project $projectModel
    ) {
        $this->model = $TicketComments;
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
        return $this->model->where('is_active', 1)->get();
    }


    public function findprojectticketcomment($id, $type)
    {
        $ticketcomments = $this->model->find($id);
       
        if($ticketcomments->type == 'internal'){
            $assigndetails = $this->model->with('assigndetails')->find($id);
            $requesterdetails = $this->model->with('requesterdetails')->find($id);

            //dd($assigndetails);

            $header = array('username' => $assigndetails->assigndetails->first_Name,
                            'image'     => $assigndetails->assigndetails->image,
                            'email'     => $requesterdetails->assigndetails->email,
                            'ticketid' => $ticketcomments->id,
                            'priority' => $ticketcomments->priority,
                            'status'    => $ticketcomments->status,
                        );

        }else{
            $requesterdetails = $this->model->with('requesterdetails')->find($id);
            $assigndetails = $this->model->with('assigndetails')->find($id);

            $header = array('username' => $requesterdetails->requesterdetails->first_Name,
                            'image'     => $requesterdetails->requesterdetails->image,
                            'email'     => $assigndetails->assigndetails->email,
                            'ticketid' => $ticketcomments->id,
                            'priority' => $ticketcomments->priority,
                            'status'    => $ticketcomments->status,);
        }

        $result['projectticket'] = $this->Project->find($ticketcomments->project_id);
        $result['header'] = $header;
        $result["chatHistory"] = $this->model->where(["project_ticket_id" => $id, "type" =>  $type])->oldest()->get();
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

        //dd($request->project_id);

        if (!empty(Customer()->id)) {
            $send_by = Customer()->id;
            $created_by = 'Admin';
        } else {
            $send_by =  Admin()->id;
            $created_by = 'Customer';
        }
        //dd( $request->project_id);
        $comments = $this->model->create([
            "project_id"    => $request->project_id,
            "type"          => $request->data['type'],
            "summary"       => $request->data['summary'],
            "file_id"       => $request->image ?? " ",
            "description"   => $request->data['description'],
            "priority"      => $request->data['priority'],
            "assigned"      => $request->data['assigned'],
            "created_by"    => $created_by,
            "role_by"       => $role_by,
            "seen_by"       => $seen_by,
            "send_by"       => $send_by,
            "status"        => 0,
        ]);

        return $comments;
    }
    
}
