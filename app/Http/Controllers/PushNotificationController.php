<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PushNotificationRepository;
use App\Models\Enquiry;
class PushNotificationController extends Controller
{
    public $pushMessageRepo;

    public function __construct(PushNotificationRepository $pushMessageRepo)
    {
        $this->pushMessageRepo  =   $pushMessageRepo;
    }

    public function index()
    {
        return $result  =   $this->pushMessageRepo->sendPushNotification("Message_type", "Chat_type");
       
    }
    public function storeToken(Request $request)
    {
        $result  =  Enquiry::where('id', '=', Customer()->id)->update(['device_token' => $request->token]);
    }
}