<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PushNotificationRepository;
use App\Models\Customer;

class PushNotificationController extends Controller
{
    public $pushMessageRepo;

    public function __construct(PushNotificationRepository $pushMessageRepo)
    {
        $this->pushMessageRepo  =   $pushMessageRepo;
    }

    public function index()
    {
        $firebaseToken  =  Customer::where('id', Customer()->id)->pluck('device_token');
        $title          =   '';
        $body          =   '';
        return   $this->pushMessageRepo->sendPushNotification("Message_type", "Chat_type", $firebaseToken);
    }
    public function storeToken(Request $request)
    {
        $result  =  Customer::where('id', '=', Customer()->id)->update(['device_token' => $request->token]);
        return $result;
    }
}