<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use App\Interfaces\EnquiryCommentRepositoryInterface;
use App\Interfaces\CustomerEnquiryRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\EnquiryComments;
use App\Models\Customer;
use App\Models\Employee;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Repositories\PushNotificationRepository;

class EnquiryCommentsController extends Controller 
{
    protected $enquiryCommentRepo;
    protected $pushMessageRepo;
    protected $customerEnquiry;

    public function __construct(
            EnquiryCommentRepositoryInterface $enquiryCommentRepo,
            PushNotificationRepository $pushMessageRepo,
            CustomerEnquiryRepositoryInterface $customerEnquiry
        ){
        $this->enquiryCommentRepo = $enquiryCommentRepo;
        $this->pushMessageRepo  =   $pushMessageRepo;
        $this->customerEnquiry  =   $customerEnquiry;
    }

    public function store(Request $request){
        
        // if($request->created_by == 'Admin') {
        //     $firebaseToken  =   Customer::where('id', $request->seen_by)->pluck('device_token');
        //     $role_by        =   Admin()->id; 
        //     $seen_by        =   1;
        // }
     
        // if($request->created_by == 'Customer') {
        //     $firebaseToken  =   Employee::where('id', $request->seen_by)->pluck('device_token');
        //     $role_by        =   Customer()->id;
        //     $seen_by        =   $request->seen_by; 
        // }
        $role_by        =   1;
        $seen_by        =   1; 
        $result         =   $this->enquiryCommentRepo->store($request, $request->created_by, $role_by,$seen_by);
        $customer       =   $this->customerEnquiry->getEnquiryByID($result->enquiry_id);


        $title          =   'New Message From AEC - '.$request->created_by;
        $body           =   $request->comments;
          
        // if($result) {
        //     $message = $this->pushMessageRepo->sendPushNotification($firebaseToken, $title, $body);

            // return  response(['status' => true, 'data' => 'Success','pushMsg'=> $message ,'msg' => trans('enquiry.comments_inserted')], Response::HTTP_OK);
            return  response(['status' => true, 'data' => 'Success', 'msg' => trans('enquiry.comments_inserted')], Response::HTTP_OK);
        // }
        // return  response(['status' => false, 'data' => 'Success' ,'msg' => trans('global.something')]);
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