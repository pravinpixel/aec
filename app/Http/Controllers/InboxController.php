<?php

namespace App\Http\Controllers;
use App\Helper\Notify;
use App\Models\Admin\Employees;
use App\Models\Customer;
use App\Notifications\InboxNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class InboxController extends Controller
{
    public function inbox()
    {
        Notification::send(null,new InboxNotification(
           "Testing Title",
            "Testing Name",
           "dIGxz3nGEzN12yu8qyRAa2:APA91bFIGlD6s_N3fQ340yHt3IPC_KzKC8mSHH41-eDVm-A3D4XNJ90_qXeRzQVmmQ2TwmGQsSk_qxaTreGfEQelrWtZ_mKDTFqOlHGnSqntcTc9DqPOoFSn3yaDaOd0H8DmZs9lJ4jJ"
        ));
        return view('inbox');
    }
    public function get_token()
    {
        $fcmTokens = 'dAODiLYXR2b7hZDzv9Bnzf:APA91bEFWhW12pw0ydKPx_sIdknJWbfnromYiGpJuB_penztRpGv9k674-k28-NfZKMBWw9a046cwO4Fg5QcsqAWWwpjtDLx1sa70tlp5eS9we2D-X2wXHBzuGXe43vyKnvUsese2ELp';
       
        Notify::send([
            "title"   => "Testing Title",
            "message" => "Testing Body",
            "token"   => $fcmTokens
        ]);
        
        return view('inbox');
    }

    public function store(Request $request)
    {
        if(!is_null(Admin())) {
          $storeToken =  Employees::find(Admin()->id)->update(["token" => $request->token ]);
        } elseif(!is_null(Customer())) {
          $storeToken =  Customer::find(Customer()->id)->update(["token" => $request->token ]);
        }
        if($storeToken) {
            return response()->json([
                "message" => "Success"
            ]);
        }
    }

    public function send_message(Request $request)
    {
        $conversations = Notify::send([
            "message"       => $request->message,
            'module_name'   => $request->module_name,
            'module_id'     => $request->module_id,
            'menu_name'     => $request->menu_name,
        ]);

        return response()->json([
            "conversations" => $conversations,
            "Message"       => "Success"
        ],200);
    } 
}