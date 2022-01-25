<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnquiryComments;

class EnquiryCommentsController extends Controller
{
    public function store(Request $r){
        $comments = EnquiryComments::create([
            "comments"      => $r->comments,
            "enquiry_id"    => $r->enquiry_id,
            "type"          => $r->type,
            "created_by"    => $r->created_by,
        ]);
        return back();return EnquiryComments::where("enquiry_id", '=', $id)
                                ->where("type", "=" , "project_infomation")
                                ->get();
    }
    public function show()
    {
        return "enquiry.show-comments";
    }
}