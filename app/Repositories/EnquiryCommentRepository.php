<?php

namespace App\Repositories;

use App\Interfaces\EnquiryCommentRepositoryInterface;
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

    public function store(Request $r){
        $comments = $this->model->create([
            "comments"      => $r->comments,
            "enquiry_id"    => $r->enquiry_id,
            "file_id"       => $r->file_id ?? "",
            "type"          => $r->type,
            "created_by"    => $r->created_by,
            "role_by"       => $r->role_by ?? "",
            "status"        => 0,
        ]);
        return response(['status' => true, 'data' => 'Success' ,'msg' => trans('enquiry.comments_inserted')], Response::HTTP_OK);
    }
    public function show(Request $r, $id, $type)
    {
        $result["chatHistory"] = $this->model->where(["enquiry_id"=> $id, "type"=>  $type])->oldest()->get();
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
        return  $this->model->select("type", DB::raw("count(*) as comments_count"))
                                ->where(['enquiry_id' => $id, 'status' => 0])
                                ->groupBy('type')
                                ->get();
    }

    public function updateStatus($ids, $type, $status = 1)
    {
        if(!empty(Customer()->id)){
            $seenBy = Customer()->id ;
            $type = 'Admin';
        } else {
            $seenBy =  Admin()->id;
            $type = 'Customer';
        }
        return $this->model->whereIn('id', $ids)
                            ->where('created_by', $type)
                            ->update(['status' => $status,  'seen_by' => $seenBy]);
    }

}