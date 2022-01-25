<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnquiryComments;
use Illuminate\Http\Response;


class EnquiryCommentsController extends Controller
{
    
    public function store(Request $r){
        $comments = EnquiryComments::create([
            "comments"      => $r->comments,
            "enquiry_id"    => $r->enquiry_id,
            "type"          => $r->type,
            "created_by"    => $r->created_by,
        ]);
        return response(['status' => true, 'data' => 'Success' ,'msg' => trans('enquiry.comments_inserted')], Response::HTTP_OK);
    }
    public function show(Request $r, $id, $type)
    {
        $result["chatHistory"] = EnquiryComments::where("enquiry_id", '=', $id)
                                    ->where("type", "=" , $type)
                                    ->oldest()->get();
        $result["chatType"] =   $type;
        return $result;
    }
}