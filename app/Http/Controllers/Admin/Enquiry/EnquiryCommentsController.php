<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use App\Interfaces\EnquiryCommentRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\EnquiryComments;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EnquiryCommentsController extends Controller 
{
    protected $enquiryCommentRepo;

    public function __construct(EnquiryCommentRepositoryInterface $enquiryCommentRepo){
        $this->enquiryCommentRepo = $enquiryCommentRepo;
    }
    public function store(Request $request){
        return $this->enquiryCommentRepo->store($request);
    }
    public function show(Request $request, $id, $type)
    {
        return $this->enquiryCommentRepo->show($request,  $id, $type);
    }
    public function showTechChat(Request $request, $id, $type)
    {
        return $this->enquiryCommentRepo->showTechChat($request,  $id, $type);
    }

    public function getCommentsCountByType($id)
    {
        return $this->enquiryCommentRepo->getCommentsCountByType($id)->pluck('comments_count','type');
    }

    public function getActiveCommentsCountByType($id)
    {
        return $this->enquiryCommentRepo->getActiveCommentsCountByType($id)->pluck('comments_count','type');
    }
}