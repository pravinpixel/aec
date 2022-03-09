<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use App\Interfaces\EnquiryCommentRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\EnquiryComments;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Repositories\PushNotificationRepository;

class EnquiryCommentsController extends Controller 
{
    protected $enquiryCommentRepo;
    protected $pushMessageRepo;

    public function __construct(
            EnquiryCommentRepositoryInterface $enquiryCommentRepo,
            PushNotificationRepository $pushMessageRepo
        ){
        $this->enquiryCommentRepo = $enquiryCommentRepo;
        $this->pushMessageRepo  =   $pushMessageRepo;
    }

    public function store(Request $request){
        $result  = $this->enquiryCommentRepo->store($request);
        if($result) {
            $message = $this->pushMessageRepo->sendPushNotification("Message_type", "Chat_type");
            dd($message);
            return  response(['status' => true, 'data' => 'Success' ,'msg' => trans('enquiry.comments_inserted')], Response::HTTP_OK);
        }
        return  response(['status' => false, 'data' => 'Success' ,'msg' => trans('globe.something')]);
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