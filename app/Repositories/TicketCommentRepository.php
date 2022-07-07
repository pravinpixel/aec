<?php

namespace App\Repositories;

use App\Interfaces\TicketCommentRepositoryInterface;
use App\Models\TicketComments;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TicketCommentRepository implements TicketCommentRepositoryInterface {
    protected $model;
    protected $projectModel;

    public function __construct(
        TicketComments $TicketComments,
        Project $projectModel
        ){
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
        return $this->model->where('is_active',1)->get();
    }
   

    public function findprojectticketcomment($id,$type)
    {

        $result["chatHistory"] = $this->model->where(["project_ticket_id"=> $id, "type"=>  $type])->oldest()->get();
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
        if(!empty(Customer()->id)){
            $seenBy = Customer()->id ;
            $created_by = 'Admin';
        } else {
            $seenBy =  Admin()->id;
            $created_by = 'Customer';
        }
        return [$seenBy, $created_by];
    }
    
    public function store(Request $request, $created_by, $role_by,$seen_by){
        $comments = $this->model->create([
            "comments"      => $request->comments,
            "project_ticket_id"    => $request->project_ticket_id,
            "file_id"       => $request->file_id ?? "",
            "type"          => $request->type,
            "created_by"    => $created_by,
            "role_by"       => $role_by,
            "seen_by"       => $seen_by,
            "send_by"       => $request->send_by,
            "status"        => 0,
        ]);

        return $comments; 
    }

      
    
    
}