<?php

namespace App\Repositories;

use App\Interfaces\EnquiryCommentRepositoryInterface;
use App\Repositories\PushNotificationRepository;
use App\Models\EnquiryComments;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EnquiryCommentRepository implements EnquiryCommentRepositoryInterface{
    protected $model;

    public function __construct(EnquiryComments $enquiryComment)
    {
        $this->model = $enquiryComment;
    }

    public function store(Request $request, $created_by, $role_by,$seen_by){
        $comments = $this->model->create([
            "comments"      => $request->comments,
            "enquiry_id"    => $request->enquiry_id,
            "file_id"       => $request->file_id ?? Null,
            "reference_id"  => $request->reference_id ?? Null,
            "version"       => $request->version ?? Null,
            "type"          => $request->type,
            "created_by"    => $created_by,
            "role_by"       => $role_by,
            "seen_by"       => $seen_by,
            "send_by"       => $request->send_by,
            "status"        => 0,
        ]);

        return $comments; 
    }
    public function show(Request $r, $id, $type)
    {
        $result["chatHistory"] = $this->model->where(["enquiry_id"=> $id, "type"=>  $type])->oldest()->get();
        $ids = $result["chatHistory"]->pluck('id');
        $this->updateStatus($ids, $type);
        $result["chatType"] =   $type;
        return $result;
    }

    public function showProposalComment($request,  $id, $version, $proposal_id)
    {
        $type = 'proposal_sharing';
        $result["chatHistory"] = $this->model->where(["enquiry_id"=> $id, "version"=> $version, "reference_id"=>  $proposal_id])->oldest()->get();
        $ids = $result["chatHistory"]->pluck('id');
        $this->updateStatus($ids, $type);
        $result["chatType"] =   $type;
        return $result;
    }

    public function showTechChat(Request $r, $id, $type)
    {
        $result["chatHistory"] =  $this->model->where(["enquiry_id" =>  $id, "file_id" => $type])->oldest()->get();
        $result["chatType"] =   $type;
        return $result;
    }

    public function getCommentsCountByType($id)
    {

        return $this->model->select("type", DB::raw("count(*) as comments_count"))
                                ->where('enquiry_id', $id)
                                ->groupBy('type')
                                ->get();
                                
    }

    public function getActiveCommentsCountByType($id)
    {
        list($seenBy, $created_by) = $this->getUser();
        return  $this->model->select("type", DB::raw("count(*) as comments_count"))
                                ->where(['enquiry_id' => $id, 'status' => 0, 'created_by' => $created_by])
                                ->groupBy('type')
                                ->get();
    }

    public function getCostEstimateCount($id)
    {
        return  $this->model->select("created_by", DB::raw("count(*) as comments_count"))
                            ->where(['enquiry_id' => $id, 'status' => 0, 'type' => "cost_estimation_assign"])
                            ->groupBy('created_by')
                            ->get();
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

}