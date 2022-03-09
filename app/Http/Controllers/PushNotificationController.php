<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PushNotificationRepository;
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
        // Customer()->update(['device_token'=>$request->token]);
        dd(Customer());
    }
}